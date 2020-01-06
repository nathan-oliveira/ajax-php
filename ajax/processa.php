<?php 

// banco de dados
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$base = 'alunos';

$conexao = new mysqli($servidor, $usuario, $senha, $base) or die("Erro na conexão");

if(isset($_GET['buscanome'])){

	// busca
	$nome = $_GET['buscanome'];
	
	if(empty($nome)){
		$query = "SELECT * FROM alunos";
	} else{
		$query = "SELECT * FROM alunos WHERE nome LIKE '%$nome%'";
	}

	$sql = $conexao->query($query);

	$contagem = $sql->num_rows;

	sleep(1); // congela por 1 seg

	if($contagem > 0){

		// exibe
		echo "<table class='table table-hover table-striped'>
				<thead>
					<tr>
						<th>ID</th>
						<th>NOME</th>
						<th>TELEFONE</th>
						<th>E-MAIL</th>
						<th>ENDEREÇO</th>
						<th>APAGAR</th>
					</tr>
				</thead>
			<tbody>";

		while($linha = $sql->fetch_array()){
			echo '<tr>';
			echo '<td>'.$linha['id'].'</td>';
			echo '<td>'.$linha['nome'].'</td>';
			echo '<td>'.$linha['email'].'</td>';
			echo '<td>'.$linha['telefone'].'</td>';
			echo '<td>'.$linha['endereco'].'</td>';
			echo '<td><a href="#" onclick="deletaUsuario('.$linha['id'].');">Deletar</a></td>';
			echo '</tr>';
		}

		echo '</tbody></table>';
	}
	else{
		echo 'Nenhum registro encontrado.';
	}
} 
else if(isset($_GET['nome']) and isset($_GET['telefone']) and isset($_GET['endereco']) and isset($_GET['email'])){
	$nome = $_GET['nome'];
	$telefone = $_GET['telefone'];
	$endereco = $_GET['endereco'];
	$email = $_GET['email'];

	$query = "INSERT INTO alunos(nome, telefone, endereco, email) VALUES('$nome', '$telefone', '$endereco', '$email')";
	sleep(1);

	$sql = $conexao->query($query);
	echo "<span class='btn btn-success'>Inserido com sucesso</span>";
} else if(isset($_GET['deleta'])){
	$id = $_GET['deleta'];
	$query = "DELETE FROM alunos WHERE id = '$id'";
	sleep(1);

	$sql = $conexao->query($query);
	echo "<span class='btn btn-success'>Deletado com sucesso</span>";
} else {
	echo "<span class='btn btn-danger'>Um erro ocorreu. Por favor, preencha todos os campos</span>";
}