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


    create table journalEntry(
	ID int AUTO_INCREMENT,
    TranID int not null,
    Account varchar(255) not null,
    CredOrDeb varchar(10) not null,
    TranDate timestamp default current_timestamp,
    Primary key (ID)
);

create table attachment(
    TranID int not null,
    mime      VarChar(50) Not Null Default 'text/plain',
    size      BigInt Unsigned Not Null Default 0,
    `data`      MediumBlob Not Null
);

create table JournalStatus(
	TranID int not null,
    TranStatus varchar(15) not null Default 'Pending',
    Reason varchar(255)
);