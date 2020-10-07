<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlimentController extends AbstractController
{
    /**
     * @Route("/aliments", name="aliments")
     */
    public function aliments(AlimentRepository $alimentRepository)
    {
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $alimentRepository->findAll(),
        ]);
    }
}
