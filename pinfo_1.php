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
                        
                        <!--<li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">書籍</a></li>-->
                        
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="pinfo_1.php">我的賣場</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="myfav.php">我的最愛</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="invite.php">我的訂單</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="table.php">面交紀錄</a></li>
                        <li class="nav-item">
                            <form method=get action="pinfo_1.php">
                            <table>
                                <tr>
                                    <td>
                                        <input class="input-group-text" placeholder="請輸入書名..." name="searchtxt">
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary">搜尋</button>
                                    </td>
                                </tr> 
                            </table>
                                </form>
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
       
        <header class="bg-secondary py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-left text-black">
                    <!--彈跳連結-->
                    <h3 class="fw-bolder">個人資訊</h3>
                    <hr>
                    <?php
                        $link = mysqli_connect('localhost','root','12345678','sa');
                        $sql = "SELECT * FROM account where user_id LIKE '". $user_id. "'";
                        $result = mysqli_query($link, $sql);
                        while($row = mysqli_fetch_assoc($result)) {
                        echo "<h4 class='fw-bolder'>姓名：", $row['user_name'],"</h4>
                    <h4 class='fw-bolder'>系所：", $row['user_dept'],"</h4>
                    <h4 class='fw-bolder'>電話：", $row['user_phone'],"</h4>
                    <h4 class='fw-bolder'>Email：", $row['user_email'],"</h4>
                    <h4 class='fw-bolder'>自介：", $row['user_intro'],"</h4>";}
                    ?>
                    

                    <!--彈出來的視窗-->
                    <div class="modal fade" id="popul">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>上傳商品</h3>
                                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">返回</button>
                                </div>
                                <div class="modal-body">
                                    <form id="itemlink.php" enctype="multipart/form-data" method='post' action="itemlink.php" onsubmit="return onSubmitForm()">
                                    <input type=hidden name='dbaction' value='insert'>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="書名" name="title">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="number" placeholder="ISBN" name="isbn">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="number" placeholder="價格" name="price">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="書本介紹" name="info">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="time-period-1" placeholder="詳細面交地點"name="place">
                                        </div>


                                        <div class="form-group">
                                            <input class="form-control" type="text" id="time-period-1" placeholder="面交時間段(星期幾 小時:分鐘)"name="time-1">
                                            <input class="form-control" type="text" id="time-period-2" placeholder="面交時間段(星期幾 小時:分鐘)"name="time-2">
                                            <input class="form-control" type="text" id="time-period-3" placeholder="面交時間段(星期幾 小時:分鐘)"name="time-3">
                                        </div>
                                        
                                        <select class="form-select" id="user_dept" name="tag_1" required>
                                            <option value="" disabled selected >請選擇標籤</option>
                                            <?php
                                                $link = mysqli_connect('localhost','root','12345678','sa');
                                                $sql = "SELECT * FROM tagop ";
                                                $result = mysqli_query($link, $sql);
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='", $row['tagop_id'],"'>", $row['tagop_name'],"</option>";}
                                            ?>
                                        </select>

                                        <select class="form-select" id="user_dept" name="tag_2" required>
                                            <option value="" disabled selected >請選擇標籤</option>
                                            <?php
                                                $link = mysqli_connect('localhost','root','12345678','sa');
                                                $sql = "SELECT * FROM tagop ";
                                                $result = mysqli_query($link, $sql);
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='", $row['tagop_id'],"'>", $row['tagop_name'],"</option>";}
                                            ?>
                                        </select>

                                        <select class="form-select" id="user_dept" name="tag_3" required>
                                            <option value="" disabled selected >請選擇標籤</option>
                                            <?php
                                                $link = mysqli_connect('localhost','root','12345678','sa');
                                                $sql = "SELECT * FROM tagop ";
                                                $result = mysqli_query($link, $sql);
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='", $row['tagop_id'],"'>", $row['tagop_name'],"</option>";}
                                            ?>
                                        </select>

                                        <div class="form-group">
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
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header>
                                    </form>
        
        <!-- Section-->
        <form action="itemlink.php" method="post">
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-1 row-cols-xl-2 justify-content-center">


                <div class="col mb-5">
                        <div class="card h-100" align="center">
                            
                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#popul"><img src="image/upload.png"  width="70%" height="100%"></a>
                            <!-- Product details-->
                            
                                <div class="text-center">
                                    
                                    <h4 class="fw-bolder">上傳商品</h4>
                                    
                                </div>
                            
                           
                        </div>
                    </div>






                <?php
                    $link = mysqli_connect('localhost','root','12345678','sa');


                    $sql  = "SELECT * FROM item_info,iphoto, iloc WHERE item_info.item_id=iphoto.item_id and item_info.item_id=iloc.item_id group by item_info.item_id";
                    $result = mysqli_query($link,$sql);

                    While($row=mysqli_fetch_assoc($result))
                    {
                                
                    echo "
                    <div class='col mb-5'>
                    <div class='card h-100'>
                    <div class='text-center'>
                        <!-- Product name-->
                        <h4 class='fw-bolder'><a href='bookinfo.php?item_id=", $row['item_id'],"'>", $row['item_name'],"</a></h4>
                    </div>
                    <!-- Product image-->
                    <img class='card-img-top' src='", $row['iphoto_name'],"'  width='50%'  height='50%' alt='...' />
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
                        <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='router.php?router=remove&item_id=".$row['item_id']."'>下架商品</a></div>
                    </div>
                    <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                        <div class='text-center'>
                            <!--彈跳連結-->
                            <a class='btn btn-outline-dark mt-auto' href='router.php?router=itemupdate&item_id=".$row['item_id']."' data-bs-toggle='modal' data-bs-target='#popinv-{$row['item_id']}'>修改</a>
                            <!--彈出來的視窗 弘軒改這邊-->
                            <div class='modal fade' id='popinv-{$row['item_id']}'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h3 class='modal-title'>修改</h3>
                                            <button class='btn btn-outline-secondary' data-bs-dismiss='modal'>返回</button>
                                        </div>
                                        <div class=\"modal-body\">
                                    <form enctype=\"multipart/form-data\" method='post' action=\"itemlink.php\" onsubmit=\"return onSubmitForm()\">
                                    <input type=hidden name='dbaction' value='itemupdate'>
                                    <input type=hidden name='item_id' value='".$row['item_id']."'>
                                    <div class='form-inline'>
                                        <input class='form-control-sm mb-2 mr-sm-2' type='text' value='書名' readonly='true' placeholder='書名'>
                                        <input class='form-control-sm mb-2 mr-sm-2' value='", $row['item_name'],"' placeholder='書名' name='title'>
                                    </div>
                                    <div class='form-group'>
                                        <input class='form-control-sm mb-2 mr-sm-2' type='text' value='ISBN' readonly='true' placeholder='IBSN'>
                                        <input class='form-control-sm mb-2 mr-sm-2' type='text' value='", $row['item_isbn'],"'  placeholder='ISBN' name='isbn'>
                                    </div>
                                    <div class='form-group'>
                                        <input class='form-control-sm mb-2 mr-sm-2' type='text' value='價格：' readonly='true' placeholder='IBSN'>
                                        <input class='form-control-sm mb-2 mr-sm-2' type='text' value='", $row['item_price'],"' placeholder='價格' name='price'>
                                    </div>
                                    <div class=form-group>
                                        <input class='form-control mb-2 mr-sm-2' type='text' value='書本介紹：'readonly='true' placeholder=\"書本介紹\" >
                                        <textarea name='info' cols='30' rows='10' class= 'form-control mb-2 mr-sm-2'>". $row['item_info']."</textarea>
                                        
                                    </div>
                                    <div class=form-group>
                                        <input class='form-control-sm mb-2 mr-sm-2' type='text' value='面交地點：'readonly='true'id=\"time-period-1\" placeholder=\"詳細面交地點\">
                                        <input class='form-control-sm mb-2 mr-sm-2' type='text' value='", $row['iloc_name'],"'  placeholder='詳細面交地點' name='place'>
                                    </div>
                                    ";
                                    $item_id = $row['item_id'];
                                    $link = mysqli_connect('localhost','root','12345678','sa');
                                    $sql2 = "SELECT * FROM itime WHERE item_id='$item_id'";
                                    $result2 = mysqli_query($link, $sql2);
                                    $itime = array();
                                    $count=1;

                                    while($row2 = mysqli_fetch_assoc($result2))
                                    {
                                    $name = 'time-'.$count;
                                    $count=$count+1;
                                    echo "
                                    <input class='form-control-sm mb-2 mr-sm-2' type='text' id=\"time-period-1\" readonly='true' value=\"面交時間段".($count-1)."\">
                                    <input class='form-control-sm mb-2 mr-sm-2' type='text' id=\"time-period-1\" name=".$name." value='".$row2['itime_name']."'>
                                    ";
                                    
                                    }
                                    echo "
                                        <div class=\"form-group\">
                                            <label for=\"imageUpload\">
                                                <img src=\"https://www.lifewire.com/thmb/eCn_BQgPpd0l-6FhgYCA8ebbOn0=/650x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/cloud-upload-a30f385a928e44e199a62210d578375a.jpg\" width=\"10%\" height=\"10%\" alt=\"Upload Image\" id=\"imagePreview\">
                                            </label>
                                            <input type=\"file\" class=\"form-control-file\" id=\"imageUpload\" name=\"image\" >
                                            <p id=\"noImageMsg\">尚未上傳檔案</p>
                                        </div>
                                        <input class=\"btn btn-primary\" type=\"submit\" value=\"送出修改\" >
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
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <script></script>
        </form>
    </body>
</html>
