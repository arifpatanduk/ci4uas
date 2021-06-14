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

            <!-- Peminajaman Member -->
            <?php if (in_groups('member')) : ?>
                <li class="<?= ($active === 'peminjaman') ? 'active' : ''; ?>">
                    <a class="nav-link " href="<?= base_url('user/peminjaman'); ?>"><i class="fas fa-table"></i> <span>Peminjaman</span></a>
                </li>
            <?php endif; ?>


            <?php if (in_groups('admin')) : ?>
                <!-- infografis -->
                <li class="<?= ($active === 'infografis') ? 'active' : ''; ?>">
                    <a class="nav-link " href="<?= base_url('admin/infografis'); ?>"><i class="fas fa-chart-pie"></i> <span>Infografis</span></a>
                </li>


                <!-- peminjaman -->
                <li class="menu-header">Peminjaman</li>
                <li class="<?= ($active === 'peminjaman') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('admin/peminjaman'); ?>"><i class="fas fa-briefcase"></i> <span>Peminjaman</span></a>
                </li>

                <li><a class="nav-link" href="#"><i class="fas fa-book-reader"></i> <span>History</span></a></li>


                <!-- user management -->
                <li class="menu-header">User Management</li>
                <li class="<?= ($active === 'users') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('admin/users'); ?>"><i class="fas fa-users"></i> <span>Users</span></a>
                </li>


                <!-- dokumen management -->
                <li class="menu-header">Dokumen</li>
                <li class="nav-item dropdown <?= ($active === 'dokumen') || ($active === 'kategori') || ($active === 'subkategori') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Dokumen</span></a>
                    <ul class="dropdown-menu">
                        <li <?php if ($active == "dokumen") {
                                echo "class='active'";
                            } ?>><a class="nav-link" href="/admin/dokumen"><span>Daftar Dokumen</span></a></li>
                        <li <?php if ($active == "kategori") {
                                echo "class='active'";
                            } ?>><a class="nav-link" href="/admin/kategori"></i> <span>Kategori</span></a></li>
                        <li <?php if ($active == "subkategori") {
                                echo "class='active'";
                            } ?>><a class="nav-link" href="/admin/subkategori"><span>Sub Kategori</span></a></li>
                    </ul>
                </li>
            <?php endif; ?>



            <!-- logout / Login-->
            <?php if (logged_in()) : ?>
                <hr>
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