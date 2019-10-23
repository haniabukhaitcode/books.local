-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2019 at 05:31 AM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.2
DROP DATABASE IF EXISTS Test;
CREATE DATABASE Test;
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Database: `Test`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `authors`
  --
  CREATE TABLE `authors` (
    `id` int(11) NOT NULL,
    `author` varchar(256) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `authors`
  --
INSERT INTO
  `authors` (`id`, `author`)
VALUES
  (12, 'Author1'),
  (13, 'Author2'),
  (14, 'Author3'),
  (15, 'Author4'),
  (16, 'Author5'),
  (17, 'Author6'),
  (18, 'Author7'),
  (19, 'Author8'),
  (20, 'Author9');
-- --------------------------------------------------------
  --
  -- Table structure for table `books`
  --
  CREATE TABLE `books` (
    `id` int(11) NOT NULL,
    `title` varchar(256) NOT NULL,
    `author_id` int(11) DEFAULT NULL,
    `book_image` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `books`
  --
INSERT INTO
  `books` (`id`, `title`, `author_id`, `book_image`)
VALUES
  (
    52,
    'Software Developer',
    13,
    'download (1).jpeg'
  ),
  (
    53,
    'Software Developer',
    12,
    'download (7).jpeg'
  ),
  (54, 'C', 13, 'download (2).jpeg'),
  (55, 'C++', 14, 'download (7).jpeg'),
  (
    57,
    'Software Developer',
    13,
    'download (6).jpeg'
  ),
  (58, 'JavaScript', 15, 'download (3).jpeg'),
  (59, 'PHP', 18, 'download (1).jpeg'),
  (60, 'Python', 19, 'download.jpeg'),
  (61, 'Java', 18, 'download (5).jpeg'),
  (62, 'GoLang', 20, 'download (5).jpeg');
-- --------------------------------------------------------
  --
  -- Table structure for table `books_tags`
  --
  CREATE TABLE `books_tags` (
    `book_id` int(11) NOT NULL,
    `tag_id` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `books_tags`
  --
INSERT INTO
  `books_tags` (`book_id`, `tag_id`)
VALUES
  (53, 14),
  (58, 14),
  (60, 14),
  (53, 15),
  (54, 15),
  (58, 15),
  (53, 16),
  (57, 16),
  (60, 16),
  (53, 17),
  (55, 19),
  (59, 19),
  (60, 19),
  (60, 20),
  (61, 21),
  (62, 21),
  (62, 22);
-- --------------------------------------------------------
  --
  -- Stand-in structure for view `fetchAuthorBooks`
  -- (See below for the actual view)
  --
  CREATE TABLE `fetchAuthorBooks` (
    `id` int(11),
    `author_id` int(11),
    `title` varchar(256),
    `book_image` varchar(255),
    `authorName` varchar(256)
  );
-- --------------------------------------------------------
  --
  -- Stand-in structure for view `fetchTagBooks`
  -- (See below for the actual view)
  --
  CREATE TABLE `fetchTagBooks` (
    `id` int(11),
    `tag` varchar(256),
    `tag_id` int(11),
    `book_id` int(11),
    `author_id` int(11),
    `author` varchar(256),
    `title` varchar(256),
    `book_image` varchar(255),
    `tagName` text,
    `tagID` text
  );
-- --------------------------------------------------------
  --
  -- Stand-in structure for view `fetchTagIDs`
  -- (See below for the actual view)
  --
  CREATE TABLE `fetchTagIDs` (
    `id` int(11),
    `tag` varchar(256),
    `tag_id` int(11),
    `book_id` int(11),
    `author_id` int(11),
    `author` varchar(256),
    `title` varchar(256),
    `book_image` varchar(255),
    `tagName` text,
    `tagID` text
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `tags`
  --
  CREATE TABLE `tags` (
    `id` int(11) NOT NULL,
    `tag` varchar(256) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `tags`
  --
INSERT INTO
  `tags` (`id`, `tag`)
VALUES
  (14, 'Tag1'),
  (15, 'Tag2'),
  (16, 'Tag3'),
  (17, 'Tag4'),
  (18, 'Tag5'),
  (19, 'Tag6'),
  (20, 'Tag7'),
  (21, 'Tag8'),
  (22, 'Tag9');
-- --------------------------------------------------------
  --
  -- Structure for view `fetchAuthorBooks`
  --
  DROP TABLE IF EXISTS `fetchAuthorBooks`;
CREATE ALGORITHM = UNDEFINED DEFINER = `hani` @`localhost` SQL SECURITY DEFINER VIEW `fetchAuthorBooks` AS
select
  `books`.`id` AS `id`,
  `books`.`author_id` AS `author_id`,
  `books`.`title` AS `title`,
  `books`.`book_image` AS `book_image`,
  `authors`.`author` AS `authorName`
from
  (
    `books`
    join `authors` on((`authors`.`id` = `books`.`author_id`))
  );
-- --------------------------------------------------------
  --
  -- Structure for view `fetchTagBooks`
  --
  DROP TABLE IF EXISTS `fetchTagBooks`;
CREATE ALGORITHM = UNDEFINED DEFINER = `hani` @`localhost` SQL SECURITY DEFINER VIEW `fetchTagBooks` AS
select
  `books`.`id` AS `id`,
  `tags`.`tag` AS `tag`,
  `books_tags`.`tag_id` AS `tag_id`,
  `books_tags`.`book_id` AS `book_id`,
  `books`.`author_id` AS `author_id`,
  `authors`.`author` AS `author`,
  `books`.`title` AS `title`,
  `books`.`book_image` AS `book_image`,
  group_concat(
    `tags`.`tag`
    order by
      `books`.`id` ASC separator ','
  ) AS `tagName`,
  group_concat(
    `tags`.`id`
    order by
      `books`.`id` ASC separator ','
  ) AS `tagID`
from
  (
    (
      (
        `books`
        join `authors` on((`authors`.`id` = `books`.`author_id`))
      )
      join `books_tags` on((`books_tags`.`book_id` = `books`.`id`))
    )
    join `tags` on((`tags`.`id` = `books_tags`.`tag_id`))
  )
group by
  `books`.`id`
order by
  `books`.`id`;
-- --------------------------------------------------------
  --
  -- Structure for view `fetchTagIDs`
  --
  DROP TABLE IF EXISTS `fetchTagIDs`;
CREATE ALGORITHM = UNDEFINED DEFINER = `hani` @`localhost` SQL SECURITY DEFINER VIEW `fetchTagIDs` AS
select
  `books`.`id` AS `id`,
  `tags`.`tag` AS `tag`,
  `books_tags`.`tag_id` AS `tag_id`,
  `books_tags`.`book_id` AS `book_id`,
  `books`.`author_id` AS `author_id`,
  `authors`.`author` AS `author`,
  `books`.`title` AS `title`,
  `books`.`book_image` AS `book_image`,
  group_concat(
    `tags`.`tag`
    order by
      `books`.`id` ASC separator ','
  ) AS `tagName`,
  group_concat(
    `tags`.`id`
    order by
      `books`.`id` ASC separator ','
  ) AS `tagID`
from
  (
    (
      (
        `books`
        join `authors` on((`authors`.`id` = `books`.`author_id`))
      )
      join `books_tags` on((`books_tags`.`book_id` = `books`.`id`))
    )
    join `tags` on((`tags`.`id` = `books_tags`.`tag_id`))
  )
group by
  `books`.`id`
order by
  `books`.`id`;
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `authors`
  --
ALTER TABLE
  `authors`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `books`
  --
ALTER TABLE
  `books`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `author_id` (`author_id`);
--
  -- Indexes for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  PRIMARY KEY (`book_id`, `tag_id`),
ADD
  KEY `tag_id` (`tag_id`),
ADD
  KEY `book_id` (`book_id`);
--
  -- Indexes for table `tags`
  --
ALTER TABLE
  `tags`
ADD
  PRIMARY KEY (`id`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `authors`
  --
ALTER TABLE
  `authors`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 21;
--
  -- AUTO_INCREMENT for table `books`
  --
ALTER TABLE
  `books`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 63;
--
  -- AUTO_INCREMENT for table `tags`
  --
ALTER TABLE
  `tags`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 23;
--
  -- Constraints for dumped tables
  --
  --
  -- Constraints for table `books`
  --
ALTER TABLE
  `books`
ADD
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
  -- Constraints for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  CONSTRAINT `books_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
  CONSTRAINT `books_tags_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;