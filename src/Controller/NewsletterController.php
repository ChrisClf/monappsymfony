<?php

namespace App\Controller;

use App\Form\NewsletterType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class NewsletterController extends AbstractController
{
    #[Route('/newsletter', name: 'app_newsletter')]
    public function index(): Response
    {
        $formulaire = $this->createForm(NewsletterType::class);
        return $this->renderForm('newsletter/index.html.twig', [
            'controller_name' => 'NewsletterController',
            'Formulaire'=>$formulaire,
        ]);
    }
}
