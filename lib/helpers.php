<?php

    function redirect($url)
    {
        echo "<script type='text/javascript'>"
            ."window.location.href='$url'"
            ."</script>";
    }
    //Imprime la información que yo le diga
    function dd($var)
    {
        echo "<pre>";
        die(print_r($var));
    }

    function getURL($modulo, $controlador, $funcion, $parametros=false, $pagina=false)
    {

        if ($pagina==false) {
            $pagina="index";
        }

        $url="admin.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

        if ($parametros!=false) {
            foreach ($parametros as $key => $valor) {
                $url= $url."&$key=$valor";
            }
        }

        return $url;
    }

    function resolve()
    {
        //modulo: Carpeta dentro del controlador.
        //controlador: Archivo dentro de la carpeta controlador.
        //funcion: Metodo o funcion que esta dentro del archivo controlador.

        $modulo=ucwords($_GET['modulo']);
        $controlador=ucwords($_GET['controlador']);
        $funcion=$_GET['funcion'];

        if (is_dir("../controller/$modulo")) {

            if (file_exists("../controller/$modulo/" . $controlador . "Controller.php")) {

                include_once "../controller/$modulo/" . $controlador . "Controller.php";
                $nombreClase=$controlador."Controller";
                $objClase=new $nombreClase();

                if (method_exists($objClase, $funcion)) {
                    $objClase->$funcion();
                } else {
                    echo "Oops, the specified method doesn't exist";
                }

            } else {
                echo "Oops, the specified driver doesn't exist";
            }

        } else {
            echo "Oops, the specified module does not exist";
        }
    }
?>