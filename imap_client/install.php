<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Horde/Imap_Client: Installation</title>
  <link href="stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" />
 </head>
 <body id="contents_install">
  <div id="wrapper">
   <div id="header" class="clr">
    <div id="logo" class="left"></div>
    <div class="left logoLabel"><b>Horde</b>/Imap_Client</div>
    <ul id="nav" class="right">
     <li><a href="index.php">Home</a></li>
     <li><a href="features.php">Features</a></li>
     <li>Install</li>
     <li><a href="documentation.php">Documentation</a></li>
    </ul>
   </div>

   <div id="content" class="clr">
    <h1>Installation</h1>

    <div id="main">
     <h2 class="top" id="requirements">Requirements</h2>
     <p>
      The Horde/Imap_Client library requires
      <a href="//www.php.net/">PHP 5.3.0</a> or later.
     </p>

     <h2 id="pearpackage">PEAR Package</h2>

     <p>
      The library can be installed via <a href="http://pear.php.net/">the PEAR installer</a>:
     </p>

     <div class="syntax">
      <pre>$ pear channel-discover pear.horde.org
$ pear install horde/horde_imap_client</pre>
     </div>

     <p>
      The PEAR installer will automatically download and install all required
      library dependencies for you.
     </p>

     <p>
      Further information about configuring PEAR and installing Horde-based
      PEAR packages can be found on the
      <a href="http://www.horde.org/apps/horde/docs/INSTALL#installing-with-pear">Horde website</a>.
     </p>

     <h2 id="composerpackage">Composer Package</h2>

     <p>
      The library can also be installed via <a href="http://getcomposer.org/">Composer</a>.
     </p>

     <p>
      The following should be added to your <code>composer.json</code> file:
     </p>

     <div class="syntax">
      <pre>{
    "repositories": [
        {
            "type": "pear",
            "url": "http://pear.horde.org"
        }
    ],
    "require": {
        "pear-pear.horde.org/Horde_Imap_Client": "*"
    }
}</pre>
     </div>

     <p>
      Composer will automatically download and install all additional required
      library dependencies for you.
     </p>

<?php
/*
     <h3>Composer via Packagist (Testing)</h3>

     <p>
      We are currently testing installation via packagist.
      <span style="color:red">NOTE:</span> This method may not install the
      most up-to-date version of the library.
     </p>

     <p>
      The following should be added to your <code>composer.json</code> file:
     </p>

     <div class="syntax">
      <pre>{
    "require": {
        "slusarz/horde-imap-client": "dev-master"
    }
}</pre>
     </div>
 */
?>

    </div>

    <div id="sidebar">
     <?php require './sidebar/version.php' ?>

     <div class="side_item">
      <h4>Source Code (<a href="http://git-scm.com/">Git</a>)</h4>
      <p><a href="http://git.horde.org/horde-git/-/browse/framework/Imap_Client/">Horde Project Git Server</a></p>
      <p><a href="https://github.com/horde/horde/tree/master/framework/Imap_Client">GitHub</a></p>
      <div class="side_bottom">&nbsp;</div>
     </div>

     <?php require './sidebar/license.php' ?>
    </div>
   </div>

   <div id="footer" class="clr">
    <span class="right">
      Horde/Imap_Client is part of the <a href="http://www.horde.org">Horde Project</a>.<br/>
    </span>
   </div>
  </div>
</body>
</html>
