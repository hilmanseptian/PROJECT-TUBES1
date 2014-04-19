PROJECT-TUBES1
==============

Tugas Besar 1 Layanan Web

A simple and efficient DOMDocument based PHP HTML and XML Parser. It accepts both css selector and xpath queries to search the document and handles malformed HTML as well.

Example:

$html = HtmlParser::from_string('<div id="outer"><span class="red">Some Text</span></div>');
$text = $html->find('#outer .red', 0)->text;
echo $text;   // outputs "Some Text"

