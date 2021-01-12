<?php

class FrontController{
	function __construct() {
		$liste_admin = array('conn','insert','deco','del','parse','updateMaxNews');
		$m=new Modele();
		
		try{
			if(isset($_REQUEST['action'])===false)
				$action=NULL;
			else
				$action=$_REQUEST['action'];
			if ($m->isAdmin() || $action == "conn")
				new ControllerAdmin();
			else
			{
				if(in_array($action, $liste_admin))
					$_REQUEST['action'] ="connexionAdmin";
				new Controller();
			}
		}
		catch (Exception $e){
			$debug = "Echec connection Controller";
			require ($rep.$vues['erreur']);
		}
	}
}

?>
