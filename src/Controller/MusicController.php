<?php

namespace App\Controller;
use App\Entity\Music;
use App\Form\AddMusicFormType;

use App\Repository\MusicRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Http\Attribute\IsGranted as AttributeIsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class MusicController extends AbstractController
{
    #[Route('/music', name: 'app_music')]
    public function index (MusicRepository $musicRepository, Request $request): Response
    {
        // dd($request->request->get('search-query'));
        if(!is_null($request->request->get('search-query'))){
            $musics = $musicRepository->findMusic($request->request->get('search-query'));
        }else{
            $musics = $musicRepository->findAll();
        }
        // on récupère tout les musics
       
        // on rend la page en lui passant la liste des musics
        return $this->render('music/index.html.twig', [
            'musics' => $musics,
        ]);
       
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