$(function(){

    $url = "http://localhost/Projeto_Restaurante/";

    function windowLoad(){

        /*solicitando uma requisição para o servidor, onde é retornado um arquivo JSON
        com as mesas de situação 'vazia' no banco de dados*/
        $.getJSON($url+"Verifica_Mesa.php")
            .done(function(data){
                
                //caso possua mesas vazias, o usuário é redirecionado para o cadastro de reserva
                if(data.length > 0){
                    $(location).attr('href',$url+"Form_Reserva.php");
                }
                //caso não possua mesas vazias, o usuário é redirecionado para o cadastro de lista de espera
                else{
                    alert("Não foi encontrada nenhuma mesa Vaga. Você sera redirecionado a tela de Lista de Espera!");
                    $(location).attr('href',$url+"Form_Lista_Espera.php");
                };
            })
            .fail(function(data){
                alert("OPS! Ocorreu um problema com o Servidor. Por favor tente novamente.");
            });
    }

    windowLoad();
});