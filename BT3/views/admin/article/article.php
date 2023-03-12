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
            <a href="?controller=article&action=add" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tên bài hát</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Tóm tắt</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày viết</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $baiviet) {?>
                    <tr>
                        <th scope="row"><?= $baiviet['ma_bviet'] ?></th>
                        <td scope="row"><?= $baiviet['tieude'] ?></td>
                        <td scope="row"><?= $baiviet['ten_bhat'] ?></td>
                        <td scope="row"><?= $baiviet['ten_tloai'] ?></td>
                        <td scope="row"><?= $baiviet['tomtat'] ?></td>
                        <td scope="row"><?= $baiviet['ten_tgia'] ?></td>
                        <td scope="row"><?= $baiviet['ngayviet'] ?></td>
                        <td scope="row" class="song-img">
                            <img src="./assets/images/songs/<?= $baiviet['hinhanh'] ?>" alt="Bài viết">
                        </td>
                        <td>
                            <a href="<?= "?controller=article&action=edit&id=" . $baiviet['ma_bviet'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="<?= "?controller=article&action=delete&id=" . $baiviet['ma_bviet'] ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
    include APP_ROOT . '/views/includes/footer.php';
?>