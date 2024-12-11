create database gestionloca;
use gestionloca;


create table clients(
	idclient int  primary key,
    nom varchar(50),
    adresse varchar(50),
    tel varchar(20)
);

describe table clients;

create table voiture(
    idvoiture varchar(50) primary key,
    marque varchar(50),
    modele varchar(50),
    annee int 
);
describe table voitures;

create table contrats(
    idcontrat int primary key,
    dateDebut date,
    dateFin date,
    duree int,
    idclient int,
    idvoiture varchar(50),
    constraint Fk_client foreign key (idclient) references clients(idclient),
    constraint Fk_voiture foreign key (idvoiture) references voiture(idvoiture)
);


insert into clients values 
(1, 'Ahmed Saidi', 'Casablanca, Maroc', '0612345678'),
(2, 'Fatima El Amri', 'Rabat, Maroc', '0678901234');

select * from clients;


insert into voiture values 
('1234ABC', 'Toyota', 'Corolla', 2020),
('5678XYZ' , 'Renault', 'Clio', 2021);

select * from voiture;

insert into contrats values 
(1, '2024-01-01', '2024-01-10', 10, 1, '1234ABC' ),
(2, '2024-02-01', '2024-02-05', 5, 2, '5678XYZ' );

select * from contrats;

SELECT 
    contrats.idcontrat,
    contrats.dateDebut,
    contrats.dateFin,
    contrats.duree,
    clients.nom,
    clients.adresse,
    clients.tel,
    voiture.marque,
    voiture.modele,
    voiture.annee
FROM contrats
JOIN clients ON contrats.idclient = clients.idclient
JOIN voiture ON contrats.idvoiture = voiture.idvoiture;


insert into clients values 
(3, 'Dounia ELgarrai', 'Safi, Maroc', '0706404237');

insert into voiture values 
('9101EFG', 'Audi', 'Audi', 2010);

insert into contrats values 
(3, '2024-03-01', '2024-03-10', 10, 3, '9101EFG' );


update contrats
set 
    dateDebut = '2024-03-05', 
    dateFin = '2024-03-15', 
    duree = 11, 
    idclient = 3, 
    idvoiture = '9101EFG'
where idcontrat = 3;

select * from contrats where idcontrat = 3;

update voiture 
set 
    modele = 'Audi A3'
where idvoiture = '9101EFG';

select * from voiture where idvoiture = '9101EFG';


insert into clients values 
(4, 'Ahmed ELgarrai', 'Safi, Maroc', '0606409947');

delete from clients where idclient = 4;

insert into voiture values 
('6101ECK', 'BMW', 'BMW', 2023);
	
delete from voiture where idvoiture = '6101ECK';












