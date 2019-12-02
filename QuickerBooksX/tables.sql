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
CONSTRAINT `users_ibfk_1` FOREIGN KEY(`Role_id`) REFERENCES `Roles`(`Id`) ON DELETE SET NULL ON UPDATE NO ACTION
);

CREATE TABLE roles (
`id` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(255) NOT NULL ,
`description` TEXT NOT NULL ,
PRIMARY KEY (`id`)
);

INSERT INTO `roles`(`id`, `name`, `description`) 
VALUES  (1, 'Admin', 'admin user' ), 
		(2, 'Manager', 'manager user'), 
		(3, 'Accountant', 'accountant user')

CREATE TABLE questions (
`id` INT NOT NULL AUTO_INCREMENT ,
`description` TEXT NOT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE chartofaccounts (
    `accountname`       VARCHAR (50)  NULL,
    `accountnumber`     INT (8)           NULL,
    `description`       VARCHAR (150) NULL,
    `normalside`        VARCHAR (5)   NULL,
    `category`          VARCHAR (50)  NULL,
    `subcategory`       VARCHAR (50)  NULL,
    `initialbalance`    DECIMAL         NULL,
    `debit`             DECIMAL        NULL,
    `credit`            DECIMAL        NULL,
    `balance`           DECIMAL        NULL,
    `dateadded`         DATETIME      NULL,
    `user_id`           INT           NULL,
    `order`             INT           NULL,
    `statement`         VARCHAR (20)  NULL,
    `comment`           VARCHAR (150) NULL,
	CONSTRAINT `chartofaccounts_ibfk_1` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO `chartofaccounts` (`accountname`, `accountnumber`, `description`, `normalside`, `category`, `subcategory`, `initialbalance`, `debit`, `credit`, `balance`, `dateadded`, `user_id`, `order`, `statement`, `comment`) 
VALUES  ('Cash', 100001, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 1, 'Balance Sheet', NULL), 
		('Petty Cash', 100005, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 1, 'Balance Sheet', NULL),
		('Notes Receivable', 100121,NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 2, 'Balance Sheet', NULL), 
		('Accounts Receivable', 100122, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 2, 'Balance Sheet', NULL ),
		('Allowance for Bad Debts', 101221, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 2, 'Balance Sheet', NULL ), 
		('Interest Recievable', 100123, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 2, 'Balance Sheet', NULL ),
		('Common Stock subcriptions Recievable', 100125, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 2, 'Balance Sheet', NULL ), 
		('Preferred Stock subcriptions Recievable', 100126, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 2, 'Balance Sheet', NULL ), 
		('Merchandise Inventory', 100131, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 3, 'Balance Sheet', NULL ), 
		('Raw Materials', 100132, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 3, 'Balance Sheet', NULL ), 
		('Work in Process', 100133, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 3, 'Balance Sheet', NULL ), 
		('Finished Goods', 100134, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 3, 'Balance Sheet', NULL ), 
		('Supplies', 100141, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 4, 'Balance Sheet', NULL ), 
		('Office Supplies', 100142, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 4, 'Balance Sheet', NULL), 
		('Food Supplies', 100144, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 4, 'Balance Sheet', NULL ),
		('Prepaid Rent', 100146, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 4, 'Balance Sheet', NULL ),
('Prepaid Insurance', 100145, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 4, 'Balance Sheet', NULL ),
		('Bond Sinking Fund', 100153, NULL, 'left', 'Assets', 'Current Assets', 0,0,0,0, NULL, NULL, 5, 'Balance Sheet', NULL ),
		('Land', 100161, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 6, 'Balance Sheet', NULL ),
('Natural Resources', 100162, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 6, 'Balance Sheet', NULL ),
('Accumulated Depletion', 101162, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 6, 'Balance Sheet', NULL ),
('Buildings', 100171, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 7, 'Balance Sheet', NULL ),
('Accumulated Depreciation Buildings', 101171, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 7, 'Balance Sheet', NULL ),
('Office Equipment', 100181, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Accumulated Depreciation Office Equipment', 101181, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL,8, 'Balance Sheet', NULL ),
('Office Furniture', 100182,  NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Accumulated Depreciation Office Equipment', 101182, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Athletic Equipment', 100183, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Accumulated Depreciation  Athletic  Equipment', 101183, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Tennis Facilities', 100184,  NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Accumulated Depreciation Tennis Facilities', 101184, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Delivery Equipment', 100185, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Accumulated Depreciation Delivery Equipment', 101185, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 8, 'Balance Sheet', NULL ),
('Patents', 100191, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 9, 'Balance Sheet', NULL ),
('Copyrights', 100192, NULL, 'left', 'Assets', 'Noncurrent Assets', 0,0,0,0,NULL, NULL, 9, 'Balance Sheet', NULL ),
('Notes Payable', 100201, NULL, 'Right', 'Liabilities', 'Current Liabilities', 0,0,0,0,NULL, NULL, 10, 'Balance Sheet', NULL ),
('Accounts Payable', 100202, NULL, 'Right', 'Liabilities', 'Current Liabilities', 0,0,0,0, NULL, NULL, 10, 'Balance Sheet', NULL ),
('Accounts Payable', 100202, NULL, 'Right', 'Liabilities', 'Current Liabilities', 0,0,0,0, NULL, NULL, 10, 'Balance Sheet', NULL ),
('Income Tax Payable', 100204, NULL, 'Right', 'Liabilities', 'Current Liabilities', 0,0,0,0, NULL, NULL,10, 'Balance Sheet', NULL ),
('Dividends Declared', 100204, NULL, 'Right', 'Liabilities', 'Current Liabilities', 0,0,0,0, NULL, NULL,10, 'Cash Flow', NULL ),
('Salaries Payable', 100219, NULL, 'Right', 'Liabilities', 'Current Liabilities', 0,0,0,0, NULL, NULL, 10, 'Cash Flow', NULL ),
('Service Revenue', 100401, NULL, 'Right', 'Revenues', 'Operating Revenues', 0,0,0,0, NULL, NULL, 11, 'Income Statement', NULL ),
('Unearned Revenue', 100410, NULL, 'Right', 'Revenues', 'Other Revenues', 0,0,0,0, NULL, NULL, 11, 'Income Statement', NULL ),
('Salaries Expense', 100511, NULL, 'left', 'Expenses', 'Operating Expenses', 0,0,0,0, NULL, NULL, 12, 'Income Statement', NULL ),
('Advertising Expense', 100512, NULL, 'left', 'Expenses', 'Operating Expenses', 0,0,0,0, NULL, NULL, 12, 'Income Statement', NULL ),
('Telephone Expense', 100525, NULL, 'left', 'Expenses', 'General Expenses', 0,0,0,0, NULL, NULL, 13, 'Income Statement', NULL ),
('Utilities Expense', 100533, NULL, 'left', 'Expenses', 'General Expenses', 0,0,0,0, NULL, NULL, 13, 'Income Statement', NULL ),
('Insurance  Expense', 100535, NULL, 'left', 'Expenses', 'General Expenses', 0,0,0,0, NULL, NULL, 13, 'Income Statement', NULL ),
('Depreciation  Expense', 100540, NULL, 'left', 'Expenses', 'General Expenses', 0,0,0,0, NULL, NULL, 13, 'Income Statement', NULL ),
('Rent Expense', 100521, NULL, 'left', 'Expenses', 'General Expenses', 0,0,0,0, NULL, NULL, 13, 'Income Statement', NULL ),
('Supplies Expense', 100523, NULL, 'left', 'Expenses', 'General Expenses', 0,0,0,0, NULL, NULL, 13, 'Income Statement', NULL ),
('Contributed Capital', 100311, NULL, 'Right', 'Equity', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 14, 'Balance Sheet', NULL ),
('Drawing', 100312, NULL, 'Right', 'Equity', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 14, 'Balance Sheet', NULL ),
('Retained Earnings', 100325, NULL, 'Right', 'Equity', 'Noncurrent Assets', 0,0,0,0, NULL, NULL, 14, 'Retained Earnings', NULL)


   INSERT INTO `questions` (`id`,`description`) VALUES 
        (1,  'What is the maiden name of your grandmother?' ),
        (2, 'In what town or city did your mother and father meet?'), 
		(3, 'What is your deepest darket secret?'),
		(4, 'What middle school did you attend?'),
		(5, 'What is the last name of the teacher who gave you your first failing grade?');
