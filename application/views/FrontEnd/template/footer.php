 <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/FrontEnd/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/FrontEnd/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>


    <script type="text/javascript"> 
    var baseUrl = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript">
    $(document).ready(function($){

    show_contact(); //call function show all contact        
         
        //function show all contact
        function show_contact(){
            $.ajax({
                type  : 'GET',
                
                url: baseUrl + 'HomeController/getData',
                dataType : 'JSON',
                success : function(data){
                    
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].fname+'</td>'+
                                '<td>'+data[i].lname+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    //alert(html);
                    $('#show_data').html(html);
                }
 
            });
        }
    $(document).on('click','.item_delete', function(){
       var contact_id = $(this).data('id');
       $.ajax({
            type : "POST",
            url: baseUrl + 'HomeController/delete',
            dataType : "JSON",
            data : {contact_id:contact_id},
            success: function(data){
                                show_contact();

                //$('.messages').html(data).fadeIn('slow').delay(3000).fadeOut('slow');
            }
        });
    });    




    $("#submit_btn").click(function(){
        var fname = $('#form_name').val();
        var lname = $('#form_lastname').val();
        var email = $('#form_email').val();
        var need  = $('#form_need').val();
        var message = $('#form_message').val();
    //if it's all right we proceed
    $.ajax( {

        type: 'post',
        //our baseurl variable in action will call the sendemail() method in our default controller
        url: baseUrl + 'HomeController/sendemail',
       // dataType: 'json',
       // data: { fname: fname, lname: lname, email: email, need: need, message:message },
       data: $("#contact-form").serialize(),
             dataType: 'html',
        success: function (result)
        {
            
            //Ajax call success and we can show the value returned by our controller function
            $('.messages').html(result).fadeIn('slow').delay(3000).fadeOut('slow');
            show_contact();
            if(result == 'success'){
                $('#form_name').val('');
                $('#form_lastname').val('');
                $('#form_email').val('');
                $('#form_need').val('');
                $('#form_message').val('');

            }
        },
        error: function (result)
        {
           // alert(result);
            //Ajax call failed, so we inform the user something went wrong
            $('.messages').html('Server unavailable now: please, retry later.').fadeIn('slow').delay( 3000 ).fadeOut('slow');
        }
    } );
    });  
});
</script>

  </body>

</html>
