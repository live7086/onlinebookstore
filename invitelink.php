<?php

        //生成Trade_id
        function generateItemId($conn, $trade_record) {
            // 定義最大重試次數
            $max_attempts = 10;
            $attempts = 0;
        
            do {
                // 生成trade_id
                $trade_id = "TRADE" . sprintf("%05d", rand(10000, 99999));
                $link = mysqli_connect('localhost','root','12345678','sa');
                // 檢查是否有重複的trade_id
                $sql = "SELECT COUNT(*) FROM trade_record WHERE trade_id='$trade_id'";
                $result = mysqli_query($link, $sql);
                $count = mysqli_fetch_array($result)[0];
        
                // 如果沒有重複，則返回trade_id
                if ($count == 0) {
                    return $trade_id;
                }
                // 如果已經生成了最大次數的trade_id，則返回false
                $attempts++;
                if ($attempts >= $max_attempts) {
                    return false;
                }
            } while (true);
        }
        //連接資料庫
        $link = mysqli_connect('localhost','root','12345678','sa');
        //變更bin_info的statement為completed
        $rating=$_GET['rating'];
        $statement = $_GET['statement'];
        $item_id = $_GET['item_id'];
        $bid_id = $_GET['bid_id'];
        $sql2  = "UPDATE bid_info SET statement = '$statement', rating='$rating' WHERE item_id = '$item_id'";
        mysqli_query($link,$sql2);
        //如果面交成功>statement=completed
        if($statement=="completed"){
        //挑選要插入trade_record的資料
            

            $sql  = "SELECT * FROM bid_info, item_info, iloc, btime WHERE bid_info.user_id = $_SESSION[user_id] AND item_info.item_id = bid_info.item_id AND bid_info.item_id = iloc.item_id AND btime.bid_id = '$bid_id' AND bid_info.bid_id = '$bid_id'";
            $result = mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);
            //要插入trade_record的變數
            $trade_id = generateItemId($link, $trade_record);
            $trade_time = $row['btime_name'];
            $trade_location = $row['iloc_name'];
            $trade_price = $row['bid_price'];
            $item_id = $row['item_id'];
            $bid_id = $row['bid_id'];

            //寫入trade_record
            $sql1 = "INSERT INTO trade_record (trade_id, trade_time, trade_location, trade_price, item_id, bid_id) VALUES ('$trade_id','$trade_time','$trade_location','$trade_price','$item_id','$bid_id')";
            $result = mysqli_query($link,$sql1);
        }
        $sql3 = "SELECT item_info.user_id, AVG(bid_info.rating) AS average_rating
        FROM item_info
        INNER JOIN bid_info ON item_info.item_id = bid_info.item_id
        WHERE item_info.user_id = (
            SELECT item_info.user_id
            FROM item_info
            WHERE item_info.item_id = (
                SELECT bid_info.item_id
                FROM bid_info
                WHERE bid_info.bid_id = '$bid_id'
            )
        )
        AND bid_info.rating IS NOT NULL
        GROUP BY item_info.user_id;
        ";

        $result = mysqli_query($link, $sql3);

        // 检查查询结果
        if ($result) {
            // 遍历结果集获取每个用户的平均评分
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $averageRating = $row['average_rating'];

                // 将平均评分转换为整数
                $averageRatingInt = (int) $averageRating;

                // 更新account表中对应user_id的rating属性
                $updateSql = "UPDATE account SET user_credit = '$averageRatingInt' WHERE user_id = '$user_id'";
                $updateResult = mysqli_query($link, $updateSql);

                
            }
        }
        header("Location:table.php");

        


?>