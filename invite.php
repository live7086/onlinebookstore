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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="myfav.php">我的最愛</a></li>
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
                            session_start();
                            $user_id=$_SESSION['user_id'];
                            $link = mysqli_connect('localhost','root','12345678','sa');
                            $sql = "SELECT * FROM bid_info, item_info, account, btime, iloc where iloc.item_id=bid_info.item_id and btime.bid_id=bid_info.bid_id and account.user_id=item_info.user_id and bid_info.item_id=item_info.item_id and item_info.user_id like ". $user_id. "";
                            $result = mysqli_query($link, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            echo "
                            <div class='card'>";
                            $bid_id = $row['bid_id'];
                            $sql2 = "SELECT * FROM bid_info, account WHERE bid_info.user_id=account.user_id and bid_id='$bid_id'";
                            $result2 = mysqli_query($link, $sql2);
                            while($row2 = mysqli_fetch_assoc($result2)) {
                            echo "<div class='card-header'>", $row2['user_name'],"對你發出了邀請</div>
                            ";}
                            echo"
                            
                                <div class='card-body'>
                                  <div class='row'>
                                    <div class='col-md-6'>
                                      <label>商品：", $row['item_name'],"</label><br>
                                      <label>時間：", $row['btime_name'],"</label><br>
                                      <label>地點：濟時嘍</label><br>
                                      <label>價格:", $row['bid_price'],"</label>
                                    </div>
                                    <div class='col-md-12'>
                                      <div>
                                        <button type='button' class='btn btn-primary'>接受</button>
                                        <button type='button' class='btn btn-secondary'>拒絕</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                            </div>";}
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
                    <h1>我的訂單</h1>
                </div>
            </div>
        </header>
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                            <form action="invitelink.php" method="post">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>賣家</th>
                                            <th>我方選擇時間</th>
                                            <th>我方選擇地點</th>
                                            <th>我方提出價錢</th>
                                            <th>商品編號</th>
                                            <th>賣方回覆</th>
                                            <th>是否完成面交</th><!--賣方須回覆 接受 才會跳出此功能-->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>賣家</th>
                                            <th>我方選擇時間</th>
                                            <th>我方選擇地點</th>
                                            <th>我方提出價錢</th>
                                            <th>商品編號</th>
                                            <th>賣方回覆</th>
                                            <th>是否完成面交</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                        <?php
                                        $link = mysqli_connect('localhost','root','12345678','sa');
                                        $sql  = "SELECT * FROM bid_info, item_info, iloc, btime WHERE bid_info.user_id = $_SESSION[user_id] AND item_info.item_id = bid_info.item_id AND bid_info.item_id = iloc.item_id AND btime.bid_id = bid_info.bid_id";
                                        $result = mysqli_query($link,$sql);
                                        While($row=mysqli_fetch_assoc($result))
                                        {
                                        echo "
                                        <tr>
                                            <td>".$row['user_id']."</td>
                                            <td>".$row['btime_name']."</td>
                                            <td>".$row['iloc_name']."</td>
                                            <td>".$row['bid_price']."</td>
                                            <td>".$row['item_id']."</td>";

                                            if($row['statement']=="accepted"){
                                                echo "  <td>接受</td>
                                                        <td>$row[bid_id]
                                                        <input type=hidden name='bid_id' value='".$row['bid_id']."'>
                                                            <input type='submit' name=\"submit\" class=\"btn-success\" value=\"完成面交\">
                                                        </td>
                                                        </tr>";
                                            }else if($row['statement']=="rejected"){
                                                echo "  <td>不接受</td></tr>
                                                ";
                                            }else{
                                                echo "  <td>尚未回應</td></tr>
                                                ";
                                            }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
        
        
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <script></script>
        </form>
    </body>
</html>
