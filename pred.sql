-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2022 at 07:13 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pred`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int(11) NOT NULL,
  `iso` varchar(6) NOT NULL,
  `alert_year` int(4) NOT NULL,
  `alert_week` int(11) NOT NULL,
  `burn_area` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id_dataset`, `iso`, `alert_year`, `alert_week`, `burn_area`) VALUES
(892, 'IDN', 2002, 42, 555.89580721722),
(893, 'IDN', 2002, 37, 81.33676140036),
(894, 'IDN', 2018, 28, 122.13413456374),
(895, 'IDN', 2004, 26, 2713.97858239),
(896, 'IDN', 2018, 39, 67.791980006628),
(897, 'IDN', 2004, 25, 977.08213041556),
(898, 'IDN', 2012, 20, 298.58022318419),
(899, 'IDN', 2010, 33, 81.458980614765),
(900, 'IDN', 2019, 39, 230.50857996734),
(901, 'IDN', 2019, 36, 27.14166907915),
(902, 'IDN', 2015, 23, 122.06112676518),
(903, 'IDN', 2019, 34, 27.143351900408),
(904, 'IDN', 2012, 37, 257.68753057847),
(905, 'IDN', 2009, 31, 94.849870413747),
(906, 'IDN', 2015, 22, 27.119033922669),
(907, 'IDN', 2019, 30, 189.86340692737),
(908, 'IDN', 2012, 24, 664.94425748518),
(909, 'IDN', 2005, 22, 1750.7053204002),
(910, 'IDN', 2006, 24, 2726.0283857464),
(911, 'IDN', 2013, 31, 176.42234709304),
(912, 'IDN', 2006, 26, 284.98667635808),
(913, 'IDN', 2011, 22, 2782.1879021581),
(914, 'IDN', 2010, 32, 122.18737911659),
(915, 'IDN', 2002, 43, 501.46209324387),
(916, 'IDN', 2019, 40, 216.85121387565),
(917, 'IDN', 2018, 34, 13.551406821386),
(918, 'IDN', 2011, 40, 108.46399790102),
(919, 'IDN', 2015, 43, 406.52673128151),
(920, 'IDN', 2017, 37, 81.44008720444),
(921, 'IDN', 2004, 35, 40.711750015335),
(922, 'IDN', 2019, 42, 298.26478812818),
(923, 'IDN', 2001, 35, 95.008895392871),
(924, 'IDN', 2006, 38, 40.671432090988),
(925, 'IDN', 2018, 30, 379.97191746718),
(926, 'IDN', 2014, 32, 27.106897622838),
(927, 'IDN', 2009, 27, 1357.1948194438),
(928, 'IDN', 2011, 32, 27.101787060422),
(929, 'IDN', 2006, 32, 13.552123551716),
(930, 'IDN', 2012, 41, 122.12957426713),
(931, 'IDN', 2018, 31, 67.78601081982),
(932, 'IDN', 2004, 28, 936.44288867595),
(933, 'IDN', 2011, 34, 13.551406821386),
(934, 'IDN', 2014, 35, 27.1490008698),
(935, 'IDN', 2018, 27, 27.140731046134),
(936, 'IDN', 2008, 36, 760.00523429907),
(937, 'IDN', 2011, 39, 393.14394025817),
(938, 'IDN', 2007, 24, 325.67461547435),
(939, 'IDN', 2017, 31, 406.62061936331),
(940, 'IDN', 2003, 34, 27.146603288936),
(941, 'IDN', 2006, 37, 27.117249245086),
(942, 'IDN', 2013, 41, 40.712971785051),
(943, 'IDN', 2015, 41, 352.48188918273),
(944, 'IDN', 2002, 34, 67.78959050959),
(945, 'IDN', 2019, 23, 27.145120067385),
(946, 'IDN', 2009, 28, 122.14396086556),
(947, 'IDN', 2015, 34, 257.56565683262),
(948, 'IDN', 2002, 21, 298.56893028969),
(949, 'IDN', 2018, 25, 13.551816649769),
(950, 'IDN', 2013, 32, 54.28418073239),
(951, 'IDN', 2012, 38, 284.76913203408),
(952, 'IDN', 2015, 42, 582.89664185159),
(953, 'IDN', 2011, 37, 122.03401934705),
(954, 'IDN', 2003, 30, 149.24680409827),
(955, 'IDN', 2019, 38, 610.11593625483),
(956, 'IDN', 2006, 33, 81.413581375333),
(957, 'IDN', 2007, 40, 67.713920020564),
(958, 'IDN', 2006, 45, 67.771181615783),
(959, 'IDN', 2002, 32, 284.95609408301),
(960, 'IDN', 2012, 28, 216.87846639088),
(961, 'IDN', 2011, 35, 81.33676140036),
(962, 'IDN', 2007, 26, 1614.8318876289),
(963, 'IDN', 2002, 33, 81.40716936646),
(964, 'IDN', 2003, 22, 122.14648196507),
(965, 'IDN', 2002, 41, 1274.4846181619),
(966, 'IDN', 2002, 39, 94.900779088311),
(967, 'IDN', 2007, 23, 393.5578875096),
(968, 'IDN', 2017, 36, 108.58567275328),
(969, 'IDN', 2002, 22, 461.43472145137),
(970, 'IDN', 2011, 21, 1275.8011684559),
(971, 'IDN', 2007, 37, 149.19037212457),
(972, 'IDN', 2009, 41, 149.14412549948),
(973, 'IDN', 2003, 23, 81.43089496399),
(974, 'IDN', 2019, 37, 881.45251001804),
(975, 'IDN', 2019, 29, 108.40250515605),
(976, 'IDN', 2017, 42, 54.227916798643),
(977, 'IDN', 2009, 40, 67.792377764222),
(978, 'IDN', 2013, 34, 108.5711668829),
(979, 'IDN', 2010, 38, 27.146140492641),
(980, 'IDN', 2006, 30, 67.924441990499),
(981, 'IDN', 2004, 41, 40.676816932245),
(982, 'IDN', 2018, 32, 81.324346278824),
(983, 'IDN', 2002, 31, 13.569235319404),
(984, 'IDN', 2017, 33, 54.293206488359),
(985, 'IDN', 2009, 32, 121.94815270241),
(986, 'IDN', 2007, 25, 637.77866438078),
(987, 'IDN', 2006, 31, 67.760310946021),
(988, 'IDN', 2004, 30, 190.01063671054),
(989, 'IDN', 2006, 20, 13.553347136579),
(990, 'IDN', 2001, 31, 81.430797938756),
(991, 'IDN', 2012, 26, 13.570459415854),
(992, 'IDN', 2007, 38, 27.121894009943),
(993, 'IDN', 2015, 35, 325.24444772647),
(994, 'IDN', 2009, 37, 325.54248390686),
(995, 'IDN', 2002, 38, 27.111952307315),
(996, 'IDN', 2014, 37, 95.018788384896),
(997, 'IDN', 2008, 32, 230.687506599),
(998, 'IDN', 2012, 21, 40.723168203709),
(999, 'IDN', 2006, 23, 2358.8956520155),
(1000, 'IDN', 2004, 24, 447.82421830512),
(1001, 'IDN', 2004, 31, 27.144655749521),
(1002, 'IDN', 2003, 29, 149.27281305134),
(1003, 'IDN', 2009, 29, 190.00653934661),
(1004, 'IDN', 2006, 40, 135.63409856043),
(1005, 'IDN', 2019, 43, 27.127848638538),
(1006, 'IDN', 2007, 27, 488.50878027958),
(1007, 'IDN', 2018, 37, 542.34667206254),
(1009, 'IDN', 2017, 34, 81.440087293953),
(1010, 'IDN', 2009, 38, 54.251616168419),
(1011, 'IDN', 2008, 33, 257.84604336635),
(1012, 'IDN', 2002, 20, 122.13975622882),
(1013, 'IDN', 2008, 35, 94.994529201971),
(1014, 'IDN', 2015, 37, 67.786230271057),
(1015, 'IDN', 2004, 42, 176.26604151061),
(1016, 'IDN', 2011, 38, 81.350938358605),
(1017, 'IDN', 2017, 40, 189.79939975744),
(1018, 'IDN', 2015, 40, 759.21513566961),
(1019, 'IDN', 2019, 35, 81.327082156706),
(1020, 'IDN', 2006, 21, 149.08712290105),
(1021, 'IDN', 2012, 22, 13.571675950204),
(1022, 'IDN', 2003, 36, 162.88257740507),
(1023, 'IDN', 2015, 24, 67.822913847435),
(1024, 'IDN', 2011, 27, 27.102711073905),
(1025, 'IDN', 2004, 27, 1044.974549829),
(1026, 'IDN', 2006, 34, 705.19358137181),
(1027, 'IDN', 2006, 36, 393.18361292259),
(1028, 'IDN', 2011, 28, 40.653912757556),
(1029, 'IDN', 2011, 19, 108.57340634874),
(1030, 'IDN', 2006, 42, 94.877016580175),
(1031, 'IDN', 2012, 39, 67.805619291818),
(1032, 'IDN', 2003, 38, 27.146880716081),
(1033, 'IDN', 2006, 35, 366.12479230067),
(1034, 'IDN', 2003, 28, 108.57778579388),
(1035, 'IDN', 2004, 22, 13.571208947337),
(1036, 'IDN', 2009, 24, 27.144655749521),
(1037, 'IDN', 2014, 36, 67.872272230885),
(1038, 'IDN', 2012, 36, 149.24759182378),
(1039, 'IDN', 2002, 19, 67.85735288174),
(1040, 'IDN', 2002, 36, 27.11225380012),
(1041, 'IDN', 2005, 23, 447.84427368651),
(1042, 'IDN', 2011, 30, 13.551406821386),
(1043, 'IDN', 2012, 40, 81.381407720925),
(1044, 'IDN', 2010, 39, 325.57659164954),
(1045, 'IDN', 2012, 35, 854.9009018552),
(1046, 'IDN', 2001, 30, 94.99836198155),
(1047, 'IDN', 2015, 39, 67.798887060893),
(1048, 'IDN', 2012, 19, 40.720043646971),
(1049, 'IDN', 2002, 35, 54.231313567294),
(1050, 'IDN', 2011, 20, 3379.4764706309),
(1051, 'IDN', 2018, 38, 257.61004003695),
(1052, 'IDN', 2017, 29, 13.561143513708),
(1053, 'IDN', 2006, 39, 108.51168526959),
(1054, 'IDN', 2005, 25, 27.142137245476),
(1055, 'IDN', 2008, 34, 27.142137245473),
(1056, 'IDN', 2013, 36, 122.14256281041),
(1057, 'IDN', 2006, 43, 13.551304252519),
(1058, 'IDN', 2003, 25, 312.18319015769),
(1059, 'IDN', 2012, 32, 40.712597287792),
(1060, 'IDN', 2010, 34, 27.153114790321),
(1061, 'IDN', 2019, 31, 40.704390984864),
(1062, 'IDN', 2008, 37, 176.43508057728),
(1063, 'IDN', 2013, 33, 54.284555140154),
(1064, 'IDN', 2007, 39, 176.29378499197),
(1065, 'IDN', 2002, 40, 406.75111837784),
(1066, 'IDN', 2012, 25, 135.70262169391),
(1067, 'IDN', 2009, 36, 27.140449188751),
(1068, 'IDN', 2011, 33, 13.551304252519),
(1069, 'IDN', 2009, 25, 27.144376711293),
(1070, 'IDN', 2017, 35, 27.139696614517),
(1071, 'IDN', 2013, 40, 149.28086535201),
(1072, 'IDN', 2009, 30, 27.099623952168),
(1073, 'IDN', 2006, 22, 908.29417575778),
(1074, 'IDN', 2006, 27, 162.85029543734),
(1075, 'IDN', 2003, 31, 339.16939422629),
(1076, 'IDN', 2003, 32, 13.568098672743),
(1077, 'IDN', 2011, 36, 379.6386063142),
(1078, 'IDN', 2004, 29, 637.88349016704),
(1079, 'IDN', 2002, 29, 27.121008401346),
(1080, 'IDN', 2012, 23, 162.8176115249),
(1081, 'IDN', 2005, 21, 1913.5742295798),
(1082, 'IDN', 2006, 25, 651.37426817953),
(1083, 'IDN', 2014, 38, 95.018512076607),
(1084, 'IDN', 2012, 34, 94.954550970747),
(1085, 'IDN', 2001, 34, 312.09500302614),
(1086, 'IDN', 2007, 33, 13.566573122172),
(1087, 'IDN', 2003, 37, 27.147065548165),
(1088, 'IDN', 2006, 29, 27.169464530867),
(1089, 'IDN', 2017, 30, 13.561143513708),
(1091, 'IDN', 2003, 21, 108.57694841069),
(1092, 'IDN', 2001, 32, 298.3906277638),
(1093, 'IDN', 2012, 31, 366.41378179279),
(1094, 'IDN', 2003, 27, 352.69615476821),
(1095, 'IDN', 2003, 45, 27.11225380012),
(1096, 'IDN', 2017, 41, 122.01291315299),
(1097, 'IDN', 2001, 33, 284.69401012568),
(1098, 'IDN', 2005, 20, 27.143911229906),
(1099, 'IDN', 2018, 44, 27.140449188747),
(1100, 'IDN', 2012, 29, 257.72779790587),
(1101, 'IDN', 2018, 26, 13.551816649769),
(1102, 'IDN', 2007, 36, 13.561241700995),
(1103, 'IDN', 2008, 31, 94.996290120435),
(1104, 'IDN', 2007, 22, 203.57148358486),
(1105, 'IDN', 2012, 30, 285.0293688146),
(1106, 'IDN', 2004, 23, 13.571208947337),
(1107, 'IDN', 2004, 34, 54.284274490953),
(1108, 'IDN', 2003, 24, 27.146325682764),
(1109, 'IDN', 2015, 36, 650.79092973022),
(1110, 'IDN', 2019, 41, 284.61591351359),
(1111, 'IDN', 2003, 26, 13.573532774083),
(1112, 'IDN', 2011, 23, 54.24835935483),
(1113, 'IDN', 2013, 35, 135.71358459861);

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlah_kasus` int(11) NOT NULL,
  `jumlah_alert` int(11) NOT NULL,
  `jumlah_burn_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Steven Noor', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1114;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
