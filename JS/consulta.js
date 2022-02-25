function consulta(){
$.ajax({url:"consulta.php"}).then(function(){
        fetch('http://localhost/prot%C3%B3tipo/data.json').then(function(resultado){ //requisição do data.json
        return resultado.json();
    }).then(function(json){
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
        
    }).catch(function(error){
        console.log("deu erro "+error);
    })
})
    
};
