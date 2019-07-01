<?php
//Faz a conxão
mb_internal_encoding("UTF-8");
$enlace = mysqli_connect("localhost" , "usuario" , "password" , "base_de_dados");
//Verifica se falhou ou não
if (mysqli_connect_errno()) 
{
 printf("Conexão Falhou");
 exit();
}

mysqli_set_charset($enlace, "utf8");
//Faz a consulta dos usuarios com a pontuação
$consulta = "SELECT FROM 'usuarios' ORDER BY 'pontuação' DESC LIMIT 10";
$resultado = mysqli_query($enlace, $consulta);
//Coloca em fila os jogadores e as suas pontuações
$num = mysqli_num_rows($resultado);

for ($i=0; $i < $num; $i++) { 
 $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 echo $row['nome'] . ";" . $row['pontuação']. ";";
}


?>
 

