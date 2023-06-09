<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_home')]

    public function home(): Response
    {

        return $this->render('home/index.html.twig', [

        ]);
    }


    #[Route('/about_us', name: 'main_about_us')]
    public function aboutUs(): Response
    {
        $json = file_get_contents("../data/team.json");
        $json2 = json_decode($json);
        return $this->render('home/about_us.html.twig',
            compact('json2'));
    }
/**
 * Ici se trouve une autre façon de faire que celle juste au dessus,
 * afin de retirer les variables que l'on utilise qu'une seule fois
 */
//    #[Route('/about_us', name: 'main_about_us')]
//    public function aboutUs(): Response
//    {
//        return $this->render('home/about_us.html.twig',
//            [
//                'json2' => json_decode(file_get_contents("../data/team.json"))
//
//        ];
//    }
}
