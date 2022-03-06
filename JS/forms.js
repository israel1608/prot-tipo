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
                   
                   // Lipando a mensagem de sucesso
                   setTimeout(
                     function() 
                     {
                        mensagem.removeClass('alert alert-success');
                        mensagem.empty();
                     }, 5000);
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

                   // Lipando a mensagem de sucesso
                   setTimeout(
                     function() 
                     {
                        mensagem.removeClass('alert alert-success');
                        mensagem.empty();
                     }, 5000);
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
   $('#remover-livro').on('submit', function () {

      var formulario = $(this);
      var mensagem = $('#msg-exclusao-livro');


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

                   // Lipando a mensagem de sucesso
                   setTimeout(
                     function() 
                     {
                        mensagem.removeClass('alert alert-success');
                        mensagem.empty();
                     }, 5000);
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
   $('#remover-cliente').on('submit', function () {

      var formulario = $(this);
      var mensagem = $('#msg-exclusao-cliente');


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

                   // Lipando a mensagem de sucesso
                   setTimeout(
                     function() 
                     {
                        mensagem.removeClass('alert alert-success');
                        mensagem.empty();
                     }, 5000);
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
    $('#emprestimo').on('submit', function () {
 
       var formulario = $(this);
       var mensagem = $('#msg-emprestimo');
 
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
 
                    // Lipando a mensagem de sucesso
                    setTimeout(
                      function() 
                      {
                         mensagem.removeClass('alert alert-success');
                         mensagem.empty();
                      }, 5000);
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

 /*
 $(function ($) {

    // Quando enviado o formulário
    $('#formBusca').on('submit', function () {
 
       var formulario = $(this);
       var mensagem = $('#msg-busca');
 
        $(this).ajaxSubmit({
            
            // Definindo tipo de retorno do servidor
            dataType: 'json',
 
            // Se a requisição foi um sucesso
            success: function (retorno) {

                // Se cadastrado com sucesso
                if (retorno.sucesso) {
                    // Definindo estilo da mensagem (sucesso)
                    

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
 */
