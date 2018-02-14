<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Service\BasketService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller {
    /**
     * @Route ("/", name="products")
     * 
     * @param Request $request
     * @param BasketService $basketService
     */
    public function productsList(Request $request, BasketService $basketService) {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $products = $repository->findAll();
        $addedProductId = $request->request->get('add-product');

        if ($addedProductId) {
            if (!$basketService->containProduct($addedProductId)) {
                $basketService->addProduct($addedProductId);

                $this->addFlash('info', 'Produkt został dodany do koszyka');
            } else {
                $this->addFlash('notice', 'Wybrany produkt jest już w Twoim koszyku');
            }
        }

        return $this->render('products.html.twig', [
            'productsInBasketCount' => $basketService->getProductsCount(),
            'products' => $products
        ]);
    }
}