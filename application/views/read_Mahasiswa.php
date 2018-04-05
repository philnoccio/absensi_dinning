<?php $this->load->view('backend/header') ?>
<?php $this->load->view('backend/navbar') ?>
 <div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mahasiswa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Asrama</th>
                                            <th>Fakultas</th>
                                            <th>Gender</th>
                                            <th>Tanggal Input</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($mahasiswa as $m){ ?>
                                        <tr>
                                        	<td><?php echo $m->id_mah ?></td>
                                            <td><?php echo $m->nama_mah ?></td>
                                        	<td><?php echo $m->nim ?></td>
                                        	<td><?php echo $m->asrama ?></td>
                                        	<td><?php echo $m->fakultas ?></td>
                                        	<td><?php echo $m->gender ?></td>
                                        	<td><?php echo $m->tgl_input_mah ?></td>
                                        	<td><img src="<?php echo base_url() ?>assets/images/<?php echo $m->foto ?>"></td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
<?php $this->load->view('backend/footer') ?>