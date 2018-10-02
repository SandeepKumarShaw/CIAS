
    <section class="py-5">

    <!-- Content section -->
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2>Contact List</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="show_data">


    </tbody>
  </table>
    </div>
    <div class="col-md-6">
        <h1>Contact form</h1>
         <form id="contact-form" method="post" role="form">
            <div class="messages"></div>
            <div class="controls">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Firstname *</label>
                            <input id="form_name" type="text" name="fname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Lastname *</label>
                            <input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Please specify your need *</label>
                            <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                <option value=""></option>
                                <option value="Request quotation">Request quotation</option>
                                <option value="Request order status">Request order status</option>
                                <option value="Request copy of an invoice">Request copy of an invoice</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 

                    </div>
                    <div class="col-md-12">
                        <input id="submit_btn" type="button" class="btn btn-success btn-send" value="Send message">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted">
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
</section>





   