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