
<!--Formulario de compra-->

<form action="comprar.php" method="POST">
	<fieldset>
		<legend>Comprar</legend>
		<div class="form-group">
			<label>S&iacute;mbolo
			<input type="text" name="simbolo" class="form-control">
			</label>
		</div>
		<div class="form-group">
			<label>Cantidad
			<input type="number" min="1" name="cantidad" class="form-control" placeholder="Shares">
			</label>
		</div>	
	<button type="submit" class="btn btn-primary">Comprar</button>
	</fieldset>	
</form>

<div class="instrucciones">
	<h3>&iexcl;D&eacute;jate llevar!</h3>
	<p>En el espacio simbolo colocar el simbolo</p>	
	<ul>
		<li>fb - Facebook.</li>
		<li>fox - Twenty-First Century Fox, Inc.</li>
		<li>t - AT&T Inc.</li>
		<li>etc.</li>
	</ul>
	<p>En el espacio shares colocar la cantidad de acciones.</p>
	
</div>
