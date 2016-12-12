CREATE TABLE IF NOT EXISTS test_theme(
  id int(11) NOT NULL AUTO_INCREMENT,
  theme varchar(255) NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS test_def(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  link_name varchar(255) NOT NULL,
  theme tinyint(4) DEFAULT NULL,
  level tinyint(4) DEFAULT NULL,
  `link_turn` tinyint(4) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img_alt` varchar(255) DEFAULT NULL,
  `img_title` varchar(255) DEFAULT NULL,
  `full_text` text NOT NULL,
  `data` date NOT NULL,
  `comment` int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY link(link)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS test_theme_level(
  id int(11) NOT NULL AUTO_INCREMENT,
  theme tinyint(4) DEFAULT NULL,
  level tinyint(4) DEFAULT NULL,
  caption varchar(255) NOT NULL,
  text text NOT NULL,
  PRIMARY KEY (id),
  INDEX theme(theme, level)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;