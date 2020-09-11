<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

//form open
echo form_open(base_url('admin/produk/edit/'.$produk->id_produk),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Produk</label>
  <div class="col-md-5">
    <input type="text" name="nama" class="form-control" placeholder="Nama Produk" value="<?php echo $produk->nama ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Email</label>
  <div class="col-md-5">
    <input type="email" name="email" class="form-control" placeholder="Email Pengguna" value="<?php echo $produk->email ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Produkname</label>
  <div class="col-md-5">
    <input type="text" name="produkname" class="form-control" placeholder="Produkname" value="<?php echo $produk->produkname ?>" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $produk->password ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Level Hak Akses</label>
  <div class="col-md-5">
    <select name="akses_level" class="form-control">
    	<option value="Admin">Admin</option>
    	<option value="Produk" <?php if($produk->akses_level=="Produk") { echo "selected"; } ?>>Produk</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
    	<i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset">
    	<i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>