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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">二手書</a></li>
                        <li class="nav-item">
                            <table>
                                <tr>
                                    <td>
                                        <input class="input-group-text" placeholder="請輸入關鍵字..." >
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary">搜尋</button>
                                    </td>
                                </tr> 
                            </table>
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
                                <a class=\"btn btn-success mt-2\" href=\"pinfo.php\">
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
        <header class="bg-secondary py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                    <!--彈跳連結-->
                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#popul"><img src="image/upload.png"  width="30%" height="30%"alt="Shop Image"></a>
                    <!--彈出來的視窗-->
                    <div class="modal fade" id="popul">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>上傳商品</h3>
                                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">返回</button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" method='post' action="itemlink.php" onsubmit="return onSubmitForm()">
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
                    <h2 class="fw-bolder">上傳商品</h2>
                </div>
            </div>
        </header>
        
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-1 row-cols-xl-2 justify-content-center">
                <?php
                    $link = mysqli_connect('localhost','root','12345678','sa');
                    if(empty($searchtxt))
                    {
                        $sql  = "SELECT * FROM item_info,iphoto WHERE item_info.item_id=iphoto.item_id AND item_info.user_id=".$_SESSION['user_id']." group by item_info.item_id";
                    }
                    else
                    {
                        $sql  = "SELECT * FROM item_info, iphoto WHERE iphoto.item_id=item_info.item_id and item_name LIKE '%". $searchtxt. "%'group by item_info.item_id";
                    }
                    
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
                            <a class='btn btn-outline-dark mt-auto' href='#' data-bs-toggle='modal' data-bs-target='#popinv'>修改</a>
                             <!--彈出來的視窗 弘軒改這邊-->
                             <div class='modal fade' id='popinv'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h3 class='modal-title'>購買邀請</h3>
                                            <button class='btn btn-outline-secondary' data-bs-dismiss='modal'>返回</button>
                                        </div>
                                        <div class='modal-body'>
                                            <form enctype='multipart/form-data'>
                                                <div class='form-group'>
                                                    <input class='form-control' type='text' value='書名：", $row['item_name'],"' readonly='true' placeholder='書名' name='title'>
                                                </div>
                                                <div class='form-group'>
                                                    <input class='form-control' type='text' value='ISBN：", $row['item_isbn'],"' readonly='true' placeholder='ISBN' name='isbn'>
                                                </div>
                                                <div class='form-group'>
                                                    <input class='form-control' type='text' value='價格：", $row['item_price'],"元' readonly='true' placeholder='價格' name='money'>
                                                </div>
                                                <div class='form-group'>
                                                    <label>請選擇交易時間</label><br>
                                                    <div>
                                                        <label class='checkbox-inline'>
                                                            <input type='checkbox' name='time[]' value='morning'>06:00
                                                        </label>
                                                        <label class='checkbox-inline'>
                                                            <input type='checkbox' name='time[]' value='afternoon'>05:00
                                                        </label>
                                                        <label class='checkbox-inline'>
                                                            <input type='checkbox' name='time[]' value='evening'>04:00
                                                        </label>
                                                        <br>
                                                        <label class='checkbox-inline'>
                                                            <input type='checkbox' name='time[]' value='morning'>17:00
                                                        </label>
                                                        <label class='checkbox-inline'>
                                                            <input type='checkbox' name='time[]' value='afternoon'>16:00
                                                        </label>
                                                        <label class='checkbox-inline'>
                                                            <input type='checkbox' name='time[]' value='evening'>18:00
                                                        </label>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <label>請選擇交易地點</label><br>
                                                    <label class='checkbox-inline'>
                                                        <input type='checkbox' name='location[]' value='BS'>BS
                                                    </label>
                                                    <label class='checkbox-inline'>
                                                        <input type='checkbox' name='location[]' value='SF'>SF
                                                    </label>
                                                    <label class='checkbox-inline'>
                                                        <input type='checkbox' name='location[]' value='LM'>LM
                                                    </label>
                                                </div>
                                                <div align='center'>
                                                    <div>
                                                        <button type='button' class='btn btn-primary'>送出購買邀請</button>
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
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <script>
            

        </script>
    </body>
</html>
