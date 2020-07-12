

<?php

session_start();

$id_reserva=$_GET['id'];
if(!isset($_SESSION['userId'])){

  header("Location: ../autenticar.php?acesso=negado");
  exit();
}

require '../includes/db.inc.php';

$id = $_GET['id'];

$sql = "SELECT * FROM eventos WHERE id=$id";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows($result);




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

form img {
  width: 100%;
  height: 500px;
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

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
            
                    <h1>Edição de Evento <span class="badge badge-danger">!</span></h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                <?php foreach($result as $row) : ?>
                  <form action="../includes/update_data_eventos.php?id=<?= $row['id'];?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
                      <label>Foto</label>
                      <img class="eventImg" src="../includes/showFotoEvento.php?id=<?= $row['id'];?>" >

                        <div class="custom-file">
                              <input type="file" name="foto" id="foto"/>
                        </div>
                    </div>
                    <div class="form-group" >
                      <label>Título</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Título" value="<?= $row['title'];?>">
                    </div>
                    <div class="form-group" >
                    <div class="row ">
                      <div class="col-6">
                      <label>Data</label>
                      <input name="date" type="text" class="form-control" placeholder="Data" value="<?= $row['data'];?>">
                    
                    </div>
                      <div class="col-6">
                      <label>Hora</label>
                      <input name="hora" type="text" class="form-control" placeholder="Hora" value="<?= $row['hora'];?>">
                      
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                      <label>Descrição</label>
                      <input name="descricao" type="text" class="form-control" placeholder="Título" value="<?= $row['descricao'];?>">
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-success btn-block" href="menu_eventos.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-outline-info btn-block" name="editar-evento" type="submit">Editar Evento</button>
                      </div>
                    </div>
                  </form>
                  <?php endforeach ?>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>