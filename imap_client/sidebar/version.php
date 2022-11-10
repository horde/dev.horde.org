<?php

function autoloadHttp($class) {
    require __DIR__ . '/../lib/' . str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
}
spl_autoload_register('autoloadHttp');

try {
    $http = new Horde_Http_Client();
    $version = $http->get('http://pear.horde.org/rest/r/horde_imap_client/latest.txt')->getBody();
    $info = new SimpleXMLElement(
        $http->get('http://pear.horde.org/rest/r/horde_imap_client/' . $version . '.xml')->getBody()
    );
?>
<div class="side_item">
 <h4>Latest Version</h4>
 <p><a href="<?php echo htmlspecialchars($info->g . '.tgz') ?>">Version <?php echo trim(htmlspecialchars($version)) ?></a></p>
 <p>Released: <?php echo trim(htmlspecialchars($info->da)) ?></p>
 <div class="side_bottom">&nbsp;</div>
</div>
<?php
} catch (Exception $e) {
    $version = 'Unknown';
}
