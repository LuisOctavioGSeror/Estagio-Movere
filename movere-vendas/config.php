<?php

    session_start();  //iniciar seção

    $autoload = function($class){  //função para carregar as classes automaticamente
        
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH', 'http://localhost/');  //definindo constantes 
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'movere-vendas/');

    //constantes usadas no banco de dados
    define('HOST','localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DATABASE','movere_vendas');

?>