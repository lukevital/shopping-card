<?php

namespace AppBundle\Entity;

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $vat;
    private $categoryId;

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setVat($vat) {
        $this->vat = $vat;
    }

    public function setCategoryId($categoryId) {
        $this->$categoryId = $categoryId;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getVat() {
        return $this->vat;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }
}