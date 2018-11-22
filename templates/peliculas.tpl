{include file="head.tpl"}
{include file="header.tpl"}

    <h1>{$Titulo}</h1>
    <form method="post" action="mostrarPeliculaCondicion">          
          <div class="form-group">
            <label for="rate">Seleccionar peliculas por puntuación</label>
            <input type="number" min=0 max=10 id="rate" name="rate"/> 
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    
    <div class="container">
      <div class="row">      
        <table class="table table-hover col-10 offset-1">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Director</th>
              <th scope="col">Rate</th>
              <th scope="col">Horario</th>
              {if (isset($smarty.session.User))}
              {if $smarty.session.admin == 1}
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
              {/if}
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
                    {if (isset($smarty.session.User))}
                    {if $smarty.session.admin == 1}
                      <td><a href="borrarPelicula/{$pelicula['id_pelicula']}">BORRAR</a></td>
                      <td><a href="editarPelicula/{$pelicula['id_pelicula']}">EDITAR</a></td>
                      <td>
                      <form  method="post" action="agregarImagen/{$pelicula['id_pelicula']}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" id="imagenes" name="imagenes[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary" >Agregar</button>
                    <form>
                    </td>
                    {/if}  
                    {/if} 
                  </tr>
            {/foreach}  
            {else}
            <tr>
                <td>{$Peliculas['nombre']}</td>
                <td>{$Peliculas['director']}</td>
                <td>{$Peliculas['rate']}</td>
                <td>{$Peliculas['horarios']}</td>
                {if (isset($smarty.session.User))}
                {if $smarty.session.admin == 1}
                    <td><a href="agregarImagen/{$pelicula['id_pelicula']}">AGREGAR IMAGEN</a></td>
                    <td><a href="borrarPelicula/{$pelicula['id_pelicula']}">BORRAR</a></td>
                    <td><a href="editarPelicula/{$pelicula['id_pelicula']}">EDITAR</a></td>
                {/if}
                {/if}  
            </tr>
            {/if}       
          </tbody>
        </table>
      </div>
    </div>
  
  
{include file="footer.tpl"}
