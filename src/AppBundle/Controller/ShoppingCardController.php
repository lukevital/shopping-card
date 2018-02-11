<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCardController extends Controller {
    
    /**
     * @Route("/card", name="card")
     */
    public function shoppingList(Request $request) {
        $session = $request->getSession();
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $productsInBasket = $session->get('productsInBasket');
        $products = [];

        if ($request->request->get('delete-product')) {
            $productId = $request->request->get('delete-product');

            if ($productsInBasket[$productId]) {
                unset($productsInBasket[$productId]);
                $session->set('productsInBasket', $productsInBasket);
            }
        }

        if ($productsInBasket) {
            $products = $repository->findById(array_keys($productsInBasket));
        }

        return $this->render('shoppingCard.html.twig', [
            'products' => $products
        ]);
    }
}
