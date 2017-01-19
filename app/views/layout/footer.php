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
            <div class="feedback-top">
                <?php
                $dataTwitter = array(
                    'name' => 'twitter',
                    'class' => 'input_box',
                    'placeholder' => '',
                    'id' => 'twitter'
                ); ?>
                <div class="input-box">
                    <?php
                    echo form_label('Twitter Handle', 'twitter');
                    echo form_input($dataTwitter);
                    ?>
                </div>
                <?php
                $dataFacebook = array(
                    'name' => 'facebook',
                    'class' => 'input_box',
                    'placeholder' => '',
                    'id' => 'facebook'
                ); ?>
                <div class="input-box">
                    <?php
                    echo form_label('Facebook Link', 'facebook');
                    echo form_input($dataFacebook);
                    ?>
                </div>
                <?php
                $dataInstagram = array(
                    'name' => 'instagram',
                    'class' => 'input_box',
                    'placeholder' => '',
                    'id' => 'instagram'
                ); ?>
                <div class="input-box">
                    <?php
                    echo form_label('Instagram Link', 'instagram');
                    echo form_input($dataInstagram); ?>
                </div>
            </div>
            <div class="feedback-name">
                <?php $dataFirstname = array(
                    'name' => 'firstname',
                    'class' => 'input_box',
                    'placeholder' => '',
                    'id' => 'firstname'
                );
                ?>
                <div class="input-box firstname">
                    <?php
                    echo form_label('First Name', 'firstname', array('class' => 'required'));
                    echo form_input($dataFirstname);
                    ?>
                </div>
                <?php
                $dataLastname = array(
                    'name' => 'lastname',
                    'class' => 'input_box',
                    'placeholder' => '',
                    'id' => 'lastname'
                );
                ?>
                <div class="input-box lastname">
                    <?php
                    echo form_label('Last Name', 'lastname', array('class' => 'required'));
                    echo form_input($dataLastname); ?>
                </div>
            </div>
            <div class="feedback-email">
                <?php $dataEmail = array(
                    'name' => 'email',
                    'class' => 'input_box',
                    'placeholder' => '',
                    'type' => 'email',
                    'id' => 'email'
                ); ?>
                <div class="input-box">
                    <?php
                    echo form_label('Email Address', 'email', array('class' => 'required'));
                    echo form_input($dataEmail);
                    ?>
                </div>
            </div>
            <div class="feedback-comment">
                <?php $dataComment = array(
                    'name' => 'comment',
                    'class' => 'text_area',
                    'placeholder' => '',
                    'id' => 'comment'
                );
                ?>
                <div class="input-box">
                    <?php
                    echo form_label('Comment Box', 'comment', array('class' => 'required'));
                    echo form_textarea($dataComment);
                    ?>
                </div>
            </div>
            <div id="form_button">
                <?php echo form_submit('submit', 'Submit Feedback', "class='submit'"); ?>
            </div>
            <?php echo form_close(); ?>
            <div id="feedbackform-response">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.footer-menu-item input:eq(0)').click(function (e) {
            e.preventDefault();
            jQuery('#feedback-form').modal({
                overlayClose: true
            });
            if (checkMobile() == true) {
                jQuery('#simplemodal-container').css({
                    "width": "80%",
                    "position": "relative",
                    "left": "",
                    "margin": "0 auto"
                });
            }
            else {
                jQuery('#simplemodal-container').css("height", "auto");
                jQuery('#simplemodal-container').css("top", "5%");
            }
        });

        jQuery("#feedbackform .submit").click(function (event) {
            event.preventDefault();
            jQuery('.error-validation').each(function () {
                jQuery(this).remove();
            });
            jQuery('#feedbackform-response').empty();
            jQuery('#feedbackform-response').removeClass('error');
            jQuery('#feedbackform-response').removeClass('success');
            var twitter = jQuery("input#twitter").val();
            var facebook = jQuery("input#facebook").val();
            var instagram = jQuery("input#instagram").val();
            var firstname = jQuery("input#firstname").val();
            var lastname = jQuery("input#lastname").val();
            var email = jQuery("#feedbackform input#email").val();
            var comment = jQuery("textarea#comment").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>welcome/feedbackForm",
                data: {
                    email: email,
                    twitter: twitter,
                    facebook: facebook,
                    firstname: firstname,
                    lastname: lastname,
                    comment: comment,
                    instagram: instagram
                },
                success: function (data) {
                    try {
                        if (data) {
                            var obj = jQuery.parseJSON(data);
                            console.log(obj);
                            if (obj['ERROR_ARRAY']) {
                                parseErrors(obj['ERROR_ARRAY'], 'feedback-form');
                            }
                            else {
                                jQuery('#feedback-form .feedback-top, #feedback-form .feedback-comment, #feedback-form .feedback-name, #feedback-form .feedback-email, #feedback-form #form_button').hide("fast", function () {
                                });
                                jQuery('#feedbackform-response').append(obj['STATUS']);
                                jQuery('#feedbackform-response').css('display', 'block');
                                jQuery('#feedbackform-response').addClass(obj['CLASS']);
                            }
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