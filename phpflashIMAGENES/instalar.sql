# MySQL-Front Dump 2.5
#
# Host: localhost   Database: test
# --------------------------------------------------------
# Server version 4.0.9-gamma-max-nt
CREATE DATABASE test;
USE test;


#
# Table structure for table 'pics'
#

DROP TABLE IF EXISTS pics;
CREATE TABLE pics (
  id int(11) unsigned NOT NULL auto_increment,
  tipo varchar(100) NOT NULL default '',
  size int(11) NOT NULL default '0',
  path varchar(50) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'pics'
#

INSERT INTO pics (tipo, size, path) VALUES("image/pjpeg", "55", "imagenes/31-i.jpg");
