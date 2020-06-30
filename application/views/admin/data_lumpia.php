<div class="container-fluid">
<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_lumpia"><i class= "fas fa-plus fa-sm" ></i>Tambah Lumpia </button>
<table class=" table table-bordered">
<tr>
    <th>no</th>
    <th>nama lumpia</th>
    <th>keterangan</th>
    <th>kategori</th>
    <th>harga</th>
    <th>stok</th>
    <th colspand="3">aksi</th>
</tr>

<?php
$no=1; 
foreach($lumpia as $lmp) : ?>
<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $lmp->nama_lumpia ?></td>
    <td><?php echo $lmp->keterangan ?></td>
    <td><?php echo $lmp->kategori ?></td>
    <td><?php echo $lmp->harga ?></td>
    <td><?php echo $lmp->stok ?></td>
    <td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td>
    <td><?php echo anchor('admin/data_lumpia/edit/'.$lmp->id_lumpia,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
    <td><?php echo anchor('admin/data_lumpia/hapus/'.$lmp->id_lumpia,'<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>')?></td>
</tr>
<?php endforeach; ?>   
</table>

</div>
<!-- Modal -->
<div class="modal fade" id="tambah_lumpia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Lumpia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_lumpia/tambah_aksi'; ?>" method="post" enctype="multipart/form-data" >

        <div class="form-group">
            <label> Nama Lumpia</label>
            <input type="text" name="nama_lumpia" class="form-control">
        </div>
        <div class="form-group">
            <label> Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <div class="form-group">
            <label> Kategori</label>
            <select class="form-control" name="kategori">
              <option>Goreng</option>
              <option>Basah</option>
            </select>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>
        <div class="form-group">
            <label>stok</label>
            <input type="text" name="stok" class="form-control">
        </div>
        <div class="form-group">
            <label> Gambar</label><br>
            <input type="file" name="gambar" class="form-control">
        </div>
        

    
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>