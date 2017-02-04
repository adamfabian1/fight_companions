<?php
$facebookImage = img('../media/images/facebook-logo.png', false, array('class' => 'social-icon'));
$twitterImage = img('../media/images/twitter-logo.png', false, array('class' => 'social-icon'));
$youtubeImage = img('../media/images/youtube-logo.png', false, array('class' => 'social-icon'));
$instagramImage = img('../media/images/instagram-logo.png', false, array('class' => 'social-icon'));
?>
<div class="footer">
    <div class="footer-wrapper">
        <ul class="footer-menu footer-left">
            <li class="footer-menu-item level0">
                <input type="button" name="contact" value="Feedback / Contact" class="feedback-contact"
            </li>
        </ul>
        <div class="social-links footer-center">
            <ul class="social-links-list">
                <li class="social-links-item"><?php echo anchor_popup('https://www.facebook.com/fcompanions', $facebookImage, array('class' => 'facebook-social', 'target'=>"_blank")); ?></li>
                <li class="social-links-item"><?php echo anchor_popup('https://twitter.com/Fight_companion/', $twitterImage, array('class' => 'twitter-social')); ?></li>
                <li class="social-links-item"><?php echo anchor_popup('http://www.youtube.com/tektres', $youtubeImage, array('class' => 'youtube-social')); ?></li>
                <li class="social-links-item"><?php echo anchor_popup('https://www.instagram.com/fightcompanions/', $instagramImage, array('class' => 'youtube-social')); ?></li>
            </ul>
        </div>
        <div class="copyright footer-right">
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