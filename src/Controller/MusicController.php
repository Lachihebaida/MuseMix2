<?php

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

// class MusicController extends AbstractController
// {
//     #[Route('/music', name: 'app_music')]
//     public function index(): Response
//     {
//         return $this->render('music/index.html.twig', [
//             'controller_name' => 'MusicController',
//         ]);
//     }
// }
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

//     // Anna pour Artist
    
//     // /**
//     //  * @IsGranted("ROLE_USER")
//     //  */
//     #[IsGranted("ROLE_USER")]
//     #[Route('/music/new', name: 'add_music')]
// public function addMusic(Request $request, MusicRepository $musicRepository, SluggerInterface $slugger)
// {
//     $music = new Music();
//     $form = $this->createForm(AddMusicFormType::class, $music);
//     $form->handleRequest($request);

//     if($form->isSubmitted() && $form->isValid()){
//         $music->setSlug(strtolower($slugger->slug($music->getTitle())));
//         $music->setTitle(ucfirst($music->getTitle()));
        
//         $musicRepository->save($music, true);
        
//     }
//     return $this->render('music/add.html.twig', [
//         'musicForm' => $form->createView()
//     ]);
// }

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