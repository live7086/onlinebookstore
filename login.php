<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>登入</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
    <form action="check.php" method="get">
        <input type=hidden name=check value=login>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <?php
                                        $error=$_GET['error'];
                                        if($error== "error"){
                                            echo "<div class=\"card-header\"><h3 class=\"text-center font-weight-light my-4\">Login</h3></div>
                                            <div class=\"card-header\"><h4 class=\"text-center font-weight-light my-4\">帳號或密碼錯誤</h4></div>";
                                        }else{
                                            echo "<div class=\"card-header\"><h3 class=\"text-center font-weight-light my-4\">Login</h3></div>";
                                        }
                                    ?>
                                    <div class="card-body">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="user_email" name="user_email" type="email" placeholder="name@example.com" />
                                                <label for="user_email">輸入輔仁大學電子信箱</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="user_password" name="user_password" type="password" placeholder="Password" />
                                                <label for="user_password">請輸入密碼</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">記住密碼</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">忘記密碼?</a>
                                                <button type="submit" class="btn btn-primary">登入</button>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">還沒有帳號嗎？點這註冊！</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
    </form>
</html>
