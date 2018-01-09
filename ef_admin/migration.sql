ALTER TABLE maison_hote ADD COLUMN nom VARCHAR(255);
ALTER TABLE maison_hote ADD COLUMN prenom VARCHAR(255);

ALTER TABLE activites ADD COLUMN nom VARCHAR(255);

ALTER TABLE activity_guide ADD COLUMN prenom VARCHAR(255);
ALTER TABLE activity_guide ADD COLUMN ville VARCHAR(255);
ALTER TABLE activity_guide ADD COLUMN tarif_heure FLOAT;

-- ALTER TABLE activity_guide ADD COLUMN prenom VARCHAR(255);

CREATE TABLE prixselect
(id int PRIMARY KEY AUTO_INCREMENT,
nom_chambre varchar(255),
nom_activite varchar(255),
nom_guide varchar(255),
titre varchar(255) not null,
prix int not null,
INDEX(nom_chambre),
INDEX(nom_activite),
INDEX(nom_guide)
);

CREATE TABLE blog (
  slug varchar(255) NOT NULL,
  titre varchar(255) NOT NULL,
  description text NOT NULL,
  auteur varchar(255) NOT NULL,
  datecrea timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dateupdate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (slug)
);


CREATE TABLE coffret (
  id varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prix int(11) NOT NULL,
  description text NOT NULL,
  conditions text NOT NULL,
  disponible tinyint(4) NOT NULL DEFAULT '1',
  variantes varchar(255)
  PRIMARY KEY (id)
);
	
CREATE TABLE indispo
(id int PRIMARY KEY AUTO_INCREMENT,
nom_chambre varchar(255),
nom_activite varchar(255),
nom_guide varchar(255),
date_debut DATE not null,
date_fin DATE not null,
INDEX(nom_chambre),
INDEX(nom_activite),
INDEX(nom_guide)
);

CREATE TABLE newsletter
(email varchar(255) PRIMARY KEY,
datecrea timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);
