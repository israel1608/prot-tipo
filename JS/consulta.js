function consulta(){

var mensagem = $('#msg-busca');
var form = $('#formBusca');

form.resetForm();

$.ajax({
    type: "POST",
    url:"consulta/consulta.php",
    success: function(dados){
        var json = JSON.parse(dados);

        $('#Head').empty()
        $('#Corpo').empty()
        
        $('#Head').append('<th scope="col">Id</th>')
        $('#Head').append('<th scope="col">Título</th>')
        $('#Head').append('<th scope="col">Autor</th>')
        $('#Head').append('<th scope="col">Ano</th>')
        $('#Head').append('<th scope="col">Situação</th>')

        for(var k in json){


            $('#Corpo').append(`<tr id="linha${k}"></tr>`)
        
            $(`#linha${k}`).append(`<th scope="row">${json[k].id}</th>`)
            $(`#linha${k}`).append(`<td>${json[k].titulo}</td>`)
            $(`#linha${k}`).append(`<td>${json[k].autor}</td>`)
            $(`#linha${k}`).append(`<td>${json[k].ano}</td>`)
            $(`#linha${k}`).append(`<td>${json[k].situacao}</td>`)
        }
        
    },
    error: function () {

        // Definindo estilo da mensagem (erro)
        mensagem.attr('class', 'alert alert-danger');

        // Exibindo mensagem
        mensagem.html('Oops, ocorreu um erro');
    
    }
})

};
