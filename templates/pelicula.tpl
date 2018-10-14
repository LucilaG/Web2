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
              <tr>
                <td>{$pelicula['nombre']}</td>
                <td>{$pelicula['director']}</td>
                <td>{$pelicula['rate']}</td>
                <td>{$pelicula['horario']}</td>
                <td><a href="borrar/{$pelicula['id_pelicula']}">BORRAR</a></td>
                <td><a href="editar/{$pelicula['id_pelicula']}">EDITAR</a></td>
              </tr>
            {/foreach}            
          </tbody>
        </table>
      </div>
    </div>

{include file="footer.tpl"}
