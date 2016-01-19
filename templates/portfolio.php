<div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="izquierda">S&iacute;mbolo</th>
				<th class="izquierda">Nombre</th>
				<th class="centro">Acciones (Shares)</th>
				<th class="derecha">Precio</th>
				<th class="derecha">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($posiciones as $posicion): ?>
				<tr>
					<td class="izquierda"><?= $posicion["simbolo"] ?></td>
					<td class="izquierda"><?= $posicion["nombre"] ?></td>
					<td><?= $posicion["shares"] ?></td>
					<td class="derecha">$<?= $posicion["precio"] ?></td>
					<td class="derecha">$<?= number_format($posicion["total"], 2) ?></td>					
				</tr>
			<?php endforeach ?>
			<tr>
				<td class="izquierda" colspan="4"><strong>Cash</strong></td>
				<td class="derecha">$<?= number_format($cash, 2) ?></td>
			</tr>
		</tbody>
	</table>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>
<div class="instrucciones">
	<h3>&iexcl;A "Comprar" acciones! ("comprar")</h3>
	<p>Haz click en <strong>consultar</strong> en la barra de navegaci&oacute;n</p>
	<br>
	<p><strong>Nota:</strong> No olvides ver tu <strong>historial</strong> de compra y venta.</p>
</div>