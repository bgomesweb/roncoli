<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Histories
 * @package Source\Models
 */
class Histories extends Model
{
    /**
     * Histories constructor.
     */
    public function __construct()
    {
        parent::__construct("history", ["id"], ["title","content"]);
    }

    /**
     * @param null|string $terms
     * @param null|string $params
     * @param string $columns
     * @return mixed|Model
     */
    public function findPost(?string $terms = null, ?string $params = null, string $columns = "*")
    {
        $terms = "status = :status AND post_at <= NOW()" . ($terms ? " AND {$terms}" : "");
        $params = "status=post" . ($params ? "&{$params}" : "");

        return parent::find($terms, $params, $columns);
    }

    /**
     * @return null|User
     */
    public function author(): ?User
    {
        if ($this->author) {
            return (new User())->findById($this->author);
        }
        return null;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!empty($this->id)) {
            $check = (new MyCompany())->find("id = :id", "id={$this->id}");

            if ($check->count()) {
                return parent::save();
            }
        }
        return parent::save();
    }
}