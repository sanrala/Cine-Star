-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 sep. 2022 à 16:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinestars`
--

-- --------------------------------------------------------

--
-- Structure de la table `alertesortie`
--

CREATE TABLE `alertesortie` (
  `idAlerteSortie` int(11) NOT NULL,
  `imgAlerteSortie` varchar(500) NOT NULL,
  `nomAlerteSortie` varchar(255) NOT NULL,
  `dateAlerteSortie` date NOT NULL,
  `idFilm` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `avatars`
--

CREATE TABLE `avatars` (
  `idAvatar` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avatars`
--

INSERT INTO `avatars` (`idAvatar`, `img`) VALUES
(1, 'https://zupimages.net/up/22/37/tea6.png'),
(2, 'https://zupimages.net/up/22/37/jyvg.png'),
(3, 'https://zupimages.net/up/22/37/sovy.png'),
(4, 'https://zupimages.net/up/22/37/tg9t.png'),
(5, 'https://zupimages.net/up/22/37/4lc3.png'),
(6, 'https://zupimages.net/up/22/37/k68j.png'),
(7, 'https://zupimages.net/up/22/37/95cu.png'),
(8, 'https://zupimages.net/up/22/37/89y0.png'),
(9, 'https://zupimages.net/up/22/37/bi61.png'),
(10, 'https://zupimages.net/up/22/37/k6a0.png'),
(11, 'https://zupimages.net/up/22/37/1wkm.png'),
(12, 'https://zupimages.net/up/22/37/o3ba.png'),
(13, 'https://zupimages.net/up/22/37/bl4d.png'),
(14, 'https://zupimages.net/up/22/37/ssa3.png'),
(15, 'https://zupimages.net/up/22/37/dq9j.png'),
(16, 'https://zupimages.net/up/22/37/29oz.png'),
(17, 'https://zupimages.net/up/22/37/xkbk.png'),
(18, 'https://zupimages.net/up/22/37/qnzn.png'),
(19, 'https://zupimages.net/up/22/37/j2t2.png'),
(20, 'https://zupimages.net/up/22/37/llvc.png'),
(21, 'https://zupimages.net/up/22/37/37zm.png'),
(22, 'https://zupimages.net/up/22/37/i47f.png'),
(23, 'https://zupimages.net/up/22/37/vc7f.png'),
(24, 'https://zupimages.net/up/22/37/ef6n.png'),
(25, 'https://zupimages.net/up/22/37/eu8a.png'),
(26, 'https://zupimages.net/up/22/37/vu8h.png'),
(27, 'https://zupimages.net/up/22/37/64vi.png'),
(28, 'https://zupimages.net/up/22/37/2w08.png'),
(29, 'https://zupimages.net/up/22/37/suwm.png'),
(30, 'https://zupimages.net/up/22/37/0637.png'),
(31, 'https://zupimages.net/up/22/37/7o1f.png'),
(32, 'https://zupimages.net/up/22/37/6tla.png'),
(33, 'https://zupimages.net/up/22/37/gqu0.png'),
(34, 'https://zupimages.net/up/22/37/c29m.png'),
(35, 'https://zupimages.net/up/22/37/or1m.png'),
(36, 'https://zupimages.net/up/22/37/f3t7.png');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `idFilm` int(11) NOT NULL,
  `nameFilm` varchar(255) NOT NULL,
  `nameSerie` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `datenow` varchar(150) NOT NULL,
  `idUser` int(11) NOT NULL,
  `avatar_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `commentaire`, `idFilm`, `nameFilm`, `nameSerie`, `type`, `datenow`, `idUser`, `avatar_img`) VALUES
(60, 'ghjghjghj', 76600, 'Avatar : La Voie de l\'eau', '', 'movie', '09-09-2022 à 20:32:25', 2, 'https://zupimages.net/up/22/37/tea6.png\r\n'),
(66, 'sd!fgjpdgldfg\r\n', 76600, 'Avatar : La Voie de l\'eau', '', 'movie', '13-09-2022 à 06:47:44', 1, 'image/palpatine.jpg'),
(75, 'fghfgh', 616037, 'Thor : Love and Thunder', '', 'movie', '13-09-2022 à 09:12:49', 10, 'https://zupimages.net/up/22/37/tea6.png\r\n'),
(76, 'jkbjhjh', 76600, 'Avatar : La Voie de l\'eau', '', 'movie', '15-09-2022 à 12:56:10', 2, 'image/palpatine.jpg'),
(79, 'rgferterte', 157210, '', 'Mon Adolescence', 'tv', '15-09-2022 à 13:00:32', 2, 'image/palpatine.jpg'),
(80, 'rgferterte', 157210, '', 'Mon Adolescence', 'tv', '15-09-2022 à 13:00:56', 2, 'image/palpatine.jpg'),
(81, 'dfgdfg', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 13:13:40', 2, 'image/palpatine.jpg'),
(82, 'dfgdfg', 208470, '', 'La Disparue de Lørenskog', 'tv', '15-09-2022 à 13:14:03', 2, 'image/palpatine.jpg'),
(83, 'gdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdgdfgdgdfg', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 13:54:24', 2, 'image/palpatine.jpg'),
(84, 'gdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdgdfgdgdfg', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 13:55:34', 2, 'image/palpatine.jpg'),
(85, 'gdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdgdfgdgdfg', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 13:56:50', 2, 'image/palpatine.jpg'),
(86, 'gdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdgdfgdgdfg', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 13:57:30', 2, 'image/palpatine.jpg'),
(87, 'dfgdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 14:07:06', 2, 'image/palpatine.jpg'),
(88, 'dfgdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 14:08:34', 2, 'image/palpatine.jpg'),
(89, 'dfgdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 14:12:03', 2, 'image/palpatine.jpg'),
(90, 'dfgdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 14:12:22', 2, 'image/palpatine.jpg'),
(91, 'dfgdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 14:12:47', 2, 'image/palpatine.jpg'),
(92, 'dfgdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 14:13:26', 2, 'image/palpatine.jpg'),
(93, 'jflsdflsdf\r\nlhjkjhkhk\r\njflsdflsdf\r\nlhjkjhkhk\r\njflsdflsdf\r\nlhjkjhkhk\r\njflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkvvvv\r\nvjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhkjflsdflsdf\r\nlhjkjhkhk\r\njflsdflsdf\r\nlhjkjhkhk', 616037, 'Thor : Love and Thunder', '', 'movie', '15-09-2022 à 14:24:57', 2, 'image/palpatine.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `idFavoris` int(11) NOT NULL,
  `imgFavoris` varchar(255) NOT NULL,
  `nomFilmFavoris` varchar(255) NOT NULL,
  `nomSerieFavoris` varchar(255) NOT NULL,
  `dateSortieFavoris` date NOT NULL,
  `type` varchar(30) NOT NULL,
  `idFilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`idFavoris`, `imgFavoris`, `nomFilmFavoris`, `nomSerieFavoris`, `dateSortieFavoris`, `type`, `idFilm`) VALUES
(74, '/kSMarEm3ESOOr11dzsep2RZ1ClD.jpg', 'Thor : Love and Thunder', '', '2022-07-06', 'movie', 0),
(75, '/kSMarEm3ESOOr11dzsep2RZ1ClD.jpg', 'Thor : Love and Thunder', '', '2022-07-06', 'movie', 0),
(76, '/kSMarEm3ESOOr11dzsep2RZ1ClD.jpg', 'Thor : Love and Thunder', '', '2022-07-06', 'movie', 0),
(78, '/tQfNmfmapJVp1nPE0WFjswpK1Zo.jpg', '', 'House of the Dragon', '2022-08-21', 'tv', 0),
(80, '/nch8NTH45TBH4JyPuugttPzoxau.jpg', 'Pinocchio', '', '2022-09-07', 'movie', 0);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `idSession` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`idSession`, `idUser`) VALUES
(39, 2),
(40, 2),
(61, 2),
(64, 2),
(74, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(250) NOT NULL DEFAULT 'image/avatar_defaut.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `pseudo`, `email`, `password`, `avatar`) VALUES
(1, 'admin', 'dev@cinestars.fr', '$argon2i$v=19$m=65536,t=4,p=1$Vmp5YkgvenJITEhmdnJjbg$whVfQJVzhPNXegaCaCQt72eBIqIOPrbnZIJ+LR7nbL4', 'https://zupimages.net/up/22/37/tea6.png\r\n'),
(2, 'horn', 'sebastien.mauro@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dTEzUzlhMDRWVEFoSWdkLw$UtiPUAJGrRUBUU9m1DMJ57npFS6Mdevqf5ORnASo8HA', 'image/palpatine.jpg'),
(10, 'test2', 'zerz@fre.fr', '$argon2i$v=19$m=65536,t=4,p=1$L2ZvY05rNVhpSUhQSXMzSQ$nsN7R67BMabcF113fZxEtxP/Y8us9izi24xrW/f35hw', 'https://zupimages.net/up/22/37/tea6.png');

-- --------------------------------------------------------

--
-- Structure de la table `user_favori_film`
--

CREATE TABLE `user_favori_film` (
  `idFavoris` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_favori_film`
--

INSERT INTO `user_favori_film` (`idFavoris`, `idUser`) VALUES
(74, 2),
(76, 1),
(78, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alertesortie`
--
ALTER TABLE `alertesortie`
  ADD PRIMARY KEY (`idAlerteSortie`),
  ADD KEY `ALERTESORTIE_USER_FK` (`idUser`);

--
-- Index pour la table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`idAvatar`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `COMMENTAIRE_USER_FK` (`idUser`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`idFavoris`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idSession`),
  ADD KEY `session_user0_FK` (`idUser`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `user_favori_film`
--
ALTER TABLE `user_favori_film`
  ADD PRIMARY KEY (`idFavoris`,`idUser`),
  ADD KEY `user_favori_film_USER0_FK` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alertesortie`
--
ALTER TABLE `alertesortie`
  MODIFY `idAlerteSortie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `idAvatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `idFavoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alertesortie`
--
ALTER TABLE `alertesortie`
  ADD CONSTRAINT `ALERTESORTIE_USER_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `COMMENTAIRE_USER_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_user0_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `user_favori_film`
--
ALTER TABLE `user_favori_film`
  ADD CONSTRAINT `user_favori_film_FAVORIS_FK` FOREIGN KEY (`idFavoris`) REFERENCES `favoris` (`idFavoris`),
  ADD CONSTRAINT `user_favori_film_USER0_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
