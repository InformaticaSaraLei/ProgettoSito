DROP VIEW IF EXISTS vRSSFEEDS;

CREATE VIEW vRSSFEEDS
AS
/*
	SELECT
		ID,
        "esperienzedonne" AS nometab,
		"Nuova esperienza di una donna" AS news,
		concat(nome, ' ', cognome, ": donna da ", RETRIBUZIONE, " - La sua storia: ", MOTIVO_NOTORIETA) AS snippet
	FROM
		esperienzedonne
UNION
*/
	SELECT
		ID,
		"opportunitaculturalipersone" AS nometab,
		"Nuova opportunità culturale" AS news,
		concat(nome, ' ', cognome, ' - ', RUOLO_ATTUALE, ' presso ', AZIENDA_ATTUALE) as snippet,
		DATA_INSERIMENTO AS data
	FROM
		opportunitaculturalipersone
UNION
	SELECT
		ol.ID,
        "offertelavoro" AS nometab,
		"Nuova offerta di lavoro" AS news,
        concat(ol.AZIENDA_NOME, ' ricerca: ', ol.TITOLO_LAVORO, ' per sede di ', ol.AZIENDA_CITTA, '(', ol.AZIENDA_PROVINCIA, ') - ', n.DESCRIZIONE) as snippet,
		DATA_INSERIMENTO AS data
	FROM
		offertelavoro ol
        LEFT JOIN nazioni n ON ol.FK_NAZIONE = n.ID;


/*

select * from vRSSFEEDS;

*/