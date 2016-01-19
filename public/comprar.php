<?php 

require("../includes/config.php");
// if user reached page via GET (as by clicking a link or via redirect)

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	$cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    render("comprar_form.php", ["cash" => $cash[0]["cash"], "nombreUsuario" => $_SESSION["nombreUsuario"], "title" => "Comprar"]);
}
// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{

/* Verificar nombre se usuario y contraseña correcta */
	if (empty($_POST["simbolo"])) {
		apologize("¡Debes ingresar un simbolo!");
	} 
	else if (empty($_POST["cantidad"])) {
		apologize("¡Debes ingresar una cantidad!");
	}
	else {
		// insertar un nuevo usuario a la base de datos
		$stock = lookup($_POST["simbolo"]);

		if ($stock === false) {
			apologize("¡El simbolo es incorrecto!");
		}				
		else if (preg_match("/^\d+$/", $_POST["cantidad"])) {
			$filas = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);		
			// calcular el costo
			$costo = $stock["price"] * $_POST["cantidad"];
			// verificar cantidad de cash
			if ($costo > $filas[0]["cash"]) {
				apologize("¡No Tiene sufuciente cash!");
			}
			else {
				$_POST["simbolo"] = strtoupper($_POST["simbolo"]);
				query("INSERT INTO portfolios (id, simbolo, shares) VALUES (?, ? ,?)
					ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $_POST["simbolo"], $_POST["cantidad"]);
				query("UPDATE users SET cash = cash - ? WHERE id = ?", $stock["price"] * $_POST["cantidad"], $_SESSION["id"]);
				// Actualizar historial
				query("INSERT INTO historial (id, transaccion, simbolo, shares, precio) VALUES (?, ? ,?, ?, ?)", 
			$_SESSION["id"], "COMPRA", $_POST["simbolo"], $_POST['cantidad'], $stock["price"]);
			}
			
		}
		else {
			apologize("Debes ingresar una cantidad correcta");
		}

		redirect("/");
	}
}
 ?>