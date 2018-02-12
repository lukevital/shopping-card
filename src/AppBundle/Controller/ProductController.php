<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Service\BasketService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller {
    /**
     * @Route ("/products", name="products")
     */
    public function productsList(Request $request, BasketService $basketService) {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $products = $repository->findAll();
        $addedProductId = $request->request->get('add-product');

        if ($addedProductId) {       
            $basketService->addProduct($addedProductId);
        }

        return $this->render('products.html.twig', [
            'productsInBasketCount' => $basketService->getProductsCount(),
            'products' => $products
        ]);
    }
}