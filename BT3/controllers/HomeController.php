<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    private $twig;
    private $articleService;

    public function __construct()
    {
        $loader = new FilesystemLoader('views');
        $this->twig = new Environment($loader);

        $this->articleService = new ArticleService();
    }

    public function index()
    {
        $articles = $this->articleService->getAll();

        $content = $this->twig->render('home/index.twig', [
            'articles' => $articles,
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function search()
    {
        $articles = $_POST['search'] ?
            $this->articleService->getByName($_POST['search'])
            : $this->articleService->getAll();

        $content = $this->twig->render(
            'home/index.twig',
            ['articles' => $articles, 'APP_ROOT' => $_SERVER['REQUEST_URI']]
        );
        $response = new Response($content);
        return $response;
    }
}
