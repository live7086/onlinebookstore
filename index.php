<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>賊書服</title>
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
          
    </head>
    <style>
    .row-cols-4 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .row-cols-4 > .col {
        flex-basis: calc(25% - 1rem); /* 調整商品寬度 */
        margin-bottom: 1rem;
    }
   
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .wrapper {
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }

    .content {
        flex: 1;
    }
    
    footer {
    flex-shrink: 0;
    }

    
</style>
    <body>
    <?php
    $searchtxt = $_GET['searchtxt'];
    $tag = $_GET['tag'];
    $link = mysqli_connect('localhost', 'root', '12345678', 'sa');
    $sql = "SELECT * FROM tagop where tagop_id='$tag'";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $tagop_name= $row['tagop_name'];
    }
    ?>
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
                        
                        <li class="nav-item">
                            <div style="display: flex;">
                                <form method=get action="index.php">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="請輸入書名..." type="text" name="searchtxt" value="<?php echo $searchtxt; ?>">
                                        <button class="btn btn-outline-primary" type="submit">搜尋</button>
                                    </div>
                                </form>

                            </div>
                        </li>
                        <!--彈跳連結-->
                     <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#popinfo2"><img src="image/TAG.png" height="40" width="40"></a>
                    
                    <!--彈出來的視窗-->
                    <div class="modal fade" id="popinfo2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>標籤搜尋</h3>
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">返回</button>
            </div>
            <li class="nav-item">
                <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; text-align: center;">
                    <form method="get" action="index.php">
                        <div class="input-group">
                            <div>
                                <div><input class="form-control" placeholder="請輸入書名..." type="text" name="searchtxt" value="<?php echo $searchtxt; ?>"></div>
                                <br>
                            </div>
                            <div>
                                <div>
                                <select class="form-select" id="user_dept1" name="tag" required>
                                    <?php if(empty($tag)): ?>
                                        <option value="" disabled selected>請選擇標籤</option>
                                    <?php else: ?>
                                        <option value="<?php echo $tag; ?>" selected><?php echo $tagop_name; ?></option>
                                    <?php endif; ?>
                                    <?php
                                        $link = mysqli_connect('localhost', 'root', '12345678', 'sa');
                                        $sql = "SELECT * FROM tagop";
                                        $result = mysqli_query($link, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='", $row['tagop_id'], "'>", $row['tagop_name'], "</option>";
                                        }
                                    ?>
                                </select>

                                </div>
                                <br>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-outline-primary" type="submit">搜尋</button>
                        </div>
                    </form>
                </div>
            </li>
        </div>
    </div>
</div>





                      
                    
                    
                           
                        

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
                            $sql = "SELECT * FROM bid_info, item_info, account, btime, iloc where iloc.item_id=bid_info.item_id and btime.bid_id=bid_info.bid_id and account.user_id=item_info.user_id and bid_info.item_id=item_info.item_id and bid_info.statement = '' and item_info.user_id ='$user_id'";
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
                    
                    <form class="d-flex">
                    <?php
                            session_start();
                            $user_id=$_SESSION['user_id'];
                            if(!empty($user_id)){
                                echo
                                "
                                <a class=\"btn mt-2\"  href=\"pinfo_1.php\">
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
                    </form>
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
        <header>
                    <img src=".\image\banner.png" width="100%" height= "550px">
        </header>
        
        <!-- Section-->
        <div class="wrapper">
        <div class="content">
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-4 row-cols-md-1 row-cols-xl-2 justify-content-center">
                    

                    <?php
                    session_start();
                    $user_id=$_SESSION['user_id'];
                    $link = mysqli_connect('localhost','root','12345678','sa');
                    if(empty($searchtxt) && empty($tag))
                    {
                        $sql  = "SELECT * FROM item_info,iphoto, iloc WHERE item_info.item_id=iphoto.item_id and item_info.item_id=iloc.item_id and item_info.statement='' group by item_info.item_id";
                    }
                    else if(empty($tag))
                    {
                        $sql  = "SELECT * FROM item_info, iphoto, iloc WHERE iphoto.item_id=item_info.item_id and item_info.item_id=iloc.item_id and item_info.statement='' and item_name LIKE '%". $searchtxt. "%'group by item_info.item_id";
                    }
                    else
                    {
                        $sql  = "SELECT * FROM item_info, iphoto, iloc, tag WHERE tag.item_id=item_info.item_id and iphoto.item_id=item_info.item_id and item_info.statement='' and item_info.item_id=iloc.item_id and item_name LIKE '%". $searchtxt. "%' and  tag_name LIKE '". $tag. "' group by item_info.item_id";
                    }
                    $result = mysqli_query($link,$sql);
                    $dbaction='insert';
                    While($row=mysqli_fetch_assoc($result))
                    {
                    $iphoto_name = '.\imageUpload\\'. $row['iphoto_name']. '';
                    echo "
                    <div class='col mb-5'>
                    <div class='card h-100'>
                    <div class='text-center'>
                        <!-- Product name-->
                        <h4 class='fw-bolder'><a href='bookinfo.php?item_id=", $row['item_id'],"'>", $row['item_name'],"</a></h4>
                    </div>
                    <!-- Product image-->
                    <img class='card-img-top' src=".$iphoto_name."  width='50%'  height='50%' alt='...' />
                    <!-- Product details-->
                    <div class='card-body p-4'>
                        <div class='text-center'>
                            <!-- Product name-->
                            <h5 class='card-subtitle mb-3'>", $row['item_info'],"</h5>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class='card-footer p-1 pt-0 border-top-0 bg-transparent'>
                        <div class='text-center'>
                            <h4 class='fw-bolder'>價格:", $row['item_price'],"元</h4>
                        </div>
                        <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='favlink.php?item_id=", $row['item_id'],"&user_id=".$user_id."&dbaction=".$dbaction."'>加入最愛</a></div>
                    </div>
                    <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                        <div class='text-center'>

                            <!--彈跳連結-->
                            <a class='btn btn-outline-dark mt-auto' href='#' data-bs-toggle='modal' data-bs-target='#popinv-{$row['item_id']}'>購買邀請</a>
                             <!--彈出來的視窗-->
                             <div class='modal fade' id='popinv-{$row['item_id']}'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h3 class='modal-title'>購買邀請</h3>
                                            <button class='btn btn-outline-secondary' data-bs-dismiss='modal'>返回</button>
                                        </div>
                                        <div class='modal-body'>
                                            <form enctype='multipart/form-data' method='POST' action='bidlink.php'>
                                            <input type=hidden name='item_id' value='", $row['item_id'],"'>
                                                <div class='form-group'>
                                                    <input class='form-control' type='text' value='書名：", $row['item_name'],"' readonly='true' placeholder='書名' name='title'>
                                                </div>
                                                <div class='form-group'>
                                                    <input class='form-control' type='text' value='ISBN：", $row['item_isbn'],"' readonly='true' placeholder='ISBN' name='isbn'>
                                                </div>


                                                
                                                
                                                <div class='form-group'>
                                                    <input class='form-control' type='text' value='地點：", $row['iloc_name'],"' readonly='true' placeholder='地點' name='place'>
                                                </div>
                                                <div class='form-group'>
                                                    
                                                    <div class='form-group'>
                                                <label>欲付價格：<input type='number' name='price' step='5' min='0' max='9999.99' value='" . $row['item_price'] . "'></label>
                                                </div>
                                                    <label>請選擇交易時間</label>
                                                    
                                                    <br>
                                                    <div>";
                                                        $item_id = $row['item_id'];
                                                        $sql2 = "SELECT * FROM itime WHERE item_id='$item_id'";
                                                        $result2 = mysqli_query($link, $sql2);
                                                        $itime = array();
                                                        $count=1;
                                                        while($row2 = mysqli_fetch_assoc($result2)) {
                                                            $name = 'time_'.$count;
                                                            $count=$count+1;
                                                            echo "
                                                            <label class='radio-inline'> 
                                                            <input type='checkbox' name='".$name."' value='".$row2['itime_name']."' onclick=\"handleCheckboxClick(this, '".$name."')\" >".$row2['itime_name']."
                                                            </label>
                                                            <script>
                                                            function handleCheckboxClick(checkbox, name) {
                                                              var checkboxes = document.getElementsByName(name);
                                                              checkboxes.forEach(function(cb) {
                                                                if (cb !== checkbox) {
                                                                  cb.checked = false;
                                                                }
                                                              });
                                                            }
                                                            </script>
                                                            ";
                                                            }
                                                echo"    </div>
                                                </div>
                                                <div align='center'>
                                                    <div>
                                                        <input type='submit' value='送出' class='btn btn-primary'>
                                                    </div>
                                                </div> 
                                            </form>
                                        </div>
                                        <div class='modal-footer'>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>";
                    }
                    ?>
        </section>
        <!-- Footer-->
        </div>
        <footer class="py-5" style="background-color: #C9D4C8;">
        <div class="container">
            <p class="m-0 text-center" style="color:black">Onlinebookstore &copy;Secondhand Heist</p>
        </div>
    </footer>
</div>
    </body>
</html>
