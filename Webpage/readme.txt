Thank you for using our template!

For more awesome templates please visit https://colorlib.com/wp/templates/

Copyright information for the template can't be altered/removed unless you purchase a license.
More information about the license is available here: https://colorlib.com/wp/licence/

Removing copyright information without the license will result in suspension of your hosting and/or domain name(s).

For localhosting this webpage create EMFusers MySQL database:

1. Login in your Cpanel or localhost /phpmyadmin
2. Create new database EMF using utf8_general_ci collation
3. Create table in EMF using this MySQL query:

CREATE TABLE IF NOT EXISTS `EMFusers` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(255) NOT NULL,
 `trn_date` datetime NOT NULL,
 PRIMARY KEY (`id`)
 );
