CREATE TABLE IF NOT EXISTS content(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  link_name varchar(255) NOT NULL,
  menu tinyint(4),
  heading int(8),
  category int(8),
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
  data TIMESTAMP DEFAULT NOW(),
  views int(11) DEFAULT 13,
  comment int(11),
  PRIMARY KEY (id),
  UNIQUE KEY link(link),
  KEY (heading,category)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS heading(
  id int(11) NOT NULL AUTO_INCREMENT,
  rubrika varchar(255) NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
INSERT INTO `heading` (`id`, `rubrika`) VALUES
  (1, 'Лайфхаки'),
  (2, 'Личности'),
  (3, 'Мода'),
  (4, 'Обо всем'),
  (5, 'Психология'),
  (6, 'Рецепты блюд');