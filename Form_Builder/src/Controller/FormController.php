<?php

namespace App\Controller;

use App\Classe\Papier;

use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\GreaterThan;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class FormController extends AbstractController
{
    /**
     * @Route("/form", name="app_form")
     */


    public function NewForm (Request $request): Response
    {
        // creates a papier object and initializes some data for this example
        $papier = new Papier();

        $form = $this->createFormBuilder($papier)
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Age', NumberType::class , ['required' => false,
                'constraints'=> [new LessThan([
                    'value' => 100]),
                    new GreaterThan([
                        'value' => 1
                    ])]
            ])

            ->add('Adresse', TextareaType::class, ['attr' => ['maxlength' => 255]] ) 
            ->add('Code_Postal', NumberType::class, ['constraints'=> [new LessThan([
                'value' => 99999])]
                ])
            ->add('Ville', ChoiceType::class , [
                'choices'  => [
                    'Tunisie' => true,
                    'Mahdia' => true,
                    'Sousse' => true,
                    'Sfax' => true,
                    'Beja' => true,
                    'El Kef' => true,
                ],]
            )
            ->add('Permis', ChoiceType::class , [
                'choices' => [
                    'AM' => false,
                    'A1' => false,
                    'A2' => false,
                    'A' => false,
                    'B1' => false,
                    'B' => false
                ],
                'expanded' => true,

                'required' => false, ])
            ->add('Save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();
           $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
  
            $form = $form->getData();
            return $this->render('form/success.html.twig');
        }

         return $this->render('form/index.html.twig', [
                         'formpapier' => $form-> createView() ]);



    }
    // public function index(): Response
    // {
    //     return $this->render('form/index.html.twig', [
    //         'controller_name' => 'FormController',
    //     ]);
    // }
}
