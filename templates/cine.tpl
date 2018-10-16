{include file="head.tpl"}
{include file="header.tpl"}

    <h1>{$Titulo}</h1>

    <div class="container">
      <div class="row">
        <table class="table table-hover col-10 offset-1">
          <thead>
            <tr>
              <th scope="col">Cine</th>
              <th scope="col">Capacidad</th>
              <th scope="col">Salas</th>
              <th scope="col">Peliculas</th>
              {if $User != null}
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
              {/if}
            </tr>
          </thead>
          <tbody>
            {foreach from=$Cines item=cine}
              <tr>
                <td><a href="peliculasPorCine/{$cine['id_cine']}">{$cine['nombre']}</td>
                <td>{$cine['capacidad']}</td>
                <td>{$cine['sala']}</td>
                <td>
                  <select name=pelicula>
                    {foreach from=$Peliculas item=pelicula}
                      {if $cine['id_cine'] == $pelicula['id_cine']}
                          {html_options values={$pelicula['id_pelicula']} output={$pelicula['nombre']}}
                      {/if}
                    {/foreach}  
                  </select>
                </td>
                {if $User != null}
                  <td><a href="borrar/{$cine['id_cine']}">BORRAR</a></td>
                  <td><a href="editar/{$cine['id_cine']}">EDITAR</a></td>
                {/if}
              </tr>
            {/foreach}            
          </tbody>
        </table>
      </div>
    </div>
{if $User != null}
    <div class="container">
      <h2>Agregar Cine</h2>
      <form method="post" action="agregar">
        <div class="form-group">
          <label for="nombre">Cine</label>
          <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
          <label for="capacidad">Capacidad</label>
          <input type="text" class="form-control" id="capacidad" name="capacidad">
        </div>
        <div class="form-group">
          <label for="sala">Sala</label>
          <input type="text" class="form-control" id="sala" name="sala">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
  {/if}
{include file="footer.tpl"}
