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
                <h3 class="card-title">EDIT DATA</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
              <?php foreach($user as $user){ ?>
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user->Name; ?>">
                  </div>
                  <?= form_error('name'); ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password
                    </label>
                    <input type="text" id="password" name="password" class="form-control" value="<?= $user->Password; ?>">
                  </div>
                  <?= form_error('password'); ?>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Role
                  </label>
                  <select class="custom-select rounded-0" id="role" name="role">
                    <option value="2">member</option>
                    <option value="1">admin</option>
                  </select>
                </div>
                <?= form_error('role'); ?>
                </div>
                <!-- /.card-body -->
                <?php } ?>
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