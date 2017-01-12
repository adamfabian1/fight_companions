<?php
$facebookImage = img('../media/images/facebook-icon.png', false, array('class' => 'social-icon'));
$twitterImage = img('../media/images/twitter-icon.png', false, array('class' => 'social-icon'));
$youtubeImage = img('../media/images/youtube-icon.png', false, array('class' => 'social-icon'));
?>
<div class="header">
    <div class="nav-wrapper">
        <div class="nav">
            <ul class="nav-links">
                <li class="header-parent level0">
                    <a href="<?php echo site_url('video'); ?>"><span class="span-level0">Video</span></a>
                </li>
                <li class="header-parent level0">
                    <a href="<?php echo site_url('episodes'); ?>"><span class="span-level0">Episodes</span></a>
                </li>
                <li class="header-parent level0">
                    <a href="<?php echo site_url('merch'); ?>"><span class="span-level0">Store</span></a>
                </li>
                <li class="header-parent level0">
                    <a href="<?php echo site_url('news'); ?>"><span class="span-level0">MMA News</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header-wrapper">
        <div class="header-lower">
            <div class="header-section header-left">
                <h3>Welcome to Fight Companions.com</h3>
            </div>
            <div class="header-section header-center">
                <a href="<?php echo base_url() ?>">
                    <img id="main-logo" src="<?php echo base_url('media/images/punch-logo.png'); ?>"/>
                </a>
            </div>
            <div class="header-section header-right">
                <h3>Bringing you the best in MMA Analysis.<br/>And drinking. Lots of Drinking.</h3>
            </div>
        </div>
    </div>
</div>