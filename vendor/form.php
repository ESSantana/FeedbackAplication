<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <script src="https://kit.fontawesome.com/684301185d.js"></script>

    <title>Feedback</title>
</head>

<body>
    <div class="content">
        <div>
            <nav class="navbar navbar-7lub">
                <a class="navbar-brand" href="index.php">Inicio</a>
                <a class="navbar-brand mr-auto" href="#">Feedback</a>
            </nav>
        </div>
        <div class="container">
            <h1>Portal de Feedbacks</h1>
            <form class="mt-5" method="POST" action="enviar.php">
                <div class="form-group">
                    <label for="options">Motivo da mensagem:</label>
                    <select name="acao" id="acao" class="form-control">
                        <option value="" selected>Selecione a categoria</option>
                        <option value="Inserir">Inserir</option>
                        <option value="Aprimorar">Aprimorar</option>
                        <option value="Elogiar">Elogiar</option>
                        <option value="Descontinuar">Descontinuar</option>
                        <option value="Dúvida">Dúvida</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mensagem">Mensagem:</label>
                    <textarea name="mensagem" id="mensagem" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <input hidden="true" name="ipzinho" value="<?php $ip = file_get_contents('https://api.ipify.org'); echo $ip;?>"/>
                <button type="submit" class="btn btn-outline-primary">Enviar <i class="far fa-paper-plane"></i></button>

            </form>
        </div>
    </div>

    <div class="card-footer">
        <p>Desenvolvido por <a href="http://github.com/ESSantana/" target="_blank">Emerson Santana</a> - Todos os direitos reservados ao desenvolvedor &copy;. <a href="http://www.7lub.net" target="_blank">7Lub Lubrificantes Ltda.</a></p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>