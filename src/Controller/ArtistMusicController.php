<?php

namespace App\Controller;

use App\Entity\Music;
use App\Form\Music1Type;
use App\Repository\MusicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\ExpressionLanguage\Expression;

#[Route('/artist/music')]
class ArtistMusicController extends AbstractController
{
    // #[Route('/', name: 'app_artist_music_index', methods: ['GET'])]
    // public function index(MusicRepository $musicRepository): Response
    // {
    //     return $this->render('artist_music/index.html.twig', [
    //         'music' => $musicRepository->findAll(),
    //     ]);
    // }


    // #[IsGranted(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_ARTISTE")'))]
    #[Route('/new', name: 'app_artist_music_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MusicRepository $musicRepository): Response
        
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'ROLE_ARTISTE');
        $music = new Music();
        $form = $this->createForm(Music1Type::class, $music);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $musicRepository->save($music, true);

            return $this->redirectToRoute('app_profil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('artist_music/new.html.twig', [
            'music' => $music,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_artist_music_show', methods: ['GET'])]
    public function show(Music $music): Response
    {
        return $this->render('artist_music/show.html.twig', [
            'music' => $music,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_artist_music_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Music $music, MusicRepository $musicRepository): Response
    {
        $form = $this->createForm(Music1Type::class, $music);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $musicRepository->save($music, true);

            return $this->redirectToRoute('app_profil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('artist_music/edit.html.twig', [
            'music' => $music,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_artist_music_delete', methods: ['POST'])]
    public function delete(Request $request, Music $music, MusicRepository $musicRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$music->getId(), $request->request->get('_token'))) {
            $musicRepository->remove($music, true);
        }

        return $this->redirectToRoute('app_profil', [], Response::HTTP_SEE_OTHER);
    }
}