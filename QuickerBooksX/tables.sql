CREATE TABLE users (
`id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`role_id` INT(11) DEFAULT NULL,
`fname` VARCHAR(255) NOT NULL ,
`lname` VARCHAR(255) NOT NULL ,
`email` VARCHAR(255) NOT NULL ,
`phone` VARCHAR(255) NOT NULL ,
`password` VARCHAR(255) NOT NULL,
`profile_picture` VARCHAR(255) DEFAULT NULL,
`dob` DATETIME NOT NULL,
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CONSTRAINT `users_ibfk_1` FOREIGN KEY(`role_id`) REFERENCES `roles`(`id`) ON DELETE SET NULL ON UPDATE NO ACTION
);

CREATE TABLE roles (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(255) NOT NULL ,
`description` TEXT NOT NULL ,
PRIMARY KEY (`id`)
);

    create table journal(
    `ID` int not null AUTO_INCREMENT,
    `TranID` int not null,
    `Amount` float(10,2) not null,
    `DebAccNum` int not null,
    `CredAccNum` int not null,
    `TranDate` timestamp default current_timestamp,
    `Filename` varchar(255),
    `TranStatus` varchar(50),
    PRIMARY KEY (`ID`)
    );

    CREATE TABLE `file` (
    `id`        Int Unsigned Not Null Auto_Increment,
    `name`      VarChar(255) Not Null Default 'Untitled.txt',
    `mime`      VarChar(50) Not Null Default 'text/plain',
    `size`      BigInt Unsigned Not Null Default 0,
    `data`      MediumBlob Not Null,
    `created`   DateTime Not Null,
    PRIMARY KEY (`id`)
)