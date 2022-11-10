<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Horde/Pdf: Native PHP PDF generation</title>

  <link href="/pdf/stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" />
  
</head>
<body id="contents_home">
  <div id="wrapper">

  <div id="header" class="clr">
    <div id="logo" class="left">
      <span>
      <img alt="Horde/Pdf" src="/pdf/images/common/logo.gif" />
      </span>
    </div>
      <ul id="nav" class="right">
        <li>Home</li>
        <li><a href="/pdf/install.html">Install</a></li>
<!--        <li><a href="/pdf/integrate.html">Integrate</a></li>
        <li><a href="/pdf/manual/index.html">Manual</a></li> -->
      </ul>
  </div>

  <div id="content" class="clr">
      
  <h1>Home</h1>

  <div id="main">
    <h2 id="contrib">Examples and Extensions</h2>
    <p>
      This is an extensive source of extended functionality for
      File_PDF. These scripts were ported from FPDF to File_PDF by
      Javier Mestre.
    </p>

    <ul>
<?php
$zips = glob(dirname(__FILE__) . '/*.zip');
natcasesort($zips);
foreach ($zips as $zip) {
    $zip = basename($zip);
    echo '<li><a href="' . htmlspecialchars($zip) . '">' . htmlspecialchars($zip) . '</a></li>';
}
?>
    </ul>
  </div> <!-- /main -->

  <div id="sidebar">
  <div class="side_item">
    <h4>Latest Version</h4>
    <p><a href="/pdf/install.html">Version 0.3.1</a></p>
    <div class="side_bottom">&nbsp;</div>
  </div>

  <div class="side_item">
    <h4>Developers</h4>
    <p>
      <a href="http://janschneider.de/">Jan Schneider</a>
    </p>
    <p>
      <a href="http://chuck.hagenbu.ch">Chuck Hagenbuch</a>
    </p>

    <div class="side_bottom">&nbsp;</div>
  </div>

<!--
  <div class="side_item">
    <h4>License</h4>
    <p>
      Horde/Pdf is free software, covered by a standard <a href="http://opensource.org/licenses/bsd-license.php">BSD license</a>
      and is &copy; 2007-2008 <a href="http://www.horde.org/">The Horde Project</a>.
    </p>
    <div class="side_bottom">&nbsp;</div>
  </div>
-->
</div>


  </div>

  <div id="footer" class="clr">
    <span class="right">
      Horde/Pdf is part of the <a href="http://www.horde.org">Horde Project</a>.
    </span>
  </div>

  

  </div>
</body>
</html>
