<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(CategoryRepository $categoryRepository): Response
    {   
         // on récupère tout les category
        $categories = $categoryRepository->findAll();
        // on rend la page en lui passant la liste des category
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    #[Route('/category/{slug}', name: 'app_category_show')]
    public function showMusic($slug, CategoryRepository $categoryRepository): Response
    {
        //on récupère le category correspondant au slug
        $category = $categoryRepository->findOneBy(['slug' => $slug]);
        //on rend la page en lui passant le category
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }
}