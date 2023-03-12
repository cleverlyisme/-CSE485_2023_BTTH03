<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/headerAdmin.php';
?>
<main class="container mt-5 mb-5">
    <?php
        if(isset($_GET['error'])){
            echo "<script>alert({$_GET['error']})</script>";
        }
    ?>
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="?controller=author&action=update" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                    <input type="text" class="form-control" readonly name="ma_tgia" value="<?= $author['ma_tgia'] ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="ten_tgia" value="<?= $author['ten_tgia'] ?>">
                </div>

                <div class="input-group mt-3 mb-3 align-items-center flex-nowrap">
                    <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                    <div class="song-img px-5"><img src="./assets/images/author/<?= $author['hinh_tgia'] ?>">
                    </div>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Cập nhật ảnh</span>
                    <input type="file" class="form-control" name="imgUpload" placeholder="Đổi ảnh">
                </div>

                <input type="submit" name="submit" value="Lưu lại" class="btn btn-success">
                <a href="?controller=author" class="btn btn-warning ">Quay lại</a>

            </form>
        </div>
    </div>
</main>

<?php
    include APP_ROOT . '/views/includes/footer.php';
?>