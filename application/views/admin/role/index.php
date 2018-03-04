<div class="" id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">            
            <h1 class="page-header">Role</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">  
     <?php
           $message = $this->session->flashdata('item');
           if ($message) {?>
            <div class="<?php echo $message['class']; ?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message['message']; ?>
            </div>
       <?php } ?>
    
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-2">
                    <form action="" method="POST" id="searchList">
                      <div class="input-group">
                        <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                  </form>
                  </div>
                  <div class="col col-xs-10 text-right">
                    <a href="<?php echo base_url(); ?>role/addRole" class="btn btn-success btn-create"><i class="material-icons"></i> <span>Add New Role</span></a><br><br>
                    
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th class="text-center">Actions</th>
                        <th class="hidden-xs">SL</th>
                        <th>Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=$this->uri->segment(2);
                    if(!empty($roleListing)){
                    foreach ($roleListing as $roleListings) {$i++;?>                        
                      <tr>                      
                        
                        <td class="text-center">                            
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'role/editRole/'.$roleListings->roleId; ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                            <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url(); ?>" data-userid="2" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $roleListings->role; ?></td>
                      </tr>
                    <?php } } ?>
                          
                        </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                    <div class="row">
                      <div class="col col-xs-4">Page 1 of 5
                        <?php 
?>
                      </div>
                      <div class="col col-xs-8">
                        <?php  
/*echo '<pre>';
print_r($this->pagination->initialize());
echo '</pre>';
*/
                        echo $this->pagination->create_links();?>
                      </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>