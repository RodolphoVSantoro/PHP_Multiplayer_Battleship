<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link href="stilo.css" rel="stylesheet" type="text/css">
</head>
<body id="lose">
<div>
<h2 class="perdeu">Você perdeu!!!</h2></div>
<?php
echo"<div id='img'><form action=''  method='post'>
       <input type='hidden' name='reiniciar' value=1/>
       <input type='image' src='recarregar.jpg'/>
     </form></div>";
echo'<audio hidden controls autoplay>
 	 <source src="derrota.mp3" type="audio/mp3">
       </audio>';
if(isset($_POST['reiniciar']))
{
  session_unset();
  session_destroy();
  header('Location: Menu.php');
}
?>
</body>
</html>