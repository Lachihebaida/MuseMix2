<?php

namespace App\Controller;

use App\Entity\Music;
use App\Form\MusicType;
use App\Repository\MusicRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use DateTimeImmutable;
use App\Form\DateTimeType;

#[Route('/admin/music')]
class AdminMusicController extends AbstractController
{
    #[Route('/', name: 'app_admin_music_index', methods: ['GET'])]
    public function index(MusicRepository $musicRepository): Response
    {
        return $this->render('admin_music/index.html.twig', [
            'music' => $musicRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_music_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MusicRepository $musicRepository, SluggerInterface $slugger): Response
    {
        $music = new Music();
        $music->setUpdatedAt(new DateTimeImmutable());
        $form = $this->createForm(MusicType::class, $music);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $music->setSlug(strtolower($slugger->slug($music->getTitle())));
            // Ajout de cette ligne pour générer le slug automatiquement
            $music->setTitle(ucfirst($music->getTitle()));
            //Ajout de cette ligne pour générer une majuscule automatiquement au début du nom
            $musicRepository->save($music, true);

            return $this->redirectToRoute('app_admin_music_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_music/new.html.twig', [
            'music' => $music,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_music_show', methods: ['GET'])]
    public function show(Music $music): Response
    {
        return $this->render('admin_music/show.html.twig', [
            'music' => $music,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_music_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Music $music, MusicRepository $musicRepository): Response
    {
        $form = $this->createForm(MusicType::class, $music);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $musicRepository->save($music, true);

            return $this->redirectToRoute('app_admin_music_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_music/edit.html.twig', [
            'music' => $music,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_music_delete', methods: ['POST'])]
    public function delete(Request $request, Music $music, MusicRepository $musicRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$music->getId(), $request->request->get('_token'))) {
            $musicRepository->remove($music, true);
        }

        return $this->redirectToRoute('app_admin_music_index', [], Response::HTTP_SEE_OTHER);
    }
}
