CREATE DATABASE gestionModuleFormateurs_v1;


CREATE TABLE DirecteurPedagogique(
    email varchar(30) PRIMARY KEY,
    motpass varchar(30),
    nom varchar(30),
    prenom varchar(30),
    dateEmbauche date
    );
    CREATE TABLE 	Formateur(  
    matricule varchar(30) PRIMARY KEY,
    nom varchar(30),
    prenom varchar(30),
    photoProfil varchar,
    dateNaissance date,
    spécialité varchar(30)
    );
    CREATE TABLE 	module(
    sigle varchar(30) PRIMARY KEY,
    libelle varchar(30),
    type varchar(30),
    coef int
    );
    CREATE TABLE 	Affectation(
    matricule varchar(30),
    sigle varchar(30) ,
    filiereGroupe varchar(30),
    PRIMARY KEY(matricule,sigle),
    FOREIGN KEY (matricule) REFERENCES formateur(matricule),
    FOREIGN KEY (sigle) REFERENCES module(sigle)
    );
