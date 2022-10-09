<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">VERIFIKASI MEMBER            </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                  </div>
                  <?= form_error('name'); ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="address">
                  </div>
                  <?= form_error('address'); ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">hp</label>
                    <input type="number" class="form-control" id="hp" name="hp" placeholder="no hp">
                  </div>
                  <?= form_error('hp'); ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->