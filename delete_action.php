<?php

$connect = mysqli_connect("15.164.218.149","admin_is_sjoo","bob_11_029_sjoo","bob_db") or die("fail");

$passwd = $_POST['passwd'];
$number = $_POST['number'];
session_start();
$query= "select id, passwd from board where numer = $number";
$id=$_SESSION['userid'];
$result = $connect->query($query);
$rows= mysqli_fetch_assoc($result);

if($passwd==$rows['passwd']&&$id==$rows['id']){
	$query2= "DELETE FROM board WHERE numer=$number";
	$connect->query($query2);
?>

<script> alert("삭제가 완료되었습니다!");
	location.replace("index.php");
</script>

<?php
}

else if($passwd==$rows['passwd']&&$id!=$rows['id']){
?>
<script> alert("제대로 된 id로 로그인 해 주세요!");
history.back();
</script> 
<?php 
}
else {
?>
	<script>	
	alert( "게시물의 비밀번호를 제대로 입력 해 주세요!");
	history.back();
	</script>

<?php
}
mysql_close($connect);
 ?>
