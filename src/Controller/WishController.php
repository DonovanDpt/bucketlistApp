<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/wish', name: 'wish')]
class WishController extends AbstractController
{
    #[Route('/', name: '_wish')]
    public function wishes(): Response
    {
        return $this->render('wish/wishes.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
    #[Route('/list', name: '_list')]
    public function list(): Response
    {
        return $this->render('wish/list.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
    #[Route('/detail', name: '_detail')]
    public function detail(): Response
    {
        return $this->render('wish/detail.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
}
