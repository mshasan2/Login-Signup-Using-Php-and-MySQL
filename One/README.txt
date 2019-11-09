Go to http://localhost/phpmyadmin/index.php
1.To create a database click on Databases
 Create database
 Database name - "loginsystem"
 Then click on create.
2. To Create table called users--
click on SQL and paste the query below and click on go

	CREATE TABLE users(
	idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL ,
	uidUsers TINYTEXT NOT NULL,
	emailUsers TINYTEXT NOT NULL,
	pwdUsers LONGTEXT
	);


In dbh.inc.php
replace $dBPassword="mysqlpassword";
 with   $dBpassword="";




