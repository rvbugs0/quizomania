Create table participants (
	code Int NOT NULL AUTO_INCREMENT,
	name Char(20) NOT NULL,
	gender Char(1) NOT NULL,
	email Char(50) NOT NULL,
	college Char(50) NOT NULL,
	phone Char(11) NOT NULL,
	password Char(100) NOT NULL,
	score Int NOT NULL,
	attempted Int NOT NULL,
	UNIQUE (email),
	UNIQUE (phone),
	UNIQUE (password),
 Primary Key (code,email,phone,password)) ENGINE = InnoDB;

Create table question (
	code Int NOT NULL AUTO_INCREMENT,
	question Varchar(200) NOT NULL,
	option1 Varchar(50) NOT NULL,
	option2 Varchar(20) NOT NULL,
	option3 Varchar(20) NOT NULL,
	option4 Varchar(20) NOT NULL,
	right_answer Int NOT NULL,
	level Int NOT NULL,
 Primary Key (code)) ENGINE = InnoDB;
Create table question_table (
	qcode Int NOT NULL AUTO_INCREMENT,
	question Varchar(500) NOT NULL,
	option1 Varchar(50) NOT NULL,
	option2 Varchar(50) NOT NULL,
	option3 Varchar(50) NOT NULL,
	option4 Varchar(50) NOT NULL,
	answer Int NOT NULL,
 Primary Key (qcode)) ENGINE = InnoDB;
Create table administrator (
	code Int NOT NULL AUTO_INCREMENT,
	username Char(20) NOT NULL,
	password Char(200) NOT NULL,
	UNIQUE (username),
 Primary Key (code,username)) ENGINE = InnoDB;