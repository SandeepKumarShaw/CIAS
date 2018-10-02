<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Listing</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-10">
                            User Listing Table
                        </div>
                        <div class="col-lg-2">
                            <a href="<?php echo base_url();?>user/addUser" class="btn btn-success"><i class="material-icons"></i> <span>Add New User</span></a>
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
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr class="odd gradeX">
                                <td>1</td>
                                <td>Internet Explorer 4.0</td>
                                <td>
                                    <a href="#" class="btn btn-info">EDIT</a>
                                    <a href="#" class="btn btn-danger">DELETE</a>
                                </td>                                
                            </tr>
                            <tr class="even gradeC">
                                <td>2</td>
                                <td>Internet Explorer 5.0</td>
                                <td>
                                    <a href="#" class="btn btn-info">EDIT</a>
                                    <a href="#" class="btn btn-danger">DELETE</a>
                                </td>                                
                            </tr>
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