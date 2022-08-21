<?php
$connect = mysqli_connect('15.164.218.149', 'admin_is_sjoo', 'bob_11_029_sjoo', 'bob_db') or die("connect failed");
session_start();
$star = $_POST['star'];

$id=$_SESSION['userid'];
$name=$_POST['name'];
$comment =$_POST['comment'];


if($star==1||$star==2||$star==3||$star==4||$star==5){

$query1 = "select * from $name where id='$id';";


$result1 = $connect->query($query1);
$query2 = "select * from game where name='$name';";
$result2 = $connect->query($query2);
$rows=mysqli_fetch_assoc($result2);
$count = mysqli_num_rows($result1);

if ($count) {      //만약 중복된 id가 있다면
?>
	<script>
        alert('별점은 한명 당 한번만!');
        history.back();
    </script>

<?php 
}


else{
    $query = "insert into $name(id, comment,star) values('$id', '$comment',$star);";

    $result = $connect->query($query);

    //저장이 되었다면 (result = true) 가입 완료
    }

if ($result) {
	$get_star="select avg(star) from $name;";	

	$new_star=$connect->query($get_star);
	$ans= mysqli_fetch_assoc($new_star);	
	$new_star=$ans['avg(star)'];
	$query2="update game set star='$new_star' where name='$name';";
	echo $query2;
	$connect->query($query2);
 
    ?> <script>
            alert('별점 등록에 성공했습니다');
            location.replace("boardgame.php");
        </script>

<?php 
    }
 
}    
else {
    ?> <script>
	    alert("1부터 5까지만 입력흐르그...");
    		history.back();
        </script>
<?php
}


mysqli_close($connect);
 
 
?>

