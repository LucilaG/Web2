{include file="head.tpl"}
{include file="header.tpl"}

    <div class="container">
      <h2>Modificar Pelicula {$Pelicula["nombre"]}</h2>
      <form method="post" action="{$home}/guardarEditar">
        <input type="hidden" class="form-control" id="id" name="id" value="{$Pelicula["id_pelicula"]}">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{$Pelicula["nombre"]}">
        </div>
        <div class="form-group">
          <label for="director">Director</label>
          <input type="text" class="form-control" id="director" name="director" value="{$Pelicula["director"]}">
        </div>
        <div class="form-group">
          <label for="rate">Rate</label>
          <input type="number" class="form-control" id="rate" name="rate" value="{$Pelicula["rate"]}">
        </div>
        <div class="form-group">
          <label for="horario">Horario</label>
          <input type="time" class="form-control" id="horario" name="horario" value="{$Pelicula["horario"]}">
        </div>
         <input type="hidden" class="form-control" id="id_cine" name="id_cine" value="{$Pelicula["id_cine"]}">
        <button type="submit" class="btn btn-primary">Modificar</button>
      </form>
    </div>


{include file="footer.tpl"}
