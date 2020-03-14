-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2019 at 09:40 AM
-- Server version: 5.5.62-cll
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nontfaku_pizzaplaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` smallint(5) UNSIGNED NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `StreetNum` varchar(10) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Suburb` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Postcode` smallint(5) NOT NULL,
  `Telephone` varchar(13) NOT NULL,
  `BirthDate` varchar(12) NOT NULL,
  `DateJoined` varchar(12) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `StreetNum`, `Street`, `Suburb`, `City`, `Postcode`, `Telephone`, `BirthDate`, `DateJoined`, `Email`) VALUES
(1, 'Eldrid', 'Manning', '12', 'White Street\r\n', '', 'Auckland', 1002, '09-475-3118', '#', '#', 'edshea@sageauthoring.com'),
(2, 'Sheila', 'Childs', '87', 'Black Street\r\n', '', 'Waitakere', 1023, '09-475-4271', '#', '#', 'pamela.putinas@att.net'),
(3, 'Diana', 'Wilson', '33', 'Main Road', 'NorthShore', 'NorthShore', 1134, '094631195', '#', '#', 'GFFAY13@GMAIL.COM'),
(4, 'Linda', 'Peron', '33', 'Locksley Ave\r\n', 'Beachlands', 'Manukau', 2012, '094618897', '#', '#', 'DMGFLG@AOL.COM'),
(5, 'Jackson', 'Powell', '124', 'Bucklands Beach Rd', 'Bucklands Beach', 'Manukau', 2012, '094776330', '', '', 'moosefan35@yahoo.com'),
(6, 'Jock', 'Silcock', '145', 'Main North Road\r\n', 'Bucklands Beach', 'Manukau', 2012, '02147533123', '#', '#', 'anthonydepas@att.net'),
(7, 'Sam', 'Brooke', '15', 'Travis Ave\r\n', 'Burswood', 'Manukau', 2011, '093889122', '#', '#', 'asku3@verizon.net'),
(8, 'Tui', 'James', '25', 'Banks Ave\r\n', 'Burswood', 'Manukau', 2011, '027444753125', '#', '#', 'garyelwood45@hotmail.com'),
(9, 'Elmer', 'Patterson', '8', 'Travis Country Dr\r\n', 'Burswood', 'Manukau', 2011, '093870048', '#', '#', 'kmoh13@msn.com'),
(10, 'Lisa', 'Grossman', '122', 'Yellowstone Cres\r\n', 'Burswood', 'Manukau', 2011, '094211011', '#', '#', 'harrytherese@aol.com'),
(11, 'Gareth', 'Davies', '20', 'Poulson St\r\n', 'Cockle Bay', 'Manukau', 2013, '094753128', '#', '#', 'ltjgnavy@brecnet.com'),
(12, 'John', 'Fisher', '22', 'Fyfe Rd\r\n', 'Dannemora', 'Manukau', 2016, '02188443729', '#', '#', 'GBitsoli@cox.net'),
(13, 'Rachel', 'Clarke', '333', 'Stanmore Rd\r\n', 'East Tamaki', 'Manukau', 2014, '094663130', '#', '#', 'Lifeisspice13@aol.com'),
(14, 'Tania', 'Harrison', '40', 'North Parade\r\n', 'East Tamaki', 'Manukau', 2011, '094753118', '#', '#', 'lennypessin@yahoo.com'),
(15, 'Alison', 'Little', '122', 'Slater Street\r\n', 'East Tamaki', 'Manukau', 2011, '094754271', '#', '#', 'btb92473@excite.com'),
(16, 'Harry', 'Windsor', '13', 'Perth St', 'East Tamaki', 'Manukau', 2011, '094631195', '#', '#', 'wrmrgr2@sbcglobal.net'),
(17, 'Jacqui', 'Winters', '22', 'Glade Ave', 'East Tamaki', 'Manukau', 2011, '094618897', '#', '#', 'dd710@bellsouth.net'),
(18, 'Jack', 'Sprat', '55', 'Kerrs Road', 'Eastern Beach', 'Manukau', 2012, '094776330', '#', '#', 'dad8@comcast.net'),
(19, 'Cindy', 'Carter', '50', 'Russell Ave', 'Howick', 'Manukau', 2145, '02147533123', '#', '#', 'eburket1@cox.net'),
(20, 'Harry', 'Creeke', '28', 'Eastern Beach Dr', 'Howick', 'Manukau', 2145, '093889122', '#', '#', 'KC0FIU@SBCGLOBAL.NET'),
(21, 'George', 'Blue', '10', 'Newbery St', 'Howick', 'Manukau', 2145, '027444753125', '#', '#', 'wchandler098@comcast.net'),
(22, 'Walter', 'Garfield', '40', 'Eastern Beach Dr', 'Howick', 'Manukau', 2145, '093870048', '#', '#', 'schmidt41f@aol.com'),
(23, 'Geraldine', 'Evans', '11', 'Colombo Street', 'Howick', 'Manukau', 2145, '094211011', '#', '#', 'UFFDA81@verizon.net'),
(24, 'Helen', 'Thomas', '24', 'Ford Rd', 'Howick', 'Manukau', 2145, '094753128', '#', '#', 'hepp85@yahoo.com'),
(25, 'Kyle', 'Dexter', '77', 'Seagrave Place', 'Mellons Bay', 'Manukau', 2011, '02188443729', '#', '#', 'lfbbfw@ntelos.net'),
(26, 'Sarah', 'Newcombe', '19', 'Brighton Rd', 'Mission Heights', 'Manukau', 2017, '094663130', '#', '#', 'apollo18@wedtv.net'),
(27, 'Dave', 'Jordan', '19', 'Olivine St', 'Mission Heights', 'Manukau', 2017, '094753118', '#', '#', 'delgearing@wavmax.com'),
(28, 'Wendy', 'Diver', '5', 'Marine Parade', 'North Pakuranga', 'Manukau', 2009, '094754271', '#', '#', 'RLSSTONE@sbcglobal.net'),
(29, 'Gloria', 'Haile', '27', 'Manly Place', 'North Pakuranga', 'Manukau', 2009, '094631195', '#', '#', 'josjtek@gmail.com'),
(30, 'Tom', 'Penny', '112', 'Marine Parade', 'North Pakuranga', 'Manukau', 2009, '094618897', '#', '#', 'joespalace@msn.com'),
(31, 'Thomas', 'Logan', '45', 'Waimari Rd', 'Otara', 'Manukau', 2020, '094776330', '#', '#', 'johnnyi50@aol.com'),
(32, 'Julia', 'Crawford', '11', 'Wattle Dr', 'Pakuranga', 'Manukau', 2008, '02147533123', '#', '#', 'alicearnie@aol.com'),
(33, 'Jonny', 'Smith', '6', 'Brighton Mall', 'Pakuranga', 'Manukau', 2008, '093889122', '#', '#', 'vdyne@att.net'),
(34, 'Paul', 'Peterson', '77', 'Wakatu Ave', 'Point View', 'Manukau', 2017, '027444753125', '#', '#', 'dpc31351@yahoo.com'),
(35, 'Paddy', 'Beale', '382', 'Red Rock Lane', 'Point View', 'Manukau', 2017, '093870048', '#', '#', 'rbish7@aol.com'),
(36, 'Sebastian', 'Eel', '33', 'Coventry St', 'Shelley Part', 'Manukau', 2005, '094211011', '#', '#', 'ldrake002@cinci.rr.com'),
(37, 'Sam', 'Liss', '0', '', '', '', 0, '', '#', '#', ''),
(38, 'Patrick', 'McLean', '0', '', '', '', 0, '', '#', '#', ''),
(39, 'Eve', 'Morgan', '0', '', '', '', 0, '', '#', '#', ''),
(40, 'Jill', 'McIntyre', '0', '', '', '', 0, '', '#', '#', ''),
(41, 'Suzie', 'Qu', '0', '', '', '', 0, '', '', '', ''),
(44, 'Jackie\'s', 'Rabbit', '20 Newry', '20 Newry close, Dannemora', 'Auckland', 'Auckland', 2016, '1', '2019-06-27', '2019-06-07', '1@gmail.com'),
(51, 'w', 'w', 'w', 'w', 'w', 'w', 3, 'w', '', '', ''),
(52, 'Prasad', 'Patchigalla', '575 Chap', '575 Chapel Road', 'Dannemora', 'Auckland', 2000, '0272447268', '2019-07-15', '2019-07-15', 'p.patchigalla@bdsc.school.nz');

-- --------------------------------------------------------

--
-- Table structure for table `dealproducts`
--

CREATE TABLE `dealproducts` (
  `DealProductID` tinyint(3) UNSIGNED NOT NULL,
  `DealID` tinyint(3) UNSIGNED NOT NULL,
  `MenuID` tinyint(3) UNSIGNED NOT NULL,
  `Quantity` tinyint(2) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealproducts`
--

INSERT INTO `dealproducts` (`DealProductID`, `DealID`, `MenuID`, `Quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 5, 1),
(3, 1, 4, 1),
(4, 2, 2, 1),
(5, 2, 6, 1),
(6, 2, 4, 1),
(7, 3, 1, 1),
(8, 3, 2, 1),
(10, 3, 5, 1),
(9, 3, 3, 1),
(11, 3, 6, 1),
(12, 3, 4, 3),
(13, 4, 1, 1),
(14, 4, 3, 1),
(15, 4, 5, 1),
(16, 4, 4, 2),
(27, 0, 1, 1),
(24, 0, 6, 1),
(28, 0, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `DealID` tinyint(3) UNSIGNED NOT NULL,
  `DealName` varchar(30) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Price` tinyint(2) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`DealID`, `DealName`, `Description`, `Price`) VALUES
(1, 'Meat Lovers Set', 'Meat Lovers Pizza with a side dish of crispy friend chicken wings and a cold drink. Fit for a person', 12),
(2, 'Vegetarian Set', 'Vegetarian Pizza with a side dish of Kumara Chips and a cold drink. Especially made for vegetarians', 10),
(3, 'Family Deal', 'Three full pizza combination of three pizza with fried chicken wings, a box kumara chips, and 3 cold drink can. Perfect for a family with 4-5 people', 30),
(4, 'Friendly Deal', 'Meat lovers and Supreme pizza combo together with crispy fried chicken wings and two cold drinks', 20);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` tinyint(3) UNSIGNED NOT NULL,
  `MenuName` varchar(25) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Calories` smallint(5) NOT NULL,
  `Price` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `MenuName`, `Description`, `Calories`, `Price`) VALUES
(1, 'Meat Lovers', 'Thick crust pizza with ham, pepperoni, and beef on BBQ sauce base top with mozzarella cheese', 3920, 8),
(2, 'Vegetarian', 'Thin crust pizza with loads of vegetables on tomato sauce base top with mozzarella cheese for vegatarians', 2510, 7),
(3, 'Supreme', 'Thick crust pizza with pepperoni ,mushroom and capsicum on tomato sauce base top with mozzarella cheese', 3210, 8),
(4, 'Carbonated beverage', 'Basic beverage can drinks', 140, 2),
(5, 'Fried Chicken Wings', 'Crispy crusty friend chicken wings with little spiciness. Good as a side dish of pizza', 412, 5),
(6, 'Kumara Chips', 'A box of kumara chips', 210, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menurecipes`
--

CREATE TABLE `menurecipes` (
  `MenuRecipeID` smallint(5) UNSIGNED NOT NULL,
  `MenuID` tinyint(3) UNSIGNED NOT NULL,
  `RecipeID` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menurecipes`
--

INSERT INTO `menurecipes` (`MenuRecipeID`, `MenuID`, `RecipeID`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 1, 12),
(7, 2, 2),
(8, 2, 3),
(9, 2, 8),
(10, 2, 9),
(11, 2, 10),
(12, 2, 11),
(13, 2, 12),
(14, 3, 1),
(15, 3, 3),
(16, 3, 6),
(17, 3, 10),
(18, 3, 11),
(19, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orderdeals`
--

CREATE TABLE `orderdeals` (
  `OrderDealID` mediumint(8) UNSIGNED NOT NULL,
  `OrderID` mediumint(8) UNSIGNED NOT NULL,
  `DealID` tinyint(3) UNSIGNED NOT NULL,
  `Quantity` tinyint(2) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdeals`
--

INSERT INTO `orderdeals` (`OrderDealID`, `OrderID`, `DealID`, `Quantity`) VALUES
(19, 54, 2, 1),
(1, 5, 4, 1),
(24, 59, 1, 1),
(22, 56, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `OrderProductID` mediumint(8) UNSIGNED NOT NULL,
  `OrderID` mediumint(8) UNSIGNED NOT NULL,
  `MenuID` tinyint(3) UNSIGNED NOT NULL,
  `Quantity` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`OrderProductID`, `OrderID`, `MenuID`, `Quantity`) VALUES
(1, 1, 2, 2),
(2, 1, 1, 3),
(3, 2, 1, 1),
(4, 2, 3, 1),
(5, 3, 3, 2),
(6, 3, 2, 2),
(7, 4, 1, 5),
(8, 4, 2, 1),
(9, 5, 2, 4),
(24, 54, 1, 2),
(30, 59, 1, 2),
(27, 56, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` mediumint(8) UNSIGNED NOT NULL,
  `CustomerID` smallint(5) UNSIGNED NOT NULL,
  `Delivery` varchar(10) NOT NULL,
  `TotalPrice` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Delivery`, `TotalPrice`) VALUES
(1, 37, 'Delivery', 38),
(2, 38, 'Delivery', 16),
(3, 39, 'Delivery', 30),
(4, 40, 'Delivery', 47),
(5, 41, 'Delivery', 48),
(54, 49, 'Delivery', 26),
(56, 50, 'Delivery', 17),
(57, 50, 'Delivery', 0),
(59, 15, 'Delivery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `RecipeID` tinyint(3) UNSIGNED NOT NULL,
  `RecipeName` varchar(50) NOT NULL,
  `Calories` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `RecipeName`, `Calories`) VALUES
(1, 'Thick Crust', 1200),
(2, 'Thin Crust', 800),
(3, 'Tomato Sauce', 550),
(4, 'BBQ Sauce', 600),
(5, 'Ham', 400),
(6, 'Pepperoni', 480),
(7, 'Beef', 440),
(8, 'Onion', 80),
(9, 'Spinach', 100),
(10, 'Mushroom', 120),
(11, 'Capsicum', 60),
(12, 'Mozzarella', 800);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` tinyint(2) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`) VALUES
(1, 'admin', '482c811da5d5b4bc6d497ffa98491e38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `dealproducts`
--
ALTER TABLE `dealproducts`
  ADD PRIMARY KEY (`DealProductID`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`DealID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `menurecipes`
--
ALTER TABLE `menurecipes`
  ADD PRIMARY KEY (`MenuRecipeID`);

--
-- Indexes for table `orderdeals`
--
ALTER TABLE `orderdeals`
  ADD PRIMARY KEY (`OrderDealID`);

--
-- Indexes for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`OrderProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`RecipeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `dealproducts`
--
ALTER TABLE `dealproducts`
  MODIFY `DealProductID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `DealID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `menurecipes`
--
ALTER TABLE `menurecipes`
  MODIFY `MenuRecipeID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orderdeals`
--
ALTER TABLE `orderdeals`
  MODIFY `OrderDealID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orderproducts`
--
ALTER TABLE `orderproducts`
  MODIFY `OrderProductID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `RecipeID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
