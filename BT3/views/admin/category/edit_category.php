<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/headerAdmin.php';
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
            <form method="post" action="?controller=category&action=update">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                    <input type="text" class="form-control" name="ma_tloai" value="<?= $category['ma_tloai'] ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                    <input type="text" class="form-control" name="ten_tloai" value="<?= $category['ten_tloai'] ?>">
                </div>


                <button type="submit"  class="btn btn-success">Lưu lại</button>
                <a href="?controller=category" class="btn btn-warning ">Quay lại</a>

            </form>
        </div>
    </div>
</main>
<?php
    include APP_ROOT . '/views/includes/footer.php';
?>