<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Infografis</h1>
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
                            <h4>Jumlah Dokumen</h4>
                        </div>
                        <div class="card-body">
                            <div id="diagram"></div>
                            
                            <script>
                            Highcharts.chart('diagram', {
                                chart: {
                                type: 'column'
                                },
                                title: {
                                text: 'Dokumen'
                                },
                                subtitle: {
                                text: 'Jumlah dokumen per kategori'
                                },

                                xAxis: {
                                    categories: [
                                        <?php
                                        foreach ($list as $item) {

                                                echo "'". $item['jenis'] ."'", ',';
                                            }
                                        ?>
                                        ],
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
                                pointFormat: 'Jumlah :  <b>{point.y} buah</b>'
                                },

                                series: [{
                                    name: 'Jumlah ',
                                    data: [
                                        <?php
                                            foreach ($list as $item)
                                            {
                                                echo $item['id_sub_kategori'], ',';
                                            }
                                        ?>
                                        ]
                                }],

                            });
                            </script>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Dokumen Terpinjam</h4>
                        </div>
                        <div class="card-body">
                            <div id="diagram_pinjam"></div>
                            
                            <script>
                            Highcharts.chart('diagram_pinjam', {
                                chart: {
                                type: 'column'
                                },
                                title: {
                                text: 'Dokumen Terpinjam'
                                },
                                subtitle: {
                                text: 'Jumlah dokumen terpinjam per kategori'
                                },

                                xAxis: {
                                    categories: [
                                        <?php
                                        foreach ($list2 as $item) {

                                                echo "'". $item['jenis'] ."'", ',';
                                            }
                                        ?>
                                        ],
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
                                pointFormat: 'Jumlah :  <b>{point.y} buah</b>'
                                },

                                series: [{
                                    name: 'Jumlah ',
                                    data: [
                                        <?php
                                            foreach ($list2 as $item)
                                            {
                                                echo $item['id_sub_kategori'], ',';
                                            }
                                        ?>
                                        ]
                                }],

                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </section>


</div>

<?= $this->endSection(); ?>