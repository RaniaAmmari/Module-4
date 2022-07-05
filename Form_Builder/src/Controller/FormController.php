<?php

namespace App\Controller;

use App\Classe\Papier;
use App\Classe\Info;
use App\Classe\Simple;
use App\Classe\linkhttp;
use App\Classe\Equipe;
use App\Controller\Joueur;

use App\Validator\Leboncoin;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;



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
            $this->addFlash('success', 'papier Créer!');
            return $this->redirectToRoute('app_form_mail');
        }

         return $this->render('form/index.html.twig', [
                         'formpapier' => $form-> createView() ]);



    }
    /**
     * @Route("/formmail", name="app_form_mail")
     */
    public function insertinfo (Request $request): Response
    {
        $info = new Info();

        $form = $this->createFormBuilder($info)
            ->add('Montant', MoneyType::class , [
               'currency'=> 'USD' ,
               'attr' => ['value' => '375']
               ])
                ->add('email', RepeatedType::class, [
                    'type' => EmailType::class,
                    'invalid_message' => 'The password fields must match.',
                    'required' => true,
                    'first_options'  => ['label' => 'Email', 'attr'=>['placeholder' => "example@site.com"]],
                    'second_options' => ['label' => 'Repeat Eamil', 'attr'=>['placeholder' => "example@site.com"]] 
                    ])
                    ->add('Numero', TelType::class, [
                        'required' => true,
                        'constraints' => [new Length([
                            'min'=> 10,
                            'max'=> 10,
                            'exactMessage' => 'Votre numero doit faire 10 chiffres de long'
                        ]),
                        new Regex([
                            'pattern' => '/^0[67]/',
                            'message' => 'Le numero doit commencer par 06 ou 07'
                        ])]
                    ])

                    ->add('Save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

           $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
  
            $form = $form->getData();
            $this->addFlash('success', 'Informations Créer!');
            return $this->redirectToRoute('app_form_mail');
        
        }   
                
        return $this->render('form/formmail.html.twig', [
            'forminfo' => $form-> createView() ]);
       
    }
    /**
     * @Route("/formjustemail", name="app_form_just_mail")
     */
    public function justmail (Request $request): Response
    {
        $simple = new Simple();

        $form = $this->createFormBuilder($simple)
             ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Email',textType::class,['required' => true, 'attr'=>['placeholder' => "example@site.com"] ,'constraints' => [new Email ([
              
                'message' => 'Entrer une adresse mail valide',
                
            ]),
           ]])
            ->add('Save', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

           $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
  
            $form = $form->getData();
            $this->addFlash('success', 'Informations Créer!');
            return $this->redirectToRoute('app_form_just_mail');
        }   
                
        return $this->render('form/formjustmail.html.twig', [
            'formjust' => $form-> createView() ]);
}
      /**
     * @Route("/insertlink", name="app_link")
     */

    public function insertlink (Request $request): Response
    {
        $link = new linkhttp();

        $form = $this->createFormBuilder($link)
             ->add('Nom', TextType::class)
             ->add('lien',textType::class,['required' => true,'constraints' => [new Leboncoin([]) ]])
                ->add('Save', SubmitType::class, ['label' => 'Submit'])
                ->getForm();
    
               $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
      
                $form = $form->getData();
                $this->addFlash('success', 'Informations Créer!');
                 return $this->redirectToRoute('app_link');
            }   
                
            return $this->render('form/link.html.twig', [
                'formlink' => $form-> createView() ]);
    }
   /**
     * @Route("/imbequipe", name="imbrique")
     */
    public function imrique(Request $request):Response{

        $NewTest= new Equipe();
        $form = $this->createFormBuilder($NewTest)
        ->add('Nomequipe',textType::class,['required' => true])
            ->add('Ville',textType::class,['required' => true])
            ->add('Sport',ChoiceType::class, [
                'choices' => [
                    'Football' => 1,
                    'Handball' => 2,
                    'Tennis' => 3,
                    'Rugby' => 4, 
                    'Volleyball' => 5, 
                    'Bascketball' => 6, 
                    'Hokey' => 7,
                ],'required' => true],)
            ->add('joueur',JoueurType::class,['required' => true])
            ->add('valider', SubmitType::class)
            ->getForm();
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('success.html.twig');
        }
       

        return $this->render('form/equipe.html.twig', [
            'formimp' => $form->createView(),
        ]);
    }


}


