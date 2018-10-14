{include file="head.tpl"}
{include file="header.tpl"}

    <h1>{$Titulo}</h1>

    <div class="container">
      <div class="row">
        <table class="table table-hover col-10 offset-1">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Director</th>
              <th scope="col">Rate</th>
              <th scope="col">Horario</th>
              <th scope="col">Eliminar</th>
              <th scope="col">Modificar</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$Peliculas item=pelicula}
              {if $id_cine != null}
                {if $id_cine == $pelicula['id_cine']}
                  <tr>
                    <td>{$pelicula['nombre']}</td>
                    <td>{$pelicula['director']}</td>
                    <td>{$pelicula['rate']}</td>
                    <td>{$pelicula['horarios']}</td>
                    <td><a href="borrarPelicula/{$pelicula['id_pelicula']}">BORRAR</a></td>
                    <td><a href="editarPelicula/{$pelicula['id_pelicula']}">EDITAR</a></td>
                  </tr>
                {/if}  
              {/if}  
            {/foreach}         
          </tbody>
        </table>
      </div>
    </div>
  <div class="container">
      <h2>Agregar Pelicula</h2>
      <form method="post" action="agregarPelicula">
        <div class="form-group">
          <label for="nombre">Pelicula</label>
          <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
          <label for="director">Director</label>
          <input type="text" class="form-control" id="director" name="director">
        </div>
        <div class="form-group">
          <label for="rate">Rate</label>
          <input type="text" class="form-control" id="rate" name="rate">
        </div>
        <div class="form-group">
          <label for="horarios">Horario</label>
          <input type="time" class="form-control" id="horarios" name="horarios">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
{include file="footer.tpl"}
