<div class="main">
    <div class="main-wrapper">
        <div class="content">
            <div class="std">
                <div class="content-center fight-card">
                    <h3 id="fight-headline">
                        <span>UFC Fight Night: Belfort vs. Gastelum<br/>March 11th, 2017</span>
                    </h3>
                    <div class="video-container">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/jm9dL-_LCkY" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                    <div class="main-event fight-list">
                        <h3>MAIN CARD</h3>
                        <ul class="fight-listing">
                            <li><span class="fighters">Vitor Belfort vs. Kelvin Gastelum</span></li>
                            <li><span class="fighters">Maurício Rua vs. Gian Villante</span></li>
                            <li><span class="fighters">Edson Barboza vs. Beneil Dariush</span></li>
                            <li><span class="fighters">Jussier Formiga vs. Ray Borg</span></li>
                            <li><span class="fighters">Bethe Correia vs. Marion Reneau</span></li>
                            <li><span class="fighters">Alex Oliveira vs. Tim Means</span></li>
                        </ul>
                    </div>
                    <div class="undercard fight-list">
                        <h3>UNDER CARD</h3>
                        <ul class="fight-listing">
                            <li><span class="fighters">Francisco Trinaldo vs. Kevin Lee</span></li>
                            <li><span class="fighters">Sérgio Moraes vs. Davi Ramos</span></li>
                            <li><span class="fighters">Rani Yahya vs. Joe Soto</span></li>
                            <li><span class="fighters">Michel Prazeres vs. Josh Burkman</span></li>
                        </ul>
                    </div>
                    <div class="fight-predictions">
                        <h3>UFC Fight Night 106 Predictions</h3>
                        <ul>
                            <li class="fight-red">Adam's Predictions</li>
                            <li class="fight-black">Kelvin Gastelum by TKO in Round 2</li>
                            <li class="fight-grey">Maurício Rua by DEC</li>
                            <li class="fight-black">Edson Barboza by DEC</li>
                            <li class="fight-grey">Ray Borg by SUB in Round 3 (Guillotine)</li>
                            <li class="fight-black">Bethe Correia by Decision</li>
                            <li class="fight-grey">Tim Means by TKO Round 3</li>
                        </ul>
                        <ul>
                            <li class="fight-red">Anthony's Predictions</li>
                            <li class="fight-black">Kelvin Gastelum by TKO in Round 2</li>
                            <li class="fight-grey">Maurício Rua by DEC</li>
                            <li class="fight-black">Edson Barboza by DEC</li>
                            <li class="fight-grey">Ray Borg by DEC</li>
                            <li class="fight-black">Bethe Correia by TKO Round 1</li>
                            <li class="fight-grey">Tim Means by TKO Round 3</li>
                        </ul>
                        <ul>
                            <li class="fight-red">Hector's Predictions</li>
                            <li class="fight-black">Kelvin Gastelum by TKO in Round 3</li>
                            <li class="fight-grey">Gian Villante by DEC</li>
                            <li class="fight-black">Beneli Dariush by DEC</li>
                            <li class="fight-grey">Ray Borg by DEC</li>
                            <li class="fight-black">Bethe Correia by TKO Round 2</li>
                            <li class="fight-grey">Tim Means by TKO Round 3</li>
                        </ul>
                        <ul>
                            <li class="fight-red">Senko's Predictions</li>
                            <li class="fight-black">Kelvin Gastelum by KO in Round 2 (punch)</li>
                            <li class="fight-grey">Maurício Rua by KO (head kick)</li>
                            <li class="fight-black">Edson Barboza by DEC</li>
                            <li class="fight-grey">Ray Borg by DEC</li>
                            <li class="fight-black">Bethe Correia by KO Round 3 (punch)</li>
                            <li class="fight-grey">Alex Oliveira by DEC</li>
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
                                <th></th>
                                <th>Companion</th>
                                <th>Score</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Guest (Sean)</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>T-2</td>
                                <td>Anthony</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>T-2</td>
                                <td>Adam</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Senko</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Last</td>
                                <td>Hector</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        jQuery('.rankings').tabSlideOut({
                            tabLocation: 'right',
                            offset: '15%',
                            offsetReverse: true
                        });
                    });
                </script>



                <div class="panel panel-default email-subscribe">
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
					<div class="panel-gif"><img src="../media/images/intro-loop-xs.gif" width="200"/></div>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function(){
                        jQuery('.email-subscribe').modal();
                    });
                </script>
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