<?php

session_start();

include_once "includes/db.inc.php";
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
	width: 100%;
	background-color: #fff;
	padding: 40px;
	margin-left: -175px;
	box-shadow: 3px 1px 18px -9px #000;
}

.mu-about-right p {
    font-size: 15px;
    margin: 10px 0;
}
.itemEvento {
  display: flex;
}
.itemEvento p {
    margin-left: 10px;
}



section#events img.eventImg {
    width: 700px;
    height: 400px;
}
.titleSection {
    background: var(--green);
    padding-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow:  5px 10px var(--yellow);
}
.justify {
  display: flex;
  justify-content: center;
  align-items: center;
}





    </style>
    <!---- Icon admin Login -->
    <?php
    if(isset($_SESSION['fname'])){


   include "assets/content/icon_admin.php" ;


    }

        ?>
   

    <?php include "assets/content/navbar.php" ?>

  
         

        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                    

					
					<?php if(isset($_SESSION['userId']))   {?>
					 <?php if(isset($_SESSION['foto_status']) == "com")  {?> 
					<a>
					<img class="img-thumbnail img-index" src="includes/showfile.php?user_id=<?php echo $_SESSION['userId'];?>" width="100">
					</a>
                     <?php  } ?> 
					 <?php if(isset($_SESSION['foto_status']) == "sem")  {?> 
				
                     <?php  } ?> 
                    <?php  } ?>

					

					
                        <h1 class="text-uppercase text-white font-weight-bold">Bem-Vindo
                            
                        
                        
                        
                        <?php
                        
                        if(isset($_SESSION['fname'])){

                                if($_SESSION['userStatus'] == 'admin'){

                                    echo  $_SESSION['userStatus'];
                                }else{

                                    echo  "<span>" . $_SESSION['fname'] . "</span>";
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
                        <a class="btn btn-main-color btn-xl js-scroll-trigger" href="#about">Navegar</a>
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



<section class="page-section bg-elevens" id="about">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 text-center">
                                        <h1 class="text-white mt-0">Elevens Caffé</h1>
                                        <h2 class="text-white mt-0">Abertos <span>todos os dias </span> das 8:00 as 23:00 </h2>
                                    
                                     
                                
                                    </div>
                                </div>
                            </div>
    </section>

                      <?php require "./includes/showEventos.php"?>
              	<section  id="events">
                      <div class="bg-elevensEvents">

                          <div class="container">  
                              <div class="titleSection">
                                  
                                  <h1 class="text-white"">Nossos eventos</h1>
                                  
                                </div>
                                <?php foreach($result as $evento) :?>
            <div class="row">
                <div class="col-md-12">
                    <?php if($evento['evento_status'] == 'ativo') : ?>
                
						<div class="mu-about-area">
                            <!-- Start Feature Content -->
							<div class="row noWrap">
                                <div class="col-md-6">
                                    <div class="mu-about-left">
                                        <img class="eventImg" src="includes/showFotoEvento.php?id=<?= $evento['id'];?>" >
                                    </div>
								</div>
								<div class="col-md-6">
                                    <div class="mu-about-right">
                                        <h2><?=$evento['title']?></h2>
                                        <p class="mt-3 mb-3"><?=$evento['descricao']?></p>
                                        
                                        <div class="itemEvento">
                                            <img src="assets\img\calendario.svg" width="40" height="40" alt="" >
                                            <p class="font-weight-bolder labelEvento"> Data do evento: <span class="font-weight-bolder"><?= $evento['data'] ?></span></p>
                                        </div>
                                        
                                        <div class="mt-3 itemEvento">
                                            <img src="assets/img/tempo.svg" width="40" height="40" alt="">
                                            <p class="font-weight-bolder labelEvento"> Hora: <span class="font-weight-bolder"><?= $evento['hora'] ?></span></p>
                                        </div>
        <?php if(isset($_SESSION['userId']) ) : ?>
                                        
                                        <div class="row mt-6">
                                            <a class="btn btn-outline btn-secondary d-flex justify-content-end mt-5" href="eventos/reservarEvento.php?id=<?= $evento['id'];?>">Quero fazer reserva para este evento</a>
                                        </div>
                                        <?php endif ?>
									</div>
								</div>
                            </div>
							<!-- End Feature Content -->
                            <?php    if(isset($_SESSION['userId'])) : ?>
                            <?php if($_SESSION['userStatus'] == 'admin') : ?>
            
                                
                                <div class="container-fluid p-0">
                <div class=" text-center ">
                    
                    <a class="btn btn-warning text-white mt-4" name="submit-foto" href="eventos/editarEvento.php?id=<?= $evento['id'];?>" type="submit">Editar Evento<a>
                        </div>
                    </div>
                    
                    
                    <?php endif ?>
                    <?php endif ?>
                    
                    
                    
                </div>
                <?php endif ?>
                
            </div>
        </div>
        
        
        
        <?php endforeach ?>
        <?php if(isset($_SESSION['userId']) ) : ?>
        <?php if($_SESSION['userStatus'] == 'admin') : ?>
            <div class="justify pb-5">
                
                <a href="eventos/add_evento.php" class="btn btn-success btn-xl ">Inserir Evento</a>
            </div>
        </div>
        <?php endif ?>
        <?php if($_SESSION['userStatus'] == 'user') : ?>
            <div class="justify pb-5">
                
                <a href="reservar/consultarReservas_eventos.php  " class="btn btn-success btn-xl ">Consultar as minhas reservas em eventos</a>
            </div>
        </div>
        <?php endif ?>
        <?php endif ?>
    </div>
    </section>
    
    

        <!-- Services section-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center  mt-0">Visite-nos</h2>
                <hr class="divider my-4" />
                <div class="row justify">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-warning mb-4"></i>
                            <h3 class="h4 mb-2">Eventos</h3>
                            <p class="text-muted mb-0">Os nossos eventos são muito conhecidos por Espinho e arredores!</p>
                        </div>
                    </div>
                 
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                        <i class="fas fa-4x fa-coffee text-warning mb-4"></i>
                            <h3 class="h4 mb-2">Excelente espaço</h3>
                            <p class="text-muted mb-0">Furnecemos o espaço perfeito para convivio</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

  </section>


        <!-- Call to action section-->
         <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">O que acha do  <span>Elevens Caffe</span>?</h2>
                <a class="btn btn-light btn-xl" href="opiniao\menuOpiniao.php">Dê-nos a sua opinião</a>
            </div>
        </section> 
        <?php require "./includes/showOpinions.php"?>
         <section class="page-section ">
             <div class="container">
                 <h2 class="text-center"><span> Algumas opiniões de clientes</span></h2>
                 <?php foreach($opinioes as $opiniao) :?>
                <?php if($opiniao['status'] == "aceito") : ?>
	
	<div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">


              
                    <img src="includes/showfile.php?user_id=<?php echo $opiniao['id_client'];?>" class="img img-rounded img-fluid"/>    



        	        <p class="text-secondary text-center"><?=$opiniao['dateTotal']?></p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left text-danger" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong><?=$opiniao['username']?></strong></a>
        

        	       </p>
        	       <div class="clearfix"></div>
        	        <p><?= $opiniao['opiniao']?></p>
                    <?php if(isset($_SESSION['userId']) ) : ?>
                <?php if($opiniao['id_client'] == $_SESSION['userId'] ) : ?>
            
                                
            <div class="container-fluid p-0">
<div class=" text-center ">

<a class="btn btn-warning text-white mt-4" name="submit-foto" href="eventos/editarEvento.php?id=<?= $evento['id'];?>" type="submit">Editar<a>
    </div>
</div>


<?php endif ?>

	        </div>
	        
	    </div>
    </div>
    
    <?php endif ?>
                </div>

         
    <?php endif ?>
    <?php endforeach ?>

</div>
        </section> 
        
        

        <!-- Contact section-->
        <section class="page-section " id="contact">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Deseja mais alguma coisa?</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Entre em contacto connosco!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+351 (91) 9999999</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i><a class="d-block" href="mailto:elevenscaffe11@gmail.com">elevenscaffe11@gmail.com</a>
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