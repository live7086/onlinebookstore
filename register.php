<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <form action="router.php" method="get">
    <input type=hidden name=router value=register>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Email註冊</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="user_name" type="text" name="user_name" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">使用者名稱</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                      <select class="form-select" id="user_dept" name="user_dept" required>
                                                        <option value="" disabled selected >請選擇系所</option>
                                                        <option value="im">資管系</option>
                                                        <option value="gi">圖資系</option>
                                                      </select>
                                                      <label for="selectDepartment" style="position: absolute; top: 0; left: 0;">請選擇系所</label>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="user_email" type="email" name="user_email" placeholder="name@example.com" />
                                                <label for="inputEmail">輸入輔仁大學電子信箱</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="user_password" type="password" name="user_password" placeholder="Create a password" />
                                                        <label for="inputPassword">設定密碼</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="user_phone" type="text" name="user_phone" placeholder="09..." />
                                                        <label for="inputPasswordConfirm">手機號碼</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">註冊</button></div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">已經有帳號了嗎？登入</a></div>
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
