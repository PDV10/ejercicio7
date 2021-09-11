<?php
    require_once('secciones.php');

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if(!empty($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }else{
        $action = 'home';
    }

    $params = explode('/', $action);

    switch ($params[0]) {
        case 'home':
            home();
            break;
        case 'lista':
            listar();
            break;
        case 'filtro':
            filtrar();
            break;
        case 'VerFigura':
            verFigura();
            break;
    }