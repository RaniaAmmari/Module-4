<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Produit;

class ProductController extends AbstractController
{
    /**
     * @Route("/produit/{label}/{price}/{quantity}", name="produit",methods={"GET","HEAD"})
     */
    public function createproduct (ManagerRegistry $doctrine, string $label, int $price, int $quantity): Response
    {
        $entityManger= $doctrine->getManager();
        $Produit = new Produit();

        $Produit ->setLabel($label);

        $Produit ->setPrice($price);
        $Produit ->setQuantity($quantity);

        $entityManger->persist($Produit);

        $entityManger->flush();

        return new Response('Saved new Product with lable '.$Produit->getLabel() . 
        ' the new price is '.$Produit->getPrice(). ' the quantity available is '.$Produit->getQuantity());}

         /**
     * @Route("/edit-produit/{id}/{label}/{price}/{quantity}")
     *  
     */
    public function update(ManagerRegistry $doctrine,  int $id, string $label, int $price, int $quantity): Response
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Produit::class)->find($id);
 
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
 
        $product->setLabel($label)
        ->setPrice($price)
        ->setQuantity($quantity);
 
        $entityManager->flush();
 
        return new Response('Saved new product with id '.$product->getId());
    }

    /**
     * @Route("/get-all-products", name="get-all-products")
     */
    public function getproduct(): Response
    {
        $repo=$this->getDoctrine()->getRepository(produit::class);
        $products=$repo->findAll();
        return $this->render('product/index.html.twig', [
            'controller_name' => 'productController',
            'products' =>$products
        ]);
      
    }
      /**
     * @Route("/product/{id}", name="product.detail")
     */
    public function productDetails(Produit $product): Response
    {
        return $this->render('product/detail.html.twig', [
            'product' => $product,
        ]);
    }
    //     return $this->render('product/index.html.twig', [
    //         'controller_name' => 'ProductController',
    //     ]);
    // }
}
