/* JavaScript AJAX */

function buscaDados(){

	var nome = document.getElementById("buscanome").value;
	var result = document.getElementById("dados");

	var ajax = new XMLHttpRequest();

	result.innerHTML = '<img src="loading.gif" width="100px">';

	ajax.open("GET", "processa.php?buscanome=" + nome, true);

	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){ //Let It Start OK
			if(ajax.status == 200){
				result.innerHTML = ajax.responseText;
			} else{
				result.innerHTML = "Houve um erro na conexão AJAX: " + ajax.statusText;
			}
		}
	};

	ajax.send(null);
}


function insereDados(){
	var nome = document.getElementById("insereNome").value;
	var endereco = document.getElementById("insereEndereco").value;
	var telefone = document.getElementById("insereTelefone").value;
	var email = document.getElementById("insereEmail").value;

	var resposta = document.getElementById("resposta");

	var ajax = new XMLHttpRequest();

	resposta.innerHTML = '<img src="loading.gif" width="100px">';

	ajax.open("GET", "processa.php?nome="+nome+"&endereco="+endereco+"&telefone="+telefone+"&email="+email, true);

	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			if(ajax.status == 200){
				resposta.innerHTML = ajax.responseText;
			}
			else{
				resposta.innerHTML = "Houve um erro na conexão AJAX: " + ajax.statusText;
			}
		}
	};

	ajax.send(null);

}

function deletaUsuario(id){
	var result = document.getElementById("dados");

	var ajax = new XMLHttpRequest();

	result.innerHTML = '<img src="loading.gif" width="100px">';

	ajax.open("GET", "processa.php?deleta="+id, true);

	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			if(ajax.status == 200){
				result.innerHTML = ajax.responseText;
			}
			else{
				result.innerHTML = "Houve um erro na conexão AJAX: " + ajax.statusText;
			}
		}
	};

	ajax.send(null);
}