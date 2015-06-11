<?php
define('RUTA_BASE',dirname(__FILE__).'../');

function logError($text="", $archivo="", $linea="") {
    $fh = date("Y-m-d H:i:s (T)");
    $text = $fh . '      ' . $text . ' ' . $archivo . ' ' . $linea . chr(10);
    $file = fopen(RUTA_BASE . 'logs/log.txt', 'a+');
    fwrite($file, $text);
}

function manejadorErrores($numerr, $menserr, $nombrearchivo, $numlinea, $vars) {

    $tipoerror = array(
        E_ERROR => 'Error',
        E_WARNING => 'Warning',
        E_PARSE => 'Parsing Error',
        E_NOTICE => 'Notice',
        E_CORE_ERROR => 'Core Error',
        E_CORE_WARNING => 'Core Warning',
        E_COMPILE_ERROR => 'Compile Error',
        E_COMPILE_WARNING => 'Compile Warning',
        E_USER_ERROR => 'User Error',
        E_USER_WARNING => 'User Warning',
        E_USER_NOTICE => 'User Notice',
        E_STRICT => 'Runtime Notice',
        E_RECOVERABLE_ERROR => 'Catchable Fatal Error'
    );
    $errores_usuario = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
    if (in_array($numerr, $errores_usuario)) {
        header('HTTP/1.0 500 Internal Server Error');
        echo $menserr;
    }
    logError($menserr, $nombrearchivo, $numlinea);
    echo $menserr . '--' . $nombrearchivo . '---' . $numlinea;
}
set_error_handler('manejadorErrores');
?>