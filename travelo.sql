-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: פברואר 17, 2019 בזמן 02:24 PM
-- גרסת שרת: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelo`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `airlines`
--

CREATE TABLE `airlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `picFileName` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `picFileName`) VALUES
(1, 'Turkish Airline', 'turkish.png'),
(2, 'PEGASUS', 'PEGASUS.jpg\r\n');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `carrentalcompany`
--

CREATE TABLE `carrentalcompany` (
  `name` varchar(30) NOT NULL,
  `picFileName` varchar(100) NOT NULL,
  `phone` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `carrentalcompany`
--

INSERT INTO `carrentalcompany` (`name`, `picFileName`, `phone`) VALUES
(' Alamo ', 'Alamo.jpg ', '1700-1700-221'),
(' Hertz ', 'Hertz.png', '04-6500111'),
(' SIXT ', 'sixt.png', '1700-339203'),
('Avis', 'avis.jpg', '04-6011493');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `cars`
--

CREATE TABLE `cars` (
  `serial` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(30) NOT NULL,
  `car` varchar(30) NOT NULL,
  `pickUpCity` varchar(30) NOT NULL,
  `seats` int(11) NOT NULL,
  `automatic` varchar(20) NOT NULL,
  `basePrice` int(11) NOT NULL,
  `adultPrice` int(11) NOT NULL,
  `discription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `cars`
--

INSERT INTO `cars` (`serial`, `company`, `car`, `pickUpCity`, `seats`, `automatic`, `basePrice`, `adultPrice`, `discription`) VALUES
(1, ' SIXT ', ' Opel Astra 2012 ', 'Haifa ', 5, ' yes', 23, 30, 'The Opel Astra (Lat: Stars) is a compact car/small family car (C-segment in Europe) engineered and manufactured by the German automaker Opel since 1991.'),
(2, ' Alamo', ' Opel Astra 2014 ', 'Haifa ', 5, ' yes ', 49, 30, 'The Opel Astra (Lat: Stars) is a compact car/small family car (C-segment in Europe) engineered and manufactured by the German automaker Opel since 1991.'),
(3, ' Alamo', ' Opel Corsa 2012 ', 'Haifa ', 5, 'no', 25, 30, 'The Corsa is a car that first rolled off the production line in 2006 and despite a nose job and suspension update in late 2010, the interior is right down there with the Nissan Almera. Except it\'s $2000 more. And that does few favours to the pretender to VW\'s throne as an aspirational mainstream brand.'),
(4, ' Hertz ', ' Suzuki 2012 ', 'Haifa ', 5, ' yes ', 25, 30, 'Suzuki\'s compact SX4 comes in three versions: An all-wheel-drive hatchback called the Crossover; a slightly shorter, front-drive hatch called the SportBack.'),
(5, ' Alamo ', ' Mini Cooper 2012 ', 'Haifa ', 5, ' yes ', 25, 30, 'The 2012 Mini-Cooper ranking is based on its score within the 2012 Subcompact Cars category. The current score is 7.8 out of 10.'),
(6, 'Avis', ' Jeep 2012 ', 'Haifa ', 5, ' yes ', 25, 30, 'The Jeep Liberty offers a good compromise between road-worthiness and off-highway capability for a compact SUV. The Liberty is available in three trim levels, Sport, Limited, and the new-for-2012 Jet Edition.'),
(7, ' SIXT ', ' Mustang s2 2019 ', 'Haifa ', 5, ' yes ', 25, 30, 'The Mokka is older, based on the Gamma II platform that also underpins the Vauxhall Viva, although size-wise it falls into the gap between NissanJuke and Qashqai.'),
(8, ' Alamo ', ' Audi a4 2018 ', 'Haifa ', 5, ' yes ', 25, 30, 'he Giulietta engine includes a clever valve system called MultiAir, that uses small \'solenoid\' thrusters instead of an inlet camshaft.'),
(9, ' Hertz ', ' Benz 2011 ', 'Haifa ', 5, ' yes ', 25, 30, 'Folding soft top and two seats instead of the two-plus-two arrangement found in the coupe. Standard automated emergency braking.'),
(10, ' SIXT ', ' Opel Astra 2012 ', 'Frezno ', 5, ' yes ', 25, 30, 'The Mazda RX-7 is a front-engine, rear-drive sports car manufactured and marketed by Mazda from 1978-2002 across three generations all noted for using a compact, lightweight Wankel rotary engine.'),
(11, ' Alamo ', ' Opel Astra 2014 ', 'Frezno ', 5, ' yes ', 25, 30, 'The Mitsubishi Eclipse is a sport compact car that was produced by Mitsubishi in four generations between 1989 and 2011.[2] A convertible body style was added during the 1996 model year.'),
(12, ' Alamo ', ' Opel Corsa 2012 ', 'Frezno ', 5, ' yes ', 25, 30, 'he Giulietta engine includes a clever valve system called MultiAir, that uses small \'solenoid\' thrusters instead of an inlet camshaft.'),
(13, ' Hertz ', ' Suzuki 2012 ', 'Frezno ', 5, ' yes ', 25, 30, 'Folding soft top and two seats instead of the two-plus-two arrangement found in the coupe. Standard automated emergency braking.'),
(14, ' Alamo ', ' Mini Cooper 2012 ', 'Frezno ', 5, ' yes ', 25, 30, 'The Mazda RX-7 is a front-engine, rear-drive sports car manufactured and marketed by Mazda from 1978-2002 across three generations all noted for using a compact, lightweight Wankel rotary engine.'),
(15, 'Avis', ' Jeep 2012 ', 'Frezno ', 5, ' yes ', 25, 30, 'Folding soft top and two seats instead of the two-plus-two arrangement found in the coupe. Standard automated emergency braking.'),
(16, ' SIXT ', ' Mustang s2 2019 ', 'Frezno ', 5, ' yes ', 25, 30, 'The Mitsubishi Eclipse is a sport compact car that was produced by Mitsubishi in four generations between 1989 and 2011.[2] A convertible body style was added during the 1996 model year.'),
(17, ' Alamo ', ' Audi a4 2018 ', 'Frezno ', 5, ' yes ', 25, 30, 'The A4 comes standard with a super smooth 2.0-liter turbocharged four-cylinder engine making 190 horsepower and 236 pound-feet of torque. '),
(18, ' Hertz ', ' Benz 2011 ', 'Frezno ', 5, ' yes ', 25, 30, 'The Mazda RX-7 is a front-engine, rear-drive sports car manufactured and marketed by Mazda from 1978-2002 across three generations all noted for using a compact, lightweight Wankel rotary engine.'),
(23, ' Hertz ', ' Benz 2222 ', 'Eilat ', 1, ' no ', 20, 33, 'The Mitsubishi Eclipse is a sport compact car that was produced by Mitsubishi in four generations between 1989 and 2011.[2] A convertible body style was added during the 1996 model year.');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `cities`
--

CREATE TABLE `cities` (
  `Name` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `cities`
--

INSERT INTO `cities` (`Name`, `Country`, `Location`) VALUES
('Aarschot', 'Belgium', 'East'),
('Abaetetuba', 'Brazil', 'North'),
('Aiberdeen', 'Scotland', 'North'),
('Americana', 'Brazil', 'South East '),
('Amsterdam', 'Netherlands', 'North'),
('Athena', ' Israel ', 'Center '),
('Babruysk', 'Belarus', 'East'),
('Barcelona', ' Spain ', 'Center '),
('Barisal', 'Bangladesh', 'South Center'),
('Berlin', 'Germany', 'East'),
('Brussel', 'Belgium', 'Center'),
('Budapest', 'Hungary', 'Center'),
('Buenos Aires', 'Argentina', 'West'),
('Cambridge', ' England ', 'Center '),
('Camiri', 'Bolivia', 'East'),
('Chester', 'England', 'North West'),
('Coffeyville', 'Kansas, United States', 'South East'),
('Dawson Creek', 'Columbia, Canada', 'North'),
('Dhaka', 'Bangladesh', 'Center'),
('Dresden', 'Germany', 'East'),
('Duncan', 'Columbia, Canada', 'South'),
('Dunedin', 'New Zealand', 'South'),
('Durham', 'England', 'North East'),
('Eilat', ' Israel ', 'South '),
('Elblag', 'Poland', 'North'),
('Enderby', 'Columbia, Canada', 'North'),
('Essen', 'Germany', 'Center'),
('Fort Saskatchewan', 'Alberta, Canada', 'North'),
('Frankfurt', 'Germany', 'Center'),
('George Town', 'Bahamas', 'Exuma Island'),
('Grande Prairie', 'Alberta, Canada', 'North'),
('Haifa ', 'Israel', 'North'),
('Hamburg', 'Germany', 'Center'),
('Hannover', 'Germany', 'North West'),
('Ingolstadt', 'Germany', 'South East'),
('Inowroclaw', 'Poland', 'North Center'),
('Istanbul', 'Turkey', 'Center '),
('Jena', 'Germany', 'Center'),
('Joensuu', 'Finland', 'North'),
('Kampot', 'Cambodia', 'South'),
('Kep', 'Cambodia', 'South'),
('Kimberley', 'Columbia, Canada', 'South'),
('Kouvola', 'Finland', 'South East'),
('Lacombe', 'Alberta, Canada', 'North'),
('Liverpool', ' England ', 'South '),
('London', ' England ', 'Center '),
('Lublin', 'Poland', 'South East'),
('Madrid', ' Spain ', 'Center '),
('Manchester', 'North West', 'England'),
('Munich', 'Germany', 'West'),
('Mykonos', ' Greece ', 'Center '),
('Nesebar', 'Bulgaria', 'South'),
('New Westminster', 'Columbia, Canada', 'South'),
('New York', 'United States ', 'Center '),
('Nottingham', 'England', 'East Midlands'),
('Oldenburg', 'Germany', 'North West'),
('Olsztyn', 'Poland', 'North East'),
('Oxford', 'England', 'South East'),
('Paris', ' England ', 'Center '),
('Phnom Penh', 'Cambodia', 'Center'),
('Quesnel', 'Columbia, Canada', 'Center'),
('Recklinghausen', 'Germany', 'Center North'),
('Salzburg', 'Austria', 'Center'),
('Santa Fe', 'Argentina', 'North East'),
('Southampton', 'England', 'South East'),
('Stuttgart', 'Germany', 'South West'),
('Sydney', 'Australia', 'East Coast'),
('Tbilisi', 'Georgia', 'Center'),
('Tel Aviv', ' Israel ', 'Center '),
('Toronto', 'Canada', 'East Center'),
('Ulm', 'Germany', 'South West'),
('Upper Hutt', 'New Zealand', 'North'),
('Vancouver', 'Columbia, Canada', 'West'),
('Vienna', 'Austria', 'East'),
('Warsaw', 'Poland', 'East Center'),
('Westminster', 'England', 'Center'),
('Wolverhampton', 'England', 'West Midlands'),
('Woodstock', 'Canada', 'South West'),
('Worcester', 'England', 'West Midlands'),
('Xochimilco', 'China', 'South'),
('Xuchang', 'China', 'Center'),
('Yong\'an', 'China', 'West Center'),
('Yumen', 'China', 'West'),
('Zamboanga', 'Philippines', 'Center'),
('Zgierz', 'Poland', 'Center'),
('Zhangping', 'China', 'South East'),
('Zhangye', 'China', 'Center');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `countries`
--

CREATE TABLE `countries` (
  `Name` varchar(30) NOT NULL,
  `continent` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `countries`
--

INSERT INTO `countries` (`Name`, `continent`) VALUES
('England', 'Europe'),
('France', 'Europe'),
('Greece', 'Asia'),
('Israel', 'Asia'),
('Spain', 'Europe'),
('Turkey', 'Europe'),
('United States', 'North America');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `feedback`
--

CREATE TABLE `feedback` (
  `number` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(30) NOT NULL,
  `postDate` date NOT NULL,
  `itemNumber` int(11) NOT NULL,
  `feedBack` text NOT NULL,
  `grading` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `feedback`
--

INSERT INTO `feedback` (`number`, `Email`, `postDate`, `itemNumber`, `feedBack`, `grading`) VALUES
(39, 'Admin', '2019-02-17', 121, 'I enjoyed the stay at hotel. I would recommend this hotel to many friends. The hotel looks lovely and the service is great. I stayed in the hotel, the room is nice and the scenery is nice. It was a comfortable stay and i felt relaxed here. I would definitely come here again in the future. The hotel is very clean and the staff here is very friendly.', 4),
(41, 'Alex12@gmail.co.il', '2019-02-17', 121, 'Bread was dry, orange juice was nothing but sugar.', 1),
(42, 'Heyam@gmail.com', '2019-02-17', 122, 'estled within the commercial and political nucleus of the city, this upscale hotel is perfect for those traveling on business', 4),
(43, 'Admin', '2019-02-17', 1, 'Amazing car, safe', 4),
(44, 'Admin', '2019-02-17', 121, 'tst', 4);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `flights`
--

CREATE TABLE `flights` (
  `number` varchar(30) NOT NULL,
  `fromCity` varchar(30) NOT NULL,
  `toCity` varchar(30) NOT NULL,
  `departure1` date NOT NULL,
  `arrival1` date NOT NULL,
  `departureTime1` varchar(90) NOT NULL,
  `arrivalTime1` varchar(90) NOT NULL,
  `departure2` date NOT NULL,
  `arrival2` date NOT NULL,
  `departureTime2` varchar(30) NOT NULL,
  `arrivalTime2` varchar(30) NOT NULL,
  `airLine` varchar(30) NOT NULL,
  `departureAirport` varchar(30) NOT NULL,
  `arrivalAirport` varchar(30) NOT NULL,
  `oneWay` varchar(30) NOT NULL,
  `direct` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `flights`
--

INSERT INTO `flights` (`number`, `fromCity`, `toCity`, `departure1`, `arrival1`, `departureTime1`, `arrivalTime1`, `departure2`, `arrival2`, `departureTime2`, `arrivalTime2`, `airLine`, `departureAirport`, `arrivalAirport`, `oneWay`, `direct`, `price`) VALUES
('a1', 'london', 'barcelona', '2019-02-05', '2019-02-07', '13:00 pm', '14:00 pm', '0000-00-00', '0000-00-00', '', '', 'Turkish Airline', 'sas', 'sdsd', 'yes', 'yes', '200'),
('a2', 'London', 'barcelona', '2019-02-01', '2019-02-02', '13:00 am', '15:40 pm', '2019-02-20', '2019-02-21', '12:50 pm', '13:00 am', 'Turkish Airline', 'Jet Center', 'El Prat (BCN)', 'no', 'yes', '420'),
('a3', 'Athena', 'Eilat', '2019-02-07', '2019-02-07', '09:30 pm', '10:30 pm', '0000-00-00', '0000-00-00', '', '', 'PEGASUS', '(ATH)', 'ben gurion', 'yes', 'yes', '130');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `hotelfeedbackpictures`
--

CREATE TABLE `hotelfeedbackpictures` (
  `num` bigint(20) UNSIGNED NOT NULL,
  `fileName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `hotels`
--

CREATE TABLE `hotels` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `stars` text NOT NULL,
  `adultPricePerDay` double NOT NULL,
  `childPricePerDay` double NOT NULL,
  `discription` text NOT NULL,
  `mainPicture` varchar(90) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `stars`, `adultPricePerDay`, `childPricePerDay`, `discription`, `mainPicture`, `city`) VALUES
(121, 'Duke Of Leinster', '4', 20, 18, 'Duke of Leinster is an elegant hotel situated in Bayswater, just a few minutes from Hyde Park, Kensington Gardens, lively Queensway and 2 Underground stations: Bayswater and Queensway', 'duke1.jpg', 'london'),
(122, 'Glory', '3', 22, 19, 'Located in an elegant Victorian townhouse, B\'Shan Apartments features free WiFi access and air-conditioning throughout. All apartments are fitted with full kitchen facilities and quartz worktops.', 'glory1.jpg', 'barcelona'),
(126, ' Hilton ', ' 4', 24, 26, ' great and good', ' ', 'Taba ');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `popupnotification`
--

CREATE TABLE `popupnotification` (
  `notificationNumber` bigint(20) UNSIGNED NOT NULL,
  `targetEmail` varchar(90) NOT NULL,
  `seen` varchar(30) NOT NULL,
  `notification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `popupnotification`
--

INSERT INTO `popupnotification` (`notificationNumber`, `targetEmail`, `seen`, `notification`) VALUES
(4, 'Heyam@gmail.com', 'no', 'Admin has Commented On Your Post'),
(5, 'Heyam@gmail.com', 'no', 'Admin has Commented On Your Post'),
(6, 'Heyam@gmail.com', 'no', 'Admin has Commented On Your Post'),
(7, 'Heyam@gmail.com', 'no', 'Admin has Commented On Your Post'),
(10, 'Alex12@gmail.co.il', 'no', 'Alex12@gmail.co.il has Commented On Your Post');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `purchasehistory`
--

CREATE TABLE `purchasehistory` (
  `num` bigint(20) UNSIGNED NOT NULL,
  `ser` varchar(30) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `purchaseDate` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `purchasehistory`
--

INSERT INTO `purchasehistory` (`num`, `ser`, `userEmail`, `discription`, `purchaseDate`, `price`) VALUES
(1, '2', 'Admin', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(2, '9', 'Admin', ' Benz 2011   Hertz  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(3, '1', 'Admin', ' Opel Astra 2012   SIXT  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(4, '2', 'Admin', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(5, '3', 'Admin', ' Opel Corsa 2012   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(6, '4', 'Admin', ' Suzuki 2012   Hertz  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(7, '5', 'Admin', ' Mini Cooper 2012   Alamo  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(8, '6', 'Admin', ' Jeep 2012  Avis 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(9, '7', 'Admin', ' Mustang s2 2019   SIXT  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(10, '8', 'Admin', ' Audi a4 2018   Alamo  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(11, '9', 'Admin', ' Benz 2011   Hertz  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(12, '2', 'Admin', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(13, '12', 'Alex12@gmail.co.il', ' Opel Corsa 2012   Alamo  2019-02-01 - 2019-02-23 ', '2019-02-15', 550),
(14, '14', 'Alex12@gmail.co.il', ' Mini Cooper 2012   Alamo  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(15, '14', 'Alex12@gmail.co.il', ' Mini Cooper 2012   Alamo  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(16, '12', 'Alex12@gmail.co.il', ' Opel Corsa 2012   Alamo  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(17, '2', 'Alex12@gmail.co.il', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(18, '3', 'Alex12@gmail.co.il', ' Opel Corsa 2012   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(19, '1', 'Alex12@gmail.co.il', ' Opel Astra 2012   SIXT  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(20, '2', 'Alex12@gmail.co.il', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(21, '3', 'Alex12@gmail.co.il', ' Opel Corsa 2012   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(22, '4', 'Alex12@gmail.co.il', ' Suzuki 2012   Hertz  2019-02-01 - 2019-02-05 ', '2019-02-15', 120),
(23, '2', 'Admin', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-03-27 ', '2019-02-15', 1620),
(24, '17', 'Admin', 'BMW i8  Alamo  2019-02-01 - 2019-02-05 ', '2019-02-15', 280),
(25, '1', 'Admin', ' Opel Astra 2012   SIXT  2019-02-01 - 2019-02-07 ', '2019-02-15', 180),
(26, '121', 'Admin', 'Hotel : Duke Of Leinster , london , 4 Stars , 2018-12-10  -  2018-12-18 ', '2019-02-15', 0),
(27, '121', 'Admin', 'Hotel : Duke Of Leinster , london , 4 Stars , 2019-02-15  -  2019-02-15 ', '2019-02-15', 0),
(28, '121', 'Admin', 'Hotel : Duke Of Leinster , london , 4 Stars , 2019-02-15  -  2019-02-15 ', '2019-02-15', 0),
(29, '121', 'Admin', 'Hotel : Duke Of Leinster , london , 4 Stars , 2018-12-10  -  2018-12-17 ', '2019-02-15', 1330),
(30, '121', 'Alex12@gmail.co.il', 'Hotel : Duke Of Leinster , london , 4 Stars , 2018-12-10  -  2018-12-17 ', '2019-02-16', 5264),
(31, '121', 'Admin', 'Hotel : Duke Of Leinster , london , 4 Stars , 2018-12-10  -  2018-12-17 ', '2019-02-16', 1064),
(32, '122', 'Admin', 'Hotel : Glory , barcelona , 3 Stars , 2018-12-10  -  2018-12-17 ', '2019-02-16', 1148),
(33, '1', 'Admin', ' Opel Astra 2012   SIXT  2019-02-01 - 2019-02-05 ', '2019-02-16', 120),
(34, '2', 'Admin', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-16', 120),
(35, 'a1', 'Admin', 'Turkish Airline - Flight : a1 , london âž barcelona  direct  ( 2019-02-05 âž 2019-02-07 )  ', '2019-02-16', 200),
(36, 'a2', 'Admin', 'Turkish Airline - Flight : a2 , London â‡† barcelona  direct  ( 2019-02-01 âž 2019-02-21 )  ', '2019-02-16', 420),
(37, 'a3', 'Admin', 'PEGASUS - Flight : a3 , Athena âž Eilat  direct  ( 2019-02-07 âž 2019-02-07 )  ', '2019-02-16', 130),
(38, 'a1', 'Admin', 'Turkish Airline - Flight : a1 , london âž barcelona  direct  ( 2019-02-05 âž 2019-02-07 )  ', '2019-02-16', 200),
(39, 'a2', 'Admin', 'Turkish Airline - Flight : a2 , London â‡† barcelona  direct  ( 2019-02-01 âž 2019-02-21 )  ', '2019-02-16', 420),
(40, '3', 'Alex12@gmail.co.il', ' Opel Corsa 2012   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-17', 120),
(41, 'a2', 'Alex12@gmail.co.il', 'Turkish Airline - Flight : a2 , London â‡† barcelona  direct  ( 2019-02-01 âž 2019-02-21 )  ', '2019-02-17', 420),
(42, '1', 'Admin', ' Opel Astra 2012   SIXT  2019-02-01 - 2019-02-05 ', '2019-02-17', 120),
(43, '2', 'Admin', ' Opel Astra 2014   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-17', 120),
(44, '3', 'Admin', ' Opel Corsa 2012   Alamo 2019-02-01 - 2019-02-05 ', '2019-02-17', 120),
(45, 'a1', 'Admin', 'Turkish Airline - Flight : a1 , london âž barcelona  direct  ( 2019-02-05 âž 2019-02-07 )  ', '2019-02-17', 200),
(46, '121', 'Admin', 'Hotel : Duke Of Leinster , london , 4 Stars , 2018-12-10  -  2018-12-17 ', '2019-02-17', 1064);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `reviewcomments`
--

CREATE TABLE `reviewcomments` (
  `number` bigint(20) UNSIGNED NOT NULL,
  `reviewNumber` int(11) NOT NULL,
  `commenterEmail` varchar(90) NOT NULL,
  `commentDate` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `reviewcomments`
--

INSERT INTO `reviewcomments` (`number`, `reviewNumber`, `commenterEmail`, `commentDate`, `comment`) VALUES
(104, 39, 'Alex12@gmail.co.il', '2019-02-17', 'Location is great! But the whole building needs to be renovated! Breakfast room is hyper tiny. As the room was not well isolated we asked for a second blanket. The nice lady from the reception brought it immediately! The bed was comfy and clean. Bathroom clean too but renovation is required.'),
(106, 41, 'Admin', '2019-02-17', 'Not worth the expensive price we paid'),
(107, 39, 'Heyam@gmail.com', '2019-02-17', 'not real'),
(108, 42, 'Admin', '2019-02-17', 'Why?'),
(109, 42, 'Admin', '2019-02-17', 'dgfdfhgdfgh'),
(110, 42, 'Admin', '2019-02-17', 'ghhhhhhhhhhhhhhhhhh'),
(111, 42, 'Admin', '2019-02-17', 'dgfhhhhhhhhhhhhhhhhhhhhhhhhhhhh'),
(112, 43, 'Alex12@gmail.co.il', '2019-02-17', 'cool'),
(113, 41, 'Admin', '2019-02-17', 'tttt'),
(114, 41, 'Alex12@gmail.co.il', '2019-02-17', 'wtrwrtrt'),
(115, 39, 'Alex12@gmail.co.il', '2019-02-17', 'SDSD');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `ser` varchar(100) NOT NULL,
  `userEmail` varchar(40) NOT NULL,
  `discription` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `profilePictureFileName` varchar(90) NOT NULL,
  `birthDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`email`, `firstname`, `lastname`, `address`, `phoneNumber`, `password`, `profilePictureFileName`, `birthDate`) VALUES
('Admin', 'Admin', 'Admin', 'Admin', '0500000000', 'admin', 'admin.JPG', '2019-01-29'),
('Alex12@gmail.co.il', 'Alexdsdsd', 'Univ', 'Haifa Hashaloom', '0533333333', '99', 'prof2.jpg', '1994-07-06'),
('Heyam@gmail.com', 'Heyam', 'Abdl', 'tst', '0534890874', '123', 'blank-profile-picture.png', '2013-07-01'),
('shiro@gmail.com', 'shiraz', 'fero', 'wen asdd', '0548339220', '123', 'blank-profile-picture.png', '1995-12-12');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `airlines`
--
ALTER TABLE `airlines`
  ADD UNIQUE KEY `id` (`id`);

--
-- אינדקסים לטבלה `carrentalcompany`
--
ALTER TABLE `carrentalcompany`
  ADD PRIMARY KEY (`name`);

--
-- אינדקסים לטבלה `cars`
--
ALTER TABLE `cars`
  ADD UNIQUE KEY `serial` (`serial`);

--
-- אינדקסים לטבלה `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`Name`);

--
-- אינדקסים לטבלה `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`Name`);

--
-- אינדקסים לטבלה `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `number` (`number`);

--
-- אינדקסים לטבלה `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`number`);

--
-- אינדקסים לטבלה `hotelfeedbackpictures`
--
ALTER TABLE `hotelfeedbackpictures`
  ADD UNIQUE KEY `num` (`num`);

--
-- אינדקסים לטבלה `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `popupnotification`
--
ALTER TABLE `popupnotification`
  ADD PRIMARY KEY (`notificationNumber`),
  ADD UNIQUE KEY `notificationNumber` (`notificationNumber`);

--
-- אינדקסים לטבלה `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD UNIQUE KEY `num` (`num`);

--
-- אינדקסים לטבלה `reviewcomments`
--
ALTER TABLE `reviewcomments`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `number` (`number`);

--
-- אינדקסים לטבלה `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`ser`,`userEmail`);

--
-- אינדקסים לטבלה `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `serial` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `number` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `hotelfeedbackpictures`
--
ALTER TABLE `hotelfeedbackpictures`
  MODIFY `num` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `popupnotification`
--
ALTER TABLE `popupnotification`
  MODIFY `notificationNumber` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  MODIFY `num` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `reviewcomments`
--
ALTER TABLE `reviewcomments`
  MODIFY `number` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
