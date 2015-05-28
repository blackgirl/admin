

--
-- Database: `muni`
--
CREATE DATABASE IF NOT EXISTS `unicreo` DEFAULT CHARACTER SET latin1 COLLATE utf8_unicode;
USE `unicreo`;

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE IF NOT EXISTS `sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(75) NOT NULL,
  `comments` text NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `appt` datetime NOT NULL,
  `combo_appt` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `options` varchar(150) NOT NULL,
  `wy_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `username`, `comments`, `country_name`, `dob`, `appt`, `combo_appt`, `email`, `options`, `wy_text`) VALUES
(1, 'muni', 'HI\nmuni', 'USA', '2014-08-29', '2013-08-22 10:50:00', '2014-09-22', 'muni@smmarttutorials.com', 'Array', '&lt;h2&gt;awesome&lt;/h2&gt; comment!&lt;br&gt;&lt;br&gt;Thank you,&lt;br&gt;&lt;br&gt;&lt;br&gt;Muni.');


