<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    private $twig;
    private $articleService;
    private $categoryService;
    private $authorService;

    public function __construct()
    {
        $loader = new FilesystemLoader('views');
        $this->twig = new Environment($loader);

        $this->articleService = new ArticleService();
        $this->categoryService = new CategoryService();
        $this->authorService = new AuthorService();
    }

    public function index()
    {
        AuthController::checkUser();

        $articles = $this->articleService->getAll();

        $content = $this->twig->render('admin/article/article.twig', [
            'articles' => $articles,
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

        $categories = $this->categoryService->getAll();
        $authors = $this->authorService->getAll();

        $content = $this->twig->render('admin/article/add_article.twig', [
            'categories' => $categories,
            'authors' => $authors,
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function insert()
    {
        $this->articleService->insert();
    }

    public function edit()
    {
        AuthController::checkUser();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./articles");

        if (isset($_GET['error'])) {
            echo "<script>alert({$_GET['error']})</script>";
        }

        $article = $this->articleService->get($id);
        $categories = $this->categoryService->getAll();
        $authors = $this->authorService->getAll();

        $article_date = date_format(date_create($article->getDate()), "Y-m-d");

        $content = $this->twig->render('admin/article/edit_article.twig', [
            'article' => $article,
            'article_date' => $article_date,
            'categories' => $categories,
            'authors' => $authors,
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function update()
    {
        $this->articleService->update();
    }

    public function delete()
    {
        AuthController::checkUser();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./articles");

        echo "
        <script> if (confirm('Are you sure you want to delete this item?')) 
            window.location.href = './article/delete?id=$id';
        else window.location.href = './articles';
        </script>";
    }

    public function remove()
    {
        $this->articleService->delete();
    }
}