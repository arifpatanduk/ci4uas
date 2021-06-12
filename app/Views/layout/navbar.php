<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </div>

    <ul class="navbar-nav navbar-right">


        <?php if (logged_in()) : ?>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="<?= base_url(); ?>/img/<?= user()->avatar; ?>" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block"><?= user()->username; ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= base_url('/user/profile'); ?>" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('logout'); ?>" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>

        <?php else : ?>
            <a href="<?= base_url('login'); ?>" class="nav-link nav-link-lg font-weight-bold">Login </a>
            <div class="font-weight-bold text-white">|</div>

            <a href="<?= base_url('register'); ?>" class="nav-link nav-link-lg font-weight-bold">Register</a>

        <?php endif; ?>


    </ul>
</nav>