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
                    PINJAMAN PENDING
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Date of loan</th>
                    <th>Member id</th>
                    <th>Book id</th>
                    <th>User id</th>
                    <th>Days</th>
                    <th>Due Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;
                  foreach($pinjams as $pinjams){
                    $i++;
                     ?>
                    <tr>
                      <td><?= $i; ?></td>
                    <td><?= $pinjams->DateOfLoan; ?></td>
                    <td><?= $pinjams->MemberID; ?></td>
                    <td><?= $pinjams->BookID; ?></td>
                    <td><?= $pinjams->UserID; ?></td>
                    <td><?= $pinjams->Days; ?></td>
                    <td><?= $pinjams->DueDate; ?></td>
                    <td><?= $pinjams->Status; ?></td>
                      <td><h6><a href="<?php echo 'cancelpinjam/'.$pinjams->id ?>" class="badge badge-danger" style="color:white;">Cancel</a> 
                    <a href="<?php echo 'konfirpinjam/'.$pinjams->id ?>" class="badge badge-success">Konfirmasi</a></h6></td>
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
                    <th>Date of loan</th>
                    <th>Member id</th>
                    <th>Book id</th>
                    <th>User id</th>
                    <th>Days</th>
                    <th>Due Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  $i=0;
                    foreach($pinjam as $pinjam){
                        $i++ ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $pinjam->DateOfLoan; ?></td>
                    <td><?= $pinjam->MemberID; ?></td>
                    <td><?= $pinjam->BookID; ?></td>
                    <td><?= $pinjam->UserID; ?></td>
                    <td><?= $pinjam->Days; ?></td>
                    <td><?= $pinjam->DueDate; ?></td>
                    <td><?= $pinjam->Status; ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Date of loan</th>
                    <th>Member id</th>
                    <th>Book id</th>
                    <th>User id</th>
                    <th>Days</th>
                    <th>Due Date</th>
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