<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AlimentController extends AbstractController
{
    /**
     * @Route("/aliments", name="aliments")
     */
    public function aliments(AlimentRepository $alimentRepository, PaginatorInterface $paginator, Request $request)
    {
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $paginator->paginate(
                $alimentRepository->findAllWithPagination(),
                $request->query->getInt('page', 1),
                10
            ),
        ]);
    }
}
