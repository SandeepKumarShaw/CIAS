<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Role</h1>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                 <?php foreach ($roleInfo as $roleInfos) {?>        
                    <form method="post" class="form-horizontal" action="<?php echo base_url() .'role/updateRole'; ?>">
                      <input type="hidden" value="<?php echo $roleInfos->roleId; ?>" name="roleId" id="roleId" />  
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Role:</label>
                        <div class="col-sm-10">
                          <input type="text" value="<?php echo $roleInfos->role;?>" class="form-control" id="email" placeholder="Enter email" name="role">
                        </div>
                      </div> 
                      <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Update" name="submit" class="btn btn-default">
                        </div>
                      </div>
                    </form>
                <?php } ?>    
                </div>
                <div class="col-lg-6">
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