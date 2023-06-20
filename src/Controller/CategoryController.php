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
        $categorys = $categoryRepository->findAll();
        // on rend la page en lui passant la liste des category
        return $this->render('category/index.html.twig', [
            'category' => $categorys,
        ]);
    }
    #[Route('/category/{slug}', name: 'app_category_show')]
    public function showCategory($slug, CategoryRepository $categoryRepository): Response
    {
        //On récupère la catégorie correspondant au slug
        $category = $categoryRepository->findOneBy(['slug' => $slug]);
        //on rend la page en lui passant le category
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }
}