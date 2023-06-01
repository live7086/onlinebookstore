<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>寄送驗證信</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
    <form action="router.php" method="get">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">信箱驗證</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">我們已經寄出一封5位數字的驗證碼到<?php echo $user_email=$_SESSION['user_email'] ?>了</div>
                                        <form>
                                                <input type=hidden name=router value=verified>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" type="text" name="typeotp" placeholder="name@example.com" />
                                                    <label for="inputEmail">
                                                    請輸入驗證碼
                                                    </label>
                                                </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="router.php?router=resent">重新寄送驗證碼</a>
                                                <a class="small" href="index.php">返回登入頁面</a>
                                                <button type="submit" class="btn btn-primary">驗證</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
