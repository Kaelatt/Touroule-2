drop table if exists Compte cascade;
drop table if exists Genre cascade;
drop table if exists Jour cascade;
drop table if exists Type cascade;
drop table if exists Velo cascade;
drop table if exists Horaire cascade;
drop table if exists Reparation cascade;
drop table if exists Categorie cascade;
drop table if exists Cat cascade;

CREATE TABLE Type(
                     idType serial primary key,
                     nom text unique not null
);
CREATE TABLE Genre(
                      idGenre serial primary key,
                      nom text unique not null
);

CREATE TABLE Jour(
                     idJour serial primary key,
                     nom text unique not null
);

CREATE TABLE Categorie(
                          idCategorie serial primary key,
                          nom text unique not null
);

CREATE TABLE Compte(
                       idCompte serial primary key,
                       prenom text,
                       nom text,
                       password text,
                       mail text,
                       admin boolean default false,
                       codepostal text,
                       ville text,
                       check ( mail LIKE  '%@%'),
                       check (length(codepostal)=5)
);

CREATE TABLE Velo(
                     idVelo serial primary key ,
                     idCompte int references Compte(idCompte),
                     idType int references Type(idType),
                     idGenre int references Genre(idGenre),
                     marque text,
                     taiille_roue int,
                     electrique boolean default false,
                     pliant boolean default false,
                     prix int,
                     neuf boolean default false,
                     quantite int,
                     titre text,
                     decription text
);

CREATE TABLE Horaire(
                        idHoraire serial primary key,
                        idCompte int references Compte(idCompte),
                        debutH int not null,
                        debutM int not null,
                        finH int not null,
                        finM int not null,
                        check (debutH>=0 and debutH<25),
                        check (debutM>=0 and debutM<60),
                        check (finH>=0 and finH<25),
                        check (finM>=0 and finH<60)
);

CREATE TABLE Reparation(
                           idReparation serial primary key,
                           idCompte int references Compte(idCompte),
                           titre text not null ,
                           decription text not null
);



CREATE TABLE Cat(
                    idReparation int references Reparation(idReparation),
                    idCategorie int references Categorie(idCategorie),
                    primary key (idReparation, idCategorie)
);