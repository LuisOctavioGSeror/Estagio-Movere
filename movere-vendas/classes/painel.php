<?php

    class Painel{

        public static Function logado(){
            return isset($_SESSION['login']) ? true : false;  //verificação inline
        }

        public static function logout(){ //destruir seção ao fazer logout e redirecionar para INCLUDE_PATH_PAINEL que sera pagina de login agora
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL);
        }
    }


?>