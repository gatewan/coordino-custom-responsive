<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google-site-verification" content="u0U41E_FS4JAHC0t66aO9fcsZdFDgRFrEHzMjAhFA4k" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title><?=$title_for_layout;?> | Gatewan</title>
    <?=$html->css('screen.css');?>
    <?=$html->css('prettify.css');?>
    <?=$html->script('prettify/prettify.js');?>
    <?=$html->css('skin.css');?>
    <!--[if IE]>
    <style type="text/css">
        .wrapper {
            zoom: 1;     /* triggers hasLayout */
        }  /* Only IE can see inside the conditional comment
	    and read this CSS rule. Don't ever use a normal HTML
	    comment inside the CC or it will close prematurely. */
    </style>
    <![endif]-->

    <!--[if lte IE 6]><link rel="stylesheet" href="stylesheets/lib/ie.css" type="text/css" media="screen" charset="utf-8"><![endif]-->

<!-- GOOGLEADSMOBILE -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9118638813212602",
    enable_page_level_ads: true
  });
</script>
<!-- GOOGLEADSMOBILE -->

<!-- BLOCK PENGGUNA UCBROSER -->
<p id="gaboleh"></p>
<script>

var cari = navigator.userAgent;
var dapet = cari.search("UCBrowser");
if(dapet>1) {

var strs=document.URL;
var urlnya= strs.replace("http://", "");
var strings='<meta name="viewport" content="width=device-width, initial-scale=1.0"><h3 align="center"> Maaf, website kami tidak dapat dibuka dengan baik jika anda menggunakan UCBrowser<br/><br/>klik tombol pilih dibawah ini , lalu salin/copy dan buka menggunakan browser lain (seperti Chrome, Opera, dll)<br/><br/><input type="text" class="teks" value="'+ document.URL  +'" size="50"><br/> <button class="js-copy-btn">Pilih</button><br/></h3>';


document.getElementById("gaboleh").innerHTML = strings;

var copyTextareaBtn = document.querySelector('.js-copy-btn');

copyTextareaBtn.addEventListener('click', function(event) {
var copyTextarea = document.querySelector('.teks');
//copyTextarea.select();
copyTextarea.selectionStart=0;
copyTextarea.selectionEnd=copyTextarea.value.length;

try {
var successful = document.execCommand('copy');
var msg = successful ? 'successful' : 'unsuccessful';
console.log('Copying text command was ' + msg);
} catch (err) {
console.log('Oops, unable to copy');
}
});

exit();
}

function exit( status ) {
// http://kevin.vanzonneveld.net
// +   original by: Brett Zamir (http://brettz9.blogspot.com)
// +      input by: Paul
// +   bugfixed by: Hyam Singer (http://www.impact-computing.com/)
// +   improved by: Philip Peterson
// +   bugfixed by: Brett Zamir (http://brettz9.blogspot.com)
// %        note 1: Should be considered expirimental. Please comment on this function.
// *     example 1: exit();
// *     returns 1: null

var i;

if (typeof status === 'string') {
alert(status);
}

window.addEventListener('error', function (e) {e.preventDefault();e.stopPropagation();}, false);

var handlers = [
'cut',
'beforeunload', 'blur', 'change', 'contextmenu', 'focus', 'keydown', 'keypress', 'keyup', 'mousedown', 'mousemove', 'mouseout', 'mouseover', 'mouseup', 'resize', 'scroll',
'DOMNodeInserted', 'DOMNodeRemoved', 'DOMNodeRemovedFromDocument', 'DOMNodeInsertedIntoDocument', 'DOMAttrModified', 'DOMCharacterDataModified', 'DOMElementNameChanged', 'DOMAttributeNameChanged', 'DOMActivate', 'DOMFocusIn', 'DOMFocusOut', 'online', 'offline', 'textInput',
'abort', 'close', 'dragdrop', 'load', 'paint', 'reset', 'submit', 'unload'
];

function stopPropagation (e) {
e.stopPropagation();
// e.preventDefault(); // Stop for the form controls, etc., too?
}
for (i=0; i < handlers.length; i++) {
window.addEventListener(handlers[i], function (e) {stopPropagation(e);}, true);
}

if (window.stop) {
window.stop();
}

throw '';
}

</script>
<!-- BLOCK PENGGUNA UCBROSER -->

</head>
<body onload="prettyPrint()">

<!--GOOGLEANALYTIC -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37619514-12', 'auto');
  ga('send', 'pageview');

</script>
<!--GOOGLEANALYTIC -->

<div id="page" class="container">

<div class="wrapper" id="header">
    <div class="wrapper">
        <div id="top_actions" class="top_actions">
            <?php
            echo $form->create('Post', array('action' => 'display'));
            echo $form->text('needle', array('value' => 'search', 'onclick' => 'this.value=""'));
            echo $form->end();
            ?>
            <ul class="tabs">
                <?php if($session->check('Auth.User.id')) { ?>
                    <li>
                        <?=$html->link(
                            $session->read('Auth.User.username'),
                            '/users/' . $session->read('Auth.User.public_key') . '/' . $session->read('Auth.User.username')
                        );
                        ?>
                    </li>
                <?php } ?>
                <?php if(!$session->check('Auth.User.id')) { ?>
                    <li>
                        <?=$html->link(
                            __('login',true),
                            array('controller' => 'users', 'action' => 'login')
                        );
                        ?>
                    </li>
                <?php } ?>
                <?php if(!$session->check('Auth.User.id') || $session->read('Auth.User.registered') == 0) { ?>
                    <li>
                        <?=$html->link(
                            __('register',true),
                            array('controller' => 'users', 'action' => 'register')
                        );
                        ?>
                    </li>
                <?php } ?>
				<!--
                <li>
                    <?=$html->link(
                        __('about',true),
                        array('controller' => 'pages', 'action' => 'display', 'about')
                    );
                    ?>
                </li>
				-->
                <?php if($session->read('Auth.User.id')) { ?>
                    <li>
                        <?=$html->link(
                            __('settings',true),
                            '/users/settings/' . $session->read('Auth.User.public_key')
                        );
                        ?>
                    </li>
                <?php } ?>
				<!--
                <li>
                    <a href='#'><?php __('change language'); ?></a>
                    <ul>
                        <li><?=$html->link(__('english',true),'/lang/eng')?></li>
                        <li><?=$html->link(__('spanish',true),'/lang/esp')?></li>
                        <li><?=$html->link(__('french',true),'/lang/fre')?></li>
                        <li><?=$html->link(__('chinese',true),'/lang/chi')?></li>
                    </ul>
                </li>
				-->
                <?php if($session->check('Auth.User.id') && $session->read('Auth.User.permission') != '') { ?>
                    <li>
                        <?=$html->link(
                            __('admin',true),
                            array('controller' => 'users', 'action' => 'admin')
                        );
                        ?>
                        <ul>
                            <li>
                                <?=$html->link(
                                    ucfirst(__('settings',true)),
                                    array('controller' => 'users', 'action' => 'admin')
                                );
                                ?>
                            </li>
                            <li>
                                <?=$html->link(
                                    ucfirst(__('Flagged Posts',true)),
                                    array('controller' => 'users', 'action' => 'flagged')
                                );
                                ?>
                            </li>
                            <li>
                                <?=$html->link(
                                    ucfirst(__('User Management',true)),
                                    array('controller' => 'users', 'action' => 'admin_list')
                                );
                                ?>
                            </li>
                            <li>
                                <?=$html->link(
                                    ucfirst(__('Blacklist',true)),
                                    array('controller' => 'users', 'action' => 'list_blacklist')
                                );
                                ?>
                            </li>
                            <li>
                                <?=$html->link(
                                    ucfirst(__('Remote Settings',true)),
                                    array('controller' => 'users', 'action' => 'remote_settings')
                                );
                                ?>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if($session->check('Auth.User.id') && $session->read('Auth.User.registered') == 1) { ?>
                    <li>
                        <?=$html->link(
                            __('logout',true),
                            array('controller' => 'users', 'action' => 'logout')
                        );
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <a href="<?=$this->webroot; ?>"><?php echo $html->image('logo.png', array('alt' => 'Logo', 'id' => 'logo')); ?></a>

        <ul class="tabs">
            <li>
                <?=$html->link(__('Questions',true),'/');?>
            </li>
            <li><?=$html->link(__('Tags',true),'/tags');?></li>
            <li><?=$html->link(__('Unsolved',true),'/questions/unanswered');?></li>
            <li><?=$html->link(__('Users',true),'/users');?></li>
        </ul>
        <ul class="tabs" style="float: right;">
            <li>
                <?=$html->link(
                    __('Ask a question',true),
                    array('controller' => 'posts', 'action' => 'ask')
                );
                ?>
            </li>
        </ul>
    </div>

</div>

<div id="body" class="wrapper">
    <?php echo $session->flash(); ?>
    <div id="content" class="wrapper">
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
        <?=$content_for_layout;?>
    </div>
    <div id="sidebar" class="wrapper">

        <?php
        if(!empty($widgets)) {
            foreach($widgets as $widget) {
                ?>
                <div class="widget_box wrapper">
                    <?php if(!empty($widget['Widget']['title'])) {?>
                        <h3><?=$widget['Widget']['title'];?></h3>
                    <?php } ?>
                    <?=$widget['Widget']['content'];?>
                    <?php if(isset($admin) && $admin) { ?>
                        <a href="/widgets/edit/<?=$widget['Widget']['id'];?>" title="Edit this Widget"><?php __('edit'); ?></a>	|
                        <a href="/widgets/delete/<?=$widget['Widget']['id'];?>" title="Delete Widget"><?php __('del'); ?></a>
                    <?php } ?>
                </div>
            <?php
            }
        }

        if(isset($admin) && $admin):
            ?>
            <a href="/widgets/add<?php echo $_SERVER['REQUEST_URI']; ?>">
                <img src="/img/icons/plugin_edit.png" alt="Edit"/><?php __('add widgets to this page'); ?>.
            </a>
        <?php endif; ?>

    </div>
</div>


<div id="footer" class="wrapper">
    <div class="left">
        <ul class="tabs">
            <li>
                <?=$html->link(__('home',true),'/');?></li>
            <li>
                <?=$html->link(__('ask a question',true),'/questions/ask');?></li>

            <li>
                <?=$html->link(__('about',true),'/about');?></li>
        </ul>

    </div>
    <?php
    echo $this->element('coordino');
    ?>
</div>


</div>

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5891536d257e21aa"></script> 

</body>
</html>				