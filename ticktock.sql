SET FOREIGN_KEY_CHECKS = 0;
-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 20, 2016 at 12:41 PM
-- Server version: 5.6.25-73.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=633 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `city_name`) VALUES
(1, 1, 'Nicobars'),
(2, 1, 'North And Middle Andaman'),
(3, 1, 'South Andamans'),
(4, 2, 'East Godavari'),
(5, 2, 'Guntur'),
(6, 2, 'Krishna'),
(7, 2, 'Prakasam'),
(8, 2, 'Spsr Nellore'),
(9, 2, 'Srikakulam'),
(10, 2, 'Visakhapatanam'),
(11, 2, 'Vizianagaram'),
(12, 2, 'West Godavari'),
(13, 2, 'Anantapur'),
(14, 2, 'Chittoor'),
(15, 2, 'Cuddapah'),
(16, 2, 'Kurnool'),
(17, 2, 'Adilabad'),
(18, 2, 'Hyderabad'),
(19, 2, 'Karimnagar'),
(20, 2, 'Khammam'),
(21, 2, 'Mahbubnagar'),
(22, 2, 'Medak'),
(23, 2, 'Nalgonda'),
(24, 2, 'Nizamabad'),
(25, 2, 'Rangareddi'),
(26, 2, 'Warangal'),
(27, 3, 'Anjaw'),
(28, 3, 'Changlang'),
(29, 3, 'Dibang Valley'),
(30, 3, 'East Kameng'),
(31, 3, 'East Siang'),
(32, 3, 'Kurung Kumey'),
(33, 3, 'Lohit'),
(34, 3, 'Lower Dibang Valley'),
(35, 3, 'Lower Subansiri'),
(36, 3, 'Papum Pare'),
(37, 3, 'Tawang'),
(38, 3, 'Tirap'),
(39, 3, 'Upper Siang'),
(40, 3, 'Upper Subansiri'),
(41, 3, 'West Kameng'),
(42, 3, 'West Siang'),
(43, 4, 'Baksa'),
(44, 4, 'Barpeta'),
(45, 4, 'Bongaigaon'),
(46, 4, 'Cachar'),
(47, 4, 'Chirang'),
(48, 4, 'Darrang'),
(49, 4, 'Dhemaji'),
(50, 4, 'Dhubri'),
(51, 4, 'Dibrugarh'),
(52, 4, 'Goalpara'),
(53, 4, 'Golaghat'),
(54, 4, 'Hailakandi'),
(55, 4, 'Jorhat'),
(56, 4, 'Kamrup'),
(57, 4, 'Kamrup Metro'),
(58, 4, 'Karimganj'),
(59, 4, 'Kokrajhar'),
(60, 4, 'Lakhimpur'),
(61, 4, 'Marigaon'),
(62, 4, 'Nagaon'),
(63, 4, 'Nalbari'),
(64, 4, 'Sivasagar'),
(65, 4, 'Sonitpur'),
(66, 4, 'Tinsukia'),
(67, 4, 'Udalguri'),
(68, 5, 'Araria'),
(69, 5, 'Arwal'),
(70, 5, 'Aurangabad'),
(71, 5, 'Banka'),
(72, 5, 'Begusarai'),
(73, 5, 'Bhagalpur'),
(74, 5, 'Bhojpur'),
(75, 5, 'Buxar'),
(76, 5, 'Darbhanga'),
(77, 5, 'Gaya'),
(78, 5, 'Gopalganj'),
(79, 5, 'Jamui'),
(80, 5, 'Jehanabad'),
(81, 5, 'Kaimur (bhabua)'),
(82, 5, 'Katihar'),
(83, 5, 'Khagaria'),
(84, 5, 'Kishanganj'),
(85, 5, 'Lakhisarai'),
(86, 5, 'Madhepura'),
(87, 5, 'Madhubani'),
(88, 5, 'Munger'),
(89, 5, 'Muzaffarpur'),
(90, 5, 'Nalanda'),
(91, 5, 'Nawada'),
(92, 5, 'Pashchim Champaran'),
(93, 5, 'Patna'),
(94, 5, 'Purbi Champaran'),
(95, 5, 'Purnia'),
(96, 5, 'Rohtas'),
(97, 5, 'Saharsa'),
(98, 5, 'Samastipur'),
(99, 5, 'Saran'),
(100, 5, 'Sheikhpura'),
(101, 5, 'Sheohar'),
(102, 5, 'Sitamarhi'),
(103, 5, 'Siwan'),
(104, 5, 'Supaul'),
(105, 5, 'Vaishali'),
(106, 6, 'Chandigarh'),
(107, 7, 'Bastar'),
(108, 7, 'Bijapur'),
(109, 7, 'Bilaspur'),
(110, 7, 'Dantewada'),
(111, 7, 'Dhamtari'),
(112, 7, 'Durg'),
(113, 7, 'Janjgir-champa'),
(114, 7, 'Jashpur'),
(115, 7, 'Kabirdham'),
(116, 7, 'Kanker'),
(117, 7, 'Korba'),
(118, 7, 'Korea'),
(119, 7, 'Mahasamund'),
(120, 7, 'Narayanpur'),
(121, 7, 'Raigarh'),
(122, 7, 'Raipur'),
(123, 7, 'Rajnandgaon'),
(124, 7, 'Surguja'),
(125, 8, 'Dadra And Nagar Haveli'),
(126, 9, 'Daman'),
(127, 9, 'Diu'),
(128, 10, 'Central Delhi'),
(129, 10, 'Delhi'),
(130, 10, 'East Delhi'),
(131, 10, 'North Delhi'),
(132, 10, 'North East Delhi'),
(133, 10, 'North West Delhi'),
(134, 10, 'South Delhi'),
(135, 10, 'South West Delhi'),
(136, 10, 'West Delhi'),
(137, 11, 'North Goa'),
(138, 11, 'South Goa'),
(139, 12, 'Ahmadabad'),
(140, 12, 'Amreli'),
(141, 12, 'Anand'),
(142, 12, 'Banas Kantha'),
(143, 12, 'Bharuch'),
(144, 12, 'Bhavnagar'),
(145, 12, 'Dang'),
(146, 12, 'Dohad'),
(147, 12, 'Gandhinagar'),
(148, 12, 'Jamnagar'),
(149, 12, 'Junagadh'),
(150, 12, 'Kachchh'),
(151, 12, 'Kheda'),
(152, 12, 'Mahesana'),
(153, 12, 'Narmada'),
(154, 12, 'Navsari'),
(155, 12, 'Panch Mahals'),
(156, 12, 'Patan'),
(157, 12, 'Porbandar'),
(158, 12, 'Rajkot'),
(159, 12, 'Sabar Kantha'),
(160, 12, 'Surat'),
(161, 12, 'Surendranagar'),
(162, 12, 'Vadodara'),
(163, 12, 'Valsad'),
(164, 13, 'Ambala'),
(165, 13, 'Bhiwani'),
(166, 13, 'Faridabad'),
(167, 13, 'Fatehabad'),
(168, 13, 'Gurgaon'),
(169, 13, 'Hisar'),
(170, 13, 'Jhajjar'),
(171, 13, 'Jind'),
(172, 13, 'Kaithal'),
(173, 13, 'Karnal'),
(174, 13, 'Kurukshetra'),
(175, 13, 'Mahendragarh'),
(176, 13, 'Mewat'),
(177, 13, 'Palwal'),
(178, 13, 'Panchkula'),
(179, 13, 'Panipat'),
(180, 13, 'Rewari'),
(181, 13, 'Rohtak'),
(182, 13, 'Sirsa'),
(183, 13, 'Sonipat'),
(184, 13, 'Yamunanagar'),
(185, 14, 'Bilaspur District'),
(186, 14, 'Chamba'),
(187, 14, 'Hamirpur'),
(188, 14, 'Kangra'),
(189, 14, 'Kinnaur'),
(190, 14, 'Kullu'),
(191, 14, 'Lahul And Spiti'),
(192, 14, 'Mandi'),
(193, 14, 'Shimla'),
(194, 14, 'Sirmaur'),
(195, 14, 'Solan'),
(196, 14, 'Una'),
(197, 15, 'Anantnag'),
(198, 15, 'Badgam'),
(199, 15, 'Bandipora'),
(200, 15, 'Baramulla'),
(201, 15, 'Doda'),
(202, 15, 'Ganderbal'),
(203, 15, 'Jammu'),
(204, 15, 'Kargil'),
(205, 15, 'Kathua'),
(206, 15, 'Kishtwar'),
(207, 15, 'Kulgam'),
(208, 15, 'Kupwara'),
(209, 15, 'Leh Ladakh'),
(210, 15, 'Poonch'),
(211, 15, 'Pulwama'),
(212, 15, 'Rajauri'),
(213, 15, 'Ramban'),
(214, 15, 'Reasi'),
(215, 15, 'Samba'),
(216, 15, 'Shopian'),
(217, 15, 'Srinagar'),
(218, 15, 'Udhampur'),
(219, 16, 'Bokaro'),
(220, 16, 'Chatra'),
(221, 16, 'Deoghar'),
(222, 16, 'Dhanbad'),
(223, 16, 'Dumka'),
(224, 16, 'East Singhbum'),
(225, 16, 'Garhwa'),
(226, 16, 'Giridih'),
(227, 16, 'Godda'),
(228, 16, 'Gumla'),
(229, 16, 'Hazaribagh'),
(230, 16, 'Jamtara'),
(231, 16, 'Khunti'),
(232, 16, 'Koderma'),
(233, 16, 'Latehar'),
(234, 16, 'Lohardaga'),
(235, 16, 'Pakur'),
(236, 16, 'Palamu'),
(237, 16, 'Ramgarh'),
(238, 16, 'Ranchi'),
(239, 16, 'Sahebganj'),
(240, 16, 'Saraikela Kharsawan'),
(241, 16, 'Simdega'),
(242, 16, 'West Singhbhum'),
(243, 17, 'Bagalkot'),
(244, 17, 'Bangalore'),
(245, 17, 'Bangalore Rural'),
(246, 17, 'Belgaum'),
(247, 17, 'Bellary'),
(248, 17, 'Bidar'),
(249, 17, 'Bijapur District'),
(250, 17, 'Chamarajanagar'),
(251, 17, 'Chikballapur'),
(252, 17, 'Chikmagalur'),
(253, 17, 'Chitradurga'),
(254, 17, 'Dakshin Kannad'),
(255, 17, 'Davangere'),
(256, 17, 'Dharwad'),
(257, 17, 'Gadag'),
(258, 17, 'Gulbarga'),
(259, 17, 'Hassan'),
(260, 17, 'Haveri'),
(261, 17, 'Kodagu'),
(262, 17, 'Kolar'),
(263, 17, 'Koppal'),
(264, 17, 'Mandya'),
(265, 17, 'Mysore'),
(266, 17, 'Raichur'),
(267, 17, 'Ramanagara'),
(268, 17, 'Shimoga'),
(269, 17, 'Tumkur'),
(270, 17, 'Udupi'),
(271, 17, 'Uttar Kannad'),
(272, 17, 'Yadgir'),
(273, 18, 'Alappuzha'),
(274, 18, 'Ernakulam'),
(275, 18, 'Idukki'),
(276, 18, 'Kannur'),
(277, 18, 'Kasaragod'),
(278, 18, 'Kollam'),
(279, 18, 'Kottayam'),
(280, 18, 'Kozhikode'),
(281, 18, 'Malappuram'),
(282, 18, 'Palakkad'),
(283, 18, 'Pathanamthitta'),
(284, 18, 'Thiruvananthapuram'),
(285, 18, 'Thrissur'),
(286, 18, 'Wayanad'),
(287, 19, 'Lakshadweep District'),
(288, 20, 'Alirajpur'),
(289, 20, 'Anuppur'),
(290, 20, 'Ashoknagar'),
(291, 20, 'Balaghat'),
(292, 20, 'Barwani'),
(293, 20, 'Betul'),
(294, 20, 'Bhind'),
(295, 20, 'Bhopal'),
(296, 20, 'Burhanpur'),
(297, 20, 'Chhatarpur'),
(298, 20, 'Chhindwara'),
(299, 20, 'Damoh'),
(300, 20, 'Datia'),
(301, 20, 'Dewas'),
(302, 20, 'Dhar'),
(303, 20, 'Dindori'),
(304, 20, 'East Nimar'),
(305, 20, 'Guna'),
(306, 20, 'Gwalior'),
(307, 20, 'Harda'),
(308, 20, 'Hoshangabad'),
(309, 20, 'Indore'),
(310, 20, 'Jabalpur'),
(311, 20, 'Jhabua'),
(312, 20, 'Katni'),
(313, 20, 'Khargone'),
(314, 20, 'Mandla'),
(315, 20, 'Mandsaur'),
(316, 20, 'Morena'),
(317, 20, 'Narsinghpur'),
(318, 20, 'Neemuch'),
(319, 20, 'Panna'),
(320, 20, 'Raisen'),
(321, 20, 'Rajgarh'),
(322, 20, 'Ratlam'),
(323, 20, 'Rewa'),
(324, 20, 'Sagar'),
(325, 20, 'Satna'),
(326, 20, 'Sehore'),
(327, 20, 'Seoni'),
(328, 20, 'Shahdol'),
(329, 20, 'Shajapur'),
(330, 20, 'Sheopur'),
(331, 20, 'Shivpuri'),
(332, 20, 'Sidhi'),
(333, 20, 'Singrauli'),
(334, 20, 'Tikamgarh'),
(335, 20, 'Ujjain'),
(336, 20, 'Umaria'),
(337, 20, 'Vidisha'),
(338, 21, 'Kolhapur'),
(339, 21, 'Pune'),
(340, 21, 'Sangli'),
(341, 21, 'Satara'),
(342, 21, 'Solapur'),
(343, 21, 'Ahmednagar'),
(344, 21, 'Dhule'),
(345, 21, 'Jalgaon'),
(346, 21, 'Nandurbar'),
(347, 21, 'Nashik'),
(348, 21, 'Mumbai'),
(349, 21, 'Raigad'),
(350, 21, 'Ratnagiri'),
(351, 21, 'Sindhudurg'),
(352, 21, 'Thane'),
(353, 21, 'Aurangabad District'),
(354, 21, 'Beed'),
(355, 21, 'Hingoli'),
(356, 21, 'Jalna'),
(357, 21, 'Latur'),
(358, 21, 'Nanded'),
(359, 21, 'Osmanabad'),
(360, 21, 'Parbhani'),
(361, 21, 'Bhandara'),
(362, 21, 'Chandrapur'),
(363, 21, 'Gadchiroli'),
(364, 21, 'Gondia'),
(365, 21, 'Nagpur'),
(366, 21, 'Wardha'),
(367, 21, 'Akola'),
(368, 21, 'Amravati'),
(369, 21, 'Buldhana'),
(370, 21, 'Washim'),
(371, 21, 'Yavatmal'),
(372, 22, 'Bishnupur'),
(373, 22, 'Chandel'),
(374, 22, 'Churachandpur'),
(375, 22, 'Imphal East'),
(376, 22, 'Imphal West'),
(377, 22, 'Senapati'),
(378, 22, 'Tamenglong'),
(379, 22, 'Thoubal'),
(380, 22, 'Ukhrul'),
(381, 23, 'East Khasi Hills'),
(382, 23, 'Jaintia Hills'),
(383, 23, 'Ri Bhoi'),
(384, 23, 'South Garo Hills'),
(385, 23, 'West Garo Hills'),
(386, 24, 'Aizawl'),
(387, 24, 'Champhai'),
(388, 24, 'Kolasib'),
(389, 24, 'Lawngtlai'),
(390, 24, 'Lunglei'),
(391, 24, 'Mamit'),
(392, 24, 'Saiha'),
(393, 24, 'Serchhip'),
(394, 25, 'Dimapur'),
(395, 25, 'Kiphire'),
(396, 25, 'Kohima'),
(397, 25, 'Longleng'),
(398, 25, 'Mokokchung'),
(399, 25, 'Mon'),
(400, 25, 'Peren'),
(401, 25, 'Phek'),
(402, 25, 'Tuensang'),
(403, 25, 'Wokha'),
(404, 25, 'Zunheboto'),
(405, 26, 'Anugul'),
(406, 26, 'Balangir'),
(407, 26, 'Baleshwar'),
(408, 26, 'Bargarh'),
(409, 26, 'Bhadrak'),
(410, 26, 'Boudh'),
(411, 26, 'Cuttack'),
(412, 26, 'Deogarh'),
(413, 26, 'Dhenkanal'),
(414, 26, 'Gajapati'),
(415, 26, 'Ganjam'),
(416, 26, 'Jagatsinghapur'),
(417, 26, 'Jajapur'),
(418, 26, 'Jharsuguda'),
(419, 26, 'Kalahandi'),
(420, 26, 'Kandhamal'),
(421, 26, 'Kendrapara'),
(422, 26, 'Kendujhar'),
(423, 26, 'Khordha'),
(424, 26, 'Koraput'),
(425, 26, 'Malkangiri'),
(426, 26, 'Mayurbhanj'),
(427, 26, 'Nabarangpur'),
(428, 26, 'Nayagarh'),
(429, 26, 'Nuapada'),
(430, 26, 'Puri'),
(431, 26, 'Rayagada'),
(432, 26, 'Sambalpur'),
(433, 26, 'Sonepur'),
(434, 26, 'Sundargarh'),
(435, 27, 'Karaikal'),
(436, 27, 'Pondicherry'),
(437, 28, 'Amritsar'),
(438, 28, 'Barnala'),
(439, 28, 'Bathinda'),
(440, 28, 'Faridkot'),
(441, 28, 'Fatehgarh Sahib'),
(442, 28, 'Firozepur'),
(443, 28, 'Gurdaspur'),
(444, 28, 'Hoshiarpur'),
(445, 28, 'Jalandhar'),
(446, 28, 'Kapurthala'),
(447, 28, 'Ludhiana'),
(448, 28, 'Mansa'),
(449, 28, 'Moga'),
(450, 28, 'Muktsar'),
(451, 28, 'Nawanshahr'),
(452, 28, 'Patiala'),
(453, 28, 'Rupnagar'),
(454, 28, 'S.a.s Nagar'),
(455, 28, 'Sangrur'),
(456, 28, 'Tarn Taran'),
(457, 29, 'Ajmer'),
(458, 29, 'Alwar'),
(459, 29, 'Banswara'),
(460, 29, 'Baran'),
(461, 29, 'Barmer'),
(462, 29, 'Bharatpur'),
(463, 29, 'Bhilwara'),
(464, 29, 'Bikaner'),
(465, 29, 'Bundi'),
(466, 29, 'Chittorgarh'),
(467, 29, 'Churu'),
(468, 29, 'Dausa'),
(469, 29, 'Dholpur'),
(470, 29, 'Dungarpur'),
(471, 29, 'Ganganagar'),
(472, 29, 'Hanumangarh'),
(473, 29, 'Jaipur'),
(474, 29, 'Jaisalmer'),
(475, 29, 'Jalore'),
(476, 29, 'Jhalawar'),
(477, 29, 'Jhunjhunu'),
(478, 29, 'Jodhpur'),
(479, 29, 'Karauli'),
(480, 29, 'Kota'),
(481, 29, 'Nagaur'),
(482, 29, 'Pali'),
(483, 29, 'Pratapgarh'),
(484, 29, 'Rajsamand'),
(485, 29, 'Sawai Madhopur'),
(486, 29, 'Sikar'),
(487, 29, 'Sirohi'),
(488, 29, 'Tonk'),
(489, 29, 'Udaipur'),
(490, 30, 'East District'),
(491, 30, 'North District'),
(492, 30, 'South District'),
(493, 30, 'West District'),
(494, 31, 'Ariyalur'),
(495, 31, 'Chennai'),
(496, 31, 'Coimbatore'),
(497, 31, 'Cuddalore'),
(498, 31, 'Dharmapuri'),
(499, 31, 'Dindigul'),
(500, 31, 'Erode'),
(501, 31, 'Kanchipuram'),
(502, 31, 'Kanniyakumari'),
(503, 31, 'Karur'),
(504, 31, 'Krishnagiri'),
(505, 31, 'Madurai'),
(506, 31, 'Nagapattinam'),
(507, 31, 'Namakkal'),
(508, 31, 'Perambalur'),
(509, 31, 'Pudukkottai'),
(510, 31, 'Ramanathapuram'),
(511, 31, 'Salem'),
(512, 31, 'Sivaganga'),
(513, 31, 'Thanjavur'),
(514, 31, 'The Nilgiris'),
(515, 31, 'Theni'),
(516, 31, 'Thiruvallur'),
(517, 31, 'Thiruvarur'),
(518, 31, 'Tiruchirappalli'),
(519, 31, 'Tirunelveli'),
(520, 31, 'Tiruppur'),
(521, 31, 'Tiruvannamalai'),
(522, 31, 'Tuticorin'),
(523, 31, 'Vellore'),
(524, 31, 'Villupuram'),
(525, 31, 'Virudhunagar'),
(526, 32, 'Dhalai'),
(527, 32, 'North Tripura'),
(528, 32, 'South Tripura'),
(529, 32, 'West Tripura'),
(530, 33, 'Agra'),
(531, 33, 'Aligarh'),
(532, 33, 'Allahabad'),
(533, 33, 'Ambedkar Nagar'),
(534, 33, 'Auraiya'),
(535, 33, 'Azamgarh'),
(536, 33, 'Baghpat'),
(537, 33, 'Bahraich'),
(538, 33, 'Ballia'),
(539, 33, 'Balrampur'),
(540, 33, 'Banda'),
(541, 33, 'Barabanki'),
(542, 33, 'Bareilly'),
(543, 33, 'Basti'),
(544, 33, 'Bijnor'),
(545, 33, 'Budaun'),
(546, 33, 'Bulandshahr'),
(547, 33, 'Chandauli'),
(548, 33, 'Chitrakoot'),
(549, 33, 'Deoria'),
(550, 33, 'Etah'),
(551, 33, 'Etawah'),
(552, 33, 'Faizabad'),
(553, 33, 'Farrukhabad'),
(554, 33, 'Fatehpur'),
(555, 33, 'Firozabad'),
(556, 33, 'Gautam Buddha Nagar'),
(557, 33, 'Ghaziabad'),
(558, 33, 'Ghazipur'),
(559, 33, 'Gonda'),
(560, 33, 'Gorakhpur'),
(561, 33, 'Hamirpur District'),
(562, 33, 'Hardoi'),
(563, 33, 'Jalaun'),
(564, 33, 'Jaunpur'),
(565, 33, 'Jhansi'),
(566, 33, 'Jyotiba Phule Nagar'),
(567, 33, 'Kannauj'),
(568, 33, 'Kanpur Dehat'),
(569, 33, 'Kanpur Nagar'),
(570, 33, 'Kanshiram Nagar'),
(571, 33, 'Kaushambi'),
(572, 33, 'Kheri'),
(573, 33, 'Kushi Nagar'),
(574, 33, 'Lalitpur'),
(575, 33, 'Lucknow'),
(576, 33, 'Mahamaya Nagar'),
(577, 33, 'Maharajganj'),
(578, 33, 'Mahoba'),
(579, 33, 'Mainpuri'),
(580, 33, 'Mathura'),
(581, 33, 'Mau'),
(582, 33, 'Meerut'),
(583, 33, 'Mirzapur'),
(584, 33, 'Moradabad'),
(585, 33, 'Muzaffarnagar'),
(586, 33, 'Pilibhit'),
(587, 33, 'Pratapgarh District'),
(588, 33, 'Rae Bareli'),
(589, 33, 'Rampur'),
(590, 33, 'Saharanpur'),
(591, 33, 'Sant Kabeer Nagar'),
(592, 33, 'Sant Ravidas Nagar'),
(593, 33, 'Shahjahanpur'),
(594, 33, 'Shravasti'),
(595, 33, 'Siddharth Nagar'),
(596, 33, 'Sitapur'),
(597, 33, 'Sonbhadra'),
(598, 33, 'Sultanpur'),
(599, 33, 'Unnao'),
(600, 33, 'Varanasi'),
(601, 34, 'Almora'),
(602, 34, 'Bageshwar'),
(603, 34, 'Chamoli'),
(604, 34, 'Champawat'),
(605, 34, 'Dehradun'),
(606, 34, 'Haridwar'),
(607, 34, 'Nainital'),
(608, 34, 'Pauri Garhwal'),
(609, 34, 'Pithoragarh'),
(610, 34, 'Rudra Prayag'),
(611, 34, 'Tehri Garhwal'),
(612, 34, 'Udam Singh Nagar'),
(613, 34, 'Uttar Kashi'),
(614, 35, '24 Paraganas North'),
(615, 35, '24 Paraganas South'),
(616, 35, 'Bankura'),
(617, 35, 'Bardhaman'),
(618, 35, 'Birbhum'),
(619, 35, 'Coochbehar'),
(620, 35, 'Darjeeling'),
(621, 35, 'Dinajpur Dakshin'),
(622, 35, 'Dinajpur Uttar'),
(623, 35, 'Hooghly'),
(624, 35, 'Howrah'),
(625, 35, 'Jalpaiguri'),
(626, 35, 'Kolkata'),
(627, 35, 'Maldah'),
(628, 35, 'Medinipur East'),
(629, 35, 'Medinipur West'),
(630, 35, 'Murshidabad'),
(631, 35, 'Nadia'),
(632, 35, 'Purulia');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_request`
--

CREATE TABLE IF NOT EXISTS `contact_us_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text,
  `admin_reply` text,
  `is_replied` enum('YES','NO') DEFAULT 'NO',
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contact_us_request`
--

INSERT INTO `contact_us_request` (`id`, `name`, `email`, `contact_no`, `subject`, `message`, `admin_reply`, `is_replied`, `created_on`) VALUES
(1, 'Nisha Jangir', 'jangir.nishu@gmail.com', '899656566565', 'How To Purchase The Product', 'This is a mesage', NULL, NULL, '2016-05-16 19:12:51'),
(2, 'Manish Jangir', 'mjangir70@gmail.com', '9602954262', 'How To Purchase A Project', 'Hi how to purchase a project', NULL, NULL, '2016-05-16 19:19:06'),
(3, 'Nisha Jangir', 'jangir.nishu@gmail.com', '6565655655', 'How to project', 'Thsi is a proejrefszd', NULL, NULL, '2016-05-16 19:22:03'),
(4, 'Nisha Jangir', 'jangir.nishu@gmail.com', '9602954262', 'Complete Your BlueApp Account', 'sddsfdsafas', NULL, NULL, '2016-05-16 19:28:26'),
(5, 'Rahul Sinha', 'mjangir70@gmail.com', '9602954262', 'I want to buy your product', 'Hi I want to buy your product what is the procedure??', NULL, NULL, '2016-05-18 03:19:07'),
(6, 'Manish jangir', 'mjangir70@gmail.com', '9602954262', 'Complete Your BlueApp Account', 'iuuiiuu', NULL, NULL, '2016-05-18 04:23:28'),
(7, 'Manish Jangir', 'mjangir70@gmail.com', '9602954286', 'I want to buy your project', 'Hello admin, I want to buy your project now. What is the procedure?', NULL, NULL, '2016-05-18 04:49:04'),
(8, 'Manish jangir', 'mjangir70@gmail.com', '9602954262', 'What is the procedure to purchase smart cms', 'What is the procedure to purchase smart cms?', NULL, NULL, '2016-05-18 04:55:06'),
(9, 'Manish jangir', 'mjangir70@gmail.com', '9602954262', 'How to purchase Smart CMS', 'Hello Admin, I want to know that how to purchase Smart CMS online?', NULL, NULL, '2016-05-18 04:58:44'),
(10, 'Manish jangir', 'mjangir70@gmail.com', '9602954262', 'Procedure to purchase smart cms', 'Hello Admin What is the process of purchasing smart cms online?', NULL, NULL, '2016-05-18 05:09:12'),
(11, 'Manish jangir', 'mjangir70@gmail.com', '9602954262', 'Your product is so good', 'Hello Sir, Your project is too good to use.', NULL, NULL, '2016-05-18 05:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) DEFAULT NULL,
  `country_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`, `country_code`) VALUES
(1, 'India', 'IN'),
(2, 'USA', 'US'),
(3, 'Pakisatan', 'PK'),
(4, 'Australia', 'AU');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(200) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `alias` varchar(100) NOT NULL,
  `tags` text,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `template_name`, `subject`, `content`, `alias`, `tags`, `created_on`, `updated_on`, `is_active`) VALUES
(1, 'Email Confirmation On Sign Up', 'Complete Your Smart CMS Account', '<p>Hello [NAME],</p><p>Thank you for registering on Smart CMS. To complete your registration click on the following link:</p><p>[CONFIRMATION_LINK]</p>', 'signup_confirm', NULL, '2016-05-16 16:29:44', '2016-05-18 05:02:46', 1),
(2, 'Email On Successful Sign Up', 'Thanks For Registering On MyVector', '<p>Hello [NAME],</p><p>Thank you for registering on Smart CMS. Login into the system using the following credentials:</p><p><b>Email: [EMAIL]</b></p><p><b>Password: [PASSWORD]</b></p>', 'signup_success', NULL, '2016-05-16 16:33:03', NULL, 1),
(3, 'When  User Registers With Social Website Like Facebook Or Gmail', 'Thanks For Registering On Smart CMS', '<p>Hello&nbsp;[NAME],</p><p>You recently logged into Smart CMS using [PROVIDER]. To continue access the portal without using [PROVIDER], use the following credentials:</p><p><b>Login Email:&nbsp;[EMAIL]</b></p><p><b>Password:&nbsp;[PASSWORD]</b></p>', 'signup_through_social_media', NULL, '2016-05-16 16:37:38', NULL, 1),
(4, 'Send Password Reset Link On Registered Email', 'Recover Your Password', '<p>Hello&nbsp;[NAME],</p><p>Please click on the following link to recover your Smart CMS account.</p><p>[PASSWORD_RESET_LINK]<br></p>', 'forgot_password', NULL, '2016-05-16 16:44:06', NULL, 1),
(5, 'When A Contact Request Reaches To Admin', 'A Person Tried To Contact You On Smart CMS', '<p>Hello Admin,</p><p>A person with the following details tried to contact you on Smart CMS portal:</p><p><b>Full Name:</b>&nbsp;[NAME]</p><p><b>Email:</b>&nbsp;[EMAIL]</p><p><b>Phone:</b>&nbsp;[PHONE]</p><p><b>Message:</b></p><p>[MESSAGE]</p>', 'contact_us_admin_copy', NULL, '2016-05-16 19:06:51', NULL, 1),
(6, 'Contact Us Auto Reply Mail', 'Thank You  For Contacting On Smart CMS', '<p>Hello [NAME],</p><p>Thank you for showing your interest in Smart CMS. You tried to contact us on Smart CMS demo page.</p>', 'contact_us_auto_reply', NULL, '2016-05-16 19:27:55', '2016-05-16 19:29:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_category_id` int(11) NOT NULL,
  `parent_id` int(3) NOT NULL,
  `link_order` int(3) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `target` varchar(50) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `route_params` varchar(255) DEFAULT NULL,
  `actions` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_category_id` (`link_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `link_category_id`, `parent_id`, `link_order`, `name`, `alias`, `icon`, `href`, `target`, `route`, `route_params`, `actions`, `status`, `created_on`, `updated_on`) VALUES
(1, 4, 0, 1, 'Dashboard', 'admin_dashboard', 'fa fa-dashboard', 'admin/dashboard', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2015-10-13 11:30:49', '2016-05-17 13:37:55'),
(2, 4, 0, 2, 'Manage Settings', 'admin_setting', 'fa fa-gear', 'admin/setting', NULL, NULL, NULL, '{"GENERAL_SETTINGS":"General Settings","HOMEPAGE_SETTINGS":"Home Page Settings","CONTACT_SETTINGS":"Contact Settings","ADDITIONAL_SETTINGS":"Additional Settings","APPLICATION_MESSAGES":"Application Messages"}', 'ACTIVE', '2015-10-13 11:31:16', '2016-05-17 07:21:38'),
(3, 4, 0, 7, 'Manage Users', 'admin_manage_users', 'fa fa-user', '#', NULL, NULL, NULL, '', 'ACTIVE', '2015-10-13 11:31:51', '2015-10-13 11:31:51'),
(4, 4, 3, NULL, 'System Users', 'admin_manage_users_user_list', '', 'admin/users', NULL, NULL, NULL, '{"LISTING":"View Users List","ADD":"Add User","UPDATE":"Update User","DELETE":"Delete User","VIEW":"View User Info","STATUS":"Block\\/Unblock User"}', 'ACTIVE', '2015-10-13 11:34:01', '2015-11-24 03:51:25'),
(5, 4, 3, NULL, 'User Groups', 'admin_manage_users_group_list', '', 'admin/user-groups', NULL, NULL, NULL, '{"LISTING":"View User Groups List","ADD":"Add User Group","UPDATE":"Update User Group","DELETE":"Delete User Group","VIEW":"View User Group","UPDATE_PERMISSIONS":"Update User Group Permissions"}', 'ACTIVE', '2015-10-13 11:36:41', '2015-10-13 11:36:41'),
(6, 4, 0, 3, 'Manage Email Templates', 'admin_manage_email_templates', 'fa fa-envelope', 'admin/email-templates', NULL, NULL, NULL, '{"LISTING":"View Email Templates List","ADD":"Add Template","UPDATE":"Update Template","DELETE":"Delete Template"}', 'ACTIVE', '2015-10-13 11:50:26', '2016-05-16 15:50:56'),
(7, 4, 0, 4, 'Manage System Links', 'admin_manage_system_links', 'fa fa-tag', '#', NULL, NULL, NULL, '', 'ACTIVE', '2015-10-13 11:51:46', '2015-10-13 11:51:46'),
(8, 4, 7, NULL, 'Link List', 'admin_manage_system_links_list', '', 'admin/links', NULL, NULL, NULL, '{"LISTING":"View Links List","ADD":"Add New Link","UPDATE":"Update Link","DELETE":"Delete Link","VIEW":"View Link","STATUS":"Block/Unblock Link"}', 'ACTIVE', '2015-10-13 11:52:49', '2016-05-17 04:44:42'),
(9, 4, 7, NULL, 'Link Categories', 'admin_manage_system_links_categories', '', 'admin/links/categories', NULL, NULL, NULL, '{"LISTING":"View Link Categories List"}', 'ACTIVE', '2015-10-13 11:53:33', '2015-10-13 11:53:33'),
(16, 4, 0, 6, 'Manage CMS', 'admin_manage_cms', 'fa fa-th', '#', NULL, NULL, NULL, '', 'ACTIVE', '2015-11-01 09:11:52', '2015-11-11 11:40:09'),
(17, 4, 16, NULL, 'Manage Pages', 'admin_manage_pages', '', 'admin/cms/pages', NULL, NULL, NULL, '{"LISTING":"View Pages List","ADD":"Add New Page","UPDATE":"Update Page","DELETE":"Delete Page","STATUS":"Status"}', 'ACTIVE', '2015-11-01 09:13:03', '2015-11-01 10:10:35'),
(18, 1, 0, NULL, 'Home', 'frontend_home', '', '/', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:33:54', '2016-05-17 06:33:54'),
(19, 1, 0, NULL, 'Privacy Policy', 'frontend_privacy_policy', '', 'page/privacy-policy', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:34:49', '2016-05-17 06:34:49'),
(20, 1, 0, NULL, 'Advertise With Us', 'frontend_advertise_with_us', '', 'page/advertise-with-us', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:35:34', '2016-05-17 06:35:34'),
(21, 1, 0, NULL, 'Terms And Conditions', 'frontend_terms_conditions', '', 'page/terms-conditions', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:36:15', '2016-05-17 06:36:15'),
(22, 1, 0, NULL, 'About Us', 'frontend_about_us', '', 'page/about', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:37:06', '2016-05-17 06:37:06'),
(23, 1, 0, NULL, 'Contact Us', 'frontend_contact_us', '', 'page/contact', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:37:39', '2016-05-17 06:37:39'),
(24, 2, 0, NULL, 'Developer Console', 'frontend_developer_console', '', '#', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:40:16', '2016-05-17 06:40:16'),
(25, 2, 0, NULL, 'Disclaimer', 'frontend_footer_disclaimer', '', '#', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:40:45', '2016-05-17 06:40:45'),
(26, 2, 0, NULL, 'Our Goals', 'frontend_footer_our_goals', '', '#', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:41:11', '2016-05-17 06:41:11'),
(27, 2, 0, NULL, 'Login', 'frontend_footer_login', '', 'auth/login', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:41:40', '2016-05-17 06:41:40'),
(28, 3, 0, NULL, 'My Account Link 1', 'frontend_my_account_link1', 'fa fa-dashboard', '#', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:51:44', '2016-05-17 06:51:44'),
(29, 3, 0, NULL, 'My Account Link 2', 'frontend_my_account_link2', 'fa fa-user', '#', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:52:24', '2016-05-17 06:52:24'),
(30, 3, 0, NULL, 'My Account Link 3', 'frontend_my_account_link3', 'fa fa-gear', '#', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:53:24', '2016-05-17 06:53:24'),
(31, 3, 0, NULL, 'My Account Link 4', 'frontend_my_account_link4', 'fa fa-phone', '#', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 06:54:04', '2016-05-17 06:54:04'),
(32, 3, 0, NULL, 'Logout', 'frontend_sidebar_logout', 'fa fa-lock', 'auth/logout', NULL, NULL, NULL, '{"ALL":"All Rights"}', 'ACTIVE', '2016-05-17 07:00:14', '2016-05-17 07:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `link_category`
--

CREATE TABLE IF NOT EXISTS `link_category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `role_id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `link_category`
--

INSERT INTO `link_category` (`id`, `role_id`, `name`, `alias`) VALUES
(1, 1, 'Frontend Main Navigation Links', 'frontend_main_navigation_links'),
(2, 1, 'Frontend Footer Links', 'frontend_footer_links'),
(3, 1, 'Frontend Logged User Sidebar Links', 'frontend_logged_user_sidebar_links'),
(4, 2, 'Backend Sidebar Links', 'backend_sidebar_links');

-- --------------------------------------------------------

--
-- Table structure for table `link_permission`
--

CREATE TABLE IF NOT EXISTS `link_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(3) NOT NULL,
  `link_id` int(3) NOT NULL,
  `permissions` text NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`,`link_id`),
  KEY `link_id` (`link_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1484 ;

--
-- Dumping data for table `link_permission`
--

INSERT INTO `link_permission` (`id`, `group_id`, `link_id`, `permissions`, `created_on`) VALUES
(1387, 3, 1, '["ALL"]', '2016-05-18 03:29:21'),
(1388, 3, 6, '["LISTING","ADD","UPDATE","DELETE"]', '2016-05-18 03:29:21'),
(1389, 3, 16, '["ALL"]', '2016-05-18 03:29:21'),
(1390, 3, 17, '["ALL","ADD","UPDATE","DELETE","STATUS"]', '2016-05-18 03:29:21'),
(1428, 1, 18, '["ALL"]', '2016-05-18 05:20:47'),
(1429, 1, 20, '["ALL"]', '2016-05-18 05:20:47'),
(1430, 1, 22, '["ALL"]', '2016-05-18 05:20:47'),
(1431, 1, 23, '["ALL"]', '2016-05-18 05:20:47'),
(1432, 1, 24, '["ALL"]', '2016-05-18 05:20:47'),
(1433, 1, 25, '["ALL"]', '2016-05-18 05:20:47'),
(1434, 1, 26, '["ALL"]', '2016-05-18 05:20:47'),
(1435, 1, 28, '["ALL"]', '2016-05-18 05:20:47'),
(1436, 1, 29, '["ALL"]', '2016-05-18 05:20:47'),
(1437, 1, 30, '["ALL"]', '2016-05-18 05:20:47'),
(1438, 1, 31, '["ALL"]', '2016-05-18 05:20:47'),
(1439, 1, 32, '["ALL"]', '2016-05-18 05:20:47'),
(1473, 2, 1, '["ALL"]', '2016-05-18 05:21:50'),
(1474, 2, 2, '["GENERAL_SETTINGS","HOMEPAGE_SETTINGS","CONTACT_SETTINGS","ADDITIONAL_SETTINGS","APPLICATION_MESSAGES"]', '2016-05-18 05:21:50'),
(1475, 2, 6, '["LISTING","ADD","UPDATE","DELETE"]', '2016-05-18 05:21:50'),
(1476, 2, 7, '["ALL"]', '2016-05-18 05:21:50'),
(1477, 2, 8, '["ALL","LISTING","ADD","UPDATE","DELETE","VIEW","STATUS"]', '2016-05-18 05:21:50'),
(1478, 2, 9, '["ALL","LISTING"]', '2016-05-18 05:21:50'),
(1479, 2, 16, '["ALL"]', '2016-05-18 05:21:50'),
(1480, 2, 17, '["ALL","LISTING","ADD","UPDATE","DELETE","STATUS"]', '2016-05-18 05:21:50'),
(1481, 2, 3, '["ALL"]', '2016-05-18 05:21:50'),
(1482, 2, 4, '["ALL","LISTING","ADD","UPDATE","DELETE","VIEW","STATUS"]', '2016-05-18 05:21:50'),
(1483, 2, 5, '["ALL","LISTING","ADD","UPDATE","DELETE","VIEW","UPDATE_PERMISSIONS"]', '2016-05-18 05:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `content` text,
  `page_order` int(3) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `alias`, `name`, `title`, `meta_keywords`, `meta_description`, `content`, `page_order`, `created_on`, `updated_on`, `created_by`, `updated_by`, `status`) VALUES
(1, 'about', 'About Us', 'About Smart CMS', 'about,smartcms', 'This is the about use page of smart cms', '<p>Smart CMS is a full featured CMS portal written in PHP Codegniter to quickly get started with a new PHP project. The CMS has following features:</p><h4>Frontend Features:</h4><p></p><ol><li>User Registration (Send confirmation email if enabled from admin panel)</li><li>User Login</li><li>Forgot Password</li><li>Login Using Facebook (If enabled from admin panel)</li><li>Login Using Google\n\n (If enabled from admin panel)\n\n</li><li>\n\nLogin Using Twitter &nbsp;(If enabled from admin panel)\n\n<br></li><li>\n\nLogin Using Linkedin &nbsp;(If enabled from admin panel)\n\n<br></li><li>User Dashboard After Login</li><li>Update User Profile</li><li>Change User Password</li></ol><h4>Backend Features:<br></h4><p></p><ol><li>Both Admin and Guest will login from the same login page. If user role is Admin, A "Go To Admin" link will be shown in the upper right corner of the page.<br></li><li>Admin dashboard to see the statistics. (Currently the page is blank and working on it)</li><li>Manage Settings: Admin can manage various CMS settings like home page meta tags, website contact information, notification messages, login settings for e.g. (Send sign up mail, enable social media login)</li><li>Manage Email Template: Admin can change email templates texts and styles.</li><li>Manage System Links: Sidebar links text can be changed through this page.</li><li>Manage CMS:<ol><li>Manage Pages: You can add or update website frontend pages. This page is also added from backend.</li><li>Manage News: You can add or update portal news here.</li></ol></li><li>Manage Users:<ol><li>User Groups: You can add many user groups to the respected user role. Currently there are two roles in the system. Admin and Guest. You can create multiple system admins and assign a particular user group. Each user group can have different user permissions. Permissions can be changed by clicking on the lock icon in listing.</li><li>System Users: Admin can add, update, block/unblock, delete system users here.</li></ol></li></ol><p></p><p></p>', 1, '0000-00-00 00:00:00', '2016-05-18 03:27:00', 0, 1, 'ACTIVE'),
(2, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', NULL, NULL, 'Privacy Policy Content', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 'ACTIVE'),
(3, 'terms-conditions', 'Terms & Conditions', 'Terms &amp; Conditions', NULL, NULL, 'Terms &amp; Conditions Content', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 'ACTIVE'),
(4, 'advertise-with-us', 'Advertise With Us', 'Advertise With Us', NULL, NULL, 'Advertise With Us Content', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETED') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Guest', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 'ACTIVE'),
(2, 'Admin', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `key` varchar(150) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `key`, `value`, `created_on`, `updated_on`) VALUES
(13, NULL, 'enable_signup_email_confirmation', '1', '0000-00-00 00:00:00', NULL),
(14, NULL, 'send_signup_success_email', '1', '0000-00-00 00:00:00', NULL),
(15, NULL, 'signup_confirm_message', 'Thanks! A confirmation email has been sent to your email ID. Follow that link to complete your registration.', '0000-00-00 00:00:00', NULL),
(16, NULL, 'signup_success_message', 'Congratulations! You have successfully registered on Smart CMS', '0000-00-00 00:00:00', NULL),
(17, NULL, 'signup_failed_message', 'Oops! Sign Up got failed due to some errors. Please try later.', '0000-00-00 00:00:00', NULL),
(18, NULL, 'send_password_reset_link_success_message', 'A password reset link has been sent to your email ID. Follow that link to reset your password.', '0000-00-00 00:00:00', NULL),
(19, NULL, 'invalid_login_message', 'Invalid email or password!', '0000-00-00 00:00:00', NULL),
(20, NULL, 'send_password_reset_link_failed_message', 'Sorry! but the password reset link could be sent due to some internal system error.', '0000-00-00 00:00:00', NULL),
(21, NULL, 'confirm_email_failed_message', 'Sorry but the link you are trying to complete your registration is expired or malformed.', '0000-00-00 00:00:00', NULL),
(22, NULL, 'password_reset_success_message', 'You have successfully reset your password.', '0000-00-00 00:00:00', NULL),
(23, NULL, 'password_reset_failed_message', 'Password could not be reset due to some internal system error.', '0000-00-00 00:00:00', NULL),
(24, NULL, 'application_name', 'Smart CMS', '0000-00-00 00:00:00', NULL),
(25, NULL, 'homepage_meta_title', 'Welcome to smart cms', '0000-00-00 00:00:00', NULL),
(26, NULL, 'homepage_meta_description', 'This is smart cms', '0000-00-00 00:00:00', NULL),
(27, NULL, 'homepage_meta_keywords', 'smart,cms', '0000-00-00 00:00:00', NULL),
(28, NULL, 'contact_person', 'Manish Jangir', '0000-00-00 00:00:00', NULL),
(29, NULL, 'contact_email', 'mjangir70@gmail.com', '0000-00-00 00:00:00', NULL),
(30, NULL, 'contact_number', '+919602954262', '0000-00-00 00:00:00', NULL),
(31, NULL, 'fax_number', '+919602954256', '0000-00-00 00:00:00', NULL),
(32, NULL, 'contact_address', 'Godrej Garden City, Ahemdabad', '0000-00-00 00:00:00', NULL),
(33, NULL, 'application_website', 'www.smartcms.com', '0000-00-00 00:00:00', NULL),
(34, NULL, 'facebook_login_enabled', '0', '0000-00-00 00:00:00', NULL),
(35, NULL, 'google_login_enabled', '1', '0000-00-00 00:00:00', NULL),
(36, NULL, 'twitter_login_enabled', '0', '0000-00-00 00:00:00', NULL),
(37, NULL, 'linkedin_login_enabled', '1', '0000-00-00 00:00:00', NULL),
(39, NULL, 'admin_copyright_text', 'Copyright Â© Smart CMS 2016', '0000-00-00 00:00:00', NULL),
(40, NULL, 'frontend_copyright_text', 'Copyright Smart CMS 2016. All Rights Reserved', '0000-00-00 00:00:00', NULL),
(41, NULL, 'enable_contact_us_auto_reply', '1', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_login`
--

CREATE TABLE IF NOT EXISTS `social_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `social_type` enum('FACEBOOK','GOOGLE','TWITTER','YAHOO','LINKEDIN') NOT NULL,
  `social_id` varchar(255) NOT NULL,
  `profile_url` varchar(255) DEFAULT NULL,
  `access_token` text NOT NULL,
  `access_token_secret` text,
  `refresh_token` text,
  `access_token_expires_in` int(10) DEFAULT NULL,
  `access_token_expires_at` timestamp NULL DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `social_login`
--

INSERT INTO `social_login` (`id`, `user_id`, `social_type`, `social_id`, `profile_url`, `access_token`, `access_token_secret`, `refresh_token`, `access_token_expires_in`, `access_token_expires_at`, `created_on`, `updated_on`) VALUES
(5, 33, 'LINKEDIN', '3Ycvp9y0rI', 'https://www.linkedin.com/in/mjangir70', 'f4915717-51e9-4666-be9a-694379b38a0d', '69a9d750-acdb-48c0-81da-b4891c06fe5e', NULL, NULL, '0000-00-00 00:00:00', '2016-05-16 08:44:31', '2016-05-16 16:22:37'),
(7, 8, 'GOOGLE', '100908144554235348242', 'https://profiles.google.com/100908144554235348242', 'ya29.CjHlAgfKohgwAIPdzu-6Wb895uvjF0lRFAK-rhmIWpLwi71N7XXhxAWefe8_E7itsKUu', NULL, '1/Z3GShRVrGhkE_ab7UrV-CKEftj9sCBCdXhRZK843DaoMEudVrK5jSpoR30zcRFq6', 3600, '0000-00-00 00:00:00', '2016-05-17 12:51:20', NULL),
(8, 9, 'GOOGLE', '105298651720003444317', 'https://profiles.google.com/105298651720003444317', 'ya29.CjHlAmj7MpBN2xRfnjz1KBF5rzHAfYMnnwA1qjQCMCu2wffQbtAaRhnEwgihNCiJa8I1', NULL, '1/qeQdpJpGJes25G7oP8w9aQ72H5zjginZBd-bQt7LeF4', 3600, '0000-00-00 00:00:00', '2016-05-17 13:05:16', NULL),
(10, 12, 'GOOGLE', '113856233570363304960', 'https://profiles.google.com/113856233570363304960', 'ya29.CjHmApYm4PqQG2-YVeWH-X3k7eiwUXtbT5piwnykeeo94VnPnA3WYTpt15GO_mmFQHXQ', NULL, '1/WfUdlZCnMkzJ7IerwfuVfKteUoLeZIjsPAiAxlpaqpkMEudVrK5jSpoR30zcRFq6', 3600, '0000-00-00 00:00:00', '2016-05-18 05:13:24', NULL),
(11, 12, 'LINKEDIN', 'LyCsycon2v', 'https://www.linkedin.com/in/mjangir70', 'e5132dec-84aa-47ac-8ab9-50cc0b3524aa', 'e5031098-47ff-4658-8723-f8e941fbfebf', NULL, NULL, '0000-00-00 00:00:00', '2016-05-18 05:13:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(5) DEFAULT NULL,
  `state_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state_name`) VALUES
(1, 1, 'Andaman & Nicobar Islands'),
(2, 1, 'Andhra Pradesh'),
(3, 1, 'Arunachal Pradesh'),
(4, 1, 'Assam'),
(5, 1, 'Bihar'),
(6, 1, 'Chandigarh'),
(7, 1, 'Chattisgarh'),
(8, 1, 'Dadra & Nagar Haveli'),
(9, 1, 'Daman & Diu'),
(10, 1, 'Delhi'),
(11, 1, 'Goa'),
(12, 1, 'Gujarat'),
(13, 1, 'Haryana'),
(14, 1, 'Himachal Pradesh'),
(15, 1, 'Jammu & Kashmir'),
(16, 1, 'Jharkhand'),
(17, 1, 'Karnataka'),
(18, 1, 'Kerala'),
(19, 1, 'Lakshadweep'),
(20, 1, 'Madhya Pradesh'),
(21, 1, 'Maharashtra'),
(22, 1, 'Manipur'),
(23, 1, 'Meghalaya'),
(24, 1, 'Mizoram'),
(25, 1, 'Nagaland'),
(26, 1, 'Odisha'),
(27, 1, 'Pondicherry'),
(28, 1, 'Punjab'),
(29, 1, 'Rajasthan'),
(30, 1, 'Sikkim'),
(31, 1, 'Tamil Nadu'),
(32, 1, 'Tripura'),
(33, 1, 'Uttar Pradesh'),
(34, 1, 'Uttarakhand'),
(35, 1, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `forgot_pwd_salt` varchar(100) DEFAULT NULL,
  `user_group_id` int(5) DEFAULT NULL,
  `role_id` int(3) NOT NULL,
  `country_id` int(5) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETED') DEFAULT 'ACTIVE' COMMENT '-1 is for delete, 0 for inactive, 1 for active. by default inactive',
  PRIMARY KEY (`id`),
  KEY `FK_users_group_id` (`user_group_id`),
  KEY `country_id` (`country_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `middle_name`, `last_name`, `gender`, `birth_date`, `blood_group`, `phone`, `photo`, `email`, `password`, `salt`, `forgot_pwd_salt`, `user_group_id`, `role_id`, `country_id`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@smartcms.com', '40e5c30020ee081dca59789914ff1a2d', NULL, NULL, 2, 2, NULL, '2016-05-16 20:30:42', NULL, NULL, NULL, 'ACTIVE'),
(2, NULL, 'Nisha', NULL, 'Jangir', NULL, NULL, NULL, NULL, NULL, 'jangir.nishu@gmail.com', 'e812dfba473b806b54c28b52433c8146', NULL, NULL, 1, 1, NULL, '2016-05-16 18:18:40', NULL, NULL, NULL, 'ACTIVE'),
(3, NULL, 'Normal', NULL, 'Admin', NULL, NULL, NULL, '', NULL, 'normaladmin@smartcms.com', '40e5c30020ee081dca59789914ff1a2d', NULL, NULL, 3, 2, NULL, '2016-05-16 18:31:30', 1, NULL, NULL, 'ACTIVE'),
(4, NULL, 'Vikash', NULL, 'Jangir', NULL, NULL, NULL, '9602954256', NULL, 'vikashjangir@gmail.com', '40e5c30020ee081dca59789914ff1a2d', NULL, NULL, 1, 1, NULL, '2016-05-16 19:34:19', 1, NULL, NULL, 'ACTIVE'),
(5, NULL, 'Amit', NULL, 'Pandey', NULL, NULL, NULL, '6545454565', NULL, 'amitpandey@gmail.com', '40e5c30020ee081dca59789914ff1a2d', NULL, NULL, 1, 1, NULL, '2016-05-16 19:34:56', 1, NULL, NULL, 'ACTIVE'),
(6, NULL, 'Normal', NULL, 'User', 'MALE', '2016-05-21', NULL, '235689775', NULL, 'normaluser@smartcms.com', '40e5c30020ee081dca59789914ff1a2d', NULL, NULL, 1, 1, 1, '2016-05-16 19:35:34', 1, NULL, NULL, 'ACTIVE'),
(8, NULL, 'Saket', NULL, 'Jangir', 'MALE', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'saketjangir1223@gmail.com', '1e214678c54e0a361d83a39186ab0026', NULL, NULL, 1, 1, NULL, '2016-05-17 12:51:20', NULL, NULL, NULL, 'ACTIVE'),
(9, NULL, 'Amit', NULL, 'Pandey', NULL, NULL, NULL, NULL, 'https://lh6.googleusercontent.com/-mtHxUx3LSl8/AAAAAAAAAAI/AAAAAAAAACI/1bohmuj1LMk/photo.jpg', 'amit.pandey@indianic.com', 'd756c3188f21cead7bab397a3f0c7727', NULL, NULL, 1, 1, NULL, '2016-05-17 13:05:16', NULL, NULL, NULL, 'ACTIVE'),
(12, NULL, 'Manish', NULL, 'Jangir', 'MALE', NULL, NULL, NULL, 'https://media.licdn.com/mpr/mprx/0_eMnW9E56aCjvuyYxoO6s9HcWGTfLu00xEjC99HNqjFRzPUH0XxQ5ZehV2u7Vf4OPWsNBJ7EEBA1h', 'mjangir70@gmail.com', '4d0fab4b8c3d33773c700d67ed2435ad', NULL, NULL, 1, 1, NULL, '2016-05-18 05:13:24', NULL, NULL, NULL, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `role_id` int(5) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text,
  `created_on` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETED') DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `FK_user_groups_role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `role_id`, `group_name`, `alias`, `description`, `created_on`, `created_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 1, 'Default Guest Group', 'default_guest_group', 'Default Guest Group', '2016-05-16 20:28:07', NULL, NULL, NULL, 'ACTIVE'),
(2, 2, 'Default Admin Group', 'default_admin_group', 'Default Admin Group', '2016-05-16 20:28:34', NULL, NULL, NULL, 'ACTIVE'),
(3, 2, 'Normal Admin', 'normal_admin', 'Admins in this group will have access only to Email Templates and Manage CMS', '2016-05-16 18:29:53', NULL, NULL, NULL, 'ACTIVE');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_fk_link_category_id` FOREIGN KEY (`link_category_id`) REFERENCES `link_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `link_category`
--
ALTER TABLE `link_category`
  ADD CONSTRAINT `fk_link_category_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `link_permission`
--
ALTER TABLE `link_permission`
  ADD CONSTRAINT `fk_link_permission_group_id` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`id`),
  ADD CONSTRAINT `fk_link_permission_link_id` FOREIGN KEY (`link_id`) REFERENCES `link` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_login`
--
ALTER TABLE `social_login`
  ADD CONSTRAINT `social_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
SET FOREIGN_KEY_CHECKS = 1;