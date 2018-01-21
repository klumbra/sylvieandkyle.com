<?php
/* Configuration */
$dataFile = './data/data.csv';

/* Required Files */
require_once 'process/write.php';
require_once 'process/read.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />
<meta name="author" content="Your Name" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36940701-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen,projection" />
<link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sylvie &amp; Kyle Get Married</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" type="text/css" href="../css/formalize.css" />
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/jquery.formalize.min.js"></script>
 <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>
<!-- InstanceEndEditable -->
<!-- InstanceParam name="homeClass" type="text" value="" -->
<!-- InstanceParam name="storyClass" type="text" value="" -->
<!-- InstanceParam name="picturesClass" type="text" value="" -->
<!-- InstanceParam name="partyClass" type="text" value="" -->
<!-- InstanceParam name="eventClass" type="text" value="" -->
<!-- InstanceParam name="lodgingClass" type="text" value="" -->
<!-- InstanceParam name="guestbookClass" type="text" value="" -->
<!-- InstanceParam name="registryClass" type="text" value="" -->
</head>

<body>
<div id="wrap">

  <div id="header">
		<h1><a href="../index.html">Sylvie &amp; Kyle Are Getting Married</a></h1>
	</div>

	<img id="frontphoto" src="../images/banner.jpg" width="760" height="175" alt="Banner - pictures of S&amp;K" /><!-- InstanceBeginRepeat name="Menu" --><!-- InstanceBeginRepeatEntry -->
    <div id="leftside">
      <h2 class="hide">Menu:</h2>
      <ul class="avmenu">
        <li><a href="../index.html" class="">Home</a></li>
        <li><a href="../story.html" class="">Our Story</a></li>
        <li><a href="../pictures.html" class="">Pictures</a></li>
        <li><a href="../party.html" class="">Wedding Party</a></li>
        <li><a href="../event.html" class="">Event/Venue Info</a>
          <ul>
            <li><a href="../lodging.html" class="">Lodging</a></li>
          </ul>
        </li>
        <li><a href="guestbook.php" class="">Guestbook</a></li>
        <li><a href="../registry.html" class="">Registry</a></li>
      </ul>
     <div class="announce">
      <h2>Updates:</h2>
        <p><strong>Dec 10, 2012:</strong><br /> 
        Website finished!
</p>
        <p><strong>Oct 3, 2012:</strong><br />
          DJ Chosen</p>
        <p class="textright"><a href="../updates.html">More &raquo;</a></p>
      </div>
    </div>
	<!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --><!-- InstanceBeginEditable name="EditRegion1" -->
	<div id="contentwide">
	  <h2>Guestbook</h2>
	  <h3>Leave an entry</h3>
      <?php if ($error !== false): ?>
		<div id="error"><?php echo $error; ?></div>
      <?php endif; ?>
	  <div id="form">
	    <form action="guestbook.php" method="post">
        <table width="75%" border="0">
          <tr>
            <th width="14%" height="44" align="right" valign="top"><label for="posting_user2">Name</label></th>
            <td width="3%"></td>
            <td width="83%" valign="top"><input class="input_full" type="text" name="posting_user" size="40" <?php if (isset($_POST['posting_user'])) echo 'value="' . $_POST['posting_user'] . '"'; ?> /></td>
          </tr>
          <tr>
            <th align="right" valign="top"><label for="posting_message">Message</label></th>
            <td></td>
            <td valign="top"><textarea name="posting_message" rows="5" cols="40"><?php if (isset($_POST['posting_user'])) echo $_POST['posting_message']; ?></textarea></td>
          </tr>
        </table>
        <br />
        <?php require_once('recaptchalib.php'); echo recaptcha_get_html($pubkey, $verify->error); ?>
        <br />
	    <input type="submit" name="doVerify" value="Post!" />
	    </form>
      </div>
	  <h3>&nbsp;</h3>
	  <h3>Current entries</h3>
        <div id="listing">
            <?php
			
			if (!empty($posts)) {
				$reverse_posts = array_reverse($posts);
				foreach ($reverse_posts as $reverse_post):
					?>
                    <p class="post">
                        <b><?php echo $reverse_post['postingUser']; ?> </b>- <?php echo $reverse_post['postingTime']; ?><br>
                        <?php echo nl2br($reverse_post['postedMessage']); ?>
          </p>
                    <?php
                endforeach;
			} else {
               echo 'No entries yet. Be the first to post!';
            }
            ?>
      </div>
	</div>
	<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>
