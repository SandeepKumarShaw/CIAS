<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">            
            <h1 class="page-header">Role</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">        
        <?php $this->load->library('form_validation'); ?>
            <?php
             $success = $this->session->flashdata('success');
             if ($success) {?>                             
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $success; ?>
            </div>
            <?php } ?> 
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-10">
                            Role Listing Table
                        </div>
                        <div class="col-lg-2">
                            <a href="<?php echo base_url(); ?>role/addRole" class="btn btn-success"><i class="material-icons"></i> <span>Add New Role</span></a>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>                          
                            
                </div>                       
                
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>                             
                            <?php
                             $i=0;
                             if(!empty($roleListing)){
                                foreach ($roleListing as $roleListings) {$i++;?>
                                    <tr class="even gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $roleListings->role; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>editRole/<?php echo $roleListings->roleId; ?>" class="btn btn-info">EDIT</a>
                                            <a href="#" class="btn btn-danger">DELETE</a>
                                        </td>                                
                                    </tr>
                            <?php 
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>    