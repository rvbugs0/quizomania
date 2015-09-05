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

Create table question_table (
	code Int NOT NULL AUTO_INCREMENT,
	question text ,
	option1 text,
	option2 text,
	option3 text,
	option4 text,
	answer Int NOT NULL,
	level Int NOT NULL default 0,
 Primary Key (code)) ENGINE = InnoDB;
Create table administrator (
	code Int NOT NULL AUTO_INCREMENT,
	username Char(20) NOT NULL,
	password Char(200) NOT NULL,
	UNIQUE (username),
 Primary Key (code,username)) ENGINE = InnoDB;