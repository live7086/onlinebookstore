<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>商品販售狀況</title>
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
         <script>
            function showConfirmation(event) {
            event.preventDefault(); // 防止連結的預設行為（即跳轉）

            var result = confirm("你確定要執行這個操作嗎？");
            if (result) {
                // 如果使用者點擊了確認按鈕
                alert("操作已確認！");
                // 這裡可以加入你想執行的程式碼

                // 執行連結的跳轉
                window.location.href = event.target.href;
            } else {
                // 如果使用者點擊了取消按鈕
                alert("操作已取消！");
            }
            }
        </script>
          
    </head>
    <style>
        .fixed-footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #343a40;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }
    </style>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="invite.php">我的出價</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="condition.php">販售狀況</a></li>
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
                            $sql = "SELECT * FROM bid_info, item_info, account, btime, iloc where iloc.item_id=bid_info.item_id and btime.bid_id=bid_info.bid_id and account.user_id=item_info.user_id and bid_info.item_id=item_info.item_id and bid_info.statement = '' and item_info.user_id =$user_id";
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
                                      <label>地點：",$row['iloc_name'],"</label><br>
                                      <label>價格：", $row['bid_price'],"</label>
                                    </div>
                                    <div class='col-md-12'>
                                      <div>
                                        <a href= bidstatement.php?statement=accepted&item_id=".$row['item_id']."&bid_id=".$row["bid_id"]." class='btn btn-primary'>接受</a>
                                        <a href= bidstatement.php?statement=rejected&item_id=".$row['item_id']."&bid_id=".$row["bid_id"]." class='btn btn-secondary'>拒絕</a>
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
                                <a class=\"btn mt-2\"  href=\"pinfo_1.php\">
                                $user_id
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

        <header class="py-5" style="background-color: #C9D4C8;">
            <div class="container px-4 px-lg-5 my-1">
                <div class="text-center text-white">
                    <h1 style="color:black">商品販售狀況</h1>
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
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>買家</th>
                                            <th>買家選擇時間</th>
                                            <th>買家選擇地點</th>
                                            <th>買家提出價錢</th>
                                            <th>商品名稱</th>
                                            <th>訂單狀況</th>
                                            <th>評價</th><!--賣方須回覆 接受 才會跳出此功能-->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>買家</th>
                                            <th>買家選擇時間</th>
                                            <th>買家選擇地點</th>
                                            <th>買家提出價錢</th>
                                            <th>商品名稱</th>
                                            <th>訂單狀況</th>
                                            <th>評價</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                        <?php
                                        $link = mysqli_connect('localhost','root','12345678','sa');
                                        $sql  = "SELECT *, item_info.user_id AS seller, bid_info.user_id AS buyer,bid_info.statement AS statement FROM bid_info, item_info, iloc, btime WHERE item_info.user_id = $_SESSION[user_id] AND item_info.item_id = bid_info.item_id AND bid_info.item_id = iloc.item_id AND btime.bid_id = bid_info.bid_id";
                                        $result = mysqli_query($link,$sql);
                                        While($row=mysqli_fetch_assoc($result))
                                        {

                                        $buyer =$row['buyer'];
                                        $seller = $row['seller'];
                                        $item_id = $row['item_id'];
                                        //seller name
                                        $sqlseller = "SELECT * FROM account WHERE user_id = '$seller'";
                                        $resultseller = mysqli_query($link,$sqlseller);
                                        $rowseller=mysqli_fetch_assoc($resultseller);
                                        //buyer name
                                        $sqlbuyer = "SELECT * FROM account WHERE user_id = '$buyer'";
                                        $resultbuyer = mysqli_query($link,$sqlbuyer);
                                        $rowbuyer=mysqli_fetch_assoc($resultbuyer);
                                        echo "
                                        <tr>
                                            <td>".$rowbuyer['user_name']."</td>
                                            <td>".$row['btime_name']."</td>
                                            <td>".$row['iloc_name']."</td>
                                            <td>".$row['bid_price']."</td>
                                            <td>".$row['item_name']."</td>";
                                            if($row['statement']=="accepted"){
                                                echo "  <td>接受</td>
                                                        <td>請等待買家完成面交</td>
                                                        </tr>";
                                            }else if($row['statement']=="rejected"){
                                                echo "  <td>不接受</td><td></td></tr>
                                                ";
                                            }else if($row['statement']=="completed"){
                                                echo    "  <td>已完成</td>
                                                            <td>";
                                                        if($row['rating']){
                                                            $credit = $row['rating'];
                                                            $left = 5-$credit;
                                                            for ($i=0; $i < $credit; $i++) { 
                                                            echo "<span class=\"fa fa-star\">&nbsp</span>";
                                                            }
                                                            for($i=0; $i < $left ; $i++){
                                                            echo "<span class=\"fa \">&nbsp</span>";
                                                            }
                                                        }else{
                                                            echo "買家尚未評價";
                                                        }
                                                echo    "   </td>
                                                            </tr>
                                                        ";
                                            }else if ($row['statement']=="failed"){
                                                echo "  <td>該筆交易已失敗</td><td></td></tr>
                                                ";
                                            }
                                            else{
                                                echo "  <td>尚未回應</td><td></td></tr>
                                                ";
                                            }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
        
        
   
        <script></script>
        </form>
        <footer class="fixed-footer" style="background-color: #8C9B8E;">
        <div class="container">
            <p class="m-0" style="color:black">Onlinebookstore &copy;Secondhand Heist</p>
        </div>
        </footer>
    </body>
</html>
