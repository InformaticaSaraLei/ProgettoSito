/*

### Se il DB esiste gi�, cancellare quello esistente (CON ATTENZIONE):
DROP DATABASE IF EXISTS pariopp;

### Se il DB non esiste, prima dovr� crearlo:
CREATE DATABASE pariopp
	DEFAULT CHARACTER SET = UTF8;

### Una volta creato il DB, eseguire in una volta sola TUTTO il codice
### presente in questo file (in MySql Workbench, selezionare tutto e poi
### immettere da tastiera la combinazione CTRL+SHIFT+ENTER).
### Il codice commentato ovviamente non verr� eseguito, e la cosa � deliberatamente voluta.
*/

USE pariopp;

START TRANSACTION;
/*
SET FOREIGN_KEY_CHECKS=0;
*/


CREATE TABLE IF NOT EXISTS `pariopp`.`nazioni` (
	ID CHAR(2) NOT NULL,
	DESCRIZIONE VARCHAR(100) NOT NULL,
    
    PRIMARY KEY(ID),
    UNIQUE INDEX nazioni_descrizione (DESCRIZIONE ASC)
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`tags` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    TAG VARCHAR(50) NOT NULL,
    
	PRIMARY KEY(ID),
    UNIQUE INDEX tags_tag (TAG)
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`newsletterusers` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	EMAIL VARCHAR(50) NOT NULL,
    REGISTRATO_IL timestamp NOT NULL DEFAULT now(),
    
    PRIMARY KEY(ID),
    UNIQUE INDEX newsletterusers_email (`EMAIL` ASC)
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`utenti` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,    
	USERNAME VARCHAR(50) NOT NULL,
	PASSWORD CHAR(40) NOT NULL,
	NOME VARCHAR(50) NOT NULL,
	COGNOME VARCHAR(50) NOT NULL,
	EMAIL VARCHAR(50) NOT NULL,
	ISADMIN TINYINT(1) NOT NULL DEFAULT 0,
    REGISTRATO_IL TIMESTAMP NOT NULL DEFAULT now(),
	
    PRIMARY KEY(ID)
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`agendaeventi` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	TITOLO VARCHAR(100) NOT NULL,
	DESCRIZIONE VARCHAR(2000) NOT NULL,
    CONTENUTO VARCHAR(13500) NOT NULL,
    INIZIO DATETIME NOT NULL,
	FINE DATETIME NOT NULL,
 	PROVINCIA CHAR(2) NOT NULL,
 	COMUNE VARCHAR(50) NOT NULL,
 	INDIRIZZO VARCHAR(60) NOT NULL,
 	IMG_NOME VARCHAR(100) DEFAULT"",
    INSERITO_IL TIMESTAMP NOT NULL DEFAULT now(),
 	FK_INSERITO_DA INT UNSIGNED NOT NULL,
    
    PRIMARY KEY(ID),
    
	FOREIGN KEY `FK_agendaeventi_INSERITO_DA`(`FK_INSERITO_DA` )
			REFERENCES `pariopp`.`utenti`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE
            
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`offertelavorostati` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	STATO varchar(50) NOT NULL,
	
    PRIMARY KEY(ID)
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`offertelavoro` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	TITOLO_LAVORO VARCHAR(200) NOT NULL,
	TIPO_CONTRATTO VARCHAR(100) NOT NULL,
    AZIENDA_NOME VARCHAR(100) NOT NULL,
    AZIENDA_PROVINCIA VARCHAR(2) NOT NULL,
    AZIENDA_CITTA VARCHAR(50) NOT NULL,
    AZIENDA_LATITUDINE VARCHAR(50),
    AZIENDA_LONGITUDINE VARCHAR(50),    
	CONTATTO_TEL varchar(50),
	CONTATTO_FAX varchar(50),
	CONTATTO_EMAIL varchar(50) NOT NULL,
	FONTE_DESCR varchar(200) NOT NULL, 
	FONTE_LINK varchar(200),
	OFFERTA_LINK_SITO_PARIOPP varchar(200),
	SNIPPET_ANNUNCIO varchar(10000) NOT NULL,
	DATA_INSERIMENTO date NOT NULL,
	FK_STATO_OFFERTA int unsigned NOT NULL,
    FK_NAZIONE CHAR(2) NOT NULL,
    
    PRIMARY KEY(ID),
   	FOREIGN KEY `FK_offertelavoro_STATO_OFFERTA`(`FK_STATO_OFFERTA` )
			REFERENCES `pariopp`.`offertelavorostati`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_offertelavoro_NAZIONE`(`FK_NAZIONE` )
			REFERENCES `pariopp`.`nazioni`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`offertelavorostorico` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	FK_OFFERTA int unsigned not null,
	FK_STATO_OFFERTA int unsigned not null,
	FK_UTENTE int unsigned not null,
	DATA_REGISTRAZIONE timestamp not null DEFAULT now(),
    
    PRIMARY KEY(ID),
	FOREIGN KEY `FK_offertelavorostorico_OFFERTA`(`FK_OFFERTA` )
			REFERENCES `pariopp`.`offertelavoro`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_offertelavorostorico_OFFSTAT`(`FK_STATO_OFFERTA` )
			REFERENCES `pariopp`.`offertelavorostati`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_offertelavorostorico_UTENTE`(`FK_UTENTE` )
			REFERENCES `pariopp`.`utenti`(`id`)
			ON DELETE CASCADE
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`media` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	NOME VARCHAR(100),
    DATA_REALIZZAZIONE DATETIME NOT NULL,
    RISOLUZIONE VARCHAR(100) NOT NULL,
    FORMATO VARCHAR(100) NOT NULL,
    LINK VARCHAR(100) NOT NULL,
    LONGITUDINE VARCHAR(50),
    LATITUDINE VARCHAR(50),
    TIPOMEDIA ENUM('Video', 'Foto') NOT NULL DEFAULT 'Foto',
    DURATA INT UNSIGNED NOT NULL DEFAULT 0,
    LASTMOD TIMESTAMP NOT NULL DEFAULT now() ON UPDATE now(),
    
    PRIMARY KEY(ID)
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`offertelavorotags` (
	FK_TAG INT UNSIGNED NOT NULL,
	FK_OFFERTE INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(FK_TAG, FK_OFFERTE),
	FOREIGN KEY `FK_offertelavorotags_TAG`(`FK_TAG` )
			REFERENCES `pariopp`.`tags`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_offertelavorotags_OFFERTE`(`FK_OFFERTE` )
			REFERENCES `pariopp`.`offertelavoro`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`config` (
	ID INT UNSIGNED NOT NULL,
	WEBSITE_URI VARCHAR(500) NOT NULL,
	
	PRIMARY KEY(ID)
) ENGINE=InnoDB;


/*
SET FOREIGN_KEY_CHECKS=1;
*/
COMMIT;
