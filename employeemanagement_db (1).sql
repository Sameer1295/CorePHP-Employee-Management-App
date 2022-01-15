-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 06:00 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeemanagement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees_table`
--

CREATE TABLE `employees_table` (
  `employee_id` int(11) NOT NULL,
  `employee_code` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_gender` tinyint(4) NOT NULL,
  `employee_father_name` varchar(255) NOT NULL,
  `employee_mother_name` varchar(255) NOT NULL,
  `employee_dob` date NOT NULL,
  `employee_designation` varchar(255) NOT NULL,
  `employee_payroll` varchar(255) NOT NULL,
  `employee_esic` varchar(255) NOT NULL,
  `employee_uan` varchar(255) NOT NULL,
  `employee_education` varchar(255) NOT NULL,
  `employee_marital_status` tinyint(4) NOT NULL,
  `employee_adhaar` varchar(255) NOT NULL,
  `employee_address` text NOT NULL,
  `employee_permanent_address` text NOT NULL,
  `employee_pan_card` varchar(255) NOT NULL,
  `employee_bank_name` varchar(255) NOT NULL,
  `employee_branch_name` varchar(255) NOT NULL,
  `employee_account_number` varchar(255) NOT NULL,
  `employee_ifsc_code` varchar(255) NOT NULL,
  `employee_blood_group` varchar(255) NOT NULL,
  `employee_mobile_number` varchar(255) NOT NULL,
  `employee_body_mark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees_table`
--

INSERT INTO `employees_table` (`employee_id`, `employee_code`, `employee_name`, `employee_gender`, `employee_father_name`, `employee_mother_name`, `employee_dob`, `employee_designation`, `employee_payroll`, `employee_esic`, `employee_uan`, `employee_education`, `employee_marital_status`, `employee_adhaar`, `employee_address`, `employee_permanent_address`, `employee_pan_card`, `employee_bank_name`, `employee_branch_name`, `employee_account_number`, `employee_ifsc_code`, `employee_blood_group`, `employee_mobile_number`, `employee_body_mark`) VALUES
(10, ' March05', 'Nilesh', 1, 'test', 'test', '1995-07-08', 'webdev', '3', 'pk', 'n', 'jkn', 0, 'kn', 'n', 'kn', 'k', 'kn', 'kn', 'k', 'nk', 'n', 'kjnk', 'kn'),
(11, 'feb04', 'Sam', 1, 'aslf', 'vrlmv', '1995-12-12', 'dm analyst', 'gljncf', 'vewjnv', 'ewjnv', 'rerlnv', 0, '2340896582067', 'vrekjbv grekbv', 'vwkrbv ekgbgkj g4khgwk gekehgkh fwkegkbkgw gegewkbgkhkwkhgwkghkw fwekhflhwlhflhwlhf fwelhglhg', 'egihv204808', 'weglbvkb', 'vwebvb', '23586204982', 'weglvjlwl3258050', 'b', '32509520', 'weflkjb erlg');

-- --------------------------------------------------------

--
-- Table structure for table `employers_table`
--

CREATE TABLE `employers_table` (
  `employer_id` int(11) NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `employer_address` text NOT NULL,
  `employer_contact_number` varchar(255) NOT NULL,
  `employer_pf_number` varchar(50) NOT NULL,
  `employer_esic_number` int(11) NOT NULL,
  `employer_gst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employers_table`
--

INSERT INTO `employers_table` (`employer_id`, `employer_name`, `employer_address`, `employer_contact_number`, `employer_pf_number`, `employer_esic_number`, `employer_gst`) VALUES
(1, 'test', 'eflj vl', '53806409207', '345439986340', 54806402, 2147483647),
(2, 'Google', 'wefnvlernb', '8034570923', '3250975230', 2147483647, 32059835),
(6, 'enel', 'elgknbrl', '43059864038', '430986gvlerh', 0, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_table`
--

CREATE TABLE `payroll_table` (
  `payroll_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `employee_pf_number` varchar(255) NOT NULL,
  `employee_esic_number` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `leaving_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_table`
--

INSERT INTO `payroll_table` (`payroll_id`, `employee_id`, `employer_id`, `employee_pf_number`, `employee_esic_number`, `joining_date`, `leaving_date`) VALUES
(3, 12, 2, '3295080439', '32509843098', '2021-01-12', '2021-01-29'),
(4, 11, 2, '3209850938', '34095543098', '2021-01-22', '2021-01-31'),
(5, 11, 6, 'relgrlen34i0', 'ert304580349', '2021-01-24', '2021-01-28'),
(6, 0, 0, 'MH/BAN/0047162/000/0010999', '31–00–123456–000–0001', '2021-01-29', '2021-01-31'),
(9, 0, 0, '', '', '2021-01-28', '2021-01-31'),
(10, 10, 1, '34095864037', '3205983409', '2021-01-28', '2021-01-30'),
(11, 0, 0, '', '', '0000-00-00', '0000-00-00'),
(12, 0, 0, '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'admin'),
(2, 'sameer', '$2y$10$jN6O4h8YIU3MPGLCi1DlJepzz8qjHNimKpjHRplSJ.m1MG1QFn5sy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees_table`
--
ALTER TABLE `employees_table`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employers_table`
--
ALTER TABLE `employers_table`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `payroll_table`
--
ALTER TABLE `payroll_table`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees_table`
--
ALTER TABLE `employees_table`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employers_table`
--
ALTER TABLE `employers_table`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payroll_table`
--
ALTER TABLE `payroll_table`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
