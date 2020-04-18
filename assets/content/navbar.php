<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
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
                                    <a class="btn btn-success"href="index.php">Autenticar</a>
                                    </li>';
                                }
                                else{
        
                                   
                                    echo  ' <li class="nav-item"><a class="btn btn-warning text-white pt-2 pb-2 nav-link js-scroll-trigger" href="#contact">'.$_SESSION['userName'].'</a></li>';

                                    echo  '<li class="nav-item"><a class="btn btn-primary pt-2 pb-2 pr-3 text-white ml-2 mr-6 nav-link js-scroll-trigger" href="logout.php">Sair</a></li>';
        
        
                                }
                          
                            ?>
         
                    </ul>
                </div>
            </div>
        </nav>