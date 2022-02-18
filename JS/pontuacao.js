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