<?php
// include 'views/includes/boostrap.php';
class AdminController
{
    private $articleService;
    private $categoryService;
    private $authorService;
    private $userService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
        $this->categoryService = new CategoryService();
        $this->authorService = new AuthorService();
        $this->userService = new userService();
    }

    public function index()
    {
        $countUsers = $this->userService->getCount();
        $countArticles = $this->articleService->getCount();
        $countAuthors = $this->authorService->getCount();
        $countCategories = $this->categoryService->getCount();

        include("views/admin/home/home.php");
    }
}
