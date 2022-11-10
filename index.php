<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Horde Development Resources</title>
<style type="text/css">
<!--
body {
    background-color: #ffffff;
    color: #000000;
    font-family: Tahoma, Verdana, "Myriad Web", Syntax, sans-serif;
    font-size: 9pt;
    margin: 10px;
}
h1 {
    font-size: 16pt;
    font-weight: normal;
    text-align: center;
}
h2 {
    color: #990000;
    border-bottom: 1px solid black;
    font-size: 12pt;
    font-weight: normal;
    text-align: left;
    margin-bottom: 2px;
}
td {
    padding-left: 5px;
    padding-right: 3px;
    font-size: 9pt;
}
ul {
    padding-left: 20px;
    list-style-type: disc;
}
.apiname {
    border-right: 1px solid #999999;
    padding-right: 10px;
    text-align: right;
}
.apidate {
    color: #666666;
    font-size: 8pt;
    padding-left: 20px;
}
//-->
</style>
</head>

<?php

function frameworkSection($version)
{
    switch ($version) {
    case 'h4':
        $dir = './api/FRAMEWORK_4/lib/';
        break;

    case 'h5':
        $dir = './api/master/lib/';
        break;
    }

    try {
        $di = new DirectoryIterator($dir);
    } catch (Exception $e) {
        return;
    }

    $lib = array();
    foreach ($di as $node) {
        if ($node->isDir() &&
            !$node->isDot() &&
            !($node->getFilename() == 'bin')) {
            $lib[] = $node->getFilename();
        }
    }

    sort($lib, SORT_STRING);

    foreach ($lib as $file) {
        $tar_file = $dir . $file . '/' . $file . '.tar.gz'; 
        $tar_size = round(@filesize($tar_file) / 1024);
        $api_date = date('Y-m-d H:i T', @filemtime($dir . $file . '/index.html'));
       
        echo "<tr>";
        echo "<td class=\"apiname\"><b>$file</b></td>";
        echo "<td><a href=\"${dir}$file/\">View Online</a></td>";
        echo "<td><a href=\"$tar_file\">$file.tar.gz</a> (${tar_size}k)</td>";
        echo "<td class='apidate'>Last updated: $api_date</td>";
        echo "</tr>\n";
    }   
}

function apiRow($app, $name, $version)
{
    switch ($version) {
    case 'h3':
        $dir = './api.fw3/' . $app . '/';
        $logs = true;
        break;
        
    case 'h4':
        $dir = './api/FRAMEWORK_4/app/' . $app . '/';
        $logs = false;
        break;

    case 'h5':
        $dir = './api/master/app/' . $app . '/';
        $logs = false;
        break;
    }

    $tar_file = $dir . $app . '.tar.gz';
    if (!file_exists($tar_file)) {
        return;
    }
    $tar_size = round(@filesize($tar_file) / 1024);
    $api_date = date('Y-m-d H:i T', @filemtime($dir . 'index.html'));

    echo "<tr>";
    echo "<td class=\"apiname\"><b>$name</b></td>";
    echo "<td><a href=\"$dir\">View Online</a></td>";
    if ($logs) {
        echo "<td><a href=\"${dir}$app.log\">Log File</a></td>";
        echo "<td><a href=\"${dir}errors.html\">Errors</a></td>";
    }
    echo "<td><a href=\"$tar_file\">$app.tar.gz</a> (${tar_size}k)</td>";
    echo "<td class='apidate'>Last updated: $api_date</td>";
    echo "</tr>\n";
}

?>

<body>
<h1>Horde Development Resources</h1>

<h2>Source Code</h2>
<ul>
<li><a href="http://www.horde.org/source/">Anonymous Git</a></li>
<li><a href="http://github.com/horde/horde/">Web Interface (GitHub)</a></li>
</ul>

<h2>Mailing Lists</h2>
<ul>
<li><a href="http://www.horde.org/mail/">Mailing List Information</a></li>
<li><a href="http://lists.horde.org/">Public Mailing Lists</a></li>
</ul>

<h2>Other stuff</h2>
<ul>
<li><a href="https://travis-ci.org/horde/horde">Continuous Integration Results</a></li>
<li><a href="http://wiki.horde.org/">Horde Wiki</a></li>
<li><a href="http://git.horde.org/skeleton/">Skeleton Module</a> (<a href="https://github.com/horde/horde/tree/master/skeleton">GitHub</a>)</li>
<li><a href="http://dev.horde.org/i18n/">Translation Statistics</a></li>
</ul>

<h2>API References - Horde 5</h2>

<h3>Horde 5 Base</h3>
<table border="0" cellpadding="0" cellspacing="0">
<?php apiRow('horde', 'Horde', 'h5'); ?>
</table>

<h3>Horde 5 Applications</h3>
<table border="0" cellpadding="0" cellspacing="0">
<?php
    $h5_apps = array(
        'Agora', 'Ansel', 'Chora', 'Gollem', 'Hermes', 'IMP', 'Ingo', 'Jonah',
        'Klutz', 'Kronolith', 'Mnemo', 'Nag', 'Passwd', 'Sesha', 'Skeleton',
        'Trean', 'Turba', 'Ulaform', 'Whups', 'Wicked'
    );
    foreach ($h5_apps as $val) {
        apiRow(strtolower($val), $val, 'h5');
    }
?>
</table>

<h3>Horde 5 Packages</h3>
<table border="0" cellpadding="0" cellspacing="0">
<?php frameworkSection('h5');?>
</table>

<h2>API References - Horde 4</h2>

<h3>Horde 4 Base</h3>
<table border="0" cellpadding="0" cellspacing="0">
<?php apiRow('horde', 'Horde', 'h4'); ?>
</table>

<h3>Horde 4 Applications</h3>
<table border="0" cellpadding="0" cellspacing="0">
<?php
    $h4_apps = array(
        'Agora', 'Ansel', 'Beatnik', 'Chora', 'Content', 'Components', 'Crumb',
        'Fima', 'Folks', 'Forwards', 'Genie', 'Gollem', 'Hermes', 'Hippo',
        'Hydra', 'IMP', 'Ingo', 'Jonah', 'Juno', 'Kastalia', 'Koward',
        'Klutz', 'Kronolith', 'Luxor', 'Merk', 'Midas', 'Mnemo', 'Mottle',
        'Nag', 'NIC', 'Operator', 'Passwd', 'Sam', 'Scry', 'Sesha', 'Shout',
        'Skeleton', 'Skoli', 'TimeObjects', 'Trean', 'Turba', 'Ulaform',
        'Vacation', 'Vilma', 'Volos', 'Whups', 'Wicked'
    );
    foreach ($h4_apps as $val) {
        apiRow(strtolower($val), $val, 'h4');
    }
?>
</table>

<h3>Horde 4 Packages</h3>
<table border="0" cellpadding="0" cellspacing="0">
<?php frameworkSection('h4');?>
</table>

<h2>API References - Horde 3</h2>

<table border="0" cellpadding="0" cellspacing="0">
<?php apiRow('horde', 'Horde', 'h3'); ?>
<tr><td class="apiname">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<?php
    $h3_apps = array(
        'Ansel', 'Chora', 'Dimp', 'Forwards', 'Framework', 'Gollem', 'Hermes',
        'IMP', 'Ingo', 'Klutz', 'Kronolith', 'Mimp', 'Mnemo', 'Nag', 'Passwd',
        'Scry', 'Turba', 'Vacation', 'Whups', 'Wicked'
    );
    foreach ($h3_apps as $val) {
        apiRow(strtolower($val), $val, 'h3');
    }
?>
</table>

</body>
</html>
