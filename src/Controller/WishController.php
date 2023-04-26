<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Repository\SerieRepository;
use App\Repository\WishRepository;
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
    public function list(wishRepository $wishRepository): Response
    {
        $tabDeSeries = $wishRepository->findBy(
            [],
            ['id' =>'DESC'],
        );
        return $this->render('wish/list.html.twig',
            compact('tabDeSeries')
        );
    }
    #[Route('/{wish}',
        name: '_detail',
        requirements: ["wish" => '\d+'])]
    public function detail(
        Wish $wish
    ): Response
    {
        return $this->render('wish/detail.html.twig',
           compact(var_name: 'wish')
        );
    }
}
