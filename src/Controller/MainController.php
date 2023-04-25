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
}
