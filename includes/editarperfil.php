<?php include ("../ligacao.php"); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QUIZ</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<body>
<?php if(isset($_SESSION['tipo_util']) && $_SESSION['tipo_util'] != NULL){ ?>	
  <div class="main">

        <h1>Editar Perfil</h1>
			<div class="container">
				<div class="sign-up-content">
			

<?php
	if(isset($_POST['atualizar_dados'])){
		$flag=false;
		$flag_email=false;
		$flag_pass=false;

		$nome=$_POST['nome'];
		$telemovel=$_POST['telemovel'];
		$nif=$_POST['nif'];
		$pass=$_POST['pass'];
		$pass=md5($pass);
		/* Verificar se a password da Base de Dados é igual à da confirmação */

		if(isset($_GET['ID'])){
			$query="SELECT pass from perfil where ID =".$_GET['ID']."";
		}else{
			$query="SELECT pass from perfil where email='".$_SESSION['email']."'";
		}
		
		$result=mysqli_query($ligax,$query);
		$registo=mysqli_fetch_assoc($result);
			$passBD=$registo['pass'];
			if($passBD!=$pass){
				$flag=true;
				$flag_pass=true;		
		}
		
		/* Existiu um erro */
		if($flag==true){ ?>
			A palavra passe n&atilde;o coincide!
			<section id="contact">
						<div class="inner">
							<section>
			<fieldset class="fieldset" id="fieldset"><legend class="legend" id="legend" align="center">Dados Pessoais</legend>
				<form name="frm" method="POST" id="register-form" action="" enctype="multipart/form-data">
                            <br>
							<div class="form-textbox">
								<input placeholder="Nome" type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" id="name" required="" oninvalid="this.setCustomValidity('Insira um Nome')" oninput="this.setCustomValidity('')"/>
							</div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Email" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" disabled id="email" required=""/>
								<!-- disabled significa que não pode alterar este campo -->
                            </div>
							<br>
							<div class="form-textbox">
                                <input placeholder="Telemóvel" type="text" name="telemovel" value="<?php echo $_SESSION['telemovel']; ?>" pattern="[0-9]{9}" id="telemovel" oninvalid="this.setCustomValidity('Insira um Telemóvel no formato válido! Ex:999000999')" oninput="this.setCustomValidity('')"/>
                            </div>
							<br>
							<div class="form-textbox">
                                <input placeholder="NIF" type="text" name="nif" value="<?php echo $_SESSION['nif']; ?>" pattern="[0-9]{9}" id="nif" oninvalid="this.setCustomValidity('Insira um NIF no formato válido! Ex:000999000')" oninput="this.setCustomValidity('')"/>
                            </div>
							<br>
							<div class="form-textbox">
                                
                            </div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Password" type="password" name="pass" id="pass1" required="" oninvalid="this.setCustomValidity('Insira a Password')" oninput="this.setCustomValidity('')"/>
								<img id="olho1" src="images/olho.png" alt="Mostrar Imagem"/>
                            </div>
							<br>
                            <br>
                            <div class="form-textbox">
                                <input type="submit" name="atualizar_dados" id="atualizar_dados" class="submit" value="Atualizar Dados" onClick="return val();"/>
							</div>
							<br>							
							<div class="form-textbox">	
								<input type="reset" value="Apagar" id="signup" class="submit"/>
                            </div>
                        </form>
					</fieldset>
					</section>
						
					<br><br>	
					<section>
					<fieldset class="fieldset" id="fieldset"><legend class="legend" id="legend" align="center">Dados Pessoais</legend>
						<form method="POST" id="register-form" action="">
                            
							<br>
							<div class="form-textbox">
                                <input placeholder="Password Antiga" type="password" name="pass" id="pass2" required="" oninvalid="this.setCustomValidity('Insira a sua Password Antiga!')" oninput="this.setCustomValidity('')"/>
								<img id="olho2" src="images/olho.png" alt="Mostrar Imagem"/>
                            </div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Password Nova" type="password" name="passnova" id="passnova" required="" oninvalid="this.setCustomValidity('Insira uma Nova Password!')" oninput="this.setCustomValidity('')"/>
                           		<img id="olho3" src="images/olho.png" alt="Mostrar Imagem"/>
						   </div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Confirmar Password" type="password" name="passconf" id="passconf" required="" oninvalid="this.setCustomValidity('Repita a Nova Password!')" oninput="this.setCustomValidity('')"/>
                            <img id="olho4" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <br>
                            <div class="form-textbox">
                                <input type="submit" name="atualizar_password" id="signup" class="submit" value="Atualizar Password"/>
							</div>
							<br>	
							<div class="form-textbox">	
								<input type="reset" value="Apagar" id="signup" class="submit"/>
                            </div>
                        </form>
					</fieldset>
					</section>
						
						
			</div>
		</section>
			
<?php } else { 
		
		if(isset($_GET['ID'])){
			$atualizar="UPDATE perfil set nome='".$nome."',telemovel='".$telemovel."',nif='".$nif."' where ID =".$_GET['ID']."";
		}else{
			$atualizar="UPDATE perfil set nome='".$nome."',telemovel='".$telemovel."',nif='".$nif."' where email='".$_SESSION["email"]."'";
		}
		$result=mysqli_query($ligax,$atualizar);
		if($result==1){	
		
		if($_FILES['foto']['error']==0){
				
				$file_name=$_FILES['foto']['name'];
				$file_type=$_FILES['foto']['type'];
				$file_size=$_FILES['foto']['size'];
				$file_tmp=$_FILES['foto']['tmp_name'];
				$data=base64_encode(file_get_contents($file_tmp));
				if(isset($_GET['ID'])){
					$query="UPDATE perfil set nome_foto='".$file_name."',tipo_foto='".$file_type."',
				tam_foto=$file_size,dados_foto='".$data."' where ID =".$_GET['ID']."";
				}else{
						$query="UPDATE perfil set nome_foto='".$file_name."',tipo_foto='".$file_type."',
				tam_foto=$file_size,dados_foto='".$data."' where email='".$_SESSION['email']."'";	
				}
				$result_up=mysqli_query($ligax, $query);
			}
		
			echo"<p>Atualizou os seus dados com sucesso.</p>";
		?>	
			<a href="../index.php" class="loginhere-link">Voltar ao Site</a>
			
		<?php
			} else {
				echo "<p>Dados não atualizados!</p>";?><br><br>
				<a href="../index.php" class="loginhere-link">Voltar ao Site</a><?php
			}
		}
	}

if(isset($_POST['atualizar_password'])){
		$flag=false;
		$flag_pass=false;
		$pass=$_POST['pass'];
		$passnova=$_POST['passnova'];
		$passconf=$_POST['passconf'];
	
	
		
		/* Verificar se a password da Base de Dados é igual à da confirmação */
		if(isset($_GET['ID'])){
			$query="select pass from perfil where ID =".$_GET['ID']."";
		}else{
			$query="select pass from perfil where email='".$_SESSION['email']."'";
		}
		$result=mysqli_query($ligax,$query);
		$registo=mysqli_fetch_assoc($result);
			$passBD=$registo['pass'];
			$pass = md5($pass);
			if($passBD!=$pass){
				$flag=true;
				$flag_pass=true;
					
		}
		if($passnova!=$passconf){
				$flag=true;
				$flag_pass=true;
					
		}
		
		/* Existiu um erro */
		if($flag==true){ ?>
		
			A palavra passe não coincide!
			<section id="contact">
						<div class="inner">
				<section>
				<fieldset class="fieldset" id="fieldset"><legend class="legend" id="legend" align="center">Dados Pessoais</legend>
					<form name="frm" method="POST" id="register-form" action="" enctype="multipart/form-data">
					
                            <br>
							<div class="form-textbox">
                                <input placeholder="Nome" type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" id="name" required="" oninvalid="this.setCustomValidity('Insira um Nome')" oninput="this.setCustomValidity('')"/>
                            </div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Email" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" disabled id="email" required=""/>
								<!-- disabled significa que não pode alterar este campo -->
                            </div>
							<br>
							<div class="form-textbox">
                                <input placeholder="Telemóvel" type="text" name="telemovel" value="<?php echo $_SESSION['telemovel']; ?>" pattern="[0-9]{9}" id="telemovel" oninvalid="this.setCustomValidity('Insira um Telemóvel no formato válido! Ex:999000999')" oninput="this.setCustomValidity('')"/>
                            </div>
							<br>
							<div class="form-textbox">
                                <input placeholder="NIF" type="text" name="nif" value="<?php echo $_SESSION['nif']; ?>" pattern="[0-9]{9}" id="nif" oninvalid="this.setCustomValidity('Insira um NIF no formato válido! Ex:000999000')" oninput="this.setCustomValidity('')"/>
                            </div>
							<br>
							<div class="form-textbox">
                                <input type="file" name="foto" id="foto"/>
                            </div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Password" type="password" name="pass" id="pass1" required="" oninvalid="this.setCustomValidity('Insira a Password')" oninput="this.setCustomValidity('')"/>
								<img id="olho1" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <br>
                            <div class="form-textbox">
                                <input type="submit" name="atualizar_dados" id="signup" class="submit" value="Atualizar Dados" onClick="return val();"/>
							</div>
							<br>
							<div class="form-textbox">	
								<input type="reset" value="Apagar" id="signup" class="submit"/>
                            </div>
                        </form>
					</fieldset>
					</section>
						
						
					<br><br>
					<section>
					<fieldset class="fieldset" id="fieldset"><legend class="legend" id="legend" align="center">Palavra Passe</legend>
						<form method="POST" id="register-form" action="">
                            
							<br>
							<div class="form-textbox">
                                <input placeholder="Password Antiga" type="password" name="pass" id="pass2" required="" oninvalid="this.setCustomValidity('Insira a sua Password Antiga!')" oninput="this.setCustomValidity('')"/>
								<img id="olho2" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Password Nova" type="password" name="passnova" id="passnova" required="" oninvalid="this.setCustomValidity('Insira uma Nova Password!')" oninput="this.setCustomValidity('')"/>
								<img id="olho3" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Confirmar Password" type="password" name="passconf" id="passconf" required="" oninvalid="this.setCustomValidity('Repita a Nova Password!')" oninput="this.setCustomValidity('')"/>
								<img id="olho4" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <br>
                            <div class="form-textbox">
								<input type="submit" name="atualizar_password" id="signup" class="submit" value="Atualizar Password"/>
							</div>	
							<br>
							<div class="form-textbox">	
								<input type="reset" value="Apagar" id="signup" class="submit"/>
                            </div>
                        </form>
					</fieldset>
					</section>
						
						
			</div>
		</section>
						
		<?php } else { 
		$passnova = md5($passnova);
		if(isset($_GET['ID'])){
			$atualizar="UPDATE perfil set pass='".$passnova."' where ID =".$_GET['ID']."";
		}else{
			$atualizar="UPDATE perfil set pass='".$passnova."' where email='".$_SESSION["email"]."'";
		}
		$result=mysqli_query($ligax,$atualizar);
		if($result==1){	
			echo"<p>Atualizou a sua password com sucesso.</p>";
		?>
			<a href="../index.php" class="loginhere-link">Voltar ao Site</a>
			
		<?php
			} else {
				echo "<p>Dados não atualizados!</p>";?><br><br>
				<a href="../index.php" class="loginhere-link">Voltar ao Site</a><?php
			}
		}
	}

//Ainda não pediu para atualizar - 1.º FORM

if(!isset($_POST['atualizar_password']) && !isset($_POST['atualizar_dados']))	{
		if(isset($_GET['ID'])){
			$procura="select * from perfil where ID =".$_GET['ID']."";
		}else{
			$procura="select * from perfil where email='".$_SESSION['email']."'";
		}
			//echo $procura;
			$result=mysqli_query($ligax,$procura);
			$nregistos=mysqli_num_rows($result);
			$registo=mysqli_fetch_assoc($result);
			if($nregistos==1){
				$_SESSION['nome']=$registo["nome"];
				$_SESSION['telemovel']=$registo['telemovel'];
				$_SESSION['nif']=$registo['nif'];
				$_SESSION['pass']=$registo['pass'];
						
				
			}	
		?>
			<section id="contact">
						<div class="inner">
					<section>
					<fieldset class="fieldset" id="fieldset"><legend class="legend" id="legend" align="center">Dados Pessoais</legend>
						<form name="frm" method="POST" id="register-form" action="" enctype="multipart/form-data">
                            <br>
							<div class="form-textbox">
                                <input placeholder="Nome" type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" id="name" required="" oninvalid="this.setCustomValidity('Insira um Nome')" oninput="this.setCustomValidity('')"/>
                            </div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Email" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" disabled id="email" required=""/>
								<!-- disabled significa que não pode alterar este campo -->
                            </div>
							<br>
							<div class="form-textbox">
                                <input placeholder="Telemóvel" type="text" name="telemovel" value="<?php echo $_SESSION['telemovel']; ?>" pattern="[0-9]{9}" id="telemovel" oninvalid="this.setCustomValidity('Insira um Telemóvel no formato válido! Ex:999000999')" oninput="this.setCustomValidity('')"/>
                            </div>
							<br>
							<div class="form-textbox">
                                <input placeholder="NIF" type="text" name="nif" value="<?php echo $_SESSION['nif']; ?>" pattern="[0-9]{9}" id="nif" oninvalid="this.setCustomValidity('Insira um NIF no formato válido! Ex:000999000')" oninput="this.setCustomValidity('')"/>
                            </div>
							
							<br>
							<div class="form-textbox">
                                <input type="file" name="foto" id="foto"/>
                            </div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Password" type="password" name="pass" id="pass1" required="" oninvalid="this.setCustomValidity('Insira a Password')" oninput="this.setCustomValidity('')"/>
								<img id="olho1" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <br>
                            <div class="form-textbox">
								<input type="submit" name="atualizar_dados" id="signup" class="submit" value="Atualizar Dados" onClick="return val();"/>
							</div>
							<br>
							<div class="form-textbox">
								<input type="reset" value="Apagar" id="signup" class="submit"/>
                            </div>
                        </form>
					</fieldset>
					</section>
						
						<br><br>
					<section>
					<fieldset class="fieldset" id="fieldset"><legend class="legend" id="legend" align="center">Dados Pessoais</legend>
						<form method="POST" id="register-form" action="">
                            
							<br>
							<div class="form-textbox">
                                <input placeholder="Password Antiga" type="password" name="pass"  id="pass2" required="" oninvalid="this.setCustomValidity('Insira a sua Password Antiga!')" oninput="this.setCustomValidity('')"/>
								<img id="olho2" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <div class="form-textbox">
                                <input placeholder="Password Nova" type="password" name="passnova" id="passnova" required="" oninvalid="this.setCustomValidity('Insira uma Nova Password!')" oninput="this.setCustomValidity('')"/>
								<img id="olho3" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
							<div class="form-textbox">
                                <input placeholder="Confirmar Password" type="password" name="passconf" id="passconf" required="" oninvalid="this.setCustomValidity('Repita a Nova Password!')" oninput="this.setCustomValidity('')"/>
								<img id="olho4" src="images/olho.png" alt="Mostrar Imagem"/>
							</div>
							<br>
                            <br>
                            <div class="form-textbox">
                                <input type="submit" name="atualizar_password" id="signup" class="submit" value="Atualizar Password"/>
							</div>
							<br>
							<div class="form-textbox">	
								<input type="reset" value="Apagar" id="signup" class="submit"/>
                            </div>
                        </form>
					</fieldset>
					</section>
						<p class="loginhere">
							<a href="../index.php" class="loginhere-link">Voltar ao Site</a>
						</p>
						
			</div>
		</section>
						
		<?php } ?>	
		</div>
	</div>
	
<script>
	var pass1 = $('#pass1');
	var olho1= $("#olho1");
	var pass2 = $('#pass2');
	var olho2= $("#olho2");
	var passnova = $('#passnova');
	var olho3= $("#olho3");
	var passconf = $('#passconf');
	var olho4= $("#olho4");

	olho1.mousedown(function() {
	  pass1.attr("type", "text");
	});

	olho1.mouseup(function() {
	  pass1.attr("type", "password");
	});

	$( "#olho1" ).mouseout(function() { 
	  $("#pass1").attr("type", "password");
	});
	
	olho2.mousedown(function() {
	  pass2.attr("type", "text");
	});

	olho2.mouseup(function() {
	  pass2.attr("type", "password");
	});

	$( "#olho2" ).mouseout(function() { 
	  $("#pass2").attr("type", "password");
	});
	
	olho3.mousedown(function() {
	  passnova.attr("type", "text");
	});

	olho3.mouseup(function() {
	  passnova.attr("type", "password");
	});

	$( "#olho3" ).mouseout(function() { 
	  $("#passnova").attr("type", "password");
	});
	
	olho4.mousedown(function() {
	  passconf.attr("type", "text");
	});

	olho4.mouseup(function() {
	  passconf.attr("type", "password");
	});

	$( "#olho4" ).mouseout(function() { 
	  $("#passconf").attr("type", "password");
	});
</script>

<?php }else echo "<p class='loginhere'>
					Para aceder ao editar perfil tem que ter uma conta!<br><a href='registar.php' class='loginhere-link'> Registe-se</a> ou <a href='login.php' class='loginhere-link'> Entre</a> com uma conta!
                </p>
"?>	

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
	</body>
</html>