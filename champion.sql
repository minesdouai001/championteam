#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP TABLE if exists menu;
DROP TABLE if exists plat;
DROP TABLE if exists user;
DROP TABLE if exists repas;

#------------------------------------------------------------
# Table: menu
#------------------------------------------------------------

CREATE TABLE menu(
        id_menu   int (11) Auto_increment  NOT NULL ,
        date_menu Datetime ,
        id_user   Int ,
        PRIMARY KEY (id_menu )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: plat
#------------------------------------------------------------

CREATE TABLE plat(
        id_plat    int (11) Auto_increment  NOT NULL ,
        title Varchar (25) ,
        type  Varchar (25) ,
        PRIMARY KEY (id_plat )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_user      int (11) Auto_increment  NOT NULL ,
        username     Varchar (25) ,
        password     Varchar (25) ,
        admin        Bool ,
        user_id_user Int NOT NULL ,
        PRIMARY KEY (id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: repas
#------------------------------------------------------------

CREATE TABLE repas(
        id_menu Int NOT NULL ,
        id_plat      Int NOT NULL ,
        PRIMARY KEY (id_menu ,id_plat )
)ENGINE=InnoDB;

ALTER TABLE menu ADD CONSTRAINT FK_menu_id_user FOREIGN KEY (id_user) REFERENCES user(id_user);
ALTER TABLE user ADD CONSTRAINT FK_user_id_user FOREIGN KEY (user_id_user) REFERENCES user(id_user);
ALTER TABLE repas ADD CONSTRAINT FK_repas_id_menu FOREIGN KEY (id_menu) REFERENCES menu(id_menu);
ALTER TABLE repas ADD CONSTRAINT FK_repas_id_plat FOREIGN KEY (id_plat) REFERENCES plat(id_plat);
