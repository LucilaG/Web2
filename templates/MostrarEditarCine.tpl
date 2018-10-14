{include file="head.tpl"}
{include file="header.tpl"}

    <div class="container">
      <h2>Formulario</h2>
      <form method="post" action="{$home}/guardarEditar">
        <input type="hidden" class="form-control" id="id" name="id" value="{$Cine["id_cine"]}">
        <div class="form-group">
          <label for="nombre">nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{$Cine["nombre"]}">
        </div>
        <div class="form-group">
          <label for="capacidad">Descripcion</label>
          <input type="text" class="form-control" id="capacidad" name="capacidad" value="{$Cine["capacidad"]}">
        </div>
        <div class="form-group">
          <label for="sala">sala</label>
          <input type="text" class="form-control" id="sala" name="sala" value="{$Cine["sala"]}">
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </form>
    </div>


{include file="footer.tpl"}
