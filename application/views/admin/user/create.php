<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create New User</h1>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">        
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>role/addUserSuc">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputmobile" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="mobile" id="inputmobile" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Role</label>
                              <div class="col-sm-10">
                                 <select class="form-control selectpicker" name="role">
                                    <option selected>Choose...</option>
                                    <?php foreach ($roleListing as $roleListings) {?>
                                    <option value="<?php echo $roleListings->role; ?>"><?php echo $roleListings->role; ?></option>
                                    <?php } ?>                                    
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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