<div class="row">
  <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
    <form class="form-horizontal" action="cambiar_pass.php" method="post">
      <fieldset>

      <legend>Cambiar Contrase&ntilde;a</legend>
        <div class="form-group">
          <input autofocus id="inputUsuario" placeholder="Nombre de usuario" class="form-control" name="username" type="text"/>                
        </div>
        <div class="form-group">
          <input class="form-control" id="inputPass" placeholder="Contrase&ntilde;a" name="password" type="password"/>
          </div>
        <div class="form-group">
         <input class="form-control" id="inputNuevoPass" placeholder="Nueva Contrase&ntilde;a" name="nuevoPass" type="password"/>            
        </div>
        <div class="form-group">
         <input class="form-control" id="inputNuevoConf" placeholder="Confirmar" name="confirmacion" type="password"/>                 
        </div>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-danger">Cambiar</button>          
          </div>
        </div>
      </fieldset>
    </form>
  </div>
  
</div>
<div>
  <a href="javascript:history.go(-1);">Volver</a>
</div>
