<?php

namespace App\Controller;

use App\Entity\CategorieBlog;
use App\Form\CategorieBlogType;
use App\Repository\CategorieBlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie/blog')]
class CategorieBlogController extends AbstractController
{
    #[Route('/', name: 'app_categorie_blog_index', methods: ['GET'])]
    public function index(CategorieBlogRepository $categorieBlogRepository): Response
    {
        return $this->render('categorie_blog/index.html.twig', [
            'categorie_blogs' => $categorieBlogRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorie_blog_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategorieBlogRepository $categorieBlogRepository): Response
    {
        $categorieBlog = new CategorieBlog();
        $form = $this->createForm(CategorieBlogType::class, $categorieBlog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieBlogRepository->save($categorieBlog, true);

            return $this->redirectToRoute('app_categorie_blog_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_blog/new.html.twig', [
            'categorie_blog' => $categorieBlog,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_blog_show', methods: ['GET'])]
    public function show(CategorieBlog $categorieBlog): Response
    {
        return $this->render('categorie_blog/show.html.twig', [
            'categorie_blog' => $categorieBlog,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorie_blog_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieBlog $categorieBlog, CategorieBlogRepository $categorieBlogRepository): Response
    {
        $form = $this->createForm(CategorieBlogType::class, $categorieBlog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieBlogRepository->save($categorieBlog, true);

            return $this->redirectToRoute('app_categorie_blog_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_blog/edit.html.twig', [
            'categorie_blog' => $categorieBlog,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_blog_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieBlog $categorieBlog, CategorieBlogRepository $categorieBlogRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieBlog->getId(), $request->request->get('_token'))) {
            $categorieBlogRepository->remove($categorieBlog, true);
        }

        return $this->redirectToRoute('app_categorie_blog_index', [], Response::HTTP_SEE_OTHER);
    }
}
