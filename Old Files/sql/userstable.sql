DROP DATABASE Shop;

CREATE DATABASE Shop;

use Shop;

CREATE TABLE Users(
    UserId INT NOT NULL AUTO_INCREMENT,
    UserName VARCHAR(30) UNIQUE,
    UserPassword VARCHAR(255),
    PRIMARY KEY (UserId)
);

