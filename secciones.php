<?php
require_once 'lib/Figuras.php';
require_once 'lib/AreaFilter.php';
require_once('esqueleto/header.php');
require_once('esqueleto/footer.php');

function home(){
    ShowHeader();
   
    echo'
    <h1>Figuras</h1>

    <a href="lista">Ver todas las figuras geométricas</a>


    <h4> <h4>
    <form action="filtro" method="GET">
        <label for="area">Buscar figuras con área menor a: </label>
        <input id="area" type="number" name="area" placeholder="Introduzca área...">
        <button type="submit">Buscar</button>
    </form>';

    showFooter();
 } 

function filtrar(){
    ShowHeader();
     // instancio la clase Figuras para trabajar con las figuras del sistema
    $figuras = new Figuras();

    $area = $_GET['area'];

    echo "Las figuras con area menor a $area son:<ul>";
    foreach($figuras->getBy(new AreaFilter($area)) as $figura) {
        echo "<li>" . 
                $figura->ToString() . 
                " | <a href='VerFigura/". $figura->getId() . "'>VER </a>" .
            "</li>";
    }
    echo "
        </ul>
        <a href='./'>Volver</a>";
       
        showFooter();
}


 
function listar(){
    ShowHeader();
    // instancia la clase Figuras para acceder a las figuras
   $figuras = new Figuras();

   echo 
   "<h1>Listado de figuras</h1>
       <ul>";

   foreach($figuras->getAll() as $figura) {
       echo "<li>" . 
               $figura->ToString() . 
               " | <a href='VerFigura/" . $figura->getId() . "'>VER </a>" .
            "</li>";
           
   }

   echo "
       </ul>
       <a href='./'>Volver</a>";
       showFooter();

}

function verFigura(){
    ShowHeader();
    // instancia la clase Figuras para acceder a las figuras
    $figuras = new Figuras();

    // obtiene la figura según el ID pasado como parámetro
    $action = $_REQUEST['action'];
    $params = explode('/', $action);
    $id = $params[1];
    $figura = $figuras->get($id);

    // imprime el detalle de la figura
    echo 
        "<ul>
            <li><strong>ID: </strong>" . $figura->getId() . "</li>
            <li><strong>Tipo: </strong>" . $figura->getName() . "</li>
            <li><strong>Perímetro: </strong>" . $figura->getPerimetro() . "</li>
            <li><strong>Área: </strong>" . $figura->getArea() . "</li>
        </ul>";
        showFooter();
}


