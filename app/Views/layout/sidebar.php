<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url(); ?>">
                <img src="<?= base_url(); ?>/stisla/assets/img/stisla-fill.svg" alt="logo" width="35">
                SIMAD
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="<?= base_url(); ?>/stisla/assets/img/stisla-fill.svg" alt="logo" width="35">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <?php if (in_groups('admin')) : ?>
                <li class="menu-header">Peminjaman</li>
                <li><a class="nav-link" href="#"><i class="fas fa-briefcase"></i> <span>Peminjaman</span></a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-book-reader"></i> <span>History</span></a></li>
            <?php endif; ?>
            
            <?php if (in_groups('admin')) : ?>
            <li class="menu-header">Dokumen</li>
              <li class="nav-item dropdown <?php if ($active == "dokumen"){ echo "active"; } ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Dokumen</span></a>
                <ul class="dropdown-menu">
                    <li <?php if ($active == "dokumen"){ echo "class='active'"; } ?>><a class="nav-link" href="/admin/dokumen"><span>Daftar Dokumen</span></a></li>
                    <li><a class="nav-link" href="#"></i> <span>Kategori</span></a></li>
                    <li><a class="nav-link" href="#"><span>Sub Kategori</span></a></li>
                </ul>
              </li>
            <?php endif; ?>

            <li class="menu-header">Users</li>
                <!-- logout / Login-->
                <?php if (logged_in()) : ?>
                    <li><a class="nav-link" href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                <?php else : ?>
                    <li><a class="nav-link" href="<?= base_url('login'); ?>"><i class="fas fa-sign-in-alt"></i> <span>Login</span></a></li>
                <?php endif; ?>

        </ul>
    </aside>
</div>