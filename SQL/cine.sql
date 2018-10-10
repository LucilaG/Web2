
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `cine` (
  `id` int(11) NOT NULL,
  `nombre` text(50) NOT NULL,
  `capacidad` int(250) NOT NULL,
  `sala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cine` (`id`, `nombre`, `capacidad`, `sala`) VALUES
(3, 'Poner completado3', 2, 1),
(4, 'Titulo de la tarea', 1, 1),
(5, 'Titulo de la tarea2', 2, 0),
(7, 'Tarea 1', 1, 1),
(12, 'Terminar Clase', 2, 1),
(13, 'MVC', 1, 1),
(14, 'MVC', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'javito', 'javito01'),
(2, 'web2', 'noentiendo');

--
-- Indexes for dumped tables
--

--  
-- Indexes for table `tarea`
--
ALTER TABLE `cine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tarea`
--
ALTER TABLE `cine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

