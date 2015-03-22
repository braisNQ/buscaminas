--
-- Brais Carrión Ansias
-- Buscaminas
--

USE `buscaminas`;

-- --------------------------------------------------------

-- Usuarios de exemplo

INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (2, 'brais@nqysit.com', 'Brais', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 1);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (3, 'contacto@nqysit.com', 'www.nqysit.com', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 1);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (4, 'samuel@buscaminas.es', 'Samuel Ele Llacson', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (5, 'perico@buscaminas.es', 'Perico De Proba', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (6, 'ander@buscaminas.es', 'Mr. Andersson', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (7, 'maria@buscaminas.es', 'Maria La Cantaora', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (8, 'paqui@buscaminas.es', 'Paqui Duermas', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (9, 'esmiz@buscaminas.es', 'Yon Esmiz', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (10, 'ana@buscaminas.es', 'Ana & Bernardo', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (11, 'bernardo@buscaminas.es', 'Bernardo & Ana', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (12, 'iaweb@buscaminas.es', 'IAWEB', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 1);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (13, 'estim@buscaminas.es', 'Estim', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (14, 'jb@buscaminas.es', 'Justin Bienes', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (15, 'paco@buscaminas.es', 'Paco Paquito', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (16, 'manuela@buscaminas.es', 'manuela', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (17, 'rosalia@buscaminas.es', 'Rosalia De Castro', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 1);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (18, 'feisbuk@buscaminas.es', 'Feisbuk Gonzalez', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (19, 'zaquenber@buscaminas.es', 'Marcos Zaquenber', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (20, 'filomena@buscaminas.es', 'Filomena', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (21,'eustaquia@buscaminas.es', 'Eustaquia', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);
INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES (22,'francisca@buscaminas.es', 'Paqui Palla', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 2);

-- Partidas de exemplo

INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (1, 2, 6, 42, '2015-03-10');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (2, 3, 6, 30, '2015-02-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (3, 4, 6, 36, '2012-10-15');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (4, 5, 6, 35, '2015-01-01');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (5, 6, 6, 30, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (6, 7, 6, 80, '2015-03-05');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (7, 8, 6, 99, '2015-03-11');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (8, 9, 6, 29, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (9, 2, 6, 32, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (10, 3, 10, 120, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (11, 4, 6, 32, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (12, 5, 6, 57, '2015-03-22');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (13, 6, 6, 41, '2015-01-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (14, 7, 6, 41, '2015-03-23');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (15, 8, 6, 32, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (16, 9, 10, 130, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (17, 2, 10, 230, '2014-05-01');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (18, 3, 10, 98, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (19, 4, 6, 30, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (20, 10, 6, 87, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (21, 11, 10, 127, '2015-03-21');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (22, 12, 10, 99, '2015-03-20');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (23, 13, 10, 100, '2015-01-25');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (24, 14, 10, 130, '2015-02-28');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (25, 15, 6, 35, '2015-03-12');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (26, 16, 6, 490, '2015-03-10');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (27, 17, 6, 49, '2015-03-17');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (28, 18, 6, 38, '2015-03-15');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (29, 19, 6, 47, '2015-03-16');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (30, 20, 6, 62, '2015-03-16');
INSERT INTO `partida` (`ID`, `id_usuario`, `dimension`, `tempo`, `data`) VALUES (31, 21, 6, 54, '2012-02-20');