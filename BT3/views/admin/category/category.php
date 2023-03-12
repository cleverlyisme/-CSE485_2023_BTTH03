<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/headerAdmin.php';
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="?controller=category&action=add" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($data){
                            foreach($data as $row){
                    ?>
                    <tr>
                        <th><?= $row['ma_tloai']; ?></th>
                        <td><?= $row['ten_tloai']; ?></td>
                        <td>
                            <a href="?controller=category&action=edit&id=<?= $row['ma_tloai'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="<?= "?controller=category&action=delete&id=" . $row['ma_tloai'] ?>" name="delete"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                                }
                            } 
                            else {
                                ?>
                    <td>No Record Found</td>
                    <?php
                            }
                    ?>




                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
    include APP_ROOT . '/views/includes/footer.php';
?>