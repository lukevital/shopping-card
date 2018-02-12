<?php

namespace AppBundle\Entity;

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $vat;
    private $category;

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

    public function setCategory($category) {
        $this->category = $category;
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

    public function getCategory() {
        return $this->category;
    }
}