<div class="main">
    <div class="main-wrapper">
        <div class="page-title"></div>
        <div class="content">
            <div class="std">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Subscribe to find out when Fight Companions Goes Live!!</h3>
                        <span class="panel-subtitle">Sign up with your email address to receive news and updates.</span>
                    </div>
                    <div class="panel-body">
                        <?php $attributes = array("id" => "contactform");
                        echo form_open('', $attributes);?>
                        <?php
                        $dataEmail = array(
                            'name' => 'email',
                            'class' => 'input_box',
                            'placeholder' => 'Email Address',
                            'id' => 'email'
                        );
                        echo form_input($dataEmail); ?>
                        <div id="form_button">
                            <?php echo form_submit('submit', 'Sign Up', "class='submit'"); ?>
                        </div>
                        <?php echo form_close(); ?>
                        <div id="contactform-response" class="display:none">
                        </div>
                    </div>
                </div>
                    <div class="fb-page" data-href="https://www.facebook.com/fcompanions/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/fcompanions/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/fcompanions/">Fight Companions</a></blockquote></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // Ajax post
    jQuery(document).ready(function() {
        jQuery("#contactform .submit").click(function(event) {
            event.preventDefault();
            jQuery('#contactform-response').empty();
            jQuery('#contactform-response').removeClass('error');
            jQuery('#contactform-response').removeClass('success');
            var email = jQuery("input#email").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>welcome/contactForm",
                data: {email: email},
                success: function (data) {
                    try {
                        if (data)
                        {
                            var obj = jQuery.parseJSON(data);
                            jQuery('#contactform-response').append(obj['STATUS']);
                            jQuery('#contactform-response').css('display','block');
                            jQuery('#contactform-response').addClass(obj['CLASS']);
                            jQuery('#contactform')[0].reset();
                        }
                    }
                    catch (e) {
                        alert('There was an error processing your request.');
                    }
                },
                error: function () {
                    alert('There was an error processing your request.');
                }
            });
        });
    });
</script>