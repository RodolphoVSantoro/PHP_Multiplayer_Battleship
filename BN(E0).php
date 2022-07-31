<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>

</head>
<body>

<?php
$_SESSION['TamanhoCampo'] = $_POST['tamanho'];
$_SESSION['NBarcos'] = $_POST['nsubmarinos'] + $_POST['ndestroyer'] + $_POST['ncruzador'] + $_POST['nporta-avioes'];

$posicaosub = $_POST['nsubmarinos'];
$posicaodes = $_POST['ndestroyer'] + $posicaosub;
$posicaocru = $_POST['ncruzador'] + $posicaodes;
$posicaopor = $_POST['nporta-avioes'] + $posicaocru;

for($x = 0; $x < $posicaosub; $x++)
{
$ordembarcos[$x] = 0;
}
for($x = $posicaosub; $x < $posicaodes; $x++)
{
$ordembarcos[$x] = 1;
}
for($x = $posicaodes; $x < $posicaocru; $x++)
{
$ordembarcos[$x] = 2;
}
for($x = $posicaocru; $x < $posicaopor; $x++)
{
$ordembarcos[$x] = 3;
}
$_SESSION['OrdemBarcos'] = $ordembarcos;
$pe = $_SESSION['NBarcos'];
$_SESSION['NAcertos'] = $pe * 3;

	for($x = 0;$x < $_SESSION['TamanhoCampo'];$x++)
	{
	   for($y=0;$y< $_SESSION['TamanhoCampo'];$y++)
	   {
		$CampoJogador[$x][$y] = 0;
	   }
	}

$_SESSION["CampoJogador1"] = $CampoJogador;
$_SESSION["CampoJogador2"] = $CampoJogador;

$_SESSION['UltimoAtkX']=-1;
$_SESSION['UltimoAtkY']=-1;

$_SESSION["BarcosJogador1"]= 0;
$_SESSION["BarcosJogador2"]= 0;
if($_SESSION['TamanhoCampo'] == 3)
{
$_SESSION['Distancia'] = -400;
}
if($_SESSION['TamanhoCampo'] == 4)
{
$_SESSION['Distancia'] = -440;
}
if($_SESSION['TamanhoCampo'] == 5)
{
$_SESSION['Distancia'] = -488;
}
if($_SESSION['TamanhoCampo'] == 6)
{
$_SESSION['Distancia'] = -530;
}
if($_SESSION['TamanhoCampo'] == 7)
{
$_SESSION['Distancia'] = -573;
}
if($_SESSION['TamanhoCampo'] == 8)
{
$_SESSION['Distancia'] = -618;
}

$_SESSION['NomeJ1'] = $_POST['J1'];
$_SESSION['NomeJ2'] = $_POST['J2'];

$_SESSION['Acertos1'] = 0;
$_SESSION['Acertos2'] = 0;

/*barcos = tamanho:
  submarino = 1
  destroyer = 2 
  cruzador = 3
  porta-aviões = 4
*/

header('Location: BN(E1).php');
?>
</body>
</html>
