<?php

session_start();


include_once "includes/db.inc.php";

$sql = "SELECT * FROM galeria ORDER BY orderFoto DESC";

$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){

    echo "SSQL ERRO NO INDEX";

}else{
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Elevens Caffé</title>

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
       

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />

    </head>

    <style>

/*--------------------*/
/* ABOUT US */
/*--------------------*/


#mu-about {
	background-color: #fff;
	display: inline;
	float: left;
	width: 100%;
}

.mu-about-area {
	display: inline;
	float: left;
	padding: 100px 0;
	width: 100%;
}

.mu-about-left {
	display: inline;
	float: left;
	width: 100%;
}

.mu-about-right {
	display: inline;
	float: left;
	margin-top: 35px;
	width: 130%;
	background-color: #fff;
	padding: 40px;
	margin-left: -175px;
	box-shadow: 3px 1px 18px -9px #000;
}

.mu-about-right p {
	font-size: 15px;
}

    </style>
    <!---- Icon admin Login -->
    <?php
    if(isset($_SESSION['userName'])){


   include "assets/content/icon_admin.php" ;

    }

        ?>


    <?php include "assets/content/navbar.php" ?>

        <!-- Masthead-->
    
         
        
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Bem-Vindo 
                            
                        
                        
                        
                        <?php
                        
                        if(isset($_SESSION['userName'])){

                                if($_SESSION['userStatus'] == 'admin'){

                                    echo  $_SESSION['userStatus'];

                                }else{

                                    echo  "<span>" . $_SESSION['userName'] . "</span>";
                                }
                                
                        }
                        else{
                            echo '';
                        }
                        
                        
                        ?>
                    
                    
                    </h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Seja Bem-Vindo ao espaço mais agradável da cidade</p>
                        <a class="btn btn-main-color btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
                            
        <!-- About section-->
        <?php

                        if(isset($_SESSION['userId'])){

                            echo '<section class="page-section bg-warning" id="about">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 text-center">
                                        <h2 class="text-white mt-0">Está<span> Autenticado! </span></h2>
                                        <hr class="divider light my-4" />
                                        <p class="text-white-50 mb-4">Agora pode fazer uma reserva!</p>
                                        <a class="btn btn-light btn-xl js-scroll-trigger" href="reservar/menu_reservas.php">Reservar Mesa!</a>
                                    </div>
                                </div>
                            </div>
                        </section>';
                        }
                        else{

                            echo '<section class="page-section bg-warning" id="about">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 text-center">
                                        <h2 class="text-white mt-0">Não  está <span>autenticado</span></h2>
                                    
                                        <p class="text-white-50 mb-4"></p>
                                        <a href="autenticar.php" class="btn btn-light btn-xl js-scroll-trigger" href="#services">Autenticar!</a>
                                    </div>
                                </div>
                            </div>
                        </section>';


                        }

?>
        	<section id="mu-about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-about-area">
							<!-- Start Feature Content -->
							<div class="row">
								<div class="col-md-6">
									<div class="mu-about-left">
										<img class="" src="assets\img\portfolio\fullsize\1.jpg" alt="img">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mu-about-right">
										<h2>About Our Agency</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam aliquam distinctio magni enim error commodi suscipit nobis alias nulla, itaque ex, vitae repellat amet neque est voluptatem iure maxime eius!</p>

										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus in accusamus qui sequi nisi, sint magni, ipsam, porro nesciunt id veritatis quaerat ipsum consequatur laborum, provident veniam quibusdam placeat quam?</p>
                                        <div class="row">
                                            <button class="btn btn-outline btn-secondary d-flex justify-content-end">Ver mais</button>
                                        </div>
									</div>
								</div>
                            </div>
							<!-- End Feature Content -->

                            <?php if($_SESSION['userStatus'] == 'admin') : ?>
            
                               
                                <div class="container-fluid p-0">
                <div class=" text-center ">
            
                            <button class="btn btn-success btn-xl mt-4" name="submit-foto" href="" type="submit">Adicionar Evento</button>
                </div>
                            </div>
            
                          
                            <?php endif ?>
						</div>
					</div>
                </div>
                        
			</div>
        </section>
        


        

        <!-- Services section-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Eventos</h3>
                            <p class="text-muted mb-0">Os nossos eventos são muito conhecidos por Espinho e arredores!</p>
                            
                            <a class="btn btn-lg btn-outline-info mt-4">Vem conhece-los</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Ready to Publish</h3>
                            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Made with Love</h3>
                            <p class="text-muted mb-0">Diga-nos a sua opinião</p>

                            <a class="btn btn-lg btn-outline-success mt-4">Preencher Formulário</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

  </section>
    

        <!-- Gallery section-->

        <section id="portfolio">
            <div class="container-fluid p-0">
            <div class=" text-center ">
                <div class="row no-gutters">

                <?php while($row = mysqli_fetch_assoc($result)){ 

                    echo '<div class="col-lg-4 col-sm-6">
                            

                        <a class="portfolio-box" href="assets/img/gallery/'. $row["imgFullNameFoto"] . '">
                        <img width=”100px" height=”100px” class="img-fluid align-self-center" src="assets/img/gallery/'. $row["imgFullNameFoto"] . '" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">'. $row["categoriaFoto"] . '</div>
                                <div class="project-name">'. $row["tituloFoto"] . '</div>
                                <div class="project-category text-white-50 mt-2">'. $row["descFoto"] . '</div>
                            </div></a>
                    </div>';

                 } ?>
                 </div>
                </div>
            </div>

        </section>

<?php if($_SESSION['userStatus'] == 'admin') : ?>

        <section class="page-section bg-warning text-white">
           <div class="container text-center">
           <?php if(  isset($_GET['typeFile'])  ) : ?>


           <script> alert("Tipo de Arquivo Errado") </script>

        <?php endif ?>
        
               <h2 class="mb-4">Inserir Fotofrafias</h2>
               
               <form action="includes/gallery_upload.inc.php?insert=true" method="post" enctype="multipart/form-data">

               <div class="form-row">
                     <div class="form-group col-md-3">

                            <label for="categoria"><span>Categoria</span></label>
                            <input type="text" class="form-control" id="categoria" name="filecategoria" placeholder="Categoria"  >
                                
                    </div>

                    <div class="form-group col-md-3">
                             <label for="titulo"><span>Nome da Imagem</span></label>
                             <input type="text" class="form-control" id="filename" name="filename" placeholder="Nome do Ficheiro"  >
                                
                     </div>

                    <div class="form-group col-md-3">
                             <label for="titulo"><span>Titulo</span></label>
                             <input type="text" class="form-control" id="titulo" name="filetitulo" placeholder="Titulo da imagem"  >
                                
                     </div>
                    <div class="form-group col-md-3">
                             <label for="titulo"><span>Descrição</span></label>
                             <input type="text" class="form-control" id="descricao" name="filedescricao" placeholder="Descrição da Imagem"  >
                                
                     </div>
                    <div class="form-group col-md-3">
                             <label for="image"><span>Image</span></label>
                             <input type="file" class="form-control" id="file" name="file">
                                
                     </div>
             </div>

               <button class="btn btn-success btn-xl mt-4" name="submit-foto" href="" type="submit">Inserir Fotofrafia</button>
               </form>
           </div>
       </section> 

<?php endif ?>

        <!-- Call to action section-->
         <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Veja já o nosso <span>delicioso</span> menu!</h2>
                <a class="btn btn-light btn-xl" href="">Fazer Reserva</a>
            </div>
        </section> 
        
       

        <!-- Contact section-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i
                        ><!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
                    </div>
                </div>
            </div>
        </section>
      
        <!-- Footer-->
       <?php include "assets/content/footer.php"?>


        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
