<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Horde/Imap_Client: PHP IMAP Client Library</title>
  <link href="stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" />
 </head>
 <body id="contents_home">
  <div id="wrapper">
   <div id="header" class="clr">
    <div id="logo" class="left"></div>
    <div class="left logoLabel"><b>Horde</b>/Imap_Client</div>
    <ul id="nav" class="right">
     <li>Home</li>
     <li><a href="features.php">Features</a></li>
     <li><a href="install.php">Install</a></li>
     <li><a href="documentation.php">Documentation</a></li>
    </ul>
   </div>

   <div id="content" class="clr">
    <h1>Horde/Imap_Client Library</h1>

    <div id="main">
     <p class="top">
      The Horde IMAP Client library is the premier PHP solution for interacting
      with <a href="http://tools.ietf.org/html/rfc3501">IMAP</a> (and
      <a href="http://tools.ietf.org/html/rfc1939">POP3</a>) mail servers.
     </p>

     <p>
      The library presents a fully abstracted interface to an IMAP/POP3 server,
      freeing a developer from worrying about the complex underlying
      protocols.
     </p>

     <p>
      The library provides a native-PHP driver that does not require
      additional, optional extensions to be built into PHP at compile time.
     </p>

     <p>
      A full list of features can be found on the
      <a href="features.php">Features</a> page.
     </p>

     <h3>Why not use the PHP IMAP extension?</h3>

     <p>
      Horde/Imap_Client is <b>significantly faster, more feature-rich, and
      extensible</b> when compared to
      <a href="http://php.net/imap">PHP's imap (c-client) extension</a>.
     </p>

     <p>
      Don't be confused: almost every so-called "PHP IMAP Library" out there is
      nothing more than a thin-wrapper around the imap extension, so NONE of
      these libraries can fix the basic limitations of that extension.
     </p>

     <p>
      Development of Horde/Imap_Client was primarily funded by a
      large Internet Service Provider precisely because the imap extension
      <em>could not</em> support the volume of traffic present on their
      systems.  Horde/Imap_Client has been powering their web-accessible mail
      backends for more than five years, supporting thousands of concurrent
      connections and millions of active accounts.
     </p>

<!--
     <p>
      Visit the <a href="phpimap.php">Why PHP IMAP's extension is no good</a>
      page for further details on the limitations of the PHP imap extension,
      how Horde/Imap_Client resolves these issues, and documentation
      on how to convert your scripts written for the imap extension to
      Horde/Imap_Client.
     </p>
-->

     <h3>Users</h3>

     <p>
      Horde/Imap_Client is used by the
      <a href="http://www.horde.org/apps/imp/">IMP Webmail Application</a>, the
      most advanced open source webmail program available.
     </p>

     <p>
      Additionally, the <a href="http://www.horde.org/">Horde Project</a> uses
      the Horde/Imap_Client library to synchronize a user's e-mail account
      with ActiveSync devices.
     </p>

     <p>
      However, the Horde framework <b>DOES NOT</b> need to be installed
      on your server to make use of Horde/Imap_Client:
      <a href="install.php">installation</a> will automatically install all
      required dependencies.
     </p>
    </div>

    <div id="sidebar">
     <div class="side_item">
      <h4>Developers</h4>
      <p><a href="mailto:slusarz@horde.org">Michael Slusarz</a></p>
      <div class="side_bottom">&nbsp;</div>
     </div>

     <?php require './sidebar/license.php' ?>
    </div>
   </div>

   <div id="footer" class="clr">
    <span class="right">
     Horde/Imap_Client is part of the <a href="http://www.horde.org">Horde Project</a>.
    </span>
   </div>
  </div>
 </body>
</html>
