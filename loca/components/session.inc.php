<?PHP
/*
* @ autor rafael freitas
*/
class session extends xajaxResponse
{
	private $smarty;
	private $data;
	private $con;
	private $idmenuacesso;
	private $CFG;
	private $class='cadastroVeiculos.config';
	
	function __construct($_cfg, $con, $smarty, $data,$data2)
	{
		$this->data         = $data;
		$this->data2        = $data2;
		$this->con          = $con;
		$this->smarty       = $smarty;
		$this->_cfg         = $_cfg;
		$this->objVal				= new validate();
		$this->objDT				= new DBTransact($con);

		session_start();		
	}
	function session(){
		if(isset($_SESSION['locadora'])){
			$this->verifica();
		}
		else{
			$this->alert(print_r($this->data));
		}
	}
	function verifica(){
		if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ) {
		    $tempoAtual = time();
		    if ( ($tempoAtual - $_SESSION['ultimoClick']) > '900' ) {        
		        $_SESSION = array();
		        session_destroy();
		        $this->logout();
		        exit();        
		    }else{
		        $_SESSION['ultimoClick'] = time();        
		    }
		}
		else{
		    $this->logout();    
		}
	}
	public function logout(){
		$str = $this->smarty->fetch('login.tpl');
		$this->assign('page_geral','innerHTML',$str);
	}
}
?>