function confirmarExclusao(cpf) {
	if (confirm("Tem certeza que deseja excluir este Médico?")) {
		window.location.href = "../medico/apagar.php?cpf=" + cpf;
	}
}

function confirmarExclusaoUsu(cpf) {
	if (confirm("Tem certeza que deseja excluir este Usuário?")) {
		window.location.href = "../usuario/apagar.php?cpf=" + cpf;
	}
}