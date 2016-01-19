<div>
	<table class="table table-striped">
		<thead>
			<tr>				
				<th class="izquierda">Vender</th>			 
				<th class="izquierda">S&iacute;mbolo</th>
				<th class="centro">Nombre</th>
				<th class="centro">Acciones (Shares)</th>
				<th class="derecha">Precio</th>
				<th class="derecha">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($posiciones as $posicion): ?>
				<tr> 
				    <td>
					<!--Inicio Formulario de venta-->
						<?php $sim = $posicion['simbolo'] ?>														
						<input type="radio" class="form-control" name="simbolo" <?php print("value='$sim'"); ?> form="formulario">					
					<!--Termino Formulario de venta-->
					</td>
					<td class="izquierda"><?= $posicion["simbolo"] ?></td>
					<td><?= $posicion["nombre"] ?></td>
					<td><?= $posicion["shares"] ?></td>
					<td class="derecha">$<?= $posicion["precio"] ?></td>
					<td class="derecha">$<?= number_format($posicion["total"], 2) ?></td>					
				</tr>
			<?php endforeach ?>
			<tr>
				<td>
					<form action="vender.php" method="POST" name="formulario" id="formulario" role="form">
						<button type="submit" class="btn btn-primary">Vender</button>
					</form>
				</td>
				<td class="izquierda" colspan="4"><strong>Cash</strong></td>
				<td class="derecha">$<?= number_format($cash, 2) ?></td>
			</tr>
		</tbody>
	</table>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>
