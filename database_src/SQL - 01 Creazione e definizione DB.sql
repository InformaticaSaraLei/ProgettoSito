/*

### Se il DB esiste gi�, cancellare quello esistente (ATTENZIONE):
DROP DATABASE IF EXISTS pariopp;

### Se il DB non esiste, prima dovr� crearlo:
CREATE DATABASE pariopp
	DEFAULT CHARACTER SET = UTF8;

### Una volta creato il DB, eseguire in una volta sola TUTTO il codice
### presente in questo file (in MySql Workbench, selezionare tutto e poi
### immettere da tastiera la combinazione CTRL+SHIFT+ENTER).
### Il codice commentato ovviamente non verr� eseguito, e la cosa � voluta.
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


CREATE TABLE IF NOT EXISTS `pariopp`.`lingue` (
	ID CHAR(3) NOT NULL,
    DESCRIZIONE VARCHAR(100) NOT NULL,
    
    PRIMARY KEY(ID)
    
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
	SNIPPET_ANNUNCIO varchar(200) NOT NULL,
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
			REFERENCES `pariopp`.`offertelavoroStati`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_offertelavorostorico_UTENTE`(`FK_UTENTE` )
			REFERENCES `pariopp`.`utenti`(`id`)
			ON DELETE CASCADE
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`esperienzedonne` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	NOME VARCHAR(50) NOT NULL,
    COGNOME VARCHAR(50) NOT NULL,
    NATA_ANNO INT UNSIGNED NOT NULL,
    NATA_CITTA VARCHAR(50) NOT NULL,
    FK_NATA_NAZIONE CHAR(2) NOT NULL,
    EDUCAZIONE VARCHAR(100) NOT NULL,
    AMBITO_LAVORO VARCHAR(100) NOT NULL,
    MOTIVO_NOTORIETA VARCHAR(500) NOT NULL,
    RETRIBUZIONE VARCHAR(100) NOT NULL,
    FOTO_NOMEFILE VARCHAR(100) NOT NULL DEFAULT "",
    LASTMOD TIMESTAMP NOT NULL DEFAULT now() ON UPDATE now(),
    
    PRIMARY KEY(ID),
	FOREIGN KEY `FK_esperienzedonne_NATA_NAZIONE`(`FK_NATA_NAZIONE` )
			REFERENCES `pariopp`.`nazioni`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`opportunitaculturalipersone` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	NOME VARCHAR(50) NOT NULL,
    COGNOME VARCHAR(50) NOT NULL,
    DATA_NASCITA DATE NOT NULL,
    FK_NAZIONALITA CHAR(2) NOT NULL,
    RUOLO_ATTUALE VARCHAR(100) NOT NULL,
    AZIENDA_ATTUALE VARCHAR(100) NOT NULL,
    AZIENDA_ATTUALE_SITOWEB VARCHAR(100) NOT NULL,
    STORIA VARCHAR(15000) NOT NULL,
    LASTMOD TIMESTAMP NOT NULL DEFAULT now() ON UPDATE now(),
    
    PRIMARY KEY(ID),
	FOREIGN KEY `FK_opportunitaculturalipersone_NAZIONALITA`(`FK_NAZIONALITA` )
			REFERENCES `pariopp`.`nazioni`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`opportunitaculturalicarriera` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    FK_OPPCULT_PERSONA INT UNSIGNED NOT NULL,
	DESCRIZIONE VARCHAR(2000) NOT NULL,
    TIPO_CARRIERA ENUM('Istruzione','Lavoro') NOT NULL,
    ORDINE_CRON_ESP INT NOT NULL,
    LASTMOD TIMESTAMP NOT NULL DEFAULT now() ON UPDATE now(),
    
    PRIMARY KEY(ID),
    UNIQUE KEY opportunitaculturalicarriera_persona_ordine (FK_OPPCULT_PERSONA, ORDINE_CRON_ESP),
	FOREIGN KEY `FK_opportunitaculturalicarriera_OPPCULT_PERSONA`(`FK_OPPCULT_PERSONA` )
			REFERENCES `pariopp`.`opportunitaculturalipersone`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`gioconomicontenuti` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	NOME_CONTENUTO VARCHAR(30) NOT NULL,
    
    PRIMARY KEY(ID)
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`giococontenuti` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	FK_NOME_CONTENUTO INT UNSIGNED NOT NULL,
    FK_LINGUA CHAR(3) NOT NULL,
    TESTO VARCHAR(16000) NOT NULL,
    
    PRIMARY KEY(ID),
    UNIQUE INDEX giococontenuti_tipo_nazione (FK_NOME_CONTENUTO, FK_LINGUA),
	FOREIGN KEY `FK_giococontenuti_NOME_CONTENUTO`(`FK_NOME_CONTENUTO` )
			REFERENCES `pariopp`.`gioconomicontenuti`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_giococontenuti_NOME_LINGUA`(`FK_LINGUA` )
			REFERENCES `pariopp`.`lingue`(`id`)
			ON DELETE RESTRICT
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


CREATE TABLE IF NOT EXISTS `pariopp`.`mediatags` (
	FK_MEDIA INT UNSIGNED NOT NULL,
    FK_TAG INT UNSIGNED NOT NULL,
    
	PRIMARY KEY(FK_MEDIA, FK_TAG),
	FOREIGN KEY `FK_mediatags_MEDIA`(`FK_MEDIA` )
			REFERENCES `pariopp`.`media`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_mediatags_TAG`(`FK_TAG` )
			REFERENCES `pariopp`.`tags`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE
    
    
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`offertelavorotags` (
	FK_TAG INT UNSIGNED NOT NULL,
    FK_OFFERTE INT UNSIGNED NOT NULL,

	PRIMARY KEY(FK_TAG, FK_OFFERTE),
	FOREIGN KEY `FK_offertelavorotags_TAG`(`FK_TAG` )
			REFERENCES `pariopp`.`media`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	FOREIGN KEY `FK_offertelavorotags_OFFERTE`(`FK_OFFERTE` )
			REFERENCES `pariopp`.`tags`(`id`)
			ON DELETE RESTRICT
			ON UPDATE CASCADE

) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pariopp`.`giocoschemi` (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	LIVELLO INT NOT NULL,
    SOTTOLIVELLO INT NOT NULL,
    DATI_SCHEMA VARCHAR (16000) NOT NULL, 
    
    PRIMARY KEY(ID),
    UNIQUE INDEX giocoschemi_livello_sottolivello (LIVELLO,SOTTOLIVELLO)
    
) ENGINE=InnoDB;


/*
SET FOREIGN_KEY_CHECKS=1;
*/
COMMIT;