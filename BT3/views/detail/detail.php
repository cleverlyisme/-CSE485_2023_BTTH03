<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/header.php';
?>
<main class="container mt-5">
    <div class="row mb-5">
        <div class="col-sm-4">
            <img src="./assets/images/songs/<?= $data['hinhanh']?>" class="img-fluid" alt="Song">
        </div>
        <div class="col-sm-8">
            <h5 class="card-title mb-2">
                <a href="#" class="text-decoration-none"><?= $data['tieude'] ?></a>
            </h5>
            <p class="card-text"><span class=" fw-bold">Bài hát: </span><?= $data['ten_bhat'] ?></p>
            <p class="card-text"><span class=" fw-bold">Thể loại: </span><?= $data['ten_tloai']?></p>
            <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?= $data['tomtat'] ?></p>
            <p class="card-text"><span class=" fw-bold">Nội dung: </span><?= $data['noidung'] ?></p>
            <p class="card-text"><span class=" fw-bold">Tác giả: </span><?= $data['ten_tgia'] ?></p>
        </div>
    </div>
</main>
<?php
    include APP_ROOT . '/views/includes/footer.php';
?>