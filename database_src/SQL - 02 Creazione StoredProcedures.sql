USE `pariopp`;

START TRANSACTION;
DROP FUNCTION IF EXISTS pariopp.CHECK_LOGIN;
DROP FUNCTION IF EXISTS pariopp.USER_EXISTS;
DROP TRIGGER IF EXISTS pariopp.trig_config_check;
DROP FUNCTION IF EXISTS pariopp.GET_WEBSITE_URI;
DROP FUNCTION IF EXISTS pariopp.GET_WEBPAGE_OFFERTELAVORO_QUERY;
DROP FUNCTION IF EXISTS pariopp.GET_WEBPAGE_AGENDAEVENTI_QUERY;


DELIMITER $$

CREATE FUNCTION pariopp.USER_EXISTS(P_USERNAME  VARCHAR(50),P_EMAIL VARCHAR(50) )
	RETURNS TINYINT(1)
BEGIN
	IF EXISTS(SELECT * FROM utenti where USERNAME=P_USERNAME or EMAIL=P_EMAIL)
	then
		RETURN 1;
	ELSE 
		RETURN 0;
		END IF;
END;
$$


CREATE FUNCTION pariopp.CHECK_LOGIN(P_USERNAME VARCHAR(50), P_PASSWORD CHAR(40) )
	RETURNS TINYINT(1)
BEGIN
	IF EXISTS(SELECT * FROM utenti where USERNAME=P_USERNAME AND PASSWORD=P_PASSWORD)
	then
		RETURN 1;
	ELSE 
		RETURN 0;
	END IF;
END;
$$


CREATE TRIGGER trig_config_check BEFORE INSERT ON `pariopp`.`config` 
    FOR EACH ROW 
	BEGIN 
		IF NEW.ID<1 OR NEW.ID>1 THEN 
			SET NEW.ID=1;
		END IF; 
	END
$$


CREATE FUNCTION pariopp.GET_WEBSITE_URI()
	RETURNS VARCHAR(500)
BEGIN
	DECLARE myuri VARCHAR(500);
	
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET myuri = 'unknown';
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET myuri = 'unknown';
     
	SELECT WEBSITE_URI INTO myuri
		FROM config
		WHERE ID=1;
	
	RETURN myuri;
END;
$$


CREATE FUNCTION pariopp.GET_WEBPAGE_OFFERTELAVORO_QUERY()
	RETURNS VARCHAR(500)
BEGIN
	DECLARE myquery VARCHAR(500);
	
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET myquery = 'unknown';
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET myquery = 'unknown';
     
	SELECT WEBPAGE_OFFERTELAVORO_QUERY INTO myquery
		FROM config
		WHERE ID=1;
	
	RETURN myquery;
END;
$$


CREATE FUNCTION pariopp.GET_WEBPAGE_AGENDAEVENTI_QUERY()
	RETURNS VARCHAR(500)
BEGIN
	DECLARE myquery VARCHAR(500);
	
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET myquery = 'unknown';
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET myquery = 'unknown';
     
	SELECT WEBPAGE_AGENDAEVENTI_QUERY INTO myquery
		FROM config
		WHERE ID=1;
	
	RETURN myquery;
END;
$$


DELIMITER ;
COMMIT;


/*
//ESEMPIO:

INSERT INTO `pariopp`.`utenti`
(`USERNAME`,`PASSWORD`,`NOME`,`COGNOME`,`EMAIL`)
VALUES ("buc", "aeiou", "Antonio","Bucciol","a@b.c");

TEST:
select CHECK_LOGIN('buc', 'aeiou');
select CHECK_LOGIN('buc', 'aeio');

*/