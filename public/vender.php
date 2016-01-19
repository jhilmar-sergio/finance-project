<?php 

require("../includes/config.php");
// if user reached page via GET (as by clicking a link or via redirect)

if ($_SERVER["REQUEST_METHOD"] == "GET")
{	
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
    if (count($posiciones) > 0) {
		// render portfolio
    	render("vender_table.php", ["cash" => $cash[0]["cash"], "posiciones" => $posiciones, "nombreUsuario" => $_SESSION["nombreUsuario"], "title" => "Vender"]);
	} 
	else {
		apologize("¡Debes comprar para vender!");
	}

    
}
// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{

/* Verificar nombre se usuario y contraseña correcta */
	if (empty($_POST["simbolo"])) {
		apologize("¡Debes marcar un boton!");
	} 
	else {
		// 
		$shares = query("SELECT shares FROM portfolios WHERE id = ? AND simbolo = ?", $_SESSION["id"], $_POST["simbolo"]);
		$precio = lookup($_POST["simbolo"]);
		$cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
		$borrado = query("DELETE FROM portfolios WHERE id = ? AND simbolo = ?", $_SESSION["id"], $_POST["simbolo"]);
		$actualizado = query("UPDATE users SET cash = cash + ? WHERE id = ?", $precio["price"] * $shares[0]["shares"], $_SESSION["id"]);
		// actualizar historial
		query("INSERT INTO historial (id, transaccion, simbolo, shares, precio) VALUES (?, ? ,?, ?, ?)", 
			$_SESSION["id"], "VENTA", $_POST["simbolo"], $shares[0]["shares"], $precio["price"]);
		
		redirect("/");
	}
}
 ?>