<?php
include_once '../settings.php';

$link = mysql_connect(SETTINGS_DBHOST, SETTINGS_USERNAME, SETTINGS_PASSWORD);
if (!$link) {
    die ('Non riesco a connettermi: ' . mysql_error());
}

$db_selected = mysql_select_db(SETTINGS_DATABASE, $link);
if (!$db_selected) {
    die ("Errore nella selezione del database: " . mysql_error());
}

//echo 'connesso con successo';

//mysql_close($link);


//seleziono i dati

$selezionedati = "SELECT id, nometab, news, snippet, data, date_format(`data`, '%a, %d %b %Y %H:%i:%s +0100') 
as `data1`,Link FROM vRSSFEEDS ORDER BY data DESC";

$query = mysql_query($selezionedati) or die(mysql_error());

// Modifico l'intestazione e il tipo di documento da PHP a XML
header("Content-type: text/xml");

// Eseguo le operazioni di scrittura sul "file xml"
echo("<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n");
echo("<rss version=\"2.0\">\n\n");
echo("<channel>\n");
echo("<title>Notizie da Informatica Sarà Lei</title>\n");
echo("<link>http://test01.dsi.unive.it</link>\n");
echo("<description>Descrizione</description>\n");
echo "<docs>http://test01.dsi.unive.it/servizi/RSS.php</docs>\n";

echo("<language>IT-it</language>");
while ($array = mysql_fetch_array($query)) {
    echo "
		<item>
			<title><![CDATA[\n" . htmlentities($array['news']) . "\n]]></title>
			<description><![CDATA[\n<p>" . htmlentities($array['snippet']) . "</p>\n]]></description>
			<pubDate>" . $array['data1'] . "</pubDate>
			<link>" . htmlentities($array['Link']) . "</link>
		</item>";
}
echo "</channel>\n</rss>\n";
?>

<!-- Per Inserimento Feed

<a href="http://www.xul.fr/rss.xml">
   <img src="rss.gif">
</a>

-->
