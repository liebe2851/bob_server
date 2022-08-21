<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>	
	body{background-image: url(https://img1.daumcdn.net/thumb/R1280x0/?scode=mtistory2&fname=https%3A%2F%2Fblog.kakaocdn.net%2Fdn%2Fpnlud%2FbtrIKlz0yEx%2Fpdwh8MRiIt4uFCjFszmDuk%2Fimg.png);
	background-repeat: no-repeat;
	background-size: 400px;						
	background-position:right bottom;
}
	table {
	   
            border-top: 1px solid #444444;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid #444444;
	    padding: 10px;
		background : linear-gradient(to left, #f7cac9, #92a8d1);
        }

        td {
            border-bottom: 1px solid #444444;
            padding: 10px;
        }
       .wrap .form_btn { width: 200px; height: 50px;
    margin: 10px; border-radius: 5px; border: 0;
    background: linear-gradient(to left, #92a8d1, #f7cac9);
    color: #fff; font-weight: bold; font-size: 18px;
    cursor: pointer;}


	table .even {
            background: linear-gradient(to left,#f7cac9,#ffffff);
	}
	.odd {
		background:linear-gradient(to right,#ffffff,#92a8d1);

	}

        .text {
            text-align: center;
            padding-top: 20px;
            color: #000000
        }

        .text:hover {
            text-decoration: underline;
        }

        a:link {
            color: #57A0EE;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('15.164.218.149', 'admin_is_sjoo', 'bob_11_029_sjoo', 'bob_db') or die("connect failed");
    $query = "select * from game order by name";    //역순 출력
    $result = mysqli_query($connect, $query);
    // $result = $connect->query($query);
    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환

    session_start();

    if (isset($_SESSION['userid'])) {
    ?><b><?php echo $_SESSION['userid']; ?></b> 친구! 성주랑 보드 게임하지 않을래? 
        <button onclick="location.href='./logout.php'" style="float:right; font-size:15.5px;">로그아웃</button>
        <br />
    <?php
    } else {
    ?>
        <button onclick="location.href='./login.php'" style="float:right; font-size:15.5px;">로그인</button>
        <br />
    <?php
    }
    ?>

    <p style="font-size:25px; text-align:center"><b> 보드게임 평가중..</b></p>

    <table align=center>
        <thead align="center">
            <tr>
                <td width="100" align="center">번호</td>
                <td width="200" align="center">게임 이름</td>
               
                <td width="100" align="center">별점</td>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {   //result set에서 레코드(행)를 1개씩 리턴
                if ($total % 2 == 0) {
            ?>
                    <tr class="even">
                        <!--배경색 진하게-->
                    <?php } else {
                    ?>
                    <tr class="odd"> 
                        <!--배경색 그냥-->
                    <?php } ?>
                    <td width="100" align="center"><?php echo $total ?></td>
        	<td width='200' align='center'>
		 	<a href="game_star.php?name=<?php echo $rows['name']?>"><?php echo $rows['name']?></td>
                    <td width="100" align="center"><?php echo $rows['star'] ?></td>
                    </tr>
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>
	<div class='wrap' align='center'>
<br>
	<p class ="form_btn" onClick="location.href='./game_write.php'">게임추가 성주만...</p>
    <p class ="form_btn" onClick="location.href='./index.php'">메인메뉴</p>
</body>

</html>
