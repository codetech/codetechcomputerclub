-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2014 at 07:58 AM
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
(27, 'AT&T', 'txt.att.net'),
(28, 'AT&T Enterprise Paging', 'page.att.net'),
(29, 'AT&T Free2Go', 'mmode.com'),
(50, 'Boost Mobile', 'myboostmobile.com'),
(102, 'Cricket Wireless', 'sms.mycricket.com'),
(163, 'Metro PCS', 'metropcs.sms.us'),
(164, 'Metro PCS', 'mymetropcs.com'),
(269, 'Sprint', 'messaging.sprintpcs.com'),
(270, 'Sprint', 'sprintpaging.com'),
(295, 'T-Mobile', 'tmomail.net'),
(313, 'US Cellular', 'email.uscc.net'),
(318, 'Verizon', 'vtext.com'),
(323, 'Virgin Mobile', 'vmobl.com '),
(324, 'Virgin Mobile', 'vxtras.com');

-- --------------------------------------------------------

--
-- Table structure for table `gateways_users`
--

CREATE TABLE IF NOT EXISTS `gateways_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gateway_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  `receive_update_email` tinyint(1) NOT NULL DEFAULT '1',
  `receive_update_sms` tinyint(1) NOT NULL DEFAULT '1',
  `receive_comment_email` tinyint(1) NOT NULL DEFAULT '1',
  `receive_comment_sms` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `displayemail` tinyint(1) NOT NULL DEFAULT '1',
  `displayphone` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `name`, `email`, `password`, `studentid`, `phone`, `position`, `admin`, `profile`, `receiveemail`, `receivesms`, `displayemail`, `displayphone`) VALUES
(1, '2014-01-26 00:09:47', '2014-01-30 05:29:25', 'Jackson Ray Hamilton', 'jackson@jacksonrayhamilton.com', '24c93471392191c3fee8f4fd19ae3dc66c7d2233', 'w7200734', '760-805-4304', 'Vice President', 1, '<p>Kekekeke.</p>\n<p>How about a code sample?</p>\n<pre><code class="json">{<br />  "welcome": "to the wonderful world",<br />  "of": null,<br />  "JSON": 1234<br />}<br /></code></pre>\n<p>Kekek.</p>', 1, 1, 1, 1),
(2, '2014-01-26 06:00:39', '2014-01-30 00:27:11', 'Weakling', 'takua1995@gmail.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '', 'Member', 0, '', 0, 1, 1, 1),
(3, '2014-01-26 07:53:59', '2014-01-30 00:27:22', 'Ooga Booga', 'ooga@booga.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '', 'Member', 0, '', 0, 1, 1, 1),
(4, '2014-01-27 09:49:15', '2014-02-11 00:22:53', 'Nimrod Jenkins', 'n@nll.com', '24c93471392191c3fee8f4fd19ae3dc66c7d2233', 'w1234567', '760-777-7777', 'Member', 0, '', 0, 1, 1, 1),
(5, '2014-01-29 04:21:46', '2014-01-30 00:27:51', 'Testy McTest', 'takuaninetyfive@gmail.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '', 'Member', 0, '', 1, 1, 1, 1),
(6, '2014-01-30 05:30:45', '2014-01-30 07:25:40', 'Elaina Hamilton', 'e@e.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '760-585-6351', 'Member', 0, '', 0, 0, 1, 1),
(7, '2014-01-30 07:42:45', '2014-02-10 01:47:30', 'Kyle', 'ksanclemente@live.com', '52a58c3673cd501129168fc24594999c3686fc6f', '', '(760) 484-8190', 'President', 1, '', 0, 0, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
