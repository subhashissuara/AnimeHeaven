-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2021 at 04:09 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animeheaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `mid` int(100) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(150) NOT NULL,
  `movie_genre` varchar(30) NOT NULL,
  `movie_cover_path` varchar(200) NOT NULL,
  `movie_file_path` varchar(200) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

-- IMPORTANT! Comment if it's not needed!
INSERT INTO `movies` (`mid`, `movie_name`, `movie_genre`, `movie_cover_path`, `movie_file_path`) VALUES
(1, 'dragon ball z', 'action', 'media/covers/yolo.jpg', 'media/movies/DBZ_Trailer.mp4'),
(2, 'a silent voice', 'romance', 'media/covers/silent voice.jpg', 'media/movies/A Silent Voice - Official Trailer.mp4'),
(3, 'a whisker away', 'romance', 'media/covers/a whisker away.jpg', 'media/movies/A Whisker Away _ Official Trailer _ Netflix.mp4'),
(4, 'demon slayer - kimetsu no yaiba', 'action', 'media/covers/Demon Slayer - Kimetsu no Yaiba.jpg', 'media/movies/Demon Slayer - Kimetsu no Yaiba.mp4'),
(5, 'akira (1988) legendary', 'action', 'media/covers/akira.jpg', 'media/movies/Akira (1988) Legendary.mp4'),
(6, 'my hero academia heroes rising', 'action', 'media/covers/my hero academia.jpg', 'media/movies/My Hero Academia Heroes Rising.mp4'),
(7, 'the boy and the beast', 'action', 'media/covers/the boy and the beast.jpg', 'media/movies/The Boy and The Beast.mp4'),
(8, 'grave of the fireflies', 'drama', 'media/covers/grave of the fireflies.jpg', 'media/movies/Grave of the Fireflies.mp4'),
(9, 'princess mononoke', 'drama', 'media/covers/princess monoke.jpg', 'media/movies/Princess Mononoke - Official Trailer.mp4'),
(10, 'the tale of the princess kaguya', 'drama', 'media/covers/the tale of princess kaguya.jpg', 'media/movies/The Tale Of The Princess Kaguya - Official Trailer.mp4'),
(11, 'violet evergarden', 'drama', 'media/covers/violet evergarden the movie.jpg', 'media/movies/Violet Evergarden THE MOVIE (2020) - Official Trailer.mp4'),
(12, 'when marnie was there', 'drama', 'media/covers/when marnie was there.png', 'media/movies/When Marnie Was There - Official Trailer.mp4'),
(13, 'arriety', 'family', 'media/covers/arrietty.jfif', 'media/movies/arriety.mp4'),
(14, 'howls moving castle', 'family', 'media/covers/howls moving castel.jpg', 'media/movies/Howl_s Moving Castle - Official Trailer.mp4'),
(15, 'kikis delivery service', 'family', 'media/covers/kiki_s delivery service.jfif', 'media/movies/Kiki_s Delivery Service - Official Trailer.mp4'),
(16, 'my neighbor totoro', 'family', 'media/covers/my neighbor totoro.jpg', 'media/movies/My Neighbor Totoro - Official Trailer.mp4'),
(17, 'whisper of the heart', 'family', 'media/covers/whisper of the heart.jfif', 'media/movies/Whisper of the Heart - Official Trailer.mp4'),
(18, 'detective conan the darkest nightmare', 'mystery', 'media/covers/detective conan tdn.jpg', 'media/movies/DETECTIVE CONAN_ THE DARKEST NIGHTMARE - Official Trailer (In cinemas 7 July).mp4'),
(19, 'paprika', 'mystery', 'media/covers/paprika.jpg', 'media/movies/Paprika Trailer (HD 1080p).mp4'),
(20, 'proffesor', 'mystery', 'media/covers/professor.png', 'media/movies/proffesor.mp4'),
(21, 'spirited away', 'mystery', 'media/covers/spirited away.jpg', 'media/movies/Spirited Away - Official Trailer.mp4'),
(22, 'steins gate the movie load region of deja vu', 'mystery', 'media/covers/steins gate.jpg', 'media/movies/Steins_Gate the Movie_ Load Region of Deja Vu - Official Trailer.mp4'),
(23, 'i want to eat your pancreas', 'romance', 'media/covers/i want to eat your pancreas.jpg', 'media/movies/I Want To Eat Your Pancreas - Official Theatrical Trailer.mp4'),
(24, 'the garden of words', 'romance', 'media/covers/a garden of words.jpg', 'media/movies/The Garden of Words - Official Trailer.mp4'),
(25, 'your name', 'romance', 'media/covers/your name.jpg', 'media/movies/Your Name (Japanese) - Coming Soon Trailer.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mid` int(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `mid`) VALUES
(1, 'admin', 'admin@animeheaven.com', 'admin@123', NULL),
(2, 'user', 'user@animeheaven.com', 'user@123', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
