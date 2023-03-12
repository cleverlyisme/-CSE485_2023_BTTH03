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
        $this->twig->addExtension(new MyTwigExtension());

        $this->articleService = new ArticleService();
    }

    public function index()
    {
        $articles = $this->articleService->getAll();

        $content = $this->twig->render('home/index.twig', ['articles' => $articles]);
        $response = new Response($content);
        return $response;
    }

    public function search()
    {
        if (isset($_POST['search']))
            $data = $_POST['search'] != '' ?
                $this->articleService->getByName($_POST['search'])
                : $this->articleService->getAll();
        else $data = $this->articleService->getAll();

        include("views/home/index.php");
    }
}
