
DROP TABLE IF EXISTS `calendrier`;
CREATE TABLE IF NOT EXISTS `calendrier` (
  `id` int(11) NOT NULL auto_increment,
  `jour` int(11) NOT NULL default '0',
  `mois` int(11) NOT NULL default '0',
  `annee` int(11) NOT NULL default '0',
  `evenement` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 ;

INSERT INTO `calendrier` (`id`, `jour`, `mois`, `annee`, `evenement`) VALUES (1, 25, 12, 2005, 'HO HO HO...\nJoyeux Noël !!!');
INSERT INTO `calendrier` (`id`, `jour`, `mois`, `annee`, `evenement`) VALUES (2, 12, 3, 2006, '- Ceci est un test !!!');
