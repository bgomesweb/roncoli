<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Post
 * @package Source\Models
 */
class Product extends Model
{
    /**
     * Post constructor.
     */
    public function __construct()
    {
        parent::__construct("products", ["id"], ["title", "uri"]);
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

    public function cat(): ?Categories
    {
        if ($this->category) {
            return (new Categories())->findById($this->category);
        }
        return null;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        $checkUri = (new Product())->find("uri = :uri AND id != :id", "uri={$this->uri}&id={$this->id}");

        if ($checkUri->count()) {
            $this->uri = "{$this->uri}-{$this->lastId()}";
        }

        return parent::save();
    }
}