<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Alterar Cadastro</title>
  </head>
  <body>

    <?php
    include "conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM cadastro_pessoas WHERE cod_pessoa = $id";
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
       
    
    
    ?>
      <div class="container">
          <div class="row">
              <div class="col">
              <h3>Editar de Usuário</h3>
              <hr>
              <form action="edit_script.php" method="POST">
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">
                </div>
                <div class="form-group">
                    <label for="endereço">Endereço</label>
                    <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco']; ?>">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>" >
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento']; ?>">
                </div>
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']; ?>">
                    <hr>
                    <a href="index.php" class="btn btn-info">Volta para o Início</a> 
                </form>
                
              </div>
          </div>
      </div>
    
    
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
  </body>
</html>