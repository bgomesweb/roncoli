<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * RONCOLI | Class User Active Record Pattern
 *
 * @author Bruno Goms <bgomesweb@gmail.com>
 * @package Source\Models
 */
class User extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("users", ["id"], ["cnpj_cpf", "company_name", "email", "phone" ,"password"]);
    }

    /**
     * @param string $cnpjCpf
     * * @param string $phone
     * @param string $companyName
     * @param string $email
     * @param string $password
     * @return User
     */
    public function bootstrap(
        string $cnpjCpf,
        string $phone,
        string $companyName,
        string $email,
        string $password
    ): User {
        $this->cnpj_cpf = str_search($cnpjCpf);
        $this->company_name = $companyName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $cnpjCpf
     * @param string $columns
     * @return null|User
     */
    public function findByDocument(string $cnpjCpf, string $columns = "*"): ?User
    {
        $find = $this->find("cnpj_cpf = :cnpj_cpf", "cnpj_cpf={$cnpjCpf}", $columns);
        return $find->fetch();
    }

    /**
     * @param string $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        $find = $this->find("email = :email", "email={$email}", $columns);
        return $find->fetch();
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return "{$this->company_name} ";
    }

    /**
     * @return string|null
     */
    public function photo(): ?string
    {
        if ($this->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$this->photo}")) {
            return $this->photo;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("CNPJ/CPF, Razão Social, email e senha são obrigatórios");
            return false;
        }

        /*if (!is_email($this->email)) {
            $this->message->warning("O e-mail informado não tem um formato válido");
            return false;
        }*/

        if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return false;
        } else {
            $this->password = passwd($this->password);
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("email = :e AND id != :i", "e={$this->email}&i={$userId}", "id")->fetch()) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->findByEmail($this->email, "id")) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $userId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($userId))->data();
        return true;
    }
}