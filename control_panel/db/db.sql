create database wateryfb_waterdb_db
/*Admin table */
create table wm_admin
(
wm_uid tinyint not null auto_increment primary key,
wm_uname varchar(20),	
wm_upass varchar(20)
)
/* category table*/
create table wm_cat

/* year table*/
create table wm_year
(
wm_yearid tinyint not null auto_increment primary key,
wm_catid_year int,
wm_subcatid_year int,
wm_year varchar(20),
wm_yearstatus varchar(20),
wm_subtime timestamp
)

/* product table*/

create table wm_product
(
wm_proid int not null auto_increment primary key,
wm_catid_product int,
wm_subcatid_product int,
wm_year_product int,
wm_product varchar(100),
wm_path varchar(255),
wm_prostatus varchar(20),
wm_time timestamp