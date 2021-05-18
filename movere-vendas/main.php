<!--Codigo-php-primeiro-depois-html-->
<!---------------------------------------------------------------PHP------------------------------------------------------------------------------>
<?php

    //Conectando banco de dados e setando tempo
    date_default_timezone_set('America/Cuiaba');
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USUARIO, SENHA);



    //logout
    if(isset($_GET['loggout'])){
        Painel::logout();
    }

    

    if(isset($_POST['acao'])){ //inserir no banco de dados

        $nome = $_POST['nome'];
        $CPF = $_POST['cpf'];
        $valor = $_POST['valor']; 
        $data = date('Y-m-d H:i:s');

        $sql = $pdo->prepare("INSERT INTO `vendas` VALUES (null,?,?,?,?)"); //inserirndo na tabela vendas

        $sql->execute(array($nome, $CPF, $valor, $data));
    }

    $vendas = $pdo->prepare("SELECT * FROM vendas"); //pegando dados da tabela vendas
    $vendas->execute();

    $dados = $vendas->fetchAll(); 


    $maiorValorIndice = 0;
    $numeroDeVendas = 0;
    $somaDeVendas = 0;
    $mediaDasVendas = 0;
    $variacaoDeTempo = 0;
    $frequenciaDeVendas = 0;
    
                                
                                    
    for($i = 0; $i < count($dados); $i++){ //soma das vendas e numero das vendas

        $somaDeVendas += $dados[$i]['Valor'];
        $numeroDeVendas++;        

    }

    if($numeroDeVendas > 0){
        $mediaDasVendas = $somaDeVendas/$numeroDeVendas;

        for($i = 0; $i < count($dados); $i++){  //pegar o indice da venda com maior valor

            if($dados[$i]['Valor'] >= $dados[$maiorValorIndice]['Valor'])
                $maiorValorIndice = $i;
        
        }

        $variacaoDeTempo = strtotime($dados[$i-1]['Data']) - strtotime($dados[0]['Data']); //para frequencia de vendas por hora
        $variacaoDeTempo = $variacaoDeTempo/(3600*24); //convertendo para dia
        $frequenciaDeVendas = $numeroDeVendas/$variacaoDeTempo;
    }    
                 
?>


<!-------------------------------------------------------------HTML------------------------------------------------------------------------->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Luis Octavio Galesso Seror">
        <title>Movere Vendas</title>
        <!-- Bootstrap nucleo CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" href="icons/movereIcon.png">
    </head>
    <body> 
        <header class="navbar navbar-dark sticky-top bg-danger flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-12 col-lg-2 me-0 px-3" href="#" style="color: black; font-size: 20px;">Movere</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout" style="color: black;">logout</a>
                </li>
            </ul>  
        </header>
        <div class="container-fluid">
            <div class="container table-responsive tableGeral" style="padding-top: 4%;">
                <h2 id="painelgeral">Painel geral</h2>
                <style>
                                
                    body{
                        background-image: url("https://www.transparenttextures.com/patterns/axiom-pattern.png");
                    }
                        
                    @media(min-width: 767.98px){
                        #painelgeral{
                            padding-left: 42%; padding-bottom: 2%;
                        }
                    }
                    @media(max-width: 767.98px){
                        #painelgeral{
                            padding-left: 30%; padding-bottom: 2%;
                            font-size: 26px;
                        }

                        .tableGeral th{
                            font-size: 10px;
                        }
                        
                    }        
                </style>
                <table class="table table-striped table-sm">
                    <tbody>
                        <tr>
                            <th>Soma das vendas</th>
                            <th>Numero de vendas</th>
                            <th>Média das vendas</th>
                            <th>Frequencia média de vendas</th>
                        </tr>
                        <tr>
                            <?php  //---------------php-----maior-venda----------//
                                echo "<td>R$ ".$somaDeVendas."</td>";
                                echo "<td>".$numeroDeVendas."</td>";
                                echo "<td>R$ ".$mediaDasVendas."</td>";
                                echo "<td>".number_format((float)$frequenciaDeVendas, 1, '.', '')." vendas por dia!</td>";
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <form class="form-signin" id="formulario" method="post">
                    <h1 class="h3 mb-3 col-12 col-md-12 font-weight-normal">Registrar venda</h1>
                    <input type="text" id="input" name="nome" class="form-control" placeholder="Nome do cliente" required autofocus>
                    <input type="text" id="input" name="cpf"class="form-control" placeholder="CPF" required>
                    <input type="text" id="input" name="valor"class="form-control" placeholder="Valor" required>
                    <button class="btn btn-danger btn-primary btn-block" name="acao" type="submit">Registrar</button>
                </form>
                
                      
                <!--PHP-inserir-no-banco-de-dados----->
                <?php
                    if(isset($_POST['acao'])){
                        echo "<h5 class='col-12' id='sucesso' style='margin-top:-5%; color: green;'>Venda para ".$nome.' inserida com sucesso!</h5> 
                        <style>
                            @media(min-width: 767.98px){
                                #sucesso{
                                    padding-left: 38%;
                                }
                            }    
                        </style>'; //gambiarra nervosa
                    }
                ?>            
                
                <!------------------------------------------>
                <div class="container">
                    <h2 id="lista_de_vendas_h2">Lista de vendas</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>CPF</th>
                                    <th>Venda</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--PHP-gerar-tabela-grafica-das-vendas----->
                                <?php

                                    foreach($dados as $key => $value){

                                        echo "<tr>";
                                        echo "<td>".$value['ID']."</td>";
                                        echo "<td>".$value['Nome_completo']."</td>";
                                        echo "<td>".$value['CPF']."</td>";
                                        echo "<td>R$ ".$value['Valor']."</td>";
                                        echo "<td>".$value['Data']."</td>";
                                        echo "</tr>";

                                        }

                                ?>
                                <!--------------------------------------------->

                                <!--Abaixo-alguns-dados-de-exemplo-só-para-nunca-estar-vazia-->

                                <tr>
                                    <td>100001</td>
                                    <td>nome</td>
                                    <td>cpf</td>
                                    <td>valor</td>
                                    <td>data</td>
                                </tr>
                                <tr>
                                    <td>100002</td>
                                    <td>nome2</td>
                                    <td>cpf2</td>
                                    <td>valor2</td>
                                    <td>data2</td>
                                </tr>
                                <tr>
                                    <td>100003</td>
                                    <td>nome3</td>
                                    <td>cpf3</td>
                                    <td>valor3</td>
                                    <td>data3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
        <div class="container" id="maior_venda">
            <h1 class="h3 mb-3 col-12 font-weight-normal">Maior venda</h1>
            <button class="btn btn-danger btn-primary btn-block" name="" id="submit" data-filter="" type="">Mostrar</button>
        </div>
        <div class="container" id="maiorvenda" style="margin-bottom: 5%; margin-top: 3%;">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>CPF</th>
                            <th>Venda</th>
                            <th>Data</th>
                        </tr>
                        <tr>
                            <?php  //---------------php-----maior-venda----------//
                                if($numeroDeVendas > 0){
                                    echo "<td>".$dados[$maiorValorIndice]['ID']."</td>";
                                    echo "<td>".$dados[$maiorValorIndice]['Nome_completo']."</td>";
                                    echo "<td>".$dados[$maiorValorIndice]['CPF']."</td>";
                                    echo "<td>R$ ".$dados[$maiorValorIndice]['Valor']."</td>";
                                    echo "<td>".$dados[$maiorValorIndice]['Data']."</td>";
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
         <!--footer-->
         <footer>
            <div class="container-fluid" id="footer">
                <div class="row" style="justify-content: center; background-color: rgb(220, 53, 69);">
                    <div class="col-md-12" style="margin-top: 1%;">
                        <h4>Movere</h4>
                    </div>
                </div>
                <div class="row" style="background-color: rgb(220, 53, 69);">
                    <div class="col-md-12 col-12 social-icon" style="padding-left: 15%; padding-top: 2%;">  
                        <p>
                            <a href="https://www.facebook.com/moveresoftware/"><img src='icons/Facebook.jpg'/></a>
                            <a href="https://www.linkedin.com/company/movere-software"><img src='icons/linkedin.jpg' /></a>
                            <a href="https://www.instagram.com/moveresoftware/"><img src='icons/insta.jpg' /></a>
                            <a href="https://api.whatsapp.com/send?phone=5519994666771&text=Gostaria%20de%20saber%20mais%20informa%C3%A7%C3%B5es%20sobre%20o%20Movere%20Software"><img src='icons/whatsapp.jpg' /></a>
                        </p>
                    </div>    
                </div>
                <div class="row" style="justify-content: center; text-align: center; background-color: rgb(220, 53, 69);">
                    <div class="col-md-12">
                        <h5>Aberto de segunda a sexta das 8:00 às 18:00 e sábado das 8:00 às 12:00</h5>
                        <p></p>
                        <h5>Rua Presidente José Linhares, Quadra 11, Lote 08/09 Sala A - Quilombo, Cuiabá - MT, 78043-538</h5>
                    </div>
                </div>
                <div class="row footer2" style="justify-content: center; background-color: rgb(80, 85, 80);">
                    &copy; Desenvolvido por Movere Copyright 2021
                </div>
            </div>
        </footer>
        <style>
            @media(min-width: 767.98px){
                footer h4{
                    font-size: 32px;
                    padding-left: 45%;
                }
                footer .social-icon{
                   margin-left: 7%;
                }  
            }
            @media(max-width: 767.98px){
                footer h5{
                    font-size: 15px;
                }
                footer h4{
                    font-size: 22px;
                    padding-left: 40%;
                }
                footer .social-icon a img{
                    height: 40px;
                    width: 40px;
                }                  
                footer .social-icon{
                   margin-left: -4%;
                }  
            }        
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        <script type="text/javascript"> // javascript para o efeito de desaparecer e reaparecer lentamente o maior valor
            $('#submit').on('click', function() {
                if ($('#maiorvenda').css('opacity') == 0) {
                    $('#maiorvenda').css('opacity', 1);
                }
                else {
                    $('#maiorvenda').css('opacity', 0);
                }
            });
      </script>
    </body>
</html>