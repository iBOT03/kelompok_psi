<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?= base_url();?>assets/user/img/navbar-logo.svg" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                        <?php if($_SESSION['email'] != $user['nama_pembeli']) : ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('user/Auth')?>">Login</a></li>
                        <?php  else : ?>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url('user/Auth')?>"><?= $this->session->userdata('nama_pembeli'); ?></a></li>
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
        </nav>