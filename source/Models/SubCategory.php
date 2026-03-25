<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Category
 * @package Source\Models
 */
class SubCategory extends Model
{
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct("sub_category", ["id"], ["title"]);
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
     * @return Product
     */
    public function posts(): Product
    {
        return (new Product())->find("subcategory = :subcategory", "subcategory={$this->id}");
    }

    /**
     * @return null|Categories
     */
    public function category(): ?Categories
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
        $checkUri = (new Categories())->find("uri = :uri AND id != :id", "uri={$this->uri}&id={$this->id}");

        if ($checkUri->count()) {
            $this->uri = "{$this->uri}-{$this->lastId()}";
        }

        return parent::save();
    }
}