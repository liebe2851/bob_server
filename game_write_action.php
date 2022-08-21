<?php
$connect = mysqli_connect("15.164.218.149", "admin_is_sjoo", "bob_11_029_sjoo", "bob_db") or die("fail");


$name = $_POST['name'];                     //Password
$weight = $_POST['weight'];               //Title
$comment = $_POST['content']; 		//Content
session_start();
$id = $_SESSION['userid'];
$level = $_SESSION['level'];
$check_query = "select * from game where name='$name';";
$check_result = $connect->query($check_query);
$count = mysqli_num_rows($check_result);

if($_SESSION['level']!=100)


{
?>
	<script> alert("성주만 할 수 있어요!"); 
	location.href='boardgame.php'
</script>


<?php
}
else if($count)
{ ?>
	<script> alert("이미 존재하는 게임입니다.");
	history.back();
</script>
<?php
}

else{ 

$URL = "./boardgame.php";                   //return URL


$query = "create table $name (id varchar(30) not null ,comment varchar(100) not null,star int not null);";


$result= $connect->query($query);

$query2 = "INSERT INTO game (name,star,comment,weight)values('$name',0,'$comment','$weight');";


$result2 = $connect->query($query2);

if ($result2) {
?> <script>
        alert("<?php echo "게임이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php

} 
else {
    echo "게임 등록에 실패하였습니다.";
}
}
mysqli_close($connect);
 
?>
