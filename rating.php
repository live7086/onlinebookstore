<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>給予評分</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .rating-box {
            text-align: center;
        }

        .rating {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .rating .fa-star {
            color: orange;
        }

        #rating-value {
            margin-bottom: 20px;
        }

        #confirm-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="rating-box">
        <h1 class="rating-boxH1">請為本次交易進行評分</h1>
        <div class="rating">
            <span class="fa fa-star-o"></span>
            <span class="fa fa-star-o"></span>
            <span class="fa fa-star-o"></span>
            <span class="fa fa-star-o"></span>
            <span class="fa fa-star-o"></span>
        </div>
        <h4 id="rating-value"></h4>
        <button id="confirm-btn">確認</button>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);

        const statement = urlParams.get('statement');
        const itemId = urlParams.get('item_id');
        const bidId = urlParams.get('bid_id');

        // 使用获取到的值进行后续操作
        // ...

        const stars = document.querySelector(".rating").children;
        let ratingValue;
        let index; //目前選到的星星
        document.getElementById("rating-value").innerHTML = "請選擇星星數";

        for (let i = 0; i < stars.length; i++) {
            stars[i].addEventListener("mouseover", function() {
                document.getElementById("rating-value").innerHTML = "正在評分";
                for (let j = 0; j < stars.length; j++) {
                    stars[j].classList.remove("fa-star"); //reset 所有星星
                    stars[j].classList.add("fa-star-o");
                }
                for (let j = 0; j <= i; j++) {
                    stars[j].classList.remove("fa-star-o"); //先移除空心的星星
                    stars[j].classList.add("fa-star"); //添加新的星星 如果i=j表示選中的
                }
            });

            stars[i].addEventListener("click", function() {
                ratingValue = i + 1;
                index = i;
                document.getElementById("rating-value").innerHTML = "你給 " + ratingValue + " 顆星";
            });

            stars[i].addEventListener("mouseout", function() {
                for (let j = 0; j < stars.length; j++) {
                    stars[j].classList.remove("fa-star"); //reset 所有星星
                    stars[j].classList.add("fa-star-o");
                }
                for (let j = 0; j <= index; j++) {
                    stars[j].classList.remove("fa-star-o");
                    stars[j].classList.add("fa-star");
                }
            });
        }

        const confirmBtn = document.getElementById("confirm-btn");
        confirmBtn.addEventListener("click", function() {
            if (ratingValue) {
                const url = "invitelink.php?rating=" + ratingValue + "&statement=" + statement+ "&item_id=" + itemId+ "&bid_id=" + bidId;
                window.location.href = url;
            } else {
                alert("請選擇星星數量");
            }
        });
    </script>
</body>
</html>
