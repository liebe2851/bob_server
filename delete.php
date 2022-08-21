<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta charset='utf-8'>
</head>

<body>
<div align ='center' class=wrap>
<?php
 $number = $_GET['number'];
 $connect = mysqli_connect('15.164.218.149', 'admin_is_sjoo', 'bob_11_029_sjoo', 'bob_db');
 
 session_start();

?>

<form method = 'post' action='delete_action.php' class='form'>
<p><b> 게시글 작성 할 때 썼던 비밀번호를 입력해 주세요!</b>
<input name = "passwd" type='text' placeholder="PASSWORD"></p>
<input name = 'number' type='hidden' value="<?php echo $number ?>">
<input type ='submit' value='확인' class='form_btn'>
<p class='pre_btn'>삭제하기 싫나요? --> <a href='./index.php'>돌아가기</a></p>
</form>


</body>

</html>
