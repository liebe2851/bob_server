
<!DOCTYPE html>
<html>

<head>
    <link rel ="stylesheet" href="style.css">
    <meta charset='utf-8'>
</head>

<div id="register_wrap" class='wrap'>
<body>
    <div align="center">
	<span>
<?php $name=$_GET['name']; ?>
           <h1> <p style="font-size: 25px;"><b>별점주기~</b></p></h1>
        </span>

	<form method='post' action="addstar_action.php" class="form">
	
            <p><input name='comment' type="text" placeholder="한줄 코멘트 해주세용"></p>
	    <p><input name="star" type="int" placeholder= "별점! 1부터 5까지 숫자만 입력하세요~"></p>
	    <input type="hidden" name="name" value='<?php echo $name?>'>
<br />
            <input type="submit" value="제출하기" class="form_btn">
        </form>
    </div>
</body>

</html>
