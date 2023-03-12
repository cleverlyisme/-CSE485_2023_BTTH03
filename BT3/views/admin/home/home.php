<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/headerAdmin.php';
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-3">
            <div class="card-box">
                <div class="mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Người dùng</a>
                        </h5>

                        <h5 class="h1 text-center">
                            <?= $countUsers ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card-box">
                <div class=" mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Thể loại</a>
                        </h5>
                        <h5 class="h1 text-center">
                            <?= $countCategories ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card-box">
                <div class="mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Tác giả</a>
                        </h5>

                        <h5 class="h1 text-center">
                            <?= $countAuthors ?>
                        </h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-3">
            <div class="card-box">
                <div class="mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Bài viết</a>
                        </h5>

                        <h5 class="h1 text-center">
                            <?= $countArticles ?>
                        </h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<?php
    include APP_ROOT . '/views/includes/footer.php';
?>