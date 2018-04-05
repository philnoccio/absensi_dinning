<?php $this->load->view('backend/header') ?>
<?php $this->load->view('backend/navbar') ?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Insert Mahasiswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo site_url('Dining/insert') ?>" method="post">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama_mah" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="text" name="nim" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Asrama</label>
                                            <select name="asrama" class="form-control">
                                            	<option>crystal</option>
                                            	<option>genset</option>
                                            	<option>guest house</option>
                                            	<option>jasmine</option>
                                            	<option>edelweiss</option>
                                            	<option>annex</option>
                                            	<option>bougenville</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fakultas</label>
                                            <input type="text" name="Fakultas" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control">
                                            	<option selected>Laki-laki</option>
                                            	<option>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                        <input type="submit" name="" value="Insert" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('backend/footer') ?>