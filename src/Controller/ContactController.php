<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        $formulaire = $this->createForm(ContactType::class);
        $niveau_eleve="Ca va sympa tranquille la misere";

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            [
                'nom_formateur'=>'Melki',
                'prenom'=>'Yoel',
                'Niveau_formateur'=>'Excellent !',
                'niveau_eleve'=>$niveau_eleve ,
                'formulaire'=>$formulaire ,
            ]
        ]);
    }
}