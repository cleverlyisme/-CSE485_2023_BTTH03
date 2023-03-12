<?php
    include_once './views/includes/boostrap.php';
    include APP_ROOT . '/views/includes/header.php';
?>
</header>
<main class="container mt-5 mb-5">
    <form action="?controller=auth&action=login" method="POST">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="username" name="username" value=<?= $username ?>>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="password" name="password" value=<?= $password ?>>
                        </div>

                        <div class="d-flex remember-me">
                            <input type="checkbox" name="remember">
                            <span class="ms-3">Remember Me</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-end login_btn" name="btnLogin">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center ">
                        Don't have an account?<a href="#" class="text-warning text-decoration-none">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="text-warning text-decoration-none">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<?php
    include APP_ROOT . '/views/includes/footer.php';
?>