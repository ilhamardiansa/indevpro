 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
        <?php foreach($buku as $buku) { ?>
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?= $buku->Title; ?></h3>
              <div class="col-12">
                <img src="<?= base_url() ?>dist/public/s.jpg" height="50px" width="50px" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $buku->Title; ?></h3>
              <hr>

    <p class="card-text"> BY <?= $buku->Author; ?> </br><small class="text-muted"><?= $buku->Category; ?> | <?= $buku->Year; ?></small></p>

      <p> 
        Maximal pinjam : <?= $buku->DaysToLoan; ?> Hari</br>
        Status : <?= $buku->Status; ?>
</p>
      <p class="card-text"><small class="text-muted"><?= $buku->Publisher; ?></small></p>
              <a href="<?php $link = base_url('dashboard'); if(!$member){ echo"$link/verifikasi"; }elseif($member['status'] == 'pending'){ echo "$link";}elseif($buku->Status == 'ADA'){ $link = base_url("dashboard/prosespinjam/").$buku->ID; echo "$link"; }else{ echo '#'; } ?>" class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat  <?php if($buku->Status == 'ADA'){ echo ''; }else{ echo 'disabled'; } ?>">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                
                  PINJAM BUKU
                </div>
             

            </a>
          </div>
         
        </div>
        <?php } ?> 
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div>
</div>
    </section>
    <!-- /.content -->
  </div>