<?php
?>
<div class="footer">
    <div class="footer-wrapper">
        <ul class="footer-menu">
            <li class="footer-menu-item level0">
                <input type="button" name="contact" value="Feedback / Contact" class="feedback-contact"
            </li>
        </ul>
        <div class="copyright">
            <span>&copy;2016 FightCompanions.com</span>
        </div>
    </div>
</div>
<div id="feedback-form" style="display:none;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Feedback / Contact Us</h3>
            <span class="panel-subtitle">Questions? Comments? Concerns? Let us know how we are doing.</span>
        </div>
        <div class="panel-body">
            <?php $attributes = array("id" => 'feedbackform');
                echo form_open('', $attributes);
            ?>
            <?php
            $dataTwitter = array(
                'name' => 'twitter',
                'class' => 'input_box',
                'placeholder' => 'Twitter Link',
                'id' => 'twitter'
            );
            echo form_input($dataTwitter);
            $dataFacebook = array(
                'name' => 'facebook',
                'class' => 'input_box',
                'placeholder' => 'Facebook Link',
                'id' => 'facebook'
            );
            echo form_input($dataFacebook);
            $dataInstagram = array(
                'name' => 'instagram',
                'class' => 'input_box',
                'placeholder' => 'Instagram Link',
                'id' => 'instagram'
            );
            echo form_input($dataInstagram);
            $dataFirstname = array(
                'name' => 'firstname',
                'class' => 'input_box',
                'placeholder' => 'First Name',
                'id' => 'firstname'
            );
            echo form_input($dataFirstname);
            $dataLastname = array(
                'name' => 'lastname',
                'class' => 'input_box',
                'placeholder' => 'Last Name',
                'id' => 'lastname'
            );
            echo form_input($dataLastname);
            $dataEmail = array(
                'name' => 'email',
                'class' => 'input_box',
                'placeholder' => 'Email',
                'id' => 'email'
            );
            echo form_input($dataEmail);
            $dataComment = array(
                'name' => 'comment',
                'class' => 'text_area',
                'placeholder' => 'Comment',
                'id' => 'comment'
            );
            echo form_textarea($dataComment);
            ?>
            <div id="form_button">
                <?php echo form_submit('submit', 'Submit Feedback', "class='submit'"); ?>
            </div>
            <?php echo form_close(); ?>
            <div id="feedbackform-response" class="display:none">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.footer-menu-item input:eq(0)').click(function(e){
        e.preventDefault();
        jQuery('#feedback-form').modal();
    });

    jQuery("#feedbackform .submit").click(function(event) {
        event.preventDefault();
        jQuery('#feedbackform-response').empty();
        jQuery('#feedbackform-response').removeClass('error');
        jQuery('#feedbackform-response').removeClass('success');
        var twitter = jQuery("input#twitter").val();
        var facebook = jQuery("input#facebook").val();
        var instagram = jQuery("input#instagram").val();
        var firstname = jQuery("input#firstname").val();
        var lastname = jQuery("input#lastname").val();
        var email = jQuery("input#email").val();
        var comment = jQuery("input#comment").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>welcome/feedbackForm",
            data: {email: email,twitter:twitter,facebook:facebook,firstname:firstname,lastname:lastname,comment:comment},
            success: function (data) {
                try {
                    if (data)
                    {
                        var obj = jQuery.parseJSON(data);
                        jQuery('#feedbackform-response').append(obj['STATUS']);
                        jQuery('#feedbackform-response').css('display','block');
                        jQuery('#feedbackform-response').addClass(obj['CLASS']);
                        jQuery('#feedbackform')[0].reset();
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