
DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `code_genre` int(11) AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  CONSTRAINT genre_pk PRIMARY KEY(code_genre)
);

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`code_genre`, `nom_genre`) VALUES
(26, 'à l''antique                                       '),
(4, 'c''était demain                                    '),
(5, 'pas drôle mais beau                               '),
(6, 'pauvre espèce humaine                             '),
(10, 'jeu dans le jeu                                   '),
(15, 'poésie en image                                   '),
(11, 'en France profonde                                '),
(7, 'du rire aux larmes (et retour)                    '),
(28, 'docu                                              '),
(17, 'les chocottes à zéro                              '),
(19, 'la parole est d''or                                '),
(20, 'Paris                                             '),
(14, 'culte ou my(s)tique                               '),
(13, 'pour petits et grands enfants                     '),
(9, 'en avant la musique                               '),
(23, 'Los Angeles & Hollywood                           '),
(3, 'cadavre(s) dans le(s) placard(s)                  '),
(21, 'vive la (critique) sociale !                      '),
(22, 'épique pas toc                                    '),
(27, 'du Moyen-Age à 1914                               '),
(12, 'New-York                                          '),
(1, 'heurs et malheurs à deux                          '),
(30, 'Bollywooderie                                     '),
(16, 'conte de fées relooké                             '),
(25, 'entre Berlin et Moscou                            '),
(8, 'portrait d''époque (après 1914)                    '),
(2, 'carrément à l''ouest                               '),
(29, 'vers le soleil levant                             '),
(24, 'perle de nanard                                   ');
