<?php

namespace App\Controller;

use App\Entity\BasicResources;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BasicResourcesController extends AbstractController
{

    /**
     * @Route("api/basic/{id}", name="api_basic_id", methods={"GET"})
     * Premet d'afficher les informations pour les ressources Basic
     */
    public function ShowBasicResources(BasicResources $basicResources): Response
    {
        return $this->json(
            $basicResources,
            200,
            [],
            ['groups'=> ['list_basic']]
        );
    }

    /**
     * @Route("api/edit/basic/{id}", name="api_edit_basic_id", methods={"POST"})
     * Permet de modifier les données des ressources Basic
     */
    public function EditBasicResources(EntityManagerInterface $entityManager,Request $request,BasicResources $basicResources): Response
    {
        $data = $request->getcontent();
        $dataDecoded = json_decode($data);

        /********** FER **********/

            // ajoute la valeur du clic a count de fer
            if(isset($dataDecoded->ferByClick)){
                $basicResources->setFerCount($dataDecoded->ferByClick + $basicResources->getFerCount());
            }

            // ajoute la valeur de l'auto-increment a count de fer
            if(isset($dataDecoded->ferByAutoIncrement)){
                $basicResources->setFerCount($dataDecoded->ferByAutoIncrement + $basicResources->getFerCount());
            }

        /********** CUIVRE **********/

            // ajoute la valeur du clic a count de cuivre
            if(isset($dataDecoded->cuivreByClick)){
                $basicResources->setCuivreCount($dataDecoded->cuivreByClick + $basicResources->getCuivreCount());
            }

            // ajoute la valeur de l'auto-increment a count de cuivre
            if(isset($dataDecoded->cuivreByAutoIncrement)){
                $basicResources->setCuivreCount($dataDecoded->cuivreByAutoIncrement + $basicResources->getCuivreCount());
            }
        
        $entityManager->persist($basicResources);
        $entityManager->flush();

        return $this->json(
            $basicResources,
            200,
            [],
            ['groups'=> ['list_basic']]
        );
    }
}
