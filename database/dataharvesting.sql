-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2024 at 09:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataharvesting`
--

-- --------------------------------------------------------

--
-- Table structure for table `abnormalities`
--

CREATE TABLE `abnormalities` (
  `id` int NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sensor_name` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `min_limit` float NOT NULL,
  `max_limit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datasensor`
--

CREATE TABLE `datasensor` (
  `id` int NOT NULL,
  `SERIAL_No` varchar(50) DEFAULT NULL,
  `SP1` int DEFAULT NULL,
  `SP2` int DEFAULT NULL,
  `SP3` int DEFAULT NULL,
  `SP4` int DEFAULT NULL,
  `SP5` int DEFAULT NULL,
  `Time_Year` int DEFAULT NULL,
  `Time_Month` int DEFAULT NULL,
  `Time_Day` int DEFAULT NULL,
  `Time_Hour` int DEFAULT NULL,
  `Time_Min` int DEFAULT NULL,
  `Shift` char(1) DEFAULT NULL,
  `MC_No` int DEFAULT NULL,
  `Die_No` char(1) DEFAULT NULL,
  `Operator_ID` int DEFAULT NULL,
  `Corting_ID` int DEFAULT NULL,
  `Temp_atmosphere_Cycle_Start` float DEFAULT NULL,
  `Humidity_Cycle_Start` float DEFAULT NULL,
  `R_UPPER_DIE_IN_1` int DEFAULT NULL,
  `R_UPPER_DIE_RE` int DEFAULT NULL,
  `R_UPPER_DIE_FR_1` int DEFAULT NULL,
  `R_LOWER_DIE_IN` int DEFAULT NULL,
  `R_LOWER_DIE_FR_1` int DEFAULT NULL,
  `R_LOWER_DIE_RE_1` int DEFAULT NULL,
  `R_LOWER_DIE_GATE_1` int DEFAULT NULL,
  `R_YUGUCHI_1` int DEFAULT NULL,
  `L_UPPER_DIE_IN_1` int DEFAULT NULL,
  `L_UPPER_DIE_RE` int DEFAULT NULL,
  `L_UPPER_DIE_FR_1` int DEFAULT NULL,
  `L_LOWER_DIE_IN` int DEFAULT NULL,
  `L_LOWER_DIE_FR_1` int DEFAULT NULL,
  `L_LOWER_DIE_RE_1` int DEFAULT NULL,
  `L_LOWER_DIE_GATE_1` int DEFAULT NULL,
  `L_YUGUCHI_1` int DEFAULT NULL,
  `PRS_C_Temp_Cycle_Start` float DEFAULT NULL,
  `HLD_C_Temp_Cycle_Start` float DEFAULT NULL,
  `Cooling_Water_IN_Cycle_Start` float DEFAULT NULL,
  `Cooling_Air_IN_Cycle_Start` float DEFAULT NULL,
  `R_Center_pin_1_Cycle_Start` float DEFAULT NULL,
  `R_Center_pin_2_Cycle_Start` float DEFAULT NULL,
  `R_Center_pin_3_Cycle_Start` float DEFAULT NULL,
  `L_Center_pin_1_Cycle_Start` float DEFAULT NULL,
  `L_Center_pin_2_Cycle_Start` float DEFAULT NULL,
  `L_Center_pin_3_Cycle_Start` float DEFAULT NULL,
  `R_SP_Water_Flow_Detik_4` int DEFAULT NULL,
  `R_Upper_Water_MB` int DEFAULT NULL,
  `R_SP_Water_Flow_Detik_40` int DEFAULT NULL,
  `R_SP_Water_Flow_Detik_50_Stabil` int DEFAULT NULL,
  `L_Eject` int DEFAULT NULL,
  `R_Lower_WATER_CHAMBER` int DEFAULT NULL,
  `R_Lower_air_1_Flow` int DEFAULT NULL,
  `R_Lower_air_2_Flow` int DEFAULT NULL,
  `L_SP_Water_Flow_Detik_4` int DEFAULT NULL,
  `L_Upper_Water_MB` int DEFAULT NULL,
  `Press_Prg_No` int DEFAULT NULL,
  `After_Request_Shot` int DEFAULT NULL,
  `Coating_Life_Result` int DEFAULT NULL,
  `Temp_atmosphere` float DEFAULT NULL,
  `Humidity` float DEFAULT NULL,
  `R_UPPER_DIE_IN_2` int DEFAULT NULL,
  `R_UPPER_DIE_EX_RE` int DEFAULT NULL,
  `R_UPPER_DIE_FR_2` int DEFAULT NULL,
  `R_LOWER_DIE_CENTER_IN` int DEFAULT NULL,
  `R_LOWER_DIE_FR_2` int DEFAULT NULL,
  `R_LOWER_DIE_RE_2` int DEFAULT NULL,
  `R_LOWER_DIE_GATE_2` int DEFAULT NULL,
  `R_YUGUCHI_2` int DEFAULT NULL,
  `L_UPPER_DIE_IN_2` int DEFAULT NULL,
  `L_UPPER_DIE_EX_RE` int DEFAULT NULL,
  `L_UPPER_DIE_FR_2` int DEFAULT NULL,
  `L_LOWER_DIE_CENTER_IN` int DEFAULT NULL,
  `L_LOWER_DIE_FR_2` int DEFAULT NULL,
  `L_LOWER_DIE_RE_2` int DEFAULT NULL,
  `L_LOWER_DIE_GATE_2` int DEFAULT NULL,
  `L_YUGUCHI_2` int DEFAULT NULL,
  `PRS_C_Temp_HLD_Comp_Temp` float DEFAULT NULL,
  `HLD_C_Temp_HLD_Comp_Temp` float DEFAULT NULL,
  `Cooling_Water_IN_HLD_Comp_Temp` float DEFAULT NULL,
  `Cooling_Air_IN_HLD_Comp_Temp` float DEFAULT NULL,
  `L_Die_close_check_SP` int DEFAULT NULL,
  `SP6` int DEFAULT NULL,
  `R_Die_close_check_SP` int DEFAULT NULL,
  `SP7` int DEFAULT NULL,
  `R_Lower_air_3_Flow` int DEFAULT NULL,
  `L_Lower_air_3_Flow` int DEFAULT NULL,
  `Cycle_Time_1` int DEFAULT NULL,
  `Cycle_Time_2` int DEFAULT NULL,
  `Cycle_Time_3` int DEFAULT NULL,
  `Inspection_OK_or_NG` char(2) DEFAULT NULL,
  `SP8` int DEFAULT NULL,
  `L_SP_Water_Flow_Detik_40` int DEFAULT NULL,
  `L_SP_Water_Flow_Detik_50_Stabil` int DEFAULT NULL,
  `R_Eject` int DEFAULT NULL,
  `L_Lower_WATER_CHAMBER` int DEFAULT NULL,
  `L_Lower_air_1_Flow` int DEFAULT NULL,
  `L_Lower_air_2_Flow` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datasensor`
--

INSERT INTO `datasensor` (`id`, `SERIAL_No`, `SP1`, `SP2`, `SP3`, `SP4`, `SP5`, `Time_Year`, `Time_Month`, `Time_Day`, `Time_Hour`, `Time_Min`, `Shift`, `MC_No`, `Die_No`, `Operator_ID`, `Corting_ID`, `Temp_atmosphere_Cycle_Start`, `Humidity_Cycle_Start`, `R_UPPER_DIE_IN_1`, `R_UPPER_DIE_RE`, `R_UPPER_DIE_FR_1`, `R_LOWER_DIE_IN`, `R_LOWER_DIE_FR_1`, `R_LOWER_DIE_RE_1`, `R_LOWER_DIE_GATE_1`, `R_YUGUCHI_1`, `L_UPPER_DIE_IN_1`, `L_UPPER_DIE_RE`, `L_UPPER_DIE_FR_1`, `L_LOWER_DIE_IN`, `L_LOWER_DIE_FR_1`, `L_LOWER_DIE_RE_1`, `L_LOWER_DIE_GATE_1`, `L_YUGUCHI_1`, `PRS_C_Temp_Cycle_Start`, `HLD_C_Temp_Cycle_Start`, `Cooling_Water_IN_Cycle_Start`, `Cooling_Air_IN_Cycle_Start`, `R_Center_pin_1_Cycle_Start`, `R_Center_pin_2_Cycle_Start`, `R_Center_pin_3_Cycle_Start`, `L_Center_pin_1_Cycle_Start`, `L_Center_pin_2_Cycle_Start`, `L_Center_pin_3_Cycle_Start`, `R_SP_Water_Flow_Detik_4`, `R_Upper_Water_MB`, `R_SP_Water_Flow_Detik_40`, `R_SP_Water_Flow_Detik_50_Stabil`, `L_Eject`, `R_Lower_WATER_CHAMBER`, `R_Lower_air_1_Flow`, `R_Lower_air_2_Flow`, `L_SP_Water_Flow_Detik_4`, `L_Upper_Water_MB`, `Press_Prg_No`, `After_Request_Shot`, `Coating_Life_Result`, `Temp_atmosphere`, `Humidity`, `R_UPPER_DIE_IN_2`, `R_UPPER_DIE_EX_RE`, `R_UPPER_DIE_FR_2`, `R_LOWER_DIE_CENTER_IN`, `R_LOWER_DIE_FR_2`, `R_LOWER_DIE_RE_2`, `R_LOWER_DIE_GATE_2`, `R_YUGUCHI_2`, `L_UPPER_DIE_IN_2`, `L_UPPER_DIE_EX_RE`, `L_UPPER_DIE_FR_2`, `L_LOWER_DIE_CENTER_IN`, `L_LOWER_DIE_FR_2`, `L_LOWER_DIE_RE_2`, `L_LOWER_DIE_GATE_2`, `L_YUGUCHI_2`, `PRS_C_Temp_HLD_Comp_Temp`, `HLD_C_Temp_HLD_Comp_Temp`, `Cooling_Water_IN_HLD_Comp_Temp`, `Cooling_Air_IN_HLD_Comp_Temp`, `L_Die_close_check_SP`, `SP6`, `R_Die_close_check_SP`, `SP7`, `R_Lower_air_3_Flow`, `L_Lower_air_3_Flow`, `Cycle_Time_1`, `Cycle_Time_2`, `Cycle_Time_3`, `Inspection_OK_or_NG`, `SP8`, `L_SP_Water_Flow_Detik_40`, `L_SP_Water_Flow_Detik_50_Stabil`, `R_Eject`, `L_Lower_WATER_CHAMBER`, `L_Lower_air_1_Flow`, `L_Lower_air_2_Flow`) VALUES
(1, 'AB24C02A01', 0, 0, 0, 0, 0, 24, 12, 2, 8, 50, 'A', 11, 'C', 1652, 1652, 12, 18, 302, 714, 317, 486, 485, 481, 509, 340, 310, 284, 305, 488, 495, 476, 1200, 350, 699, 705, 32, 34, 518, 518, 519, 65455, 65455, 65455, 82, 49, 30, 30, 12, 0, 195, 237, 75, 48, 3, 0, 0, 37, 59, 338, 1200, 337, 519, 496, 506, 559, 341, 344, 322, 336, 519, 504, 496, 1200, 349, 700, 705, 33, 35, 60962, 0, 60962, 0, 242, 236, 63188, 32, 29, '0', 0, 30, 29, 16, 0, 203, 244),
(2, 'AB24C02A02', 0, 0, 0, 0, 0, 24, 12, 2, 10, 59, 'A', 11, 'C', 1652, 1652, 12, 18, 306, 304, 327, 491, 500, 480, 515, 309, 297, 285, 281, 488, 489, 463, 506, 317, 700, 706, 35, 36, 518, 517, 519, 65455, 65455, 65455, 74, 46, 31, 31, 12, 0, 232, 240, 73, 46, 3, 0, 0, 41, 51, 341, 333, 344, 520, 502, 501, 559, 309, 334, 319, 315, 515, 497, 483, 585, 320, 701, 705, 36, 36, 60918, 0, 60944, 0, 242, 234, 870, 41, 11, '1', 0, 30, 28, 17, 0, 216, 247);

-- --------------------------------------------------------

--
-- Table structure for table `notification_log`
--

CREATE TABLE `notification_log` (
  `id_notification` int NOT NULL,
  `id_abnormality` int NOT NULL,
  `message` text NOT NULL,
  `status` enum('pending','sent') DEFAULT 'pending',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification_log`
--

INSERT INTO `notification_log` (`id_notification`, `id_abnormality`, `message`, `status`, `created_at`) VALUES
(1, 8, 'Sensor Temp Atmosphere Cycle Start mengalami nilai abnormal: 20 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02'),
(2, 8, 'Sensor R Upper1 Temp Cycle Start mengalami nilai abnormal: 299 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02'),
(3, 8, 'Sensor R Upper2 Temp Cycle Start mengalami nilai abnormal: 296 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02'),
(4, 8, 'Sensor Humidity Cycle Start mengalami nilai abnormal: 19 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02'),
(5, 8, 'Sensor No Use Cycle Start 1 mengalami nilai abnormal: 287 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02'),
(6, 8, 'Sensor R Lower Main1 Temp Cycle Start mengalami nilai abnormal: 454 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02'),
(7, 8, 'Sensor R Lower Main2 Temp Cycle Start mengalami nilai abnormal: 498 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02'),
(8, 8, 'Sensor R Yuguchi Temp Cycle Start mengalami nilai abnormal: 345 (Min: 60, Max: 80) pada 2024-12-03 13:36:02', 'pending', '2024-12-03 13:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `npk` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `posisi` varchar(100) DEFAULT NULL,
  `alamat` text,
  `foto_profile` varchar(255) DEFAULT NULL,
  `no_telp` varchar(14) NOT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`npk`, `password`, `email`, `fname`, `lname`, `is_active`, `posisi`, `alamat`, `foto_profile`, `no_telp`, `admin`) VALUES
(710, '70a819c4b5d203153bb4336f301148baca59625621f418bf106226543cf96788', 'divasetya123@gmail.com', 'Divasetya', 'Pratama', 1, 'PE', 'Karaba', 'null', '082123261031', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abnormalities`
--
ALTER TABLE `abnormalities`
  ADD KEY `fk_abnormalities_datasensor` (`id`);

--
-- Indexes for table `datasensor`
--
ALTER TABLE `datasensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_log`
--
ALTER TABLE `notification_log`
  ADD PRIMARY KEY (`id_notification`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`npk`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datasensor`
--
ALTER TABLE `datasensor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification_log`
--
ALTER TABLE `notification_log`
  MODIFY `id_notification` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abnormalities`
--
ALTER TABLE `abnormalities`
  ADD CONSTRAINT `fk_abnormalities_datasensor` FOREIGN KEY (`id`) REFERENCES `datasensor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
