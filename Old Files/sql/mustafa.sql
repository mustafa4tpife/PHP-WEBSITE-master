drop DATABASE Mustafa;
CREATE DATABASE Mustafa;

use Mustafa;

create Table Countries (

    CountryID int not null AUTO_INCREMENT,

    CountryName varchar(30),

    PRIMARY KEY (CountryID)

);

insert into Countries (CountryName)
values ("luxembourg");
insert into Countries (CountryName)
values ("france");
