<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/accueil', name: 'accueil', methods:['GET'])]
    public function index(): Response
    {
        return $this->render('/base.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}

