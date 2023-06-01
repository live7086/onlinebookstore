<?php
if($_SESSION['user_id']){
    $link = mysqli_connect('localhost','root','12345678','sa');
    $dbaction=$_GET['dbaction'];
    $item_id=$_GET['item_id'];
    $user_id=$_GET['user_id'];
    if($dbaction=='insert')
        {$sql= "INSERT INTO fav (user_id, item_id) VALUES ('$user_id','$item_id')";
        if(mysqli_query($link,$sql))
            {
            header("Location:pop.php?message=已新增至我的最愛&href=index.php");
            }
        else
            {
                header("Location:pop.php?message=新增失敗&href=index.php");
            }}
    else if($dbaction=='delete')
    {
        $sql= "DELETE FROM fav WHERE item_id='$item_id'";
        if(mysqli_query($link,$sql))
            {
            header("Location:pop.php?message=已從我的最愛移除&href=myfav.php");
            }
        else
            {
                header("Location:pop.php?message=移除失敗&href=myfav.php");
            }
    }
}else{
    echo "<script>// 延遲時間（以毫秒為單位）
    var delayInMilliseconds = 10; // 1秒
    
    // 設置延遲並在延遲結束後執行跳轉程式碼
    setTimeout(function() {
      // 這裡是要跳轉的頁面的 URL
      window.location.href = 'index.php';
    }, delayInMilliseconds);
    
    // 彈出警示對話框
    alert(\"請先登入\");</script>";
}
?>

