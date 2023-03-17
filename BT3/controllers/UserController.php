<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    private $twig;
    private $userService;

    public function __construct()
    {
        $loader = new FilesystemLoader('views');
        $this->twig = new Environment($loader);

        $this->userService = new UserService();
    }

    public function index()
    {
        AuthController::checkUser();

        if (isset($_GET['error'])) {
            echo "<script>alert({$_GET['error']})</script>";
        }

        $users = $this->userService->getAll();

        $content = $this->twig->render('admin/user/user.twig', [
            'users' => $users,
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

        $content = $this->twig->render('admin/user/add_user.twig', [
            'APP_ROOT' => $_SERVER['REQUEST_URI'],
        ]);
        $response = new Response($content);
        return $response;
    }

    public function insert()
    {
        $this->userService->insert();
    }

    public function delete($id)
    {
        AuthController::checkUser();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ./users");

        echo "
        <script> if (confirm('Are you sure you want to delete this item?')) 
            window.location.href = './user/delete?id=$id';
        else window.location.href = './users';
        </script>";
    }

    public function remove()
    {
        $this->userService->delete();
    }
}