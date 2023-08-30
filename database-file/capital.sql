
DROP DATABASE IF EXISTS `capital`;
CREATE DATABASE `capital`;
USE `capital`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
(1, 'admin', '$2y$10$swwhKVhuJCoq928ej6WvmuGWvYhIbqfCZb58COJllWM1KWK75mKfu');

-- --------------------------------------------------------


CREATE TABLE `apply` (
  `Student_Id` int(11) NOT NULL,
  `First_Name` varchar(225) NOT NULL,
  `Middle_Name` varchar(225) NOT NULL,
  `Surname` varchar(225) NOT NULL,
  `Date_Of_Birth` varchar(225) NOT NULL,
  `Gender` varchar(225) NOT NULL,
  `Religion` varchar(225) NOT NULL,
  `Home_Address` varchar(225) NOT NULL,
  `Nationality` varchar(225) NOT NULL,
  `Parent_FName` varchar(225) NOT NULL,
  `Parent_LName` varchar(225) NOT NULL,
  `Relationship` varchar(225) NOT NULL,
  `pHome_Address` varchar(225) NOT NULL,
  `Occupation` varchar(225) NOT NULL,
  `Work_Address` varchar(225) NOT NULL,
  `Telephone` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Level_Applied` int(11) NOT NULL,
  `School_Transport` varchar(225) NOT NULL,
  `Current_Attending` varchar(225) NOT NULL,
  `School_Attending` varchar(225) NOT NULL,
  `Address_Attending` varchar(225) NOT NULL,
  `Level_Attending` int(10) NOT NULL,
  `Disability` varchar(225) NOT NULL,
  `Disability_Name` varchar(225) NOT NULL,
  `Disability_Description` varchar(225) NOT NULL,
  `Date_Applied` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`Student_Id`, `First_Name`, `Middle_Name`, `Surname`, `Date_Of_Birth`, `Gender`, `Religion`, `Home_Address`, `Nationality`, `Parent_FName`, `Parent_LName`, `Relationship`, `pHome_Address`, `Occupation`, `Work_Address`, `Telephone`, `Email`, `Level_Applied`, `School_Transport`, `Current_Attending`, `School_Attending`, `Address_Attending`, `Level_Attending`, `Disability`, `Disability_Name`, `Disability_Description`, `Date_Applied`, `Status`) VALUES
(1, 'q', 'q', 'q', '2023-08-09', 'Male', 'christian', 'q', 'q', 'w', 'w', 'Mother', 'w', 'w', 'w', '111', 'qwe@gmail.com', 1, 'No', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 02:39:50', 0),
(2, 'q', 'q', 'q', '2023-08-09', 'Male', 'christian', 'q', 'q', 'w', 'w', 'Mother', 'w', 'w', 'w', '111', 'qwe@gmail.com', 1, 'No', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 02:43:36', 0),
(3, 'q', 'q', 'q', '2023-08-09', 'Male', 'christian', 'q', 'q', 'w', 'w', 'Mother', 'w', 'w', 'w', '111', 'qwe@gmail.com', 1, 'No', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 02:45:26', 0),
(4, 'q', 'q', 'q', '2023-08-09', 'Male', 'christian', 'q', 'q', 'w', 'w', 'Mother', 'w', 'w', 'w', '111', 'qwe@gmail.com', 1, 'No', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 02:48:42', 2),
(5, 'a', 'a', 'ass', '2023-08-01', 'Female', 'christian', 'a', 'a', 'q', 'q', 'Father', 'q', 'q', 'q', 'q', 'qwe@gmail.com', 1, 'No', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 02:49:17', 0),
(6, 'a', 'a', 'a', '2023-08-01', 'Male', 'christian', 'a', 'a', 'w', 'w', 'Father', 'w', 'w', 'w', '1', 'qwe@gmail.com', 1, 'Yes', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 02:51:32', 0),
(7, 'a', 'a', 'a', '2023-08-01', 'Male', 'christian', 'a', 'a', 'w', 'w', 'Father', 'w', 'w', 'w', '1', 'qwe@gmail.com', 1, 'Yes', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 02:52:30', 0),
(8, 'kedrick', 'Abdul', 'Zubeir', '2023-08-01', 'Male', 'islamic', 'Ilazo', 'Dodoma', 'Abdul', 'Zubeir', 'Father', 'ilazo', 'ICT ', 'Tanesco Dodoma', '0743315353', 'abdul.zubeir@tanesco.co.tz', 5, 'Yes', 'No', '', '', 0, 'No', 'No', '', '2023-08-15 03:14:37', 1),
(9, 'Johnson', 'Johansen', 'Jonathan', '2023-08-15', 'Male', 'christian', 'Makulu', 'Tanzania', 'Johnson', 'Johansen', 'Father', 'Makulu', 'Analyst', 'Home', '123', 'johnsonjohansen9@gmail.com', 1, 'Yes', 'No', '', '', 0, 'No', 'No', '', '2023-08-16 23:52:35', 0),
(10, 'japhet ', 'enock', 'karogo', '2023-08-22', 'Male', 'christian', 'kikuyu', 'Tanzanian', 'loyce', 'enock', 'Mother', 'musoma', 'farmer', '1234', '0683966227', 'loyec@gmail.com', 4, 'Yes', 'Yes', 'sayuni primary school', 'P.O.BOX116', 3, 'No', 'No', '', '2023-08-18 00:31:57', 0),
(11, 'Sarah', 'Ivany', 'chedego', '2023-08-18', 'Female', 'islamic', 'kisasa', 'tanzania', 'Marry', 'Ivany', 'Mother', 'ilazo', 'soldier', 'dodoma', '0745321234', 'marry@gmail.com', 4, 'Yes', 'No', '', '', 0, 'No', 'No', '', '2023-08-18 00:49:18', 0),
(12, 'Harry', 'ww', 'Maguire', '2023-08-13', 'Male', 'christian', 'q', 'qq', 'www', 'ww', 'Father', 'ww', 'ww', 'www', 'www', 'ww@gmail.com', 1, 'Yes', 'No', '', '', 0, 'No', 'No', '', '2023-08-18 03:25:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(100) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Email`, `Password`) VALUES
(1, 'New1', 'myself@gmail.com', '$2y$10$hIFAn9TJdWiKMVit5ktiquPCxZ.aucVIhtCBksmETkoWm3T5RIQ5W'),
(2, 'Johnson', 'jack@gmail.com', '$2y$10$kZYPywRcf8fEJZHP/vRLlu.13n8CM4tznS9mXzUF2netESVzUM60i'),
(3, 'isaya', 'isaya@gmail.com', '$2y$10$rC7.ZxMMDCOs9LcOCgUjjO/ztKwYpl2OYRJnz6amsFqJbnl4nTpeK'),
(4, 'noreen', 'noreen@gmail.com', '$2y$10$UHGK.29ZyLpASm.7mTtFaOyMN0bSY4/3k7kR5D5xEe1alEe/pa4jq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`Student_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
