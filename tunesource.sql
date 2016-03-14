--
-- Database: `tunesource`
--

-- --------------------------------------------------------

--
-- Table structure for table `m3u`
--

CREATE TABLE IF NOT EXISTS `m3u` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `pls_id` bigint(20) NOT NULL DEFAULT '0',
  `id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `m3u` (`user_id`, `pls_id`, `id`) VALUES
(4, 4, 59),
(4, 4, 62),
(4, 4, 65),
(4, 6, 59),
(5, 5, 60),
(5, 7, 65);


CREATE TABLE IF NOT EXISTS `playlist` (
  `pls_id` bigint(20) unsigned NOT NULL,
  `playlist_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


INSERT INTO `playlist` (`pls_id`, `playlist_name`) VALUES
(4, 'rock_diego'),
(5, 'rock_alejo'),
(6, 'electronica'),
(7, 'rancheras');

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(255) NOT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `songname` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `idtag` varchar(30) DEFAULT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;


INSERT INTO `tbl_uploads` (`id`, `file`, `artist`, `album`, `songname`, `genero`, `type`, `idtag`, `size`) VALUES
(45, '3-Nicky Romero (Full HD).mp3', 'Nicky Romero', '', 'Full HD', 'Electronica', 'audio/mp3', '', 172789),
(58, 'Avicii - Hey Brother (Lyric).mp3', 'Avicii', '', 'Hey Brother', 'Electronica', 'audio/mpeg', '', 4138715),
(59, 'Sebastian Ingrosso, Tommy Trash, John Martin - Reload.mp3', 'Sebastian Ingrosso', '', 'Reload', 'Electronica', 'audio/mpeg', '', 3904683),
(60, 'Carnage & Borgore - Incredible (Original Mix).mp3', 'Carnage & Borgore', '', 'Incredible', 'Electronica', 'audio/mp3', '', 6030834),
(62, '02. Here Comes The King (Feat. Angela Hunte) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Here Comes The King', 'Reggae', 'audio/mpeg', '', 8377998),
(63, '07. Fruit Juice (Feat. Mr. Vegas) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Fruit Juice', 'Reggae', 'audio/mpeg', '', 6455387),
(64, 'Diplo & GTA - Boy Oh Boy.mp3', 'Diplo & GTA', '', 'Boy Oh Boy', 'Electronica', 'audio/mpeg', '', 4191374),
(65, 'DVBBS & Borgeous - TSUNAMI (Original Mix).mp3', 'DVBBS & Borgeous', '', 'TSUNAMI', 'Electronica', 'audio/mpeg', '', 3776776),
(66, 'Ellie Goulding - Burn.mp3', 'Ellie Goulding', '', 'Burn', 'Synthpop', 'audio/mpeg', '', 3810610),
(67, 'Martin Garrix - Animals (Official Video).mp3', 'Martin Garrix', '', 'Animals', 'Electronica', 'audio/mpeg', '', 3064990),
--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` bigint(20) unsigned NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `usuario` int(1) NOT NULL,
  `Score` smallint(6) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `is_playing` int(11) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `user_name`, `usuario`, `Score`, `is_logged_in`, `is_playing`, `pass`, `correo`, `type`) VALUES
(1, 'alejo', 0, 0, 0, 0, '12345', 'lalejandro1091@hotmail.com', 0),
(2, 'diego', 0, 0, 0, 0, 'diego', 'diego@tobon.es', 0),
(4, 'visitante', 0, 0, 0, 0, 'visitor', 'visitor@visitor.com', 1),
(5, 'visitante2', 0, 0, 0, 0, 'visitor2', 'visitor2@visitor2.com', 1);


--
-- Indexes for table `m3u`
--
ALTER TABLE `m3u`
  ADD PRIMARY KEY (`user_id`,`pls_id`,`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`pls_id`),
  ADD UNIQUE KEY `user_id` (`pls_id`);

--
-- Indexes for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

ALTER TABLE `playlist`
  MODIFY `pls_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

ALTER TABLE `tbl_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
ALTER TABLE `user_data`
  MODIFY `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
