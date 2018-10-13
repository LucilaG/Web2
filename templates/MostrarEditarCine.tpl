{include file="head.tpl"}
{include file="header.tpl"}

    <h1>{$Titulo}</h1>
 <div class="container">
      <form method="post" action="agregar">
       <input type="hidden" class="form-control" id="idForm" name="idForm" value="{$Cine["id_cine"]}">
        <div class="form-group">
          <label for="nombreForm">Cine</label>
          <input type="text" class="form-control" id="nombreForm" name="nombreForm" value="{$Cine["nombre"]}">
        </div>
        <div class="form-group">
          <label for="capacidadForm">Capacidad</label>
          <input type="text" class="form-control" id="capacidadForm" name="capacidadForm" value="{$Cine["capacidad"]}">
        </div>
        <div class="form-group">
          <label for="salaForm">Sala</label>
          <input type="text" class="form-control" id="salaForm" name="salaForm" value="{$Cine["sala"]}">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>

{include file="footer.tpl"}
