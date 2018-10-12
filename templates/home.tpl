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
                <td><a href="borrar/{$cine['id_cine']}">BORRAR</a></td>
                <td><a href="editar/{$cine['id_cine']}">EDITAR</a></td>
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
          <label for="cineForm">Cine</label>
          <input type="text" class="form-control" id="cineForm" name="cineForm">
        </div>
        <div class="form-group">
          <label for="capacidadForm">Capacidad</label>
          <input type="text" class="form-control" id="capacidadForm" name="descripcionForm">
        </div>
        <div class="form-group">
          <label for="descripcionForm">Sala</label>
          <input type="text" class="form-control" id="salaForm" name="descripcionForm">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
{include file="footer.tpl"}
