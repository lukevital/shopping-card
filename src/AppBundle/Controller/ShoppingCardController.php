<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCardController extends Controller {
    
    /**
     * @Route("/card")
     */
    public function shoppingList() {
        return $this->render('shoppingCard.html.twig', [
            'content' => 'Hello Masta!'
        ]);
    }
}
