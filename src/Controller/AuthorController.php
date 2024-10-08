<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'message' => 'Bonjour mes etudiants',
        ]);
    }
    #[Route ('/author/{name}', name:'show_author')]
    public function showAuthor(string $name): Response
    {
        return $this ->render("author/show.html.twig",['name'=>$name,]);
    }
    #[Route('/authors', name: 'list_authors')]
    public function listAuthors(): Response
{
    $authors = array(
        array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/images/william-shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200),
        array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
    );

    return $this->render('author/list.html.twig', [
        'authors' => $authors,
    ]);
}
 #[Route ('/author_details/{id}', name:'author_details')]
public function author_details(int $id): Response

{ $authors = array(
    array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100),
    array('id' => 2, 'picture' => '/images/william-shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200),
    array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
  );

// Recherche l'auteur correspondant à l'ID
$author = array_filter($authors, fn($author) => $author['id'] === $id);
$author = reset($author); // Récupérer le premier élément de l'array filtré

return $this->render("author/tab.html.twig", ['author' => $author]);
    
}

}
