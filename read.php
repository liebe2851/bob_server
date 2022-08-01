<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8'>

    <style>
        .read_table {
	    border: 1px solid #444444;
	    border-radius:5px;
            margin-top: 30px;
        }

        .read_title {
            height: 45px;
            font-size: 23.5px;
	    text-align: center;
	    border-radius:5px;
	    background : linear-gradient(to left , #92a8d1,#f7cac9);
            color: white;
            width: 1000px;
        }

        .read_id {
            text-align: center;
            background-color: #EEEEEE;
            width: 30px;
            height: 33px;
        }

        .read_id2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_hit {
            background-color: #EEEEEE;
            width: 30px;
            text-align: center;
            height: 33px;
        }

        .read_hit2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #444444;
	    height: 500px;
	     background-image : url(https://blog.kakaocdn.net/dn/bcOToP/btrIH6QD4oC/WKYuztIKFiSMFXM7k6RURK/img.png);
		background-repeat:no-repeat;
		background-size:300px;
		background-position:left bottom;
        }

        .read_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .read_btn1 {
            height: 50px;
            width: 100px;
            font-size: 20px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
        }

        .read_comment_input {
            width: 700px;
            height: 500px;
            text-align: center;
	    margin: auto;
	    
        }

        .read_text3 {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }

        .read_com_id {
            width: 100px;
        }

        .read_comment {
            width: 500px;
        }
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('15.164.218.149', 'admin_is_sjoo', 'bob_11_029_sjoo', 'bob_db');
    $number = $_GET['number'];  // GET 방식 사용
    session_start();
    $query = "select title, content, date, hit, id,level from board where numer = $number";
    $result = $connect->query($query);

    $rows = mysqli_fetch_assoc($result);
    $db_level = $rows['level'];   
    $user_level= $_SESSION['level'];
    $contents=nl2br($rows['content']);
	?> 
<?php if (!$user_level)
    {  ?>
    <script>
 
    alert("로그인이 필요합니다!");
	location.href = 'login.php';	
	</script>
<?php }
    else if ( $user_level<$db_level)
	    
    { ?>
	
    <script>
 
    alert("권한이 부족합니다!");
	location.href='index.php';   	
    </script>
<?php    }
	else if ($user_level==100){
?>		<script> alert("성주야 안녕! -('-^)v  성주가 아니라면 성주를 찾아오세요! 초콜릿을 드려요 ");</script>
<?php	} ?>


    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><b><?php echo $rows['title'] ?></b></td>
        </tr>
	<tr>
	 
            <td class="read_id">작성자</td>
            <td class="read_id2"><?php echo $rows['id'] ?></td>
            <td class="read_hit">조회수</td>
            <td class="read_hit2"><?php echo $rows['hit'] ?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $contents ?></td>
        </tr>
    </table>

    <!-- MODIFY & DELETE 추후 세션처리로 보완 예정 -->
    <div class="read_btn">
	<button style="cursor: pointer" class="read_btn1" onclick="location.href='index.php'">목록</button>&nbsp;&nbsp;
        <button style="cursor: pointer" class="read_btn1" onclick="location.href='./delete.php?number=<?= $number?>'">삭제</button>
    </div>
<?php
		$number=$_GET['number'];
		$hit=$rows['hit']+1;
		
		$query2= "update board set hit=$hit where numer=$number";
		$connect->query($query2);
?>
</body>

</html>
