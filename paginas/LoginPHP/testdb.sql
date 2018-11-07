
CREATE TABLE IF NOT EXISTS `users` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(145) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `create_time` timestamp,
  `category_codigo` int(2),
  `estado` int(8),
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
