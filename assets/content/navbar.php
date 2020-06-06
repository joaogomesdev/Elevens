<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Ellevens Caffé</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                   
                    <?php
                                if(!isset($_SESSION['userId'])){

                                    echo  '<li class="nav-item">
                                    <a class="btn btn-success"href="autenticar.php">Autenticar</a>
                                    </li>
                                    <li class="nav-item"><a class=" pt-2 pb-2 nav-link js-scroll-trigger" href="newsletter/index.php"><img src="assets\img\pequeno.png" ></a></li>
                                    ';
                                }
                                else{
        
                                    if(isset($_SESSION['userId']) &&  $_SESSION['userStatus'] == 'admin'){

                                        echo  ' <li class="nav-item"><a class="btn btn-secondary text-white pt-2 mr-2 pb-2 nav-link js-scroll-trigger" href="admin/index.php">Admin</a></li>';

                                    }
                                   
                                   
<<<<<<< HEAD
                                    echo  ' <li class="nav-item"><a class="btn btn-warning text-white pt-2 pb-2 nav-link js-scroll-trigger" href="profile.php">'.$_SESSION['fname'].'</a></li>';
                                    
                                    echo  '<li class="nav-item"><a class="btn btn-primary pt-2 pb-2 pr-3 text-white ml-2 mr-6 nav-link js-scroll-trigger" href="includes/logout.php">Sair</a></li>';
                                    
                                    echo '<li class="nav-item"><a class=" pt-2 pb-2 nav-link js-scroll-trigger" href="newsletter/index_sub.php"><img src="assets\img\pequeno.png" ></a></li>';
=======
                                    echo  ' <li class="nav-item"><a class="btn btn-warning text-white pt-2 pb-2 nav-link js-scroll-trigger" href="profile.php">'.$_SESSION['userName'].'</a></li>';
                                    
                                    echo  '<li class="nav-item"><a class="btn btn-primary pt-2 pb-2 pr-3 text-white ml-2 mr-6 nav-link js-scroll-trigger" href="includes/logout.php">Sair</a></li>';
                                    echo  ' <li class="nav-item"><a class=" pt-2 pb-2 nav-link js-scroll-trigger" href="newslatter"><img src="assets\img\pequeno.png" ></a></li>';
        
>>>>>>> 810a2f6492e6956709cb0754306c54b7b3306e0e
        
                                }
                          
                            ?>
         
                    </ul>
                </div>
            </div>
        </nav>