<?php

if (!isset($root)) {
	$root='';
}

/*
 * ADODB
 *
 */

require_once 'lib/adodb/adodb.inc.php';
require_once 'lib/adodb/adodb-active-record.inc.php';
require_once 'lib/DBTransact.php';
require_once 'lib/geraTabelaRelatorio.inc.php';
require_once 'lib/validate.php';


$con = ADONewConnection($_cfg['typeAdoDB_connect']);
$con->Connect($_cfg['mysql']['host'], $_cfg['mysql']['user'], $_cfg['mysql']['pass'], $_cfg['mysql']['db']);
$con->Execute("SET NAMES 'utf8'");
/*
 * Smarty
 *
 */
require_once 'lib/smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;
$smarty->template_dir = "smarty/templates/";
$smarty->compile_dir = "smarty/templates_c/";
$smarty->config_dir = "smarty/configs/";
$smarty->cache_dir = "smarty/cache/";


/*
 * Xajax
 *
 */
 include 'lib/xajax/xajax_core/xajax.inc.php';
//echo $destino;
 if(!isset($destino)){
	$destino=$_SERVER['PHP_SELF'];
 }
//echo $destino;
$xajax = new xajax($destino);
// Mudanças de configuração
$xajax->configure('errorHandler',true);
$xajax->configure('debug',false);
$xajax->configure('logFile', "log/errors.log");
$xajax->configure('characterEncoding', 'UTF-8');
$xajax->configure("outputEntities", false);
$xajax->configure("decodeUTF8Input", false);
$xajax->configure("javascript URI", 'lib/xajax/');


function call($class=NULL, $function=NULL, $data=NULL, $data2=NULL) {
  GLOBAL $con,$_cfg,$smarty;
	$_class=$class;

    $tipo='';

		$arquivo="components/".$class.".inc.php";
    if ($_nome=explode ('.',$class)){
			$class=$_nome[0];
			$arquivo="components/";$i=0;
			foreach ($_nome as $v) {
				if ($i>0) {
					$arquivo .= $v."/";
				}
				$i++;
			}
			$arquivo .= $class.".inc.php";

    }

		//if (!empty($tipo)) {

		//}else{
			//$arquivo="components/".$class.".inc.php";
		//}


    if (!is_file($arquivo) || $function==NULL) {
      $objerro=new xajaxResponse();
      $objerro->alert('ERRO: Ação Vazia'.$arquivo);
      return $objerro;
    }
    else {

      require $arquivo;

			//inicializa a classe extendida do xajax
      $objResponse = new $class($_cfg, $con, $smarty, $data,$data2);
			$objResponse->$function();

    }

  return $objResponse;
}

$xajax->register(XAJAX_FUNCTION,'call');
$xajax->processRequest();
$smarty->assign('xajax_js', $xajax->getJavascript('lib/xajax/'));
