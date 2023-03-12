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

    public function index()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./home");

        $data = $this->articleService->get($id);

        include("views/detail/detail.php");
    }
}
