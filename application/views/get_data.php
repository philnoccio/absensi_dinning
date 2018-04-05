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
											<th>User ID</th>
											<th>Tanggal & jam</th>
											<th>Verifikasi</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>                     	
										<?php for($i = 0; $i < count($buffer)-2; $i++){ ?>
										<tr>
											<?php 
											$data = Parse_Data($buffer[$i], "<Row>", "</Row>");
											$PIN = Parse_Data($data, "<PIN>", "</PIN>");
											$DateTime = Parse_Data($data, "<DateTime>", "</DateTime>");
											$Verified = Parse_Data($data, "<Verified>", "</Verified>");
											$Status = Parse_Data($data, "<Status>", "</Status>") ?>
											<td><?php echo $PIN ?></td>
											<td><?php echo $DateTime ?></td>
											<td><?php echo $Verified ?></td>
											<td><?php echo $Status ?></td>
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
		<form action="<?php echo site_url('Dining/uploadtodatabase') ?>" method="post">
			<input type="hidden" name="ip" value="<?php echo $ip ?>"></input>
			<input type="hidden" name="key" value="<?php echo $key ?>"></input>
			<input type="submit" value="Upload to Database"></input>
		</form>
<?php $this->load->view('backend/footer') ?>