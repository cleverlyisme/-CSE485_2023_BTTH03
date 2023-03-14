<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class AdminController
{
    private $twig;
    private $articleService;
    private $categoryService;
    private $authorService;
    private $userService;

    public function __construct()
    {
        $loader = new FilesystemLoader('views');
        $this->twig = new Environment($loader);

        $this->articleService = new ArticleService();
        $this->categoryService = new CategoryService();
        $this->authorService = new AuthorService();
        $this->userService = new userService();
    }

    public function index()
    {
        AuthController::checkUser();

        $countUsers = $this->userService->getCount();
        $countArticles = $this->articleService->getCount();
        $countAuthors = $this->authorService->getCount();
        $countCategories = $this->categoryService->getCount();

        $content = $this->twig->render('admin/home/home.twig', [
            'countUsers' => $countUsers,
            'countArticles' => $countArticles,
            'countAuthors' => $countAuthors,
            'countCategories' => $countCategories,
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }
}
