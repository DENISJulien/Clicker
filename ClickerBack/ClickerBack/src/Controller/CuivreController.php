<?php

namespace App\Controller;

use App\Entity\Cuivre;
use App\Repository\CuivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CuivreController extends AbstractController
{
    /**
     * @Route("api/cuivre/{id}", name="api_cuivre_id", methods={"GET"})
     */
    public function ShowFer(Cuivre $cuivre): Response
    {
        return $this->json(
            $cuivre,
            200,
            [],
            ['groups'=> ['list_cuivre']]
        );
    }

    /**
     * @Route("api/edit/cuivre/{id}", name="api_edit_cuivre_byclick_id", methods={"POST"})
     */
    public function AddCuivreByClick(EntityManagerInterface $entityManager,Request $request, Cuivre $cuivre): Response
    {
        $data = $request->getcontent();
        $dataDecoded = json_decode($data);

        if(isset($dataDecoded->cuivreByClick)){
            $cuivre->setCuivreCount($dataDecoded->cuivreByClick + $cuivre->getCuivreCount());
        }
        
        if(isset($dataDecoded->cuivreByAutoIncrement)){
            $cuivre->setCuivreCount($dataDecoded->cuivreByAutoIncrement + $cuivre->getCuivreCount());
        }

        if(isset($dataDecoded->cuivreLevel) and isset($dataDecoded->cuivrePrice) and $cuivre->getCuivrePrice() <= $cuivre->getCuivreCount()){
            $cuivre->setCuivreLevel($dataDecoded->cuivreLevel + $cuivre->getCuivreLevel());
            $cuivre->setCuivreByAutoIncrement(round(($cuivre->getCuivreByAutoIncrement() * 0.12) + $cuivre->getCuivreByAutoIncrement(),2));
            $cuivre->setCuivreCount(round($cuivre->getCuivreCount() - $cuivre->getCuivrePrice()));
            $cuivre->setCuivrePrice(round(($cuivre->getCuivrePrice() * 0.15) + $cuivre->getCuivrePrice(),2));
        }

        $entityManager->persist($cuivre);
        $entityManager->flush();

        return $this->json(
            $cuivre,
            200,
            [],
            ['groups'=> ['list_cuivre']]
        );
    }
}
