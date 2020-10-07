<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', []);
    }
}
