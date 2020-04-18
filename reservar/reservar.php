<?php 
session_start();

?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
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
            
                    <h1>Deseja fazer uma reserva ?</h1>
                  
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                <form action="#" method="post">

<div class="form-row">
    <div class="form-group col-md">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"  value="">
    
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
            <label for="email">Data da reserva</label>
            <input type="date" class="form-control" id="data" name="data" placeholder=""  >
        
    
    </div>
    <div class="form-group col-md-4">
            <label for="email">Horas</label>
            <input type="time" class="form-control" id="data" name="data" placeholder=""  >
        
    
    </div>
    <div class="form-group col-md-4">
    <label>Categoria</label>
                      <select name="categoria" class="form-control">
                        <option>Horários</option>
                        <option>Menus</option>
                        <option>Atendimento</option>
                        <option>Eventos</option>
                        <option>Outro</option>
                      </select>
  
    </div>
</div>
<div class="form-row">

  <div class="form-group col-md-7">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="eamil" placeholder="E-mail de contacto"  >
  </div>
      <div class="form-group col-md-5">
              <label for="nome">Contacto Telefónico</label>
              <input type="number" class="form-control" id="tele" name="tele" placeholder="Contacto telefónico"  value="">
      
      </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
                      
            
    </div>
    <div class="form-group col-md-12">
            <label for="salario">Observações</label>
            <textarea name="descricao" class="form-control" rows="3"></textarea>
             
    </div>
</div>

<div class="row mt-5">
<div class="col-6">
 <a class="btn btn-lg btn-info btn-block" href="menu_duvida.php">Voltar</a>
 </div>

<div class="col-6">
<button class="btn btn-lg btn-outline-primary btn-block" name="colocar-duvida-submit" type="submit">Enviar Dúvida</button>
</div>






</form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>