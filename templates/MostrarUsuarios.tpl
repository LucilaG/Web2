    {include file="head.tpl"}
    {include file="header.tpl"}


    <h1>{$Titulo}</h1>

    <div class="container">  
      <div class="row">
        <table class="table table-hover col-10 offset-1">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Pass</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$Usuarios item=usuario}
                <tr>
                    <td><a href="usuario/{$usuario['id']}">{$usuario['nombre']}</td>
                    <td>{$usuario['pass']}</td>
                </tr>
            {/foreach}     
          </tbody>
        </table>
      </div>
    </div>

    
    {include file="footer.tpl"}


