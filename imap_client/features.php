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
     <li><a href="index.php">Home</li>
     <li>Features</li>
     <li><a href="install.php">Install</a></li>
     <li><a href="documentation.php">Documentation</a></li>
    </ul>
   </div>

   <div id="content" class="clr">
    <h1>Horde/Imap_Client Features</h1>

    <div id="main">
     <h2>Fast</h2>

     <p>
      Horde/Imap_Client is orders of magnitude faster than both the PHP imap
      extension and other native PHP based solutions.
     </p>

     <p>
      The PHP imap extension produces tremendously inefficient IMAP queries.
      Horde/Imap_Client has been ruthlessly tuned to eliminate
      duplicate/unneeded queries.  Additionally, Horde/Imap_Client takes
      advantage of advanced IMAP features, such as pipelining, to reduce the
      amount of time spent sending commands and waiting for responses.
     </p>

     <h2>Memory efficient</h2>

     <p>
      Horde/Imap_Client handles message data (which can easily be many MB)
      entirely within PHP temporary streams. No more than 2 MB of a large data
      objects is stored in memory at any time so there is no need to worry
      about PHP out-of-memory issues when working with large messages.
     </p>

     <h2>Built-in caching</h2>

     <p>
      There is no need to muck around with caching message data; this is all
      handled transparently within the library. Horde/Imap_Client allows
      a large variety of caching options to be used, such as:
     </p>

     <ul>
      <li>Local files</li>
      <li>SQL databases</li>
      <li>NoSQL database (such as
       <a href="http://www.mongodb.org/">MongoDB</a>)</li>
      <li>Distributed Hash Tables (such as
       <a href="http://memcached.org/">Memcached</a> or
       <a href="http://redis.io/">Redis</a>)</li>
     </ul>

     <h2>Standards compliant</h2>

     <p>
      Horde/Imap_Client is strictly RFC compliant, so it works out-of-the box
      with all IMAP servers (even Gmail). Additionally, Horde/Imap_Client
      natively implements important core functionality that may not be
      available on your mail server. For example, message threading and FULL
      sorting (not a limited subset) are always available, regardless of
      whether your IMAP server supports the
      <a href="http://tools.ietf.org/html/rfc5256">THREAD/SORT extensions</a>.
     </p>

     <h2>Code quality</h2>

     <p>
      Unlike any other PHP IMAP library, Horde/Imap_Client was designed from
      the ground up to be extensible.  This means clean, object-oriented design
      that allows for easier debugging and ability to add enhancements in
      the future.
     </p>

     <p>
      It's the details that matter. For example, Horde/Imap_Client uses a true
      tokenizer parser to interpret the IMAP commands returned from the server.
      Most (if not all) other PHP IMAP libraries are using regular expressions
      to parse this data, which is a prime example of "You're Doing It
      Wrong (TM)". True lexical tokenizing is faster, uses less memory, and
      -- most important -- handles improper syntax more elegantly.
     </p>

     <p>
      Additionally, the code is liberally commented and EVERY publicly
      accessible API has full documentation.  It may not be perfect. But at
      least we try to give you some idea of what's going on in there.
     </p>

     <p>
      The library contains hundreds of
      <a href="http://www.phpunit.de/">PHPUnit</a> unit tests that must pass
      before a release is finalized, to help ensure that upgrading the library
      will not cause issues to existing code.
     </p>

     <h2>Easy debugging</h2>

     <p>
      Full logging is available via a single configuration option, including
      timing information.
     </p>

     <h2>Advanced features</h2>

     <h3>CONDSTORE/QRESYNC</h3>

     <p>
      Horde/Imap_Client is the ONLY open-source PHP library that supports the
      <a href="http://tools.ietf.org/html/rfc4551">CONDSTORE</a> and
      <a href="http://tools.ietf.org/html/rfc5162">QRESYNC</a> IMAP extensions.
      These extensions ensure that changes made by other mail user agents
      (MUAs) are automatically synchronized. Without CONDSTORE, it is
      <em>impossible</em> to cache flag information so loading a mailbox on
      every page access requires parsing every message for flag changes.
      Additionally, these extensions are absolutely essential to correctly
      implement an AJAX mail interface that properly synchronizes changes, and
      to allow synchronization to things like
      <a href="http://www.horde.org/libraries/Horde_ActiveSync">ActiveSync</a>
      devices.
     </p>

     <h3>Access Control Lists (ACLs)</h3>

     <p>
      Full ACL support, with abstracted management of the ACLs so that
      a developer does not need to worry whether a server supports either
      <a href="http://tools.ietf.org/html/rfc2086">"old"</a> or
      <a href="http://tools.ietf.org/html/rfc4314">"new"</a> style ACLs.
     </p>

     <h3>Advanced IMAP extensions</h3>

     <p>
      Supports, among other advanced extensions,
      <a href="http://tools.ietf.org/html/rfc3502">MULTIAPPEND</a>,
      <a href="http://tools.ietf.org/html/rfc3516">BINARY</a>,
      <a href="http://tools.ietf.org/html/rfc4469">CATENATE</a>,
      <a href="http://tools.ietf.org/html/rfc4315">UIDPLUS</a>,
      <a href="http://tools.ietf.org/html/rfc4731">ESEARCH</a>,
      <a href="http://tools.ietf.org/html/rfc5256">THREAD/SORT</a>,
      <a href="http://tools.ietf.org/html/rfc5267">ESORT</a>,
      <a href="http://tools.ietf.org/html/rfc5819">LIST-STATUS</a>,
      <a href="http://tools.ietf.org/html/rfc6154">SPECIAL-USE</a>, and
      <a href="http://tools.ietf.org/html/rfc6851">MOVE</a>.
      Most of these extensions were specifically designed for
      <a href="http://en.wikipedia.org/wiki/Lemonade_Profile">disconnected
      clients</a> and vastly reduce the amount of bandwidth and processing
      needed to keep the client synchronized with the server.
     </p>
    </div>

    <div id="sidebar">
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
