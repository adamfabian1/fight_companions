<div class="main">
    <div class="main-wrapper">
        <div class="page-title"></div>
        <div class="content">
            <div class="std">
                <div class="two-column-left left">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contact Form</h3>
                            </div>
                            <div class="panel-body">
                                <?php $attributes = array("name" => "contactform");
                                echo form_open("welcome/contactform", $attributes);?>
                                <div class="form-group">
                                    <label for="email">Email ID</label>
                                    <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                </div>
                                <?php echo form_close(); ?>
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="two-column-left right">
                    <div class="fb-page" data-href="https://www.facebook.com/fcompanions/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/fcompanions/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/fcompanions/">Fight Companions</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
</div>