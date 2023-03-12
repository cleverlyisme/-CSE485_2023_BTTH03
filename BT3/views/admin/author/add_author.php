<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/headerAdmin.php';
?>

<body>
    <main class="container mt-5 mb-5">
        <?php
        if(isset($_GET['error'])){
            echo "<script>alert({$_GET['error']})</script>";
        }
    ?>
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới tác giả</h3>
                <form method="POST" action="?controller=author&action=insert" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" name="ten_tgia" class="form-control" name="txtCatName">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Hình tác giả</span>
                        <input type="file" name="imgUpload" class="form-control" name="txtCatName">
                    </div>
                    <input type="submit" name="submit" value="Thêm" class="btn btn-success">
                    <a href="?controller=author" class="btn btn-warning ">Quay lại</a>
                </form>
            </div>
        </div>
    </main>

    <?php
    include APP_ROOT . '/views/includes/footer.php';
?>