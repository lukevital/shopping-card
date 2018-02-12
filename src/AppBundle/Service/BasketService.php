<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketService {
    const BASKET_SESSION_KEY = 'productsInBasket';

    private $session;

    public function __construct(SessionInterface $session) {
        $this->session = $session;
    }

    public function addProduct($productId) {
        $products = $this->getProducts();

        if (!$products) {
            $products = [];
        }

        $products[$productId] = 1;

        $this->session->set(self::BASKET_SESSION_KEY, $products);
    }

    public function removeProduct($productId) {
        $products = $this->getProducts();

        if ($products[$productId]) {
            unset($products[$productId]);
        }

        $this->session->set(self::BASKET_SESSION_KEY, $products);
    }

    public function getProductsIds() {
        return array_keys($this->getProducts());
    }

    public function getProductsCount() {
        return count($this->getProductsIds());
    }

    private function getProducts() {
        return $this->session->get(self::BASKET_SESSION_KEY);
    }
}