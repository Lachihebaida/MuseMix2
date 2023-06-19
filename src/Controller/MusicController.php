<?php

namespace App\Controller;

use App\Entity\Music;
use App\Repository\MusicRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MusicController extends AbstractController
{
    #[Route('/music', name: 'app_music')]
    public function index (MusicRepository $musicRepository): Response 
    {
        {   
            // on récupère tout les musics
           $musics = $musicRepository->findAll();
           // on rend la page en lui passant la liste des musics
           return $this->render('music/index.html.twig', [
               'musics' => $musics,
           ]);
       }
    }
       #[Route('/music/{slug}', name: 'app_music_show')]
       public function showMusic($slug, MusicRepository $musicRepository): Response
       {
           //on récupère le music correspondant au slug
           $music = $musicRepository->findOneBy(['slug' => $slug]);
           //on rend la page en lui passant le music
           return $this->render('music/show.html.twig', [
               'music' => $music,
           ]);
       }
   
}
