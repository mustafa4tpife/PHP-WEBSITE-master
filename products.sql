drop DATABASE Mustafa;
CREATE DATABASE Mustafa;

use Mustafa;

create Table products (

    productsID int not null AUTO_INCREMENT,

    productsName varchar(30),

    imgname varchar(250),

    price int(3),

    prodid int(20),

    PRIMARY KEY (productsID)
    
);

create Table languges (

    langugesid int not null AUTO_INCREMENT,

    langugesname varchar(30),


    PRIMARY KEY (langugesid)
   


);


create Table descriptions (

    descriptionsid int not null AUTO_INCREMENT,

    descriptionsname varchar(255),

    productsID int not null,

    langugesid int not null,

    foreign key (productsID) references products(productsID),
     foreign key (langugesid) references languges (langugesid),

    PRIMARY KEY (descriptionsid)

);

CREATE TABLE Users(
    UserId INT NOT NULL AUTO_INCREMENT,
    UserName VARCHAR(30) NOT NULL UNIQUE,
    UserPassword VARCHAR(255) NOT NULL,
    uservalue varchar(5),
    PRIMARY KEY (UserId)

);

create table Orders(
    Orderid int NOT NULL AUTO_INCREMENT,
    UserId int NOT NULL,

    foreign key (UserId) REFERENCES Users(UserId),
     PRIMARY KEY (Orderid)
);
  
create table List(
    Listid int NOT NULL AUTO_INCREMENT,
    productsID int NOT NULL,
    Orderid int NOT NULL,
    Numberofitems int NOT NULL,

    foreign key (productsID) references products(productsID),
    foreign key (Orderid) REFERENCES Orders(Orderid),
    PRIMARY KEY (Listid)
    );

insert into products (productsName,imgname,price,prodid)
values ("Fortnite","fortnite.jpg",19,1);
insert into products (productsName,imgname,price,prodid)
values ("Call of Duty 4","call-of-duty-black-ops-4-image-2.jpg",19,2);
insert into products (productsName,imgname,price,prodid)
values ("Grand Theft Auto (GTA)","gta-v-cover.jpg",19,3);
insert into products (productsName,imgname,price,prodid)
values ("Rainbow 6 SIEGE","r6.jpg",19,4);
insert into products (productsName,imgname,price,prodid)
values ("CALL OF DUTY","callofduty.jpg",29,5);

insert into languges (langugesname)
values ("english");
insert into languges (langugesname)
values ("french");

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Fortnite is an online video game developed by Epic Games and released in 2017",1,1);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Fortnite est un jeu vidéo en ligne développé par Epic Games et sorti en 2017",1,2);

insert into descriptions (descriptionsname,productsID,langugesid)
values (" Modern Warfare is a 2007 first-person shooter developed by Infinity Ward and published by Activision",2,1);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Modern Warfare est un jeu de tir à la première personne de 2007 développé par Infinity Ward et publié par Activision",2,2);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Grand Theft Auto (GTA) is a series of action-adventure games created by David Jones and Mike Dailly.",3,1);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Grand Theft Auto (GTA) est une série de jeux d'action-aventure créés par David Jones et Mike Dailly",3,2);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Tom Clancy's Rainbow Six Siege is an online tactical shooter video game developed by Ubisoft Montreal and published by Ubisoft",4,1);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Tom Clancy's Rainbow Six Siege est un jeu vidéo de tir tactique en ligne développé par Ubisoft Montréal et édité par Ubisoft",4,2);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Call of Duty is a first-person shooter video game franchise published by Activision.",5,1);

insert into descriptions (descriptionsname,productsID,langugesid)
values ("Call of Duty est une franchise de jeux vidéo de tir à la première personne publiée par Activision.",5,2);
