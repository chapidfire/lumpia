<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('kategori/basah') ?>">LUMPIA BASAH</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('kategori/goreng') ?>">LUMPIA GORENG</a>
        </li>

    </ul>

    <div class="row text-center mt-3">

        <?php foreach ($lumpia as $lmp) : ?>

            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="<?php echo base_url() . '/uploads/' . $lmp->gambar ?> " class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $lmp->nama_lumpia ?></h5>
                    <small><?php echo $lmp->keterangan ?></small><br>
                    <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($lmp->harga, 0, ',', '.')  ?></span>
                    <?php echo anchor('dashboard/tambah_ke_keranjang/' . $lmp->id_lumpia, '<div  class="btn btn-sm btn-primary"> Tambah Ke Keranjang </div>') ?>
                    <?php echo anchor('dashboard/detail/' . $lmp->id_lumpia, '<div  class="btn btn-sm btn-success"> Detail </div>') ?>
                </div>
            </div>


        <?php endforeach; ?>
    </div>


</div>