DROP VIEW IF EXISTS pariopp.vRSSFEEDS;

CREATE VIEW pariopp.vRSSFEEDS
AS
	select 
		ol.ID AS ID,
		'offertelavoro' AS nometab,
		concat('Nuova offerta di lavoro: ',ol.TITOLO_LAVORO, ' presso ', ol.AZIENDA_NOME)  AS news,
		concat(ol.AZIENDA_NOME,
				' ricerca: ',
				ol.TITOLO_LAVORO,
				' per sede di ',
				ol.AZIENDA_CITTA,
				'(',
				ol.AZIENDA_PROVINCIA,
				') - ',
				n.DESCRIZIONE) AS snippet,
		ol.DATA_INSERIMENTO AS giorno,
		concat((SELECT GET_WEBSITE_URI()),
				(SELECT GET_WEBPAGE_OFFERTELAVORO_QUERY()),
				ol.ID) as Link
		
		from
			pariopp.offertelavoro ol
			left join pariopp.nazioni n ON ol.FK_NAZIONE = n.ID 
			
	union select 
        ev.ID AS ID,
        'eventi' AS nometab,
        concat('Nuovo evento: ',TITOLO) AS news,
        ev.CONTENUTO AS snippet,
        date_format(ev.INSERITO_IL, '%Y-%m-%d') AS giorno,
		concat((SELECT GET_WEBSITE_URI()),
				(SELECT GET_WEBPAGE_AGENDAEVENTI_QUERY()),
				ev.ID) as Link
    from
        pariopp.agendaeventi ev;

/*
//ESEMPIO:

select * from vRSSFEEDS;

*/
