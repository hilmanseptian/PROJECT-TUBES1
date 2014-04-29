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

// step 1 - links:
$aLinks = array();
$vRes = $xpath->query(".//*[@id='top-stories']/div/h2/a[1]");
foreach ($vRes as $obj) {
    $aLinks[] = $obj->getAttribute('href');
}

// step 2 - titles:
$aTitles = array();
$vRes = $xpath->query(".//*[@id='top-stories']/div/h2/a[1]/span");
foreach ($vRes as $obj) {
    $aTitles[] = $obj->nodeValue;
}

// step 3 - descriptions:
$aDescriptions = array();
$vRes = $xpath->query(".//*[@id='top-stories']/div/div[@class='body']/div[1]");
foreach ($vRes as $obj) {
    $aDescriptions[] = $obj->nodeValue;
}

echo '<link href="css/styles.css" type="text/css" rel="stylesheet"/><div class="main">';
echo '<h1>Using xpath for dom html</h1>';

$entries = $xpath->evaluate('.//*[@id="headline-wrapper"]/div[1]/div/h2/span');
echo '<h1>' . $entries->item(0)->nodeValue . ' google news</h1>';

$i = 0;
foreach ($aLinks as $sLink) {
    echo <<<EOF
<div class="unit">
    <a href="{$sLink}">{$aTitles[$i]}</a>
    <div>{$aDescriptions[$i]}</div>
</div>
EOF;
    $i++;
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
