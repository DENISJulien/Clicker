<?php

namespace App\Controller;

use App\Entity\Fer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FerController extends AbstractController
{
    /**
     * @Route("api/fer/{id}", name="api_fer_id", methods={"GET"})
     * Premet d'afficher les informations pour le fer
     */
    public function ShowFer(Fer $fer): Response
    {
        return $this->json(
            $fer,
            200,
            [],
            ['groups'=> ['list_fer']]
        );
    }

    /**
     * @Route("api/edit/fer/{id}", name="api_edit_fer_id", methods={"POST"})
     */
    public function EditFer(EntityManagerInterface $entityManager,Request $request, Fer $fer): Response
    {
        $data = $request->getcontent();
        $dataDecoded = json_decode($data);

        // ajoute la valeur du clic a count
        if(isset($dataDecoded->ferByClick)){
            $fer->setFerCount($dataDecoded->ferByClick + $fer->getFerCount());
        }
        
        // ajoute la caluer de l'autoincrement a count
        if(isset($dataDecoded->ferByAutoIncrement)){
            $fer->setFerCount($dataDecoded->ferByAutoIncrement + $fer->getFerCount());
        }

        // 1 est envoyé depuis ferLevel pour ajouter 1 à level
        // ajoute 12% à autoincrement
        // ajoute 15% au prix si le prix est inferieure au count
        if(isset($dataDecoded->ferLevel) and isset($dataDecoded->ferPrice) and $fer->getFerPrice() <= $fer->getFerCount()){
            $fer->setFerLevel($dataDecoded->ferLevel + $fer->getFerLevel());
            $fer->setFerByAutoIncrement(round(($fer->getFerByAutoIncrement() * 0.12) + $fer->getFerByAutoIncrement(),2));
            $fer->setFerCount(round($fer->getFerCount() - $fer->getFerPrice()));
            $fer->setFerPrice(round(($fer->getFerPrice() * 0.15) + $fer->getFerPrice(),2));
        }
        
        $entityManager->persist($fer);
        $entityManager->flush();

        return $this->json(
            $fer,
            200,
            [],
            ['groups'=> ['list_fer']]
        );
    }
}
