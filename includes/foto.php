//codigo para mostrar a foto e colocar foto caso n tenha

		<?php if(isset($_SESSION['ID']) && $_SESSION['ID'] != NULL){ ?>
			<div class="title text-center wow fadeIn" data-wow-duration="1500ms">
				<?php if($_SESSION['tam_foto'] == 0){ ?>
				<a><img class="circle" align="center" width="60" src="./images/semfoto.png" alt="" /></a>
				<h2>Bem-<span class="color">Vindo</span></h2>
				<h2><?php echo $_SESSION["nome"]; ?></h2>
				<div class="border"></div>
			<?php } else { ?>
				<a><img class="circle" align="center" width="60" src="showfile_fotoperfil.php?ID=<?php echo $_SESSION['ID'];?>" alt="sing up image"></a>
				<h2>Bem-<span class="color">Vindo</span></h2>
				<h2><?php echo $_SESSION["nome"]; ?></h2>
				<div class="border"></div>
			<?php }  ?>
				<label for="agree-term" class="label-agree-term"></label>
		<?php }  else echo"<div class='title text-center wow fadeIn' data-wow-duration='1500ms'>
		   <h2 align='center'>Bem-<span class='color'>Vindo</span></h2>
		   <h2 align='center'><span class='color'>Ao </span>QUIZ</h2>
			<div class='border'></div></div>"?>
		</div>
		<br>
					
					
					
					
//codigo para ir buscar a foto a base de dados, este esta num ficheiro a parte chamado showfile_fotoperfil				
					
					
					
		<?php
			include ('ligacao.php');
			$query=" select nome_foto,tipo_foto,tam_foto,dados_foto from perfil where ID=".$_GET['ID']; 
			$result=mysqli_query($ligax,$query);
			$row=mysqli_fetch_array($result);
			$tipo_foto=$row["tipo_foto"];
			$nome_foto=$row["nome_foto"];
			$dados_foto=base64_decode($row["dados_foto"]);
			$tam_foto=$row["tam_foto"];
			header("Content-type:$tipo_foto");
			header("Content-lenght:$tam_foto");
			header("Content-Disposition: inline; filename=$nome_foto");
			header ("Content-Description: PHP Generated Data");
			echo $dados_foto;
		?>