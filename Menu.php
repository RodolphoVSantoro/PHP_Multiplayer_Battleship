<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
echo"Escolha o tamanho do campo:";
echo " <form method='post' action='BN(E0).php'>
	 <select name ='tamanho'>
	    <option value='6'>6X6</option>
	    <option value='7'>7X7</option>
	    <option value='8'>8X8</option>
	 </select>
	 <br/>
	 Escolha o numero de barcos para você e seu asdversario:
	 <br/>
	 Número de Submarinos:<br/>
	 <select name='nsubmarinos'>
	    <option value='1'>1</option>
	    <option value='2'>2</option>
	 </select>
	 <br/>
	 Número de Destroyers:<br/>
	 <select name='ndestroyer'>
	    <option value='1'>1</option>
	    <option value='2'>2</option>
	 </select>
	 <br/>
	 Número de Cruzadores:<br/>
	 <select name='ncruzador'>
	    <option value='1'>1</option>
	    <option value='2'>2</option>
	 </select>
	 <br/>
	 Número de Porta-Avioes:<br/>
	 <select name='nporta-avioes'>
	    <option value='1'>1</option>
	    <option value='2'>2</option>
	 </select>
	 <br/>
	 <input type = 'text' name='J1'>
	 <input type = 'text' name='J2'>
	 <input type = 'submit' value= 'Iniciar'>
       </form>";
?>
</body>
</html>