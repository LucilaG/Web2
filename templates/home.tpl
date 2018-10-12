{include file="head.tpl"}
{include file="header.tpl"}

    <h1>{$Titulo}</h1>

    <div class="container">
      <ul class="list-group">
            {foreach from=$Cines item=cine}
                <li class="list-group-item">{$cine['nombre']} ----- {$cine['capacidad']}<a href="borrar/{$cine['id']}">BORRAR</a> | <a href="editar/{$cine['id']}">EDITAR</a></li>
            {/foreach}
      </ul>
    </div>
    <div class="container">
      <div class="row">
        <table class="table table-hover col-10 offset-1">
          <thead>
            <tr>
              <th scope="col">Cine</th>
              <th scope="col">Capacidad</th>
              <th scope="col">Salas</th>
              <th scope="col">Eliminar</th>
              <th scope="col">Modificar</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$Cines item=cine}
              <tr>
                <td>{$cine['nombre']}</td>
                <td>{$cine['capacidad']}</td>
                <td>{$cine['sala']}</td>
                <td><a href="borrar/{$cine['id']}">BORRAR</a></td>
                <td><a href="editar/{$cine['id']}">EDITAR</a></td>
              </tr>
            {/foreach}            
          </tbody>
        </table>
      </div>
    </div>

    <div class="container">
      <h2>Agregar Cine</h2>
      <form method="post" action="agregar">
        <div class="form-group">
          <label for="tituloForm">Cine</label>
          <input type="text" class="form-control" id="tituloForm" name="tituloForm">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Capacidad</label>
          <input type="text" class="form-control" id="descripcionForm" name="descripcionForm">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
{include file="footer.tpl"}
