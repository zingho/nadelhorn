-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Dez 2017 um 01:03
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `nadelhorn`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gaestebuch`
--

CREATE TABLE `gaestebuch` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `gaestebuch`
--

INSERT INTO `gaestebuch` (`id`, `name`, `email`, `text`, `created_at`, `deleted_at`) VALUES
(0, 'Robin', 'robin.hugo@lernende.bfo-vs.ch', 'test', '0000-00-00 00:00:00', NULL),
(0, 'Marc', 'marc.zengaffinen@lernende.bfo-vs.ch', 'Test_02', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `Bild` text NOT NULL,
  `Titel` text NOT NULL,
  `Beschreibung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`ID`, `Bild`, `Titel`, `Beschreibung`) VALUES
(1, 'images/news_1.jpg', 'Autumn hiking tour with fantastic views', 'Valais in the Swiss alps is a hiking paradise and has a hike for everyone. Up high peaks, through beautiful forests, along watercourses, over suspended bridges or trough tunnels. This tour offers a magnificent view to more than 10 mountains with an attitude more than 4’000 meters. Lucky hikers will see marmots and deer'),
(2, 'images/news_2.jpg', 'First double deck cabrio cable car', 'Passengers are able to observe the mountain scenery while enjoy fresh air and have the wind in their hairs.  Have the blue sky above yourselves and admire a fantastic 360° panorama, mountains and lakes around central of Switzerland. The CabriO Cable Car is a World premiere on Mount Stanserhorn near Lucerne'),
(3, 'images/news_3.jpg', 'Honey from the Swiss Alps - join a Beekeeper', 'A must have seen once in a lifetime … making honey … bees start the honey making process by collecting the nectar out of flowers. Then they drop the honey into the beeswax comb. Once a comb is full, it will be capped by wax. The beekeeper gets carefully rid of this wax and is getting the honey out of the combs'),
(4, 'images/news_4.jpg', 'Above the Clouds in Central Switzerland', 'Usually there is a clear sky above the clouds. It takes some effort to get there, but the views are rewarding and offer a fantastic outlook to the mountains. You choose whether or not to hike up from the bottom or take one of the many cable cars to reach a level where hiking becomes a relaxing walk'),
(5, 'images/news_5.jpg', 'The Longest Pedestrian Suspension Bridge in the World', 'This bridge is the connection between Grächen / Gasenried and Zermatt along the Europaweg at a dizzying height. It has been opened on July 29th, 2017 and is 494 m long, 65 cm width and the highest point is 85 m above ground. Passing the bridge is a new experience and pure adventure. The whole tour offers fantastic views to the Matterhorn and many other mountains and the hikers are saving 3 to 4 hours by crossing this new high Swiss quality work'),
(6, 'images/news_7.jpg', 'From the Glacier to the Meadows\r\n\"Suonen\" in Wallis', 'The region of Gasenried / Grächen has very little rainfall, therefore a water source was in need for the agriculture. “Suonen” (irrigation channels) transport the water from the glacier to the meadows. They are now great places to walk along and enjoy the sound of the water'),
(8, 'images/news_8.jpg', 'Gornergrat - Zermatt Marathon 2017\r\n', 'The Gornergrat - Zermatt Marathon is one of the finest running events in the Alps. Start is in St. Niklaus at 1’116 m, finish in Zermatt at 1’670 (Half Marathon) or on Riffelberg at 2’585 m (Marathon) – with the option of racing all the way to the top of the Gornergrat at 3’089 m (Ultra Marathon). The course covers 42.195 km and conquers 1’469 meters altitude. One compensation for the grueling run is the breathtaking panorama'),
(9, 'images/news_6.jpg', 'To the Moosfluh with a fantastic view', 'The Aletsch Glacier is the largest glacier in the Alps with a length of about 23 km, The whole area, including other glaciers is part of the Jungfrau-Aletsch Protected Area, which was declared a UNESCO World Heritage Site in 2001. It’s a perfect place to take pictures and send them to friends');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
