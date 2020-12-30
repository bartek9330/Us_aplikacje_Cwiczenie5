<?php
/* Smarty version 3.1.30, created on 2020-12-30 04:29:58
  from "F:\xampp\htdocs\php_05\app\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5febf436d429f6_76270929',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b6ac82538b979160c8b937f1aa103f561490d53' => 
    array (
      0 => 'F:\\xampp\\htdocs\\php_05\\app\\CalcView.html',
      1 => 1609298887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/main.html' => 1,
  ),
),false)) {
function content_5febf436d429f6_76270929 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13962083795febf436d424f9_54150540', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../templates/main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_13962083795febf436d424f9_54150540 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator kredytowy v5</h2>


    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php">
        <div class="row gtr-50 gtr-uniform">
        <div class="field">
	<label for="amount">Kwota: </label>
	<input type="text" name="amount" id="kwota" />
	</div>
            </br>
	<div class="field">
	<label for="years">Lata: </label>
        <input type="text" name="years" id="lata" />
	</div>
            </br>
	<div class="field">
	<label for="percentage">Oprocentowanie kredytu: </label>
	<input type="text" name="percentage" id="oprocentowanie" />
                
        <ul class="actions special">
                    <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
                </ul>
            </div>
        </div>
    </form>

<div class="messages">


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
    <h4>Wynik</h4>
    <p class="res">rata: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

    </p>
    <?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
