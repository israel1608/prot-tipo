function buscar(){

$('#Head').empty()
$('#Corpo').empty()

$.ajax({url:"consulta/busca.php"}).then(function(){
    fetch('http://localhost/prot%C3%B3tipo/consulta/busca.json').then(function(resultado){ //requisição do busca.json 
    return resultado.json();

}).then(function(json){
    
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
        
    }).catch(function(error){

        console.log("deu erro "+error);
        
    })
    
})

}
