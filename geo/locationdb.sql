SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `places` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `places` (`id`, `name`, `address`, `type`, `lat`, `lng`) VALUES
(1, 'BVM', 'Mota Bazar, Anand', 'Autonomous', 22.552570, 72.923820),
(2, 'Sansad Bhavan', 'Sansad Marg, Janpath, Connaught Place, New Delhi, Delhi', 'Private', 28.617214, 77.208130),
(3, 'Taj', 'Taj lands End, Mumbai', 'Public', 19.043539, 72.819458),
(4, 'GCET College', 'GCET College, Near Bakrol Gate, Anand.', 'Public', 22.560068, 72.919731),
(5, 'Time NGO', 'The City Mall, Anand V.V.Nagar Road.', 'Public', 22.550085, 72.932442),
(6, 'BOB', 'Ground Floor, Lalita Smruti, Nanabazar, Opp Nalini Arts College,, Vallabh Vidhyanagar\r\nKetivadi, Vallabh Vidyanagar\r\nAnand, Gujarat', 'Private', 22.554174, 72.928696);

ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `places`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
