<?php

namespace App\FactoryMethod\Controller;

use App\FactoryMethod\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", methods={"POST"})
     */
    public function create(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $user = new User();
        $user->setEmail('user@mail.com')
            ->setName('user');

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            'message' => 'New user created!',
        ]);
    }
}
