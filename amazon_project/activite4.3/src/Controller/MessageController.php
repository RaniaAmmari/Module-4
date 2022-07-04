<?php

namespace App\Controller;

use App\Repository\MessagesRepository;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/message/{id}", name="app_message")
     */
    public function index(MessagesRepository $messagesRepository, UserRepository $userRepository, $id): Response
    {
        $user = $userRepository->find($id);
        $message = $user->getMessage();
        return $this->render('message/index.html.twig', [
            'user' => $user,
            'messages' => $message
        ]);
    }
}