
<?php

  require_once "model/user.model.php";

   class UserController{
     private $model;

 		public function __CONSTRUCT(){

 			$this->model  = new UserModel();

 		}

    public function completar(){	
    		//Vista de completar Perfil
      if ($_SESSION["user"]["cargo"] == "establecimiento") {
        if ($_SESSION["user"]["name"]  == NULL) {
          $titulo = "NOX Medellín";
          require_once "view/include/header.php";
          require_once "view/modules/establecimiento/completeProfileEst.php";
          require_once "view/include/footer.php";
        }else{
           header("Location: DashboardEstablecimiento");
        }
      }

      if ($_SESSION["user"]["cargo"] == "user") {
        if ($_SESSION["user"]["name"]  == NULL) {
            require_once "view/include/header.php";
            require_once "view/modules/user/completeProfile.php";
            require_once "view/include/footer.php";
        }else{
          header("Location: Dashboard.php");
        }
      }

    }


    public function recuperar(){			//Vista de recuperar
      $titulo = "Recupera tu clave";
      require_once "view/include/header.php";
      require_once "view/modules/user/recuperar.php";
      require_once "view/include/footer.php";
    }


    public function actualizar(){			//Completar Perfil Function
      $data = $_POST['data'];
      $data[5]=$_SESSION["user"]["email"];
      $result= $this->model->completeUser($data);
      header("Location: Dashboard");
    }

    public function dashboard(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      require_once "view/modules/user/dashboard.php";
      require_once "view/include/footer.php";
    }

    public function establecimiento(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      $datos = $this->model->readEstablecimiento();
      require_once "view/modules/user/establecimiento.php";
      require_once "view/include/footer.php";
    }

    public function misReservas(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      $data = $_SESSION["user"]["code"];
      $datos = $this->model->readReservas($data);
      require_once "view/modules/user/misReservas.php";
      require_once "view/include/footer.php";
    }

    public function establecimientoInfo(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      require_once "view/modules/user/establecimientoInfo.php";
      require_once "view/include/footer.php";
    }

    ////////////////////////////////////////////////////////////////////////

        public function mostrarInfoEstablecimiento(){
           $data = $_POST["data"];
           $result =  $this->model->mostrarInfoEstablecimiento($data);
           $_SESSION["est"]["code"] = $result['est_codigo'];
           $titulo = "NOX Medellín";
           require_once "view/include/header.php";
           require_once "view/modules/user/establecimientoInfo.php";
           require_once "view/include/footer.php"; 
        }

    ///////////////////////////////////////////////////////////////////////

        public function reservar(){
           $titulo = "NOX Medellín";
            require_once "view/include/header.php";
            require_once "view/modules/user/reservar.php";
            require_once "view/include/footer.php"; 
        }

        public function guardarReserva(){
          $data = $_POST["data"];
          $data[3] = "RES-".date('Y/m/d').'-'.date('h:m:s');
          $result =  $this->model->reservar($data);
          header("Location: Dashboard?msn=$result");
        }

        public function eliminarReserva(){
          
        }

        public function promoEventos(){
          $titulo = "NOX Medellín";
          require_once "view/include/header.php";
          $datos = $this->model->readPromociones();
          require_once "view/modules/user/promoEventos.php";
          require_once "view/include/footer.php"; 
        }

        public function cerrarSesion(){
          session_start();
          session_destroy();
          header("Location: Inicio");
        }







    
}




    ?>
