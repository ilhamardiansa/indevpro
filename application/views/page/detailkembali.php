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
  <div class="card-body">
    <h4>DATA PENGEMBALIAN BUKU</h4>

    <p>
      BUKU ID : <?= $pinjam['BookID']?> </br>
      MEMBER / USER ID : <?= $pinjam['MemberID']?> / <?= $pinjam['UserID']?></br></br>
      DUE DATE : <?= $pinjam['DueDate']?> </br>
      DATE NOW: <?= date("y-m-d")?> </br></br>

      DENDA : Rp. <?php
      $t = date_create($pinjam['DueDate']);
      $n = date_create(date("y-m-d"));
      $a = date_diff($t,$n); 
      $hari = $a->format("%a");

      $buku = $this->db->get_where('databuku', ['ID' => $pinjam['BookID']])->row_array();
      $feedenda = $this->db->get_where('datadendalama', ['Days' => $buku['DaysToLoan']])->row_array();
      $denda = $hari * $feedenda['Fine'];

      if($t < $n){ echo "$denda"; }else{ echo "0"; }
       ?>


    </p>
    <a class="btn btn-primary" href="<?php echo base_url('page/konfirmasipengembalian/').$pinjam['id'] ?>" role="button">KONFIRMASI</a>
  </div>
</div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->