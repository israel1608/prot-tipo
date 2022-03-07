<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--ajax-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="http://malsup.github.io/min/jquery.form.min.js"></script>

    <script src="JS/forms.js"></script>
    <script src="JS/pontuacao.js"></script>
    <script src="JS/busca.js"></script>  

    <title>Sistema de gerenciamento</title>
</head>
<body>
    <div class="contente">
        <div class="header">
            <spam>
                Gerenciador de livros
            </spam>
        </div>
<div class="informacao">
    <div class="consulta-contente">
        <div class="pesquisa">
            <div id="recarregar" onclick="consulta()">
                <img src="img/recarregar.jpg" alt="#">
            </div>
            <div class="busca">

                <form action="consulta/busca.php" id="formBusca" method="post">
                    <input type="text" id="busca-consulta" name="busca-consulta" placeholder="Pesquise livro,autor...">
                    <input type="submit" value="Pesquisar">                    
                </form>
           
            </div>   
        </div>
        <div id="consulta-info">
           <!--   --><div id="msg-busca"></div>
            <table id="consulta" class="table table-striped">  
                <thead >
                    <tr id="Head">

                    </tr>
                </thead>
                <tbody id="Corpo">

                </tbody>    
            </table>
        </div>
    </div>

    <div class="emprestimo-contente ">
        <h2>formulario para empréstimo</h2>
        <form id="emprestimo" action="emprestimo.php" method="post">
            <input type="texte" name="cpf-cliente-emprestimo" id="cpf-cliente-emprestimo" placeholder="CPF cliente" onkeypress="pontuacaoCPF(this)" size="20" maxlength="14"
            pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}"><br>
            <input type="number" name="id-livro-emprestimo" id="id-livro-emprestimo" placeholder="ID do livro"><br>
            <input type="password" name="senha-cliente-emprestimo" id="senha-cliente-emprestimo" placeholder="senha de 6 dígitos" autocomplete="off" minlength="6" maxlength="6" pattern="([0-9]{6})"/><br>
            <input type="password" name="senha-adm-emprestimo" id="senha-adm-emprestimo" placeholder="senha de administrador" autocomplete="off"><br>
            <input type="submit" value="alugar">
            <div id="msg-emprestimo"></div>
        </form>
    </div>

    <div class="adicionar-contente">
        <h2>Cadastrar</h2>
        <input onclick="cadastrarCliente()" type="radio" name="tipo-cadastro">cliente
        <input onclick="cadastrarLivro()" type="radio" checked name="tipo-cadastro">livro <br>
        <form id="add-livro" action="Cadastro/addLivro.php" method="post">
            <input type="text" name="titulo-livro-cadastro" id="titulo-livro-cadastro" placeholder="título" required><br>
            <input type="text" name="autor-livro-cadastro" id="autor-livro-cadastro" placeholder="autor"required><br>
            <input type="text" name="editora-livro-cadastro" id="editora-livro-cadastro" placeholder="editora"required><br>
            <input type="text" name="ano-livro-cadastro"id="ano-livro-cadastro" placeholder="Ano" required maxlength="4" pattern="([0-9]{4})"/>
            <input type="number" name="qnt" id="qnt" placeholder="qnt" min="1" required><br>
            <input type="hidden" name="situacao-livro-cadastro" value="Disponível">
            <input type="submit" value="Adicionar" >
            <div id="mensagem-livro-cadastro"></div>
        </form>
        <form id="add-cliente"action="Cadastro/addCliente.php" method="post">
            <input type="text" name="nome-cliente-cadastro" id="nome-cliente-cadastro" placeholder="nome"><br>
            <input type="email" name="email-cliente-cadastro" id="email-cliente-cadastro" placeholder="email"><br>
            <input type="text" name="telefone-cliente-cadastro" id="telefone-cliente-cadastro" size="20" maxlength="15" onkeypress="mascara(this)" placeholder="Telefone"><br>
            <input type="text" name="cpf-cliente-cadastro" id="cpf-cliente-cadastro" placeholder="CPF" onkeypress="pontuacaoCPF(this)" size="20" maxlength="14"
            pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}"><br>
            <input type="password" name="senha-cliente-cadastro" id="senha-cliente-cadastro" placeholder="senha de 6 dígitos" autocomplete="off"minlength="6" maxlength="6" pattern="[0-9]{6}"/><br>
            <input type="hidden" name="situacao-cliente-cadastro"value="Normal">
            <input type="submit" value="Adicionar">
            <div id="mensagem-cliente-cadastro"></div>
        </form>
    </div>
    <div class="remover-contente">
        <h2>Remover</h2>
        <input onclick="removerCliente()" type="radio" name="tipo-remover">cliente
        <input onclick="removerLivro()" type="radio" checked name="tipo-remover">livro <br>
        <form id="remover-livro"action="Exclusao/excluirLivro.php" method="post">
            <input type="number" name="id-livro-remover" id="id-livro-remover" placeholder="ID do livro"><br>
            <input type="password" name="senha-adm-livro" id="senha-adm-livro" placeholder="senha de administrador" autocomplete="off"><br>
            <input type="submit" value="Remover">
            <div id="msg-exclusao-livro"></div>
        </form>
        <form id="remover-cliente"action="Exclusao/excluirCliente.php" method="post">
            <input type="text" name="id-cliente-remover" id="id-cliente-remover" placeholder="CPF do cliente" onkeypress="pontuacaoCPF(this)" size="20" maxlength="14"
            pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}"><br>
            <input type="password" name="senha-adm-cliente" id="senha-adm-cliente" placeholder="senha de administrador" autocomplete="off"><br>
            <input type="submit" value="Remover">
            <div id="msg-exclusao-cliente"></div>
        </form>
        <span>Esta ação não poderá ser desfeita</span>
    </div>      
    <div class="historico-contente">
        <div class="pesquisa">
            <div>
                <input type="text" id="Busca-historico" placeholder="cliente,ID,data...">
                <input type="submit" value="pesquisar">
            </div>   
        </div>
        <h2>Histórico de empréstimos</h2>
        <table id="historico">
            <tbody>
                <tr>
                    <th class="cabecalho">ID</th>
                    <th class="cabecalho">cliente</th>
                    <th class="cabecalho">livro</th>
                    <th class="cabecalho">saída</th>
                    <th class="cabecalho">devolução</th>
                    <th class="cabecalho">status</th>
                </tr>
                <tr>
                    <td class="corpo"><a href="#">894</a></td>
                    <td class="corpo"><a href="#">Larissa Costa</a></td>
                    <td class="corpo"><a href="#">76</a></td>
                    <td class="corpo">06/02/2022</td>
                    <td class="corpo">13/02/2022</td>
                    <td class="corpo">atrasado</td>
                    
                </tr>

                <tr>
                    <td class="corpo"><a href="#">435</a></td>
                    <td class="corpo"><a href="#">Larissa Costa</a></td>
                    <td class="corpo"><a href="#">34</a></td>
                    <td class="corpo">06/02/2022</td>
                    <td class="corpo">13/02/2022</td>
                    <td class="corpo">atrasado</td>       
                </tr>

                <tr>
                    <td class="corpo"><a href="#">434</a></td>
                    <td class="corpo"><a href="#">Larissa Costa</a></td>
                    <td class="corpo"><a href="#">4</a></td>
                    <td class="corpo">06/02/2022</td>
                    <td class="corpo">13/02/2022</td>
                    <td class="corpo">atrasado</td>                   
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
<div class="menu-lateral">
    <a onclick="mostrar(1)" id="menu1"href="#">Consulta</a>
    <a onclick="mostrar(2)" id="menu2" href="#">Empréstimo</a>
    <a onclick="mostrar(3)" id="menu3" href="#">Adicionar</a>
    <a onclick="mostrar(4)" id="menu4" href="#">Remover</a>
    <a onclick="mostrar(5)" id="menu5" href="#">Histórico</a>
    <a href="http://localhost/protótipo/index.php">sair</a>
</div>

<script src="JS/consulta.js"></script>
<script src="JS/script.js"></script>

</body>
</html>


    

