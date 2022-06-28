drop DATABASE animalsinsert;
CREATE DATABASE animalsinsert;

use animalsinsert;

create Table animals (

    animalsID int not null AUTO_INCREMENT,

    animalsName varchar(20) unique,
    contienent varchar(20),

    PRIMARY KEY (animalsID)

);

