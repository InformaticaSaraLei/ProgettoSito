/*
	Ho problemi con la VPN d'Ateneo: funziona a tratti, e sempre meno.
	Ho apportato delle modifiche al codice, ma bisogna eseguire le variazioni anche sul DB di produzione, sul server test01.
		A.
		
	Di seguito le istruzioni da eseguire (nell'ordine):
*/

#1)
ALTER TABLE offertelavoro ADD COLUMN OFFERTA_LINK_SITO_PARIOPP varchar(200) AFTER FONTE_LINK;

#2)
# ESEGUIRE TUTTO IL CONTENUTO DEL FILE: 
# database_src/SQL - 02bis Creazione viste.sql

3)
drop table `pariopp`.`opportunitaculturalicarriera`;

4)
drop table `pariopp`.`opportunitaculturalipersone`;

