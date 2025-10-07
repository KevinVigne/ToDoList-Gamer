#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `todolistdb`;
USE `todolistdb`;
CREATE TABLE IF NOT EXISTS `task`(
       `id_task` Int Auto_increment NOT NULL,
       `title` Varchar (150) NOT NULL,
       `description` Text NOT NULL,
       `status` ENUM ('à faire', 'en cours', 'terminé') NOT NULL,
       CONSTRAINT `task_pk` PRIMARY KEY (`id_task`)
    );