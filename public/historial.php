<?php
	/*
	*********************************
	* Controlador historial.php         *
	*********************************
	*/

    // configuracion
    require("../includes/config.php"); 

    $filas = query("SELECT * FROM historial WHERE id = ?", $_SESSION["id"]);
    //echo "<pre>", print_r($filas) ,"</pre>";
    // render portfolio
    render("historial_table.php", ["filas" => $filas, "nombreUsuario" => $_SESSION["nombreUsuario"], "title" => "Portfolio"]);

?>
