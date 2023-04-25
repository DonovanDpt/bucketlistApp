<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    #[Route('/wish', name: 'wish_wishes')]
    public function wishes(): Response
    {
        return $this->render('wish/wishes.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
}
