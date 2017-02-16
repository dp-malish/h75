CREATE TABLE IF NOT EXISTS content(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  link_name varchar(255) NOT NULL,
  menu tinyint(4),
  heading varchar(255),
  category varchar(255),
  link_turn tinyint(4),
  title varchar(255) NOT NULL,
  meta_d varchar(255) NOT NULL,
  meta_k varchar(255) NOT NULL,
  caption varchar(255) NOT NULL,
  img_s varchar(255),
  img_alt_s varchar(255),
  img_title_s varchar(255),
  short_text text,
  img varchar(255),
  img_alt varchar(255),
  img_title varchar(255),
  left_text text,
  right_text text,
  full_text text NOT NULL,
  data int(11),
  views int(11) DEFAULT 13,
  comment int(11),
  PRIMARY KEY (id),
  UNIQUE KEY link(link),
  KEY (heading,category)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/*CREATE TABLE IF NOT EXISTS heading(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  rubrika varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY link(link)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;
INSERT INTO heading(id,link,rubrika)VALUES
  (0,'лайфхаки','Лайфхаки'),
  (1,'личности','Личности'),
  (2,'мода','Мода'),
  (3,'обо-всём','Обо всем'),
  (4,'психология','Психология'),
  (5,'рецепты-блюд','Рецепты блюд');*/
DELIMITER //
CREATE PROCEDURE views_blog()
  BEGIN
    UPDATE content SET views=views+greatest(7,round((rand())*20));
  END;//
