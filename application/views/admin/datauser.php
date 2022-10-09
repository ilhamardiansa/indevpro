<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Users
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-success" href="tambahuser" role="button">Tambah Data</a><br>
              <br>
              <?= $this->session->flashdata('message') ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>user id</th>
                    <th>name</th>
                    <th>password</th>
                    <th>role</th>
                    <th>aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($user as $user){ ?>
                  <tr>
                    <td><?= $user->UserID; ?></td>
                    <td><?= $user->Name; ?></td>
                    <td><?= $user->Password; ?></td>
                    <td><?php if($user->role == 1){ echo 'Admin'; }else{ echo 'Member'; }  ?></td>
                    <td><h6><a href="<?php echo 'edituser/'.$user->UserID ?>" class="badge badge-warning" style="color:white;">Edit</a> 
                    <a href="<?php echo 'deleteuser/'.$user->UserID ?>" class="badge badge-danger">Delete</a></h6></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>userid</th>
                    <th>name</th>
                    <th>password</th>
                    <th>role</th>
                    <th>aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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