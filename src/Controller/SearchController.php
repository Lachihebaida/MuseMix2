<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function searchAction(Request $request)
    {
        $searchFilter = $request->request->get('search_filter');
        switch ($searchFilter) {
            case 'music':
                // Filtrer les résultats par musiques
                $results = $this->getDoctrine()->getRepository(Music::class)->findBy([
                    // Conditions de filtrage pour les musiques
                ]);
                break;
            case 'category':
                // Filtrer les résultats par catégories
                $results = $this->getDoctrine()->getRepository(Category::class)->findBy([
                    // Conditions de filtrage pour les catégories
                ]);
                break;
            case 'artist':
                // Filtrer les résultats par artistes
                $results = $this->getDoctrine()->getRepository(Artist::class)->findBy([
                    // Conditions de filtrage pour les artistes
                ]);
                break;
            default:
                // Aucun filtre sélectionné ou filtre invalide
                // Gérer le cas par défaut
                break;
        }

        // Passez les résultats à votre template pour les afficher
        return $this->render('search/results.html.twig', [
            'results' => $results,
        ]);
    }
}

    
