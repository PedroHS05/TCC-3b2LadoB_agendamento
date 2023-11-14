//Acessa o campo de data da tela de agendamento
const d = document.getElementById('data');
//Cria um monitor pra o evento change, que ocorre toda vez que mudamos o valor do campo
d.addEventListener("change", function(){
    //Cria um cookie com a data escolhida
    document.cookie="data="+d.value;  
    //Atualiza a página
    window.location.reload(true);
});

