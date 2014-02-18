<?php
//ESTO ES UN COMENTARIO
spl_autoload_register(
    function( $classname )
    {
        if ( false !== strpos( $classname, 'development\\'))
        {
            include_once __DIR__ . '/../src/Money.php';
        }
    }
);