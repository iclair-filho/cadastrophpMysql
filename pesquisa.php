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
        <?php

        $pesquisa = $_POST['busca'] ?? '';

        include "conexao.php";
        
        $sql = "SELECT * FROM cadastro_pessoas WHERE nome LIKE '%$pesquisa%'";
        $dados = mysqli_query($conn, $sql);
            
        
        ?>

      <div class="container">
          <div class="row">
              <div class="col">
              <!---<h1>Pesquisar Usuário</h1>-->
             
              
              
              <nav class="navbar navbar-light bg-light">
                <form class="form-inline" action="pesquisa.php" method="POST">
                    
                    <input class="form-control mr-sm-2" type="search" placeholder="Nome" name="busca" autofocus>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $cod_pessoa = $linha['cod_pessoa']; 
                            $nome = $linha['nome']; 
                            $endereco = $linha['endereco']; 
                            $telefone = $linha['telefone']; 
                            $email = $linha['email']; 
                            $data_nascimento = $linha['data_nascimento'];
                            $data_nascimento = formato_data($data_nascimento);
                          
                          echo "<tr>
                            <th scope='row'>$nome</th>
                            <td>$endereco</td>
                            <td>$telefone</td>
                            <td>$email</td>
                            <td>$data_nascimento</td>
                            <td>
                                <a href='cadastro_editar.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
                                <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma'
                                onclick=" .'"' ."pegar_dados($cod_pessoa, '$nome')" .'"' .">Excluir</a>                 
                                 
                            </td>
                            </tr>";
                    }
                    
                    ?>
                    <!--  onclick="pegar_dados($id, '$nome')" O SEGREDO ESTÁ AQUI... CONCATENAÇÃO -->

                    </tbody>
                    </table>
                <hr>
                <a href="cadastro.php" class="btn btn-success">Cadastrar</a>     
                <a href="index.php" class="btn btn-info">Volta para o Início</a> 
              </div>
          </div>
      </div>
      
      
      <!-- Modal excluir -->
        <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="excluir_script.php" method="POST">
                <div class="modal-body">
                 <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <input type="hidden" name="id" id="cod_pessoa"value="">  <!--type="text" para mostrar o cod_pessoa-->
                    <input type="hidden" name="nome" id="nome_pessoa_1"value="">  <!--type="text" para mostrar o cod_pessoa-->
                    <input type="submit" class="btn btn-danger" value="Sim">
                    
                </div>
                </form>
            </div>
            
        </div>
        </div>
    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('cod_pessoa').value = id;
            document.getElementById('nome_pessoa_1').value = nome;
        }

    </script>

    
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
  </body>
</html>