<?php
// configuration
require("../includes/config.php");
// if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
// else render form
render("cambiar_pass_form.php", ["nombreUsuario" => $_SESSION['nombreUsuario'], "title" => "Cambiar password"]);
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
	else if ($_POST["nuevoPass"] !== $_POST["confirmacion"]) {
		apologize("¡Las contraseñas no son iguales!");
	} 
	else {
		// consulatar a la base de datos por el usuario
        $filas = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

		// si el usuario existe verificar contraseña        
        if (count($filas) == 1)
        {
            // seleccionar la unica fila
            $fila = $filas[0];

            // comparar el hash que ingreso el usuario con el de la base de datos.
            if (crypt($_POST["password"], $fila["hash"]) == $fila["hash"])
            {
           		// cambiar contraseña
            	$x = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["nuevoPass"]), $_SESSION["id"]);
                if ($x === false) {
                	apologize("query incorrecto");
                }
                
                redirect("login.php");
            }
            else {
            	apologize("password incorrecto");
            }
        }
        apologize("Nombre de usuario o contraseña incorrecto(a)");		
	}
}
?>