<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    
<style>	
	body{background-image: url(https://blog.kakaocdn.net/dn/zubwY/btrIEcYrNj0/MvdC5JpwPkjQIFoAZtEUD1/img.png);
	background-repeat: no-repeat;
	background-size: 300px;						
	background-position:left bottom;
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
    $query = "select * from board order by numer desc";    //역순 출력
    $result = mysqli_query($connect, $query);
    // $result = $connect->query($query);
    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환

    session_start();

    if (isset($_SESSION['userid'])) {
    ?><b><?php echo $_SESSION['userid']; ?></b> 친구! 반가워! 
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

    <p style="font-size:25px; text-align:center"><b> 주절 주절 게시판</b></p>

    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="200" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
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
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="200" align="center">
                        <a href="read.php?number=<?php echo $rows['numer'] ?>">
                            <?php echo $rows['title'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $rows['id'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                    </tr>
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>

    <div class='wrap' align='center'>
<br>
<p class="form_btn" onclick="location.href='./write.php'">글쓰기</p>
<p class="form_btn" onclick="location.href='./boardgame.php'">보드게임 평가하기</p>

    </div>
</body>

</html>
