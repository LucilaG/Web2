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
            {foreach from=$Peliculas item=pelicula}
              {if $id_cine != null}
                {if $id_cine == $pelicula['id_cine']}
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
                {/if}  
              {/if}  
            {/foreach}         
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
    <div id="cine-container" class="container">
     
    </div>
    {if $User != null}
    <div class="container">
      <h2>Agregar Comentario</h2>
      <form method="post" action="api/comentario">
        <div class="form-group">
          <input type="text" class="form-control" id="nombre" name="nombre" required>
          <input type="number" class="form-control" id="puntaje" name="puntaje" min=0 max=5  required>
          <input  type="hidden" class="form-control" id="id" name="id"  required>
          <input  type="hidden" class="form-control" id="id_cine" name="id_cine"  required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
  {/if}
  {/if}
{include file="footer.tpl"}
