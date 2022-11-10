<?php
$branches = array_map(create_function('$a', 'return preg_replace("/translation_stats_(.*)\.txt/", "$1", $a);'), glob('translation_stats_*.txt'));
$branch = basename(@$_GET['branch']);
if (empty($branch) || !in_array($branch, $branches)) {
    $branch = 'Git master';
}
$sort = @$_GET['sort'];
if (empty($sort)) {
    $sort = 'module';
}
?>
<html>
<title>Translation statistics</title>
<link rel="stylesheet" type="text/css" href="hordedoc.css" />
</html>
<body>
<h1 class="title">Translation statistics</h1>

<h1>Branches</h1>
<ul>
  <?php foreach ($branches as $branch_name): ?>
  <li><a href="index.php?branch=<?php echo rawurlencode($branch_name) ?>&amp;sort=<?php echo $sort ?>"><?php echo htmlspecialchars($branch_name) ?></a></li>
  <?php endforeach; ?>
</ul>
<h1>Sorting</h1>
<ul>
  <li><a href="index.php?branch=<?php echo $branch ?>&amp;sort=module">Modules</a></li>
  <li><a href="index.php?branch=<?php echo $branch ?>&amp;sort=lang">Languages</a></li>
</ul>

<h1><?php echo ($sort == 'module' ? 'Modules' : 'Languages') . ' - ' . $branch ?> branch</h1>
<?php

$bar = 200; // bar width in pixel

$fp = fopen('translation_stats_' . $branch . '.txt', 'r');
$stats = fread($fp, filesize('translation_stats_' . $branch . '.txt'));
$stats = unserialize($stats);
ksort($stats);

echo "<ul>\n";
$langs = array();
foreach ($stats as $app => $stat) {
    if ($sort == 'module') {
        echo sprintf('<li><a href="#%s">%s</a></li>%s', $app, $app, "\n");
    } else {
        foreach (array_keys($stat) as $lang) {
            $langs[$lang] = true;
        }
    }
}
if ($sort == 'lang') {
    ksort($langs);
    foreach (array_keys($langs) as $lang) {
        echo sprintf('<li><a href="#%s">%s</a></li>%s', $lang, $lang, "\n");
    }
} else {
    $langs = array(1);
}
echo "</ul>\n";

foreach (array_keys($langs) as $lang) {
    if ($sort == 'lang') {
        echo sprintf('<h2><a name="%s">%s</a></h2><br />%s', $lang, $lang, "\n");
        echo '<table cellspacing="0" border="1">';
        echo '<tr><th>Translation</th><th>&nbsp;</th><th style="color:green">Translated</th><th style="color:blue">Fuzzy</th><th style="color:red">Untranslated</th><th>Last Update</th></tr>' . "\n";
    }
    foreach ($stats as $app => $languages) {
        if ($sort == 'module') {
            echo sprintf('<h2><a name="%s">%s</a></h2><br />%s', $app, $app, "\n");
            echo '<table cellspacing="0" border="1">';
            echo '<tr><th>Translation</th><th>&nbsp;</th><th style="color:green">Translated</th><th style="color:blue">Fuzzy</th><th style="color:red">Untranslated</th><th>Last Update</th></tr>' . "\n";
            uasort($languages, 'statSort');
        }
        foreach ($languages as $language => $stat) {
            if ($sort == 'lang' && $language != $lang) {
                continue;
            }
            $updated = empty($stat[3]) ? '&nbsp;' : $stat[3];
            unset($stat[3]);
            $sum = array_sum($stat);
            $stat = array('trans' => $stat[0], 'fuzzy' => $stat[1], 'untrans' => $stat[2]);
            asort($stat);
            $i = 1;
            $cum = 0;
            $width = array();
            foreach (array_keys($stat) as $type) {
                if ($i == 3) {
                    $width[$type] = $bar - $cum;
                } elseif ($stat[$type] > 0) {
                    $width[$type] = max(1, round($bar * $stat[$type] / $sum));
                } else {
                    $width[$type] = 0;
                }
                $cum += $width[$type];
                $i++;
            }

            if ($sort == 'module') {    
                echo sprintf("<tr><td>%s</td>\n", $language);
            } else {
                echo sprintf("<tr><td>%s</td>\n", $app);
            }
            echo '<td>';
            if (isset($width['trans'])) echo '<img src="bar0.gif" height="15" width="' . $width['trans'] . '" />';
            if (isset($width['fuzzy'])) echo '<img src="bar4.gif" height="15" width="' . $width['fuzzy'] . '" />';
            if (isset($width['untrans'])) echo '<img src="bar1.gif" height="15" width="' . $width['untrans'] . '" />';
            echo "</td>\n";
            echo sprintf('<td>%s</td>', $stat['trans']);
            echo sprintf('<td>%s</td>', $stat['fuzzy']);
            echo sprintf('<td>%s</td>', $stat['untrans']);
            echo sprintf('<td>%s</td>', $updated);
            echo "</tr>\n";
        }
        if ($sort == 'module') {
            echo "</table>\n";
        }
    }
    if ($sort == 'lang') {
        echo "</table>\n";
    }
}

function statSort($a, $b)
{
    for ($i = 0; $i < 3; $i++) {
        if ($a[$i] != $b[$i]) {
            return $a[$i] > $b[$i] ? -1 : 1;
        }
    }
    return 0;
}

?>
<br />
<div style="border-top: 1px solid black; text-align: right;">Last updated: <?php echo strftime('%H:%M %Z %Y-%m-%d', filemtime('translation_stats_' . $branch . '.txt')) ?></div>
</body>
</html>
