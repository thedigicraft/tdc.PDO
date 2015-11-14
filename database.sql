--
-- Database: `pdo`
-- TheDigitalCraft.com

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `first` varchar(150) NOT NULL,
  `last` varchar(150) NOT NULL,
  `website` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `website`) VALUES
(1, 'Alan', 'Quandt', 'thedigitalcraft.com');