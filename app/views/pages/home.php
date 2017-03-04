<div class="main">
    <div class="main-wrapper">
        <div class="content">
            <div class="std">
                <div class="content-center fight-card">
                    <h3 id="fight-headline">
                        <span>UFC 209: Woodley vs. Thompson<br/>March 4th, 2017</span>
                    </h3>
                    <div class="video-container">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/jALd7qIPf-E" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <div class="main-event fight-list">
                        <h3>MAIN CARD</h3>
                        <ul class="fight-listing">
                            <li><span class="fighters">Tyron Woodley vs. Stephen Thompson</span></li>
                            <li><span class="fighters">Rashad Evans vs. Daniel Kelly</span></li>
                            <li><span class="fighters">Devid Teymur vs. Lando Vannata</span></li>
                            <li><span class="fighters">Amanda Cooper vs. Cynthia Calvillo</span></li>
                            <li><span class="fighters">Mark Hunt vs. Alistair Overeem</span></li>
                        </ul>
                    </div>
                    <div class="undercard fight-list">
                        <h3>UNDER CARD</h3>
                        <ul class="fight-listing">
                            <li><span class="fighters">Luis Henrique vs. Marcin Tybura</span></li>
                            <li><span class="fighters">Mirsad Bektic vs. Darren Elkins</span></li>
                            <li><span class="fighters">Irui Alcantara vs. Luke Sanders</span></li>
                            <li><span class="fighters">Mark Godbeer vs. Daniel Spitz</span></li>
                        </ul>
                    </div>
                    <div class="fight-predictions">
                        <h3>UFC 209 Fight Predictions</h3>
                        <ul>
                            <li>Anthony's Predictions</li>
                            <li>Alistair Overeem by Knockout in Round 2</li>
                            <li>Lando Vannata by Submission in Round 2</li>
                            <li>Rashad Evans by Technical Knockout in Round 3</li>
                            <li>Stephen Thompson by Technical Knockout in Round 3 (BONUS: Headkick)</li>
                        </ul>
                        <ul>
                            <li>Senko's Predictions</li>
                            <li>Alistair Overeem by Unanimous Decision</li>
                            <li>Lando Vannata by Unanimous Decision</li>
                            <li>Rashad Evans by Knockout in Round 2</li>
                            <li>Tyron Woodley by Knockout in Round 2 (BONUS: Hammerfist)</li>
                        </ul>
                        <ul>
                            <li>Hector's Predictions</li>
                            <li>Mark Hunt by Knockout in Round 3</li>
                            <li>Lando Vannata by Unanimous Decision</li>
                            <li>Rashad Evans by Unanimous Decision</li>
                            <li>Tyron Woodley by Technical Knockout in Round 3</li>
                        </ul>
                        <ul>
                            <li>Adam's Predictions</li>
                            <li>Alistair Overeem by Knockout in Round 1</li>
                            <li>Lando Vannata by Submission in Round 2</li>
                            <li>Rashad Evans by Knockout in Round 2</li>
                            <li>Stephen Thompson by Knockout in Round 3 (BONUS: Headkick)</li>
                        </ul>
                    </div>
                </div>
                <div class="rankings">
                    <a class="handle">FC Standings</a>
                    <div class="rankings-panel">
                        <h3>FightCompanions Rivalry Rankings</h3>
                        <p>Each week, the companions will choose winners for a fight card.  Points are awarded for choosing the winner, decision type, and winning combination.</p>
                        <table class="rankings-table">
                            <tr>
                                <th>Companion</th>
                                <th>Score</th>
                            </tr>
                            <tr>
                                <td>Anthony</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Hector</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Senko</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Adam</td>
                                <td>0</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <script type="text/javascript">
                    $(window).on("load", function() {
                        $('.rankings').tabSlideOut({
                            tabLocation: 'right',
                            offset: '15%',
                            offsetReverse: true
                        });
                    });
                </script>



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