<?php $this->load->view('backend/header') ?>
<?php $this->load->view('backend/navbar') ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Insert IP and Key</h1>
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
                                    <form role="form" action="<?php echo site_url('Dining/menu') ?>" method="post">
                                        <div class="form-group">
                                            <label>IP</label>
                                            <input type="text" name="ip" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Key</label>
                                            <input type="text" name="key" class="form-control">
                                        </div>
                                        <input type="submit" value="Enter">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('backend/footer') ?>