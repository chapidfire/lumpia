<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents())
                {
                    foreach ($keranjang as $item)
                    {
                        $grand_total =$grand_total + $item['subtotal'];
                    }
                echo "<h4>Total Belanja Anda : Rp." .number_format($grand_total,0,',','.');

                ?>
            </div><br><br>
            <h3>Input Alamat Pengiriman Dan Pembayaran</h3>
            <form method="post" action="<?php echo base_url('dashboard/proses_pesanan') ?>">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
 
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="Alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control">
                        <option> Gosend </option>
                        <option> Grab </option>
                        <option> JNE </option>
                        <option> TIKI </option>
                    </select>
                </div> 
                <div class="form-group">
                    <label>Pilih Bank</label>
                    <select class="form-control">
                        <option> BCA - 1234567</option>
                        <option> BRI - 1234567</option>
                        <option> BNI - 1234567</option>
                        <option> MANDIRI -1234567</option>
                    </select>
                </div> 

                <button type="submit" class="btn btn-sm btn-primary mb-3">PESAN</button>
        
        </form>
        <?php
        }else{
            echo "<h5>keranjang Belanja Anda Masih Kosong";
        }
        ?>
        </div>
        <div class="col-md-2"></div>

    </div>
</div>