create database wateryfb_waterdb_db
/*Admin table */
create table wm_admin
(
wm_uid tinyint not null auto_increment primary key,
wm_uname varchar(20),	
wm_upass varchar(20)
)
/* category table*/
create table wm_cat(wm_catid tinyint not null auto_increment primary key,wm_name varchar(20),wm_status varchar(20),wm_time timestamp)/* subcategory table*/create table wm_subcat(wm_subcatid tinyint not null auto_increment primary key,wm_catid_sub int,wm_subname varchar(20),wm_substatus varchar(20),wm_subtime timestamp)

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
wm_time timestamp)create table wm_about(wm_aboutid int not null auto_increment primary key,wm_abouttext text,wm_time timestamp)create table wm_award(wm_awardid int not null auto_increment primary key,wm_awardtext text,wm_awardtime timestamp)create table wm_career(wm_careerid int not null auto_increment primary key,wm_careertext text,wm_careertime timestamp)create table wm_media(wm_mediaid int not null auto_increment primary key,wm_mediatext text,wm_mediatime timestamp)create table wm_team(wm_teamid int not null auto_increment primary key,wm_teammember varchar(100),wm_desi varchar(100),wm_phto text,wm_status varchar(500),wm_teamtime timestamp)create table wm_testimonial(wm_testid int not null auto_increment primary key,wm_testtext text,wm_client varchar(100),wm_company varchar(100),wm_testtime timestamp)create table wm_client(wm_clientid int not null auto_increment primary key,wm_imgpath varchar(100),wm_ctime timestamp)