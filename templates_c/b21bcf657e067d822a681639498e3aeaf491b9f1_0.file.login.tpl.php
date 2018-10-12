<?php
/* Smarty version 3.1.34-dev-1, created on 2018-10-12 13:53:39
  from 'C:\xampp\htdocs\proyectos\TPE_WEB2\Web2\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-1',
  'unifunc' => 'content_5bc08b430f0b03_75821084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b21bcf657e067d822a681639498e3aeaf491b9f1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\TPE_WEB2\\Web2\\templates\\login.tpl',
      1 => 1539202397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bc08b430f0b03_75821084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
    <div class="container">
      <div class="row">
        <div class="col-4 offset-4">
          <h1><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h1>
          <form method="post" action="verificarLogin">
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input type="input" class="form-control" name="usuarioId" id="usuarioId" aria-describedby="usuarioId" placeholder="Ingrese Usuario">
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="passwordId" id="passwordId" placeholder="Password">
            </div>
            <div>
              <?php echo $_smarty_tpl->tpl_vars['Message']->value;?>

            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
