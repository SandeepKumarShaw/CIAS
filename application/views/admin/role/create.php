<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create New Role</h1>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">        
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>role/addRoleSuc">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="role">Role:</label>
                        <div class="col-sm-10">
                          <input type="text" name="role" class="form-control" id="role" placeholder="Enter role">
                        </div>
                      </div> 
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Submit" name="submit" class="btn btn-default">
                        </div>
                      </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <?php $this->load->library('form_validation'); ?>
                        <?php //echo validation_errors(); ?>
                        <?php
                         $roleerror = form_error('role');
                         if ($roleerror) {?>                             
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $roleerror; ?>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>