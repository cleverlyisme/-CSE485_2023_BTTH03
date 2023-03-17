<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class CategoryController
{
    private $twig;
    private $categoryService;

    public function __construct()
    {
        $loader = new FilesystemLoader('views');
        $this->twig = new Environment($loader);

        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        AuthController::checkUser();

        $categories = $this->categoryService->getAll();

        $content = $this->twig->render('admin/category/category.twig', [
            'categories' => $categories,
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

        $content = $this->twig->render('admin/category/add_category.twig', [
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function insert()
    {
        $this->categoryService->insert();
    }

    public function edit()
    {
        AuthController::checkUser();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ../categories");

        if (isset($_GET['error'])) {
            echo "<script>alert({$_GET['error']})</script>";
        }

        $category = $this->categoryService->get($id);

        $content = $this->twig->render('admin/category/edit_category.twig', [
            'category' => $category,
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function update()
    {
        $this->categoryService->update();
    }

    public function delete()
    {
        AuthController::checkUser();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./categories");

        echo "
        <script> if (confirm('Are you sure you want to delete this item?')) 
            window.location.href = './category/delete?id=$id';
        else window.location.href = './categories';
        </script>";
    }

    public function remove()
    {
        $this->categoryService->delete();
    }
}