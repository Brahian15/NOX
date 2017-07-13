<?php 

	require_once "model/establecimiento.model.php";

	class EstablecimientoController{

    private $establecimiento;

 	public function __CONSTRUCT(){

 			$this->establecimiento  = new EstablecimientoModel();

 		}

 	 public function dashboardEst(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      require_once "view/modules/establecimiento/dashboardEst.php";
      require_once "view/include/footer.php";
    }

    public function actualizar(){			//Completar Perfil Function
      $data = $_POST['data'];
      $data[6]=$_SESSION["user"]["email"];
      $result= $this->establecimiento->completeUser($data);
      header("Location: DashboardEstablecimiento");
    }

    public function misReservas(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      $data = $_SESSION["user"]["code"];
      $datos = $this->establecimiento->readReservas($data);
      require_once "view/modules/establecimiento/misReservasEst.php";
      require_once "view/include/footer.php";
    }

    public function deleteReservaEst(){
    $data = $_POST["data"];
    $result= $this->establecimiento->deleteReservaEst($data);
    header("Location: MisReservasEst");    
    }

    public function promoEventosEst(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      $data = $_SESSION["user"]["code"];
      $datos = $this->establecimiento->readPromociones($data);
      require_once "view/modules/establecimiento/promoEventosEst.php";
      require_once "view/include/footer.php"; 
    }

    public function regPromo(){
      $titulo = "NOX Medellín";
      require_once "view/include/header.php";
      require_once "view/modules/establecimiento/regPromo.php";
      require_once "view/include/footer.php"; 
    }

    public function createPromo(){
      $data = $_POST["data"];
      $data[2] = "PROM-".date('Y/m/d').'-'.date('h:m:s');
      $data[3]=date("Y/m/d");
              $nameFile = $this->randAlphanum(30).date('Ymdhs');
              $paths = array("intranet/promos/");
              $successUpload = false;

              // Capturamos el nombre original del archivo con su extension.
              $fileUploadName = strtolower(basename($_FILES["file_upload"]["name"]));
              $fileUploadExt  = pathinfo($fileUploadName,PATHINFO_EXTENSION);

              // Validamos que el archivo sea mp3 o imagen >> Se le asigna la carpeta donde se debe guardar

              if($fileUploadExt == "mp3"){
                $path = $paths[1];
                $typeFile = "audio";
                $successUpload = true;
              }else{
                  if($fileUploadExt != "jpg" && $fileUploadExt != "png" && $fileUploadExt != "jpeg" && $fileUploadExt != "gif" ) {
                    $msn = "El archivo debe ser Imagen o Mp3";
                    $successUpload = false;
                  }else{
                    $typeFile = "imagen";
                    $path = $paths[0];
                    $successUpload = true;
                  }

               $typeFile = "";
              }

            // Validamos el peso del archivo, para este ejemplo no se permite archivos de imagen superiores a 2MB y archivos de audio superiores a 4MB

            switch ($typeFile) {
              case 'audio':
                  if($_FILES["file_upload"]["size"] > 16777216){
                    $msn = "Ooops! tu imagen no puede superar mas de 4MB";
                    $successUpload = false;
                  }
              break;

              case 'imagen':
                  if($_FILES["file_upload"]["size"] > 16777216){
                    $msn = "Ooops! tu imagen no puede superar mas de 2MB";
                    $successUpload = false;
                  }
              break;
            }


              if($successUpload == true){

                $file = $path. $nameFile .".". $fileUploadExt;

                if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $file)) {
                    $msn = "El archivo  se subio correctamente.  <br>";
                } else {
                  $msn =  "Ocurrio un error, empiece a ver en que fallo";
                }
              }

              $result = $this->establecimiento->createPromo($data,$file);
              header("Location: promoEventosEst"); 

    }


    public function randAlphanum($length){            //Function Random
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomAlpha = '';
      for ($i = 0; $i < $length; $i++) {
        $randomAlpha .= $characters[rand(0, $charactersLength - 1)];
      }
        return $randomAlpha;
    }

	}

?>