<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
    /**
     * @Route("/aliments", name="aliments")
     */
    public function aliments()
    {
        return $this->render('aliment/aliments.html.twig', []);
    }
}
