<?php
	/*
	*********************************
	* Controlador index.php         *
	*********************************
	*/

    // configuracion
    require("../includes/config.php"); 

    $filas = query("SELECT simbolo, shares FROM portfolios WHERE id = ?", $_SESSION["id"]);
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    $posiciones = [];
	foreach ($filas as $fila)
	{
		$stock = lookup($fila["simbolo"]);
		if ($stock !== false)
		{
			$posiciones[] = [
			"nombre" => $stock["name"],
			"precio" => $stock["price"],
			"shares" => $fila["shares"],
			"simbolo" => $fila["simbolo"],
			"total" => $stock["price"] * $fila["shares"]			
			];
		}
	}
    
    // render portfolio
    render("portfolio.php", ["cash" => $cash[0]["cash"], "posiciones" => $posiciones, "nombreUsuario" => $_SESSION["nombreUsuario"], "title" => "Portfolio"]);

?>
