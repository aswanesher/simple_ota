/*
MySQL Data Transfer
Source Host: localhost
Source Database: ota_db
Target Host: localhost
Target Database: ota_db
Date: 09-May-15 6:30:44 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tb_booking
-- ----------------------------
DROP TABLE IF EXISTS `tb_booking`;
CREATE TABLE `tb_booking` (
  `book_code` varchar(30) NOT NULL,
  `Rqid` varchar(40) DEFAULT NULL,
  `App` varchar(40) DEFAULT NULL,
  `Action` varchar(40) DEFAULT NULL,
  `Org_code` varchar(40) DEFAULT NULL,
  `Dest_code` varchar(40) DEFAULT NULL,
  `round_trip_status` int(11) DEFAULT NULL,
  `dep_flight_no` varchar(40) DEFAULT NULL,
  `ret_flight_no` varchar(40) DEFAULT NULL,
  `dep_date` varchar(15) DEFAULT NULL,
  `ret_date` varchar(15) DEFAULT NULL,
  `subclass_dep` varchar(40) DEFAULT NULL,
  `subclass_ret` varchar(40) DEFAULT NULL,
  `caller` varchar(50) DEFAULT NULL,
  `contact_1` varchar(30) DEFAULT NULL,
  `contact_2` varchar(30) DEFAULT NULL,
  `contact_3` varchar(30) DEFAULT NULL,
  `num_pax_adult` int(11) DEFAULT NULL,
  `num_pax_child` int(11) DEFAULT NULL,
  `num_pax_infant` int(11) DEFAULT NULL,
  `a_first_name` varchar(50) DEFAULT NULL,
  `a_last_name` varchar(50) DEFAULT NULL,
  `a_salutation` int(11) DEFAULT NULL,
  `a_title` varchar(50) DEFAULT NULL,
  `a_birthdate` varchar(15) DEFAULT NULL,
  `a_mobile` varchar(50) DEFAULT NULL,
  `a_passport` varchar(50) DEFAULT NULL,
  `a_passport_exp` varchar(15) DEFAULT NULL,
  `a_nationality` varchar(50) DEFAULT NULL,
  `c_first_name` varchar(50) DEFAULT NULL,
  `c_last_name` varchar(50) DEFAULT NULL,
  `c_salutation` int(11) DEFAULT NULL,
  `c_title` varchar(50) DEFAULT NULL,
  `c_birthdate` varchar(15) DEFAULT NULL,
  `c_mobile` varchar(50) DEFAULT NULL,
  `c_passport` varchar(50) DEFAULT NULL,
  `c_passport_exp` varchar(15) DEFAULT NULL,
  `c_nationality` varchar(50) DEFAULT NULL,
  `i_first_name` varchar(50) DEFAULT NULL,
  `i_last_name` varchar(50) DEFAULT NULL,
  `i_parent` int(11) DEFAULT NULL,
  `i_salutation` int(11) DEFAULT NULL,
  `i_title` varchar(50) DEFAULT NULL,
  `i_birthdate` varchar(15) DEFAULT NULL,
  `i_mobile` varchar(50) DEFAULT NULL,
  `i_passport` varchar(50) DEFAULT NULL,
  `i_passport_exp` varchar(15) DEFAULT NULL,
  `i_nationality` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`book_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tb_cancel_booking
-- ----------------------------
DROP TABLE IF EXISTS `tb_cancel_booking`;
CREATE TABLE `tb_cancel_booking` (
  `cancel_book_code` int(11) NOT NULL AUTO_INCREMENT,
  `Rqid` varchar(40) DEFAULT NULL,
  `App` varchar(40) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `book_code` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cancel_book_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tb_payment
-- ----------------------------
DROP TABLE IF EXISTS `tb_payment`;
CREATE TABLE `tb_payment` (
  `payment_code` int(11) NOT NULL AUTO_INCREMENT,
  `Rqid` varchar(40) DEFAULT NULL,
  `App` varchar(40) DEFAULT NULL,
  `action` varchar(40) DEFAULT NULL,
  `book_code` varchar(30) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT NULL,
  `pay_bank` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`payment_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tb_send_ticket
-- ----------------------------
DROP TABLE IF EXISTS `tb_send_ticket`;
CREATE TABLE `tb_send_ticket` (
  `send_ticket_code` int(11) NOT NULL AUTO_INCREMENT,
  `Rqid` varchar(40) DEFAULT NULL,
  `App` varchar(40) DEFAULT NULL,
  `Action` varchar(40) DEFAULT NULL,
  `book_code` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`send_ticket_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `nm_user` varchar(50) DEFAULT NULL,
  `jns_kelamin` enum('P','L') DEFAULT NULL,
  `pekerjaan` varchar(40) DEFAULT NULL,
  `alamat` text,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `no_rek` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tb_void_payment
-- ----------------------------
DROP TABLE IF EXISTS `tb_void_payment`;
CREATE TABLE `tb_void_payment` (
  `void_payment_code` int(11) NOT NULL AUTO_INCREMENT,
  `Rqid` varchar(40) DEFAULT NULL,
  `App` varchar(40) DEFAULT NULL,
  `action` varchar(40) DEFAULT NULL,
  `book_code` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`void_payment_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
