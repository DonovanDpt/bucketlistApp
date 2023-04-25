<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/wish', name: 'wish_wishes')]
class WishController extends AbstractController
{
    #[Route('/', name: 'wish_wishes')]
    public function wishes(): Response
    {
        return $this->render('wish/wishes.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
    #[Route('/list', name: 'wish_list')]
    public function list(): Response
    {
        return $this->render('wish/list.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
    #[Route('/detail', name: 'wish_detail')]
    public function detail(): Response
    {
        return $this->render('wish/detail.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }
}
