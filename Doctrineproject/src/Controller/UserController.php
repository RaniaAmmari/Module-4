<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function createUser(ManagerRegistry $doctrine): Response
    {
        $entityManger= $doctrine->getManager();
        $user = new User();
        $user->setFirstname("rania")
             ->setLastname("ammari")
             ->setEmail("rania.ammari@talan.com")
             ->setAdress("Mahdia el Zahra")
             ->setBirthdate(new \DateTime());

        $entityManger->persist($user);

        $entityManger->flush();

        return new Response('Saved new User with id '.$user->getId());

    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'UserController',
    //     ]);
    }
    /**
     * @Route("/getall", name="getall")
     */
   public function getallusers () {
    $repository =$this->getdoctrine()->getRepository(User::class);
    $users = $repository->findAll();
    return $this->render('user/index.html.twig', [
                'controller_name' => 'getallusers',
                'users'=>$users
            ]);

   }
}
