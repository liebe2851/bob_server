<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8'>

    <style>
	body{
  background-image : url(https://blog.kakaocdn.net/dn/FL65p/btrIKmZ3hI1/PZbTAJ6SObcYZ1ysYPnb30/img.png);
	background-repeat:no-repeat;
	background-position:center;
	background-size:200px;
}
td{
border-bottom : 1px solid #444444;
padding=10px;
}
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
	    height: 10px;
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
    $name = $_GET['name'];  // GET 방식 사용
    session_start();
    $query = "select * from game where name= '$name';";
    $result = $connect->query($query);
	
    $rows = mysqli_fetch_assoc($result);
    $name = $rows['name'];   
    
    $query2="select * from $name;";

    $g_result= $connect-> query($query2);

    $user_level= $_SESSION['level'];
    $comment=nl2br($rows['comment']);
   
?> 
<?php if (!$user_level)
    {  ?>
    <script>
 
    alert("로그인이 필요합니다!");
	location.href = 'login.php';	
	</script>
<?php } 
if($rows['star']=='5.0000')
{ ?><script>alert("완벽한 게임이에요! SJOO{THi5_1S_hidd@n_FLAG}");</script>
<?php }?>
    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><b><?php echo $rows['name'] ?></b></td>
        </tr>
	<tr>
	 
            <td class="read_id">weight</td>
            <td class="read_id2"><?php echo $rows['weight'] ?></td>
            <td class="read_hit">별점</td>
            <td class="read_hit2"><?php echo $rows['star'] ?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $comment ?></td>
        </tr>
    </table>

    <!-- MODIFY & DELETE 추후 세션처리로 보완 예정 -->
    <div class="read_btn">
	<button style="cursor: pointer" class="read_btn1" onclick="location.href='boardgame.php'">목록</button>&nbsp;&nbsp;
       
		<button style="cursor: pointer" class="read_btn1" onClick="location.href='addstar.php?name=<?=$name?>'">별점</button>
<br><br>
    </div>
<?php
    $query="select * from $name order by 1;";

    $result=$connect->query($query);
    

    
?>
<table class="read_table" align=center>
<tr>
<td colspan="6" class="read_title"<b>댓글 남긴 사람들 ...</b></td>
</tr>
<?php 
    while($rows=mysqli_fetch_assoc($result)){?>
<tr>
<td class="read_id">작성자</td>
<td class="read_id2"><?php echo $rows['id'] ?></td>
<td class='read_id'>comment</td>
<td class="read_id2"><?php echo $rows['comment'] ?></td>
<td class="read_id">별점</td>
<td class="read_id2"><?php echo $rows['star'] ?></td>
</tr>
<?php } ?>
</body>

</html>
