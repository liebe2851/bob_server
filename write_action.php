<?php
$connect = mysqli_connect("15.164.218.149", "admin_is_sjoo", "bob_11_029_sjoo", "bob_db") or die("fail");


$pw = $_POST['pw'];                     //Password
$title = $_POST['title'];               //Title
$content = $_POST['content']; 		//Content
date_default_timezone_set('Asia/Seoul');
$date = date('Y-m-d H:i:s');            //Date
session_start();
$id = $_SESSION['userid'];
$level = $_SESSION['level'];
$title_check=str_replace(" ","",$title);
$title_check=str_replace("	","",$title_check);

if(!$_SESSION['level'])
{
?>
<script> alert("로그인이 필요해요!"); 
	location.href='login.php'
</script>

<?php
}

if(strlen($content)<5||strlen($title_check)<5){
?>
	<script>alert("내용 또는 제목이 너무 짧아요!");
	history.back();
	
	</script>

<?php
}
else if(strlen($id)<3)
	{
?>
<script>alert("작성자 이름을 제대로 입력 해 주세요!");
		history.back();
		</script>

<?php
	}
else{ 
$URL = './index.php';                   //return URL


$query = "INSERT INTO board (numer, title, content, date, hit, id, passwd,level) 
        values(null,'$title', '$content', '$date', 0, '$id', '$pw',$level)";


$result = $connect->query($query);

if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php

}
else {
    echo "게시글 등록에 실패하였습니다.";
}
}
mysqli_close($connect);
?>
