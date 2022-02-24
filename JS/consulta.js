$(function(){ /*carrega os arquivos antigo loadTabela()*/ 
    fetch('http://localhost/prot%C3%B3tipo/data.json').then(function(resultado){ //requisição do data.json
        return resultado.json();
    }).then(function(json){

        for(var k in json){
            $('#consulta').append(`<tr id="linha${k}"></tr>`)
            /*Object.values(json[k]).forEach(function(item){ // puxa todos os valores de forma automatica
            $(`#linha${k}`).append(`<td>${item}</td>`)
            })*/
            $(`#linha${k}`).append(`<td class="corpo">${json[k].id}</td>`)
            $(`#linha${k}`).append(`<td class="corpo">${json[k].titulo}</td>`)
            $(`#linha${k}`).append(`<td class="corpo">${json[k].autor}</td>`)
            $(`#linha${k}`).append(`<td class="corpo">${json[k].ano}</td>`)
            $(`#linha${k}`).append(`<td class="corpo">${json[k].situacao}</td>`)
        } 
        //console.log(json);
    }).catch(function(error){
        console.log("deu erro "+error);
    })
});