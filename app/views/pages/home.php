<div class="main">
    <div class="main-wrapper">
        <div class="page-title"></div>
        <div class="content">
            <div class="std">
                <div class="fight-card">
                    <h3 id="fight-headline">
                        <span>UFC FIGHT NIGHT: BERMUDEZ VS. KOREAN ZOMBIE<br/>February 4th, 2017</span>
                    </h3>
                    <div class="main-event fight-list">
                        <h3>MAIN CARD</h3>
                        <ul class="fight-listing">
                            <li><span class="fighters">Dennis Bermudez vs. Chan Sung Jung</span></li>
                            <li><span class="fighters">Alexa Grasso vs. Felice Herrig</span></li>
                            <li><span class="fighters">Abel Trujillo vs. James Vick</span></li>
                            <li><span class="fighters">Ovince Saint Preux vs. Volkan Oezdemir</span></li>
                            <li><span class="fighters">Anthony Hamilton vs. Marcel Fortuna</span></li>
                            <li><span class="fighters">Angela Hill vs. Jessica Andrade</span></li>
                        </ul>
                    </div>
                    <div class="undercard fight-list">
                        <h3>UNDER CARD</h3>
                        <ul class="fight-listing">
                            <li><span class="fighters">Curtis Blaydes vs. Adam Milstead</span></li>
                            <li><span class="fighters">Chris Greutzemacher vs. Chas Skelly</span></li>
                            <li><span class="fighters">Ricardo Lucas Ramos vs. Michinori Tanaka</span></li>
                            <li><span class="fighters">Bec Rawlings vs. Tecia Torres</span></li>
                            <li><span class="fighters">Alex Morano vs. Niko Price</span></li>
                            <li><span class="fighters">Daniel Jolly vs. Khalil Rountree</span></li>
                        </ul>
                    </div>
                </div>
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