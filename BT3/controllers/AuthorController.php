<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class AuthorController
{
    private $twig;
    private $authorService;

    public function __construct()
    {
        $loader = new FilesystemLoader('views');
        $this->twig = new Environment($loader);

        $this->authorService = new AuthorService();
    }

    public function index()
    {
        AuthController::checkUser();

        $authors = $this->authorService->getAll();

        $content = $this->twig->render('admin/author/author.twig', [
            'authors' => $authors,
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function add()
    {
        AuthController::checkUser();

        if (isset($_GET['error'])) {
            echo "<script>alert({$_GET['error']})</script>";
        }

        $content = $this->twig->render('admin/author/add_author.twig', [
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function insert()
    {
        $this->authorService->insert();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./authors");

        if (isset($_GET['error'])) {
            echo "<script>alert({$_GET['error']})</script>";
        }

        $author = $this->authorService->get($id);
        $content = $this->twig->render('admin/author/edit_author.twig', [
            'author' => $author,
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function update()
    {
        $this->authorService->update();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./authors");

        echo "
        <script> if (confirm('Are you sure you want to delete this item?')) 
            window.location.href = './author/delete?id=$id';
        else window.location.href = './authors';
        </script>";
    }

    public function remove()
    {
        $this->authorService->delete();
    }
}
