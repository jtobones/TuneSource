
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-04-2016 a las 01:49:02
-- Versión del servidor: 10.0.23-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u944924796_ts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m3u`
--

CREATE TABLE IF NOT EXISTS `m3u` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `pls_id` bigint(20) NOT NULL DEFAULT '0',
  `id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`pls_id`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `m3u`
--

INSERT INTO `m3u` (`user_id`, `pls_id`, `id`) VALUES
(2, 1, 45),
(2, 1, 46),
(2, 1, 47),
(2, 1, 48),
(2, 2, 49),
(2, 3, 50),
(2, 4, 51),
(3, 5, 45),
(3, 6, 46),
(3, 7, 47),
(4, 4, 59),
(4, 4, 62),
(4, 4, 65),
(4, 6, 59),
(4, 8, 45),
(4, 9, 45),
(5, 5, 60),
(5, 7, 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `pls_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `playlist_name` varchar(50) NOT NULL,
  PRIMARY KEY (`pls_id`),
  UNIQUE KEY `user_id` (`pls_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`pls_id`, `playlist_name`) VALUES
(1, 'diego1'),
(2, 'diego2'),
(3, 'diego4'),
(4, 'rock_diego'),
(5, 'rock_alejo'),
(6, 'electronica'),
(7, 'rancheras'),
(8, 'usuario.vis1'),
(9, 'usuario.vis1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_uploads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `songname` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `idtag` varchar(30) DEFAULT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`id`, `file`, `artist`, `album`, `songname`, `genero`, `type`, `idtag`, `size`) VALUES
(45, '3-Nicky Romero (Full HD).mp3', 'Nicky Romero', '', 'Full HD', 'Electronica', 'audio/mp3', '', 172789),
(46, 'David Guetta - Shot Me Down ft. Skylar Grey (Lyric Video).mp3', 'David Guetta', '', 'Shot Me Down', 'Electronica', 'audio/mp3', '', 3043273),
(47, 'Calvin Harris & Alesso - Under Control ft. Hurts.mp3', 'Calvin Harris', '', 'Under Control', 'Electronica', 'audio/mp3', '', 3366347),
(48, 'Pitbull - Timber ft. Ke$ha.mp3', 'Pitbull', '', 'Timber', 'Dance pop', 'audio/mp3', '', 3424003),
(49, 'Maid with the Flaxen Hair.mp3', 'Richard Stoltzman', '', 'Maid with the Flaxen Hair', 'Classic', 'audio/mp3', '', 4113874),
(50, 'Showtek ft. We Are Loud & Sonny Wilson - Booyah (Official Music Video).mp3', 'Showtek', '', 'Booyah', 'Electronica', 'audio/mp3', '', 4059763),
(51, 'Steve Aoki, Chris Lake & Tujamo - Boneless (Official Video).mp3', 'Steve Aoki', '', 'Boneless', 'Electronica', 'audio/mp3', '', 3744611),
(52, 'Calvin Harris - I Need Your Love ft. Ellie Goulding.mp3', 'Calvin Harris', '', 'I Need Your Love', 'Electronica', 'audio/mp3', '', 3629664),
(53, 'David Guetta - Play Hard ft. Ne-Yo, Akon (Official Video).mp3', 'David Guetta', '', 'Play Hard', 'Electronica', 'audio/mp3', '', 3865399),
(54, 'Avicii - You Make Me.mp3', 'Avicii', '', 'You Make Me', 'Electronica', 'audio/mp3', '', 3834851),
(55, 'Naughty Boy - La La La ft. Sam Smith.mp3', 'Naughty Boy', '', 'La La La', 'Pop', 'audio/mp3', '', 3900905),
(56, 'David Guetta - Play Hard ft. Ne-Yo, Akon (Official Video).mp3', 'David Guetta', '', 'Play Hard', 'Electronica', 'audio/mp3', '', 3865399),
(57, 'Showtek ft. We Are Loud & Sonny Wilson - Booyah (Official Music Video).mp3', 'Showtek', '', 'Booyah', 'Electronica', 'audio/mpeg', '', 4059763),
(58, 'Avicii - Hey Brother (Lyric).mp3', 'Avicii', '', 'Hey Brother', 'Electronica', 'audio/mpeg', '', 4138715),
(59, 'Sebastian Ingrosso, Tommy Trash, John Martin - Reload.mp3', 'Sebastian Ingrosso', '', 'Reload', 'Electronica', 'audio/mpeg', '', 3904683),
(60, 'Carnage & Borgore - Incredible (Original Mix).mp3', 'Carnage & Borgore', '', 'Incredible', 'Electronica', 'audio/mp3', '', 6030834),
(62, '02. Here Comes The King (Feat. Angela Hunte) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Here Comes The King', 'Reggae', 'audio/mpeg', '', 8377998),
(63, '07. Fruit Juice (Feat. Mr. Vegas) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Fruit Juice', 'Reggae', 'audio/mpeg', '', 6455387),
(64, 'Diplo & GTA - Boy Oh Boy.mp3', 'Diplo & GTA', '', 'Boy Oh Boy', 'Electronica', 'audio/mpeg', '', 4191374),
(65, 'DVBBS & Borgeous - TSUNAMI (Original Mix).mp3', 'DVBBS & Borgeous', '', 'TSUNAMI', 'Electronica', 'audio/mpeg', '', 3776776),
(66, 'Ellie Goulding - Burn.mp3', 'Ellie Goulding', '', 'Burn', 'Synthpop', 'audio/mpeg', '', 3810610),
(67, 'Martin Garrix - Animals (Official Video).mp3', 'Martin Garrix', '', 'Animals', 'Electronica', 'audio/mpeg', '', 3064990),
(68, 'New World Sound & Thomas Newson - Flute (Original Mix).mp3', 'New World Sound', '', 'Flute', 'Electronica', 'audio/mpeg', '', 4594317),
(69, 'Kalimba.mp3', 'Kalimba', '', '', '', 'audio/mpeg', '', 8414449),
(70, '01. Rebel Way (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Rebel Way', 'Reggae', 'audio/mpeg', '', 11404023),
(71, '01. Rebel Way (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Rebel Way', 'Reggae', 'audio/mpeg', '', 11404023),
(72, '02. Here Comes The King (Feat. Angela Hunte) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Here Comes The King ', 'Reggae', 'audio/mpeg', '', 8377998),
(73, '03. Lighters Up (Feat. Mavado & Popcaan) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Lighters Up', 'Reggae', 'audio/mpeg', '', 9255712),
(74, '04. So Long (Feat. Angela Hunte) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'So Long', 'Reggae', 'audio/mpeg', '', 9046735),
(75, '05. Get Away (Feat. Angela Hunte) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Get Away', 'Reggae', 'audio/mpeg', '', 8467860),
(76, '06. No Guns Allowed (Feat. Drake & Cori B) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'No Guns Allowed', 'Reggae', 'audio/mpeg', '', 8676839),
(77, '07. Fruit Juice (Feat. Mr. Vegas) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Fruit Juice', 'Reggae', 'audio/mpeg', '', 6455387),
(78, '08. Smoke The Weed (Feat. Collie Budz) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Smoke The Weed', 'Reggae', 'audio/mpeg', '', 8490849),
(79, '09. Tired Of Running (Feat. Akon) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Tired Of Running', 'Reggae', 'audio/mpeg', '', 10124023),
(80, '10. The Good Good (Feat. Iza) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'The Good Good', 'Reggae', 'audio/mpeg', '', 9543060),
(81, '11. Torn Apart (Feat. Rita Ora) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Torn Apart', 'Reggae', 'audio/mpeg', '', 8669526),
(82, '12. Ashtrays And Heartbreaks (Feat. Miley Cyrus) (www.SongsLover.pk).mp3', 'Snoop Lion', '', 'Ashtrays And Heartbreaks', 'Reggae', 'audio/mpeg', '', 10031027),
(83, 'Diplo & GTA - Boy Oh Boy.mp3', 'Diplo & GTA', '', 'Boy Oh Boy', 'Reggae', 'audio/mpeg', '', 4191374),
(84, 'DVBBS & Borgeous - TSUNAMI (Original Mix).mp3', 'DVBBS & Borgeous', '', 'TSUNAMI', 'Electronica', 'audio/mpeg', '', 3776776),
(85, 'Ellie Goulding - Burn.mp3', 'Ellie Goulding', '', 'Burn', 'Synthpop', 'audio/mpeg', '', 3810610),
(86, 'hardwell - everybody fucking jump(3).mp3', 'Hardwell', '', 'Everybody Fucking Jump', 'Electronica', 'audio/mpeg', '', 19063125),
(87, 'Kalimba.mp3', 'Kalimba', '', '', '', 'audio/mpeg', '', 8414449),
(88, 'Martin Garrix - Animals (Official Video).mp3', 'Martin Garrix', '', 'Animals', 'Electronica', 'audio/mpeg', '', 3064990),
(89, 'Martin Garrix & Jay Hardway - Wizard (Official Music Video) [OUT NOW].mp3', 'Martin Garrix', '', 'Wizard', 'Electronica', 'audio/mpeg', '', 3473783),
(90, 'New World Sound & Thomas Newson - Flute (Original Mix).mp3', 'New World Sound', '', 'Flute', 'Electronica', 'audio/mpeg', '', 4594317),
(91, 'Nicky Romero - Toulouse.mp3', 'Nicky Romero', '', 'Toulouse', 'Electronica', 'audio/mpeg', '', 4151249),
(92, 'OneRepublic - Counting Stars.mp3', 'OneRepublic', '', 'Counting Stars', 'Folk', 'audio/mpeg', '', 4529089),
(93, 'Pressure Samples - Essential Fills & Sweeps Vol.1.mp3', 'Pressure Samples', '', 'Essential Fills & Sweeps', '', 'audio/mpeg', '', 6226617),
(94, 'Ready.mp3', '', '', 'Ready', '', 'audio/mpeg', '', 8808559),
(95, 'Ready for this shet.mp3', 'Duvoh', '', 'Ready For This Shit', 'Electronica', 'audio/mpeg', '', 8808559),
(96, '#SELFIE (Official Music Video) - The Chainsmokers.mp3', '#SELFIE', '', 'The Chainsmokers', 'Electronica', 'audio/mpeg', '', 3580761),
(97, 'Showtek ft. We Are Loud & Sonny Wilson - Booyah (Official Music Video).mp3', 'Showtek', '', 'Booyah', 'Electronica', 'audio/mpeg', '', 4059763),
(98, 'Sleep Away.mp3', 'Bob Acri', '', 'Sleep Away', 'Classic', 'audio/mpeg', '', 4842585),
(99, 'Steve Aoki, Chris Lake & Tujamo - Boneless (Official Video).mp3', 'Steve Aoki', '', 'Boneless', 'Electronica', 'audio/mpeg', '', 3744611),
(102, 'Farruko ft. Sean Paul - Passion Whine.mp3', 'Farruko ft. Sean Paul', '', 'Passion Whine', 'Reggueton', 'audio/mpeg', '', 5432426),
(101, 'Vicente FernÃ?Â¡ndez - Sublime Mujer.mp3', 'Vicente FernÃ?Â¡ndez', '', ' Sublime Mujer', 'Rancheras', 'audio/mpeg', 'idtagv2', 6923070);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `usuario` int(1) NOT NULL,
  `Score` smallint(6) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `is_playing` int(11) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`user_id`, `user_name`, `usuario`, `Score`, `is_logged_in`, `is_playing`, `pass`, `correo`, `type`) VALUES
(1, 'alejo', 0, 0, 0, 0, '12345', 'lalejandro1091@hotmail.com', 0),
(2, 'diego', 0, 0, 0, 0, 'diego', 'diego@tobon.es', 0),
(4, 'lunes', 0, 32767, 1, 0, 'lunes', 'visitor@visitor.com', 1),
(5, 'user2', 0, 0, 0, 0, 'user2', 'visitor2@visitor2.com', 1),
(6, 'user3', 0, 0, 0, 0, 'user3', 'user3@user3.com', 1),
(7, 'martes', 0, 0, 0, 0, 'martes', '', 1),
(8, 'juan', 0, 0, 1, 0, 'facil123', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
