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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


          <!-- Bootstrap core JS-->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
          <!-- Core theme JS-->
          <script src="js/scripts.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <style>

        </style>
    </head>
    <style>
        .card-img-top {
            max-width: %;
            height: auto;
        }
        .col.mb-2 {
            max-width: 800px;
            max-height: 800px;
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
                                <div style="display: flex; flex-wrap: wrap;">
                                    <form method=get action="index.php">
                                    <div class="input-group">
                                        <div>
                                        <div><input class="form-control" placeholder="請輸入書名..." type="text" name="searchtxt" value="<?php echo $searchtxt; ?>"></div>
                                        <br>
                                        </div>
                                        <div>
                                        <div>
                                            <select class="form-select" id="user_dept1" name="tag" required>
                                            <option value="" disabled selected>請選擇標籤</option>
                                            <?php
                                                $link = mysqli_connect('localhost','root','12345678','sa');
                                                $sql = "SELECT * FROM tagop ";
                                                $result = mysqli_query($link, $sql);
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='", $row['tagop_id'],"'>", $row['tagop_name'],"</option>";}
                                            ?>
                                            </select>
                                        </div>
                                        <br>
                                        </div>
                                        <div>
                                        <button class="btn btn-outline-primary" type="submit">搜尋</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                </li>

                      
                    
                    
                           
                        

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
                    </form>
                </div>
            </div>
        </nav>
        <!-- Section-->
        <div class="wrapper">
        <div class="content">
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-1 gx-lg-1 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">
                    <?php
                          $item_id = $_GET['item_id'];
                          $link = mysqli_connect('localhost','root','12345678','sa');
                          
                          $sql="SELECT * FROM item_info ,iphoto WHERE iphoto.item_id=item_info.item_id and item_info.item_id LIKE '". $item_id. "'";
                          $result = mysqli_query($link,$sql);
                          if ($row=mysqli_fetch_assoc($result))
                          {
                            echo"
                            <div class='col mb-3 col-sm-8'> 
                            <div class='card h-100'>
                                <div class='card-header text-center'>
                                    <h4 class='card-title'>商品完整資訊</h4>
                                </div>
                                <div class='card'>
                                    <div class='card-body'>
                                      <div class='row'>
                                      <div id='myCarouse2' class='carousel slide' data-ride='carousel'>
                                      <div class='carousel-inner'>"?>
                                      <?php
                                      
                                      $sql = "SELECT * FROM iphoto WHERE iphoto.item_id = '$item_id'";
                                      $result = mysqli_query($link, $sql);
                                      $i = 0;
                                      while($row = mysqli_fetch_assoc($result)){
                                          if($i==0){
                                              $active ="active";
                                          }else{
                                              $active = "";
                                          }
                                      $i++;
                                      $iphoto_name = '.\imageUpload\\'. $row['iphoto_name']. '';
                                      echo"
                                      <div class='carousel-item $active ''>
                                        <img class='d-block w-100' style='object-fit: contain;' src=".$iphoto_name." alt='Slide 2' width=800 height=483>
                                      </div>";
                                      }
                                      ?>
                                      <?php
                                      
                                    $link = mysqli_connect('localhost','root','12345678','sa');
                                    $sql="SELECT * FROM item_info ,iphoto WHERE iphoto.item_id=item_info.item_id and item_info.item_id LIKE '". $item_id. "'";
                                    $result = mysqli_query($link,$sql);
                                    $row=mysqli_fetch_assoc($result);
                                      echo"
                                      </div>
                                      <a class='carousel-control-prev' href='#myCarouse2' role='button' data-slide='prev'>
                                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                            <span class='sr-only'>Previous</span>
                                        </a>
                                        <a class='carousel-control-next' href='#myCarouse2' role='button' data-slide='next'>
                                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                            <span class='sr-only'>Next</span>
                                        </a>
                                        </div>
                                <div class='row'>
                                    <div class='col-md-5'>
                                        <br/>
                                        <br/>
                                        <h5 class='card-subtitle mb-3'>書名：", $row['item_name'],"</h5>
                                        <p class='card-text'>ISBN碼:", $row['item_isbn'],"</p>
                                        <p class='card-text'>", $row['item_info'],"</p>
                                        
                                        <!-- 標籤 -->
                                        <div class='card-text'style='font-size: 40px;'>
                                            <ul class='list-unstyled'>
                                                ";
                                                    $item_id = $row['item_id'];
                                                    $link = mysqli_connect('localhost','root','12345678','sa');
                                                    $sql2 = "SELECT * FROM tag, tagop WHERE tagop_id=tag_name and tag.item_id='$item_id'";
                                                    $result2 = mysqli_query($link, $sql2);
                                                    $count=1;

                                                    while($row2 = mysqli_fetch_assoc($result2))
                                                    {
                                                    $name = 'time-'.$count;
                                                    $count=$count+1;
                                                    echo "
                                                    <li><span class='badge bg-primary'>".$row2['tagop_name']."</span></li>
                                                    ";
                                                    
                                                    }
                                                    echo "
                                            </ul>
                                        </div>
                                    </div>
                                    <div class='col-md-5'>
                                        <div class='card-text'style='font-size: 40px;'>
                                                <ul class='list-unstyled'>
                                                <div class=\"rating-box\">
                                                <br/>
                                                <h5 class=\"rating-boxH1\">賣家評價</h5>
                                                <div class=\"rating\">
                                                <span class=\"fa fa-star-o\"></span>
                                                <span class=\"fa fa-star-o\"></span>
                                                <span class=\"fa fa-star-o\"></span>
                                                <span class=\"fa fa-star-o\"></span>
                                                <span class=\"fa fa-star-o\"></span>
                                                </div>
                                                <h4 id=\"rating-value\"></h1>
                                                </div>
                                                <script src=\"rating.js\"></script>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                                      </div>
                                    </div>
                                  </div>
                                <!-- Product actions-->
                                <div class='card-footer p-1 pt-0 border-top-0 bg-transparent'>
                                    <div class='text-center'>
                                        <h4 class='fw-bolder'>出售價格：＄", $row['item_price'],"</h4>
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
                                                        <input type='radio' name='".$name."' value='".$row2['itime_name']."'>".$row2['itime_name']."
                                                        </label>";}
                                                echo"    </div>
                                                </div>
                                                <div align='center'>
                                                    <div>
                                                        <input type='submit' value='Submit' class='btn btn-primary'>
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
            </div>
                        ";
                          }
                      ?>
                </div>
            </div>
            <div class='col mb-1'>
                <hr/>
                <br/>
                <br/>
                <br/>
                <h1 align="center">你可能會喜歡</h1>
            </div>
            <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-4 row-cols-md-1 row-cols-xl-2 justify-content-center">
                <?php


                $link = mysqli_connect('localhost','root','12345678','sa');

                // 檢查連線是否成功
                if (!$link) {
                    die("Connection failed: " . mysqli_connect_error());
                }



                $sql = "SELECT t2.item_id, i.item_name, iphoto.iphoto_name
                FROM tag t1
                JOIN tag t2 ON t1.tag_name = t2.tag_name AND t1.item_id <> t2.item_id
                JOIN item_info i ON t2.item_id = i.item_id
                LEFT JOIN iphoto ON i.item_id = iphoto.item_id
                WHERE t1.item_id = '$item_id'
                AND i.statement = ''
                GROUP BY t2.item_id
                HAVING COUNT(DISTINCT t1.tag_name) = 3
                LIMIT 3
                
                ";

                $result = mysqli_query($link, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $recommended_item_ids[] = $row['item_id'];
                        echo  "<div class='col mb-3 col-sm-4'>       
                        <div class='card-header text-center'>
                            <h4 class='fw-bolder'><a href='bookinfo.php?item_id=", $row['item_id'],"'>", $row['item_name'],"</a></h4>
                        </div>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='row'>
                                    <img class='card-img-top' src='.\imageUpload\\", $row['iphoto_name'],"' width=292 height=191 alt='...' />
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                    }
                }

                if (count($recommended_item_ids) < 3) {
                    $sql = "SELECT t2.item_id, i.item_name, iphoto.iphoto_name
                    FROM tag t1
                    JOIN tag t2 ON t1.tag_name = t2.tag_name AND t1.item_id <> t2.item_id
                    JOIN item_info i ON t2.item_id = i.item_id
                    LEFT JOIN iphoto ON i.item_id = iphoto.item_id
                    WHERE t1.item_id = '$item_id'
                    AND i.statement = ''
                    GROUP BY t2.item_id
                    HAVING COUNT(DISTINCT t1.tag_name) = 2
                    LIMIT " . (3 - count($recommended_item_ids));

                    $result = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $recommended_item_ids[] = $row['item_id'];
                        echo  "<div class='col mb-3 col-sm-4'>       
                        <div class='card-header text-center'>
                            <h4 class='fw-bolder'><a href='bookinfo.php?item_id=", $row['item_id'],"'>", $row['item_name'],"</a></h4>
                        </div>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='row'>
                                    <img class='card-img-top' src='.\imageUpload\\", $row['iphoto_name'],"' width=292 height=191 alt='...' />
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                    }
                }


                if (count($recommended_item_ids) < 3) {
                    $sql = "SELECT t2.item_id, i.item_name, iphoto.iphoto_name
                    FROM tag t1
                    JOIN tag t2 ON t1.tag_name = t2.tag_name AND t1.item_id <> t2.item_id
                    JOIN item_info i ON t2.item_id = i.item_id
                    LEFT JOIN iphoto ON i.item_id = iphoto.item_id
                    WHERE t1.item_id = '$item_id'
                    AND i.statement = ''
                    GROUP BY t2.item_id
                    HAVING COUNT(DISTINCT t1.tag_name) = 1
                    LIMIT  " . (3 - count($recommended_item_ids));

                    $result = mysqli_query($link, $sql);


                    while ($row = mysqli_fetch_assoc($result)) {
                        $recommended_item_ids[] = $row['item_id'];
                        echo  "<div class='col mb-3 col-sm-4'>       
                        <div class='card-header text-center'>
                            <h4 class='fw-bolder'><a href='bookinfo.php?item_id=", $row['item_id'],"'>", $row['item_name'],"</a></h4>
                        </div>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='row'>
                                    <img class='card-img-top' src='.\imageUpload\\", $row['iphoto_name'],"' width=292 height=191 alt='...' />
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                }
                mysqli_close($link);

                ?>
                                
        </section>                        
        <!-- Footer-->
        </div>
        <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <script>
                const stars=document.querySelector(".rating").children;
                let ratingValue
                let index //目前選到的星星
                document.getElementById("rating-value").innerHTML = "請給分"
                for(let i=0;i<stars.length;i++){
                stars[i].addEventListener("mouseover",function(){
                //  console.log(i)
                document.getElementById("rating-value").innerHTML = "正在打分數"
                for(let j=0;j<stars.length;j++){
                stars[j].classList.remove("fa-star")//reset 所有星星
                stars[j].classList.add("fa-star-o")
                }
                for(let j=0;j<=i;j++){
                stars[j].classList.remove("fa-star-o") //先移除空心的星星
                stars[j].classList.add("fa-star") //添加新的星星 如果i=j表示選中的
                }
                })
                stars[i].addEventListener("click",function(){
                ratingValue=i+1
                index=i
                document.getElementById("rating-value").innerHTML = "你打的分數是 "+ratingValue
                })
                stars[i].addEventListener("mouseout",function(){
                for(let j=0;j<stars.length;j++){
                stars[j].classList.remove("fa-star")//reset 所有星星
                stars[j].classList.add("fa-star-o")
                }
                for(let j=0;j<=index;j++){
                stars[j].classList.remove("fa-star-o")
                stars[j].classList.add("fa-star")
                }
                })
                }
          </script>
    </body>
</html>
