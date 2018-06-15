CRAEATE TABLE tb_users(
	id_user INT NOT NULL AUTO_INCREMENT,
	str_username varchar(30) not null,
	str_password varchar(255) not null,
	str_accessprofile varchar(10) not null,
	str_email varchar(70) not null,
	PRIMARY KEY (id_user)
);

INSERT INTO tb_users (str_username,str_password,str_accessprofile,str_email)
values('admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'teste@gmail.com');
