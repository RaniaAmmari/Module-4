<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
     /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('blog/home.html.twig'); 
        
    }
     /**
     * @Route("/blog/article{id}", name="blog-show" )
     */
   
    public function show(int $id){
        // if($id==1){
          return $this->render('blog/show.html.twig',[
            'id' => $id]);}
        
    //     elseif ($id==2){return $this->render('blog/show1.html.twig');
   
    //     }
    //     elseif ($id==3){return $this->render('blog/show3.html.twig');
   
    //     }
    //     elseif ($id>3){ throw $this->createNotFoundException('Article does not exist');
    //         $this->render('blog/error.html.twig'); }
          
    //    }
    }