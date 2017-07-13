<?php 
	class EstablecimientoModel{

		private $pdo;


		public function __CONSTRUCT(){
			try{
				$this->pdo =  DataBase::connect();
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){

				die($e->getMessage());

			}
		}

					//Completar datos del registro

		public function completeUser($data){
				try{

					$sql = "UPDATE nox_establecimiento SET est_nombre = ?, est_nit = ?, est_genero = ?, est_direccion = ?, est_telefono = ?, est_celular = ? WHERE est_correo = ? ";
					$query = $this->pdo->prepare($sql);
					$query->execute(array($data[0],$data[2],$data[1],$data[3],$data[4],$data[5],$data[6]));
				}catch (PDOException $e) {
						die($e->getMessage());
					}
				}

	public function readReservas($data){
		try{

			$sql = "SELECT * FROM nox_reserva INNER JOIN nox_usuario ON (nox_usuario.usu_codigo = nox_reserva.usu_codigo)  WHERE est_codigo = ? ORDER BY res_fecha";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));
			$result = $query->fetchAll(PDO::FETCH_BOTH);			
		}catch (PDOException $e) {
		die($e->getMessage());
	}
	return $result;
	}

	public function deleteReservaEst($data){
		try{
			$sql = "DELETE FROM nox_reserva WHERE res_codigo = ?";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));			
		}catch (PDOException $e) {
		die($e->getMessage());
		}
	}

	public function readPromociones($data){
		try{

			$sql = "SELECT * FROM nox_promocion WHERE est_codigo = ? ORDER BY prom_fecha";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));
			$result = $query->fetchAll(PDO::FETCH_BOTH);			
		}catch (PDOException $e) {
		die($e->getMessage());
		}
	return $result;
	}


	public function createPromo($data,$file){
		try{
			$sql = "INSERT INTO nox_promocion VALUES(?,?,?,?,?,?)";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data[2],$_SESSION["user"]["code"],$data[0],$file,$data[3],$data[1]));
		}catch (PDOException $e) {
			die($e->getMessage());
		}
			return $msn;
		}
	
	}
?>
