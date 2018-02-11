<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ProductController extends Controller {
    /**
     * @Route ("/products", name="products")
     */
    public function productsList(Request $request) {
        $session = $request->getSession();
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $products = $repository->findAll();
        $productsInBasket = $session->get('productsInBasket');
        $addedProductId = $request->request->get('add-product');

        if ($addedProductId) {       
            if ($session->has('productsInBasket')) {      
                $productsInBasket[$addedProductId] = 1;

                $session->set('productsInBasket', $productsInBasket);
            } else {
                $session->set('productsInBasket', [$addedProductId => 1]);
            }
        }

        return $this->render('products.html.twig', [
            'productsInBasketCount' => count($productsInBasket),
            'products' => $products
        ]);
    }
}