<?php session_start();?>
<!DoCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
</head>
<body>

<?php
session_unset();
session_destroy();
?>
<script> alert("Sessao Encerrada");</script>
</body>
</html>