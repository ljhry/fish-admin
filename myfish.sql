
create database myfishtank;

use myfishtank;

create table user(
    id int unsigned not null auto_increment primary key,
    username varchar(50) not null,
    password varchar(50) not null,
    isadmin tinyint not null,
    time int 
);
create table fish(
    id int unsigned not null auto_increment primary key,
    name varchar(100) not null,
    img varchar(100) not null,
    ph varchar(50) not null,
    tem varchar(50) not null,
    feed varchar(50) not null,
    wfilter varchar(50) not null,
    oxygen varchar(50) not null,
    wexchange varchar(50) not null,
    detail text
);
create table fishtank(
    id int unsigned not null auto_increment primary key,
    name varchar(100) not null,
    img varchar(100) not null
);
create table userdet(
    id int unsigned not null auto_increment primary key,
    user_id int not null,
    fish_id int not null,
    fishtank_id int not null,
    fish_num int not null,
    status tinyint not null,
    time int 
);
create table comment(
    id int unsigned not null auto_increment primary key,
    user_id int not null,
    content text,
    time int not null
);
ALTER TABLE `fish` ADD `feed` VARCHAR(50) NOT NULL AFTER `tem`;
ALTER TABLE `fish` ADD `wfilter` VARCHAR(50) NOT NULL AFTER `feed`, ADD `oxygen` VARCHAR(50) NOT NULL AFTER `wfilter`, ADD `wexchange` VARCHAR(50) NOT NULL AFTER `oxygen`;
ALTER TABLE `userdet` CHANGE `status` `status` TINYINT(4) NOT NULL DEFAULT '0';
ALTER TABLE `userdet` CHANGE `fish_num` `fish_num` INT(11) NOT NULL DEFAULT '10';
ALTER TABLE `fish` ADD `detail` TEXT NOT NULL AFTER `wexchange`;