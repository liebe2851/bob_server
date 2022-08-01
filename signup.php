
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
           <h1> <p style="font-size: 25px;"><b>회원가입</b></p></h1>
        </span>

	<form method='post' action='signupProcess.php' class="form">
            <p><input name="id" type="text" placeholder="ID"></p>
            <p><input name="pw" type="password" placeholder="PASSWORD"></p>
	    <p><input name="re_pw" type="password" placeholder= "PASSWORD CHECK"></p>
	<br />
            <input type="submit" value="가입하기" class="form_btn">
        </form>
    </div>
</body>

</html>
