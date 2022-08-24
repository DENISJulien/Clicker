<?php

namespace App\Controller;

use App\Entity\BasicResources;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiResourcesController extends AbstractController
{
    /**
     * @Route("/api/resources/create", name="api_resources_create", methods={"POST"})
     */
    public function createUser(UserRepository $userRepository ,EntityManagerInterface $entityManager, Request $request)
    {
        $data = $request->getContent();
        $dataDecoded = json_decode($data);

        $ore = ["Fer", "Cuivre", "Charbon", "Pierre", "Pétrole", "Eau"];
        
        foreach($ore as $value){
            $basicResources = new BasicResources;
            $basicResources->setBasicResourcesName($value);
            $basicResources->setBasicResourcesCount(0);
            $basicResources->setBasicResourcesByClick(1);
            $basicResources->setBasicResourcesByAutoIncrement(1);
            if($value === "Fer" or $value === "Cuivre"){
                $basicResources->setBasicResourcesStatus(true);
            } else {
                $basicResources->setBasicResourcesStatus(false);
            }
            
            $trueUser = $userRepository->find($dataDecoded->user); 
            $basicResources->addUser($trueUser);

            $entityManager->persist($basicResources);
            
        }

        $entityManager->flush();

        return $this->json(
            [],
            Response::HTTP_CREATED,
            [],
            ['groups' => ['show_user']]
        );
    }
}
