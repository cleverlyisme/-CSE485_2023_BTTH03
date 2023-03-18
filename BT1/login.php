<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // var_dump($_SERVER);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user   = $_POST['txtUser'];
            $pass1  = $_POST['txtPass1'];
            // Kiểm
                // Kiểm tra Tài khoản nó đã TỒN TẠI CHƯA
                try{
                    $conn = mysqli_connect('localhost','root','','demo_membershipv2');
                }catch(Exception $e){
                    echo $e->getMessage();
                }
                $select_sql = "SELECT * FROM users WHERE username = '$user' OR email='$user'";
                $result_sql = mysqli_query($conn,$select_sql);
                if(mysqli_num_rows($result_sql) > 0){
                    $row = mysqli_fetch_assoc($result_sql);
                    $password_saved = $row['password'];
                    if(password_verify($pass1, $password_saved) && $row['is_activated']==1){
                        // Tạo phiên
                        session_start();
                        $_SESSION['user'] = $user;
                        $_SESSION['role'] = $row['membership_level'];
                        if($_SESSION['role'] == 'admin'){
                            header("Location: admin.php");
                        }else{
                            // Chuyển hướng
                        header("Location: member.php");
                        }
                    }else{
                        echo "<p style='color:red'>Vui lòng kiểm tra mật khẩu</p>"; 
                    }
                }else{
                    echo "<p style='color:red'>Tài khoản không tồn tại. Vui lòng kiểm tra lại</p>"; 
                }
            }
    ?>
    <form action="login.php" method="post">
        Username: <input type="text" name="txtUser" id="">
        Password: <input type="password" name="txtPass1" id="">
        <button type="submit">Login</button>
    </form>
</body>
</html>