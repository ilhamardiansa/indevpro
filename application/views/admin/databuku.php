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
                <h3 class="card-title">Data Buku
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-success" href="tambahbuku" role="button">Tambah Data</a><br>
              <br>
              <?= $this->session->flashdata('message') ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>id</th>
                    <th>title</th>
                    <th>author</th>
                    <th>Publisher</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>allowing to loan</th>
                    <th>days to loan</th>
                    <th>status</th>
                    <th>type</th>
                    <th>condition</th>
                    <th>aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=0;
                    foreach($buku as $buku){ 
                         $i++;
                         ?>
                  <tr>
                  <td><?= $i ?></td> 
                    <td><?= $buku->Title; ?></td>
                    <td><?= $buku->Author; ?></td>
                    <td><?= $buku->Publisher; ?></td>
                    <td><?= $buku->Category; ?></td>
                    <td><?= $buku->Year; ?></td>
                    <td><?= $buku->AllowingToLoan; ?></td>
                    <td><?= $buku->DaysToLoan; ?></td>
                    <td><?= $buku->Status; ?></td>
                    <td><?= $buku->Type; ?></td>
                    <td><?= $buku->Condition; ?></td>
                    <td><h6><a href="<?php echo 'editbuku/'.$buku->ID ?>" class="badge badge-warning" style="color:white;">Edit</a> 
                    <a href="<?php echo 'deletebuku/'.$buku->ID ?>" class="badge badge-danger">Delete</a></h6></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>id</th>
                    <th>title</th>
                    <th>author</th>
                    <th>Publisher</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>allowingtoloan</th>
                    <th>daystoloan</th>
                    <th>status</th>
                    <th>type</th>
                    <th>condition</th>
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