<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Document</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Infografis</div>
            </div>
        </div>

        <div class="section-body">        

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="diagram"></div>

                            <?php
                                $kat[] = "'" . $list->jenis . "'";
                                $jml[] = $list->id_sub_kategori;
                            ?>

                            <script>
                            Highcharts.chart('diagram', {
                                chart: {
                                type: 'column'
                                },
                                title: {
                                text: 'Kategori buku'
                                },
                                subtitle: {
                                text: 'Kategori buku yang dipinjam'
                                },

                                xAxis: {
                                categories: [<?php echo join($kat, ',') ?>],
                                title: {
                                    text: null
                                }
                                },

                                yAxis: {
                                min: 0,
                                title: {
                                    text: 'Jumlah'
                                }
                                },
                                legend: {
                                enabled: false
                                },
                                tooltip: {
                                pointFormat: 'Jumlah peminjam:  <b>{point.y} buah</b>'
                                },

                                series: [{
                                name: 'Jumlah pengembalian',
                                data: [<?php echo join($jml, ',') ?>]
                                }],

                            });
                            </script>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Doughnut Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pie Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</div>

<?= $this->endSection(); ?>