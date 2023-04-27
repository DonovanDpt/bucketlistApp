<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\SerieRepository;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        Wish $wish,
    ): Response
    {
        return $this->render('wish/detail.html.twig',
           compact(var_name: 'wish')
        );
    }

    #[Route('/ajouter', name: '_ajouter')]
    public function ajoutList(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $liste = new Wish();
        $listeForm = $this->createForm(WishType::class, $liste);
        $listeForm->handleRequest($request);
        $liste->setIsPublished(true);
        $liste->setDateCreated(new \DateTime());

        if ($listeForm->isSubmitted() && $listeForm->isValid()){
            try {
                //methode qui permet d'update en base de donnée
                $entityManager->persist($liste);
                $entityManager->flush();
                $this->addFlash('ok', 'Créé avec succès !');
            }catch (\Exception $exception) {
                $this->addFlash('erreur', "Le wish n'a pas été ajouté !");
            }

            return $this->redirectToRoute('wish_list');
        }

        return $this->render('wish/ajouter.html.twig',
            compact('listeForm')
        );
    }
}
