<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
</head>

<body>
<div align ='center'>
<?php
 $number = $GET['number'];
 $connect = mysqli_connect('15.164.218.149', 'admin_is_sjoo', 'bob_11_029_sjoo', 'bob_db');
 
 session_start();

?>

<form method = 'post' action='delete_action.php'>
<p><b> 게시글 작성 할 때 썼던 비밀번호를 입력해 주세요!</b>
<input name = "passwd" type='text'></p>
<b> 주소창에 보이는 'number'입력 해 주세요! </b>
<input name = 'number' type='int'></p>
<input type ='submit' value='확인'>
</form>

<br>
<button onclick="location.href='./index.php'" style="float:center; font-size:15.5px;">돌아가기</button>

</body>

</html>
