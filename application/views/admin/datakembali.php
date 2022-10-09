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
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    PENGEMBALIAN PENDING
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Date of Return</th>
                    <th>Member id</th>
                    <th>Book id</th>
                    <th>User id</th>
                    <th>Denda</th>
                    <th>Status</th>
                     <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  foreach($kembalis as $kembalis){
                    $i++;
                     ?>
                    <tr>
                      <td><?= $i; ?></td>
                    <td><?= $kembalis->DateOfReturn; ?></td>
                    <td><?= $kembalis->MemberID; ?></td>
                    <td><?= $kembalis->BookID; ?></td>
                    <td><?= $kembalis->UserID; ?></td>
                    <td><?= $kembalis->Fine; ?></td>
                    <td><?= $kembalis->Status; ?></td>
                    <td><h6><a href="<?php echo 'cancelkembali/'.$kembalis->id ?>" class="badge badge-danger" style="color:white;">Cancel</a> 
                    <a href="<?php echo 'konfirkembali/'.$kembalis->id ?>" class="badge badge-success">Konfirmasi</a></h6></td>
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
                <h3 class="card-title">Data Pinjam
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <br>
              <?= $this->session->flashdata('message') ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Date of Return</th>
                    <th>Member id</th>
                    <th>Book id</th>
                    <th>User id</th>
                    <th>Denda</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  $i=0;
                    foreach($kembali as $kembali){
                        $i++ ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $kembali->DateOfReturn; ?></td>
                    <td><?= $kembali->MemberID; ?></td>
                    <td><?= $kembali->BookID; ?></td>
                    <td><?= $kembali->UserID; ?></td>
                    <td><?= $kembali->Fine; ?></td>
                    <td><?= $kembali->Status; ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>#</th>
                    <th>Date of Return</th>
                    <th>Member id</th>
                    <th>Book id</th>
                    <th>User id</th>
                    <th>Denda</th>
                    <th>Status</th>
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