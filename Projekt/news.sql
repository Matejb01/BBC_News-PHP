-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 24, 2023 at 12:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Ime', 'Prezime', 'ivan123', '$2y$10$0viEgy7H/xpx0q7sF7YSKOaRQSbNNaUWeknvAwDmk31tsbZlycLE6', 0),
(4, 'Ime', 'Prezime', 'admin', '$2y$10$Hu270xXB4zkKuYC3YhnkoOkpCWDeT1pl9MaqUlHmitiqqqVah0bnS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '10.06.2023.', 'Otvorenje Novog Internet Caffea', 'Uzbudljive vijesti iz našeg grada! Danas je svečano otvoren novi Internet Caffea.', 'Novi Internet Caffe, nazvan \"NetZone\", nalazi se u samom srcu grada, s modernim dizajnom i udobnim prostorom koji poziva posjetitelje da se opuste, uživaju i istraže sve što digitalni svijet nudi. Kombinacija udobnih stolica, brze bežične veze i najnovijih računalnih tehnologija stvara optimalno okruženje za surfanje Internetom, igranje video igara, izradu projekata ili jednostavno druženje s prijateljima.\r\n\r\nNetZone ima sve što moderni Internet Caffe treba imati: redove vrhunskih računalnih sustava opremljenih najnovijim hardverom i softverom, kao i velike zaslone i VR opremu koja omogućuje korisnicima da uđu u svijet virtualne stvarnosti. Caffe također nudi širok izbor pića, uključujući kavu, čajeve, osvježavajuće napitke i zdrave smoothieje, te razne grickalice kako bi se zadovoljile sve potrebe posjetitelja.', 'slika1.png', 'politika', 0),
(2, '10.06.2023.', 'Osvježeni Sjaj Kipa Slobode ', 'New York City - Iconicni Kip Slobode ponovno je zasjao svojim blistavim sjajem ', 'Današnji dan obilježava službeno otkrivanje obnovljenog Kipa Slobode, čija je prepoznatljiva figura već desetljećima simbol slobode, demokracije i humanitarnih vrijednosti. Restauracija je bila sveobuhvatna, obuhvaćajući očuvanje povijesnih detalja i poboljšanja koja će osigurati da Kip Slobode nastavi očaravati i nadahnuti posjetitelje iz cijelog svijeta.\r\n\r\nProjekt obnove Kipa Slobode uključivao je temeljito čišćenje i restauraciju površine baklje, postolja i same skulpture. Stručnjaci su pažljivo uklonili slojeve prljavštine, hrđe i patine koji su se nakupili tijekom godina, vraćajući mu originalni sjaj. Restauracija je također uključivala zamjenu oštećenih ili nedostajućih dijelova, poput prstiju na ruci koja drži baklju.\r\n\r\nUz obnovu originalnih elemenata, obnovljeni Kip Slobode također je dobio suptilna poboljšanja koja će unaprijediti posjetiteljsko iskustvo. Poboljšane osvjetljenje i audiovizualne tehnologije omogućit će posjetiteljima da se još dublje urone u povijest i simboliku Kipa Slobode. Dodatno, obnovljeno postolje sada nudi bolje uvjete za pristup i sigurnost posjetitelja. Unatoč zabrinutosti, lokalni stanovnici i turisti ne mogu odoljeti nevjerojatnom prizoru erupcije.', 'slika2.png', 'politika', 0),
(3, '10.06.2023.', 'Erupcija Vulkana na Havajima', 'Veliki vulkan na Havajima, poznat kao \"Vatrena planina\", eruptirao je danas.', 'Erupcija je započela u ranim jutarnjim satima, kada je vulkan izbacio ogromne količine dima i pepela visoko u zrak. Ubrzo su uslijedile snažne eksplozije koje su propratile izlazak lave na površinu. Veličanstveni prizor pružio je rijedak pogled na snagu prirode, ali i podsjetio na opasnosti koje vulkanske aktivnosti mogu predstavljati.\r\n\r\nLokalne vlasti brzo su reagirale na erupciju, aktivirajući hitne protokole i evakuacijske planove. Sigurnost stanovnika i posjetitelja postavljena je kao najviši prioritet, a timovi za hitne slučajeve uspješno su organizirali evakuaciju ugroženih područja. Crveno svjetlo za upozorenje izdano je za šire područje oko vulkana, a nadležne službe prate situaciju i pružaju potrebnu podršku.', 'slika3.png', 'politika', 0),
(5, '10.06.2023.', 'Snježni Raj za Ljubitelje Skijanja', 'Alpske planine - Skijaška sezona je u punom jeku, donoseći radost i uzbuđenje ljubiteljima zimskih sportova diljem svijeta.', 'Snježne padine planina pretvaraju se u pravu idilu za skijaše, snowboardere i sve one koji traže adrenalin i zabavu na snijegu.\r\n\r\nAlpske regije posebno su popularne ove sezone zbog izvanrednih uvjeta snijega. Obilne padaline i niske temperature omogućile su stvaranje iznimno stabilnih i obilnih snježnih pokrivača. Skijaški centri diljem Alpa primili su veliki broj posjetitelja koji su željni iskusiti čaroliju skijanja u prekrasnom okruženju.', 'slika4.png', 'sport', 0),
(6, '10.06.2023.', 'Epsko Finale Lige Prvaka ', 'Istanbul - Napetost je dosegnula vrhunac dok su dva velika nogometna diva stupila na teren stadiona u Istanbulu kako bi se borila za titulu u finalu Lige prvaka.', 'Milijuni navijača širom svijeta pratili su ovo epsko finale koje je donijelo nevjerojatnu akciju, dramu i slavlje.\r\n\r\nUtakmica je započela snažnim tempom i oštrim duelima, dok su se momčadi borile za nadmoćnost. Oba tima prikazala su vještinu, brzinu i taktičku disciplinu, što je rezultiralo uzbudljivim i izjednačenim prvim poluvremenom. Navijači su bili oduševljeni kvalitetom igre i nestrpljivo su čekali da se razriješi tko će podići prestižni trofej.\r\n\r\nDrugo poluvrijeme donijelo je još više uzbuđenja. Nakon nekoliko neuspjelih napada, jedna momčad uspjela je dobiti prednost nakon prekrasnog gola u 65. minuti. Stadion je eksplodirao od oduševljenja, dok su navijači zapaljeni atmosferom bodrili svoj tim do kraja.', 'slika5.png', 'sport', 0),
(7, '10.06.2023.', 'Adrenalin na Maksimumu - Moto GP ', 'Assen - Legendarni staza TT Circuit Assen bila je poprište nevjerojatne utrke Moto GP prvenstva koja je oduševila navijače svojom akcijom i neizvjesnošću.', 'Vozači iz svjetskog vrha borili su se za pobjedu u ovoj adrenalinom nabijenoj utrci koja je ostavila gledatelje bez daha.\r\n\r\nUtrka je započela uzbuđenim startom, dok su se motocikli brzinom munje probijali kroz prvi zavoj. Vozači su vješto manevrirali svojim motociklima, pokušavajući pronaći optimalne linije i preteći svoje protivnike. Niti jedan trenutak nije bio siguran, a borba za prvo mjesto bila je nevjerojatno tijesna.\r\n\r\nSvaki zavoj i ravna dionica bili su ispunjeni strastvenim navijanjem navijača koji su pristigli iz svih dijelova svijeta kako bi podržali svoje omiljene vozače.', 'slika6.png', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnik` (`korisnicko_ime`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
