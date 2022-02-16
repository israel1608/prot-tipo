function limpar(){
    $('.consulta-contente').css("display","none");
    $('.emprestimo-contente').css("display","none");
    $('.adicionar-contente').css("display","none");
    $('.remover-contente').css("display","none");
    $('.historico-contente').css("display","none")
    $("#menu1").removeClass("ativo");
    $("#menu2").removeClass("ativo");
    $("#menu3").removeClass("ativo");
    $("#menu4").removeClass("ativo");
    $('#menu5').removeClass("ativo");
}

function mostrar(n){
    
    switch(n){
        case 1 : limpar();
        $('.consulta-contente').css("display","block");
        $("#menu1").addClass("ativo");
        break;
        case 2 : limpar();
        $('.emprestimo-contente').css("display","block");
        $("#menu2").addClass("ativo");
        break;
        case 3 : limpar();
        $('.adicionar-contente').css("display","block");
        $("#menu3").addClass("ativo");
        break;
        case 4 : limpar();
        $('.remover-contente').css("display","block");
        $("#menu4").addClass("ativo");
        break;
        case 5 : limpar();
        $('.historico-contente').css("display","block");
        $("#menu5").addClass("ativo")
    }
}
/*$(function(){
    mostrar(1)
})*/

function cadastrarCliente(){
    $("#add-livro").css("display","none");
    $("#add-cliente").css("display","block");
}

function cadastrarLivro(){
    $("#add-livro").css("display","block");
    $("#add-cliente").css("display","none");
}

function removerCliente(){
    $("#remover-livro").css("display","none");
    $("#remover-cliente").css("display","block");
}

function removerLivro(){
    $("#remover-livro").css("display","block");
    $("#remover-cliente").css("display","none");
}

var checkbox = document.getElementById("olho");
function verSenha(){
    if(checkbox.checked){
        $("#senha-admin").attr("type", "text");
        }
    else {
        $("#senha-admin").attr("type", "password");
        }
};

$(function() {
    $("#ano-livro-cadastro").keyup(function() {
        $("#ano-livro-cadastro").val(this.value.match(/[0-9]*/));
    });
  });