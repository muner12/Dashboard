-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 04:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `botony`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `contact`, `role`, `status`) VALUES
(7, 'bakhtmuner06@gmail.com', '$2y$10$u9V4Dq2raH3WawD.pFpHm./GS2A2pfmmNACYuZ8UIMkFybBQI/jB.', '03329611333', 'superAdmin', 1),
(8, 'sarzamin@gmail.com', '$2y$10$VzTeq42woU.r4zjXtpAed.SQBvN43hIDEbrnSV05xWZPDsJss6F1.', '123', 'subAdmin', 0),
(9, 'rahman@gmail.com', '$2y$10$daesP1ugLHBUiP4fJkHPvO2vrMVOIUEOJ6PBqLVrC6ionvnQUPkBi', '112233', 'user', 0),
(10, 'rahmanbunerwal91@gmail.com', '$2y$10$5AYELZkDtg1X6Dqn955Y7O.67RShZE/xbrUdtuOetm3GFzdSkBJoe', '223311', 'superAdmin', 1),
(11, 'admin@gmail.com', '$2y$10$twJmP2K4Lz/fS7FSTx.I9O45lmy1E1.tdCy36H7sroD.wxf/GNfnG', '033212345678', 'superAdmin', 0),
(12, 'a@gmail.com', '$2y$10$71tyS69xRHN1YC9uZDlgU.Iqs/1IZRRUjLXKflvMqLR85u.gPToU.', '123', 'user', 0),
(13, 'sarzaminkha101@gmail.com', '$2y$10$HqyZ7QtAfDjV/3enK5eNC.7lZUIMwY.0jtLqfYWVB/nqJxMgzl.vG', '03339699890', 'superAdmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `algue`
--

CREATE TABLE `algue` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `algue`
--

INSERT INTO `algue` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'Chlamydomonas reinhardtii', 'Chlorophyceae', 'Chlamydomonadaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '1', '2023', '2023-08-08', 'Chlamydomonas reinhardtii is a single-cell green alga about 10 micrometres in diameter that swims with two flagella. It has a cell wall made of hydroxyproline-rich glycoproteins, a large cup-shaped chloroplast, a large pyrenoid, and an eyespot that senses', '1.jpg'),
(2, 'Spirogyra sp', 'Zygnematophyceae', 'Zygnemataceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '2', '2023', '2023-08-08', 'Spirogyra, any member of a genus of some 400 species of free-floating green algae found in freshwater environments around the world.', '2.jpg'),
(3, 'Ulva lactuca', 'Ulvophyceae', 'Ulvaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '3', '2023', '2023-08-08', 'Ulva lactuca, also known by the common name sea lettuce, is an edible green alga in the family Ulvaceae. It is the type species of the genus Ulva. A synonym is U. fenestrata, referring to its \"windowed\" or \"holed\" appearance.', '3.jpg'),
(4, 'Caulerpa taxifolia', 'Bryopsidophyceae', 'Caulerpaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '4', '2023', '2023-08-08', 'Caulerpa taxifolia is a species of green seaweed, an alga of the genus Caulerpa, native to tropical waters of the Pacific Ocean, Indian Ocean, and Caribbean Sea. The species name taxifolia arises from the resemblance of its leaf-like fronds to those of th', '4.jpg'),
(5, 'Gracilaria verrucosa', 'Florideophyceae', 'Gracilariaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '5', '2023', '2023-08-08', 'Gracilaria verrucosa Greville is a species of Rhodophyceae of the genus Gracilaria, which can produce agar and carrageenan.', '5.jpg'),
(6, 'Porphyra umbilicalis', 'Bangiophyceae', 'Bangiaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '6', '2023', '2023-08-08', 'Porphyra umbilicalis, commonly called \"laver\", is a species of edible seaweed in the genus Porphyra used to make laverbread. The seaweed is commonly found around the west coast of Great Britain and east coast of Ireland along the Irish Sea, where it is al', '6.jpg'),
(7, 'Dictyota dichotoma', 'Phaeophyceae', 'Dictyotaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '7', '2023', '2023-08-08', 'Dictyota dichotoma is a species of Brown algae found in the temperate western and eastern Atlantic Ocean, the Mediterranean Sea, the Black Sea, the Red Sea and the western Indian Ocean.', '7.jpg'),
(8, 'Sargassum vulgare', 'Phaeophyceae', 'Sargassaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '8', '2023', '2023-08-08', 'Sargassum (Sargassum) vulgare C. Agardh, 1820 ; Status. alternate representation ; Accepted Name. Sargassum vulgare C.Agardh, 1820 ; Rank. Species ; Parent.', '8.jpg'),
(9, 'Codium fragile', 'Ulvophyceae', 'Codiaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '9', '2023', '2023-08-08', 'Codium fragile, known commonly as green sea fingers, dead man\'s fingers, felty fingers, forked felt-alga, stag seaweed, sponge seaweed, green sponge, green fleece, sea staghorn, and oyster thief, is a species of seaweed in the family Codiaceae.', '9.jpg'),
(10, 'Chondrus crispus', 'Florideophyceae', 'Gigartinaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '10', '2023', '2023-08-08', 'Chondrus crispus—commonly called Irish moss or carrageen moss —is a species of red algae which grows abundantly along the rocky parts of the Atlantic coasts of Europe and North America.', '10.jpg'),
(11, 'Fucus vesiculosus', 'Phaeophyceae', 'Fucaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '11', '2023', '2023-08-08', 'Fucus vesiculosus, known by the common names bladderwrack, black tang, rockweed, sea grapes, bladder fucus, sea oak, cut weed, dyers fucus, red fucus and rock wrack, is a seaweed found on the coasts of the North Sea, the western Baltic Sea and the Atlanti', '11.jpg'),
(12, 'Cladophora glomerata', 'Ulvophyceae', 'Cladophoraceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '12', '2023', '2023-08-08', 'Cladophora is a genus of reticulated filamentous Ulvophyceae (green algae). The genus Cladophora contains many species that are very hard to tell apart and classify, mainly because of the great variation in their appearances, which is affected by habitat,', '12..jpg'),
(13, 'Pediastrum boryanum', 'Chlorophyceae', 'Hydrodictyaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '13', '2023', '2023-08-08', 'Pediastrum develops colonies with a fixed number of cells, termed coenobia. In this case, the coenobia are composed of between 22 and 27 cells, which are orderly arranged in a flat disk. The diameter of a single coenobium ranges from 20 to 80 μm, making t', '13.jpg'),
(14, 'Hydrodictyon reticulatum', 'Chlorophyceae', 'Hydrodictyaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '14', '2023', '2023-08-08', 'Hydrodictyon reticulatum is a species of chlorophytes in the family Hydrodictyaceae. They are associated with freshwater habitat. They are native to Rio De Janeiro and Santa Catarina. Definition: This organism is known to be present in this location or re', '14.jpg'),
(15, 'Euglena gracilis', 'Euglenophyceae', 'Euglenaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '15', '2023', '2023-08-08', 'Euglena gracilis is a freshwater species of single-celled alga in the genus Euglena. It has secondary chloroplasts, and is a mixotroph able to feed by photosynthesis or phagocytosis.', '15.jpg'),
(16, 'Haematococcus pluvialis', 'Chlorophyceae', 'Haematococcaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '16', '2023', '2023-08-08', 'Haematococcus pluvialis is a freshwater species of Chlorophyta from the family Haematococcaceae. This species is well known for its high content of the strong antioxidant astaxanthin, which is important in aquaculture, and cosmetics.', '16.jpg'),
(17, 'Dunaliella salina', 'Chlorophyceae', 'Dunaliellaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '17', '2023', '2023-08-08', 'Dunaliella salina is a type of halophile unicellular green algae especially found in hypersaline environments, such as salt lakes and salt evaporation ponds.', '17.jpg'),
(18, 'Chara vulgaris', 'Charophyceae', 'Characeae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '18', '2023', '2023-08-08', 'Chara vulgaris, the common stonewort, is a green alga species in the genus Chara.', '18.jpg'),
(19, 'Nannochloropsis oculata', 'Eustigmatophyceae', 'Eustigmataceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '19', '2023', '2023-08-08', 'Nannochloropsis is a genus of algae comprising six known species. The genus in the current taxonomic classification was first termed by Hibberd. The species have mostly been known from the marine environment but also occur in fresh and brackish water.', '19.jpg'),
(20, 'Phaeodactylum tricornutum', 'Bacillariophyceae', 'Phaeodactylaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '20', '2023', '2023-08-08', 'Phaeodactylum tricornutum is a diatom. It is the only species in the genus Phaeodactylum. Unlike other diatoms, P. tricornutum can exist in different morphotypes and changes in cell shape can be stimulated by environmental conditions.', '20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `angiosperms`
--

CREATE TABLE `angiosperms` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angiosperms`
--

INSERT INTO `angiosperms` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'Rosa indica', 'Magnoliopsida', 'Rosaceae', 'Angiosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '1', '2023', '2023-08-12', 'Rosa cymosa is a species of climbing rose native to China, where it grows from the east coast in Fujian to western Sichuan at up to 1300 m, in warm areas in scrub and gorges, and in bamboo plantations. It is sometimes called the elderflower rose as its fl', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bryophytes`
--

CREATE TABLE `bryophytes` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bryophytes`
--

INSERT INTO `bryophytes` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'Marchantia polymorpha', 'Marchantiopsida', 'Marchantiaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '1', '2023', '2023-08-10', 'Marchantia polymorpha is a species of large thalloid liverwort in the class Marchantiopsida. M. polymorpha is highly variable in appearance and contains several subspecies. This species is dioicous, having separate male and female plants. M. polymorpha ha', '1.jpg'),
(2, 'Sphagnum palustre', 'Sphagnopsida', 'Sphagnaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '2', '2023', '2023-08-10', 'Sphagnum palustre, the prairie sphagnum or blunt-leaved bogmoss, is a species of peat moss from the genus Sphagnum, in the family Sphagnaceae. Like other mosses of this type it can soak up water up to the 30-fold amount of its own dry weight thanks to its', '2.jpg'),
(3, 'Polytrichum commune', 'Polytrichopsida', 'Polytrichaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '3', '2023', '2023-08-10', 'Polytrichum commune is a species of moss found in many regions with high humidity and rainfall. The species can be exceptionally tall for a moss with stems often exceeding 30 cm though rarely reaching 70 cm, but it is most commonly found at shorter length', '3.jpg'),
(4, 'Bryum argenteum', 'Bryopsida', 'Bryaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '4', '2023', '2023-08-10', 'Bryum argenteum, the silvergreen bryum moss or silvery thread moss, is a species of moss in the family Bryaceae. It is one of the most common mosses of urban areas and can be easily recognized without a microscope.', '4.jpg'),
(5, 'Funaria hygrometrica', 'Bryopsida', 'Funariaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '5', '2023', '2023-08-10', 'Funaria hygrometrica, the bonfire moss or common cord-moss, is a type of water moss which grows on shady, moist soil. It can also be found on moist walls and the crevices of rocks and places where recent fires have taken place.', '5.jpg'),
(6, 'Hypnum cupressiforme', 'Bryopsida', 'Hypnaceae', 'Algae', 'Pakistan', 'KPK', 'Rizwan Ullah', '6', '2023', '2023-08-10', 'Hypnum cupressiforme, the cypress-leaved plaitmoss or hypnum moss, is a common and widespread species of moss belonging to the genus Hypnum. It is found in all continents except Antarctica and occurs in a wide variety of habitats and climatic zones.', '6.jpg'),
(7, 'Riccia fluitans', 'Marchantiopsida', 'Ricciaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '7', '2023', '2023-08-10', 'Riccia fluitans, the floating crystalwort, is an aquatic floating plant of the liverwort genus Riccia which is popular among aquarists as a retreat for young fry and is used in live-bearing tanks. It can be found floating in ponds, and often forms thick m', '7.jpg'),
(8, 'Plagiomnium affine', 'Bryopsida', 'Mniaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '9', '2023', '2023-08-10', 'Plagiomnium affine, the many-fruited thyme-moss, is a species of thyme-moss found in old-growth boreal forests in North America, Europe and Asia, growing in moist, but not wet, basic to slightly acidic micro-habitats in woodland and in turf.', '9.jpg'),
(9, 'Dicranum scoparium', 'Bryopsida', 'Dicranaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '10', '2023', '2023-08-10', 'Dicranum scoparium, the broom forkmoss, is a species of dicranid moss, native to most of the northern hemisphere as well as Oceania. It usually forms tufts or mats on soil in dry to moist forested areas. As with many types of moss Broom moss grows in clum', '10.jpg'),
(10, 'Fissidens taxifolius', 'Bryopsida', 'Fissidentaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '11', '2023', '2023-08-10', 'Fissidens taxifolius is a species of moss in the Fissidentaceae family. It has a cosmopolitan distribution. Fissidens taxifolius is known to be able to use artificial light to grow in places which are otherwise devoid of natural liht, such as Crystal Cave', '11.jpg'),
(11, 'Pogonatum aloides', 'Bryopsida', 'Polytrichaceae', 'Bryophyte', 'pakistan', 'KPK', 'Rizwan Ullah', '12', '2023', '2023-08-10', 'Pogonatum aloides is a species of moss belonging to the family Polytrichaceae. It is native to Eurasia and Northern America.', '12.jpg'),
(12, 'Fontinalis antipyretica', 'Bryopsida', 'Fontinalaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '13', '2023', '2023-08-10', 'Fontinalis antipyretica, greater water-moss, or common water moss, is a species of submerged aquatic moss belonging to the subclass Bryidae. It is found in both still and flowing freshwater in Europe, Asia, Greenland and Africa.', '13.jpg'),
(13, 'Thuidium delicatulum', 'Bryopsida', 'Thuidiaceae', 'Bryophyte', 'pakistan', 'KPK', 'Rizwan Ullah', '14', '2023', '2023-08-10', 'Thuidium delicatulum, also known as the delicate fern moss or common fern moss, is a widespread species of moss in the family Thuidiaceae. It is found in North and South America from Alaska to Brazil.', '14.jpg'),
(14, 'Pellia epiphylla', 'Marchantiopsida', 'Pelliaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '15', '2023', '2023-08-10', 'Pellia epiphylla is a species of thallose liverwort. It occurs in North America, Europe, North Africa and parts of Asia. It grows in patches in damp, sheltered places on neutral or acidic substrates. It is common on the banks of rivers, streams and ditche', '15.jpg'),
(15, 'Calypogeia sphagnicola', 'Jungermanniopsida', 'Calypogeiaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '16', '2023', '2023-08-10', 'Calypogeia sphagnicola. View Profile. overview characteristics geography timeline information & media contact. Overview. Scientific Name.', '16.jpg'),
(16, 'Anomodon attenuatus', 'Bryopsida', 'Thuidiaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '17', '2023', '2023-08-10', 'Pseudanomodon attenuatus (syn. Anomodon attenuatus), the tree-skirt moss, poodle moss, or anomodon moss, is a species of moss in the family Neckeraceae or Anomodontaceae, depending on authority', '17.jpg'),
(17, 'Atrichum undulatum', ' Bryopsida', 'Polytrichaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '18', '2023', '2023-08-10', 'Atrichum undulatum is a species of mosses belonging to the family Polytrichaceae. It is native to Eurasia and North America.', '18.jpg'),
(18, 'Leucobryum glaucum', 'Bryopsida', 'Leucobryaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '19', '2023', '2023-08-10', 'Leucobryum glaucum, commonly known as leucobryum moss or pin cushion moss, is a species of haplolepideous mosses with a wide distribution in eastern North America and Europe.', '19.jpg'),
(19, 'Diphyscium foliosum', 'Bryopsida', 'Diphysciaceae', 'Bryophyte', 'Pakistan', 'KPK', 'Rizwan Ullah', '20', '2023', '2023-08-10', 'Diphyscium is a genus of mosses in the family Diphysciaceae. Members of this genus are small ... Diphyscium. Diphyscium foliosum (a, 113100-471926) 9526.', '20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fungi`
--

CREATE TABLE `fungi` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fungi`
--

INSERT INTO `fungi` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'Agaricaceae', 'Agaricomycetes', 'Agaricaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '1', '2023', '2023-08-08', 'The Agaricaceae are a family of basidiomycete fungi and include the genus Agaricus, as well as basidiomycetes previously classified in the families Tulostomataceae, Lepiotaceae, and Lycoperdaceae. ', '1.jpg'),
(2, 'Aspergillus niger', 'Eurotiomycetes', 'Aspergillaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '2', '2023', '2023-08-08', 'Aspergillus niger is a mold classified within the Nigri section of the Aspergillus genus. The Aspergillus genus consists of common molds found throughout the environment within soil and water, on vegetation, in fecal matter, on decomposing matter, and sus', '2.jpg'),
(3, 'Candida albicans', 'Saccharomycetes', 'Debaryomycetaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '3', '2023', '2023-08-08', 'Candida albicans is an opportunistic pathogenic yeast that is a common member of the human gut flora. It can also survive outside the human body. It is detected in the gastrointestinal tract and mouth in 40–60% of healthy adults.', '3.jpg'),
(4, 'Claviceps purpurea', 'Sordariomycetes', 'Clavicipitaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '4', '2023', '2023-08-08', 'Claviceps purpurea is an ergot fungus that grows on the ears of rye and related cereal and forage plants. Consumption of grains or seeds contaminated with the survival structure of this fungus, the ergot sclerotium, can cause ergotism in humans and other ', '4.jpg'),
(5, 'Cordyceps sinensis', 'Sordariomycetes', 'Cordycipitaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '6', '2023', '2023-08-08', 'Ophiocordyceps sinensis, known colloquially as caterpillar fungus, is an entomopathogenic fungus in the family Ophiocordycipitaceae. It is mainly found in the meadows above 3,500 metres on the Tibetan Plateau in Tibet and the Himalayan regions of Bhutan a', '6.jpg'),
(6, 'Ganoderma lucidum', 'Agaricomycetes', 'Ganodermataceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '7', '2023', '2023-08-08', 'Ganoderma is a genus of polypore fungi in the family Ganodermataceae that includes about 80 species, many from tropical regions. They have a high genetic diversity and are used in traditional Asian medicines. Ganoderma can be differentiated from other pol', '7.jpg'),
(7, 'Histoplasma capsulatum', 'Eurotiomycetes', 'Ajellomycetaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '8', '2023', '2023-08-08', 'Ganoderma is a genus of polypore fungi in the family Ganodermataceae that includes about 80 species, many from tropical regions. They have a high genetic diversity and are used in traditional Asian medicines. Ganoderma can be differentiated from other pol', '8.jpg'),
(8, 'Lycoperdon perlatum', 'Agaricomycetes', 'Agaricaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '9', '2023', '2023-08-08', 'The Agaricomycetes are a class of fungi in the division Basidiomycota. The taxon is roughly identical to that defined for the Homobasidiomycetes by Hibbett & Thorn, with the inclusion of Auriculariales and Sebacinales.', '9.jpg'),
(9, 'Morchella esculenta', 'Pezizomycetes', 'Morchellaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '10', '2023', '2023-08-08', 'Morchella esculenta is a species of fungus in the family Morchellaceae of the Ascomycota. It is one of the most readily recognized of all the edible mushrooms and highly sought after.', '10.jpg'),
(10, 'Penicillium chrysogenum', 'Eurotiomycetes', 'Aspergillaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '12', '2023', '2023-08-08', 'Penicillium chrysogenum is a species of fungus in the genus Penicillium. It is common in temperate and subtropical regions and can be found on salted food products, but it is mostly found in indoor environments, especially in damp or water-damaged buildin', '12.jpg'),
(11, 'Pleurotus ostreatus', 'Agaricomycetes', 'Pleurotaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '13', '2023', '2023-08-08', 'Pleurotus ostreatus, the oyster mushroom, oyster fungus, hiratake, or pearl oyster mushroom is a common edible mushroom. It is one of the more commonly sought wild mushrooms, though it can also be cultivated on straw and other media.', '13.jpg'),
(12, 'Puccinia graminis', 'Pucciniomycetes', 'Pucciniaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '14', '2023', '2023-08-08', 'Stem rust, also known as cereal rust, black rust, red rust or red dust, is caused by the fungus Puccinia graminis, which causes significant disease in cereal crops. Crop species that are affected by the disease include bread wheat, durum wheat, barley and', '15.jpg'),
(13, 'Rhizopus stolonifer', 'Zygomycetes', 'Rhizopodaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '15', '2023', '2023-08-08', 'Rhizopus stolonifer is commonly known as black bread mold. It is a member of Zygomycota and considered the most important species in the genus Rhizopus. It is one of the most common fungi in the world and has a global distribution although it is most comm', '15.jpg'),
(14, 'Saccharomyces cerevisiae', 'Saccharomycetes', 'Saccharomycetaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '16', '2023', '2023-08-08', 'Rhizopus stolonifer is commonly known as black bread mold. It is a member of Zygomycota and considered the most important species in the genus Rhizopus. It is one of the most common fungi in the world and has a global distribution although it is most comm', '16.jpg'),
(15, 'Taphrina deformans', 'Taphrinomycetes', 'Taphrinaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '17', '2023', '2023-08-08', 'Rhizopus stolonifer is commonly known as black bread mold. It is a member of Zygomycota and considered the most important species in the genus Rhizopus. It is one of the most common fungi in the world and has a global distribution although it is most comm', '17.jpg'),
(16, 'Trichoderma viride', 'Sordariomycetes', 'Hypocreaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '18', '2023', '2023-08-08', 'Trichoderma viride is a fungus and a biofungicide. It is used for seed- and soil treatment for suppression of various diseases caused by fungal pathogens', '18.jpg'),
(17, 'Ustilago maydis', 'Ustilaginaceae', 'Ustilaginaceae', 'Fungi', 'Pakistan', 'KPK', 'Rizwan Ullah', '19', '2023', '2023-08-08', 'The Ustilaginaceae are a family of smut fungi in the order Ustilaginomycetes. Collectively, the family contains 17 genera and 607 species.', '19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gymnosperms`
--

CREATE TABLE `gymnosperms` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gymnosperms`
--

INSERT INTO `gymnosperms` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'Pinus sylvestris', 'Pinopsida', 'Pinaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '1', '2023', '2023-08-10', 'Pinus sylvestris, the Scots pine, Scotch pine or Baltic pine, is a species of tree in the pine family Pinaceae that is native to Eurasia. It can readily be identified by its combination of fairly short, blue-green leaves and orange-red bark.', '1.jpg'),
(2, 'Picea abies', 'Pinopsida', 'Pinaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '2', '2023', '2023-08-10', 'Picea abies, the Norway spruce or European spruce, is a species of spruce native to Northern, Central and Eastern Europe. It has branchlets that typically hang downwards, and the largest cones of any spruce, 9–17 cm long.', '2.jpg'),
(3, 'Cycas revoluta', 'Cycadopsida', 'Cycadaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '3', '2023', '2023-08-10', 'Cycas revoluta is a species of gymnosperm in the family Cycadaceae, native to southern Japan including the Ryukyu Islands. It is one of several species used for the production of sago, as well as an ornamental plant. The sago cycad can be distinguished by', '3.jpg'),
(4, 'Ginkgo biloba', 'Ginkgoopsida', 'Ginkgoaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '4', '2023', '2023-08-10', 'Ginkgo biloba, commonly known as ginkgo or gingko, also known as the maidenhair tree, is a species of gymnosperm tree native to China. It is the last living species in the order Ginkgoales, which first appeared over 290 million years ago.', '4.jpg'),
(5, 'Juniperus communis', 'Pinopsida', 'Cupressaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '5', '2023', '2023-08-10', 'Juniperus communis, the common juniper, is a species of small tree or shrub in the cypress family Cupressaceae. An evergreen conifer, it has the largest geographical range of any woody plant, with a circumpolar distribution throughout the cool temperate N', '5.jpg'),
(6, 'Taxus baccata', 'Pinopsida', 'Taxaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '6', '2023', '2023-08-11', 'Taxus baccata is a species of evergreen tree in the family Taxaceae, native to Western Europe, Central Europe and Southern Europe, Northwest Africa, northern Iran, and Southwest Asia.', '6.jpg'),
(7, 'Araucaria heterophylla', 'Pinopsida', 'Araucariaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '7', '2023', '2023-08-11', 'Araucaria heterophylla is a species of conifer. As its vernacular name Norfolk Island pine implies, the tree is endemic to Norfolk Island, an external territory of Australia located in the Pacific Ocean between New Zealand and New Caledonia.', '7.jpg'),
(8, 'Cedrus libani', 'Pinopsida', ' Pinaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '8', '2023', '2023-08-11', 'Cedrus libani, the cedar of Lebanon or Lebanese cedar, is a species of tree in the genus cedrus, a part of the pine family, native to the mountains of the Eastern Mediterranean basin.', '8.jpg'),
(9, 'Abies alba', 'Pinopsida', 'Pinaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '9', '2023', '2023-08-11', 'Abies alba, the European silver fir or silver fir, is a fir native to the mountains of Europe, from the Pyrenees north to Normandy, east to the Alps and the Carpathians, Slovakia, Slovenia, Croatia, ', '9.jpg'),
(10, 'Thuja occidentalis', 'Pinopsida', 'Cupressaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '10', '2023', '2023-08-11', 'Thuja occidentalis, also known as northern white-cedar, eastern white-cedar, or arborvitae, is an evergreen coniferous tree, in the cypress family Cupressaceae, which is native to eastern Canada and much of the north-central and northeastern United States', '10.jpg'),
(11, 'Sequoia sempervirens', 'Pinopsida', 'Cupressaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '11', '2023', '2023-08-11', 'Sequoia sempervirens is the sole living species of the genus Sequoia in the cypress family Cupressaceae. Common names include coast redwood, coastal redwood, and California redwood. It is an evergreen, long-lived, monoecious tree living 1,200–2,200 years ', '11.jpg'),
(12, 'Cupressus sempervirens', 'Pinopsida', 'Cupressaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '12', '2023', '2023-08-11', 'Cupressus sempervirens, the Mediterranean cypress, is a species of cypress native to the eastern Mediterranean region, in northeast Libya, southern Albania, southern and coastal Bulgaria, southern .', '12.jpg'),
(13, 'Larix decidua', 'Pinopsida', 'Pinaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '13', '2023', '2023-08-11', 'Larix decidua, the European larch, is a species of larch native to the mountains of central Europe, in the Alps and Carpathian Mountains as well as the Pyrenees, with disjunct lowland populations in northern Poland and southern Lithuania. It is widely nat', '13.jpg'),
(14, 'Ephedra equisetina', 'Gnetopsida', 'Ephedraceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '14', '2023', '2023-08-11', 'Ephedra is a genus of gymnosperm shrubs. The various species of Ephedra are widespread in ... Ephedra equisetina Bunge – Ma huang – Caucasus, Central Asia, Siberia,', '14.jpg'),
(15, 'Metasequoia glyptostroboides', 'Pinopsida', 'Cupressaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '15', '2023', '2023-08-11', 'Metasequoia glyptostroboides, the dawn redwood, is a fast-growing, endangered deciduous conifer. It is the sole living species of the genus Metasequoia, one of three genera in the subfamily Sequoioideae of the family Cupressaceae.', '15.jpg'),
(16, 'Podocarpus macrophyllus', 'Pinopsida', 'Podocarpaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '16', '2023', '2023-08-11', 'Podocarpus macrophyllus is a conifer in the genus Podocarpus, family Podocarpaceae. It is the northernmost species of the genus, native to southern Japan and southern and eastern China. Common names in English include yew plum pine, Buddhist pine, fern pi', '16.jpg'),
(17, 'Gnetum gnemon', 'Gnetopsida', 'Gnetaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '17', '2023', '2023-08-11', 'Gnetum gnemon is a gymnosperm species of Gnetum, its native area spans from Mizoram and Assam in India down south through Malay Peninsula, Malay Archipelago and the Philippines in southeast Asia to the western Pacific islands. Common names include gnetum,', '17.jpg'),
(18, 'Welwitschia mirabilis', 'Gnetopsida', 'Welwitschiaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '18', '2023', '2023-08-11', 'Welwitschia mirabilis is endemic to the Kaokoveld Desert, which lies within the Namib Desert. The population is distributed southwards from the Bentiaba River .', '18.jpg'),
(19, 'Gnetum africanum', 'Gnetopsida', 'Gnetaceae', 'Gymnosperm', 'Pakistan', 'KPK', 'Rizwan Ullah', '20', '2023', '2023-08-11', 'Gnetum africanum is a vine gymnosperm species found natively throughout tropical Africa. Though bearing leaves, the genus Gnetum are gymnosperms, related to pine and other conifers.', '20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lichens`
--

CREATE TABLE `lichens` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(1200) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichens`
--

INSERT INTO `lichens` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'Cladonia rangiferina', 'Lecanoromycetes', 'Cladoniaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '1', '2023', '2023-08-11', 'Cladonia rangiferina, also known as reindeer cup lichen, reindeer lichen or grey reindeer lichen, is a light-colored fruticose, cup lichen species in the family Cladoniaceae. It grows in both hot and cold climates in well-drained, open environments.', '1.jpg'),
(2, 'Parmelia sulcata', 'Lecanoromycetes', ' Parmeliaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '2', '2023', '2023-08-11', 'Parmelia sulcata is a foliose lichen in the family Parmeliaceae. It is very tolerant of pollution and has a cosmopolitan distribution, making it one of the most common lichens. It harbours a unicellular Trebouxia green algal symbiont.', '2.jpg'),
(3, 'Usnea barbata', ' Lecanoromycetes', ' Parmeliaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '3', '2023', '2023-08-11', 'Usnea (Usnea barbata) is a lichen that grows on trees. Lichens appear to be a single plant, but they are really fungus and algae that grow together. Usnea contains chemicals that are thought to fight germs that might cause infections.', '3.jpg'),
(4, 'Peltigera rufescens', 'Lecanoromycetes', 'Peltigeraceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '4', '2023', '2023-08-11', 'Peltigera rufescens, commonly known as the field dog lichen, is a species of terricolous (ground-dwelling), foliose lichen in the family Peltigeraceae.', '4.jpg'),
(5, 'Xanthoria parietina', 'Lecanoromycetes', 'Teloschistaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '5', '2023', '2023-08-11', 'Xanthoria parietina is a foliose lichen in the family Teloschistaceae. It has wide distribution, and many common names such as common orange lichen, yellow scale, maritime sunburst lichen and shore lichen.', '5.jpg'),
(6, 'Ramalina farinacea', 'Lecanoromycetes', 'Ramalinaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '6', '2023', '2023-08-11', 'Ramalina farinacea is an epiphytic bushy shaped lichen common to areas with Mediterranean, subtropical, or temperate climates. It is in the genus Ramalina of the family Ramalinaceae. ', '6.jpg'),
(7, 'Physcia aipolia', 'Lecanoromycetes', 'Physciaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '7', '2023', '2023-08-11', 'Physcia aipolia, commonly known as the Hoary rosette lichen, is a lichen species of fungus in the genus Physcia, and family Lecanoromycetes. Physcia aipolia is a species of lichen in the family Physciaceae.', '7.jpg'),
(8, 'Lobaria pulmonaria', 'Lecanoromycetes', ' Lobariaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '8', '2023', '2023-08-11', 'Lobaria pulmonaria is a large epiphytic lichen consisting of an ascomycete fungus and a green algal partner living together in a symbiotic relationship with a cyanobacterium—a symbiosis involving members of three kingdoms of organisms.', '8.jpg'),
(9, 'Evernia prunastri', 'Lecanoromycetes', 'Parmeliaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '9', '2023', '2023-08-11', 'Evernia prunastri, also known as oakmoss, is a species of lichen. It can be found in many mountainous temperate forests throughout the Northern Hemisphere. Oakmoss grows primarily on the trunk and branches of oak trees, but is also commonly found on the bark of other deciduous trees and conifers such as fir and pine.', '9.jpg'),
(10, 'Flavoparmelia caperata', 'Lecanoromycetes', 'Parmeliaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '10', '2023', '2023-08-11', 'Flavoparmelia caperata, the common greenshield lichen, is a foliose lichen that grows on the bark of trees, and occasionally on rock', '10.jpg'),
(11, 'Cladonia stellaris', 'Lecanoromycetes', 'Cladoniaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '11', '2023', '2023-08-11', 'Cladonia stellaris or the star-tipped cup lichen is an ecologically important species of cup lichen that forms continuous mats over large areas of the ground in boreal and arctic regions around the circumpolar north.', '11.jpg'),
(12, 'Nephroma laevigatum', ' Lecanoromycetes', 'Peltigeraceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '13', '2023', '2023-08-11', 'Nephroma is a genus of medium to large foliose lichens. The genus has a widespread distribution. ... They are sometimes called kidney lichens, ', '13.jpg'),
(13, 'Cetraria islandica', 'Lecanoromycetes', 'Parmeliaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '14', '2023', '2023-08-11', 'Cetraria islandica, also known as true Iceland lichen or Iceland moss, is an Arctic-alpine lichen whose erect or upright, leaflike habit gives it the appearance of a moss, where its name likely comes from.', '14.jpg'),
(14, 'Umbilicaria mammulata', 'Lecanoromycetes', ' Umbilicariaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '15', '2023', '2023-08-11', 'Umbilicaria mammulata, or smooth rock tripe, is a foliose lichen found on boulders and rock walls. ', '15.jpg'),
(15, 'Bryoria fuscescens', 'Lecanoromycetes', 'Parmeliaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '16', '2023', '2023-08-11', 'Bryoria fuscescens is a species of lichen of the family Parmeliaceae. As of July 2021, its conservation status has not been estimated by the IUCN. In Iceland, where it grows as an epiphyte on downy birch stems and branches, it is classified as a vulnerable species.', '16.jpg'),
(16, 'Platismatia glauca', ' Lecanoromycetes', 'Parmeliaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '17', '2023', '2023-08-11', 'Platismatia glauca is a common and widespread species of corticolous, foliose lichen in the family Parmeliaceae.', '17.jpg'),
(17, 'Leptogium saturninum', 'Lecanoromycetes', 'Collemataceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '18', '2023', '2023-08-11', 'Leptogium saturninum is a species of lichen belonging to the family Collemataceae. It has cosmopolitan distribution.', '18.jpg'),
(18, 'Stereocaulon tomentosum', 'Lecanoromycetes', 'Stereocaulaceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '19', '2023', '2023-08-11', 'Stereocaulon tomentosum is a species of snow lichen belonging to the family Stereocaulaceae. Stereocaulon tomentosum. Scientific classification ', '19.jpg'),
(19, 'Lecanora muralis', 'Lecanoromycetes', 'Lecanoraceae', 'lichen', 'Pakistan', 'KPK', 'Rizwan Ullah', '20', '2023', '2023-08-11', 'Lecanora muralis is a waxy looking, pale yellowish green crustose lichen that usually grows in rosettes radiating from a center filled with disc-like yellowish-tan fruiting bodies. It grows all over the world. It is extremely variable in its characteristics as a single taxon, and may represent a complex of species.', '20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pteridophytes`
--

CREATE TABLE `pteridophytes` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pteridophytes`
--

INSERT INTO `pteridophytes` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'Adiantum capillus-veneris', ' Polypodiopsida', 'Pteridaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '1', '2023', '2023-08-10', 'Adiantum capillus-veneris, the Southern maidenhair fern, black maidenhair fern, maidenhair fern, and venus hair fern, is a species of ferns in the genus Adiantum and the family Pteridaceae with a subcosmopolitan worldwide distribution. It is cultivated as', '1.jpg'),
(2, 'Athyrium filix-femina', 'Polypodiopsida', ' Athyriaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '3', '2023', '2023-08-10', 'Athyrium filix-femina, the lady fern or common lady-fern, is a large, feathery species of fern native to temperate Asia, Europe, North Africa, Canada and the USA. It is often abundant in damp, shady woodland environments and is often grown for decoration.', '3.jpg'),
(3, 'Dryopteris filix-mas', 'Polypodiopsida', 'Dryopteridaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '5', '2023', '2023-08-10', 'Dryopteris filix-mas, the male fern, is a common fern of the temperate Northern Hemisphere, native to much of Europe, Asia, and North America. It favours damp shaded areas in the understory of woodlands, but also shady places on hedge-banks, rocks, and sc', '5.jpg'),
(4, 'Equisetum arvense', 'Equisetopsida', 'Equisetaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '6', '2023', '2023-08-10', 'Equisetum arvense, the field horsetail or common horsetail, is an herbaceous perennial plant in the Equisetidae sub-class, native throughout the arctic and temperate regions of the Northern Hemisphere.', '6.jpg'),
(5, 'Lycopodium clavatum', 'Lycopodiopsida', 'Lycopodiaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '7', '2023', '2023-08-10', 'Lycopodium clavatum is the most widespread species in the genus Lycopodium in the clubmoss family.', '7.jpg'),
(6, 'Matteuccia struthiopteris', 'Polypodiopsida', ' Onocleaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '8', '2023', '2023-08-10', 'Matteuccia is a genus of ferns with one species: Matteuccia struthiopteris. The species epithet struthiopteris comes from Ancient Greek words στρουθίων \"ostrich\" and πτερίς \"fern\".', '8.jpg'),
(7, 'Nephrolepis exaltata', 'Polypodiopsida', 'Nephrolepidaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '9', '2023', '2023-08-10', 'Nephrolepis exaltata, known as the sword fern or Boston fern, is a species of fern in the family Lomariopsidaceae. It is native to the Americas. This evergreen plant can reach as high as 40–90 centimetres, and in extreme cases up to 1.5 metres.', '9.jpg'),
(8, 'Osmunda regalis', 'Polypodiopsida', 'Osmundaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '10', '2023', '2023-08-10', 'Osmunda regalis, or royal fern, is a species of deciduous fern, native to Europe, Africa and Asia, growing in woodland bogs and on the banks of streams. The species is sometimes known as flowering fern due to the appearance of its fertile fronds.', '10.jpg'),
(9, 'Pellaea rotundifolia', 'Polypodiopsida', 'Pteridaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '11', '2023', '2023-08-10', 'Pellaea rotundifolia, the button fern, is a species of fern endemic to New Zealand, where it grows in scrub and forests. It is also a popular garden plant and house plant, tolerating low temperatures but not freezing.', '11.jpg'),
(10, 'Pteris vittata', 'Polypodiopsida', 'Pteridaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '12', '2023', '2023-08-10', 'Pteris vittata, commonly known variously as the Chinese brake, Chinese ladder brake, or simply ladder brake, is a fern species in the Pteridoideae subfamily of the Pteridaceae. It is indigenous to Asia, southern Europe, tropical Africa and Australia. The ', '12.jpg'),
(11, 'Selaginella lepidophylla', 'Selaginellopsida', 'Selaginellaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '13', '2023', '2023-08-10', 'Selaginella lepidophylla is a species of desert plant in the spikemoss family. Known as a \"resurrection plant\", S. lepidophylla is renowned for its ability to survive almost complete desiccation.', '13.jpg'),
(12, 'Tectaria cicutaria', 'Polypodiopsida', 'Tectariaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '14', '2023', '2023-08-10', 'Tectaria cicutaria, the button fern, is a species of fern in the family Tectariaceae, native to the Antilles. It has thin, soft, triangular fronds up to about 3.5 feet in length; blades are once- or twice-pinnate with the final segments pinnately-lobed. T', '14.jpg'),
(13, 'Thelypteris palustris', 'Polypodiopsida', 'Thelypteridaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '15', '2023', '2023-08-10', 'Thelypteris palustris', '15.jpg'),
(14, 'Polypodium vulgare', 'Polypodiopsida', 'Polypodiaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '16', '2023', '2023-08-10', 'Polypodium vulgare, the common polypody, is an evergreen fern of the family Polypodiaceae. Polypodium vulgare is an allotetraploid species, believed to have arisen by chromosome doubling of a sterile diploid hybrid between two ferns which are not known in', '16.jpg'),
(15, 'Onoclea sensibilis', 'Polypodiopsida', 'Dryopteridaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '17', '2023', '2023-08-10', 'Onoclea sensibilis, the sensitive fern, also known as the bead fern, is a coarse-textured, medium to large-sized deciduous perennial fern. The name comes from its sensitivity to frost, the fronds dying quickly when first touched by it.', '17.jpg'),
(16, 'Blechnum spicant', 'Polypodiopsida', 'Blechnaceae', 'Pteridophytes', 'Pakistan', 'KPK', 'Rizwan Ullah', '18', '2023', '2023-08-10', 'Struthiopteris spicant, syn. Blechnum spicant, is a species of fern in the family Blechnaceae, known by the common names hard-fern or deer fern. It is native to Europe, western Asia, northern Africa, and western North America. Like some other species in t', '18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_otp`
--

CREATE TABLE `user_otp` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `algue`
--
ALTER TABLE `algue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angiosperms`
--
ALTER TABLE `angiosperms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bryophytes`
--
ALTER TABLE `bryophytes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fungi`
--
ALTER TABLE `fungi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymnosperms`
--
ALTER TABLE `gymnosperms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lichens`
--
ALTER TABLE `lichens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pteridophytes`
--
ALTER TABLE `pteridophytes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otp`
--
ALTER TABLE `user_otp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `algue`
--
ALTER TABLE `algue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `angiosperms`
--
ALTER TABLE `angiosperms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bryophytes`
--
ALTER TABLE `bryophytes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fungi`
--
ALTER TABLE `fungi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gymnosperms`
--
ALTER TABLE `gymnosperms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lichens`
--
ALTER TABLE `lichens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pteridophytes`
--
ALTER TABLE `pteridophytes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_otp`
--
ALTER TABLE `user_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
