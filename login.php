<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css">
    <meta charset='utf-8'>
</head>

<body>
	<div id ="login_wrap" class ="wrap">
    <div align='center'>
        <span>
           <h1> <p style="font-size: 25px;"><b>로그인</b></p></h1>
        </span>

        <form method='post' action='login_action.php' class='form'>
            <p><input name="id" type="text" name="USER ID" placeholder="ID"></p>
            <p><input name="pw" type="password" name="pw" placeholder="PASSWORD"></p>
            <br />&nbsp;
            <input type="submit" value="로그인" class="form_btn">&nbsp;&nbsp;
        </form>
        <p class="form_btn" onclick="location.href='./signup.php'">회원가입</p>
	</div>
    </div>
</body>

</html>
