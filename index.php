<?php

	session_start();

	require_once 'model/conn.model.php';

	if(isset($_REQUEST['c'])){

		$Controller = strtolower($_REQUEST['c']);
		$Action = isset($_REQUEST['a']) ? $_REQUEST['a']: "index";

		require_once "Controller/$Controller.controller.php";
		$Controller = ucwords($Controller)."Controller";

		$Controller = new $Controller();
		call_user_func(array($Controller, $Action));
	}else{
		$Controller = "website";
		require_once "Controller/$Controller.controller.php";
		$Controller = ucwords($Controller)."Controller";
		$Controller = new $Controller();
		$Controller -> index();
	}
	if(isset($_GET["msn"])){
		echo "<script>alert('".$_GET["msn"]."')</script>";

  }

?>
