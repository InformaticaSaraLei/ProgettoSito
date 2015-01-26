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

echo 'connesso con successo';

mysql_close($link);



//seleziono i dati

$selezionedati = "SELECT * FROM vRSSFEEDS ORDER BY data";

$query = mysql_query($selezionedati) or die(mysql_error());

// Modifico l'intestazione e il tipo di documento da PHP a XML
header("Content-type: text/xml");

// Eseguo le operazioni di scrittura sul "file xml"
echo("<rss version=\"2.0\">");
echo("<channel>");
echo("<title>Notizie da Informatica Sarà Lei</title>");
echo("<link>http://test01.dsi.unive.it</link>");
echo("<description>Descrizione</description>");
echo "<docs>http://test01.dsi.unive.it/servizi/RSS.php</docs>";

echo("<language>IT-it</language>");
while ($array = mysql_fetch_array($query)) {
    echo "
		<item>
			<title><![CDATA[<p>" . $array['news'] . "</p>]]></title>
			<description><![CDATA[<p>" . $array['snippet'] . "</p>]]></description>
			<pubDate>" . date('D, d M Y H:i:s O', $array['data']) . "</pubDate>
		</item>";
}
echo "</channel></rss>";
?>

<!-- Per Inserimento Feed

<a href="http://www.xul.fr/rss.xml">
   <img src="rss.gif">
</a>

-->
