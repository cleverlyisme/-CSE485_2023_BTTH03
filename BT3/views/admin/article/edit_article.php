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
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
            <form action="?controller=article&action=update" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã bài viết</span>
                    <input type="text" class="form-control" name="ma_bviet" readonly value=<?= $article['ma_bviet'] ?>>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên bài viết</span>
                    <input type="text" class="form-control" name="tieude" value="<?= $article['tieude'] ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblSongName">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat" value="<?= $article['ten_bhat'] ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCategory">Thể loại</span>
                    <select id="categories" class="px-2" name="ma_tloai">
                        <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category['ma_tloai'] ?>" <?= $category['ten_tloai'] == $article['ten_tloai'] ? "selected" : "" ?>>
                            <?= $category['ten_tloai'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                    <textarea class="form-control" aria-label="With textarea" name="tomtat"><?= $article['tomtat'] ?></textarea>
                </div>

                <div class="input-group mt-3 mb-3 flex-nowrap">
                    <span class="input-group-text" id="lblCatName">Nội dung</span>
                    <textarea id="ckeditor" class="form-control" aria-label="With textarea" name="noidung"><?= $article['noidung'] ?></textarea>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tác giả</span>
                    <select id="authors" class="px-2" name="ma_tgia">
                        <?php foreach ($authors as $author) { ?>
                        <option value="<?= $author['ma_tgia'] ?>" <?= $author['ten_tgia'] == $article['ten_tgia'] ? "selected" : "" ?>>
                            <?= $author['ten_tgia'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Ngày viết</span>
                    <input type="date" class="form-control" name="ngayviet" value="<?= date_format(date_create($article['ngayviet']), "Y-m-d") ?>">
                </div>

                <div class="input-group mt-3 mb-3 align-items-center flex-nowrap">
                    <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                    <div class="song-img px-5"><img src="./assets/images/songs/<?= $article['hinhanh'] ?>" alt="Image"></div>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Cập nhật ảnh</span>
                    <input type="file" class="form-control" name="imgUpload" placeholder="Đổi ảnh">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" name="submit" value="Lưu lại" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    include APP_ROOT . '/views/includes/footer.php';
?>