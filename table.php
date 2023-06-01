<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>面交紀錄</title>
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
                        
                        <!--<li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">書籍</a></li>-->
                        
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
                                <a class=\"btn mt-2\" href=\"pinfo_1.php\">
                                $user_id
                                </a>
                                <a class=\"btn mt-2\" href=\"logout.php\">
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
                    <h1>面交紀錄表</h1>
                </div>
            </div>
        </header>
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>面交紀錄編號</th>
                                            <th>買家</th>
                                            <th>賣家</th>
                                            <th>時間</th>
                                            <th>地點</th>
                                            <th>價錢</th>
                                            <th>商品編號</th>
                                            <th>訂單評分</th>
                                        
                                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>面交紀錄編號</th>
                                            <th>買家</th>
                                            <th>賣家</th>
                                            <th>時間</th>
                                            <th>地點</th>
                                            <th>價錢</th>
                                            <th>商品編號</th>
                                            <th>訂單評分</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $link = mysqli_connect('localhost','root','12345678','sa');
                                        $sql  = "SELECT *, item_info.user_id AS seller, bid_info.user_id AS buyer FROM trade_record, item_info, bid_info WHERE trade_record.bid_id=bid_info.bid_id AND trade_record.item_id = item_info.item_id AND bid_info.user_id = $_SESSION[user_id] ";
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
                                        //photo
                                        $sqlphoto = "SELECT * FROM iphoto WHERE item_id = '$row[item_id]'";
                                        $resultphoto = mysqli_query($link,$sqlphoto);
                                        $rowphoto=mysqli_fetch_assoc($resultphoto);
                                        $iphoto_name = '.\imageUpload\\'. $rowphoto['iphoto_name']. '';
                                        echo "
                                        <tr>
                                            <td>".$row['trade_id']."</td>
                                            <td><a href=\"#\" type=\"button\" data-bs-toggle=\"modal\" data-bs-target='#binfo-{$row['item_id']}'>$rowbuyer[user_name]</a></td>
                                            <td><a href=\"#\" type=\"button\" data-bs-toggle=\"modal\" data-bs-target='#sinfo-{$row['item_id']}'>$rowseller[user_name]</a></td>
                                            <td>".$row['trade_time']."</td>
                                            <td>".$row['trade_location']."</td>
                                            <td>".$row['trade_price']."</td>
                                            <td>
                                                <a href=\"#\" type=\"button\" data-bs-toggle=\"modal\" data-bs-target='#iinfo-{$row['item_id']}'>".$row['item_id']."</a>
                                            </td>
                                                <td>";
                                                $credit = $row['rating'];
                                                $left = 5-$credit;
                                                for ($i=0; $i < $credit; $i++) { 
                                                echo "<span class=\"fa fa-star\">&nbsp</span>";
                                                }
                                                for($i=0; $i < $left ; $i++){
                                                echo "<span class=\"fa\">&nbsp</span>";
                                                }
                                        echo "  </td>
                                        </tr>
                                            <div class=\"modal fade\" id='iinfo-{$row['item_id']}'>
                                        <div class=\"modal-dialog\">
                                        <div class=\"modal-content\">
                                            <div class=\"modal-header\">
                                            <h3>商品資訊</h3>
                                                <button class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">返回</button>
                                            </div>
                                            <div class=\"card h-100\">                                                            
                                                        <div class=\"modal-header\">
                                                        <img src=".$iphoto_name." width =450 height=300>
                                                        </div>
                                                        <div class='modal-body'>
                                                        <h4>書名：".$row['item_name']."</h5>
                                                        <h5>ISBN碼：$row[item_isbn]</h5>
                                                        <h5>商品資訊：$row[item_info]</h5>
                                                        </div>
                                                        <div class='modal-body'>
                                                        <div class='text-center'>
                                                                <h4 class='fw-bolder'>最終價格：$row[trade_price]</h4>
                                                        </div>
                                                        </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                        <div class=\"modal fade\" id='binfo-{$row['item_id']}'>
                                        <div class=\"modal-dialog\">
                                        <div class=\"modal-content\">
                                            <div class=\"modal-header\">
                                            <h3>買家資訊</h3>
                                                <button class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">返回</button>
                                            </div>

                                            <div class=\"card\">
                                        
                                            <div class=\"card-body\">
                                                <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    
                                                <h5 class=\"fw-bolder\">姓名：".$rowbuyer['user_name']."</h5>
                                                <h5 class=\"fw-bolder\">系所：$rowbuyer[user_dept]</h5>
                                                <h5 class=\"fw-bolder\">電話：$rowbuyer[user_phone]</h5>
                                                <h5 class=\"fw-bolder\">Email：$rowbuyer[user_email]</h5>
                                                    

                                                </div>
                                                
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>





                                        <div class=\"modal fade\" id='sinfo-{$row['item_id']}'>
                                        <div class=\"modal-dialog\">
                                        <div class=\"modal-content\">
                                            <div class=\"modal-header\">
                                            <h3>賣家資訊</h3>
                                                <button class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">返回</button>
                                            </div>

                                            <div class=\"card\">
                                        
                                            <div class=\"card-body\">
                                                <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    
                                                    <h5 class=\"fw-bolder\">姓名：$rowseller[user_name]</h5>
                                                    <h5 class=\"fw-bolder\">系所：$rowseller[user_dept]</h5>
                                                    <h5 class=\"fw-bolder\">電話：$rowseller[user_phone]</h5>
                                                    <h5 class=\"fw-bolder\">Email：$rowseller[user_email]</h5>
                                                    

                                                </div>
                                                
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>";}?>




                                        <!--<div class="modal fade" id="return">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h3>退貨表單</h3>
                                                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">返回</button>
                                            </div>
                                            <div class="modal-body" align="center">
                                            <form>
                                                <div class="form-group"> 
                                                    <input class="form-control" type="textarea" placeholder="退貨原因" style="width:400px;height:120px;">
                                                </div>
                                                


                                                
                                                
                                                <div class="form-group">
                                                    <h5>退貨商品圖片</h5>
                                                    <label for="imageUpload">
                                                        <img src="https://www.lifewire.com/thmb/eCn_BQgPpd0l-6FhgYCA8ebbOn0=/650x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/cloud-upload-a30f385a928e44e199a62210d578375a.jpg" width="10%" height="10%" alt="Upload Image" id="imagePreview">
                                                    </label>
                                                    <input type="file" class="form-control-file" id="imageUpload" name="image" >
                                                    <p id="noImageMsg">尚未上傳檔案</p>
                                                </div>
                                                <button type="submit" class="btn btn-primary">送出</button>
                                                <script>
                                                

                                                function previewImage() {
                                                    var preview = document.getElementById("imagePreview");
                                                    var file = document.getElementById("imageUpload").files[0];
                                                    var noImageMsg = document.getElementById("noImageMsg");
                                                
                                                    if (file) {
                                                        var reader = new FileReader();
                                                        reader.onloadend = function () {
                                                            preview.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(file);
                                                        noImageMsg.style.display = "none";
                                                    } else {
                                                        preview.src = "";
                                                        noImageMsg.style.display = "block";
                                                    }
                                                }
                                                </script>
                                            </form>
                                            </div>-->

                                            
                                        </div>
                                        </div>
                                        </div>

                                        
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>
        
        
        <footer class="fixed-footer" style="background-color: #8C9B8E;">
        <div class="container">
            <p class="m-0">Onlinebookstore &copy;Secondhand Heist</p>
        </div>
        </footer>
        <script></script>
        </form>
    </body>
</html>