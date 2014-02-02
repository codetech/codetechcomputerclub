-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2014 at 10:27 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned DEFAULT NULL,
  `author` tinytext NOT NULL,
  `ip` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `content` text NOT NULL,
  `agent` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `project_id` bigint(20) unsigned DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `ip`, `created`, `content`, `agent`, `user_id`, `project_id`, `parent_id`, `lft`, `rght`) VALUES
(10, NULL, 'Foxy', '127.0.0.1', '2014-01-29 10:55:35', 'Less anonymous.', 'Mozilla/5.0 (X11; Linux x86_64; rv:26.0) Gecko/20100101 Firefox/26.0', NULL, 4, NULL, 0, 0),
(12, NULL, 'Nimrod Jenkins', '127.0.0.1', '2014-01-29 11:01:25', 'Let''s try again...', 'Mozilla/5.0 (X11; Linux x86_64; rv:26.0) Gecko/20100101 Firefox/26.0', 4, 4, NULL, 0, 0),
(13, NULL, 'FOX', '127.0.0.1', '2014-01-29 11:01:57', 'What do I say', 'Mozilla/5.0 (X11; Linux x86_64; rv:26.0) Gecko/20100101 Firefox/26.0', NULL, 4, NULL, 0, 0),
(15, 1, 'Nimrod Jenkins', '127.0.0.1', '2014-01-29 12:56:10', 'This is pretty rad if I do say so myself.', 'Mozilla/5.0 (X11; Linux x86_64; rv:26.0) Gecko/20100101 Firefox/26.0', 4, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE IF NOT EXISTS `gateways` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `carrier` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carrier` (`carrier`,`address`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=344 ;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `carrier`, `address`) VALUES
(1, '3 River Wireless', 'sms.3rivers.net'),
(2, '7-11 Speakout (USA GSM)', 'cingularme.com'),
(3, 'ACS Wireless', 'paging.acswireless.com'),
(4, 'Advantage Communications', 'advantagepaging.com'),
(5, 'Airtel (Karnataka, India)', 'airtelkk.com'),
(6, 'Airtel Wireless (Montana, USA)', 'sms.airtelmontana.com'),
(7, 'Airtouch Pagers', 'airtouch.net'),
(8, 'Airtouch Pagers', 'airtouchpaging.com'),
(9, 'Airtouch Pagers', 'alphapage.airtouch.com'),
(10, 'Airtouch Pagers', 'myairmail.com'),
(11, 'Alaska Communications Systems', 'msg.acsalaska.com'),
(12, 'Alltel', 'message.alltel.com'),
(13, 'Alltel PCS', 'message.alltel.com'),
(14, 'AlphaNow', 'alphanow.net'),
(16, 'American Messaging', 'page.americanmessaging.net'),
(18, 'Ameritech Clearpath', 'clearpath.acswireless.com'),
(19, 'Ameritech Paging', 'paging.acswireless.com'),
(20, 'Ameritech Paging', 'pageapi.com'),
(21, 'Ameritech Paging', 'paging.acswireless.com'),
(22, 'Andhra Pradesh Airtel', 'airtelap.com'),
(23, 'Aql', 'text.aql.com'),
(24, 'Arch Pagers (PageNet)', 'archwireless.net'),
(25, 'Arch Pagers (PageNet)', 'epage.arch.com'),
(26, 'AT&T', 'mobile.att.net'),
(27, 'AT&T', 'txt.att.net'),
(28, 'AT&T Enterprise Paging', 'page.att.net'),
(29, 'AT&T Free2Go', 'mmode.com'),
(30, 'AT&T PCS', 'mobile.att.net'),
(31, 'AT&T Pocketnet PCS', 'dpcs.mobile.att.net'),
(32, 'BeeLine GSM', 'sms.beemail.ru'),
(33, 'Beepwear', 'beepwear.net'),
(34, 'Bell Atlantic', 'message.bam.com'),
(35, 'Bell Canada', 'bellmobility.ca'),
(36, 'Bell Canada', 'txt.bellmobility.ca'),
(37, 'Bell Mobility', 'txt.bellmobility.ca'),
(39, 'Bell Mobility (Canada)', 'txt.bell.ca'),
(40, 'Bell South', 'bellsouth.cl'),
(41, 'Bell South', 'blsdcs.net'),
(42, 'Bell South', 'sms.bellsouth.com'),
(43, 'Bell South', 'wireless.bellsouth.com'),
(44, 'Bell South (Blackberry)', 'bellsouthtips.com'),
(45, 'Bell South Mobility', 'blsdcs.net'),
(46, 'BigRedGiant Mobile Solutions', 'tachyonsms.co.uk'),
(47, 'Blue Sky Frog', 'blueskyfrog.com'),
(48, 'Bluegrass Cellular', 'sms.bluecell.com'),
(50, 'Boost Mobile', 'myboostmobile.com'),
(51, 'BPL Mobile', 'bplmobile.com'),
(53, 'Carolina Mobile Communications', 'cmcpaging.com'),
(54, 'Carolina West Wireless', 'cwwsms.com'),
(55, 'Cellular One', 'cell1.textmsg.com'),
(56, 'Cellular One', 'cellularone.textmsg.com'),
(57, 'Cellular One', 'cellularone.txtmsg.com'),
(58, 'Cellular One', 'message.cellone-sf.com'),
(59, 'Cellular One', 'mobile.celloneusa.com'),
(60, 'Cellular One', 'sbcemail.com'),
(61, 'Cellular One (Dobson)', 'mobile.celloneusa.com'),
(62, 'Cellular One (East Coast)', 'phone.cellone.net'),
(63, 'Cellular One (South West)', 'swmsg.com'),
(64, 'Cellular One (West)', 'mycellone.com'),
(65, 'Cellular One East Coast', 'phone.cellone.net'),
(66, 'Cellular One PCS', 'paging.cellone-sf.com'),
(67, 'Cellular One South West', 'swmsg.com'),
(68, 'Cellular One West', 'mycellone.com'),
(69, 'Cellular South', 'csouth1.com'),
(70, 'Centennial Wireless', 'cwemail.com'),
(71, 'Centennial Wireless', 'cwemail.com'),
(72, 'Central Vermont Communications', 'cvcpaging.com'),
(73, 'CenturyTel', 'messaging.centurytel.net'),
(74, 'CenturyTel', 'messaging.centurytel.net'),
(75, 'Chennai RPG Cellular', 'rpgmail.net'),
(76, 'Chennai Skycell / Airtel', 'airtelchennai.com'),
(77, 'Cincinnati Bell', 'gocbw.com'),
(78, 'Cincinnati Bell Wireless', 'gocbw.com'),
(79, 'Cingular', 'cingularme.com'),
(80, 'Cingular', 'mms.cingularme.com'),
(81, 'Cingular', 'mycingular.com'),
(82, 'Cingular', 'mycingular.net'),
(83, 'Cingular', 'page.cingular.com'),
(84, 'Cingular (GoPhone prepaid)', 'cingularme.com'),
(85, 'Cingular (Now AT&T)', 'txt.att.net'),
(86, 'Cingular (Postpaid)', 'cingularme.com'),
(87, 'Cingular Wireless', 'mobile.mycingular.com'),
(88, 'Cingular Wireless', 'mobile.mycingular.net'),
(89, 'Cingular Wireless', 'mycingular.textmsg.com'),
(90, 'Claro (Brasil)', 'clarotorpedo.com.br'),
(91, 'Claro (Nicaragua)', 'ideasclaro-ca.com'),
(92, 'Clearnet', 'msg.clearnet.com'),
(93, 'Comcast', 'comcastpcs.textmsg.com'),
(94, 'Comcel', 'comcel.com.co'),
(95, 'Communication Specialist Companies', 'pager.comspeco.com'),
(96, 'Communication Specialists', 'pageme.comspeco.net'),
(97, 'Communication Specialists', 'pageme.comspeco.net'),
(98, 'Comviq', 'sms.comviq.se'),
(99, 'Cook Paging', 'cookmail.com'),
(100, 'Corr Wireless Communications', 'corrwireless.net'),
(102, 'Cricket Wireless', 'sms.mycricket.com'),
(103, 'CTI', 'sms.ctimovil.com.ar'),
(104, 'Delhi Aritel', 'airtelmail.com'),
(105, 'Delhi Hutch', 'delhi.hutch.co.in'),
(106, 'Digi-Page / Page Kansas', 'page.hit.net'),
(108, 'Dobson Cellular Systems', 'mobile.dobson.net'),
(109, 'Dobson-Alex Wireless / Dobson-Cellular One', 'mobile.cellularone.com'),
(110, 'DT T-Mobile', 't-mobile-sms.de'),
(111, 'Dutchtone / Orange-NL', 'sms.orange.nl'),
(112, 'Edge Wireless', 'sms.edgewireless.com'),
(113, 'EMT', 'sms.emt.ee'),
(114, 'Emtel (Mauritius)', 'emtelworld.net'),
(115, 'Escotel', 'escotelmobile.com'),
(116, 'Fido', 'fido.ca'),
(118, 'Gabriel Wireless', 'epage.gabrielwireless.com'),
(119, 'Galaxy Corporation', 'sendabeep.net'),
(120, 'GCS Paging', 'webpager.us'),
(121, 'General Communications Inc.', 'msg.gci.net'),
(122, 'German T-Mobile', 't-mobile-sms.de'),
(123, 'Globalstar (satellite)', 'msg.globalstarusa.com'),
(124, 'Goa BPLMobil', 'bplmobile.com'),
(125, 'Golden Telecom', 'sms.goldentele.com'),
(126, 'GrayLink / Porta-Phone', 'epage.porta-phone.com'),
(127, 'GTE', 'airmessage.net'),
(128, 'GTE', 'gte.pagegate.net'),
(129, 'GTE', 'messagealert.com'),
(130, 'Gujarat Celforce', 'celforce.com'),
(131, 'Helio', 'messaging.sprintpcs.com'),
(133, 'Houston Cellular', 'text.houstoncellular.net'),
(134, 'i wireless', 'iwspcs.net'),
(135, 'Idea Cellular', 'ideacellular.net'),
(136, 'Illinois Valley Cellular', 'ivctext.com'),
(138, 'Indiana Paging Co', 'inlandlink.com'),
(139, 'Infopage Systems', 'page.infopagesystems.com'),
(140, 'Infopage Systems', 'pinpage.infopagesystems.com'),
(141, 'Inland Cellular Telephone', 'inlandlink.com'),
(142, 'Iridium (satellite)', 'msg.iridium.com'),
(143, 'Iusacell', 'rek2.com.mx'),
(144, 'JSM Tele-Page', 'jsmtel.com'),
(145, 'JSM Tele-Page', 'pinjsmtel.com'),
(146, 'Kerala Escotel', 'escotelmobile.com'),
(147, 'Kolkata Airtel', 'airtelkol.com'),
(148, 'Koodo Mobile (Canada)', 'msg.koodomobile.com'),
(149, 'Kyivstar', 'smsmail.lmt.lv'),
(150, 'Lauttamus Communication', 'e-page.net'),
(151, 'Life (Ukraine)', 'life.com.ua'),
(152, 'LMT', 'smsmail.lmt.lv'),
(153, 'LMT (Latvia)', 'sms.lmt.lv'),
(154, 'Maharashtra BPL Mobile', 'bplmobile.com'),
(155, 'Maharashtra Idea Cellular', 'ideacellular.net'),
(156, 'Manitoba Telecom Systems', 'text.mtsmobility.com'),
(157, 'MCI', 'pagemci.com'),
(158, 'MCI Phone', 'mci.com'),
(159, 'Mero Mobile (Nepal)', '977sms.spicenepal.com'),
(160, 'Meteor', 'mymeteor.ie'),
(161, 'Meteor', 'sms.mymeteor.ie'),
(163, 'Metro PCS', 'metropcs.sms.us'),
(164, 'Metro PCS', 'mymetropcs.com'),
(165, 'Metro PCS', 'mymetropcs.com, metropcs.sms.us'),
(166, 'Metrocall', 'page.metrocall.com'),
(167, 'Metrocall 2-way', 'my2way.com'),
(168, 'MetroPCS', 'mymetropcs.com'),
(169, 'Microcell', 'fido.ca'),
(170, 'Midwest Wireless', 'clearlydigital.com'),
(171, 'MiWorld', 'm1.com.sg'),
(172, 'Mobilcomm', 'mobilecomm.net'),
(173, 'Mobilecom PA', 'page.mobilcom.net'),
(175, 'Mobileone', 'm1.com.sg'),
(176, 'Mobilfone', 'page.mobilfone.com'),
(177, 'Mobility Bermuda', 'ml.bm'),
(178, 'MobiPCS (Hawaii only)', 'mobipcs.net'),
(179, 'Mobistar Belgium', 'mobistar.be'),
(180, 'Mobitel (Sri Lanka)', 'sms.mobitel.lk'),
(181, 'Mobitel Tanzania', 'sms.co.tz'),
(182, 'Mobtel Srbija', 'mobtel.co.yu'),
(183, 'Morris Wireless', 'beepone.net'),
(184, 'Motient', 'isp.com'),
(185, 'Movicom (Argentina)', 'sms.movistar.net.ar'),
(186, 'Movistar', 'correo.movistar.net'),
(187, 'Movistar (Colombia)', 'movistar.com.co'),
(188, 'MTN (South Africa)', 'sms.co.za'),
(189, 'MTS', 'text.mtsmobility.com'),
(190, 'MTS (Canada)', 'text.mtsmobility.com'),
(191, 'Mumbai BPL Mobile', 'bplmobile.com'),
(192, 'Mumbai Orange', 'orangemail.co.in'),
(193, 'NBTel', 'wirefree.informe.ca'),
(194, 'Netcom', 'sms.netcom.no'),
(195, 'Nextel', 'messaging.nextel.com'),
(196, 'Nextel', 'nextel.com.br'),
(197, 'Nextel', 'page.nextel.com'),
(198, 'Nextel (Argentina)', 'TwoWay.11nextel.net.ar'),
(199, 'Nextel (United States)', 'messaging.nextel.com'),
(200, 'Northeast Paging', 'pager.ucom.com'),
(201, 'NPI Wireless', 'npiwireless.com'),
(202, 'Ntelos', 'pcs.ntelos.com'),
(203, 'O2', 'o2.co.uk'),
(204, 'O2', 'o2imail.co.uk'),
(205, 'O2 (M-mail)', 'mmail.co.uk'),
(206, 'Omnipoint', 'omnipoint.com'),
(207, 'Omnipoint', 'omnipointpcs.com'),
(208, 'One Connect Austria', 'onemail.at'),
(209, 'OnlineBeep', 'onlinebeep.net'),
(210, 'Optus Mobile', 'optusmobile.com.au'),
(211, 'Orange', 'orange.net'),
(212, 'Orange - NL / Dutchtone', 'sms.orange.nl'),
(213, 'Orange Mumbai', 'orangemail.co.in'),
(214, 'Orange NL / Dutchtone', 'sms.orange.nl'),
(215, 'Orange Polska (Poland)', 'orange.pl'),
(216, 'Oskar', 'mujoskar.cz'),
(217, 'P&T Luxembourg', 'sms.luxgsm.lu'),
(218, 'Pacific Bell', 'pacbellpcs.net'),
(219, 'PageMart', '7digitpinpagemart.net'),
(220, 'PageMart Advanced /2way', 'airmessage.net'),
(221, 'PageMart Canada', 'pmcl.net'),
(222, 'PageNet Canada', 'e.pagenet.ca'),
(223, 'PageNet Canada', 'pagegate.pagenet.ca'),
(224, 'PageOne NorthWest', 'page1nw.com'),
(225, 'PCS One', 'pcsone.net'),
(226, 'Personal (Argentina)', 'alertas.personal.com.ar'),
(227, 'Personal Communication', 'pcom.ru'),
(229, 'Pioneer / Enid Cellular', 'msg.pioneerenidcellular.com'),
(230, 'Plus GSM (Poland)', '48text.plusgsm.pl'),
(231, 'PlusGSM', 'text.plusgsm.pl'),
(232, 'Pondicherry BPL Mobile', 'bplmobile.com'),
(233, 'Powertel', 'voicestream.net'),
(234, 'President?s Choice (Canada)', 'txt.bell.ca'),
(235, 'President''s Choice', 'txt.bell.ca'),
(236, 'Price Communications', 'mobilecell1se.com'),
(237, 'Primeco', 'email.uscc.net'),
(238, 'Primtel', 'sms.primtel.ru'),
(239, 'ProPage', '7digitpagerpage.propage.net'),
(240, 'Public Service Cellular', 'sms.pscel.com'),
(241, 'Qualcomm', 'pager.qualcomm.com'),
(242, 'Qwest', 'qwestmp.com'),
(244, 'RAM Page', 'ram-page.com'),
(247, 'Rogers AT&T Wireless', 'pcs.rogers.com'),
(249, 'Safaricom', 'safaricomsms.com'),
(250, 'Sasktel (Canada)', 'sms.sasktel.com'),
(251, 'Satelindo GSM', 'satelindogsm.com'),
(252, 'Satellink', 'satellink.net'),
(253, 'Satellink', 'satellink.net'),
(254, 'SBC Ameritech Paging', 'paging.acswireless.com'),
(255, 'SBC Ameritech Paging (see also American Messaging)', 'paging.acswireless.com'),
(256, 'SCS-900', 'phonescs-900.ru'),
(257, 'SCS-900', 'scs-900.ru'),
(258, 'Setar Mobile email (Aruba)', 'mas.aw'),
(259, 'SFR France', 'sfr.fr'),
(260, 'Simple Freedom', 'text.simplefreedom.net'),
(261, 'Skytel Pagers', '7digitpinskytel.com'),
(262, 'Skytel Pagers', 'email.skytel.com'),
(263, 'SL Interactive (Australia)', 'slinteractive.com.au'),
(264, 'Smart Telecom', 'mysmart.mymobile.ph'),
(265, 'Solo Mobile', 'txt.bell.ca'),
(266, 'Southern LINC', 'page.southernlinc.com'),
(267, 'Southwestern Bell', 'email.swbw.com'),
(268, 'Sprint', 'cingularme.com'),
(269, 'Sprint', 'messaging.sprintpcs.com'),
(270, 'Sprint', 'sprintpaging.com'),
(272, 'ST Paging', 'page.stpaging.com'),
(273, 'Sumcom', 'tms.suncom.com'),
(275, 'SunCom', 'suncom1.com'),
(276, 'Suncom', 'tms.suncom.com'),
(277, 'Sunrise Mobile', 'freesurf.ch'),
(278, 'Sunrise Mobile', 'mysunrise.ch'),
(279, 'Sunrise Mobile', 'swmsg.com'),
(280, 'Surewest Communicaitons', 'mobile.surewest.com'),
(281, 'Surewest Communications', 'freesurf.ch'),
(282, 'Swisscom', 'bluewin.ch'),
(283, 'Tamil Nadu BPL Mobile', 'bplmobile.com'),
(284, 'Tele2 Latvia', 'sms.tele2.lv'),
(285, 'Telefonica Movistar', 'movistar.net'),
(286, 'Telenor', 'mobilpost.no'),
(287, 'Teletouch', 'pageme.teletouch.com'),
(288, 'Telia Denmark', 'gsm1800.telia.dk'),
(289, 'Telus', 'msg.telus.com'),
(290, 'Telus Mobility (Canada)', 'msg.telus.com'),
(291, 'The Indiana Paging Co', 'pager.tdspager.com'),
(292, 'Thumb Cellular', 'sms.thumbcellular.com'),
(293, 'Tigo (Formerly Ola)', 'sms.tigo.com.co'),
(294, 'TIM', 'timnet.com'),
(295, 'T-Mobile', 'tmomail.net'),
(296, 'T-Mobile', 'voicestream.net'),
(297, 'T-Mobile (Austria)', 'sms.t-mobile.at'),
(298, 'T-Mobile (UK)', 't-mobile.uk.net'),
(300, 'T-Mobile Germany', 't-d1-sms.de'),
(301, 'T-Mobile UK', 't-mobile.uk.net'),
(302, 'Tracfone', 'txt.att.net'),
(303, 'Tracfone (prepaid)', 'mmst5.tracfone.com'),
(304, 'Triton', 'tms.suncom.com'),
(305, 'TSR Wireless', 'alphame.com'),
(306, 'TSR Wireless', 'beep.com'),
(307, 'U.S. Cellular', 'email.uscc.net'),
(308, 'UCOM', 'pager.ucom.com'),
(309, 'UMC', 'sms.umc.com.ua'),
(310, 'Unicel', 'utext.com'),
(312, 'Uraltel', 'sms.uraltel.ru'),
(313, 'US Cellular', 'email.uscc.net'),
(314, 'US Cellular', 'smtp.uscc.net'),
(315, 'US Cellular', 'uscc.textmsg.com'),
(316, 'US West', 'uswestdatamail.com'),
(317, 'Uttar Pradesh Escotel', 'escotelmobile.com'),
(318, 'Verizon', 'vtext.com'),
(319, 'Verizon Pagers', 'myairmail.com'),
(320, 'Verizon PCS', 'myvzw.com'),
(321, 'Verizon PCS', 'vtext.com'),
(322, 'Vessotel', 'pager.irkutsk.ru'),
(323, 'Virgin Mobile', 'vmobl.com '),
(324, 'Virgin Mobile', 'vxtras.com'),
(325, 'Virgin Mobile (Canada)', 'vmobile.ca'),
(327, 'Vodacom (South Africa)', 'voda.co.za'),
(328, 'Vodafone (Italy)', 'sms.vodafone.it'),
(329, 'Vodafone Italy', 'sms.vodafone.it'),
(330, 'Vodafone Japan', 'c.vodafone.ne.jp'),
(331, 'Vodafone Japan', 'h.vodafone.ne.jp'),
(332, 'Vodafone Japan', 't.vodafone.ne.jp'),
(333, 'Vodafone UK', 'vodafone.net'),
(334, 'VoiceStream', 'voicestream.net'),
(335, 'VoiceStream / T-Mobile', 'voicestream.net'),
(336, 'WebLink Wiereless', 'airmessage.net'),
(337, 'WebLink Wiereless', 'pagemart.net'),
(338, 'WebLink Wireless', 'airmessage.net'),
(339, 'WebLink Wireless', 'pagemart.net'),
(340, 'West Central Wireless', 'sms.wcc.net'),
(341, 'Western Wireless', 'cellularonewest.com'),
(342, 'Wyndtell', 'wyndtell.com'),
(343, 'YCC', 'sms.ycc.ru');

-- --------------------------------------------------------

--
-- Table structure for table `gateways_users`
--

CREATE TABLE IF NOT EXISTS `gateways_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gateway_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=376 ;

--
-- Dumping data for table `gateways_users`
--

INSERT INTO `gateways_users` (`id`, `gateway_id`, `user_id`) VALUES
(1, 26, 1),
(2, 27, 1),
(374, 295, 7),
(375, 296, 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `content` longtext NOT NULL,
  `title` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `commentable` tinyint(1) NOT NULL DEFAULT '1',
  `modified` datetime NOT NULL,
  `project_id` bigint(20) unsigned DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created`, `content`, `title`, `published`, `commentable`, `modified`, `project_id`, `slug`, `user_id`) VALUES
(1, '2014-01-29 12:50:28', '<p>Here''s a connectjs tutorial:</p>\n<pre><code><span class="keyword">var</span> app = connect()\n  .use(connect.logger(<span class="string">''dev''</span>))\n  .use(connect.static(<span class="string">''public''</span>))\n  .use(<span class="keyword">function</span>(req, res){\n    res.end(<span class="string">''hello world\\n''</span>);\n  })\n\nhttp.createServer(app).listen(<span class="number">3000</span>);</code></pre>\n<p>Just a little thing I cooked up, ya know.</p>', 'A Cool Little Tidbit Of Info', 1, 1, '2014-01-29 13:22:50', NULL, 'connectjs-tutorial', 4),
(2, '2014-01-29 13:23:38', '<p>Here''s some crappy software for the nimrod project.</p>', 'Crappy Software', 1, 1, '2014-01-29 13:23:38', 4, 'crappy-software', 4),
(3, '2014-01-29 13:34:21', '<p>sdfsdf</p>', 'Nimrod 5000', 1, 1, '2014-01-29 13:34:21', 4, 'sdfsdfsdf', 4),
(6, '2014-01-30 10:18:40', '<p>dfgdfg</p>', 'sfgdfg', 1, 1, '2014-01-30 10:18:40', NULL, 'dfgdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `content` longtext NOT NULL,
  `title` text NOT NULL,
  `excerpt` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `modified` datetime NOT NULL,
  `icon` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `started` datetime NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL,
  `commentable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `created`, `content`, `title`, `excerpt`, `published`, `modified`, `icon`, `slug`, `status`, `started`, `priority`, `user_id`, `commentable`) VALUES
(1, '2014-01-27 05:42:21', '<p>Quick Brown Fox</p>\n<p>Â </p>\n', 'Quick Brown Fox Project', 'A project about quick brown foxes.', 1, '2014-01-27 11:46:49', '', 'quick-brown-fox-project', 'Beta', '2014-01-27 00:00:00', 10, 1, 1),
(2, '2014-01-27 05:45:48', 'ABC!', 'Abc', 'Abc...', 1, '2014-01-27 05:45:48', '', 'abc', 'ABC, of course', '2014-01-27 05:45:00', 3, 2, 1),
(3, '2014-01-27 07:09:26', 'Blah blah.', 'Dumb Project', 'A dumb project that is dumb.', 1, '2014-01-27 07:09:26', '', 'dumb-project', 'Dumb', '2014-01-27 07:08:00', 1, 1, 1),
(4, '2014-01-29 10:09:47', '<p>Yo yo. <em><strong>GOD YES</strong></em></p>', 'Nimrod Project', 'Blah blah.', 1, '2014-01-29 13:18:41', '', 'nimrod-project', 'Ongoing', '2014-01-29 00:00:00', 1, 4, 1),
(5, '2014-01-29 21:49:58', '<p>Blah.</p>', 'Project Project', 'Blah blah.', 1, '2014-01-29 21:49:58', '', 'project-project', 'Blah!', '2014-01-29 00:00:00', 8, 1, 1),
(6, '2014-01-29 21:51:05', '<p>sdf</p>\n<p>ssd</p>\n<p>fs</p>\n<p><em><strong>dfsdf</strong></em></p>\n<p>sdf</p>', 'Extremely Silly Project', 'Silly Billy.', 1, '2014-01-29 21:51:05', '', 'kekeke', 'You know.', '2014-01-29 00:00:00', 2, 1, 1),
(7, '2014-01-29 21:51:46', '<p>123</p>', '123', '123', 1, '2014-01-29 21:51:46', '', '123-321', '321', '2014-01-29 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE IF NOT EXISTS `projects_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`id`, `user_id`, `project_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(5, 1, 3),
(6, 2, 3),
(7, 3, 3),
(8, 4, 4),
(9, 5, 4),
(10, 1, 5),
(11, 2, 5),
(12, 1, 6),
(13, 3, 6),
(14, 4, 6),
(15, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `studentid` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `position` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `profile` text NOT NULL,
  `receiveemail` tinyint(1) NOT NULL DEFAULT '1',
  `receivesms` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `name`, `email`, `password`, `studentid`, `phone`, `position`, `admin`, `profile`, `receiveemail`, `receivesms`) VALUES
(1, '2014-01-26 00:09:47', '2014-01-30 05:29:25', 'Jackson Ray Hamilton', 'jackson@jacksonrayhamilton.com', '24c93471392191c3fee8f4fd19ae3dc66c7d2233', 'w7200734', '760-805-4304', 'Vice President', 1, '<p>Kekekeke.</p>\n<p>How about a code sample?</p>\n<pre><code class="json">{<br />  "welcome": "to the wonderful world",<br />  "of": null,<br />  "JSON": 1234<br />}<br /></code></pre>\n<p>Kekek.</p>', 1, 1),
(2, '2014-01-26 06:00:39', '2014-01-30 00:27:11', 'Weakling', 'takua1995@gmail.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '', 'Member', 0, '', 0, 1),
(3, '2014-01-26 07:53:59', '2014-01-30 00:27:22', 'Ooga Booga', 'ooga@booga.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '', 'Member', 0, '', 0, 1),
(4, '2014-01-27 09:49:15', '2014-01-30 06:30:02', 'Nimrod Jenkins', 'n@nll.com', '24c93471392191c3fee8f4fd19ae3dc66c7d2233', 'w1234567', '760-777-7777', 'Member', 0, '', 0, 1),
(5, '2014-01-29 04:21:46', '2014-01-30 00:27:51', 'Testy McTest', 'takuaninetyfive@gmail.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '', 'Member', 0, '', 1, 1),
(6, '2014-01-30 05:30:45', '2014-01-30 07:25:40', 'Elaina Hamilton', 'e@e.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '760-585-6351', 'Member', 0, '', 0, 0),
(7, '2014-01-30 07:42:45', '2014-01-30 09:52:50', 'Kyle', 'ksanclemente@live.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '(760) 484-8190', 'President', 1, '', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
