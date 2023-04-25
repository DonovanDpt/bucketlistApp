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
        $date = date('Y');
        return $this->render('home/index.html.twig', [
            'date' => $date,
        ]);
    }

    #[Route('/about_us', name: 'main_about_us')]

    public function about_us(): Response
    {
        $date = date('Y');
        return $this->render('home/about_us.html.twig', [
            'date' => $date,
        ]);
    }
}
