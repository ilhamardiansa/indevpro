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
                <h3 class="card-title">Data Pinjam Buku
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
                    <th>Book id</th>
                    <th>Days</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=0;
                    foreach($pinjam as $pinjam){ 
                         $i++;
                         ?>
                  <tr>
                  <td><?= $i ?></td> 
                    <td><?= $pinjam->DateOfLoan; ?></td>
                    <td><?= $pinjam->BookID; ?></td>
                    <td><?= $pinjam->Days; ?></td>
                    <td><?= $pinjam->DueDate; ?></td>
                    <td><?= $pinjam->Status; ?></td> 
                      <?php $link = base_url('page/detailpengembalian/'.$pinjam->id ); $link2 = base_url('page/histori'); if($pinjam->Status == 'terkonfirmasi'){ echo '<td><a href="'.$link.'" class="badge badge-success" style="color:white;">Kembalikan</a> </td> '; }else{ echo ""; }?>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Date of loan</th>
                    <th>Book id</th>
                    <th>Days</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th></th>
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