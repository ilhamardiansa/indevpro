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
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                        <div class="input-group">
                            <input type="search" id="keyword" name="keyword" class="form-control form-control-lg" placeholder="Cari buku....">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </br>
            <div class="row justify-content-center">
            <div class="card-columns col-md-8">
            <?php foreach($buku as $buku) { ?>
  <div class="card">
    <img src="<?= base_url() ?>dist/public/s.jpg" height="300px" width="300px" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"> <?= $buku->Title; ?></h5>
      <p class="card-text"> BY <?= $buku->Author; ?> </br><small class="text-muted"><?= $buku->Category; ?> | <?= $buku->Year; ?></small></p>
      <p class="card-text"><small class="text-muted"><?= $buku->Publisher; ?></small></p>
      <a href="<?php echo '../dashboard/detail/'.$buku->ID ?>" class="btn btn-primary">CEK BUKU
      </a>
    </div>
  </div>
  <?php } ?> 
</div>
</div>

    </section>
    <!-- /.content -->
  </div>