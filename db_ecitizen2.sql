-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 05:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecitizen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `com_id` int(11) NOT NULL,
  `com_category` varchar(30) NOT NULL,
  `com_desc` varchar(255) NOT NULL,
  `com_img` varchar(255) NOT NULL,
  `com_email` varchar(30) NOT NULL,
  `com_status` int(11) NOT NULL,
  `com_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_income_cert`
--

CREATE TABLE `tbl_income_cert` (
  `ic_id` int(11) NOT NULL,
  `ic_aadhar_id` int(12) NOT NULL,
  `ic_income_proof_cat` varchar(50) NOT NULL,
  `ic_income_proof` varchar(50) NOT NULL,
  `ic_ration_card` int(20) NOT NULL,
  `ic_elec_bill` varchar(50) NOT NULL,
  `ic_affidavit` varchar(50) NOT NULL,
  `ic_birth_place` varchar(30) NOT NULL,
  `ic_occupation` varchar(30) NOT NULL,
  `ic_occupation_details` varchar(30) NOT NULL,
  `ic_occupation_address` varchar(255) NOT NULL,
  `ic_member_in_family` int(11) NOT NULL,
  `ic_member_earn_family` int(11) NOT NULL,
  `ic_total_income` int(11) NOT NULL,
  `ic_avg_electric_bill` int(11) NOT NULL,
  `ic_why_certificate` varchar(255) NOT NULL,
  `ic_certificate` varchar(255) NOT NULL,
  `ic_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_noncrem_cert`
--

CREATE TABLE `tbl_noncrem_cert` (
  `nc_id` int(11) NOT NULL,
  `nc_aadhar_id` int(12) NOT NULL,
  `nc_income_proof_cat` varchar(50) NOT NULL,
  `nc_income_proof` varchar(50) NOT NULL,
  `nc_caste_proof_cat` varchar(50) NOT NULL,
  `nc_caste_proof` varchar(50) NOT NULL,
  `nc_affidavit` varchar(50) NOT NULL,
  `nc_tc_of_father` varchar(50) NOT NULL,
  `nc_rec_talati` varchar(50) NOT NULL,
  `nc_panchnamu` varchar(50) NOT NULL,
  `nc_certificate` varchar(255) NOT NULL,
  `nc_reli_caste_subcaste` varchar(30) NOT NULL,
  `nc_occupation` varchar(30) NOT NULL,
  `nc_father_name` varchar(30) NOT NULL,
  `nc_mother_name` varchar(30) NOT NULL,
  `nc_husband_name` varchar(30) NOT NULL,
  `nc_parent_status` varchar(30) NOT NULL,
  `nc_parent_post` varchar(30) NOT NULL,
  `nc_parent_post_date` date NOT NULL,
  `nc_parent_birth_date` date NOT NULL,
  `nc_parent_job_office` varchar(30) NOT NULL,
  `nc_parent_job_post` varchar(30) NOT NULL,
  `nc_total_income` int(11) NOT NULL,
  `nc_family_income` int(11) NOT NULL,
  `nc_why_certificate` varchar(255) NOT NULL,
  `nc_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `pst_id` int(11) NOT NULL,
  `pst_title` varchar(30) NOT NULL,
  `pst_img` varchar(255) NOT NULL,
  `pst_desc` varchar(255) NOT NULL,
  `pst_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scst_cert`
--

CREATE TABLE `tbl_scst_cert` (
  `scst_c_id` int(11) NOT NULL,
  `scst_c_aadhar_id` int(12) NOT NULL,
  `scst_c_caste_proof_cat` varchar(50) NOT NULL,
  `scst_c_caste_proof` varchar(50) NOT NULL,
  `scst_c_relation_proof_cat` varchar(50) NOT NULL,
  `scst_c_relation_proof` varchar(50) NOT NULL,
  `scst_c_affidavit` varchar(50) NOT NULL,
  `scst_c_tc_bc` varchar(50) NOT NULL,
  `scst_c_tc_cc` varchar(50) NOT NULL,
  `scst_c_tc_lc` varchar(50) NOT NULL,
  `scst_c_tc_cc_gramp` varchar(50) NOT NULL,
  `scst_c_tc_cc_nagarp` varchar(50) NOT NULL,
  `scst_caste_subcaste` varchar(30) NOT NULL,
  `scst_birth_place` varchar(30) NOT NULL,
  `scst_why_certificate` varchar(255) NOT NULL,
  `scst_` varchar(255) NOT NULL,
  `scst_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sebc_cert`
--

CREATE TABLE `tbl_sebc_cert` (
  `sebc_c_id` int(11) NOT NULL,
  `sebc_c_aadhar_id` int(12) NOT NULL,
  `sebc_c_caste_proof_cat` varchar(50) NOT NULL,
  `sebc_c_caste_proof` varchar(50) NOT NULL,
  `sebc_c_ser_att_proof` varchar(50) NOT NULL,
  `sebc_father_name` varchar(30) NOT NULL,
  `sebc_birth_place` varchar(30) NOT NULL,
  `sebc_job_business` varchar(30) NOT NULL,
  `sebc_job_business_place` varchar(255) NOT NULL,
  `sebc_age` int(11) NOT NULL,
  `sebc_caste_subcaste` varchar(30) NOT NULL,
  `sebc_annual_income` int(11) NOT NULL,
  `sebc_why_certificate` varchar(255) NOT NULL,
  `sebc_certificate` varchar(255) NOT NULL,
  `sebc_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_senior_cit_cert`
--

CREATE TABLE `tbl_senior_cit_cert` (
  `sc_id` int(11) NOT NULL,
  `sc_aadhar_id` int(12) NOT NULL,
  `sc_age_proof_cat` varchar(50) NOT NULL DEFAULT '',
  `sc_age_proof` varchar(50) NOT NULL,
  `sc_affidavit` varchar(50) NOT NULL,
  `sc_talati_cert` varchar(50) NOT NULL,
  `sc_birth_place` varchar(30) NOT NULL,
  `sc_why_certificate` varchar(255) NOT NULL,
  `sc_certificate` varchar(255) NOT NULL,
  `sc_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL,
  `u_aadhar_id` int(12) NOT NULL,
  `u_dob` date NOT NULL,
  `u_mobile` bigint(10) NOT NULL,
  `u_mail` varchar(30) NOT NULL,
  `u_pwd` varchar(15) NOT NULL,
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_income_cert`
--
ALTER TABLE `tbl_income_cert`
  ADD PRIMARY KEY (`ic_id`);

--
-- Indexes for table `tbl_noncrem_cert`
--
ALTER TABLE `tbl_noncrem_cert`
  ADD PRIMARY KEY (`nc_id`);

--
-- Indexes for table `tbl_scst_cert`
--
ALTER TABLE `tbl_scst_cert`
  ADD PRIMARY KEY (`scst_c_id`);

--
-- Indexes for table `tbl_sebc_cert`
--
ALTER TABLE `tbl_sebc_cert`
  ADD PRIMARY KEY (`sebc_c_id`);

--
-- Indexes for table `tbl_senior_cit_cert`
--
ALTER TABLE `tbl_senior_cit_cert`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_income_cert`
--
ALTER TABLE `tbl_income_cert`
  MODIFY `ic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_noncrem_cert`
--
ALTER TABLE `tbl_noncrem_cert`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_scst_cert`
--
ALTER TABLE `tbl_scst_cert`
  MODIFY `scst_c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sebc_cert`
--
ALTER TABLE `tbl_sebc_cert`
  MODIFY `sebc_c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_senior_cit_cert`
--
ALTER TABLE `tbl_senior_cit_cert`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
