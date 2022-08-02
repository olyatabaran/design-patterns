<?php

namespace App\FactoryMethod\Controller;

use App\FactoryMethod\Entity\Novelty;
use App\FactoryMethod\Entity\NoveltyAnnouncement;
use App\FactoryMethod\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NoveltyController extends AbstractController
{
    /**
     * @Route("/novelty", methods={"POST"})
     */
    public function create(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $noveltyAnnouncement = new NoveltyAnnouncement();
        $novelty = $noveltyAnnouncement->createAnnouncement();

        $novelty->setTitle('Title')
            ->setDescription('Description');

        $entityManager->persist($novelty);
        $entityManager->flush();

        return $this->json([
            'message' => 'Novelty created!'
        ]);
    }

    /**
     * @Route("/users/{userId}/news/{noveltyId}", methods={"POST"})
     */
    public function announceUser(ManagerRegistry $doctrine, $userId, $noveltyId): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $novelty = $entityManager->getRepository(Novelty::class)->find($noveltyId);
        $user = $entityManager->getRepository(User::class)->find($userId);

        $novelty->announce($user);

        $entityManager->persist($novelty);
        $entityManager->flush();

        return $this->json([
            'message' => 'User announced!'
        ]);
    }
}
