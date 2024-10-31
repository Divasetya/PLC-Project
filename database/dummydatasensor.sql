-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 12:03 AM
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
-- Database: `dummydatasensor`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummydata`
--

CREATE TABLE `dummydata` (
  `SERIAL_No` varchar(100) DEFAULT NULL,
  `SP1` int DEFAULT NULL,
  `SP2` int DEFAULT NULL,
  `SP3` int DEFAULT NULL,
  `SP4` int DEFAULT NULL,
  `SP5` int DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

--
-- Dumping data for table `dummydata`
--

INSERT INTO `dummydata` (`SERIAL_No`, `SP1`, `SP2`, `SP3`, `SP4`, `SP5`, `timestamp`, `Shift`, `MC_No`, `Die_No`, `Operator_ID`, `Corting_ID`, `Temp_Atmosp_Cy_On`, `Humidity_Cy_On`, `R_UP_Main_Temp_Cy_On`, `R_UP_SP_Temp_Cy_On`, `No_Use_Cy_On1`, `R_Low_Gat1_Temp_Cy_On`, `No_Use_Cy_On2`, `R_Low_Main1_Temp_Cy_On`, `R_Low_Main2_Temp_Cy_On`, `R_YUGUCHI_Temp_Cy_On`, `L_UP_Main_Temp_Cy_On`, `L_UP_SP_Temp_Cy_On`, `No_Use_Cy_On3`, `L_LOW_Gate1_Temp_Cy_On`, `No_Use_Cy_On4`, `L_LOW_Main1_Temp_Cy_On`, `L_LOW_Main2_Temp_Cy_On`, `L_YUGUCHI_Temp_Cy_On`, `PRS_C_Temp_Cy_On`, `HLD_C_Temp_Cy_On`, `Cool_Wtr_IN_Cy_On`, `Cool_Air_IN_Cy_On`, `L_CP_2_Cy_On`, `L_CP_3_Cy_On`, `R_UP_SP_Wtr_Flow`, `R_UP_Wtr_Flow`, `L_UP_SP_Wtr_Flow`, `L_UP_Wtr_Flow`, `R_Low_air_1_Flow`, `L_Low_air_1_Flow`, `R_Low_air_2_Flow`, `L_Low_air_2_Flow`, `SP6`, `SP7`, `Press_Prg_No`, `After_Request_Shot`, `Coating_Life_Result`, `Temp_Atmosp_Process`, `Humidity_Process`, `R_UP_Main_Temp_Process`, `R_UP_SP_Temp_Process`, `No_Use_Process1`, `R_Low_Gat1_Temp_Process`, `No_Use_Process2`, `R_Low_Main1_Temp_Process`, `R_Low_Main2_Temp_Process`, `R_YUGUCHI_Temp_Process`, `L_UP_Main_Temp_Process`, `L_UP_SP_Temp_Process`, `No_Use_Process3`, `L_LOW_Gate1_Temp_Process`, `No_Use_Process4`, `L_LOW_Main1_Temp_Process`, `L_LOW_Main2_Temp_Process`, `L_YUGUCHI_Temp_Process`, `PRS_C_Temp_Process`, `HLD_C_Temp_Process`, `Cool_Wtr_IN_Process`, `Cool_Air_IN_Process`, `SP8`, `SP9`, `SP10`, `SP11`, `SP12`, `SP13`, `Cycle_Time1`, `Cycle_Time2`, `Cycle_Time3`, `Inspection_OK_or_NG`, `SP14`, `SP15`, `SP16`) VALUES
('A924A01A01', 0, 0, 0, 0, 0, '2024-10-17 07:54:08', 'B', 9, 'A', 0, 0, 34, 68, 317, 113, 1200, 496, 1200, 520, 492, 293, 312, 122, 1200, 481, 1200, 515, 481, 306, 697, 704, 33, 33, 38, 190, 37, 81, 39, 76, 354, 366, 0, 0, 0, 0, 26, 0, 0, 34, 67, 362, 106, 1200, 536, 1200, 543, 502, 295, 343, 113, 1200, 520, 1200, 536, 493, 310, 699, 704, 33, 33, 0, 0, 0, 0, 0, 0, 290, 48, 31, 1, 0, 0, 0),
('A924A01A02', 0, 0, 0, 0, 0, '2024-10-17 07:55:20', 'A', 9, 'A', 19201, 22551, 34, 67, 322, 111, 1200, 502, 1200, 527, 499, 295, 316, 121, 1200, 488, 1200, 521, 488, 310, 697, 704, 33, 33, 39, 195, 38, 86, 40, 79, 353, 366, 0, 0, 0, 0, 26, 0, 0, 35, 67, 363, 106, 1200, 540, 1200, 546, 506, 297, 344, 122, 1200, 524, 1200, 538, 496, 314, 699, 704, 33, 33, 0, 0, 0, 0, 0, 0, 288, 46, 30, 1, 0, 0, 0),
('A924A01A03', 0, 0, 0, 0, 0, '2024-10-17 07:55:52', 'A', 9, 'A', 19201, 22551, 34, 67, 322, 113, 1200, 507, 1200, 530, 502, 297, 316, 121, 1200, 491, 1200, 523, 490, 313, 697, 705, 33, 33, 40, 187, 42, 85, 42, 78, 353, 351, 0, 0, 0, 0, 26, 0, 0, 34, 68, 364, 106, 1200, 542, 1200, 547, 508, 300, 344, 123, 1200, 527, 1200, 539, 497, 317, 700, 705, 33, 33, 0, 0, 0, 0, 0, 0, 288, 45, 30, 1, 0, 0, 0),
('A924A01A04', 0, 0, 0, 0, 0, '2024-10-17 07:56:47', 'A', 9, 'A', 19201, 22551, 34, 68, 322, 112, 1200, 506, 1200, 531, 503, 299, 315, 121, 1200, 492, 1200, 524, 491, 318, 697, 705, 33, 33, 37, 188, 37, 81, 39, 76, 368, 366, 0, 0, 0, 0, 26, 1, 0, 34, 67, 363, 106, 1200, 541, 1200, 547, 509, 301, 345, 475, 1200, 528, 1200, 541, 499, 321, 700, 704, 33, 33, 0, 0, 0, 0, 0, 0, 291, 49, 30, 1, 0, 0, 0),
('A924A01A05', 0, 0, 0, 0, 0, '2024-10-17 07:57:09', 'A', 9, 'A', 19201, 22551, 34, 67, 322, 111, 1200, 509, 1200, 532, 504, 302, 317, 122, 1200, 494, 1200, 526, 493, 320, 697, 704, 33, 33, 40, 187, 41, 86, 41, 80, 353, 351, 0, 0, 0, 0, 26, 2, 0, 34, 68, 363, 103, 1200, 543, 1200, 548, 510, 303, 344, 113, 1200, 528, 1200, 541, 499, 323, 699, 704, 33, 33, 0, 0, 0, 0, 0, 0, 288, 45, 30, 1, 0, 0, 0),
('A924A01A06', 0, 0, 0, 0, 0, '2024-10-17 07:57:40', 'A', 9, 'A', 19201, 22551, 34, 67, 319, 111, 1200, 507, 1200, 532, 505, 303, 314, 121, 1200, 493, 1200, 525, 492, 323, 697, 705, 33, 33, 38, 189, 37, 82, 39, 76, 354, 366, 0, 0, 0, 0, 26, 3, 0, 35, 67, 362, 105, 1200, 542, 1200, 548, 509, 305, 345, 1200, 1200, 528, 1200, 541, 500, 325, 700, 705, 33, 33, 0, 0, 0, 0, 0, 0, 293, 51, 30, 1, 0, 0, 0),
('A924A01A07', 0, 0, 0, 0, 0, '2024-10-17 07:57:55', 'A', 9, 'A', 19201, 22551, 35, 67, 321, 110, 1200, 509, 1200, 532, 505, 305, 316, 121, 1200, 496, 1200, 527, 494, 324, 697, 705, 34, 33, 39, 196, 37, 86, 38, 80, 368, 366, 0, 0, 0, 0, 26, 4, 0, 35, 66, 361, 103, 1200, 543, 1200, 549, 510, 306, 345, 1200, 1200, 532, 1200, 542, 501, 327, 700, 704, 34, 33, 0, 0, 0, 0, 0, 0, 287, 46, 30, 1, 0, 0, 0),
('A924A01A08', 0, 0, 0, 0, 0, '2024-10-17 07:58:45', 'A', 9, 'A', 19201, 22551, 35, 66, 320, 109, 1200, 509, 1200, 533, 506, 306, 316, 119, 1200, 497, 1200, 528, 495, 325, 697, 704, 34, 33, 39, 198, 42, 83, 43, 78, 368, 366, 0, 0, 0, 0, 26, 5, 0, 35, 66, 362, 103, 1200, 546, 1200, 549, 511, 307, 344, 113, 1200, 533, 1200, 542, 502, 328, 700, 705, 34, 33, 0, 0, 0, 0, 0, 0, 288, 46, 30, 1, 0, 0, 0),
('A924A01A09', 0, 0, 0, 0, 0, '2024-10-17 07:59:02', 'A', 9, 'A', 19201, 22551, 35, 66, 262, 180, 1200, 460, 1200, 494, 473, 307, 265, 180, 1200, 446, 1200, 487, 459, 320, 700, 705, 34, 33, 40, 185, 42, 86, 41, 80, 368, 351, 0, 0, 0, 0, 26, 6, 0, 35, 65, 342, 108, 1200, 525, 1200, 532, 494, 307, 324, 121, 1200, 514, 1200, 523, 482, 326, 702, 705, 34, 34, 0, 0, 0, 0, 0, 0, 485, 22, 30, 1, 0, 0, 0),
('A924A01A10', 0, 0, 0, 0, 0, '2024-10-17 07:59:40', 'A', 9, 'A', 19201, 22551, 35, 65, 305, 108, 1200, 495, 1200, 516, 491, 306, 300, 120, 1200, 480, 1200, 509, 478, 323, 699, 705, 34, 34, 36, 192, 41, 77, 41, 73, 368, 366, 0, 0, 0, 0, 26, 7, 0, 36, 65, 351, 100, 1200, 537, 1200, 541, 502, 307, 334, 110, 1200, 522, 1200, 533, 491, 326, 700, 704, 34, 34, 0, 0, 0, 0, 0, 0, 287, 45, 30, 1, 0, 0, 0),
('A924A01A11', 0, 0, 0, 0, 0, '2024-10-17 07:59:53', 'A', 9, 'A', 19201, 22551, 35, 65, 312, 106, 1200, 504, 1200, 525, 498, 307, 307, 117, 1200, 487, 1200, 518, 485, 326, 697, 705, 34, 34, 39, 185, 42, 84, 40, 79, 368, 366, 0, 0, 0, 0, 26, 8, 0, 36, 65, 356, 101, 1200, 541, 1200, 545, 506, 307, 337, 110, 1200, 526, 1200, 537, 495, 327, 700, 704, 35, 34, 0, 0, 0, 0, 0, 0, 288, 45, 30, 1, 0, 0, 0),
('A924A01A12', 0, 0, 0, 0, 0, '2024-10-17 08:00:05', 'A', 9, 'A', 19201, 22551, 36, 65, 315, 107, 1200, 507, 1200, 529, 502, 307, 309, 118, 1200, 490, 1200, 521, 488, 327, 697, 705, 35, 34, 38, 182, 42, 81, 39, 76, 368, 351, 0, 0, 0, 0, 26, 9, 0, 36, 64, 358, 103, 1200, 543, 1200, 547, 508, 308, 339, 109, 1200, 528, 1200, 539, 497, 328, 700, 704, 35, 34, 0, 0, 0, 0, 0, 0, 288, 46, 30, 1, 0, 0, 0),
('A924A01A13', 0, 0, 0, 0, 0, '2024-10-17 08:00:19', 'A', 9, 'A', 19201, 22551, 36, 64, 317, 108, 1200, 509, 1200, 530, 503, 307, 311, 118, 1200, 494, 1200, 524, 491, 328, 698, 705, 35, 34, 40, 190, 37, 85, 38, 79, 354, 351, 0, 0, 0, 0, 26, 0, 0, 36, 64, 358, 101, 1200, 544, 1200, 548, 509, 308, 341, 109, 1200, 530, 1200, 541, 499, 329, 700, 704, 35, 34, 0, 0, 0, 0, 0, 0, 287, 44, 30, 1, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
