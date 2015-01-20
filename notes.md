


#创建 users 表

CREATE TABLE IF NOT EXISTS `users` (  
	`ID` int(10) NOT NULL AUTO_INCREMENT,  
	`name` varchar(100) NOT NULL,  
	`email` varchar(225) NOT NULL,  
	`username` varchar(30) NOT NULL,  
	`password` varchar(50) NOT NULL,  
	`country` varchar(100) NOT NULL,  
	`address` varchar(100) NOT NULL,  
	`gender` varchar(20) NOT NULL,  
	`salt` varchar(50) NOT NULL,  
	PRIMARY KEY (`ID`)  ) 
ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;