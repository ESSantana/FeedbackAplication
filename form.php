<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Javascript -->
    <script src="https://kit.fontawesome.com/684301185d.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/index.js"></script>

    <title>Feedback</title>
</head>

<body>
    <div class="content">
        <div>
            <nav class="navbar navbar-font">
                <a class="navbar-brand" href="index.php">Inicio</a>
                <a class="navbar-brand mr-auto" href="#">Feedback</a>
            </nav>
        </div>
        <div class="container">
            <h1>Portal de Feedbacks</h1>
            <form class="mt-5" method="POST" action="enviar.php">
                <div class="form-group">
                    <label for="opcoes">Motivo da mensagem:</label>
                    <select name="seletor" id="opcoes" class="form-control">
                        <option value="" selected>Selecione a categoria</option>
                        <option value="Seletor 1">Seletor 1</option>
                        <option value="Seletor 2">Seletor 2</option>
                        <option value="Seletor 3">Seletor 3</option>
                        <option value="Seletor 4">Seletor 4</option>
                        <option value="Seletor 5">Seletor 5</option>
                        <option value="Seletor 6">Seletor 6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mensagem">Mensagem:</label>
                    <textarea name="mensagem" id="mensagem" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <input hidden="true" id="sender" name="sender" value="" />
                <button type="submit" class="btn btn-outline-primary">Enviar <i class="far fa-paper-plane"></i></button>

            </form>
        </div>
    </div>

    <div class="card-footer">
        <p>Desenvolvido por <a href="http://github.com/ESSantana/" target="_blank">Emerson Santana</a> - Todos os direitos reservados ao desenvolvedor &copy;.</p>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>