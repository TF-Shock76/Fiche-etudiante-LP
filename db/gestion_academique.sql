/*----------------------------------------------------------*/
/*                       Projet PHP                         */
/*    Alexi Debonne - Thibault Fouchet - Mattéo Daguenet    */
/*----------------------------------------------------------*/


-- Table Fiche.
DROP TABLE IF EXISTS `fiche`;
CREATE TABLE IF NOT EXISTS `fiche` (
	`id_fiche` int(8) NOT NULL AUTO_INCREMENT,
	`email_fiche` varchar(100) NOT NULL,
	`etabli_fiche` varchar(100) NOT NULL,
	`pays_fiche` varchar(100) NOT NULL,
	`libelle_fiche` varchar(100) NOT NULL,
	`niveau` int(11) NOT NULL,
	`date_deb_fiche` date NOT NULL,
	`date_fin_fiche` date NOT NULL,
	PRIMARY KEY (`id_fiche`)
);


-- Table Membre.
DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
	`email_membre` varchar(100) NOT NULL,
	`nom_membre` varchar(100) NOT NULL,
	`prenom_membre` varchar(100) NOT NULL,
	`mdp_membre` varchar(100) NOT NULL,
	`sexe` enum('H','F','Autre') NOT NULL,
	`date_naissance_membre` date NOT NULL,
	`photo` longblob NOT NULL,
	`role_membre` varchar(100) NOT NULL DEFAULT '''membre''',
	PRIMARY KEY (`email_membre`)
);
