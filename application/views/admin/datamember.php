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
<div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    MEMBER PENDING
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>member id</th>
                    <th>name</th>
                    <th>address</th>
                    <th>hp</th>
                    <th>date</th>
                    <th>aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  foreach($members as $members){
                    $i++;
                     ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $members->MemberID; ?></td>
                      <td><?= $members->Name; ?></td>
                    <td><?= $members->Address; ?></td>
                    <td><?= $members->HP; ?></td>
                    <td><?= $members->Date; ?></td>
                      <td><h6><a href="<?php echo 'deletemembers/'.$members->MemberID ?>" class="badge badge-danger" style="color:white;">Cancel</a> 
                    <a href="<?php echo 'konfirmembers/'.$members->MemberID ?>" class="badge badge-success">Konfirmasi</a></h6></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            </div>
            <!-- /.card -->
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
                    <th>member id</th>
                    <th>name</th>
                    <th>address</th>
                    <th>hp</th>
                    <th>date</th>
                    <th>max loan</th>
                    <th>status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($member as $member){ ?>
                  <tr>
                    <td><?= $member->MemberID; ?></td>
                    <td><?= $member->Name; ?></td>
                    <td><?= $member->Address; ?></td>
                    <td><?= $member->HP; ?></td>
                    <td><?= $member->Date; ?></td>
                    <td><?= $member->MaxLoan; ?></td>
                    <td><?= $member->status; ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>member id</th>
                    <th>name</th>
                    <th>address</th>
                    <th>hp</th>
                    <th>date</th>
                    <th>max loan</th>
                    <th>status</th>
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