<?php

include 'Controller/EmpresaController.php';

 $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);//pega a url que o usuario esta acessando

 //switch pra navegar 
 switch($url)
 {
    case '/':
        echo "Página inicial";//Controller responsavel pelas requisizoes do usuario
    break;

    case '/empresa':
        echo "oi";
        EmpresaController::index();//O '::' é usado para chamar metodo statico
    break;

    case '/empresa/form':
        EmpresaController::form();//O '::' é usado para chamar metodo statico
    break;

    default:
        echo "erro 404";
    break;
 }
