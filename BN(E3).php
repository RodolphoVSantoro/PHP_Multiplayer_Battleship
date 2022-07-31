<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link href="stilo.css" rel="stylesheet" type="text/css">
<?php
echo"<style>#tabadversario{margin-top: ".$_SESSION['Distancia']."px;}</style>";
?>
</head>
<body><div>
<h1 class="blue">Batalha Naval</h1>

<?php

echo"<p id='jog'>Seus Barcos ".$_SESSION['NomeJ2']." </p>
<p id='jog2'>Barcos de ".$_SESSION['NomeJ1']."</p>
</div>";

if($_SESSION["Acertos2"] < $_SESSION["NAcertos"] && $_SESSION["Acertos1"] < $_SESSION["NAcertos"])
{
if(isset($_POST['coorx']))
{
 $a = $_POST['coorx'];
 $b = $_POST['coory'];
 $_SESSION['UltimoAtkX']=$a;
 $_SESSION['UltimoAtkY']=$b;
 if($_SESSION["CampoJogador1"][$a][$b] == 1)
 {
  $_SESSION["CampoJogador1"][$a][$b] = 3;
  $_SESSION["Acertos2"] = $_SESSION["Acertos2"] + 1; 
 }
 if($_SESSION["CampoJogador1"][$a][$b] == 0)
 {
  $_SESSION["CampoJogador1"][$a][$b] = 2;
 }
 header('Location: BN(E2).php');
}
echo "<table id='tabjogador'>";
for($i=0;$i<$_SESSION['TamanhoCampo'];$i++)
{
  echo "<tr>";
  for($j=0;$j<$_SESSION['TamanhoCampo'];$j++)
  {
    if($_SESSION["CampoJogador2"][$i][$j] == 0 || $_SESSION["CampoJogador2"][$i][$j] == 1)
    {
    echo"<td>
             <img src='desconhecido2.jpg'/>
	</td>";
    }
    if($_SESSION["CampoJogador2"][$i][$j] == 2)
    {
    echo"<td>
             <img src='agua.jpg'>
         </td>";
    }
    
    if($_SESSION["CampoJogador2"][$i][$j] == 3)
    {
    echo"<td>
             <img src='destrocos.jpg'>
         </td>";
    }
  }
  echo"</tr>";
}
echo"</table>";

echo "<table id='tabadversario'>";
for($i = 0;$i < $_SESSION['TamanhoCampo'];$i++)
{
  echo "<tr>";
  for($j = 0;$j < $_SESSION['TamanhoCampo'];$j++)
  {
    if($_SESSION["CampoJogador1"][$i][$j] == 0 || $_SESSION["CampoJogador1"][$i][$j] == 1)
    {
    echo"<td>
             <form action='' method='post'>
               <input type='hidden' name='coorx' value=".$i.">
               <input type='hidden' name='coory' value=".$j.">
               <input type='image' src='agua2.jpg'>
             </form>
	</td>";
    }
    if($_SESSION["CampoJogador1"][$i][$j] == 2)
    {
    echo"<td>
         <img src='agua.jpg'>
         </td>";
    }
    if($_SESSION["CampoJogador1"][$i][$j] == 3)
    {
     echo"<td>
          <img src='destrocos.jpg'>
          </td>";
    }
  }
  echo"</tr>";
}
echo "</table>";
echo "</div>";
}

else
{

	if($_SESSION["Acertos1"] >= $_SESSION["NAcertos"])
	{
		header('Location: vitoria.php');
	}
	else
	{
		if($_SESSION["Acertos2"] >= $_SESSION["NAcertos"])
		{
			header('Location: vitoria2.php');

		}
	}
}
$p = $_SESSION['UltimoAtkX'];
$q = $_SESSION['UltimoAtkY'];
if($p>=0){
  if($_SESSION["CampoJogador2"][$p][$q] == 3)
  {
    echo'<audio hidden controls autoplay>
 	 <source src="explosao2.mp3" type="audio/mp3">
       </audio>';
  }
  if($_SESSION["CampoJogador2"][$p][$q] == 2)
  {
    echo'<audio hidden controls autoplay>
 	 <source src="splash.mp3" type="audio/mp3">
       </audio>';
  }
}
?>

</body>
</html>