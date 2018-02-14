<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketService {
    const BASKET_SESSION_KEY = 'productsInBasket';

    private $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session) {
        $this->session = $session;
    }

    /**
     * Add product to basket
     * 
     * @param int $productId
     */
    public function addProduct($productId) {
        $products = $this->getProducts();

        if (!$products) {
            $products = [];
        }

        $products[$productId] = 1;

        $this->session->set(self::BASKET_SESSION_KEY, $products);
    }

    /**
     * Remove product from basket
     * 
     * @param int $productId
     */
    public function removeProduct($productId) {
        $products = $this->getProducts();

        if ($products && isset($products[$productId])) {
            unset($products[$productId]);
        }

        $this->session->set(self::BASKET_SESSION_KEY, $products);
    }

    /**
     * Check if product is already added to basket
     * 
     * @param int $productId
     * 
     * @return boolean
     */
    public function containProduct($productId) {
        $products = $this->getProducts();

        return $products && isset($products[$productId]);
    }

    /**
     * Get ids of products in basket
     * 
     * @return array
     */
    public function getProductsIds() {
        return array_keys($this->getProducts());
    }

    /**
     * Get number of products in basket
     * 
     * @return int
     */
    public function getProductsCount() {
        return count($this->getProductsIds());
    }

    /**
     * Get products from basket
     * 
     * @return array
     */
    private function getProducts() {
        return $this->session->get(self::BASKET_SESSION_KEY);
    }
}