<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Sistema de gerenciamento</title>
</head>
<body>
    <div class="contente">
        <div class="header">
            <spam>
                Gerenciador de livros
            </spam>
        </div>
        <div class="informacao capa"></div>
        <div class="menu-lateral">
            <div class="login">
                <form action="login.php" method="post">
                <label for="admin">Administrador:</label>
                <input type="text" name="admin" id="admin"><br>
                <label for="senha">senha:</label>
                <div class="input-senha">
                    <input type="password" name="senha-admin" id="senha-admin" autocomplete="off">
                    <input type="checkbox" name="mostar" id="olho" onchange="verSenha()">
                </div>
               
                <input type="submit" value="entrar">
            </form>
            </div>
            
        </div>
    </div>
<script src="JS/script.js"></script>
</body>
</html>