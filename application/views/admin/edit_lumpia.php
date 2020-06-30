<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit Data Lumpia</h3>
    <?php foreach ($lumpia as $lmp) : ?>
         <form  method="post" action="<?php echo base_url().'admin/data_lumpia/update'?>" >

        <div class="form-group">
            <label> Nama Lumpia</label>
            <input type="text" name="nama_lumpia" class="form-control"
            value ="<?php echo $lmp->nama_lumpia ?>">
        </div>
        <div class="form-group">
            <label> Keterangan</label>
            <input type="hidden" name="id_lumpia" class="form-control"
            value ="<?php echo $lmp->id_lumpia ?>">
            <input type="text" name="keterangan" class="form-control"
            value ="<?php echo $lmp->keterangan ?>">
        </div>
        <div class="form-group">
            <label> Kategori</label>
            <input type="text" name="kategori" class="form-control"
            value ="<?php echo $lmp->kategori ?>">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control"
            value ="<?php echo $lmp->harga ?>">
        </div>
        <div class="form-group">
            <label>stok</label>
            <input type="text" name="stok" class="form-control"
            value ="<?php echo $lmp->stok ?>">
        </div>
        
         
      </div>
      
        <button type="submit" class="btn btn-primary btn-sm ml-3">Save changes</button>
    
      </form>

    <?php endforeach;?>
</div>