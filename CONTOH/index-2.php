========================
ini "copas" untuk CONTOH
========================
============================================================================
source : http://www.script-tutorials.com/how-to-parse-web-pages-using-xpath/
============================================================================

<?php
$sUrl = 'http://news.google.com/news/section?pz=1&cf=all&topic=t&ict=ln';
$sUrlSrc = getWebsiteContent($sUrl);

// Load the source
$dom = new DOMDocument();
@$dom->loadHTML($sUrlSrc);

$xpath = new DomXPath($dom);

// all links contain 'iPhone':
$aLinks = array();
$vRes = $xpath->query(".//*[@id='top-stories']/div/h2/a[1]/span[contains(text(),'iPhone')]");
foreach ($vRes as $obj) {
    $aLinks[$obj->nodeValue] = $obj->parentNode->getAttribute('href');
}

// all links from 5 to 10
$aLinks2 = array();
$vRes = $xpath->query(".//*[@id='top-stories']/div[position() > 5][position() < 10]/h2/a[1]/span");
foreach ($vRes as $obj) {
    $aLinks2[$obj->nodeValue] = $obj->parentNode->getAttribute('href');
}

echo '<link href="css/styles.css" type="text/css" rel="stylesheet"/><div class="main">';
echo '<h1>Using xpath for dom html (2)</h1>';

echo '<h1>All links contain "iPhone" word</h1>';
foreach ($aLinks as $sTitle => $sLink) {
    echo <<<EOF
<div class="unit">
    <a href="{$sLink}">{$sTitle}</a>
</div>
EOF;
}
echo '<hr /><h1>Links from 5 to 10</h1>';
foreach ($aLinks2 as $sTitle => $sLink) {
    echo <<<EOF
<div class="unit">
    <a href="{$sLink}">{$sTitle}</a>
</div>
EOF;
}
echo '</div>';

// this function will return page content using caches (we will load original sources not more than once per hour)
function getWebsiteContent($sUrl) {
    // our folder with cache files
    $sCacheFolder = 'cache/';

    // cache filename
    $sFilename = date('YmdH').'.html';

    if (! file_exists($sCacheFolder.$sFilename)) {
        $ch = curl_init($sUrl);
        $fp = fopen($sCacheFolder.$sFilename, 'w');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15'));
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
    return file_get_contents($sCacheFolder.$sFilename);
}

?>
