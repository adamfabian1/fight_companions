<?php
$facebookImage = img('../media/images/facebook-icon.png', false, array('class' => 'social-icon'));
$twitterImage = img('../media/images/twitter-icon.png', false, array('class' => 'social-icon'));
$youtubeImage = img('../media/images/youtube-icon.png', false, array('class' => 'social-icon'));
$currentClass =  $this->router->fetch_class();
?>
<?php $currentClass == 'welcome' ? 'active' : '' ?>
<div class="header">
    <div class="nav-wrapper">
        <div id="mobile-text">
            <h3>Lazy ass, get a desktop.</h3>
        </div>
        <div class="mobile-nav" id="mobile-nav">
            <a class="toggle-nav" href="#">&#8801;</a>
            <ul class="mobile-nav-links active">
                <li class="<?php echo $currentClass == 'welcome' ? 'active' : '' ?> current-item">
                    <a href="<?php echo base_url() ?>">Home</a>
                </li>
                <li class="<?php echo $currentClass == 'episodes' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('episodes'); ?>">Episodes</a>
                </li>
                <li class="<?php echo $currentClass == 'news' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('news'); ?>">MMA News</a>
                </li>
                <li class="<?php echo $currentClass == 'about' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('about'); ?>">About</a>
                </li>
                <li class="<?php echo $currentClass == 'merch' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('merch'); ?>">Store</a>
                </li>
            </ul>
            <div class="mobile-logo">
                <img id="main-logo" src="<?php echo base_url('media/images/punch-logo.png'); ?>"/>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.toggle-nav').click(function(e) {
                    jQuery(this).toggleClass('active');
                    jQuery('.mobile-nav ul').toggleClass('active');
                    e.preventDefault();
                });
            });
        </script>
        <div class="nav">
            <ul class="nav-links">
                <li class="<?php echo $currentClass == 'episodes' ? 'active' : '' ?> header-parent level0">
                    <a href="<?php echo site_url('episodes'); ?>"><span class="span-level0">Episodes</span></a>
                </li>
                <li class="<?php echo $currentClass == 'news' ? 'active' : '' ?> header-parent level0">
                    <a href="<?php echo site_url('news'); ?>"><span class="span-level0">MMA News</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>">
                        <img id="main-logo" src="<?php echo base_url('media/images/punch-logo.png'); ?>"/>
                    </a>
                </li>
                <li class="<?php echo $currentClass == 'about' ? 'active' : '' ?> header-parent level0">
                    <a href="<?php echo site_url('about'); ?>"><span class="span-level0">About</span></a>
                </li>
                <li class="<?php echo $currentClass == 'merch' ? 'active' : '' ?> header-parent level0">
                    <a href="<?php echo site_url('merch'); ?>"><span class="span-level0">Store</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>