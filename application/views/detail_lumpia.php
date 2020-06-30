<div class="container-fluid">

    <div class="card">
    <h5 class="card-header">Detail Lumpia</h5>
    <div class="card-body">
    <?php foreach($lumpia as $lmp) : ?>
    <div class="row">
            <div class="col-md-4"> 
            <img src="<?php echo base_url().'/uploads/'.$lmp->gambar ?> " class="card-img-top" alt="...">
            </div> 
            <div class="col-md-8"> 
            <table class="table ">
                <tr>
                    <td>Nama Lumpia</td>
                    <td><strong><?php echo $lmp->nama_lumpia?></strong></td>
                
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><strong><?php echo $lmp->keterangan?></strong></td>
                
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><strong><?php echo $lmp->kategori?></strong></td>
                
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><strong><?php echo $lmp->stok?></strong></td>
                
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><strong><div class="btn btn-sm btn-success">Rp.<?php echo number_format($lmp->harga,0,',','.')?></div></strong></td>
                
                </tr>
            
            </table>
            <?php echo anchor ('dashboard/tambah_ke_keranjang/'.$lmp->id_lumpia, '<div  class="btn btn-sm btn-primary"> Tambah Ke Keranjang </div>' )?>
            <?php echo anchor ('dashboard/index/', '<div  class="btn btn-sm btn-danger"> Kembali </div>' )?>
            </div>   
    </div>

<?php endforeach; ?>        
    </div>
    </div>
</div>