-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2024 at 06:18 AM
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

--
-- Dumping data for table `abnormalities`
--

INSERT INTO `abnormalities` (`id`, `timestamp`, `sensor_name`, `value`, `min_limit`, `max_limit`) VALUES
(1, '2024-12-03 08:22:37', 'Anjay Mabar', 90, 50, 80),
(1, '2024-12-03 08:22:41', 'Anjay Mabar', 90, 50, 80),
(5, '2024-12-03 09:01:34', 'Temp Atmosphere Cycle Start', 90, 60, 80),
(6, '2024-12-03 09:02:32', 'Temp Atmosphere Cycle Start', 90, 60, 80),
(7, '2024-12-03 09:03:09', 'Temp Atmosphere Cycle Start', 20, 60, 80);

--
-- Triggers `abnormalities`
--
DELIMITER $$
CREATE TRIGGER `trg_after_insert_abnormalities` AFTER INSERT ON `abnormalities` FOR EACH ROW BEGIN
    -- Masukkan data ke tabel notifikasi_log
    INSERT INTO notification_log (
        id_abnormality, 
        message, 
        status, 
        created_at
    ) VALUES (
        NEW.id, 
        CONCAT('Sensor ', NEW.sensor_name, ' mengalami nilai abnormal: ', NEW.value, ' (Min: ', NEW.min_limit, ', Max: ', NEW.max_limit, ') pada ', NEW.timestamp), 
        'pending', 
        NOW()
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `datasensor`
--

CREATE TABLE `datasensor` (
  `id` int NOT NULL,
  `SERIAL_No` varchar(100) NOT NULL,
  `Time_Year` int DEFAULT NULL,
  `Time_Month` int DEFAULT NULL,
  `Time_Day` int DEFAULT NULL,
  `Time_Hour` int DEFAULT NULL,
  `Time_Min` int DEFAULT NULL,
  `Shift` char(1) DEFAULT NULL,
  `MC_No` int DEFAULT NULL,
  `Die_No` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Operator_ID` int DEFAULT NULL,
  `Corting_ID` int DEFAULT NULL,
  `Temp_Atmosphere_Cycle_Start` int DEFAULT NULL,
  `Humidity_Cycle_Start` int DEFAULT NULL,
  `R_Upper1_Temp_Cycle_Start` int DEFAULT NULL,
  `R_Upper2_Temp_Cycle_Start` int DEFAULT NULL,
  `No_Use_Cycle_Start_1` int DEFAULT NULL,
  `R_Lower_Gate1_Temp_Cycle_Start` int DEFAULT NULL,
  `No_Use_Cycle_Start_2` int DEFAULT NULL,
  `R_Lower_Main1_Temp_Cycle_Start` int DEFAULT NULL,
  `R_Lower_Main2_Temp_Cycle_Start` int DEFAULT NULL,
  `R_Yuguchi_Temp_Cycle_Start` int DEFAULT NULL,
  `L_UppeL_Main_Temp_Cycle_Start` int DEFAULT NULL,
  `L_UppeL_SP_Temp_Cycle_Start` int DEFAULT NULL,
  `No_Use_Cycle_Start_3` int DEFAULT NULL,
  `L_LoweL_Gate1_Temp_Cycle_Start` int DEFAULT NULL,
  `No_Use_Cycle_Start_4` int DEFAULT NULL,
  `L_LoweL_Main1_Temp_Cycle_Start` int DEFAULT NULL,
  `L_LoweL_Main2_Temp_Cycle_Start` int DEFAULT NULL,
  `L_Yuguchi_Temp_Cycle_Start` int DEFAULT NULL,
  `PRS_C_Temp_Cycle_Start` int DEFAULT NULL,
  `HLD_C_Temp_Cycle_Start` int DEFAULT NULL,
  `Cooling_Water_IN_Cycle_Start` int DEFAULT NULL,
  `Cooling_Air_IN_Cycle_Start` int DEFAULT NULL,
  `R_Center_Pin1_Cycle_Start` int DEFAULT NULL,
  `R_Center_Pin2_Cycle_Start` int DEFAULT NULL,
  `R_Center_Pin3_Cycle_Start` int DEFAULT NULL,
  `L_Center_Pin1_Cycle_Start` int DEFAULT NULL,
  `L_Center_Pin2_Cycle_Start` int DEFAULT NULL,
  `L_Center_Pin3_Cycle_Start` int DEFAULT NULL,
  `R_Upper_SP_Water_Flow` int DEFAULT NULL,
  `R_Upper_Water_Flow` int DEFAULT NULL,
  `L_Upper_SP_Water_Flow` int DEFAULT NULL,
  `L_Upper_Water_Flow` int DEFAULT NULL,
  `R_Lower_Air1_Flow` int DEFAULT NULL,
  `L_Lower_Air1_Flow` int DEFAULT NULL,
  `R_Lower_Air2_Flow` int DEFAULT NULL,
  `L_Lower_Air2_Flow` int DEFAULT NULL,
  `SP6` int DEFAULT NULL,
  `SP7` int DEFAULT NULL,
  `Press_Prg_No` int DEFAULT NULL,
  `After_Request_Shot` int DEFAULT NULL,
  `Coating_Life_Result` int DEFAULT NULL,
  `Temp_Atmosphere` int DEFAULT NULL,
  `Humidity` int DEFAULT NULL,
  `R_Upper_Main_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `R_Upper_SP_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `No_Use_HLD_Comp_Temp_1` int DEFAULT NULL,
  `R_Lower_Gate1_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `No_Use_HLD_Comp_Temp_2` int DEFAULT NULL,
  `R_Lower_Main1_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `R_Lower_Main2_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `R_Yuguchi_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `L_UppeL_Main_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `L_UppeL_SP_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `No_Use_HLD_Comp_Temp_3` int DEFAULT NULL,
  `L_LoweL_Gate1_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `No_Use_HLD_Comp_Temp_4` int DEFAULT NULL,
  `L_LoweL_Main1_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `L_LoweL_Main2_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `L_Yuguchi_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `PRS_C_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `HLD_C_Temp_HLD_Comp_Temp` int DEFAULT NULL,
  `Cooling_Water_IN_HLD_Comp_Temp` int DEFAULT NULL,
  `Cooling_Air_IN_HLD_Comp_Temp` int DEFAULT NULL,
  `SP8` int DEFAULT NULL,
  `SP10` int DEFAULT NULL,
  `SP12` int DEFAULT NULL,
  `SP13` int DEFAULT NULL,
  `Cycle_Time1` int DEFAULT NULL,
  `Cycle_Time2` int DEFAULT NULL,
  `Cycle_Time3` int DEFAULT NULL,
  `Inspection_OK_or_NG` int DEFAULT NULL,
  `SP15` int DEFAULT NULL,
  `SP16` int DEFAULT NULL,
  `SP17` int DEFAULT NULL,
  `SP19` int DEFAULT NULL,
  `SP20` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datasensor`
--

INSERT INTO `datasensor` (`id`, `SERIAL_No`, `Time_Year`, `Time_Month`, `Time_Day`, `Time_Hour`, `Time_Min`, `Shift`, `MC_No`, `Die_No`, `Operator_ID`, `Corting_ID`, `Temp_Atmosphere_Cycle_Start`, `Humidity_Cycle_Start`, `R_Upper1_Temp_Cycle_Start`, `R_Upper2_Temp_Cycle_Start`, `No_Use_Cycle_Start_1`, `R_Lower_Gate1_Temp_Cycle_Start`, `No_Use_Cycle_Start_2`, `R_Lower_Main1_Temp_Cycle_Start`, `R_Lower_Main2_Temp_Cycle_Start`, `R_Yuguchi_Temp_Cycle_Start`, `L_UppeL_Main_Temp_Cycle_Start`, `L_UppeL_SP_Temp_Cycle_Start`, `No_Use_Cycle_Start_3`, `L_LoweL_Gate1_Temp_Cycle_Start`, `No_Use_Cycle_Start_4`, `L_LoweL_Main1_Temp_Cycle_Start`, `L_LoweL_Main2_Temp_Cycle_Start`, `L_Yuguchi_Temp_Cycle_Start`, `PRS_C_Temp_Cycle_Start`, `HLD_C_Temp_Cycle_Start`, `Cooling_Water_IN_Cycle_Start`, `Cooling_Air_IN_Cycle_Start`, `R_Center_Pin1_Cycle_Start`, `R_Center_Pin2_Cycle_Start`, `R_Center_Pin3_Cycle_Start`, `L_Center_Pin1_Cycle_Start`, `L_Center_Pin2_Cycle_Start`, `L_Center_Pin3_Cycle_Start`, `R_Upper_SP_Water_Flow`, `R_Upper_Water_Flow`, `L_Upper_SP_Water_Flow`, `L_Upper_Water_Flow`, `R_Lower_Air1_Flow`, `L_Lower_Air1_Flow`, `R_Lower_Air2_Flow`, `L_Lower_Air2_Flow`, `SP6`, `SP7`, `Press_Prg_No`, `After_Request_Shot`, `Coating_Life_Result`, `Temp_Atmosphere`, `Humidity`, `R_Upper_Main_Temp_HLD_Comp_Temp`, `R_Upper_SP_Temp_HLD_Comp_Temp`, `No_Use_HLD_Comp_Temp_1`, `R_Lower_Gate1_Temp_HLD_Comp_Temp`, `No_Use_HLD_Comp_Temp_2`, `R_Lower_Main1_Temp_HLD_Comp_Temp`, `R_Lower_Main2_Temp_HLD_Comp_Temp`, `R_Yuguchi_Temp_HLD_Comp_Temp`, `L_UppeL_Main_Temp_HLD_Comp_Temp`, `L_UppeL_SP_Temp_HLD_Comp_Temp`, `No_Use_HLD_Comp_Temp_3`, `L_LoweL_Gate1_Temp_HLD_Comp_Temp`, `No_Use_HLD_Comp_Temp_4`, `L_LoweL_Main1_Temp_HLD_Comp_Temp`, `L_LoweL_Main2_Temp_HLD_Comp_Temp`, `L_Yuguchi_Temp_HLD_Comp_Temp`, `PRS_C_Temp_HLD_Comp_Temp`, `HLD_C_Temp_HLD_Comp_Temp`, `Cooling_Water_IN_HLD_Comp_Temp`, `Cooling_Air_IN_HLD_Comp_Temp`, `SP8`, `SP10`, `SP12`, `SP13`, `Cycle_Time1`, `Cycle_Time2`, `Cycle_Time3`, `Inspection_OK_or_NG`, `SP15`, `SP16`, `SP17`, `SP19`, `SP20`) VALUES
(1, 'AB24A23B24', 24, 10, 23, 0, 36, 'B', 11, 'C', 2420, 0, 13, 19, 299, 296, 287, 496, 470, 454, 498, 345, 294, 276, 298, 496, 483, 434, 517, 345, 698, 705, 34, 39, 518, 518, 519, 65455, 65455, 65455, 75, 44, 24, 24, 13, 0, 258, 249, 70, 49, 3, 3, 0, 34, 68, 322, 318, 312, 517, 490, 482, 542, 345, 321, 302, 328, 519, 504, 463, 570, 346, 702, 705, 34, 38, 60874, 60879, 247, 244, 314, 58, 29, 1, 25, 25, 18, 272, 241),
(2, 'AB24A23B25', 24, 10, 23, 0, 41, 'B', 11, 'C', 2420, 0, 13, 19, 300, 296, 287, 497, 470, 455, 501, 344, 295, 276, 299, 497, 484, 434, 520, 346, 698, 705, 34, 38, 518, 518, 519, 65455, 65455, 65455, 74, 43, 24, 23, 12, 0, 256, 246, 71, 49, 3, 4, 0, 34, 68, 322, 317, 312, 516, 492, 481, 541, 346, 321, 301, 328, 520, 505, 463, 571, 347, 702, 705, 34, 39, 60874, 60879, 251, 248, 308, 51, 29, 1, 26, 26, 17, 274, 243),
(3, 'AB24A23B26', 24, 10, 23, 0, 46, 'B', 11, 'C', 2420, 0, 13, 19, 300, 295, 287, 497, 472, 454, 500, 345, 295, 276, 299, 498, 484, 434, 520, 347, 698, 705, 34, 39, 518, 518, 519, 65455, 65455, 65455, 74, 44, 24, 24, 13, 0, 258, 247, 75, 49, 3, 5, 0, 34, 68, 322, 317, 312, 517, 493, 481, 540, 346, 321, 301, 327, 520, 505, 464, 573, 347, 702, 705, 34, 39, 60874, 60877, 246, 249, 308, 50, 29, 1, 26, 25, 18, 274, 241),
(4, 'AB24A23B27', 24, 10, 23, 0, 51, 'B', 11, 'C', 2420, 0, 13, 19, 299, 296, 287, 496, 470, 454, 498, 345, 294, 276, 298, 496, 483, 434, 517, 345, 698, 705, 34, 39, 518, 518, 519, 65455, 65455, 65455, 75, 44, 24, 24, 13, 0, 258, 249, 70, 49, 3, 3, 0, 34, 68, 322, 318, 312, 517, 490, 482, 542, 345, 321, 302, 328, 519, 504, 463, 570, 346, 702, 705, 34, 38, 60874, 60879, 247, 244, 314, 58, 29, 1, 25, 25, 18, 272, 241),
(5, 'AB24A23B28', 24, 10, 23, 0, 51, 'B', 11, 'C', 2420, 0, 90, 19, 299, 296, 287, 496, 470, 454, 498, 345, 294, 276, 298, 496, 483, 434, 517, 345, 698, 705, 34, 39, 518, 518, 519, 65455, 65455, 65455, 75, 44, 24, 24, 13, 0, 258, 249, 70, 49, 3, 3, 0, 34, 68, 322, 318, 312, 517, 490, 482, 542, 345, 321, 302, 328, 519, 504, 463, 570, 346, 702, 705, 34, 38, 60874, 60879, 247, 244, 314, 58, 29, 1, 25, 25, 18, 272, 241),
(6, 'AB24A23B28', 24, 10, 23, 0, 51, 'B', 11, 'C', 2420, 0, 90, 19, 299, 296, 287, 496, 470, 454, 498, 345, 294, 276, 298, 496, 483, 434, 517, 345, 698, 705, 34, 39, 518, 518, 519, 65455, 65455, 65455, 75, 44, 24, 24, 13, 0, 258, 249, 70, 49, 3, 3, 0, 34, 68, 322, 318, 312, 517, 490, 482, 542, 345, 321, 302, 328, 519, 504, 463, 570, 346, 702, 705, 34, 38, 60874, 60879, 247, 244, 314, 58, 29, 1, 25, 25, 18, 272, 241),
(7, 'AB24A23B29', 24, 10, 23, 0, 51, 'B', 11, 'C', 2420, 0, 20, 19, 299, 296, 287, 496, 470, 454, 498, 345, 294, 276, 298, 496, 483, 434, 517, 345, 698, 705, 34, 39, 518, 518, 519, 65455, 65455, 65455, 75, 44, 24, 24, 13, 0, 258, 249, 70, 49, 3, 3, 0, 34, 68, 322, 318, 312, 517, 490, 482, 542, 345, 321, 302, 328, 519, 504, 463, 570, 346, 702, 705, 34, 38, 60874, 60879, 247, 244, 314, 58, 29, 1, 25, 25, 18, 272, 241);
(8, 'AB24A23B30', 24, 10, 23, 0, 51, 'B', 11, 'C', 2420, 0, 20, 19, 299, 296, 287, 496, 470, 454, 498, 345, 294, 276, 298, 496, 483, 434, 517, 345, 698, 705, 34, 39, 518, 518, 519, 65455, 65455, 65455, 75, 44, 24, 24, 13, 0, 258, 249, 70, 49, 3, 3, 0, 34, 68, 322, 318, 312, 517, 490, 482, 542, 345, 321, 302, 328, 519, 504, 463, 570, 346, 702, 705, 34, 38, 60874, 60879, 247, 244, 314, 58, 29, 1, 25, 25, 18, 272, 241);

--
-- Triggers `datasensor`
--
DELIMITER $$
CREATE TRIGGER `abnormality_	R_Upper1_Temp_Cycle_Start` AFTER INSERT ON `datasensor` FOR EACH ROW BEGIN
    -- Periksa apakah nilai berada di luar batas
    IF NEW.R_Upper1_Temp_Cycle_Start > 80 OR NEW.	R_Upper1_Temp_Cycle_Start < 60 THEN
        -- Insert data ke tabel abnormalities
        INSERT INTO abnormalities (
            id, 
            sensor_name, 
            value, 
            max_limit, 
            min_limit, 
            timestamp
        ) VALUES (
            NEW.id, 
            'R Upper1 Temp Cycle Start', 
            NEW.R_Upper1_Temp_Cycle_Start, 
            80, 
            60, 
            NOW()
        );
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `abnormality_Humidity_Cycle_Start` AFTER INSERT ON `datasensor` FOR EACH ROW BEGIN
    -- Periksa apakah nilai berada di luar batas
    IF NEW.Humidity_Cycle_Start > 80 OR NEW.Humidity_Cycle_Start < 60 THEN
        -- Insert data ke tabel abnormalities
        INSERT INTO abnormalities (
            id, 
            sensor_name, 
            value, 
            max_limit, 
            min_limit, 
            timestamp
        ) VALUES (
            NEW.id, 
            'Humidity Cycle Start', 
            NEW.Humidity_Cycle_Start, 
            80, 
            60, 
            NOW()
        );
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `abnormality_No_Use_Cycle_Start_1` AFTER INSERT ON `datasensor` FOR EACH ROW BEGIN
    -- Periksa apakah nilai berada di luar batas
    IF NEW.No_Use_Cycle_Start_1 > 80 OR NEW.No_Use_Cycle_Start_1 < 60 THEN
        -- Insert data ke tabel abnormalities
        INSERT INTO abnormalities (
            id, 
            sensor_name, 
            value, 
            max_limit, 
            min_limit, 
            timestamp
        ) VALUES (
            NEW.id, 
            'No Use Cycle Start 1', 
            NEW.No_Use_Cycle_Start_1, 
            80, 
            60, 
            NOW()
        );
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `abnormality_R_Lower_Main1_Temp_Cycle_Start` AFTER INSERT ON `datasensor` FOR EACH ROW BEGIN
    -- Periksa apakah nilai berada di luar batas
    IF NEW.R_Lower_Main1_Temp_Cycle_Start > 80 OR NEW.R_Lower_Main1_Temp_Cycle_Start < 60 THEN
        -- Insert data ke tabel abnormalities
        INSERT INTO abnormalities (
            id, 
            sensor_name, 
            value, 
            max_limit, 
            min_limit, 
            timestamp
        ) VALUES (
            NEW.id, 
            'R Lower Main1 Temp Cycle Start', 
            NEW.R_Lower_Main1_Temp_Cycle_Start, 
            80, 
            60, 
            NOW()
        );
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `abnormality_R_Upper2_Temp_Cycle_Start` AFTER INSERT ON `datasensor` FOR EACH ROW BEGIN
    -- Periksa apakah nilai berada di luar batas
    IF NEW.R_Upper2_Temp_Cycle_Start > 80 OR NEW.R_Upper2_Temp_Cycle_Start < 60 THEN
        -- Insert data ke tabel abnormalities
        INSERT INTO abnormalities (
            id, 
            sensor_name, 
            value, 
            max_limit, 
            min_limit, 
            timestamp
        ) VALUES (
            NEW.id, 
            'R Upper2 Temp Cycle Start', 
            NEW.R_Upper2_Temp_Cycle_Start, 
            80, 
            60, 
            NOW()
        );
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `abnormality_Temp_Atmosphere_Cycle_Start` AFTER INSERT ON `datasensor` FOR EACH ROW BEGIN
    -- Periksa apakah nilai Temp_Atmosphere_Cycle_Start di luar batas
    IF NEW.Temp_Atmosphere_Cycle_Start > 80 OR NEW.Temp_Atmosphere_Cycle_Start < 60 THEN
        -- Insert data ke tabel abnormalities
        INSERT INTO abnormalities (
            id, 
            sensor_name, 
            value, 
            max_limit, 
            min_limit, 
            timestamp
        ) VALUES (
            NEW.id, 
            'Temp Atmosphere Cycle Start', 
            NEW.Temp_Atmosphere_Cycle_Start, 
            80, 
            60, 
            NOW()
        );
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `datasensor_salah`
--

CREATE TABLE `datasensor_salah` (
  `SERIAL_No` varchar(100) DEFAULT NULL,
  `SP1` int DEFAULT NULL,
  `SP2` int DEFAULT NULL,
  `SP3` int DEFAULT NULL,
  `SP4` int DEFAULT NULL,
  `SP5` int DEFAULT NULL,
  `Time(Year)` int DEFAULT NULL,
  `Time(Month)` int DEFAULT NULL,
  `Time(Day)` int DEFAULT NULL,
  `Time(Hour)` int DEFAULT NULL,
  `Time(Min)` int DEFAULT NULL,
  `Shift` char(1) DEFAULT NULL,
  `MC_No` int DEFAULT NULL,
  `Die_No` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Operator_ID` int DEFAULT NULL,
  `Corting_ID` int DEFAULT NULL,
  `Temp_Atmosp_Cy_On` int DEFAULT NULL,
  `Humidity_Cy_On` int DEFAULT NULL,
  `R_UP_Main_Temp_Cy_On` int DEFAULT NULL,
  `R_UP_SP_Temp_Cy_On` int DEFAULT NULL,
  `No_Use_Cy_On1` int DEFAULT NULL,
  `R_Low_Gat1_Temp_Cy_On` int DEFAULT NULL,
  `No_Use_Cy_On2` int DEFAULT NULL,
  `R_Low_Main1_Temp_Cy_On` int DEFAULT NULL,
  `R_Low_Main2_Temp_Cy_On` int DEFAULT NULL,
  `R_YUGUCHI_Temp_Cy_On` int DEFAULT NULL,
  `L_UP_Main_Temp_Cy_On` int DEFAULT NULL,
  `L_UP_SP_Temp_Cy_On` int DEFAULT NULL,
  `No_Use_Cy_On3` int DEFAULT NULL,
  `L_LOW_Gate1_Temp_Cy_On` int DEFAULT NULL,
  `No_Use_Cy_On4` int DEFAULT NULL,
  `L_LOW_Main1_Temp_Cy_On` int DEFAULT NULL,
  `L_LOW_Main2_Temp_Cy_On` int DEFAULT NULL,
  `L_YUGUCHI_Temp_Cy_On` int DEFAULT NULL,
  `PRS_C_Temp_Cy_On` int DEFAULT NULL,
  `HLD_C_Temp_Cy_On` int DEFAULT NULL,
  `Cool_Wtr_IN_Cy_On` int DEFAULT NULL,
  `Cool_Air_IN_Cy_On` int DEFAULT NULL,
  `L_CP_2_Cy_On` int DEFAULT NULL,
  `L_CP_3_Cy_On` int DEFAULT NULL,
  `R_UP_SP_Wtr_Flow` int DEFAULT NULL,
  `R_UP_Wtr_Flow` int DEFAULT NULL,
  `L_UP_SP_Wtr_Flow` int DEFAULT NULL,
  `L_UP_Wtr_Flow` int DEFAULT NULL,
  `R_Low_air_1_Flow` int DEFAULT NULL,
  `L_Low_air_1_Flow` int DEFAULT NULL,
  `R_Low_air_2_Flow` int DEFAULT NULL,
  `L_Low_air_2_Flow` int DEFAULT NULL,
  `SP6` int DEFAULT NULL,
  `SP7` int DEFAULT NULL,
  `Press_Prg_No` int DEFAULT NULL,
  `After_Request_Shot` int DEFAULT NULL,
  `Coating_Life_Result` int DEFAULT NULL,
  `Temp_Atmosp_Process` int DEFAULT NULL,
  `Humidity_Process` int DEFAULT NULL,
  `R_UP_Main_Temp_Process` int DEFAULT NULL,
  `R_UP_SP_Temp_Process` int DEFAULT NULL,
  `No_Use_Process1` int DEFAULT NULL,
  `R_Low_Gat1_Temp_Process` int DEFAULT NULL,
  `No_Use_Process2` int DEFAULT NULL,
  `R_Low_Main1_Temp_Process` int DEFAULT NULL,
  `R_Low_Main2_Temp_Process` int DEFAULT NULL,
  `R_YUGUCHI_Temp_Process` int DEFAULT NULL,
  `L_UP_Main_Temp_Process` int DEFAULT NULL,
  `L_UP_SP_Temp_Process` int DEFAULT NULL,
  `No_Use_Process3` int DEFAULT NULL,
  `L_LOW_Gate1_Temp_Process` int DEFAULT NULL,
  `No_Use_Process4` int DEFAULT NULL,
  `L_LOW_Main1_Temp_Process` int DEFAULT NULL,
  `L_LOW_Main2_Temp_Process` int DEFAULT NULL,
  `L_YUGUCHI_Temp_Process` int DEFAULT NULL,
  `PRS_C_Temp_Process` int DEFAULT NULL,
  `HLD_C_Temp_Process` int DEFAULT NULL,
  `Cool_Wtr_IN_Process` int DEFAULT NULL,
  `Cool_Air_IN_Process` int DEFAULT NULL,
  `SP8` int DEFAULT NULL,
  `SP9` int DEFAULT NULL,
  `SP10` int DEFAULT NULL,
  `SP11` int DEFAULT NULL,
  `SP12` int DEFAULT NULL,
  `SP13` int DEFAULT NULL,
  `Cycle_Time1` int DEFAULT NULL,
  `Cycle_Time2` int DEFAULT NULL,
  `Cycle_Time3` int DEFAULT NULL,
  `Inspection_OK_or_NG` int DEFAULT NULL,
  `SP14` int DEFAULT NULL,
  `SP15` int DEFAULT NULL,
  `SP16` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification_log`
--
ALTER TABLE `notification_log`
  MODIFY `id_notification` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abnormalities`
--
ALTER TABLE `abnormalities`
  ADD CONSTRAINT `fk_abnormalities_datasensor` FOREIGN KEY (`id`) REFERENCES `datasensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
