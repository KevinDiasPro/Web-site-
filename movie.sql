-- phpMyAdmin SQL Dump              contrainte Date actuelle -> trigger?    Multiple genres?  colonne optionnelle? Mettre null? mettre rien?
-- http://www.phpmyadmin.net    
--
-- Serveur: localhost

--
-- Base de données: `movie`
--
CREATE DATABASE IF NOT EXISTS `movie`;
USE `movie`;
DROP TABLE `critique`;
DROP TABLE `grade`;
DROP TABLE `utilisateur`;
DROP TABLE `profil`;
DROP TABLE `film`;
DROP TABLE `genre`;

-- --------------------------------------------------------
--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil`(
  `pId` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `pNom` VARCHAR(50) NOT NULL,
  `pLib` VARCHAR(250) NOT NULL,
  PRIMARY KEY(`pId`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Contenu de la table `profil`
--

INSERT INTO `profil`(`pNom`,`pLib`) VALUES
(
  'cinephile',
  'Autoproclamé, immergé dans le monde du cinéma depuis longtemps et en suivant l actualité de près, capable d une analyse relativement poussée sur un film.'
),(
  'amateur',
  'Connait ses classiques, capable d une analyse minimum sur un film et suit les grosses sorties.'
),(
  'profane',
  'Aime regarder un bon film le soir, mais s arrête là. Un film n est qu un passe temps agréable sans plus. Va rarement au cinema.'
);

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur`(
  `uId` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `uNom` VARCHAR(50) NOT NULL,
  `uPrenom` VARCHAR(50) NOT NULL,
  `uEmail` VARCHAR(50) NOT NULL UNIQUE,
  `uBirthdate` DATE NOT NULL,
  `uProfil` INT(11) unsigned,
  PRIMARY KEY(`uId`),
  CONSTRAINT FOREIGN KEY(`uProfil`) REFERENCES `profil`(`pId`) ON DELETE SET NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur`(`uNom`, `uPrenom`, `uEmail`, `uBirthdate`, `uProfil`) VALUES
('Schinazi', 'Marco', 'marco-schi@hotmail.com', '2015-10-24', 1);

-- --------------------------------------------------------
--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre`(
  `gId` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `gName` VARCHAR(50) NOT NULL,
  PRIMARY KEY(`gId`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre`(`gName`) VALUES
('Action'),('Animation'),('Aventure'),('Biopic'),
('Catastrophe'),('Comédie'),('Documantaire'),('Drame'),
('Erotique'),('Fantastique'),('Fantasy'),('Guerre'),
('Historique'),('Horreur'),('Musical'),('Peplum'),
('Science-Fiction'),('Thriller'),('Western');

-- --------------------------------------------------------
--
-- Structure de la table `film`
--

CREATE TABLE IF NOT EXISTS `film`(
  `fId` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `fTitre` VARCHAR(50) NOT NULL,
  `fRealisateur` VARCHAR(50) NOT NULL,
  `fAnnee` INT(4) unsigned NOT NULL,
  `fGenre` INT(11) unsigned,
  `fSynopsis` VARCHAR(500) DEFAULT 'Aucun synopsys existant',
  `fTrailer` VARCHAR(50),
  PRIMARY KEY(`fId`),
  CONSTRAINT FOREIGN KEY(`fGenre`) REFERENCES `genre`(`gId`) ON DELETE SET NULL

) ENGINE = InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `film`
--

INSERT INTO `film`(`fTitre`, `fRealisateur`, `fAnnee`, `fGenre`, `fSynopsis`, `fTrailer`) VALUES
(
  'Interstellar',
  'Christopher Nolan',
  '2014',
  17,
  'La terre se meurt, un groupe d explorateurs partent dans une autre galaxie en quête d une nouvelle planète habitable',
  'https://www.youtube.com/watch?v=zSWdZVtXT7E'
);

-- --------------------------------------------------------
--
-- Structure de la table `grade`
--

CREATE TABLE IF NOT EXISTS `grade`(
  `gId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gNom` VARCHAR(30) NOT NULL,
  `gLib` VARCHAR(100) NOT NULL,
  PRIMARY KEY(`gId`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre`
--

INSERT INTO `grade`(`gNom`, `gLib`) VALUES
(
  'Masterpiece',
  'A marqué le genre et le cinema de sa patte.'
),(
  'Excellent',
  'Une grande réussite, s impose comme l un des films de son année.'
),(
  'Bon',
  'On a bien aimé. Ce qu il fait, il le fait bien'
),(
  'Moyen',
  'Passe-temps, peu de prétention. Vite vu, vite oublié.'
),(
  'Mauvais',
  'Raté dans tout -ou presque- ce qu il entreprend, une perte de temps.'
),(
  'Catastrophique',
  'Une honte, comment cette chose a-t elle pu arriver sur écran?'
),(
  'Coup de coeur',
  'Que je me l explique ou non, il y avait ce quelque chose de plus. J ai tout simplement adoré!'
);

-- --------------------------------------------------------
--
-- Structure de la table `ctitique`
-- Une critique peut survivre à la personne l'ayant écrite. 

CREATE TABLE IF NOT EXISTS `critique`(
  `cId` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `cUtilisateur` INT(11) unsigned,
  `cFilm` INT(11) unsigned NOT NULL,
  `cNote` INT(2) unsigned NOT NULL,
  `cGrade` int(11) unsigned,
  `cComment` VARCHAR(500) DEFAULT 'Pas de commentaire',
  `cDate` DATE NOT NULL,
  `cRecommandation` VARCHAR(250),
  PRIMARY KEY(`cId`),
  CONSTRAINT FOREIGN KEY(`cUtilisateur`) REFERENCES `utilisateur`(`uId`) ON DELETE SET NULL,
  CONSTRAINT FOREIGN KEY(`cFilm`) REFERENCES `film`(`fId`) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY(`cGrade`) REFERENCES `grade`(`gId`) ON DELETE SET NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `critique`
--

INSERT INTO `critique`(`cUtilisateur`, `cFilm`, `cNote`, `cGrade`, `cComment`, `cDate`, `cRecommandation`) VALUES
(1, 1, 9, 2, 'Un des meilleurs films SF de la décennie, généreux, fédérateur et prenant.', '2015-11-22', 'Nicolas Volza');