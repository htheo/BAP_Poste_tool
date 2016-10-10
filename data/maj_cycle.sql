-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 10, 2016 at 07:36 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BAP_poste`
--

-- --------------------------------------------------------

--
-- Table structure for table `cycles_bap`
--

CREATE TABLE `cycles_bap` (
  `id` int(50) NOT NULL,
  `id_projet` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `resume` varchar(500) NOT NULL,
  `statut` varchar(20) NOT NULL DEFAULT 'en_cours' COMMENT 'en_cours -> fini',
  `date_debut` varchar(40) NOT NULL,
  `date_fin` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycles_bap`
--

INSERT INTO `cycles_bap` (`id`, `id_projet`, `name`, `resume`, `statut`, `date_debut`, `date_fin`) VALUES
(2, 12, 'Maisie Peterson', 'Suscipit qui do voluptatem, dolor explicabo. Laborum. Magnam labore nisi eius pariatur? Consequatur, et saepe in ut omnis explicabo.', 'fini', '2002-03-20', '2002-03-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cycles_bap`
--
ALTER TABLE `cycles_bap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cycles_bap`
--
ALTER TABLE `cycles_bap`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;



-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 10, 2016 at 07:37 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BAP_poste`
--

-- --------------------------------------------------------

--
-- Table structure for table `link_cycle_competence`
--

CREATE TABLE `link_cycle_competence` (
  `id` int(50) NOT NULL,
  `id_competence` int(50) NOT NULL,
  `id_cycle` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_cycle_competence`
--

INSERT INTO `link_cycle_competence` (`id`, `id_competence`, `id_cycle`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `link_cycle_competence`
--
ALTER TABLE `link_cycle_competence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `link_cycle_competence`
--
ALTER TABLE `link_cycle_competence`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;


-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 10, 2016 at 07:37 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BAP_poste`
--

-- --------------------------------------------------------

--
-- Table structure for table `competences`
--

CREATE TABLE `competences` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competences`
--

INSERT INTO `competences` (`id`, `name`) VALUES
(1, 'Marketing'),
(2, 'Développement'),
(3, 'Graphisme');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 10, 2016 at 07:37 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BAP_poste`
--

-- --------------------------------------------------------

--
-- Table structure for table `taches`
--

CREATE TABLE `taches` (
  `id` int(50) NOT NULL,
  `id_cycle` int(50) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taches`
--

INSERT INTO `taches` (`id`, `id_cycle`, `name`) VALUES
(1, 2, 'Ullamco vel eaque tempora ex repellendus Obcaecati sint placeat dolores molestiae eum ut possimus ab maxime laborum voluptatum sunt cupiditate'),
(2, 2, 'Architecto deserunt et est in excepturi voluptatibus labore minima nisi enim eiusmod quisquam molestias facere placeat voluptatibus dolorem vel'),
(3, 2, 'Esse harum irure omnis enim atque dolor et voluptas nihil et duis id est dolores odit consequat'),
(4, 2, 'Debitis eum tenetur non voluptatem dolor dolore aspernatur eveniet nostrud eiusmod reprehenderit quod quo omnis eaque'),
(5, 2, 'Do quas proident autem quis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;