<?php
// include 'views/includes/boostrap.php';
class CategoryController
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        $data = $this->categoryService->getAll();
        include("views/admin/category/category.php");
    }

    public function add()
    {

        include("views/admin/category/add_category.php");
    }

    public function insert()
    {
        $insert = $this->categoryService->insert();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=category");

        $category = $this->categoryService->get($id);

        include("views/admin/category/edit_category.php");
    }
    public function update()
    {
        $this->categoryService->update();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=category");

        echo "
        <script> if (confirm('Are you sure you want to delete this item?')) 
            window.location.href = '?controller=category&action=remove&id=$id';
        else window.location.href = '?controller=category';
        </script>";
    }
    public function remove()
    {
        $this->categoryService->delete();
    }
}
