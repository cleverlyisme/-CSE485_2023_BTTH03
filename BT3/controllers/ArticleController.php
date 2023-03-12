<?php
// include 'views/includes/boostrap.php';
class ArticleController
{
    private $articleService;
    private $categoryService;
    private $authorService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
        $this->categoryService = new CategoryService();
        $this->authorService = new AuthorService();
    }

    public function index()
    {
        $data = $this->articleService->getAll();

        include("views/admin/article/article.php");
    }

    public function add()
    {
        $categories = $this->categoryService->getAll();
        $authors = $this->authorService->getAll();

        include("views/admin/article/add_article.php");
    }

    public function insert()
    {
        $this->articleService->insert();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=article");

        $article = $this->articleService->get($id);
        $categories = $this->categoryService->getAll();
        $authors = $this->authorService->getAll();

        include("views/admin/article/edit_article.php");
    }

    public function update()
    {
        $this->articleService->update();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=article");

        echo "
        <script> if (confirm('Are you sure you want to delete this item?')) 
            window.location.href = '?controller=article&action=remove&id=$id';
        else window.location.href = '?controller=article';
        </script>";
    }

    public function remove()
    {
        $this->articleService->delete();
    }
}
