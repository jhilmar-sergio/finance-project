<table class="table table-striped">
  
  <thead>
	<tr>
	  <th scope="col">Transaccion</th>
	  <th scope="col">Fecha/hora</th>
	  <th scope="col">Simbolo</th>
	  <th scope="col">Acciones (Shares)</th>
	  <th scope="col" class="derecha">Precio</th>
	</tr>
  </thead>
  <tbody>
  	<?php foreach ($filas as $fila): ?>
  	  <tr>
  	  	<td class="izquierda"><?= $fila['transaccion'] ?></td>
  	  	<td class="izquierda"><?= $fila['fecha'] ?></td>
  	  	<td class="izquierda"><?= $fila['simbolo'] ?></td>
  	  	<td class="izquierda"><?= $fila['shares'] ?></td>
  	  	<td class="derecha">$<?= number_format($fila['precio'], 2) ?></td>
  	  </tr>	
  	<?php endforeach ?>	
  </tbody>	

</table>

<div>
    <a href="logout.php">Log Out</a>
</div>

<div class="instrucciones">
  <p>Entre otras cosas, aqu&iacute; puedes ver la variaci&oacute;n de precios con el tiempo</p>
  <p>(por ejemplo el precio de Facebook 2015-12-20 era de $97.33 <br>
   El 2016-01-18 era de $94.97)</p>
</div>