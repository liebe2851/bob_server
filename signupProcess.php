<?php
$connect = mysqli_connect('15.164.218.149', 'admin_is_sjoo', 'bob_11_029_sjoo', 'bob_db') or die("connect failed");

$id = $_POST['id'];
$pw = $_POST['pw'];
$re_pw = $_POST['re_pw'];
//id 중복 확인
$id=str_replace(" ","",$id);
$id=str_replace("	","",$id);
$id=addslashes($id);
$pw=addslashes($pw);
if(strlen($id)<2||strlen($pw)<2){
?>
	<script>alert("id, pw는 3자이상으로 해주세요!");
	history.back();
	</script>
<?php
}
else if(strlen($id)>30||strlen($pw)>30)
{
?>
	<script>alert("id,pw가 너무너무 길어요!");
	history.back();
	</script>
<?php

}

else{
$query1 = "select * from user_info where id='$id'";

$result1 = $connect->query($query1);

$count = mysqli_num_rows($result1);

if ($count) {      //만약 중복된 id가 있다면
?>
	<script>
        alert('이미 존재하는 ID입니다.');
        history.back();
    </script>

<?php 
}



else if($pw!=$re_pw)
{
?>
<script>alert("비밀번호가 일치하지 않습니다!");history.back();</script>

<?php
}


else {  //없다면
    //입력받은 데이터를 DB에 저장
    $query = "insert into user_info(id, passwd,level) values('$id', '$pw',1)";

    $result = $connect->query($query);

    //저장이 되었다면 (result = true) 가입 완료
    }

    if ($result) {
    ?> <script>
            alert('회원가입에 성공하였습니다.');
            location.replace("./login.php");
        </script>

<?php 
    }
else {
    ?> <script>
	    alert("회원가입에 실패하였습니다.");
    		history.back();
        </script>
<?php }
}

mysqli_close($connect);
 
?>

