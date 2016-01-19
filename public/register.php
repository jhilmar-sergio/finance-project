<?php
// configuration
require("../includes/config.php");
// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
// else render form
render("register_form.php", ["title" => "Register"]);
}
// else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
/* Verificar nombre se usuario y contraseña correcta */
	if (empty($_POST["username"])) {
		apologize("ingresar un nombre de usuario");
	} 
	else if (empty($_POST["password"])) {
		apologize("ingresar contraseña");
	} 
	else if ($_POST["password"] !== $_POST["confirmacion"]) {
		apologize("¡Las contraseñas no son iguales!");
	} 
	else {
		// insertar un nuevo usuario a la base de datos
		$filas = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 20000.00)", $_POST["username"], crypt($_POST["password"]));
		
		// verificar correcto ingreso del nuevo usuario 
		if ($filas === false) {
			apologize("El usuario ya existe, elige otro.");
		}
		$filas = query("SELECT LAST_INSERT_ID() AS id");
		$id = $filas[0]["id"];
		$_SESSION["id"] = $id;
		$filas = query("SELECT username FROM users WHERE username = ?", $_POST["username"]);
		$_SESSION["nombreUsuario"] = $filas[0]['username'];
		redirect("/");
	}
}
?>