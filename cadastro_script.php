<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Sistema de Cadastro</title>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <?php
                include "conexao.php";
                
                $nome = $_POST ['nome'];
                $endereco = $_POST ['endereco'];
                $telefone = $_POST ['telefone'];
                $email = $_POST ['email'];
                $data_nascimento = $_POST ['data_nascimento'];

                $sql = "INSERT INTO `cadastro_pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";  

                if (mysqli_query($conn, $sql)){
                  mensagem("$nome cadastro com sucesso!", 'success');
                } else {
                  mensagem("Não cadastrado", 'darger');
                  }
                                
              ?>
              
          </div>
          <hr>
              <a href="index.php" class="btn btn-primary">Voltar</a>
      </div>
      
    
    
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
  </body>
</html>