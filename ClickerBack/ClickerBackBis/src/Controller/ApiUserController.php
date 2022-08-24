<?php

namespace App\Controller;

use App\Entity\BasicResources;
use App\Entity\User;
use App\Repository\UserRepository;
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
     * @Route("/api/user/slug/{slug}", name="api_user_slug", methods={"GET"})
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
    public function createUser(UserRepository $userRepository ,EntityManagerInterface $entityManager, Request $request, UserPasswordHasherInterface $hasher)
    {
        $data = $request->getContent();
        $dataDecoded = json_decode($data);

        $user = new User;
        $user->setNameUser($dataDecoded->nameUser);
        $user->setEmail($dataDecoded->email);
        $user->setPassword($dataDecoded->password);
        $user->setRoles(["ROLE_USER"]);
        $password = $user->getPassword();
        $passHasher = $hasher->hashPassword($user, $password);
        $user->setPassword($passHasher);

        $entityManager->persist($user);
        

        // $ore = ["Fer", "Cuivre", "Charbon", "Pierre", "Pétrole", "Eau"];
        
        // foreach($ore as $value){
        //     $basicResources = new BasicResources;
        //     $basicResources->setBasicResourcesName($value);
        //     $basicResources->setBasicResourcesCount(0);
        //     $basicResources->setBasicResourcesByClick(1);
        //     $basicResources->setBasicResourcesByAutoIncrement(1);
        //     if($value === "Fer" or $value === "Cuivre"){
        //         $basicResources->setBasicResourcesStatus(true);
        //     } else {
        //         $basicResources->setBasicResourcesStatus(false);
        //     }

        //     $trueUser = $userRepository->find($request->request->get('user'));

        //     $basicResources->addUser($trueUser);

        //     $entityManager->persist($basicResources);
            
        // }

        $entityManager->flush();

        return $this->json(
            [],
            Response::HTTP_CREATED,
            [],
            ['groups' => ['show_user']]
        );
    }

}
