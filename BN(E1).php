<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link href="stilo.css" rel="stylesheet" type="text/css">
</head>
<body><div id="E1">
<h1 class="blue">Batalha Naval</h1>
<?php

$n = $_SESSION['BarcosJogador1'];
$tipodebarco = $_SESSION['OrdemBarcos'][$n];

if(isset($_POST['coorx']))
{
	if($tipodebarco != 0)
	{
		$sobrepondo = "f";

		if(isset($_SESSION['cx1']))
		{
			$_SESSION['cx2'] = $_POST['coorx'];
			$_SESSION['cy2'] = $_POST['coory'];
		}
		else
		{
			$_SESSION['cx1'] = $_POST['coorx'];
			$_SESSION['cy1'] = $_POST['coory'];
		}

		if(isset($_SESSION['cx1']) && isset($_SESSION['cx2']))
		{
			if($_SESSION['cx1'] == $_SESSION['cx2'] && $_SESSION['cy1'] != $_SESSION['cy2'])
			{
				if($_SESSION['cy2'] > $_SESSION['cy1'])
				{
					$subtracao = $_SESSION['cy2'] - $_SESSION['cy1'];
					$menor = $_SESSION['cy1'];
					$maior = $_SESSION['cy2'];
				}
				else
				{
					$subtracao = $_SESSION['cy1'] - $_SESSION['cy2'];
					$menor = $_SESSION['cy2'];
					$maior = $_SESSION['cy1'];
				}
				if($subtracao == $tipodebarco)
				{
					$cx = $_SESSION['cx1'];
					for($x=$menor;$x<=$maior;$x++)
					{
						if($_SESSION['CampoJogador1'][$cx][$x] !=0)
						{
							$sobrepondo = "v";
						}
					}
					if($sobrepondo == "f")
					{
						for($x=$menor;$x<=$maior;$x++)
						{
							$_SESSION['CampoJogador1'][$cx][$x] = 1;
						}
						$_SESSION['BarcosJogador1'] = $_SESSION['BarcosJogador1'] + 1;
						unset($_SESSION['cx1']);
						unset($_SESSION['cy1']);
						unset($_SESSION['cx2']);
						unset($_SESSION['cy2']);
						
					}
					else
					{
						unset($_SESSION['cx1']);
						unset($_SESSION['cy1']);
						unset($_SESSION['cx2']);
						unset($_SESSION['cy2']);
					}
				}
				else
				{
					unset($_SESSION['cx1']);
					unset($_SESSION['cy1']);
					unset($_SESSION['cx2']);
					unset($_SESSION['cy2']);
				}
			}
			else
			{
				if($_SESSION['cx1'] != $_SESSION['cx2'] && $_SESSION['cy1'] == $_SESSION['cy2'])
				{
					if($_SESSION['cx2'] > $_SESSION['cx1'])
					{
						$subtracao = $_SESSION['cx2'] - $_SESSION['cx1'];
						$menor = $_SESSION['cx1'];
						$maior = $_SESSION['cx2'];
					}
					else
					{
						$subtracao = $_SESSION['cx1'] - $_SESSION['cx2'];
						$menor = $_SESSION['cx2'];
						$maior = $_SESSION['cx1'];
					}
					if($subtracao == $tipodebarco)
					{
						$cy = $_SESSION['cy1'];
						for($x=$menor;$x<=$maior;$x++)
						{
							if($_SESSION['CampoJogador1'][$x][$cy] !=0)
							{
								$sobrepondo = "v";
							}
						}
						if($sobrepondo == "f")
						{
							$cy = $_SESSION['cy1'];
							for($x=$menor;$x<=$maior;$x++)
							{
								$_SESSION['CampoJogador1'][$x][$cy] = 1;
							}
							$_SESSION['BarcosJogador1'] = $_SESSION['BarcosJogador1'] + 1;
							unset($_SESSION['cx1']);
							unset($_SESSION['cy1']);
							unset($_SESSION['cx2']);
							unset($_SESSION['cy2']);
						}
						else
						{
							unset($_SESSION['cx1']);
							unset($_SESSION['cy1']);
							unset($_SESSION['cx2']);
							unset($_SESSION['cy2']);
						}
					}
					else
					{
						unset($_SESSION['cx1']);
						unset($_SESSION['cy1']);
						unset($_SESSION['cx2']);
						unset($_SESSION['cy2']);
					}
				}
				else
				{
					if($_SESSION['cx1'] != $_SESSION['cx2'] && $_SESSION['cy1'] != $_SESSION['cy2'])
					{
						unset($_SESSION['cx1']);
						unset($_SESSION['cy1']);
						unset($_SESSION['cx2']);
						unset($_SESSION['cy2']);
					}
					else
					{
						if($_SESSION['cx1'] == $_SESSION['cx2'] && $_SESSION['cy1'] == $_SESSION['cy2'])
						{
							unset($_SESSION['cx1']);
							unset($_SESSION['cy1']);
							unset($_SESSION['cx2']);
							unset($_SESSION['cy2']);
						}
					}
				}
			}

		}
	}
	else
	{
			$_SESSION["BarcosJogador1"] += 1;
			$a = $_POST['coorx'];
			$b = $_POST['coory'];
			$_SESSION["CampoJogador1"][$a][$b] = 1;	
	}
}
if($_SESSION["BarcosJogador1"] == $_SESSION['NBarcos'])
{
$_SESSION["BarcosJogador1"]-=1;
unset($_SESSION['cx1']);
unset($_SESSION['cy1']);
unset($_SESSION['cx2']);
unset($_SESSION['cy2']);
header("Location: BN(E1,5).php");
}

$n = $_SESSION['BarcosJogador1'];
$tipodebarco = $_SESSION['OrdemBarcos'][$n];

echo'<p id="jog">Selecione '.$_SESSION['NBarcos'].' Barcos<br/>'.$_SESSION['NomeJ1'];

if($tipodebarco == 0)
{
	echo "(Submarino)";
}
if($tipodebarco == 1)
{
	echo "(Destroyer)";	
}
if($tipodebarco == 2)
{
	echo "(Cruzador)";
}
if($tipodebarco == 3)
{
	echo "(Porta-Avioes)";
}
echo'</p>';
echo"</div>";

echo "<table  id='tabjogador'>";
for($i=0;$i<$_SESSION['TamanhoCampo'];$i++)
{
  echo "<tr>";
  for($j=0;$j<$_SESSION['TamanhoCampo'];$j++)
  {
    if($_SESSION["CampoJogador1"][$i][$j] == 0){
    echo"<td> 
             <form action='' method='post'>
               <input type='hidden' name='coorx' value=".$i.">
               <input type='hidden' name='coory' value=".$j.">
               <input type='image' src='agua2.jpg'>
             </form>
	</td>";
    }
    else
    {
    echo"<td>
         <img src='barco2.jpg'>
         </td>";
    }
  }
  echo"</tr>";
}
echo "</table>";

echo "<table id='tabadversario2'>";
for($i = 0;$i < $_SESSION['TamanhoCampo'];$i++)
{
  echo "<tr>";
  for($j = 0;$j < $_SESSION['TamanhoCampo'];$j++)
  {
    echo"<td>
           <img src='desconhecido2.jpg'>
         </td>";
  }
  echo"</tr>";
}
echo "</table>";
?>

</body>
</html>
