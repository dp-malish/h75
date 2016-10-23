CREATE TABLE IF NOT EXISTS comment_uri(
  id INT(11) NOT NULL AUTO_INCREMENT,
  table_name VARCHAR(45) NULL,
  id_link INT NULL,
  link VARCHAR(255) NULL,
  PRIMARY KEY (id)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS comment_counturi1(
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_dir INT(11) NULL,
  captcha MEDIUMINT NULL,
  readed TINYINT(1) NULL,
  user_name VARCHAR(100) NULL,
  text TEXT NULL,
  ip VARCHAR(50) NULL,
  data INT NULL,
  PRIMARY KEY (id),
  INDEX link_idx (id_dir ASC),
  INDEX read_sms (readed ASC))
  ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS comment_counturi2(
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_dir INT(11) NULL,
  captcha MEDIUMINT NULL,
  readed TINYINT(1) NULL,
  user_name VARCHAR(100) NULL,
  text TEXT NULL,
  ip VARCHAR(50) NULL,
  data INT NULL,
  PRIMARY KEY (id),
  INDEX link_idx (id_dir ASC),
  INDEX read_sms (readed ASC))
  ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS comment_counturi3(
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_dir INT(11) NULL,
  captcha MEDIUMINT NULL,
  readed TINYINT(1) NULL,
  user_name VARCHAR(100) NULL,
  text TEXT NULL,
  ip VARCHAR(50) NULL,
  data INT NULL,
  PRIMARY KEY (id),
  INDEX link_idx (id_dir ASC),
  INDEX read_sms (readed ASC))
  ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS comment_counturi4(
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_dir INT(11) NULL,
  captcha MEDIUMINT NULL,
  readed TINYINT(1) NULL,
  user_name VARCHAR(100) NULL,
  text TEXT NULL,
  ip VARCHAR(50) NULL,
  data INT NULL,
  PRIMARY KEY (id),
  INDEX link_idx (id_dir ASC),
  INDEX read_sms (readed ASC))
  ENGINE = InnoDB DEFAULT CHARSET=utf8;

DELIMITER //
CREATE FUNCTION fun_select_comment_counturi(id_comment INT)
  RETURNS INT
  BEGIN
    SET @my_com=id_comment;

    SET @id_comment_ext=(SELECT id_dir FROM comment_counturi1 WHERE id_dir=@my_com LIMIT 1);
    IF(@id_comment_ext IS NULL)THEN
      SET @id_comment_ext=(SELECT id_dir FROM comment_counturi2 WHERE id_dir=@my_com LIMIT 1);
      IF(@id_comment_ext IS NULL)THEN
        SET @id_comment_ext=(SELECT id_dir FROM comment_counturi3 WHERE id_dir=@my_com LIMIT 1);
        IF(@id_comment_ext IS NULL)THEN
          SET @id_comment_ext=(SELECT id_dir FROM comment_counturi4 WHERE id_dir=@my_com LIMIT 1);
        END IF;
      END IF;
    END IF;

    IF(@id_comment_ext IS NULL)THEN
      SET @my_com=@my_com*(-1);
      ELSE SET @my_com=@my_com;
    END IF;

    RETURN @my_com;
  END;//

DELIMITER //
CREATE PROCEDURE id_comment(my_table CHAR(45),my_id_link INT)
  BEGIN
    INSERT INTO comment_uri(table_name,id_link) VALUES (my_table,my_id_link);
  END;//

/*DROP TABLE comment_uri;
DROP TABLE comment_counturi1;
DROP TABLE comment_counturi2;
DROP TABLE comment_counturi3;
DROP TABLE comment_counturi4;
DROP FUNCTION fun_select_comment_counturi;
DROP PROCEDURE id_comment;*/

DELIMITER //
CREATE TRIGGER id_comment BEFORE UPDATE ON default_content
FOR EACH ROW
  BEGIN
    SET @my_table='default_content';
    SET @id_link=old.id;
    SET @new_comment=new.comment;
    SET @old_comment=old.comment;

    IF(@new_comment IS NOT NULL)THEN
      SET @id_comment=(SELECT id FROM comment_uri WHERE table_name=@my_table AND id_link=@id_link);
      IF(@id_comment)THEN
        SET NEW.comment=(SELECT fun_select_comment_counturi(@id_comment));
      ELSE
        CALL id_comment(@my_table,@id_link);
        SET @id_comment=(SELECT id FROM comment_uri WHERE table_name=@my_table AND id_link=@id_link);
        SET NEW.comment=@id_comment*(-1);
      END IF;
    END IF;
  END;//