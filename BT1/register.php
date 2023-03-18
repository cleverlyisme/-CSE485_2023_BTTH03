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
            $mail   = $_POST['txtMail'];
            $pass1  = $_POST['txtPass1'];
            $pass2  = $_POST['txtPass2'];
            if($pass1 != $pass2){
                echo "<p style='color:red'>Mật khẩu không khớp</p>";
            }
            else{

                try{
                    $conn = mysqli_connect('localhost','root','','demo_membershipv2');
                   }
                catch(Exception $e){
                    echo $e->getMessage();
                }
                $select_sql = "SELECT * FROM users WHERE username = '$user' OR email='$mail'";
                $result_sql = mysqli_query($conn,$select_sql);
                if(mysqli_num_rows($result_sql) > 0){
                    echo "<p style='color:red'>Tên đăng nhập hoặc Email đã được sử dụng</p>";
                }else{
                    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
                    $code_hash = md5(random_bytes(20));
                    $insert_sql = "INSERT INTO users (username, email, password, activation_code)
                    VALUES ('$user', '$mail', '$pass_hash', '$code_hash')";
                    if(mysqli_query($conn,$insert_sql)){
                        echo "<p style='color:green'>Đăng kí thành công, vui lòng check Email để kích hoạt tài khoản</p>";
                       
                        $to = "huyodin@gmail.com";

                        $subject = "Kích hoạt tài khoản của bạn";

                        $verification_code = md5(uniqid());

                        $activation_link = "https://gmail.com/activate.php?email=" . urlencode($to) . "&code=" . urlencode($verification_code);

                        $message = "Xin chào,\n\n";
                        $message .= "Cảm ơn bạn đã đăng ký tài khoản trên trang web của chúng tôi. Vui lòng nhấp vào liên kết dưới đây để kích hoạt tài khoản của bạn:\n\n";
                        $message .= $activation_link;
                        $message .= "\n\nTrân trọng,\nNhóm hỗ trợ của chúng tôi";

                        $headers = "From: huyodin236@gmail.com\r\n";
                        $headers .= "Reply-To: huyodin@gmail.com\r\n";
                        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

                        $mail_sent = mail($to, $subject, $message, $headers);

                    }

                    
                }
            }
        }
    ?>
    <form action="register.php" method="post" style="display:flex">
        Username: <input type="text" name="txtUser" id="">
        Email: <input type="email" name="txtMail" id="">
        Password: <input type="password" name="txtPass1" id="">
        Re-type Password: <input type="password" name="txtPass2" id="">
        <button type="submit">Register</button>
    </form>
</body>

</html>