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
                <h3 class="card-title">Data Pengembalian Buku
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
                    <th>Book id</th>
                    <th>Member ID</th>
                    <th>Denda</th>
                    <th>Status</th>
                  </thead>
                  <tbody>
                    <?php 
                    $i=0;
                    foreach($kembali as $kembali){ 
                         $i++;
                         ?>
                  <tr>
                  <td><?= $i ?></td> 
                    <td><?= $kembali->DateOfReturn; ?></td>
                    <td><?= $kembali->BookID; ?></td>
                    <td><?= $kembali->MemberID; ?></td>
                    <td><?= $kembali->Fine; ?></td>
                    <td><?= $kembali->Status; ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <th>#</th>
                    <th>Date of Return</th>
                    <th>Book id</th>
                    <th>Member ID</th>
                    <th>Denda</th>
                    <th>Status</th>
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