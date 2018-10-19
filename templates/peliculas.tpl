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
              {if $User != null}
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
              {/if}
            </tr>
          </thead>
          <tbody>
          {if $Cant}
            {foreach from=$Peliculas item=pelicula}
                  <tr>
                    <td><a href="pelicula/{$pelicula['id_pelicula']}">{$pelicula['nombre']}</td>
                    <td>{$pelicula['director']}</td>
                    <td>{$pelicula['rate']}</td>
                    <td>{$pelicula['horarios']}</td>
                    {if $User != null}
                      <td><a href="borrarPelicula/{$pelicula['id_pelicula']}">BORRAR</a></td>
                      <td><a href="editarPelicula/{$pelicula['id_pelicula']}">EDITAR</a></td>
                    {/if}  
                  </tr>
            {/foreach}  
            {else}
            <tr>
                <td>{$Peliculas['nombre']}</td>
                <td>{$Peliculas['director']}</td>
                <td>{$Peliculas['rate']}</td>
                <td>{$Peliculas['horarios']}</td>
                {if $User != null}
                    <td><a href="borrarPelicula/{$pelicula['id_pelicula']}">BORRAR</a></td>
                    <td><a href="editarPelicula/{$pelicula['id_pelicula']}">EDITAR</a></td>
                {/if}  
            </tr>
            {/if}       
          </tbody>
        </table>
      </div>
    </div>
  {if $User != null}
    <div class="container">
        <h2>Agregar Pelicula</h2>
        <form method="post" action="agregarPelicula">
          <div class="form-group">
            <label for="nombre">Pelicula</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
            <label for="director">Director</label>
            <input type="text" class="form-control" id="director" name="director" required>
          </div>
          <div class="form-group">
            <label for="rate">Rate</label>
            <input type="number" class="form-control" id="rate" name="rate" step="0.01" required>
          </div>
          <div class="form-group">
            <label for="horarios">Horario</label>
            <input type="time" class="form-control" id="horarios" name="horarios" required>
          </div>
          <div class="form-group">
            <label for="id_cine">Cine</label>
            <select class="form-control" id="id_cine" name="id_cine">
              {foreach from=$Cines item=cine}
                {html_options values={$cine['id_cine']} output={$cine['nombre']}}
              {/foreach}
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
  {/if}
{include file="footer.tpl"}