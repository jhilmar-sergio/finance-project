<?php 

require("../includes/config.php");
// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
// else render form
render("consulta_form.php", ["nombreUsuario" => $_SESSION["nombreUsuario"], "title" => "Consultar"]);
}
// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
/* Verificar nombre se usuario y contraseña correcta */
	if (empty($_POST["consulta"])) {
		apologize("Debes ingresar un simbolo!");
	} 
	else {
		// insertar un nuevo usuario a la base de datos
		$stock = lookup($_POST["consulta"]);
		// verificar correcto ingreso del simbolo.
		if ($stock === false) {
			apologize("¡El stock no existe!");
		}
        render("consulta_resultado.php",["nombreUsuario" => $_SESSION["nombreUsuario"], "title" => "Stocks", "simbolo" => $stock["symbol"], "nombre" => $stock["name"], "precio" => $stock["price"]]);
		/*[
            "symbol" => $data[0],
            "name" => $data[1],
            "price" => floatval($data[2])
        ]*/

	}
}
 ?>