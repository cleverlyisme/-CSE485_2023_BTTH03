<?php

require_once './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Response;

class AuthController
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
        session_start();

        $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

        if (isset($_SESSION['user'])) header('Location: ../admin');

        if (isset($_GET['error'])) {
            echo "<script>alert({$_GET['error']})</script>";
        }

        $content = $this->twig->render('login/login.twig', [
            'username' => $username,
            'password' => $password,
            'APP_ROOT' => $_SERVER['REQUEST_URI']
        ]);
        $response = new Response($content);
        return $response;
    }

    public function login()
    {
        session_start();

        if (isset($_POST['btnLogin'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember = $_POST['remember'];

            $user = $this->userService->login($username, $password);

            if ($user) {
                if ($remember) {
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                } else {
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                }

                $_SESSION['user'] = $username;

                header("Location: ../admin/home");
                exit();
            } else {
                header("Location: ../auth?error='Invalid username or passowrd'");
                exit();
            }
        }
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header("Location: ../auth");
        exit();
    }

    public static function checkUser()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: ../auth");
            exit();
        }
    }
}
