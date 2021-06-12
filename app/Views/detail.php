<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Document</h1>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <table class="table ">
                    <tbody>
                        <tr>
                            <th>Judul</th>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati at sapiente laboriosam deserunt quas cupiditate. Rerum fuga magnam explicabo aspernatur laboriosam nostrum assumenda eum? Molestias porro expedita sint nisi consequuntur.</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <th>Tahun Publikasi</th>
                            <td>2015</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><span class="badge badge-sm badge-info">Skripsi</span></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Abstrak / Pendahuluan</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam minima sequi, tempora porro assumenda perferendis exercitationem. Vel ullam veniam aut odit praesentium, adipisci harum iure eum nulla placeat? Nulla, unde.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque veniam atque fugit! Omnis, veritatis neque? Quod ad inventore, hic minus ea eos magnam rem dolores illum, laudantium dignissimos maiores fugiat.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, quis? Asperiores dolores ullam labore dolore iusto! Quod facere praesentium aperiam eius esse unde similique quas perspiciatis magnam. Qui, voluptatibus officia?
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">
                                <a href="<?= base_url('user/doc'); ?>" class="btn btn-primary">Full Document</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>