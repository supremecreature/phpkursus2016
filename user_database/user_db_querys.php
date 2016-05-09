<?php  exit('Attacker, go away!'); ?>

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `name` varchar(66) NOT NULL,
  `email` varchar(66) NOT NULL,
  `language` varchar(22) NOT NULL,
  `comment` text NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `status` char(1) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_change` datetime NOT NULL,
  `id_users_insert` int(5) NOT NULL,
  `id_users_change` int(5) NOT NULL,
  `level` int(2) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `login_count` int(5) NOT NULL,
  `login_failed_count` int(11) NOT NULL,
  `deleted` tinytext CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='users table' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `name`, `email`, `language`, `comment`, `newsletter`, `status`, `date_insert`, `date_change`, `id_users_insert`, `id_users_change`, `level`, `last_login_date`, `login_count`, `login_failed_count`, `deleted`) VALUES
(1, 'muti', '*22640DBAB9CEE5C7F53E8AF9662B30F0CC441FFB', 'Mutionu', 'muti@urg.ee', 'et', 'tzt', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 4, '2012-09-19 09:06:14', 1, 0, ''),
(2, 'rebane', '*86A52D1F64064103ED834DD513D9F8E4CE5CE772', 'Rebase Rein', '', '', 'Siia sisesta oma kommentaarid', 0, 'y', '2012-09-19 09:09:27', '0000-00-00 00:00:00', 1, 0, 0, '0000-00-00 00:00:00', 0, 0, ''),
(3, 'admin', '*C142FB215B6E05B7C134B1A653AD4B455157FD79', 'Admin Demola', 'admin@uhuu.ee', 'Eesti', 'Siia sisesta oma kommentaarid', 1, 'y', '2012-09-19 09:13:25', '0000-00-00 00:00:00', 1, 0, 4, '0000-00-00 00:00:00', 0, 0, '');
