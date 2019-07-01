<?php

mb_internal_encoding("UTF-8");
$enlace = mysqli_connect("host", "username", "password", "database");

if (mysqli_connect_erro()) {
	printf("Conexão Falhou: %s\n", mysqli_connect_erro());
	exit ();
}

mysqli_set_charset($enlace,"UTF-8");

$NovoNome = mysqli_real_escape_string($enlace,$_GET['nome']);
$NovaPontuação = mysqli_real_escape_string($enlace,$_GET['Pontuação']);
$hash = $_GET['hash'];

$Jogadores="SELECT * FROM `RankingJogadores`";
$resultadoJogadores = mysqli_query($enlace, $Jogadores);
$NumJogadores = mysqli_num_rows($resultadoJogadores);

$chaveSecreta="dobkx12fjea59";

$NomeRepetido= "SELECT * FROM `RankingJogadores` WHERE `nome` = $NovoNome";
$resultado = mysqli_query($enlace, $NomeRepetido);
$NomeRepetido = mysqli_num_rows($resultado);

$real_hash = md5($novoNome . novaPontuação . chaveSecreta);

$JogadoresMinimo="SELECT * FROM `RankingJogadores` WHERE `Pontuação` = ( SELECT MIN (Pontuação) FROM `RankingJogadores`";

if ($real_hash == $hash) {

	if($NumRepetidos>0)
	{
		echo "0";
	}

	else
	{
		if($resultadoJogadoresMinimo = mysqli_query($enlace, $jogadorMinimo))
	{

		if ($NumJogadores<10)
		{

			&consulta = "insert into RankingJogadores values ('novoNome' , '$novaPontuação');";
			if ((mysqli_query($enlace, $consulta)))
				echo "1";
			else
				echo "Erro :" . mysqli_erro($enlace);

		}
		else if ( $novaPontuação > mysqli_fetch_assoc($resultadoJogadorMinimo)['pontuação'])
		{
			$Eliminado = "DELETE FROM RankingJogadores ORDER BY pontuação ASC LIMIT 1";
			$consulta = "insert into RankingJogadores values ('$novoNome' , '$novaPontuação');";
		
			if ((mysqli_query($enlace, $consulta)) && (mysqli_query($enlace, $Eliminado)))
				echo "2";
			else
				echo "Erro :" . mysqli_erro($enlace);
			}	
			else
				echo "3";

		}
	

	}


}
?>