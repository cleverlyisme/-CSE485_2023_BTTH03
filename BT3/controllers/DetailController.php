<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class DetailController
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

    public function index($params)
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./home");

        $article = $this->articleService->get($id);

        if (!$article) header("Location: ./home");

        $content = $this->twig->render('detail/detail.twig', ['article' => $article]);
        $response = new Response($content);
        return $response;
    }
}
