<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Category
 * @package Source\Models
 */
class Categories extends Model
{
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct("categories", ["id"], ["title", "description"]);
    }

    /**
     * @param string $uri
     * @param string $columns
     * @return null|Categories
     */
    public function findByUri(string $uri, string $columns = "*"): ?Categories
    {
        $find = $this->find("uri = :uri", "uri={$uri}", $columns);
        return $find->fetch();
    }

    /**
     * @return null|SubCategory
     */
    public function subCategory(): ?SubCategory
    {
        if ($this->category) {
            return (new SubCategory())->findById($this->category);
        }
        return null;
    }

    /**
     * @return Product
     */
    public function posts(): Product
    {
        return (new Product())->find("category = :id", "id={$this->id}");
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        $checkUri = (new Categories())->find("uri = :uri AND id != :id", "uri={$this->uri}&id={$this->id}");

        if ($checkUri->count()) {
            $this->uri = "{$this->uri}-{$this->lastId()}";
        }

        return parent::save();
    }
}