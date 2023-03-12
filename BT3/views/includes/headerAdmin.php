<?php
    $paths = [
        ['name' => 'Trang ngoài', 'path' => '?controller=home', 'include' => 'homepage'],
        ['name' => 'Thể loại', 'path' => '?controller=category', 'include' => 'category'],
        ['name' => 'Tác giả', 'path' => '?controller=author', 'include' => 'author'],
        ['name' => 'Bài viết', 'path' => '?controller=article', 'include' => 'article'],
    ];

    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ?controller=auth");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style_login.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse px-5" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= count(array_filter($paths, function($path) {
                                return str_contains($_SERVER['REQUEST_URI'], $path['path']);
                            })) === 0 ? 'active' : '' ?>" aria-current="page" href="?controller=admin">Trang chủ</a>
                        </li>
                        <?php foreach($paths as $path) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= str_contains($_SERVER['REQUEST_URI'], $path['include']) ? 'active' : '' ?>" aria-current="page"
                                href="<?= $path['path'] ?>"><?= $path['name'] ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <a href="?controller=auth&action=logout">
                        <div class="align-self-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header>