SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administratori
-- ----------------------------
DROP TABLE IF EXISTS `administratori`;
CREATE TABLE `administratori` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) DEFAULT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `korisnicko_ime` varchar(100) DEFAULT NULL,
  `lozinka` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administratori
-- ----------------------------
INSERT INTO `administratori` VALUES ('1', 'TZ', 'TZ', 'TZ', 'TZ');

-- ----------------------------
-- Table structure for kuce
-- ----------------------------
DROP TABLE IF EXISTS `kuce`;
CREATE TABLE `kuce` (
  `id_kuce` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) DEFAULT NULL,
  `gospodar` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kuce`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Records of kuce
-- ----------------------------

INSERT INTO `kuce` VALUES ('1', 'House Stark', '1', "kuca_1.jpg");
INSERT INTO `kuce` VALUES ('2', 'House Lannister', '2', "kuca_2.jpg");
INSERT INTO `kuce` VALUES ('3', 'House Martell', '3', "kuca_3.jpg");

-- ----------------------------
-- Table structure for gospodari
-- ----------------------------
DROP TABLE IF EXISTS `gospodari`;
CREATE TABLE `gospodari` (
  `id_gospodara` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) DEFAULT NULL,
  `prezime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_gospodara`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `gospodari` VALUES ('1', 'Ned', 'Stark');
INSERT INTO `gospodari` VALUES ('2', 'Tywin', 'Lannister');
INSERT INTO `gospodari` VALUES ('3', 'Doran', 'Martell');
