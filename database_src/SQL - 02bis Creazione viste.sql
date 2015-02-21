DROP VIEW IF EXISTS `pariopp`.vRSSFEEDS;

CREATE VIEW `pariopp`.vRSSFEEDS
AS

	SELECT
		ol.ID,
        "offertelavoro" AS nometab,
		"Nuova offerta di lavoro" AS news,
        concat(ol.AZIENDA_NOME, ' ricerca: ', ol.TITOLO_LAVORO, ' per sede di ', ol.AZIENDA_CITTA, '(', ol.AZIENDA_PROVINCIA, ') - ', n.DESCRIZIONE) AS snippet,
		DATA_INSERIMENTO AS data
	FROM
		`pariopp`.offertelavoro ol
        LEFT JOIN `pariopp`.nazioni n ON ol.FK_NAZIONE = n.ID
		
UNION

	SELECT
		ev.ID,
		"eventi" AS nometab,
		"Nuovo evento" AS news,
		ev.TITOLO AS snippet
		DATE_FORMAT(INSERITO_IL, "%Y-%m-%d") AS giorno
	FROM
		`pariopp`.agendaeventi ev;


/*
//ESEMPIO:

select * from vRSSFEEDS;

*/