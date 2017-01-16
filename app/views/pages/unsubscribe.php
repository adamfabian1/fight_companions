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
                                echo form_open();?>
                                <?php
                                echo form_label('Email');
                                $dataEmail = array(
                                    'name' => 'email',
                                    'class' => 'input_box',
                                    'placeholder' => 'Please Enter Email',
                                    'id' => 'email'
                                );
                                echo form_input($dataEmail); ?>
                                <div id="form_button">
                                    <?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
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
<script type="text/javascript">
    // Ajax post
    jQuery(document).ready(function() {
        jQuery(".submit").click(function(event) {
            event.preventDefault();
            var email = jQuery("input#email").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>unsubscribe/unsubscribe",
                data: {email: email},
                success: function(data) {
                    if (data)
                    {
                        alert(data);
                    }
                }
            });
        });
    });
</script>