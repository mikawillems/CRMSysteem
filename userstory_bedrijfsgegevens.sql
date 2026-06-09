-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 09 jun 2026 om 08:19
-- Serverversie: 8.0.46-0ubuntu0.24.04.2
-- PHP-versie: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userstory_bedrijfsgegevens`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Klanten`
--

CREATE TABLE `Klanten` (
  `ID` int NOT NULL,
  `Bedijf naam` varchar(50) NOT NULL,
  `Voornaam` varchar(50) NOT NULL,
  `Tussenvoegsel` varchar(15) NOT NULL,
  `Achternaam` varchar(50) NOT NULL,
  `Functie` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Telefoon nummer` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Klanten`
--

INSERT INTO `Klanten` (`ID`, `Bedijf naam`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Functie`, `Email`, `Telefoon nummer`, `Address`) VALUES
(1, 'Team11CORP Roermond', 'Ruben', 'van', 'Dijk', 'Account Manager', 'Ruben.vanDijk@techsolutions.nl', '+31 6 12345678', 'Sint Lambertusweg 26, 5953 CJ Reuver'),
(2, 'Team11CORP Roermond', 'Sanne', 'de', 'Jong', 'Customer Service Coordinator', 'Sanne.deJong@greenenergy.nl', '+31 6 23456789', 'Kasteel Daelenbroeckstraat 61, 6043 XN Roermond'),
(3, 'Team11CORP Roermond', 'Tim', 'van der', 'Meer', 'Product Owner', 'Tim.vanDerMeer@logistix.nl', '+31 6 34567890', 'Dorpsstraat 108, 6042 LD Roermond'),
(4, 'Team11CORP Roermond', 'Lisa', '', 'Smit', 'Healthcare Program Manager', 'Lisa.Smit@healthplus.nl', '+31 6 45678901', 'Burgemeester Huybenstraat 31, 6085 ET Horn'),
(5, 'Team11CORP Roermond', 'Koen', '', 'Bakker', 'IT Support Specialist', 'Koen.Bakker@buildcorp.nl', '+31 6 56789012', 'Dorpsstraat 6, 6049 BV Herten'),
(6, 'Team11CORP Amsterdam', 'Anneke', '', 'Visser', 'Finance Manager', 'Anneke.Visser@financieelgroep.nl', '+31 6 67890123', 'Ma Braunpad 11, 1067 WZ Amsterdam'),
(7, 'Team11CORP Amsterdam', 'Mark', '', 'Jansen', 'Hardware Engineer', 'Mark.Jansen@innovatech.nl', '+31 6 78901234', 'Noorderakerweg 45, 1069 LN Amsterdam'),
(8, 'Team11CORP Amsterdam', 'Femke', '', 'Mulder', 'Marketing Manager', 'Femke.Mulder@creativestudio.nl', '+31 6 89012345', 'Bosplaat 93, 1025 AS Amsterdam'),
(9, 'Team11CORP Amsterdam', 'Pieter', 'de', 'Vries', 'Integration Specialist', 'Pieter.deVries@retailhub.nl', '+31 6 90123456', 'Achtergouwtje 7, 1027 AV Amsterdam'),
(10, 'Team11CORP Amsterdam', 'Laura', 'van der', 'Berg', 'Operations Manager', 'Laura.vanDenBerg@foodservice.nl', '+31 6 11223344 ', 'Poolsterstraat 14, 1033 CE Amsterdam'),
(11, 'Team11CORP Rotterdam', 'Kevin', '', 'Bos', 'Database Administrator', 'Kevin.Bos@datacore.nl', '+31 6 22334455', 'Noordsingel 216B, 3032 BM Rotterdam'),
(12, 'Team11CORP Rotterdam', 'Iris', '', 'Meijer', 'Training Coordinator', 'Iris.Meijer@medigroep.nl', '+31 6 33445566', 'Hommelstraat 2B, 3061 VB Rotterdam'),
(13, 'Team11CORP Rotterdam', 'Tom', 'de', 'Boer', 'Simulation Manager', 'Tom.deBoer@transportpro.nl', '+31 6 44556677', 'Baan 28, 3111 LA Schiedam'),
(14, 'Team11CORP Rotterdam', 'Nina', '', 'Kuipers', 'IT Administrator', 'Nina.Kuipers@eduworks.nl', '+31 6 55667788', 'Beekweg 165, 3045 PA Rotterdam'),
(15, 'Team11CORP Rotterdam', 'Rik', '', 'Vos', 'Network Administrator', 'Rik.Vos@securitynet.nl', '+31 6 66778899', 'Regenboog 160, 3162 XA Rhoon'),
(16, 'Team11CORP Groningen', 'Esmee', '', 'Peters', 'Event Coordinator', 'Esmee.Peters@eventix.nl', '+31 6 77889900', 'Concordiastraat 20A, 9741 BE Groningen'),
(17, 'Team11CORP Groningen', 'Bas', '', 'Hendriks', 'VR Specialist', 'Bas.Hendriks@constructa.nl', '+31 6 88990011', 'Lepelaar 23, 9728 XC Groningen'),
(18, 'Team11CORP Groningen', 'Chantal', 'van', 'Leeuwen', 'Software Test Manager', 'Chantal.vanLeeuwen@marketingspot.nl', '+31 6 99001122', 'Dorpsstraat 21, 9832 PB Den Horn'),
(19, 'Team11CORP Groningen', 'Nick', '', 'Dekker', 'Web Developer', 'Nick.Dekker@websolutions.nl', '+31 6 10111213', 'Lamsoor 5, 9738 AL Groningen'),
(20, 'Team11CORP Groningen', 'Ilse', '', 'Brouwer', 'Data Analyst', 'Ilse.Brouwer@careconnect.nl', '+31 6 12131415', 'Hoofdweg 139, 9614 AD Harkstede'),
(21, 'Team11CORP Zwolle', 'Dennis', '', 'Jacobs', 'Simulation Analyst', 'Dennis.Jacobs@agroplus.nl', '+31 6 13141516', 'Thorbeckelaan 31, 8014 AX Zwolle'),
(22, 'Team11CORP Zwolle', 'Marloes', 'van', 'Loon', 'Software Engineer', 'Marloes.vanLoon@designlab.nl', '+31 6 14151617', 'Havezathenallee 35, 8043 WL Zwolle'),
(23, 'Team11CORP Zwolle', 'Sander', '', 'Verhoeven', 'Configuration Manager', 'Sander.Verhoeven@consultinggroup.nl', '+31 6 15161718', 'Broeksteeg 40, 8276 AG Zalk'),
(24, 'Team11CORP Zwolle', 'Kim', '', 'Sanders', 'User Manager', 'Kim.Sanders@hrsupport.nl', '+31 6 16171819', 'Dreessingel 42, 8015 CB Zwolle'),
(25, 'Team11CORP Zwolle', 'Roy', 'van', 'Dam', 'Energy Systems Analyst', 'Roy.vanDam@energyflow.nl', '+31 6 17181920', 'Kolkweg 24, 8055 PV Laag Zuthem'),
(26, 'Team11CORP Nijmegen', 'Daphne', '', 'Blom', 'Hardware Technician', 'Daphne.Blom@mediahouse.nl', '+31 6 18192021', 'Okapistraat 79, 6531 RK Nijmegen'),
(27, 'Team11CORP Nijmegen', 'Wouter', 'van der', 'Rijn', 'Hardware Integration Specialist', 'Wouter.vanDerRijn@techhub.nl', '+31 6 19202122', 'Zellersacker 1524, 6546 HM Nijmegen'),
(28, 'Team11CORP Nijmegen', 'Joyce', '', 'Scholten', 'Reporting Analyst', 'Joyce.Scholten@finadvice.nl', '+31 6 20212223', 'Tulpstraat 10, 6581 XV Malden'),
(29, 'Team11CORP Nijmegen', 'Erik', 'van', 'Vliet', 'Performance Engineer', 'Erik.vanVliet@logisticspro.nl', '+31 6 21222324', 'Fliertse Beekstraat 3, 6541 WK Nijmegen'),
(30, 'Team11CORP Nijmegen', 'Manon', '', 'Koster', 'Installation Engineer', 'Manon.Koster@startupx.nl', '+31 6 22232425', 'Baumgartenstraat 33, 6663 LH Nijmegen'),
(31, 'Team11CORP UK', 'Oliver', '', 'Smith', 'Demo Specialist', 'Oliver.Smith@brittech.co.uk', '+44 7700 900123', '2 Spring Mdw, Everleigh Rd, Collingbourne Ducis, Marlborough SN8 3FE, Verenigd Koninkrijk'),
(32, 'Team11CORP UK', 'Harry', '', 'Johnson', 'Training Specialist', 'Harry.Johnson@urbanbuild.co.uk', '+44 7700 900234', '7 Churchill St, Alloa FK10 2JG, Verenigd Koninkrijk'),
(33, 'Team11CORP UK', 'Jack', '', 'Brown', 'Licensing Manager', 'Jack.Brown@finserver.co.uk', '+44 7700 900345', '86 Jackson Cres, Manchester M15 5AA, Verenigd Koninkrijk'),
(34, 'Team11CORP UK', 'Emily', '', 'Taylor', 'Software Support Specialist', 'Emily.Taylor@healthgroup.co.uk', '+44 7700 900456', '82 Richmond Park Ave, Rotherham S61 2JG, Verenigd Koninkrijk'),
(35, 'Team11CORP UK', 'Sophie', '', 'Wilson', 'QA Analyst', 'Sophie.Wilson@creativehub.co.uk', '+44 7700 900567', '67 Panton St, Cambridge CB2 1HL, Verenigd Koninkrijk'),
(36, 'Team11CORP USA', 'Ethan', '', 'Miller', 'Platform Engineer', 'Ethan.Miller@nextgen.com', '+1 202-555-0143', '5534 E Grant Ave, Fresno, CA 93727, Verenigde Staten'),
(37, 'Team11CORP USA', 'Eva', '', 'Anderson', 'Retail Operations Manager', 'Eva.Andeson@brightcorp.com', '+1 303-555-0176', '11019 Co Rd 63, Plantersville, AL 36758, Verenigde Staten'),
(38, 'Team11CORP USA', 'Noah', '', 'Thompson', 'Software Developer', 'Noah.Thompson@globaltech.com', '+1 415-555-0198', '1001 Broad St, Columbia, MS 39429, Verenigde Staten'),
(39, 'Team11CORP USA', 'Olivia', '', 'Garcia', 'Training Support Specialist', 'Olivia.Garcia@medisys.com', '+1 646-555-0125', '305 Third Ave W, Ryegate, MT 59074, Verenigde Staten'),
(40, 'Team11CORP USA', 'Mason', '', 'Clark', 'Hardware Engineer', 'Mason.Clark@innovent.com', '+1 213-555-0189', '216 Wright St, Farwell, MI 48622, Verenigde Staten'),
(41, 'Team11CORP DE', 'Lukas', '', 'Mueller', 'Industrial Simulator Specialist', 'Lukas.Mueller@technikpro.de', '+49 151 23456789', 'Eichkatzweg 49, 14055 Berlin, Duitsland'),
(42, 'Team11CORP DE', 'Leon', '', 'Schmidt', 'Software Trainer', 'Leon.Schmidt@baugruppe.de', '+49 152 34567890', 'Käthe-Kollwitz-Straße 21, 55543 Bad Kreuznach, Duitsland'),
(43, 'Team11CORP DE', 'Finn', '', 'Schneider', 'Access Control Specialist', 'Finn.Schneider@finanzwelt.de', '+49 160 45678901', 'Stationsvej 4, 6360 Tinglev, Denemarken'),
(44, 'Team11CORP DE', 'Emma', '', 'Fischer', 'Healthcare Software Specialist', 'Emma.Fischer@gesundplus.de', '+49 170 56789012', 'Altenburger Str. 63, 07546 Gera, Duitsland'),
(45, 'Team11CORP DE', 'Hanna', '', 'Weber', 'Game Developer', 'Hanna.Weber@kreativwerk.de', '+49 171 67890123', 'Goebenstraße 2, 33790 Halle (Westfalen), Duitsland'),
(46, 'Team11CORP FR', 'Lucas', '', 'Martin', 'Event Technician', 'Lucas.Martin@techavenir.fr', '+33 6 12 34 56 78', '7 Imp. des Pins, 46300 Gourdon, Frankrijk'),
(47, 'Team11CORP FR', 'Huggo', '', 'Bernard', 'Construction Consultant', 'Hugo.Bernard@batipro.fr', '+33 6 23 45 67 89', '7 Rue de la Mairie, 61170 Bures, Frankrijk'),
(48, 'Team11CORP FR', 'Jules', '', 'Dubois', 'Billing Manager', 'Jules.Dubois@finexpert.fr', '+33 6 34 56 78 90', '13 Rue de l\'Ormeau, 14700 Falaise, Frankrijk'),
(49, 'Team11CORP FR', 'Emma', '', 'Laurent', 'User Support Specialist', 'Emma.Laurent@santeplus.fr', '+33 6 45 67 89 01', '4 Grande Rue, 70500 Bousseraucourt, Frankrijk'),
(50, 'Team11CORP FR', 'Chloé', '', 'Moreau', 'Software Debugger', 'Chloe.Moreau@creativefrance.fr', '+33 6  56 78 90 12', '107 Rue Ernest Patas d\'Illiers, 45160 Olivet, Frankrijk');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Medewerkers`
--

CREATE TABLE `Medewerkers` (
  `ID` int NOT NULL,
  `Voornaam` varchar(50) NOT NULL,
  `Tussenvoegsel` varchar(15) NOT NULL,
  `Achternaam` varchar(50) NOT NULL,
  `Geboorte datum` varchar(15) NOT NULL,
  `Functie` varchar(150) NOT NULL,
  `Werk mail` varchar(130) NOT NULL,
  `Kantoor ruimte` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Medewerkers`
--

INSERT INTO `Medewerkers` (`ID`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geboorte datum`, `Functie`, `Werk mail`, `Kantoor ruimte`) VALUES
(1, 'Lars', '', 'Jansen', '14-03-1992', 'Database onderhouder', 'Lars.Jansen@Team11CORP.nl', 'R1'),
(2, 'Emma', 'de', 'Vries', '07-07-1998', 'Database onderhouder', 'Emma.deVries@Team11CORP.nl', 'R1'),
(3, 'Noah', '', 'Bakker', '21-01-2001', 'Database onderhouder', 'Noah.Bakker@Team11CORP.nl', 'R1'),
(4, 'Sophie', '', 'Visser', '03-11-1995', 'Database onderhouder', 'Sophie.Visser@Team11CORP.nl', 'R1'),
(5, 'Julia', '', 'Meijer', '18-05-1989', 'Klanten service', 'Julia.Meijer.Support@Team11CORP.nl', 'R2'),
(6, 'Sem', '', 'Mulder', '25-08-2003', 'Klanten service', 'Sem.Mulder.Support@Team11CORP.nl', 'R2'),
(7, 'Mila', 'de', 'Boer', '09-02-1997', 'Klanten service', 'Mila.deBoer.Support@Team11CORP.nl', 'R2'),
(8, 'Lucas', 'de', 'Vos', '30-06-2004', 'Klanten service', 'Lucas.deVos.Support@Team11CORP.nl', 'R2'),
(9, 'Zoë', '', 'Peters', '12-12-1990', 'Klanten service', 'Zoe.Peters.Support@Team11CORP.nl', 'R2'),
(10, 'Finn', '', 'Hendriks', '05-04-199', 'Klanten service', 'Finn.Hendriks.Support@Team11CORP.nl', 'R2'),
(11, 'Sara', 'van', 'Dijk', '27-09-2002', 'Klanten service', 'Sara.vanDijk.Support@Team11CORP.nl', 'R2'),
(12, 'Milan', 'de', 'Kok', '16-01-1994', 'Klanten service', 'Milan.deKok.Support@Team11CORP.nl', 'R2'),
(13, 'Noor', '', 'Jagers', '08-10-1988', 'Klanten service', 'Noor.Jagers.Support@Team11CORP.nl', 'R2'),
(14, 'Levi', '', 'Willems', '22-03-2005', 'Klanten service', 'Levi.Willems.Support@Team11CORP.nl', 'R2'),
(15, 'Tess', 'van', 'Leeuwen', '11-07-1996', 'Klanten service', 'Tess.vanLeeuwen.Support@Team11CORP.nl', 'R2'),
(16, 'Bram', '', 'Verhoeven', '29-12-2000', 'Klanten service', 'Bram.Verhoeven.Support@Team11CORP.nl', 'R2'),
(17, 'Eva', '', 'Kuipers', '02-06-1987', 'Klanten service', 'Eva.Kuipers.Support@Team11CORP.nl', 'R2'),
(18, 'Nout', '', 'Dekker', '14-02-2006', 'Klanten service', 'Nout.Dekker.Support@Team11CORP.nl', 'R2'),
(19, 'Isa', 'van den', 'Berg', '19-08-1993', 'Leidinggevende', 'Isa.vanDenBerg@Team11CORP.nl', 'R3'),
(20, 'Thijs', '', 'Bos', '06-05-2001', 'Leidinggevende', 'Thijs.Bos@Team11CORP.nl', 'R3'),
(21, 'Liv', '', 'Brouwer', '23-11-1991', 'Financien/boekhouder', 'Liv.Brouwer@Team11CORP.nl', 'R4'),
(22, 'Jesse', '', 'Timmermans', '10-04-2004', 'Financien/boekhouder', 'Jesse.Timmermans@Team11CORP.nl', 'R4'),
(23, 'Anna', '', 'Postma', '31-07-1997', 'Financien/boekhouder', 'Anna.Postma@Team11CORP.nl', 'R4'),
(24, 'Gijs', 'van ', 'Loon', '04-09-1986', 'Financien/boekhouder', 'Gijs.vanLoon@Team11CORP.nl', 'R4'),
(25, 'Elin', 'van der', 'Meer', '28-01-1995', 'Financien/boekhouder', 'Elin.vanDerMeer@Team11CORP.nl', 'R4'),
(26, 'Huggo', 'van', 'Vliet', '15-10-2002', 'Financien/boekhouder', 'Huggo.vanVliet@Team11CORP.nl', 'R4'),
(27, 'Roos', '', 'Zanders', '20-03-1989', 'Financien/boekhouder', 'Roos.Zanders@Team11CORP.nl', 'R4'),
(28, 'Mees', 'van', 'Rijn', '09-06-1998', 'Social/marketing team', 'Mees.vanRijn@Team11CORP.nl', 'R5'),
(29, 'Fenna', '', 'Schoten', '01-02-2003', 'Social/marketing team', 'Fenna.Schoten@Team11CORP.nl', 'R5'),
(30, 'Stijn', 'van ', 'Dam', '17-12-1999', 'Social/marketing team', 'Stijn.vanDam@Team11CORP.nl', 'R5'),
(31, 'Yara', '', 'Blom', '26-08-1999', 'Social/marketing team', 'Yara.Blom@Team11CORP.nl', 'R5'),
(32, 'Tygo', '', 'Smits', '13-05-2005', 'Social/marketing team', 'Tygo.Smits@Team11CORP.nl', 'R5'),
(33, 'Lotte', 'de', 'Graaf', '07-11-1996', 'Design team', 'Lotte.deGraaf@Team11CORP.nl', 'R6'),
(34, 'Guus', 'van den', 'Heuvel', '18-04-2000', 'Design team', 'Guus.vanDenHeuvel@Team11CORP.nl', 'R6'),
(35, 'Puck', '', 'Prins', '24-07-1991', 'Design team', 'Puck.Prins@Team11CORP.nl', 'R6'),
(36, 'Rens', 'van der', 'Wal', '05-01-2006', 'Design team', 'Rens.vanDerWal@Team11CORP.nl', 'R6'),
(37, 'Bo', '', 'Koster', '30-09-1994', 'Design team', 'Bo.Koster@Team11CORP.nl', 'R6'),
(38, 'Kas', '', 'Maas', '11-03-2001', 'Design team', 'Kas.Maas@Team11CORP.nl', 'R6'),
(39, 'Feline', 'van ', 'Wijk', '22-06-1998', 'Design team', 'Feline.vanWijk@Team11CORP.nl', 'R6'),
(40, 'Jort', 'van ', 'Schaik', '02-10-1997', 'Design team', 'Jort.vanSchaik@Team11CORP.nl', 'R6'),
(41, 'Elif', '', 'Aiden', '14-02-1993', 'Design team', 'Elif.Aiden@Team11CORP.nl', 'R6'),
(42, 'Amir', '', 'Hassan', '08-12-2004', 'Design team', 'Amir.Hassan@Team11CORP.nl', 'R6'),
(43, 'Sophia', '', 'Novak', '27-05-1999', 'It support', 'Sophia.Novak@Team11CORP.nl', 'R7'),
(44, 'Mateo', '', 'Vossen', '19-01-2002', 'It support', 'Mateo.Vossen@Team11CORP.nl', 'R7'),
(45, 'Elina', '', 'Anderson', '06-08-1998', 'It support', 'Elina.Anderson@Team11CORP.nl', 'R7'),
(46, 'Daniel', '', 'Kowalski', '25-03-2003', 'It support', 'Daniel.Kowalski@Team11CORP.nl', 'R7'),
(47, 'Maya', '', 'Singh', '12-11-1987', 'It support', 'Maya.Singh@Team11CORP.nl', 'R7'),
(48, 'Lucas', '', 'Ferreira', '21-04-2005', 'Beveiliging', 'Lucas.Ferreira@Team11CORP.nl', 'R8'),
(49, 'Aisha', '', 'Khan', '09-07-1996', 'Beveiliging', 'Aisha.Khan@Team11CORP.nl', 'R8'),
(50, 'Mats', '', 'Hummers', '16-10-2000', 'Beveiliging', 'Mats.Hummers@Team11CORP.nl', 'R8');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Opdrachten`
--

CREATE TABLE `Opdrachten` (
  `ID` int NOT NULL,
  `Klant naam` varchar(100) NOT NULL,
  `Titel` varchar(50) NOT NULL,
  `Omschrijving` varchar(200) NOT NULL,
  `Aanvraag datum` varchar(15) NOT NULL,
  `Benodigde kennis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Opdrachten`
--

INSERT INTO `Opdrachten` (`ID`, `Klant naam`, `Titel`, `Omschrijving`, `Aanvraag datum`, `Benodigde kennis`) VALUES
(1, 'Ruben van Dijk', 'Account gehackt.', 'Meneer Dijk geeft aan dat zijn account is gehackt en hij wilt graag terug toegang tot zijn account en alle wachtwoorden veranderen, hij wilt ook dat we checken welke schade er is gericht.', '19-03-2026', 'Wachtwoorden kunnen aanpassen en activiteit binnen een account kunnen zien.'),
(2, 'Sanne de Jong', 'Console gevallen.', 'Mevrouw de Jong heeft haar console tijdens verhuizen laten vallen. Ze vraagt zich af hoe het met de verzekering zit.', '10-03-2026', 'iemand van financiering moet met haar contact opnemen om het te bespreken.'),
(3, 'Tim van der Meer', 'game returnen na 5 uur speeltijd.', 'meneer van der meer heeft een game gekocht en wil het nu graag retoneren. hij heeft echter het all 5 uur gespeeld en 2 dagen op zijn console staan.', '16-02-2026', 'basis hulp desk die de regels uitlegd  en hoe het werkt'),
(4, 'Lisa Smit', 'Revalidatie game reageert traag', 'Vertraging in besturing tijdens gebruik door patiënten.', '28-02-2026', 'Netwerk & latency analyse'),
(5, 'Koen Bakker', 'Bouwsimulatie start niet op', 'Software opent niet op geleverde consoles.', '15-03-2026', 'Installatie en compatibiliteitscontrole'),
(6, 'Anneke Visser', 'Probleem met betaling/licentie', 'Onduidelijkheid over licentie van gaming software.', '20-02-2026', 'Licentiebeheer, facturatiekennis'),
(7, 'Mark Jansen', 'Nieuwe console werkt niet goed', 'Hardwareproblemen na installatie.', '17-03-2026', 'Hardware troubleshooting'),
(8, 'Femke Mulder', 'Marketing game bug', 'Game werkt niet correct tijdens campagne.', '19-03-2026', 'Buganalyse en patchbeheer'),
(9, 'Pieter de Vries', 'Console koppelt niet met kassasysteem', 'Integratieprobleem in winkel.', '15-03-2026', 'API / integratie kennis'),
(10, 'Laura van der Berg', 'Consoles vallen uit in horeca', 'Apparaten schakelen onverwachts uit.', '18-03-2026', 'iemand moet op locatie gaan kijken wat er mis is met de console of wanneer het gebeurt.'),
(11, 'Kevin Bos', 'Data wordt niet opgeslagen', 'Problemen met opslag van gebruikersdata.', '01-03-2026', 'iemand van database onderhouding, die kan checken of de data helemaal weg is en een oplossing kan vinden'),
(12, 'Iris Meijer', 'Medische game foutmelding', 'Foutmelding tijdens training.', '18-03-2026', 'foutmelding checken, kijken wat het is en hoe het hoort opgelost te worden.'),
(13, 'Tom de Boer', 'Simulatie hapert', 'Transportgame loopt niet soepel.', '19-03-2026', 'kijken hoe oud de console is, kijken of het alleen bij die game is en zo ja of er meerdere meldingen van zijn.'),
(14, 'Nina Kuipers', 'Inloggen lukt niet op schoolconsoles', 'Gebruikers kunnen niet inloggen.', '28-02-2026', 'Accountbeheer / authenticatie'),
(15, 'Rik Vos', 'Netwerkproblemen bij gaming', 'Verbinding valt steeds weg.', '13-03-2026', 'Netwerkbeheer (wifi, LAN)'),
(16, 'Esmee Peters', 'Console werkt niet op event locatie', 'Problemen met installatie op locatie.', '18-03-2026', 'Installatie op locatie, netwerkconfiguratie'),
(17, 'Bas Hendriks', 'VR training werkt niet goed', 'Beeld of tracking klopt niet.', '20-02-2026', 'VR hardware en tracking kennis'),
(18, 'Chantal van Leeuwen', 'Game loopt vast tijdens campagne', 'Applicatie crasht bij meerdere gebruikers.', '04-03-2026', 'Load & stress testing kennis'),
(19, 'Nick Dekker', 'Website koppeling werkt niet', 'Console integreert niet met platform.', '10-03-2026', 'Webintegratie / API kennis'),
(20, 'Ilse Brouwer', 'Zorgtraining slaat voortgang niet op', 'Data gaat verloren.', '27-02-2026', 'Database troubleshooting'),
(21, 'Dennis Jacobs', 'Simulatie geeft verkeerde resultaten', 'Onjuiste output in landbouwgame.', '06-03-2026', 'Validatie en softwarecontrole'),
(22, 'Marloes van Loon', 'Game laadt niet', 'Blijft hangen op laadscherm.', '15-03-2026', 'Software installatie en caching problemen'),
(23, 'Sander Verhoeven', 'Instellingen niet correct toegepast', 'Configuratieproblemen na installatie.', '05-03-2026', 'Configuratiebeheer'),
(24, 'Kim Sanders', 'Training werkt niet voor alle medewerkers', 'Accounts functioneren niet goed.', '27-02-2026', 'Gebruikersbeheer'),
(25, 'Roy van Dam', 'Simulatie geeft foutmelding', 'Energiegame stopt onverwacht.', '06-03-2026', 'Logbestanden analyseren'),
(26, 'Daphne Blom', 'Console beeldprobleem', 'Geen of slecht beeld tijdens gebruik.', '08-03-2026', 'Display en kabel troubleshooting'),
(27, 'Wouter van der Rijn', 'Nieuwe hardware wordt niet herkend', 'Koppeling met accessoires werkt niet.', '18-03-2026', 'Drivers en hardware koppeling'),
(28, 'Joyce Scholten', 'Rapportages ontbreken', 'Data niet zichtbaar in systeem.', '07-02-2026', 'Data-analyse en rapportagesystemen'),
(29, 'Erik van Vliet', 'Performanceproblemen', 'Simulatie loopt vast bij meerdere gebruikers.', '09-02-2026', 'Serverbelasting en performance'),
(30, 'Manon Koster', 'Probleem bij opstart nieuwe console', 'Installatie verloopt niet correct.', '11-02-2026', 'Installatie en setup kennis'),
(31, 'Oliver Smith', 'Demo console werkt niet', 'Problemen tijdens presentatie.', '12-02-2026', 'Hardware diagnose'),
(32, 'Harry Johnson', 'Training game start niet', 'Software opent niet.', '14-02-2026', 'Software installatie'),
(33, ' Jack Brown', 'Licentie probleem', 'Toegang tot game geblokkeerd.', '21-02-2026', 'Account/licentiebeheer'),
(34, 'Emily Taylor', 'Simulatie foutmelding', 'Medische training stopt plotseling.', '22-02-2026', 'Software troubleshooting'),
(35, 'Sophie Wilson', 'Game bug tijdens campagne', 'Werkt niet voor gebruikers.', '23-02-2026', 'Buganalyse'),
(36, 'Ethan Miller', 'Platform werkt niet correct', 'Problemen bij lancering.', '24-02-2026', 'Systeembeheer / backend kennis'),
(37, 'Eva Anderson', 'Console werkt niet in winkel', 'Klanten kunnen niet spelen.', '25-02-2026', 'Hardware + retail integratie'),
(38, 'Noah Thompson', 'Game crasht', 'Software sluit onverwacht.', '26-02-2026', 'Debugging software'),
(39, 'Olivia Garcia', 'Training game werkt niet', 'Gebruikers kunnen niet verder.', '02-03-2026', 'User support en software'),
(40, 'Mason Clark', 'Hardware probleem', 'Nieuwe console functioneert niet goed.', '03-03-2026', 'Technische hardwarekennis'),
(41, 'Lukas Mueller', 'Simulatie start niet', 'Industriële game werkt niet.', '07-03-2026', 'Software installatie'),
(42, 'Leon Schmidt', 'Training software fout', 'Verbinding valt steeds weg.', '09-03-2026', 'Troubleshooting'),
(43, 'Finn Schneider', 'Toegang geweigerd', 'Problemen met account/licentie.', '11-03-2026', 'Authenticatie / rechtenbeheer'),
(44, 'Emma Fisher', 'Medische game error', 'Fout tijdens gebruik.', '12-03-2026', 'Software analyse'),
(45, 'Hanna Weber', 'Game laadt niet', 'Blijft hangen.', '14-03-2026', 'Performance & installatie'),
(46, 'Lucas Martin', 'Console werkt niet op event', 'Installatie mislukt.', '16-03-2026', 'Installatie en netwerk'),
(47, 'Huggo Bernard', 'Simulatie probleem', 'Bouwgame werkt niet goed.', '17-02-2026', 'Software troubleshooting'),
(48, 'Jules Dubois', 'Betalingsprobleem', 'Licentie niet actief.', '18-02-2026', 'Facturatie en licentiebeheer'),
(49, 'Emma Laurent', 'Training werkt niet', 'Zorggame functioneert niet.', '19-02-2026', 'User support'),
(50, 'Chloé Moreau ', 'Game crasht tijdens gebruik', 'Applicatie stopt onverwacht.', '13-02-2026', 'Debugging');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Werkgevers`
--

CREATE TABLE `Werkgevers` (
  `ID` int NOT NULL,
  `Voornaam` varchar(25) NOT NULL,
  `Tussenvoegsel` varchar(10) NOT NULL,
  `Achternaam` varchar(30) NOT NULL,
  `Geboorte datum` date NOT NULL,
  `Werk mail` varchar(100) NOT NULL,
  `Vestiging` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Werkzaamheden`
--

CREATE TABLE `Werkzaamheden` (
  `ID` int NOT NULL,
  `Voornaam` varchar(50) NOT NULL,
  `Tussenvoegsel` varchar(15) NOT NULL,
  `Achternaam` varchar(50) NOT NULL,
  `Aantal gewerkte uren` varchar(3) NOT NULL,
  `Opdracht titel` varchar(50) NOT NULL,
  `Omschrijving werkzaamheden` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Werkzaamheden`
--

INSERT INTO `Werkzaamheden` (`ID`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Aantal gewerkte uren`, `Opdracht titel`, `Omschrijving werkzaamheden`) VALUES
(1, 'Lars', '', 'Jansen', '2', 'Account gehackt', 'Klant geholpen met resetten wachtwoord en account beveiligd'),
(2, 'Emma', 'de', 'Vries', '1.5', 'Console gevallen', 'Klant geïnformeerd over garantie en schadeprocedure'),
(3, 'Noah', '', 'Bakker', '2', 'Game duurt lang', 'Performance geanalyseerd en instellingen geoptimaliseerd'),
(4, 'Sophie', '', 'Visser', '1.5', 'Revalidatie game traag', 'Systeem gecontroleerd en software geoptimaliseerd'),
(5, 'Julia', '', 'Meijer', '2', 'Bouwsimulatie start niet', 'Installatie gecontroleerd en fout opgelost'),
(6, 'Sem', '', 'Mulder', '1', 'Licentie probleem', 'Licentie gecontroleerd en opnieuw geactiveerd'),
(7, 'Mila', 'de', 'Boer', '2', 'Console werkt niet', 'Hardware diagnose uitgevoerd'),
(8, 'Lucas', 'de', 'Vos', '1.5', 'Marketing game bug', 'Bug geregistreerd en workaround gegeven'),
(9, 'Zoë', '', 'Peters', '2', 'Koppeling kassasysteem', 'API probleem onderzocht en opgelost'),
(10, 'Finn', '', 'Hendriks', '1.5', 'Consoles vallen uit', 'Stroom en hardware gecontroleerd'),
(11, 'Sara', 'van', 'Dijk', '2', 'Data wordt niet opgeslagen', 'Database gecontroleerd en fout hersteld'),
(12, 'Milan', 'de', 'Kok', '1.5', 'Medische game fout', 'Logs geanalyseerd en issue opgelost'),
(13, 'Noor', '', 'Jagers', '2', 'Simulatie hapert', 'Performance probleem opgelost'),
(14, 'Levi', '', 'Willems', '1', 'Inloggen lukt niet', 'Account reset uitgevoerd'),
(15, 'Tess', 'van', 'Leeuwen', '1.5', 'Netwerkproblemen', 'Netwerkverbinding getest en verbeterd'),
(16, 'Bram', '', 'Verhoeven', '1', 'Console werkt niet op locatie', 'Installatiehulp geboden'),
(17, 'Eva', '', 'Kuipers', '2', 'VR werkt niet', 'VR tracking opnieuw ingesteld'),
(18, 'Nout', '', 'Dekker', '1.5', 'Game loopt vast', 'Buganalyse uitgevoerd'),
(19, 'Isa', 'van den', 'Berg', '2', 'Website koppeling', 'Integratie getest en gefixt'),
(20, 'Thijs', '', 'Bos', '2', 'Voortgang niet opgeslagen', 'Database fout opgelost'),
(21, 'Liv', '', 'Brouwer', '1.5', 'Simulatie fout', 'Validatie uitgevoerd'),
(22, 'Jesse', '', 'Timmermans', '1', 'Game laadt niet', 'Software opnieuw geïnstalleerd'),
(23, 'Anna', '', 'Postma', '1', 'Instellingen fout', 'Configuratie aangepast'),
(24, 'Gijs', 'van ', 'Loon', '1', 'Training werkt niet', 'Gebruikersrechten aangepast'),
(25, 'Elin', 'van der', 'Meer', '1.5', 'Simulatie foutmelding', 'Logs geanalyseerd'),
(26, 'Huggo', 'van', 'Vliet', '1.5', 'Beeldprobleem', 'Kabels en display gecontroleerd'),
(27, 'Roos', '', 'Zanders', '2', 'Hardware niet herkend', 'Drivers geïnstalleerd'),
(28, 'Mees', 'van', 'Rijn', '2', 'Rapportages ontbreken', 'Database en rapportage gefixt'),
(29, 'Fenna', '', 'Schoten', '2', 'Performance issues', 'Serverbelasting geanalyseerd'),
(30, 'Stijn', 'van ', 'Dam', '1.5', 'Console start niet', 'Setup opnieuw uitgevoerd'),
(31, 'Yara', '', 'Blom', '1', 'Demo werkt niet', 'Hardware check gedaan'),
(32, 'Tygo', '', 'Smits', '1', 'Training start niet', 'Installatie opgelost'),
(33, 'Lotte', 'de', 'Graaf', '1', 'Licentie probleem', 'Account/licentie hersteld'),
(34, 'Guus', 'van den', 'Heuvel', '1.5', 'Simulatie fout', 'Software nagekeken'),
(35, 'Puck', '', 'Prins', '1', 'Game bug', 'Bug gemeld en workaround'),
(36, 'Rens', 'van der', 'Wal', '2', 'Platform werkt niet', 'Backend gecontroleerd'),
(37, 'Bo', '', 'Koster', '1', 'Console winkel probleem', 'Klant geholpen'),
(38, 'Kas', '', 'Maas', '2', 'Game crasht', 'Debugging uitgevoerd'),
(39, 'Feline', 'van ', 'Wijk', '1', 'Training werkt niet', 'Gebruikers geholpen'),
(40, 'Jort', 'van ', 'Schaik', '2', 'Hardware probleem', 'Diagnose uitgevoerd'),
(41, 'Elif', '', 'Aiden', '2', 'Simulatie start niet', 'Installatie gefixt'),
(42, 'Amir', '', 'Hassan', '1', 'Training fout', 'Support gegeven'),
(43, 'Sophia', '', 'Novak', '1', 'Toegang geweigerd', 'Rechten aangepast'),
(44, 'Mateo', '', 'Vossen', '1.5', 'Medische error', 'Analyse uitgevoerd'),
(45, 'Elina', '', 'Anderson', '1.5', 'Game laadt niet', 'Performance verbeterd'),
(46, 'Daniel', '', 'Kowalski', '1', 'Console event probleem', 'Installatie opgelost'),
(47, 'Maya', '', 'Singh', '1.5', 'Simulatie probleem', 'Software gefixt'),
(48, 'Lucas', '', 'Ferreira', '1', 'Betalingsprobleem', 'Facturatie gecontroleerd'),
(49, 'Aisha', '', 'Khan', '1', 'Training werkt niet', 'Gebruiker ondersteund'),
(50, 'Mats', '', 'Hummers', '2', 'Game crasht', 'Debugging uitgevoerd');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Klanten`
--
ALTER TABLE `Klanten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Medewerkers`
--
ALTER TABLE `Medewerkers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Opdrachten`
--
ALTER TABLE `Opdrachten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Werkgevers`
--
ALTER TABLE `Werkgevers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Werkzaamheden`
--
ALTER TABLE `Werkzaamheden`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Klanten`
--
ALTER TABLE `Klanten`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `Medewerkers`
--
ALTER TABLE `Medewerkers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `Opdrachten`
--
ALTER TABLE `Opdrachten`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `Werkgevers`
--
ALTER TABLE `Werkgevers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Werkzaamheden`
--
ALTER TABLE `Werkzaamheden`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
