<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\BasketService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpFoundation\Session\Session;

class BasketServiceTest extends TestCase {
    private $session;
    private $basketService;

    protected function setUp() {
        $this->session = new Session(new MockArraySessionStorage());
        $this->basketService = new BasketService($this->session);
    }

    protected function tearDown() {
        unset($this->session);
        unset($this->basketService);
    }

    /**
     * @dataProvider addProductDataProvider
     */
    public function testAddProduct($productId, $sessionData, $expectedData, $message) {
        $this->session->set(BasketService::BASKET_SESSION_KEY, $sessionData);

        $this->basketService->addProduct($productId);
        
        $productsInBasket = $this->session->get(BasketService::BASKET_SESSION_KEY);
        
        $this->assertSame($productsInBasket, $expectedData, $message);
    }

    /**
     * @dataProvider removeProductDataProvider
     */
    public function testRemoveProduct($productId, $sessionData, $expectedData, $message) {
        $this->session->set(BasketService::BASKET_SESSION_KEY, $sessionData);

        $this->basketService->removeProduct($productId);
        
        $productsInBasket = $this->session->get(BasketService::BASKET_SESSION_KEY);
        
        $this->assertSame($productsInBasket, $expectedData, $message);
    }

    /**
     * @dataProvider containProductDataProvider
     */
    public function testContainProduct($productId, $sessionData, $expectedValue, $message) {
        $this->session->set(BasketService::BASKET_SESSION_KEY, $sessionData);

        $isProductInBasket = $this->basketService->containProduct($productId);

        $this->assertSame($isProductInBasket, $expectedValue, $message);
    }

    /**
     * @dataProvider getProductsIdsDataProvider
     */
    public function testGetProductsIds($sessionData, $expectedData, $message) {
        $this->session->set(BasketService::BASKET_SESSION_KEY, $sessionData);

        $productsIds = $this->basketService->getProductsIds();
        
        $this->assertSame($productsIds, $expectedData, $message);
    }

    /**
     * @dataProvider getProductsCountDataProvider
     */
    public function testGetProductsCount($sessionData, $expectedValue, $message) {
        $this->session->set(BasketService::BASKET_SESSION_KEY, $sessionData);

        $productsCount = $this->basketService->getProductsCount();
        
        $this->assertSame($productsCount, $expectedValue, $message);
    }

    /**
     * @dataProvider getProductsDataProvider
     */
    public function testGetProducts($sessionData, $expectedData, $message) {
        $this->session->set(BasketService::BASKET_SESSION_KEY, $sessionData);

        $products = $this->basketService->getProducts();
        
        $this->assertSame($products, $expectedData, $message);
    }

    public function addProductDataProvider() {
        return [
            [
                2,
                [],
                ['2' => 1],
                'adds product to empty basket'
            ],
            [
                5,
                ['1' => 1, '3' => 1],
                ['1' => 1, '3' => 1, '5' => 1],
                'adds product to not empty basket'
            ],
            [
                3,
                ['1' => 1, '3' => 1],
                ['1' => 1, '3' => 1],
                'does not add same product to basket'
            ]
        ];
    }

    public function removeProductDataProvider() {
        return [
            [
                2,
                [],
                [],
                'does not remove product if basket is empty'
            ],
            [
                5,
                ['1' => 1, '3' => 1],
                ['1' => 1, '3' => 1],
                'does not remove product if is not in basket'
            ],
            [
                3,
                ['1' => 1, '3' => 1],
                ['1' => 1],
                'removes product if is in basket'
            ],
            [
                1,
                ['1' => 1],
                [],
                'removes only one product if is in basket'
            ]
        ];
    }

    public function containProductDataProvider() {
        return [
            [
                2,
                [],
                false,
                'returns false if basket is empty'
            ],
            [
                2,
                ['1' => 1, '3' => 1, '5' => 1],
                false,
                'returns false if basket does not contain product'
            ],
            [
                3,
                ['1' => 1, '3' => 1, '5' => 1],
                true,
                'returns true if basket contain product'
            ]
        ];
    }

    public function getProductsIdsDataProvider() {
        return [
            [
                [],
                [],
                'returns empty array if basket is empty'
            ],
            [
                ['2' => 1],
                [2],
                'returns array with one id if there is just one product in basket'
            ],
            [
                ['1' => 1, '3' => 1, '5' => 1],
                [1, 3, 5],
                'return all products ids from basket'
            ]
        ];
    }

    public function getProductsCountDataProvider() {
        return [
            [
                [],
                0,
                'returns zero if basket is empty'
            ],
            [
                ['1' => 1],
                1,
                'returns one if basket has just one product'
            ],
            [
                ['1' => 1, '2' => 1, '3' => 1],
                3,
                'returns proper number of products in basket'
            ]
        ];
    }

    public function getProductsDataProvider() {
        return [
            [
                [],
                [],
                'returns empty basket'
            ],
            [
                ['1' => 1, '2' => 1, '5' => 1],
                ['1' => 1, '2' => 1, '5' => 1],
                'returns all products in basket'
            ]
        ];
    }
}