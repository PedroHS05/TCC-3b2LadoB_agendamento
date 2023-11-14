const olho = document.getElementById("olho");
const senha = document.getElementById("senha")
const ReptSenha = document.getElementById("ReptSenha")
const cpf = document.getElementById("cpf");

olho.addEventListener("mouseover", mostrar);
olho.addEventListener("mouseout", esconder);

function mostrar() {
	senha.type = "text";
	ReptSenha.type = "text";
}
function esconder() {
	senha.type = "password";
	ReptSenha.type = "password";
}

ReptSenha.addEventListener("change", function () {
	if (senha.value != ReptSenha.value) {
		alert("Senhas diferentes!");
		senha.value = "";
		ReptSenha.value = "";
		senha.focus();
	}
});



function validarCPF(cpf) {
	var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}


//Final da função para validar CPF

cpf.addEventListener("change", function () {
	if (validarCPF(this.value) == false) {
		this.value = "";
		alert("CPF Inválido");
		this.focus();
	}

});

function validarCRM() {
	var crmInput = document.getElementById("crm");
	var resultadoElement = document.getElementById("resultado");

	var crm = crmInput.value.replace(/[\s-]/g, '');

	// Verificar se o CRM tem 10 dígitos numéricos
	if (/^\d{10}$/.test(crm)) {
		resultadoElement.innerHTML = "CRM válido!";
	} else {
		resultadoElement.innerHTML = "CRM inválido. Certifique-se de que ele contenha 10 dígitos numéricos.";
	}
}


function formatarCPF(campo) {
	campo.value = campo.value.replace(/\D/g, ''); // Remove caracteres não numéricos
	if (campo.value.length > 0) {
		campo.value = campo.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4'); // Aplica a máscara
	}
}


