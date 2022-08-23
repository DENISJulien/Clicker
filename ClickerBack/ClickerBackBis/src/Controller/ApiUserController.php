<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ApiUserController extends AbstractController
{
    /**
     * @Route("/api/user/{id}", name="api_user_id", methods={"GET"})
     */
    public function showUser(User $user = null)
    {

        return $this->json(
            $user,
            Response::HTTP_OK,
            [],
            ['groups' => 'show_user']
        );
    }

    /**
     * @Route("/api/user/slug/{slug_user}", name="api_user_slug", methods={"GET"})
     */
    public function showUserBySlug(User $user = null)
    {
        
        return $this->json(
            $user,
            Response::HTTP_OK,
            [],
            ['groups' => 'show_user']
        );
    }

    /**
     * @Route("/api/user/create", name="api_user_create", methods={"POST"})
     */
    public function createUser(EntityManagerInterface $entityManager, Request $request, UserPasswordHasherInterface $hasher)
    {
        $data = $request->getContent();
        $dataDecoded = json_decode($data);
        // dd($request);
        $newUser = new User;

        $newUser->setNameUser($dataDecoded->nameUser);
        $newUser->setEmail($dataDecoded->email);
        $newUser->setPassword($dataDecoded->password);
        $newUser->setRoles(["ROLE_USER"]);

        $password = $newUser->getPassword();
        $passHasher = $hasher->hashPassword($newUser, $password);
        $newUser->setPassword($passHasher);

        $entityManager->persist($newUser);
        $entityManager->flush();
        
        return $this->json(
            [],
            Response::HTTP_CREATED,
            [],
            ['groups' => ['show_user']]
        );
    }

}
