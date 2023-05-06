<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/styles2.css" rel="stylesheet" />


         <!-- Bootstrap core JS-->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
         <!-- Core theme JS-->
         <script src="js/scripts.js"></script>


         <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
         <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
         <script src="js/datatables-simple-demo.js"></script>
          
    </head>
    <?php
    $searchtxt = $_GET['searchtxt'];
    ?>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a href="index.php" style="text-decoration:none;">
                    <span style="font-size: 30px;margin-left:10px; color:black">賊書服</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        
                        <!--<li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">書籍</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">雜誌</a></li>-->
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="pinfo_1.php">我的賣場</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">我的最愛</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="invite.php">我的訂單</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="table.php">面交紀錄</a></li>
                        
                    
                      
                    
                    
                           
                        

                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>-->
                    </ul>
                    
                    
            
                   
                    
                    <!--彈跳連結-->
                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#popinfo"><img src="image/ringringring.png" height="60" width="60"></a>
                    
                     <!--彈出來的視窗-->
                     <div class="modal fade" id="popinfo">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3>通知</h3>
                              <button class="btn btn-outline-secondary" data-bs-dismiss="modal">返回</button>
                            </div>
                            <?php
                            $link = mysqli_connect('localhost','root','12345678','sa');
                            $sql="SELECT * FROM bid_info, item_info, acccount where user_email='$user_email'";
                            $result= mysqli_query($link,$sql);
                            $row=mysqli_fetch_assoc($result);

                            if(empty($searchtxt))
                            {
                                $sql  = "SELECT * FROM item_info,iphoto, iloc WHERE item_info.item_id=iphoto.item_id and item_info.item_id=iloc.item_id and item_info.user_id= ".$_SESSION['user_id']." group by item_info.item_id";
                            }
                            else
                            {
                                $sql  = "SELECT * FROM item_info, iphoto, iloc WHERE iphoto.item_id=item_info.item_id and item_info.item_id=iloc.item_id and item_info.user_id= ".$_SESSION['user_id']." and item_name LIKE '%". $searchtxt. "%'group by item_info.item_id";
                            }

                            echo "<div class=\"card\">
                                <div class=\"card-header\">阿緯對你發出了邀請</div>
                                <div class=\"card-body\">
                                  <div class=\"row\">
                                    <div class=\"col-md-6\">
                                      <label>商品：Principles of FINANCIAL ACCOUNTING(3E)</label><br>
                                      <label>時間：04:00</label><br>
                                      <label>地點：濟時樓</label><br>
                                      <label>價格：800$</label>
                                    </div>
                                    <div class=\"col-md-12\">
                                      <div>
                                        <button type=\"button\" class=\"btn btn-primary\">接受</button>
                                        <button type=\"button\" class=\"btn btn-secondary\">拒絕</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>";
                            ?>
                          </div>
                        </div>
                      </div>
                      
                    
                      <?php
                            session_start();
                            $user_id=$_SESSION['user_id'];
                            if(!empty($user_id)){
                                echo
                                "
                                <a class=\"btn btn-success mt-2\" href=\"pinfo_1.php\">
                                我的賣場
                                </a>
                                <a class=\"btn btn-dangerous mt-2\" href=\"logout.php\">
                                登出
                                </a>";
                            }else{
                                echo
                                "<a class=\"btn btn-outline-dark mt-2\" href=\"login.php\">
                                    登入/註冊
                                </a>";
                            }
                    ?>
                </div>
            </div>
            
              
        </nav>
        <!-- 
        <div class="container px-4 px-lg-5">
              <input type="text" placeholder="請輸入關鍵字...">
              <button type="submit">搜尋</button>
        </div>
        </div>
       -->
        
       <!--
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
           
           
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" justify-content:center>
                <li class="nav-item dropdown">

                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="pinfo_1.php">我的賣場</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">我的最愛</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">面交紀錄</a></li>

                        
                    
                </li>
            </ul>
        </nav>-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-1">
                <div class="text-center text-white">
                    <h1>我的最愛</h1>
                </div>
            </div>
        </header>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-1 row-cols-xl-2 justify-content-center">
                    

                    
                    <div class="col mb-5">
                    <div class="card h-100">
                    <div class="text-center">
                        <!-- Product name-->
                        <h4 class="fw-bolder"><a href="bookinfo.php?item_id=001">harry potter and the half blood price</a></h4>
                    </div>
                    <!-- Product image-->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="image/001.jpeg" alt="Slide 1">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="image/007.jpg" alt="Slide 2">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="image/008.jpg" alt="Slide 3">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="card-subtitle mb-3">this is a book about snape</h5>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <h4 class="fw-bolder">價格:125元</h4>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">

                            <!--彈跳連結-->
                            <a class="btn btn-outline-dark mt-auto" href="#" data-bs-toggle="modal" data-bs-target="#popinv-001">購買邀請</a>
                             <!--彈出來的視窗-->
                             <div class="modal fade" id="popinv-001">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">購買邀請</h3>
                                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">返回</button>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" method="POST" action="bidlink.php">
                                            <input type="hidden" name="item_id" value="001">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="書名：harry potter and the half blood price" readonly="true" placeholder="書名" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="ISBN：12345" readonly="true" placeholder="ISBN" name="isbn">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="價格：125元" readonly="true" placeholder="價格" name="price">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="地點：利瑪竇" readonly="true" placeholder="地點" name="place">
                                                </div>
                                                <div class="form-group">
                                                    <label>請選擇交易時間</label><br>
                                                    <div>
                                                        <label class="radio-inline"> <!--阿兵改成radio button 讓直覺看起來就只能選一時段，但還須修改-->
                                                        <input type="radio" name="time_1" value="星期一 10:09">星期一 10:09
                                                    </label>
                                                        <label class="radio-inline"> <!--阿兵改成radio button 讓直覺看起來就只能選一時段，但還須修改-->
                                                        <input type="radio" name="time_2" value="星期二 14:58">星期二 14:58
                                                    </label>    </div>
                                                </div>
                                                <div align="center">
                                                    <div>
                                                        <input type="submit" value="Submit" class="btn btn-primary">
                                                    </div>
                                                </div> 
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col mb-5">
                    <div class="card h-100">
                    <div class="text-center">
                        <!-- Product name-->
                        <h4 class="fw-bolder"><a href="bookinfo.php?item_id=ITEM35510">上傳</a></h4>
                    </div>
                    <!-- Product image-->
                    <div id="myCarouse2" class="carousel slide" data-ride="carouse1">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarouse2" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarouse2" data-slide-to="1"></li>
                            <li data-target="#myCarouse2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="image/001.jpeg" alt="Slide 1">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="image/007.jpg" alt="Slide 2">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="image/008.jpg" alt="Slide 3">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarouse2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarouse2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="card-subtitle mb-3">傳</h5>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <h4 class="fw-bolder">價格:21元</h4>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">

                            <!--彈跳連結-->
                            <a class="btn btn-outline-dark mt-auto" href="#" data-bs-toggle="modal" data-bs-target="#popinv-ITEM35510">購買邀請</a>
                             <!--彈出來的視窗-->
                             <div class="modal fade" id="popinv-ITEM35510">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">購買邀請</h3>
                                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">返回</button>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" method="POST" action="bidlink.php">
                                            <input type="hidden" name="item_id" value="ITEM35510">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="書名：上傳" readonly="true" placeholder="書名" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="ISBN：3343" readonly="true" placeholder="ISBN" name="isbn">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="價格：21元" readonly="true" placeholder="價格" name="price">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="地點：仁園" readonly="true" placeholder="地點" name="place">
                                                </div>
                                                <div class="form-group">
                                                    <label>請選擇交易時間</label><br>
                                                    <div>
                                                        <label class="radio-inline"> <!--阿兵改成radio button 讓直覺看起來就只能選一時段，但還須修改-->
                                                        <input type="radio" name="time_1" value="星期一 17:00">星期一 17:00
                                                    </label>
                                                        <label class="radio-inline"> <!--阿兵改成radio button 讓直覺看起來就只能選一時段，但還須修改-->
                                                        <input type="radio" name="time_2" value="星期三 13:30">星期三 13:30
                                                    </label>
                                                        <label class="radio-inline"> <!--阿兵改成radio button 讓直覺看起來就只能選一時段，但還須修改-->
                                                        <input type="radio" name="time_3" value="星期五 18:00">星期五 18:00
                                                    </label>    </div>
                                                </div>
                                                <div align="center">
                                                    <div>
                                                        <input type="submit" value="Submit" class="btn btn-primary">
                                                    </div>
                                                </div> 
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <script></script>
        </form>
    </body>
</html>
