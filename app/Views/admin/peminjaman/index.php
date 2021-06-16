<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Home</a></div>
                <div class="breadcrumb-item">Peminjaman</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Daftar Peminjaman</h4>
            </div>
            <div class="card-body p-2">
                <div id="viewdata"></div>
            </div>
        </div>

    </section>
</div>

<script>
    function tampilkan() {
        $.ajax({
            url: "<?= base_url('/admin/peminjaman/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        tampilkan();
    });
</script>


<?= $this->endSection(); ?>