# phpMyAdmin MySQL-Dump
# version 2.2.2
# http://phpwizard.net/phpMyAdmin/
# http://phpmyadmin.sourceforge.net/ (download page)
#
# --------------------------------------------------------

#
# Table structure for table `chtml_aliases`
#

CREATE TABLE chtml_aliases (
    id   INT(11)     NOT NULL AUTO_INCREMENT,
    dir  VARCHAR(40) NOT NULL DEFAULT '',
    name VARCHAR(50) NOT NULL DEFAULT '',
    PRIMARY KEY (id)
)
    ENGINE = ISAM;
