<?php


$conn = mysqli_connect('localhost','root','12345678','sa');

// 檢查連線是否成功
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 指定要推薦的商品
$item_id = 'ITEM55837';

// 查詢三個tag_name都相同的商品
$sql = "SELECT t2.item_id
FROM tag t1
JOIN tag t2 ON t1.tag_name = t2.tag_name AND t1.item_id <> t2.item_id
WHERE t1.item_id = '$item_id'
GROUP BY t2.item_id
HAVING COUNT(DISTINCT t1.tag_name) = 3
LIMIT 3";

$result = mysqli_query($conn, $sql);

// 如果有查詢結果，則取得該商品資料
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recommended_item_ids[] = $row['item_id'];
    }
}

// 如果沒有三個tag_name都相同的商品，則查詢兩個tag_name相同的商品
if (count($recommended_item_ids) < 3) {
    $sql = "SELECT t2.item_id
    FROM tag t1
    JOIN tag t2 ON t1.tag_name = t2.tag_name AND t1.item_id <> t2.item_id
    WHERE t1.item_id = '$item_id'
    GROUP BY t2.item_id
    HAVING COUNT(DISTINCT t1.tag_name) = 2
    LIMIT " . (3 - count($recommended_item_ids));

    $result = mysqli_query($conn, $sql);

    // 取得查詢結果的商品資料
    while ($row = mysqli_fetch_assoc($result)) {
        $recommended_item_ids[] = $row['item_id'];
    }
}

// 如果還是沒有三個商品，則查詢一個tag_name相同的商品
if (count($recommended_item_ids) < 3) {
    $sql = "SELECT t2.item_id
    FROM tag t1
    JOIN tag t2 ON t1.tag_name = t2.tag_name AND t1.item_id <> t2.item_id
    WHERE t1.item_id = '$item_id'
    GROUP BY t2.item_id
    HAVING COUNT(DISTINCT t1.tag_name) = 1
    LIMIT " . (3 - count($recommended_item_ids));

    $result = mysqli_query($conn, $sql);

    // 取得查詢結果的商品資料
    while ($row = mysqli_fetch_assoc($result)) {
        $recommended_item_ids[] = $row['item_id'];
    }
}

// 關閉資料庫連線
mysqli_close($conn);

// 輸出推薦的商品id
print_r($recommended_item_ids);

?>
