
--
-- Database: `jtobones`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`


CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `Score` smallint(6) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `is_playing` int(11) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
