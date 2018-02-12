<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Service\BasketService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCardController extends Controller {
    
    /**
     * @Route("/card", name="card")
     */
    public function shoppingList(Request $request, BasketService $basketService) {
        $products = [];
        $productsIds = [];
        $deletedProductId = $request->request->get('delete-product');

        $repository = $this->getDoctrine()->getRepository(Product::class);

        if ($deletedProductId) {
            $basketService->removeProduct($deletedProductId);
        }

        $productsIds = $basketService->getProductsIds();
        if ($productsIds) {
            $products = $repository->findById($productsIds);
        }

        return $this->render('shoppingCard.html.twig', [
            'products' => $products,
            'priceSum' => $this->getProductPriceSum($products)
        ]);
    }

    private function getProductPriceSum($products) {
        return array_reduce($products, function ($sum, $product) {
            $sum += $product->getPrice();

            return $sum;
        }, 0);
    }
}
