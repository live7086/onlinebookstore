<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Index</title>
</head>
<body>
  <div id="message"></div>
  <script>
  window.onload = function() {
    // 顯示訊息
    var message = '<?php echo $_GET["message"]; ?>';
    alert(message);

    // 導往另一個頁面
    window.location.href = '<?php echo $_GET["href"]; ?>';
  }
  </script>

</body>
</html>
