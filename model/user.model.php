<?php

	class UserModel{

		private $pdo;
		public function __CONSTRUCT(){
			try{

				$this->pdo =  DataBase::connect();
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){

				die($e->getMessage());

			}
		}

		public function create($data){ //Crear un usuario

			//PHP Mailer
			
			$_SESSION['email']=$data[2];
			$link="http://localhost:8000/1094130/NOX/index.php?c=website&a=activar";
			$mail = new PHPMailer;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'p3plcpnl0173.prod.phx3.secureserver.net';// Specify main and backup SMTP
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'public@ocrend.com';                 // SMTP username
			$mail->Password = 'Prinick2016';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl`
			$mail->Port = 465;                                    // TCP port to connect to

			$mail->setFrom('public@ocrend.com', 'Mailer');
			$mail->addAddress($data[2]);     // Add a recipient

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Confirma tu registro en NOX MEDELLIN';
			$mail->Body    = $this->EmailTemplate($link);
			$mail->AltBody = 'Éste es el último paso para acceder a NOX';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				try{
				$cargo = 2;
				$sql = "INSERT INTO nox_usuario	VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[4],$cargo,$data[0],$data[1],null,null,$data[2],null,null,"Inactivo",$data[7],null));

				$sql = "INSERT INTO nox_acceso VALUES (?,?,?,0,?)";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[5],$data[4],$data[3],"Activo"));

				$msn = "Ya Casi Está Listo, Hemos Dirigido Un Correo a: $data[2]";


			}catch (PDOException $e) {
					die($e->getMessage());
			}
			return $msn;
			}

		}


public function createEstablecimiento($data,$file){ //Crear un usuario

			//PHP Mailer
			
			$_SESSION['email']=$data[1];
			$link="http://localhost:8000/1094130/NOX/index.php?c=website&a=activarEst";
			$mail = new PHPMailer;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'p3plcpnl0173.prod.phx3.secureserver.net';// Specify main and backup SMTP
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'public@ocrend.com';                 // SMTP username
			$mail->Password = 'Prinick2016';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl`
			$mail->Port = 465;                                    // TCP port to connect to

			$mail->setFrom('public@ocrend.com', 'Mailer');
			$mail->addAddress($data[1]);     // Add a recipient

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Confirma tu registro en NOX MEDELLIN';
			$mail->Body    = $this->EmailTemplate($link);
			$mail->AltBody = 'Éste es el último paso para acceder a NOX';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				try{
				$cargo = 3;
				$sql = "INSERT INTO nox_establecimiento	 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[3],$file,$data[0],$data[1],null,null,null,null,null,null,null,null,"Inactivo",null));

				$sql = "INSERT INTO nox_acceso_establecimiento VALUES (?,?,?,0,?)";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[4],$data[2],"Activo",$data[3]));

				$msn = "Ya Casi Está Listo, Hemos Dirigido Un Correo a: $data[1]";


			}catch (PDOException $e) {
					die($e->getMessage());
			}
			return $msn;
			}

		}

		//////////////////////////////////////////////////////////////////////////

			public function nameUsuExist($data){ //Validamos si el correo ya está en nox
			try{

				$sql = "SELECT * FROM nox_usuario WHERE usu_name = ?";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[0]));
				$result = $query->fetch(PDO::FETCH_BOTH);

			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
		}

		//////////////////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////////

		public function emailExist($data){ //Validamos si el correo ya está en nox
			try{

				$sql = "SELECT * FROM nox_usuario WHERE usu_email = ?";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[0]));
				$result = $query->fetch(PDO::FETCH_BOTH);

			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
		}

		public function emailExistEst($data){
			try{

				$sql = "SELECT * FROM nox_establecimiento WHERE est_correo = ?";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($data[0]));
				$result = $query->fetch(PDO::FETCH_BOTH);

			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
		}

		public function estado($email){ //Validamos el estado del registro
			 try{

	 			 	$sql = "SELECT usu_estado, usu_email FROM nox_usuario WHERE usu_estado='Inactivo' AND usu_email = ?";
	 				$query = $this->pdo->prepare($sql);
	 				$query->execute(array($email));
				    $result = $query->fetch(PDO::FETCH_BOTH);
	 				}catch (PDOException $e) {
	  				   die($e->getMessage());
	 			  }
			return $result;
		}

		public function estadoEst($email){ //Validamos el estado del registro
			 try{
	 			 	$sql = "SELECT est_estado, est_correo FROM nox_establecimiento WHERE est_estado='Inactivo' AND est_correo = ?";
	 				$query = $this->pdo->prepare($sql);
	 				$query->execute(array($email));
				    $result = $query->fetch(PDO::FETCH_BOTH);
	 				}catch (PDOException $e) {
	  				   die($e->getMessage());
	 			  }
			return $result;
		}
		/////////////////////////////////////////////////////////////////////////////

	public function readCargo($data){
		try{

			$sql = "SELECT rol_codigo FROM nox_usuario  WHERE usu_email = ? ";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));
			$result = $query->fetch(PDO::FETCH_BOTH);



		}catch (PDOException $e) {
		die($e->getMessage());
	}
		return $result;
}

//Validamos usuarios por correo para validar login o registro

	public function readUserbyEmail($data){
		try{

			$sql = "SELECT nox_usuario.usu_codigo, acc_token, acc_clave, usu_nombre FROM nox_usuario INNER JOIN nox_acceso ON (nox_acceso.usu_codigo = nox_usuario.usu_codigo) WHERE usu_email = ? ";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));
			$result = $query->fetch(PDO::FETCH_BOTH);



		}catch (PDOException $e) {
		die($e->getMessage());
	}
		return $result;
}

	public function readUserbyEmailEst($data){
		try{

			$sql = "SELECT nox_establecimiento.est_codigo, acc_token_est, acc_clave_est, est_nombre_usuario, est_nombre FROM nox_establecimiento INNER JOIN nox_acceso_establecimiento ON (nox_acceso_establecimiento.est_codigo = nox_establecimiento.est_codigo) WHERE est_correo = ? ";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));
			$result = $query->fetch(PDO::FETCH_BOTH);



		}catch (PDOException $e) {
		die($e->getMessage());
	}
		return $result;
}



	public function readEstablecimiento(){
		try{

			$sql = "SELECT * FROM nox_establecimiento ORDER BY  est_nombre_usuario";
			$query = $this->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_BOTH);			
		}catch (PDOException $e) {
		die($e->getMessage());
	}
	return $result;
}

	public function readReservas($data){
		try{

			$sql = "SELECT * FROM nox_reserva INNER JOIN nox_establecimiento ON (nox_establecimiento.est_codigo = nox_reserva.est_codigo)  WHERE usu_codigo = ? ORDER BY res_fecha";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));
			$result = $query->fetchAll(PDO::FETCH_BOTH);			
		}catch (PDOException $e) {
		die($e->getMessage());
	}
	return $result;
	}

	public function mostrarInfoEstablecimiento($data){
			try{
			$sql = "SELECT * FROM nox_establecimiento WHERE est_codigo = ?";
			$query = $this->pdo->prepare($sql);
			$query->execute(array($data));
			$result = $query->fetch(PDO::FETCH_BOTH);			
		}catch (PDOException $e) {
		die($e->getMessage());
	}
	return $result;
	}

		////////////////////////////////////////////////////////////////////////////////////

public function EmailTemplate($link) { //Estilos del correo enviado para activar (Mejorar) aquí en casa ni me manda el correo y allá en el estudio si :c
			   $HTML = '
			  <html>
			  <body style="background-color:#E6E6E6;font-family: caviar_dreamsregular; font-size: 14px;color:#000;">
			  <div style="">
				  <h2>Confirma tu suscripción a NOX Medellín</h2>
				  <p style="font-size:17px;color:#038C21;">Ya casi estás listo para acceder a NOX MEDELLÍN</p>

				<p style="padding:15px;background-color:#ECF8FF;">
						ACTIVA TU CUENTA AQUÍ <a style="font-weight:bold;color: #038C21;font-size:15px;" href="'.$link.'" target="_blank">Confirmar&raquo;</a>
				</p>
				  <p style="font-size: 9px;">&copy; '. date('Y',time()) .'. NOX MEDELLIN</p>
			  </div>
			  </body>
			  </html>
			  ';
				  return $HTML;
			}

		///////////////////////////////////////////////////////////////////////////

			public function activar($email){ //Funcion de activar correo

						try{

							$sql = "UPDATE nox_usuario SET usu_estado='Activo' where usu_email='$email'";

								$query = $this->pdo->prepare($sql);
								$query->execute();

								$msn = "Se ha activado tu cuenta";
						}catch(PDOException $e){

							die($e->getMessage());

						}

						return $result = $msn;
					}


			public function activarEst($email){ //Funcion de activar correo

						try{

							$sql = "UPDATE nox_establecimiento SET est_estado='Activo' where est_correo='$email'";

								$query = $this->pdo->prepare($sql);
								$query->execute();

								$msn = "Se ha activado tu cuenta";
						}catch(PDOException $e){

							die($e->getMessage());

						}

						return $result = $msn;
					}

		//////////////////////////////////////////////////////////////////

					public function updateUserFail($data){ //Fallos en los intentos de acceso
						 		 try{

						 			 	$sql = "UPDATE nox_acceso SET acc_intentos = (acc_intentos + 1) WHERE usu_codigo = (SELECT usu_codigo FROM nox_usuario WHERE usu_email = ?) ";
						 				$query = $this->pdo->prepare($sql);
						 				$query->execute(array($data));
						 				}catch (PDOException $e) {
						  					die($e->getMessage());
						 			  }

						 		 }

					public function updateEstFail($data){
						 		 try{

						 			 	$sql = "UPDATE nox_acceso_establecimiento SET acc_intentos_est = (acc_intentos_est + 1) WHERE est_codigo = (SELECT est_codigo FROM nox_establecimiento WHERE est_correo = ?) ";
						 				$query = $this->pdo->prepare($sql);
						 				$query->execute(array($data));
						 				}catch (PDOException $e) {
						  					die($e->getMessage());
						 			  }

					}
		////////////////////////////////////////////////////////////////////////////////


					//Completar datos del registro

					public function completeUser($data){
						try{

							 $sql = "UPDATE nox_usuario SET usu_nombre = ?, usu_apellido = ?, usu_genero = ?, usu_fecha_nacimiento = ? WHERE usu_email = ? ";
							 $query = $this->pdo->prepare($sql);
							 $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[5]));
							 }catch (PDOException $e) {
									 die($e->getMessage());
							 }
					}

			public function recuperarContraseña($email,$rol){
			$_SESSION['EmailRecover']=$email;
			$key = md5(time());
			if ($rol == 2) {
				$link="http://localhost:8000/1094130/NOX/index.php?c=website&a=newPass&key=$key";
			}elseif ($rol == null) {
				$link="http://localhost:8000/1094130/NOX/index.php?c=website&a=newPassEst&key=$key";
			}
			$mail = new PHPMailer;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'p3plcpnl0173.prod.phx3.secureserver.net';// Specify main and backup SMTP
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'public@ocrend.com';                 // SMTP username
			$mail->Password = 'Prinick2016';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl`
			$mail->Port = 465;                                    // TCP port to connect to

			$mail->setFrom('public@ocrend.com', 'Mailer');
			$mail->addAddress($email);     // Add a recipient

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Recuperacion de tu cuenta de tu cuenta';
			$mail->Body    = $this->bodyEmail($email,$link,$key,$rol);
			$mail->AltBody = $rol;

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {

				try{
				if ($rol == null) {
					$sql = "UPDATE nox_establecimiento SET est_key = ? where est_correo = ?";
					$query = $this->pdo->prepare($sql);
					$query->execute(array($key,$email));					
				}elseif ($rol == 2) {
					$sql = "UPDATE nox_usuario SET usu_key = ? where usu_email = ?";
					$query = $this->pdo->prepare($sql);
					$query->execute(array($key,$email));
				}

				}catch(PDOException $e){
					die($e->getMessage());
				}
			}
			return $msn ="Se ha enviado un correo a: $email para cambiar su contraseña! ";
					}

					public function bodyEmail($email,$link,$key,$rol){
						   $HTML = '
			  <html>
			  <body style="background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;">
			  <div style="">
				  <h2>Recuperar Contraseña</h2>
				  <p style="font-size:17px;">'.$rol.'</p>

				<p style="padding:15px;background-color:#ECF8FF;">
						Para comenzar el proceso de recuperacion de contraseña <a href="'.$link.'" style="font-weight:bold;color: #2BA6CB;" target="_blank">clic aquí&raquo;</a>
				</p>
				  <p style="font-size: 9px;">&copy; '. date('Y',time()) .'. Todos los derechos reservados.</p>
			  </div>
			  </body>
			  </html>
			  ';

				 return $HTML;
					}

		public function checkKey($email,$key){
			try{
				$sql = "SELECT * FROM nox_usuario WHERE usu_email = ? AND usu_key= ? ";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($email, $key));
				$result = $query->fetch(PDO::FETCH_BOTH);

			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $result;
		}

		public function checkKeyEst($email,$key){
			try{
				$sql = "SELECT * FROM nox_establecimiento WHERE est_correo = ? AND est_key= ? ";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($email, $key));
				$result = $query->fetch(PDO::FETCH_BOTH);

			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $result;
		}



		public function updatePass($data,$email,$rol){
			try{
				if ($rol == 2) {
					$sql = "UPDATE nox_acceso inner join nox_usuario on(nox_acceso.usu_codigo=nox_usuario.usu_codigo) SET acc_clave='$data[0]' where usu_email='$email'";
				$query = $this->pdo->prepare($sql);
				$query->execute();

				}elseif ($rol == null) {
				$sql = "UPDATE nox_acceso_establecimiento INNER JOIN nox_establecimiento on(nox_acceso_establecimiento.est_codigo=nox_establecimiento.est_codigo) SET acc_clave_est='$data[0]' where est_correo='$email'";
				$query = $this->pdo->prepare($sql);
				$query->execute();
				}
				}catch(PDOException $e){
					die($e->getMessage());
				}


				return $msn = "Se ha Cambiado la contraseña Exitosamente";
					}

			public function reservar($data){
				try{
					$sql = "INSERT INTO nox_reserva VALUES (?,?,?,?,?,?,?,?)";
					$query = $this->pdo->prepare($sql);
					$query->execute(array($data[3],$_SESSION["est"]["code"],$_SESSION["user"]["code"],"Activo",$data[0],$data[1],$data[2],null));

					$msn = "Tu reserva se a efectuado con exito";
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $msn;
			}


		public function buscarEstablecimiento($data){
			try{
					$sql = "SELECT * FROM nox_establecimiento WHERE est_nombre_usuario LIKE ?";
					$query = $this->pdo->prepare($sql);
					$query->execute(array("%$data%"));
					$result = $query->fetchAll(PDO::FETCH_BOTH);
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $result;
		}

		public function readPromociones(){
		try{

			$sql = "SELECT * FROM nox_promocion ORDER BY prom_fecha";
			$query = $this->pdo->prepare($sql);
			$query->execute(array());
			$result = $query->fetchAll(PDO::FETCH_BOTH);			
		}catch (PDOException $e) {
		die($e->getMessage());
		}
	return $result;
	}




  }
/////////////////////////////////////////////////////////////////////////////

 ?>
