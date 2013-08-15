<?php
ini_set('error_reporting', E_ALL);

$_cfg['url'] = 'http://'.$_SERVER['HTTP_HOST'].'/loca/';

define('SMARTY_DIR', 'lib/smarty/');

// Banco de dados
$_cfg['mysql']=array(
  'host'=>'localhost',
  'user'=>'root',
  'pass'=>'91lS!&*Ke',
  'db'=>'xajax_base',
  );

$_cfg['bd_tableprefix']='szn_';

$_cfg['typeAdoDB_connect']='mysqlt';
$_cfg['bd_nome']= $_cfg['mysql']['db'];
define("BD", $_cfg['bd_nome']);
define("BDTP",$_cfg['bd_tableprefix']);

//arquivos dos usuário
$_cfg['userdata']='userdata/';

//arquivos da etapa do fornecedor na manutencao de componente
$_cfg['userdata_etF']=$_cfg['userdata'].'etF/';

//tipo de acesso do menu
$_cfg['tipoAcessoMenu']['r']['desc']='Somente lista informa&ccedil;&otilde;es';
$_cfg['tipoAcessoMenu']['r']['img']='r.gif';
$_cfg['tipoAcessoMenu']['rw']['desc']='Lista e insere informa&ccedil;&otilde;es';
$_cfg['tipoAcessoMenu']['rw']['img']='rw.png';
$_cfg['tipoAcessoMenu']['adm']['desc']='Supervisor - Listar, inserir, editar e apagar informa&ccedil;&otilde;es';
$_cfg['tipoAcessoMenu']['adm']['img']='adm.png';
