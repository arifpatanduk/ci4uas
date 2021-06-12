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

            <!-- home -->
            <li class="<?= ($active === 'home') ? 'active' : ''; ?>">
                <a class="nav-link" href="/"><i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <?php if (in_groups('member')) : ?>
                <li><a class="nav-link" href="<?= base_url('member/pinjam'); ?>"><i class="fas fa-table"></i> <span>Peminjaman</span></a></li>
            <?php endif; ?>

            <?php if (in_groups('admin')) : ?>
                <li class="menu-header">Peminjaman</li>
                <li><a class="nav-link" href="#"><i class="fas fa-briefcase"></i> <span>Peminjaman</span></a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-book-reader"></i> <span>History</span></a></li>
            <?php endif; ?>


            <?php if (in_groups('admin')) : ?>
                <li class="menu-header">User Management</li>
                <li><a class="nav-link" href="<?= base_url('admin/users'); ?>"><i class="fas fa-users"></i> <span>Users</span></a></li>
            <?php endif; ?>



            <?php if (in_groups('admin')) : ?>
                <li class="menu-header">Dokumen</li>
                <li class="nav-item dropdown <?= ($active === 'dokumen') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Dokumen</span></a>
                    <ul class="dropdown-menu">
                        <li <?php if ($active == "dokumen") {
                                echo "class='active'";
                            } ?>><a class="nav-link" href="/admin/dokumen"><span>Daftar Dokumen</span></a></li>
                        <li><a class="nav-link" href="#"></i> <span>Kategori</span></a></li>
                        <li><a class="nav-link" href="#"><span>Sub Kategori</span></a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <!-- logout / Login-->
            <?php if (logged_in()) : ?>
                <li><a class="nav-link" href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
            <?php else : ?>
                <div class="mb-4 p-3 hide-sidebar-mini">
                    <a href="<?= base_url('login'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split font-weight-bold">
                        <i class="fas fa-rocket"></i> Join Now
                    </a>
                </div>
            <?php endif; ?>

        </ul>
    </aside>
</div>