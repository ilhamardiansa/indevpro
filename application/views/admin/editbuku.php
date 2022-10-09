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
                <div class="card-body">
                    <?php foreach($buku as $buku){ ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $buku->Title; ?>">
                  </div>
                  <?= form_error('title'); ?>
                  <div class="form-group">
                  <label>author</label>
                  <select class="form-control select2 select2-danger" id="author" name="author" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="<?= $buku->Author; ?>" selected><?= $buku->Author; ?></option>
                <?php 
                    foreach($author as $author){ 
                         ?>
                  <option value="<?= $author->Author; ?>"><?= $author->Author; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('author'); ?>
                <div class="form-group">
                  <label>publisher</label>
                  <select class="form-control select2 select2-danger" id="publisher" name="publisher" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="<?= $buku->Publisher; ?>" selected><?= $buku->Publisher; ?></option>
                 <?php 
                    foreach($publisher as $publisher){ 
                         ?>
                  <option value="<?= $publisher->Publisher; ?>"><?= $publisher->Publisher; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('publisher'); ?>
                <div class="form-group">
                  <label>category</label>
                  <select class="form-control select2 select2-danger" id="category" name="category" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="<?= $buku->Category; ?>" selected><?= $buku->Category; ?></option>
                  <?php 
                    foreach($category as $category){ 
                         ?>
                  <option value="<?= $category->Category; ?>"><?= $category->Category; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('category'); ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">year</label>
                    <input type="text" class="form-control" id="year" name="year" value="<?= $buku->Year; ?>">
                  </div>
                  <?= form_error('year'); ?>
                  <div class="form-group">
                  <label>allowing to loan</label>
                  <select class="form-control select2 select2-danger" id="allow" name="allow" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="Y">YES</option>
                  <option value="T">TIDAK
                  </option>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('allow'); ?>
                <div class="form-group">
                  <label>days to loan</label>
                  <select class="form-control select2 select2-danger" id="days" name="days" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="<?= $buku->DaysToLoan; ?>" selected><?= $buku->DaysToLoan; ?> Hari</option>
                  <option value="4">4 Hari
                  </option>
                  <option value="7">7 Hari
                  </option>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('days'); ?>
                <div class="form-group">
                  <label>status</label>
                  <select class="form-control select2 select2-danger" id="status" name="status" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="<?= $buku->Status; ?>" selected><?= $buku->Status; ?></option>
                  <option value="ADA">ADA
                  </option>
                  <option value="KELUAR">KELUAR
                  </option>
                  <option value="RUSAK">RUSAK
                  </option>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('status'); ?>
                <div class="form-group">
                  <label>tipe buku
                  </label>
                  <select class="form-control select2 select2-danger" id="tipe" name="tipe" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="<?= $buku->Type; ?>" selected><?= $buku->Type; ?></option>
                 <?php 
                    foreach($type as $type){ 
                         ?>
                  <option value="<?= $type->TypeID; ?>"><?= $type->Type; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('tipe'); ?>
                <div class="form-group">
                  <label>kondisi
                  </label>
                  <select class="form-control select2 select2-danger" id="kondisi" name="kondisi" data-dropdown-css-class="select2-danger" style="width: 100%;">
                  <option value="<?= $buku->Condition; ?>" selected><?= $buku->Condition; ?></option>
                 <?php 
                    foreach($kondisi as $kondisi){ 
                         ?>
                  <option value="<?= $kondisi->Condition; ?>"><?= $kondisi->Condition; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <!-- /.form-group -->
                <?= form_error('kondisi'); ?>
                <?php } ?>
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