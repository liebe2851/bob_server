<!DOCTYPE html>
<html>
<?php 
session_start();
if ($_SESSION['level']!=100){
?>
<script>alert("성주만 게임을 추가할 수 있어요!");
location.href='boardgame.php'
</script>
<?php } ?>
<head>
	<link rel ="stylesheet" href="style.css">
    <meta charset='utf-8'>
 <!---    <style>
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
</style>
--->
</head>
<div class='wrap'>
<body>
    <form method="post" action="game_write_action.php" class="form">
        <!-- method : POST!!! (GET X) -->
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
            <td style="height:40; float:center; background: linear-gradient(to left,#f7cac9,#92a8d1); border-radius:5px; color:white" >  
	<h1> <p>평가하고 싶은 게임 추가</p></h1>
</td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                   

                        <tr>
                            
                            <td><input type="text" name="name" size=70 placeholder ="게임 제목"></td>
                        </tr>

                        <tr>
                            
                            <td><input type="text" name="content" size=100  placeholder= "한줄평"></td>
                        </tr>

                        <tr>
               
              <td><input type="text" name="weight"size=15  maxlength=15 placeholder='geek weight'></td>
                        </tr>
                    </table>

                    <center>
                 <p><input type='submit' value='작성하기'class='form_btn'></p>   
		<p class='pre_btn'> 작성 취소하고싶다면! --> <a href='index.php'> 취소하기</a><p>  
		    </center>
                </td>
            </tr>
	</table>

    </form>
</body>
</div>
</html>
