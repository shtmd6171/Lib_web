create table test(
     name char(30) NOT NULL,
	 adda int(10) NOT NULL,
	 sub char(20) DEFAULT NULL,
	 mul char(20) DEFAULT NULL,
	 total char(20) DEFAULT NULL,
	 PRIMARY KEY (name)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;