 // Quando carregado a página
 $(function ($) {

   // Quando enviado o formulário
   $('#add-livro').on('submit', function () {

      var formulario = $(this);
      var mensagem = $('#mensagem-livro-cadastro');


       $(this).ajaxSubmit({
           
           // Definindo tipo de retorno do servidor
           dataType: 'json',

           // Se a requisição foi um sucesso
           success: function (retorno) {

               // Se cadastrado com sucesso
               if (retorno.sucesso) {
                   // Definindo estilo da mensagem (sucesso)
                   mensagem.attr('class', 'alert alert-success');

                   // Limpando formulário
                   formulario.resetForm();
               }
               else {
                   // Definindo estilo da mensagem (erro)
                   mensagem.attr('class', 'alert alert-danger');
               }

               // Exibindo mensagem
               mensagem.html(retorno.mensagem);

           },

           // Se houver algum erro na requisição
           error: function () {

               // Definindo estilo da mensagem (erro)
               mensagem.attr('class', 'alert alert-danger');

               // Exibindo mensagem
               mensagem.html('Oops, ocorreu um erro');
              
           }

       });

       // Retorna FALSE para que o formulário não seja enviado de forma convencional
       return false;

   });

});

$(function ($) {

   // Quando enviado o formulário
   $('#add-cliente').on('submit', function () {

      var formulario = $(this);
      var mensagem = $('#mensagem-cliente-cadastro');


       $(this).ajaxSubmit({
           
           // Definindo tipo de retorno do servidor
           dataType: 'json',

           // Se a requisição foi um sucesso
           success: function (retorno) {

               // Se cadastrado com sucesso
               if (retorno.sucesso) {
                   // Definindo estilo da mensagem (sucesso)
                   mensagem.attr('class', 'alert alert-success');

                   // Limpando formulário
                   formulario.resetForm();
               }
               else {
                   // Definindo estilo da mensagem (erro)
                   mensagem.attr('class', 'alert alert-danger');
               }

               // Exibindo mensagem
               mensagem.html(retorno.mensagem);

           },

           // Se houver algum erro na requisição
           error: function () {

               // Definindo estilo da mensagem (erro)
               mensagem.attr('class', 'alert alert-danger');

               // Exibindo mensagem
               mensagem.html('Oops, ocorreu um erro');
              
           }
       });
       // Retorna FALSE para que o formulário não seja enviado de forma convencional
       return false;
   });
});

function mascara(telefone){ 
   if(telefone.value.length == 0)
       telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(telefone.value.length == 3)
       telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.

   if(telefone.value.length == 10)
       telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.

}

function pontuacaoCPF(cpf){ 
   if(cpf.value.length == 3)
       cpf.value = cpf.value + '.'; //quando começamos a digitar, o script irá inserir um ponto depois dos 3 primeiros digitos.
   if(cpf.value.length == 7)
       cpf.value = cpf.value + '.'; //quando o campo já tiver 6 caracteres o script irá inserir mais um ponto, fechando assim o código de área.

   if(cpf.value.length == 11)
       cpf.value = cpf.value + '-'; //quando o campo já tiver 9 digitos, o script irá inserir um tracinho

}