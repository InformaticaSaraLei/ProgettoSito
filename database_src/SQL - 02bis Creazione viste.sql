DROP VIEW IF EXISTS `pariopp`.vRSSFEEDS;

CREATE VIEW `pariopp`.vRSSFEEDS
AS
	SELECT
		ID,
		"opportunitaculturalipersone" AS nometab,
		"Nuova opportunità culturale" AS news,
		concat(nome, ' ', cognome, ' - ', RUOLO_ATTUALE, ' presso ', AZIENDA_ATTUALE) as snippet,
		DATA_INSERIMENTO AS data
	FROM
		`pariopp`.opportunitaculturalipersone
UNION
	SELECT
		ol.ID,
        "offertelavoro" AS nometab,
		"Nuova offerta di lavoro" AS news,
        concat(ol.AZIENDA_NOME, ' ricerca: ', ol.TITOLO_LAVORO, ' per sede di ', ol.AZIENDA_CITTA, '(', ol.AZIENDA_PROVINCIA, ') - ', n.DESCRIZIONE) as snippet,
		DATA_INSERIMENTO AS data
	FROM
		`pariopp`.offertelavoro ol
        LEFT JOIN `pariopp`.nazioni n ON ol.FK_NAZIONE = n.ID;


/*
//ESEMPIO:

select * from vRSSFEEDS;

*/