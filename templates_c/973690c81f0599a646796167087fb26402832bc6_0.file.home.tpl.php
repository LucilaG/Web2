<?php
/* Smarty version 3.1.34-dev-1, created on 2018-10-12 15:45:30
  from 'C:\xampp\htdocs\proyectos\TPE_WEB2\Web2\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-1',
  'unifunc' => 'content_5bc0a57ae93271_29743725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '973690c81f0599a646796167087fb26402832bc6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\TPE_WEB2\\Web2\\templates\\home.tpl',
      1 => 1539351492,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bc0a57ae93271_29743725 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <h1><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h1>

    <div class="container">
      <ul class="list-group">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Cines']->value, 'cine');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cine']->value) {
?>
                <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['cine']->value['nombre'];?>
 ----- <?php echo $_smarty_tpl->tpl_vars['cine']->value['capacidad'];?>
<a href="borrar/<?php echo $_smarty_tpl->tpl_vars['cine']->value['id'];?>
">BORRAR</a> | <a href="editar/<?php echo $_smarty_tpl->tpl_vars['cine']->value['id'];?>
">EDITAR</a></li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Cines']->value, 'cine');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cine']->value) {
?>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['cine']->value['nombre'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['cine']->value['capacidad'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['cine']->value['sala'];?>
</td>
                <td><a href="borrar/<?php echo $_smarty_tpl->tpl_vars['cine']->value['id'];?>
">BORRAR</a></td>
                <td><a href="editar/<?php echo $_smarty_tpl->tpl_vars['cine']->value['id'];?>
">EDITAR</a></td>
              </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>            
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
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
