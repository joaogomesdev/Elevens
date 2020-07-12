

<?php

session_start();

if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}

setlocale(LC_ALL, 'pt_BR');
 

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Consultar Reservas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <!-- Font Awesome icons (free version)-->
       <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
       

       <!-- Google fonts-->
       <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
       <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
       <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

       <!-- Third party plugin CSS-->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
       
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
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      @import url('https://fonts.googleapis.com/css?family=Oswald');
*
{
  margin: 0;
  padding: 0;
  border: 0;
  box-sizing: border-box
}

body
{
  background-color: #dadde6;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
}

.fl-left{float: left}

.fl-right{float: right}

.container
{
  width: 90%;
  margin: 100px auto
}

h1
{
  text-transform: uppercase;
  font-weight: 900;
  border-left: 10px solid #fec500;
  padding-left: 10px;
  margin-bottom: 30px
}

.row{overflow: hidden}

.card
{
  display: table-row;
  width: 49%;
  background-color: #fff;
  color: #989898;
  margin-bottom: 10px;
  font-family: 'Oswald', sans-serif;
  border-radius: 4px;
  position: relative
}

.card + .card{margin-left: 2%}

.date
{
  display: table-cell;
  width: 25%;
  position: relative;
  text-align: center;
  border-right: 2px dashed #dadde6
}

.date:before,
.date:after
{
  content: "";
  display: block;
  width: 30px;
  height: 30px;
  background-color: #DADDE6;
  position: absolute;
  top: -15px ;
  right: -15px;
  z-index: 1;
  border-radius: 50%
}

.date:after
{
  top: auto;
  bottom: -15px
}

.date time
{
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%)
}

.date time span{
  display: block;
}

.date time span:first-child
{
  color: #2b2b2b;
  font-weight: 600;
  font-size: 250%
}

.date time span:last-child
{
  text-transform: uppercase;
  font-weight: 600;
  margin-top: -10px
}

.card-cont
{
  display: table-cell;
  width: 75%;
  font-size: 20px;
  padding: 10px 10px 30px 50px
}

.card-cont h3
{
  color: #3C3C3C;
  font-size: 130%;
  font-weight: bold;
}

.card-cont > div
{
  display: table-row
}
.card-cont .even-info {
  display: flex;
  flex-direction: column;
}
.card-cont .even-date i,
.card-cont .even-info i,
.card-cont .even-date time,
.card-cont .even-info p
{
  display: table-cell
}

.card-cont .even-date i,
.card-cont .even-info i
{
  padding: 5% 5% 0 0
}

.card-cont .even-info p
{
  font-size: 16px;
}

.card-cont .even-date time span
{
  display: flex;
  margin-bottom: 5px;
}

.card-cont a
{
  height: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  color: #fff;
  border-radius: 5px;
  position: absolute;
  right: 10px;
  bottom: 10px;
  font-size: 14px;
  font-weight: bold;
}

img {
  width: 40px;
  height: 40px;
  margin-right: 10px;
}





@media screen and (max-width: 860px)
{
  .card
  {
    display: block;
    float: none;
    width: 100%;
    margin-bottom: 10px
  }
  
  .card + .card{margin-left: 0}
  
  .card-cont .even-date,
  .card-cont .even-info
  {
    font-size: 75%
  }

  p {
    color: #fec500;
  }
}
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

section#events {
    padding-top: 20px;
    background: #666360;
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
.noWrap {
  flex-wrap: nowrap;
}
.line {
  display: flex;
  justify-content: center;
  align-items: center;
}
    </style>
  </head>

  <body>

  <?php include_once "navbar.php" ?>
  <?php include "../includes/see_data_eventos.php"?>

  <?php if( isset($_GET['registo']) && isset($_GET['registo']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

  Duvida colocada com sucesso     

</div>
<div class="alert alert-info" role="alert">

  Iremos Responder logo que possamos     

</div>
<?php endif ?>
  <?php if( isset($_GET['update']) && isset($_GET['update']) == 'success' ) : ?>

<div class="alert alert-success" role="alert">

  Duvida Eliminada com Sucesso    

</div>


<?php endif ?>

<h1>Eventos</h1>
<section  id="events">
			<div class="container">  
                <div class="titleSection">
                            <h1>Nossos eventos</h1>
                </div>
        <?php foreach($result as $evento) :?>
        
				<div class="row">
					<div class="col-md-12">
						<div class="mu-about-area">
							<!-- Start Feature Content -->
							<div class="row noWrap">
								<div class="col-md-6">
									<div class="mu-about-left">
                                    <img class="eventImg" src="../includes/showFotoEvento.php?id=<?= $evento['id'];?>" >
       </div>
								</div>
								<div class="col-md-6">
									<div class="mu-about-right">
                                        <h2><?=$evento['title']?></h2>
                                        <p class="mt-3 mb-3"><?=$evento['descricao']?></p>

                                        <div class="itemEvento">
                                        <img src="../assets\img\calendario.svg" width="60" height="60" alt="" >
                                            <p class="font-weight-bolder labelEvento"><strong>Data do evento: </strong> <span class="font-weight-bolder"><?= $evento['date'] ?></span></p>
                                        </div>

                                        <div class="mt-3 itemEvento">
                                        <img src="../assets/img/tempo.svg" width="60" height="60" alt="">
                                            <p class="font-weight-bolder labelEvento"> <strong>Hora do evento: </strong> <span class="font-weight-bolder"><?= $evento['time'] ?></span></p>
                                        </div>
									</div>
								</div>
                            </div>
							<!-- End Feature Content -->
                            <?php    if(isset($_SESSION['userId'])) : ?>
                            <?php if($_SESSION['userStatus'] == 'admin') : ?>
            
                               <div class="line">

                                 <div class="container-fluid p-0">
                                   <div class=" text-center ">
                                     
                                     <a class="btn btn-warning text-white mt-4" name="submit-foto" href="editarEvento.php?id=<?= $evento['id'];?>" type="submit">Editar Evento<a>
                                       </div>
                                      </div>
                                      
                                      
                                      <?php endif ?>
                                      <?php if($_SESSION['userStatus'] == 'admin') : ?>
                                        
                                        <?php if($evento['evento_status'] == 'ativo') : ?>
                                        <div class="container-fluid p-0">
                <div class=" text-center ">
                  <a class="btn btn-danger text-white mt-4" name="submit-foto" href="../includes/desativar_evento.php?id=<?= $evento['id'];?>&action=desativar" type="submit">Desativar<a>
                    </div>
                  </div>

                  <?php endif ?>

                  <?php if($evento['evento_status'] == 'desativo') : ?>
                                        <div class="container-fluid p-0">
                <div class=" text-center ">
                  <a class="btn btn-info text-white mt-4" name="submit-foto" href="../includes/desativar_evento.php?id=<?= $evento['id'];?>&action=ativar" type="submit">Ativar<a>
                    </div>
                  </div>

                  <?php endif ?>
                  
                </div>
                          
                            <?php endif ?>
                            <?php endif ?>

						</div>
					</div>
                </div>
                        
	

        <?php endforeach ?>
        
		</div>
        </section>
            
          

   


      

  </body>
</html>