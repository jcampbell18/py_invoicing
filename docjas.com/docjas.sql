-- MySQL dump 10.13  Distrib 5.5.19, for Linux (x86_64)
--
-- Host: 97.74.149.7    Database: docjas
-- ------------------------------------------------------
-- Server version	5.0.96-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access` (
  `id` int(2) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `shortdesc` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `access` WRITE;
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` VALUES (1,'admin','Administrator Privileges');
INSERT INTO `access` VALUES (2,'guest','Limited Privileges');
INSERT INTO `access` VALUES (3,'client','Client Privileges');
/*!40000 ALTER TABLE `access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bids` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `client_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `sku_id` int(10) NOT NULL,
  `bid_date` date NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `approve` tinyint(1) NOT NULL default '0',
  `denied` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (1,1,5,5,'2010-10-23','Removal & Re-Installation of New Vinyl Window<br>\r\nRepair/Patch Misc. Drywall Patches (hallway & A/C unit hole)<br>\r\nRepair/Patch on Exterior (from the removed A/C unit)',800.00,1,0);
INSERT INTO `bids` VALUES (2,1,26,3,'2010-12-07','<p>Remove garbage inside and outside of commercial structure.</p>',675.00,1,0);
INSERT INTO `bids` VALUES (4,1,4,2,'0000-00-00','',10.00,1,0);
INSERT INTO `bids` VALUES (5,1,4,6,'2011-01-04','<p>Snow Shovel</p>',50.00,1,0);
INSERT INTO `bids` VALUES (6,1,28,6,'2011-01-04','<p>Snow Shovel</p>',50.00,1,0);
INSERT INTO `bids` VALUES (7,1,27,7,'2011-01-03','<p>Build and Install Railing for South &amp; East Decking</p>',450.00,0,1);
INSERT INTO `bids` VALUES (8,1,27,7,'2011-01-06','<p>Install a straight/simple deck railing (east side of the deck) on the south side of the house, and install an L-shaped deck railing on the east side of the house.&nbsp; Deck height&nbsp; is above 30&quot;, and requires a 36&quot; railing.&nbsp; Both decks will be stained and weatherproofed with matching color to deck as well as matching design to the west deck &amp; railing.</p>',875.00,1,0);
INSERT INTO `bids` VALUES (9,1,29,7,'2011-02-14','<p>- Install 3\' x 3\' Landing (anchored into concrete wall), attached to upper stairs</p>\r\n<p>- Install Stairs (3 steps) from the Landing to Floor</p>\r\n<p>- Install Posts and Railing System with Ballisters (spacing of 4&quot; apart)</p>',1700.00,1,0);
INSERT INTO `bids` VALUES (10,1,29,7,'2011-02-22','<p>Cover and secure Hot Tub</p>',400.00,0,1);
INSERT INTO `bids` VALUES (11,1,29,7,'2011-02-22','<p>Install Railing System (both sides) to Porch (closest to left Garage).&nbsp;</p>\r\n<p>Railing consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Bottom Rail</li>\r\n    <li>Balusters (no more than 4&quot; gaps).</li>\r\n</ul>',930.00,0,1);
INSERT INTO `bids` VALUES (12,1,29,7,'2011-03-22','<p>Install Railing System (one side) to Porch (closest to left Garage).&nbsp;</p>\r\n<p>Railing consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Cap, Top &amp; Middle Rail</li>\r\n</ul>\r\n<p>&nbsp;</p>',415.00,1,0);
INSERT INTO `bids` VALUES (13,1,31,3,'2011-03-30','<p>Remove debris/waste from property</p>',300.00,1,0);
INSERT INTO `bids` VALUES (14,1,31,7,'2011-04-18','<p>Install railing system to downstairs basement.</p>',125.00,1,0);
INSERT INTO `bids` VALUES (15,1,29,7,'2011-05-04','<p>Install Railing System (remaining side) to Porch (closest to left Garage).&nbsp;</p>\r\n<p>Railing consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Cap, Top &amp; Middle Rail</li>\r\n</ul>',415.00,1,0);
INSERT INTO `bids` VALUES (16,1,29,7,'2011-05-04','<p>Install Railing System (both sides) to Porch (front of house).&nbsp;</p>\r\n<p>Railing consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Cap, Top &amp; Middle Rail</li>\r\n</ul>',355.00,1,0);
INSERT INTO `bids` VALUES (17,1,33,7,'2011-05-04','<p>Install railing (single sided) on back porch</p>\r\n<p>Railing consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top Railing</li>\r\n    <li>Aluminum 1 1/2&quot;&nbsp; Piping with Galvanized (Schedule 40) Steel fittings</li>\r\n    <li>Anchored into Concrete</li>\r\n</ul>',995.00,0,1);
INSERT INTO `bids` VALUES (18,1,33,7,'2011-05-06','<p>Install Rail System (anchored into the concrete steps) on both sides of back porch</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>',500.00,1,0);
INSERT INTO `bids` VALUES (19,1,33,7,'2011-05-06','<p>Rebuild 2nd Bedroom</p>\r\n<ul>\r\n    <li>Reframe in bedroom wall, closet, and hallway closet</li>\r\n    <li>Re-wire bedroom light switch and outlet</li>\r\n    <li>Drywall open walls</li>\r\n    <li>Install Bedroom door, and bypass closet doors</li>\r\n    <li>Install Base/Trim, Door Casing, and Closet cleats &amp; dowels</li>\r\n    <li>Primer and Paint (White) Bedroom</li>\r\n</ul>\r\n<p>*Due to having a load-bearing wall being removed by previous owner, ceiling structure is sagging and needs to be jacked up to reinstall new load-bearing wall.</p>',4965.00,1,0);
INSERT INTO `bids` VALUES (20,1,35,7,'2011-05-09','<p>Install Rail System (anchored into the concrete steps) on one side of back porch</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n<li>Anchored into Concrete</li>\r\n</ul>',300.00,1,0);
INSERT INTO `bids` VALUES (21,1,30,7,'2011-05-13','<p>Install Rail System (also install extension on sides) on both sides of front porch.</p>\r\n<p>Install and configure 2 smoke detectors.</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<p>Extension (connecting stair to main landing railing) consists of:</p>\r\n<ul>\r\n    <li>Top and Bottom Rails</li>\r\n    <li>Supporting Balluster</li>\r\n</ul>\r\n<p>Smoke detectors are Photoelectric &amp; Ionization (Kidde PI9000)</p>',525.00,1,0);
INSERT INTO `bids` VALUES (22,1,23,11,'2011-05-10','<p>Dining Room:</p>\r\n<ul>\r\n    <li>Remove drywall and insulation from wall &amp; ceiling to expose framing</li>\r\n</ul>\r\n<ul>\r\n    <li>Scrap framing and spray mold (Helps eliminate, clean and prevent mold)</li>\r\n</ul>\r\n<ul>\r\n    <li>Repair/Reinstall new insulation and drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Re-Texture and Primer/Paint newly installed drywall&nbsp;</li>\r\n</ul>\r\n<p>NOTE: Once walls/ceilings are exposed if additional sources are identified we<br />\r\nwill advise.</p>',600.00,1,0);
INSERT INTO `bids` VALUES (23,1,23,11,'2011-05-10','<p>Kitchen (under sink):</p>\r\n<ul>\r\n    <li>Remove Countertop &amp; Cabinets from Wall</li>\r\n</ul>\r\n<ul>\r\n    <li>Remove effected drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Scrape and spray mold (Helps eliminate, clean and prevent mold) on Framing and the Back &amp; Bottom of Cabinets</li>\r\n</ul>\r\n<ul>\r\n    <li>Repair/Reinstall new drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Primer (using Killz primer) &amp; Paint drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Rebuild the sink cabinet\'s bottom (damaged and recommeneded to be replaced)</li>\r\n</ul>\r\n<ul>\r\n    <li>Reinstall Cabinets and Countertops</li>\r\n</ul>\r\n<p>NOTE:&nbsp; Once wall/cabinet is exposed if additional sources are identified we<br />\r\nwill advise.</p>',825.00,1,0);
INSERT INTO `bids` VALUES (24,1,36,8,'2011-05-18','<p>Lawn Care</p>',40.00,1,0);
INSERT INTO `bids` VALUES (25,1,36,8,'2011-05-20','<p>Lawn care maintenance consisting of mowing and trimming</p>',160.00,1,0);
INSERT INTO `bids` VALUES (26,1,37,5,'2011-05-23','<p>Re-connect Venting to Top of Water Tank</p>',80.00,1,0);
INSERT INTO `bids` VALUES (27,1,37,7,'2011-05-25','<p>Install Rail System on both sides of back porch.</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>',500.00,0,1);
INSERT INTO `bids` VALUES (28,1,37,7,'2011-06-02','<p>Install Rail System (anchored into the concrete steps) on both sides of back porch</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>',500.00,0,1);
INSERT INTO `bids` VALUES (29,1,39,7,'2011-06-03','<p>install a Simple Rail System for Basement Stairs</p>',150.00,0,1);
INSERT INTO `bids` VALUES (30,1,39,7,'2011-06-03','<p>Install Single Railing system from Garage to Basement.&nbsp; Railing system consisting of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top and Middle Rail and Top Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>anchored into concrete</li>\r\n</ul>',250.00,0,1);
INSERT INTO `bids` VALUES (31,1,39,7,'2011-06-07','<p>Install Railing system (both sides) between house and driveway.&nbsp; Railing system consisting of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top and Middle Rail and Top Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>anchored into concrete</li>\r\n</ul>\r\n<p>Note: Due to being an older residence and uneven/unlevel/unplumb concrete sides/brick stairs, posts will wedged (to be plumb) against concrete sides&nbsp; </p>\r\n<p>&nbsp;</p>',625.00,0,1);
INSERT INTO `bids` VALUES (32,1,40,7,'2011-06-08','<p>Install Rail System on both sides of front porch/stairs</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>Posts are anchored into concrete</li>\r\n</ul>',450.00,1,0);
INSERT INTO `bids` VALUES (33,1,38,7,'2011-06-09','<p>Install existing Railing/Banister between Living Room and Entry Way, railing for upper stairway, and install Railing system (both sides) between house and driveway.&nbsp; New railing system consisting of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top and Middle Rail and Top Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>anchored into concrete</li>\r\n</ul>',975.00,1,0);
INSERT INTO `bids` VALUES (35,1,40,7,'2011-06-09','<p>Install Rail System on both sides of garage entryway (stairs).</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>Posts anchored into concrete</li>\r\n</ul>',450.00,1,0);
INSERT INTO `bids` VALUES (34,1,38,5,'2011-06-09','<p><strong>Upstairs Bathroom</strong></p>\r\n<ul>\r\n    <li>Remove tiling &amp; drywall from bath tub area (tub surround)</li>\r\n</ul>\r\n<ul>\r\n    <li>Scrape and spray mold (helps eliminate, clean and prevent mold) on exposed framing</li>\r\n</ul>\r\n<ul>\r\n    <li>Install insulation (if needed), drywall, and new tiling</li>\r\n</ul>\r\n<ul>\r\n    <li>Re-caulk tiling/tub, primer &amp; paint the (upper) wall and ceiling</li>\r\n</ul>\r\n<p><strong>Downstairs Bathroom</strong></p>\r\n<ul>\r\n    <li>Remove remaining wallpaper, lighting fixture, and vanity mirror, and effected (moldy) drywall &amp; corners in soffit area</li>\r\n</ul>\r\n<ul>\r\n    <li>Scrape and spray mold (Helps eliminate, clean and prevent mold) on exposed framing</li>\r\n</ul>\r\n<ul>\r\n    <li>Install drywall to open areas (rebuilding soffit area)</li>\r\n</ul>\r\n<ul>\r\n    <li>Apply primer &amp; paint in bathroom</li>\r\n</ul>',1800.00,0,1);
INSERT INTO `bids` VALUES (36,1,29,4,'2011-07-07','<p>Remove the first 2-2.5\' of drywall &amp; insulation (from ground &amp; up), and removing any/all base/trim from walls throughout the basement, and adjoining bedrooms to expose all wall framing.&nbsp; All waste will be properly disposed of.</p>\r\n<p>Once walls are exposed if additional sources are identified we will advise.</p>\r\n<p>Estimated time frame to complete is 1-2 weeks.&nbsp; Dumpster/Roll-Off Container rental scheduling may cause delay upon bid approval.&nbsp;</p>',950.00,0,1);
INSERT INTO `bids` VALUES (37,1,29,4,'2011-07-08','<p>Demolition - Remove all effected drywall &amp; insulation, and remove all base/trim from walls throughout the  basement, and adjoining bedrooms to expose all wall framing.&nbsp;</p>\r\n<p>Waste - All waste  will be properly disposed of.</p>\r\n<p>Mold Remediation - Scrape and spray mold (Helps eliminate, clean and prevent mold) on exposed wall framing.&nbsp; </p>\r\n<p>Due to the source of the mold being from a drainage issue, we cannot garauntee future mold if current water penetration isn\'t remedied.</p>\r\n<p>Estimated time frame to complete is 3-4 weeks.&nbsp; Dumpster/Roll-Off  Container rental scheduling may cause delay upon bid approval.</p>\r\n<p>&nbsp;</p>',4175.00,0,1);
INSERT INTO `bids` VALUES (38,1,41,7,'2011-08-01','<p>Install Rail System on single side of main entryway (stairs).</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>Posts anchored into concrete</li>\r\n</ul>',400.00,1,0);
INSERT INTO `bids` VALUES (39,1,42,7,'2011-08-01','<p>Install Rail System on both sides of entryway (stairs).</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>Posts anchored into concrete</li>\r\n</ul>',950.00,0,1);
INSERT INTO `bids` VALUES (40,1,43,7,'2011-08-08','<p>Install Rail System on both sides of main entryway (stairs).</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>Posts anchored into concrete</li>\r\n</ul>',0.00,0,1);
INSERT INTO `bids` VALUES (41,1,43,7,'2011-08-10','<p>Install Rail System on both sides of front of main entryway (stairs), and both sides of side entry of main entryway (stairs &amp; ramp).</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<br />',835.00,1,0);
INSERT INTO `bids` VALUES (42,1,38,5,'2011-08-24','<p><strong>Upstairs Bathroom</strong></p>\r\n<ul>\r\n    <li>Repair Hole</li>\r\n</ul>\r\n<ul>\r\n    <li>Replace missing tile</li>\r\n</ul>\r\n<p>Note:&nbsp; The new tiles will not be exactly matching the olders style, but will be solid color.</p>',650.00,1,0);
INSERT INTO `bids` VALUES (43,1,45,7,'2011-09-13','<p>Install Rail System on both sides of rear entryway/patio (stairs).</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>',695.00,0,1);
INSERT INTO `bids` VALUES (44,1,42,7,'2011-12-01','<p>Front Porch - install 4\'x6\' railing (currently missing)</p>\r\n<p>Rear Stairs (on new addition) - install stair railing on both sides</p>\r\n<p>Garage/Exterior Door - install stair railing on both sides</p>',400.00,1,0);
INSERT INTO `bids` VALUES (45,1,52,7,'2011-12-29','<p>Purchase &amp; Install a Dishwasher, Slide-In Range, and matching Microwave/Range Hood</p>',3000.00,0,1);
INSERT INTO `bids` VALUES (46,1,44,7,'2012-01-06','<p>Front Door/Entryway</p>\r\n<ul>\r\n    <li>Install stairs</li>\r\n</ul>\r\n<ul>\r\n    <li>Install stair railing on both sides</li>\r\n</ul>\r\n<p>Interior - Downstairs</p>\r\n<ul>\r\n    <li>Install 2 handrails</li>\r\n</ul>',600.00,0,0);
INSERT INTO `bids` VALUES (47,2,53,7,'2012-03-20','<p>Wall &amp; Ceiling Prep and Installation *</p>\r\n<ul>\r\n    <li>Remove all foundation wall insulation</li>\r\n    <li>Frame entire area - studs spaced at 16&quot;</li>\r\n    <li>R-19 insulation in each wall bay of the eletrical panel wall</li>\r\n    <li>R-30 insulation in each ceiling bay</li>\r\n    <li>Soffits will be built to accomodate duct-work, piping, etc</li>\r\n    <li>Drywall at 1/2&quot; thickness, and Rounded corner beads</li>\r\n    <li>Matching textures for ceiling (spray-on knock down) and walls (light orange peel)</li>\r\n</ul>\r\n<p>Install Electrical throughout basement **</p>\r\n<ul>\r\n    <li>Outlets (spaced accordingly to code)</li>\r\n    <li>Light boxes placed (including under stairs)</li>\r\n    <li>Light Switches</li>\r\n    <li>Coxial Cable (TV cable) and Outlet</li>\r\n    <li>RJ11 Cable (Phone cable) and Outlet</li>\r\n</ul>\r\n<p>Custom Shelving System ***</p>\r\n<ul>\r\n    <li>4\' x 18&quot; x 2\' (WxHxD) - 5 shevles per stack</li>\r\n    <li>includes a Valence to hide dowel/curtain system, and casing along floor</li>\r\n    <li>L-shaped shelving in corners</li>\r\n    <li>Area next to stairs will have a shelfing system along with a non-shelf unit with countertop (opening of 5\'x28&quot;) - Rounded countertop corners</li>\r\n</ul>\r\n<p>Finish Work Installation ****</p>\r\n<ul>\r\n    <li>French Doors to utility area</li>\r\n    <li>Bi-Fold to understair area</li>\r\n    <li>Custom Slab Door to dead-space area</li>\r\n    <li>Matching casing along floor</li>\r\n    <li>Sills at window base</li>\r\n</ul>\r\n<p>* Any remaining furniture will be properly covered with thick 4mm plastic</p>\r\n<p>** Client will provide light fixtures, pick out light switches and provide certain outlet (i.e., phone, cable, and light switch) locations upon bid approval</p>\r\n<p>*** Client will provide a curtain system for the shelving system</p>\r\n<p>**** Client will stain and paint all new construction</p>\r\n<p>&nbsp;</p>',12880.00,0,0);
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `changelog`
--

DROP TABLE IF EXISTS `changelog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `changelog` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `changelog_id` int(8) NOT NULL,
  `changelog_date` date NOT NULL,
  `desc` varchar(255) NOT NULL,
  `complete` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `changelog`
--

LOCK TABLES `changelog` WRITE;
/*!40000 ALTER TABLE `changelog` DISABLE KEYS */;
INSERT INTO `changelog` VALUES (1,1,'2011-05-25','Tested and fixed all bugs regarding Mileage',1);
INSERT INTO `changelog` VALUES (2,1,'2011-05-24','Updated Mileage DB & Pages to reflect vehicles and multiple invoice referencing',1);
INSERT INTO `changelog` VALUES (3,2,'0000-00-00','<s>Creating/Updating new folders when invoices are made</s>',1);
INSERT INTO `changelog` VALUES (4,2,'0000-00-00','<s>Creating new (invoice) folder when bids are approved</s>',1);
INSERT INTO `changelog` VALUES (5,3,'0000-00-00','<s>Create links to Google Map from Project Sites</s>',1);
INSERT INTO `changelog` VALUES (6,3,'0000-00-00','<s>Update invoices to reflect materials/tools costs & taxes</s>',1);
INSERT INTO `changelog` VALUES (7,3,'0000-00-00','<s>Yearly/Monthly/Daily Reports regarding Mileage, Invoicing, etc</s>',1);
INSERT INTO `changelog` VALUES (8,1,'2011-05-29','Added Map Links under ProjectSites, and updated database',1);
INSERT INTO `changelog` VALUES (9,1,'2011-05-29','Updated Content page by integrating database to page',1);
INSERT INTO `changelog` VALUES (10,3,'0000-00-00','<s>Add Print button to main Invoice page</s>',1);
INSERT INTO `changelog` VALUES (11,3,'0000-00-00','<s>Add text field and submit button to create/update Changelog page </s>',1);
INSERT INTO `changelog` VALUES (12,3,'0000-00-00','<s>Update Mileage subcategory under Invoices to reflect that particular invoice(s)</s>',1);
INSERT INTO `changelog` VALUES (13,3,'0000-00-00','<s>Re-structure Dashboard (fresh code/images) to reflect reports, unpaid, paid, unpaid/uncomplete, etc)</s>',1);
INSERT INTO `changelog` VALUES (14,3,'0000-00-00','<s>Create Users page - utilizing and restricting access</s>',1);
INSERT INTO `changelog` VALUES (15,3,'0000-00-00','<s>Open New Tab/Page when Printing Invoice</s>',1);
INSERT INTO `changelog` VALUES (16,1,'2011-06-01','Added text field and submit button to create road map or bug fixes on Changelog page',1);
INSERT INTO `changelog` VALUES (17,1,'2011-06-19','Re-structure Dashboard (fresh code/images) to reflect reports, unpaid, paid, unpaid/uncomplete, etc)',1);
INSERT INTO `changelog` VALUES (18,1,'2011-06-19','Update Mileage subcategory under Invoices to reflect that particular invoice(s)',1);
INSERT INTO `changelog` VALUES (19,2,'0000-00-00','Renaming Project Sites folders - doesn\'t rename folders (error)',0);
INSERT INTO `changelog` VALUES (20,1,'2011-06-19','Creating/Updating new folders when invoices are made',1);
INSERT INTO `changelog` VALUES (21,1,'2011-06-19','Added Print button to main Invoice page',1);
INSERT INTO `changelog` VALUES (22,1,'2011-06-19','Opens New Tab/Page when Printing Invoice',1);
INSERT INTO `changelog` VALUES (23,1,'2011-06-20','Created Users page - utilizing and restricting access',1);
INSERT INTO `changelog` VALUES (24,1,'2011-06-20','Created User Login Background/Picture',1);
INSERT INTO `changelog` VALUES (25,3,'0000-00-00','<s>Invoices Page - re-align columns to match records</s>',1);
INSERT INTO `changelog` VALUES (26,3,'0000-00-00','<s>Bids Page - add Print button to UNapproved bids</s>',1);
INSERT INTO `changelog` VALUES (27,1,'2011-06-20','Bids Page - added Print button to UNapproved bids',1);
INSERT INTO `changelog` VALUES (28,1,'2011-06-20','Invoices Page - re-aligned columns to match records',1);
INSERT INTO `changelog` VALUES (29,1,'2011-06-22','Fixed creating new (invoice) folder when bids are approved',1);
INSERT INTO `changelog` VALUES (30,1,'2011-07-13','Added Project Cost and Profit field under a Invoice',1);
INSERT INTO `changelog` VALUES (31,1,'2011-07-22','Created Vehicles page along and added to Contents - SubNav',0);
INSERT INTO `changelog` VALUES (32,1,'2011-07-22','Created Vendors page along and added to Contents - SubNav',1);
INSERT INTO `changelog` VALUES (33,1,'2011-07-22','Created Expense Categories page along and added to Contents - SubNav',1);
INSERT INTO `changelog` VALUES (34,1,'2011-07-22','Created Expenses page along and added to Contents - SubNav',1);
INSERT INTO `changelog` VALUES (35,1,'2011-07-22','Updated Expenses page with ability to Group the receipts and Itemize each entry',1);
INSERT INTO `changelog` VALUES (36,1,'2011-09-06','Dashboard - Changed last 3 months Stat to Monthly stats for current year',1);
INSERT INTO `changelog` VALUES (37,3,'0000-00-00','Expenses - add the ability to add multiple items from a receipt (opposed to single item entry)',0);
INSERT INTO `changelog` VALUES (38,1,'2011-09-07','Reports - Yearly/Monthly/Daily Reports regarding Mileage, Invoicing, etc',1);
INSERT INTO `changelog` VALUES (39,3,'0000-00-00','<s>Reports - make detailed expense reports</s>',1);
INSERT INTO `changelog` VALUES (40,3,'0000-00-00','Users - build users list, profile, ability to update/change/delete users',0);
INSERT INTO `changelog` VALUES (41,2,'0000-00-00','<s>Reports - Subnav needs to be updated</s>',1);
INSERT INTO `changelog` VALUES (42,1,'2011-09-14','Reports - updated Subnav',1);
INSERT INTO `changelog` VALUES (43,1,'2011-09-17','Updated FCKeditor to CKEditor - enabling ability to edit on mobile phone',1);
INSERT INTO `changelog` VALUES (44,1,'2011-10-10','Created favicon image (png) and inserted into HTML code for Browser tabs',1);
INSERT INTO `changelog` VALUES (45,1,'2011-10-12','Mobile-Friendly - Converted from HTML 4.01 header info to XHTML 1.0',1);
INSERT INTO `changelog` VALUES (46,1,'2011-10-12','Added XHTML and CSS validated icons in Footer',1);
INSERT INTO `changelog` VALUES (47,3,'0000-00-00','start converting for mobile-friendly site',0);
INSERT INTO `changelog` VALUES (48,3,'0000-00-00','<s>Reports - Annual reports (Archives)</s>',1);
INSERT INTO `changelog` VALUES (49,3,'0000-00-00','<s>Reports - individual Vehicle itemized reports</s>',1);
INSERT INTO `changelog` VALUES (50,3,'0000-00-00','<s>Invoices - Paid date</s>',1);
INSERT INTO `changelog` VALUES (52,1,'2012-01-23','Reports - Annual reports (Archives)',1);
INSERT INTO `changelog` VALUES (53,1,'2012-01-23','Reports - individual Vehicle itemized reports',1);
INSERT INTO `changelog` VALUES (54,1,'2012-01-23','Invoices - Paid date',1);
/*!40000 ALTER TABLE `changelog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `changelog_category`
--

DROP TABLE IF EXISTS `changelog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `changelog_category` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `changelog_category`
--

LOCK TABLES `changelog_category` WRITE;
/*!40000 ALTER TABLE `changelog_category` DISABLE KEYS */;
INSERT INTO `changelog_category` VALUES (1,'CHANGELOG');
INSERT INTO `changelog_category` VALUES (2,'KNOWN BUGS');
INSERT INTO `changelog_category` VALUES (3,'NEED TO UPDATE/ADD-ONS');
/*!40000 ALTER TABLE `changelog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `business_name` varchar(35) NOT NULL,
  `contact_name` varchar(35) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `fax` varchar(16) NOT NULL,
  `email` varchar(35) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Keller Williams','Doc Nicolson','802 N Washington St','Spokane','WA','99201','(509) 991-4085','(509) 458-4001','doc@fivestarspokane.com');
INSERT INTO `clients` VALUES (2,'Eleen Northcutt','Eleen Northcutt','12428 N Denver Drive','Mead','WA','99218','(509) 466-5848','','eleen.northcutt@mead354.org');
INSERT INTO `clients` VALUES (3,'Leon Campbell','Leon Campbell','10720 E 31st Ave','Spokane Valley','WA','99206','(509) 891-2245','','lncampbell48@gmail.com');
INSERT INTO `clients` VALUES (4,'Phoenix Reconstruction LLC','Jason L Campbell','7925 N Scott Rd','Spokane','WA','99217','(509) 217-8893','','jason@phoenix-reconstruction.com');
INSERT INTO `clients` VALUES (5,'Mountain West Janitorial LLC','Jason L Campbell','7925 N Scott Rd','Spokane','WA','99217','(509) 217-8893','','jason@mountainwestjanitorial.com');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `invoice_id` int(8) NOT NULL,
  `vendor_id` int(8) NOT NULL,
  `expense_category_id` int(8) NOT NULL,
  `vehicles_id` int(8) NOT NULL,
  `pdate` date NOT NULL,
  `name` varchar(250) NOT NULL,
  `qty` int(4) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `subtotal` decimal(7,2) NOT NULL,
  `ytax` tinyint(1) NOT NULL,
  `tax` decimal(12,5) NOT NULL,
  `total` decimal(12,5) NOT NULL,
  `receipt_reference` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=367 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` VALUES (1,59,1,7,0,'2011-07-08','4*x4*-8&#39; Pressure Treated Lumber',3,8.97,26.91,0,2.34117,29.25117,'4714 00002 33858 07/08/2011 7164','2011-07-10_08-52-39_195.jpg');
INSERT INTO `expense` VALUES (2,59,1,6,0,'2011-07-08','5/8*x4 1/4* Sleeve Anchor',12,2.63,31.56,0,2.74572,34.30572,'4714 00002 33858 07/08/2011 7164','2011-07-10_08-52-39_195.jpg');
INSERT INTO `expense` VALUES (3,59,1,7,0,'2011-07-11','Solid Deck Stain (White)',1,27.74,27.74,0,2.41338,30.15338,'4714 00002 44913 07/11/2011 7192','2011-07-13_10-04-12_320.jpg');
INSERT INTO `expense` VALUES (4,59,1,7,0,'2011-07-11','2*x4*-8&#39; Douglas Fir Stud',2,1.78,3.56,0,0.30972,3.86972,'4714 00002 44913 07/11/2011 7192','2011-07-13_10-04-12_320.jpg');
INSERT INTO `expense` VALUES (5,59,1,7,0,'2011-07-11','2*x4*-10&#39; Douglas Fir Stud',1,3.18,3.18,0,0.27666,3.45666,'4714 00002 44913 07/11/2011 7192','2011-07-13_10-04-12_320.jpg');
INSERT INTO `expense` VALUES (6,59,1,7,0,'2011-07-11','2*x6*-12&#39; Douglas Fir Stud',1,5.80,5.80,0,0.50460,6.30460,'4714 00002 44913 07/11/2011 7192','2011-07-13_10-04-12_320.jpg');
INSERT INTO `expense` VALUES (7,59,1,7,0,'2011-07-11','3* Deck Screws',1,9.37,9.37,0,0.81519,10.18519,'4714 00002 44913 07/11/2011 7192','2011-07-13_10-04-12_320.jpg');
INSERT INTO `expense` VALUES (8,59,1,7,0,'2011-07-11','Paint Brushes (2 Pack)',1,4.97,4.97,0,0.43239,5.40239,'4714 00002 44913 07/11/2011 7192','2011-07-13_10-04-12_320.jpg');
INSERT INTO `expense` VALUES (9,0,14,2,1,'2011-05-20','Gas',1,41.27,41.27,0,0.00000,41.27000,'004018','0');
INSERT INTO `expense` VALUES (10,0,42,2,1,'2011-05-26','Gas',1,40.56,40.56,0,3.52872,44.08872,'9030187','0');
INSERT INTO `expense` VALUES (293,50,1,6,0,'2011-05-31','Texture Hopper Gun TP200',1,69.00,69.00,0,6.00300,75.00300,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (11,0,6,5,2,'2011-07-17','Fram HM8A Oil Filter',1,7.99,7.99,0,0.69513,8.68513,'2661-192976','0');
INSERT INTO `expense` VALUES (12,0,6,5,2,'2011-07-17','Quaker State 10w-30 Motor Oil (5Qt)',1,22.49,22.49,0,1.95663,24.44663,'2661-192976','0');
INSERT INTO `expense` VALUES (13,0,6,5,1,'2011-07-17','Fram HM3593A Oil Filter',1,7.99,7.99,0,0.69513,8.68513,'2661-192976','0');
INSERT INTO `expense` VALUES (14,0,6,5,1,'2011-07-17','Castrol 10w-30 Full Synthetic Motor Oil (1Gal)',1,27.99,27.99,0,2.43513,30.42513,'2661-192976','0');
INSERT INTO `expense` VALUES (15,0,5,5,2,'2011-07-18','Peak 50/50 Antifreeze (1Gal)',1,12.99,12.99,0,1.13013,14.12013,'3739-210369','0');
INSERT INTO `expense` VALUES (16,0,5,6,2,'2011-07-18','Funnel (2Qt)',1,2.29,2.29,0,0.19923,2.48923,'3739-210369','0');
INSERT INTO `expense` VALUES (17,57,8,6,0,'2011-06-16','Gas Container (5Gal)',1,11.99,11.99,0,1.04313,13.03313,'27656','2011-06-16_17-01-06_8.jpg');
INSERT INTO `expense` VALUES (18,58,9,7,0,'2011-06-22','3/8&#34;x2 1/4&#34; Lag Screws',6,0.36,2.16,0,0.18792,2.34792,'062204115992','2011-06-25_21-04-34_480.jpg');
INSERT INTO `expense` VALUES (19,58,9,7,0,'2011-06-22','7/16&#34; Hex Nut',1,0.12,0.12,0,0.01044,0.13044,'062204115992','2011-06-25_21-04-34_480.jpg');
INSERT INTO `expense` VALUES (20,58,9,7,0,'2011-06-22','7/16&#34;x1 1/2&#34; Hex Screw',1,0.15,0.15,0,0.01305,0.16305,'062204115992','2011-06-25_21-04-34_480.jpg');
INSERT INTO `expense` VALUES (21,58,9,7,0,'2011-06-22','Spray Paint Can (Flat Black for Metal)',1,4.99,4.99,0,0.43413,5.42413,'062204115992','2011-06-25_21-04-34_480.jpg');
INSERT INTO `expense` VALUES (22,49,1,7,0,'2011-05-28','Dryer Venting Tube',1,6.57,6.57,0,0.57159,7.14159,'4714 09 12501 05/28/2011 1330','2011-11-10_23-39-45_484.jpg');
INSERT INTO `expense` VALUES (23,49,1,7,0,'2011-05-28','Heavy Venting Hood',1,10.98,10.98,0,0.95526,11.93526,'4714 09 12501 05/28/2011 1330','2011-11-10_23-39-45_484.jpg');
INSERT INTO `expense` VALUES (24,49,1,7,0,'2011-05-28','Fleximetal Tape',1,10.78,10.78,0,0.93786,11.71786,'4714 09 12501 05/28/2011 1330','2011-11-10_23-39-45_484.jpg');
INSERT INTO `expense` VALUES (25,50,1,6,0,'2011-05-28','10&#39;x25&#39; 3.5Mil Plastic',1,12.98,12.98,0,1.12926,14.10926,'4714 09 12501 05/28/2011 1330','2011-11-10_23-39-45_484.jpg');
INSERT INTO `expense` VALUES (26,50,1,6,0,'2011-05-28','3* Blue Masking Tape',1,19.97,19.97,0,1.73739,21.70739,'4714 09 12501 05/28/2011 1330','2011-11-10_23-39-45_484.jpg');
INSERT INTO `expense` VALUES (27,50,1,7,0,'2011-05-28','Reducer',1,7.30,7.30,0,0.63510,7.93510,'4714 09 12501 05/28/2011 1330','2011-11-10_23-39-45_484.jpg');
INSERT INTO `expense` VALUES (28,0,10,2,2,'2011-05-01','Gas (Both Tanks)',1,100.00,100.00,0,0.00000,100.00000,'380390501111402','0');
INSERT INTO `expense` VALUES (29,0,11,2,2,'2011-05-17','Gas (Both Tanks)',1,98.00,98.00,0,0.00000,98.00000,'921 08-020','0');
INSERT INTO `expense` VALUES (30,0,12,2,2,'2011-06-06','Gas (Rear Tank)',1,23.00,23.00,0,0.00000,23.00000,'007317','0');
INSERT INTO `expense` VALUES (31,0,13,5,2,'2011-07-07','Retainer-Door Panel - Part# 40-0793',8,0.95,7.60,1,0.00000,7.60000,'W930092','0');
INSERT INTO `expense` VALUES (32,0,13,4,2,'2011-07-07','Fuel Pump (Mechanical) Part #43-4709 (+ Shipping)',1,40.70,40.70,1,0.00000,40.70000,'W930092','0');
INSERT INTO `expense` VALUES (33,0,10,2,1,'2011-01-03','Gas',1,33.73,33.73,1,0.00000,33.73000,'821523064','0');
INSERT INTO `expense` VALUES (34,0,11,2,1,'2011-01-10','Gas',1,36.32,36.32,1,0.00000,36.32000,'921 16-013','0');
INSERT INTO `expense` VALUES (35,0,14,2,1,'2011-01-23','Gas',1,31.95,31.95,1,0.00000,31.95000,'48007','0');
INSERT INTO `expense` VALUES (36,0,15,2,1,'2011-01-31','Gas',1,35.21,35.21,1,0.00000,35.21000,'65791','0');
INSERT INTO `expense` VALUES (37,0,14,2,1,'2011-02-07','Gas',1,35.43,35.43,1,0.00000,35.43000,'50682','0');
INSERT INTO `expense` VALUES (38,0,16,2,1,'2011-02-13','Gas',1,32.37,32.37,0,0.00000,32.37000,'G4H5831','0');
INSERT INTO `expense` VALUES (39,0,17,2,1,'2011-02-21','Gas',1,33.84,33.84,0,0.00000,33.84000,'E0J8292','0');
INSERT INTO `expense` VALUES (40,61,1,7,0,'2011-08-10','2*x4*-10&#39; Redwood',1,8.37,8.37,0,0.72819,9.09819,'4714 02 48963 08/10/2011 1644','2011-08-10_19-06-39_507.jpg');
INSERT INTO `expense` VALUES (41,61,1,7,0,'2011-08-10','2*x6*-10&#39; Redwood',1,12.47,12.47,0,1.08489,13.55489,'4714 02 48963 08/10/2011 1644','2011-08-10_19-06-39_507.jpg');
INSERT INTO `expense` VALUES (42,61,1,6,0,'2011-08-10','220Grit Disc Sandpaper',1,10.47,10.47,0,0.91089,11.38089,'4714 02 48963 08/10/2011 1644','2011-08-10_19-06-39_507.jpg');
INSERT INTO `expense` VALUES (43,61,1,6,0,'2011-08-10','5/8*x4 1/4* Sleeve Anchor',2,2.63,5.26,0,0.45762,5.71762,'4714 02 48963 08/10/2011 1644','2011-08-10_19-06-39_507.jpg');
INSERT INTO `expense` VALUES (44,0,20,2,1,'2011-08-10','Gas',1,34.77,34.77,0,3.02499,37.79499,'171530','0');
INSERT INTO `expense` VALUES (45,63,1,1,0,'2011-08-17','Dewalt D55168 15Gallon Compressor',1,389.00,389.00,0,33.84300,422.84300,'4714 01 90918 08/17/2011 3369','2011-11-10_13-08-01_896.jpg');
INSERT INTO `expense` VALUES (46,63,19,1,0,'2011-08-17','Johnson and Johnson Laser Level',1,156.42,156.42,0,0.00000,156.42000,'105-0812704-4942622','105-0812704-4942622.jpg');
INSERT INTO `expense` VALUES (47,62,1,7,0,'2011-08-17','4*x4*-8 Douglas Fir',3,7.33,21.99,0,1.91313,23.90313,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (48,62,1,7,0,'2011-08-17','2*x6*-10 Douglas Fir',2,3.76,7.52,0,0.65424,8.17424,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (49,62,1,7,0,'2011-08-17','2*x4*-8 Douglas Fir',3,1.78,5.34,0,0.46458,5.80458,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (50,62,1,7,0,'2011-08-17','1*x4*-6 Pine',12,3.81,45.72,0,3.97764,49.69764,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (51,62,1,6,0,'2011-08-17','1/2* Galanized Washers (25 Pack)',1,7.31,7.31,0,0.63597,7.94597,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (52,62,1,6,0,'2011-08-17','2 1/2* Deck Screws (Tan)',1,9.37,9.37,0,0.81519,10.18519,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (53,62,1,6,0,'2011-08-17','3* Deck Screws (Tan)',1,29.98,29.98,0,2.60826,32.58826,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (54,62,1,6,0,'2011-08-17','1/2* Galvanized Hex Bolts',12,2.44,29.28,0,2.54736,31.82736,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (55,62,1,6,0,'2011-08-17','1/2* Galvanized Hex Nuts',12,0.38,4.56,0,0.39672,4.95672,'4714 01 92470 08/17/2011 3369','2011-08-24_19-30-12_612.jpg');
INSERT INTO `expense` VALUES (56,0,15,2,2,'2011-08-20','Gas',1,40.00,40.00,1,0.00000,40.00000,'No Receipt - see Bank Records','0');
INSERT INTO `expense` VALUES (57,63,1,7,0,'2011-08-22','2*x4*-12',2,3.67,7.34,0,0.63858,7.97858,'4714 01 09454 08/22/2011 0162','2011-08-24_19-29-44_264.jpg');
INSERT INTO `expense` VALUES (58,63,1,7,0,'2011-08-22','2*x4*-8',30,1.78,53.40,0,4.64580,58.04580,'4714 01 09454 08/22/2011 0162','2011-08-24_19-29-44_264.jpg');
INSERT INTO `expense` VALUES (59,63,1,6,0,'2011-08-21','50foot Rubber Hose 300PSI',1,29.67,29.67,0,2.58129,32.25129,'4714 07 29087 08/21/2011 1985','2011-08-24_19-29-50_256.jpg');
INSERT INTO `expense` VALUES (60,63,1,6,0,'2011-08-21','3inch 21degree 10d Framing Nails',1,25.35,25.35,0,2.20545,27.55545,'4714 07 29087 08/21/2011 1985','2011-08-24_19-29-50_256.jpg');
INSERT INTO `expense` VALUES (61,63,1,6,0,'2011-08-21','Freud Diablo 12inch 80T Blade',1,54.97,54.97,0,4.78239,59.75239,'4714 07 29087 08/21/2011 1985','2011-08-24_19-29-50_256.jpg');
INSERT INTO `expense` VALUES (62,63,1,6,0,'2011-08-21','1/4inch Brass Hose Kit',1,5.49,5.49,0,0.47763,5.96763,'4714 07 29087 08/21/2011 1985','2011-08-24_19-29-50_256.jpg');
INSERT INTO `expense` VALUES (63,63,1,7,0,'2011-08-23','4&#39;x8&#39;x1/2* Drywall',10,6.55,65.50,0,5.69850,71.19850,'4714 02 91802 08/23/2011 6325','2011-08-24_19-29-55_251.jpg');
INSERT INTO `expense` VALUES (64,63,1,6,0,'2011-08-23','Ultra-Light Drywall Adhesive Tape',1,7.97,7.97,0,0.69339,8.66339,'4714 02 91802 08/23/2011 6325','2011-08-24_19-29-55_251.jpg');
INSERT INTO `expense` VALUES (65,63,1,7,2,'2011-08-24','4&#39;x8&#39;x1/2* Drywall',2,6.55,13.10,0,1.13970,14.23970,'4714 02 95261 08/24/2011 5302','2011-11-10_14-01-17_615.jpg');
INSERT INTO `expense` VALUES (66,63,1,7,2,'2011-08-24','8&#39; Corner Pieces',8,2.62,20.96,0,1.82352,22.78352,'4714 02 95261 08/24/2011 5302','2011-11-10_14-01-17_615.jpg');
INSERT INTO `expense` VALUES (67,63,1,6,2,'2011-08-24','Ulta-Light Adhesive Drywall Tape',1,7.97,7.97,0,0.69339,8.66339,'4714 02 95261 08/24/2011 5302','2011-11-10_14-01-17_615.jpg');
INSERT INTO `expense` VALUES (68,63,1,7,2,'2011-08-24','All-Purpose Drywall Mud',1,12.74,12.74,0,1.10838,13.84838,'4714 02 95261 08/24/2011 5302','2011-11-10_14-01-17_615.jpg');
INSERT INTO `expense` VALUES (69,63,1,7,2,'2011-08-24','3m Sand-Sponge (2 Pack)',1,4.14,4.14,0,0.36018,4.50018,'4714 02 95261 08/24/2011 5302','2011-11-10_14-01-17_615.jpg');
INSERT INTO `expense` VALUES (70,63,21,6,0,'2011-08-24','FibaTape Mesh Tape Applicator',1,39.25,39.25,0,3.41475,42.66475,'864-110349','All-Wall-84386.jpg');
INSERT INTO `expense` VALUES (71,63,1,7,0,'2011-08-25','All Purpose Drywall Mud',1,12.74,12.74,0,1.10838,13.84838,'4714 18 15364 08/25/2011 1743','2011-08-25_18-14-31_859.jpg');
INSERT INTO `expense` VALUES (72,63,1,6,0,'2011-08-25','3M Dust Mask N95',1,19.95,19.95,0,1.73565,21.68565,'4714 18 15364 08/25/2011 1743','2011-08-25_18-14-31_859.jpg');
INSERT INTO `expense` VALUES (73,63,1,7,0,'2011-08-25','All Purpose Caulk',1,3.97,3.97,0,0.34539,4.31539,'4714 18 15364 08/25/2011 1743','2011-08-25_18-14-31_859.jpg');
INSERT INTO `expense` VALUES (74,63,1,7,0,'2011-08-30','Drywall Primer and Sealant',1,54.98,54.98,0,4.78326,59.76326,'4714 08 79148 08/30/2011 4747','2011-09-07_16-51-58_458.jpg');
INSERT INTO `expense` VALUES (75,63,1,6,0,'2011-08-30','Handy Paint Pail',1,9.97,9.97,0,0.86739,10.83739,'4714 08 79148 08/30/2011 4747','2011-09-07_16-51-58_458.jpg');
INSERT INTO `expense` VALUES (76,63,1,6,1,'2011-08-30','3* Brush',1,9.97,9.97,0,0.86739,10.83739,'4714 08 79148 08/30/2011 4747','2011-09-07_16-51-58_458.jpg');
INSERT INTO `expense` VALUES (77,63,1,7,0,'2011-08-30','Paint Pan (3 Pack)',1,2.97,2.97,0,0.25839,3.22839,'4714 08 80237 08/30/2011 4747','2011-09-07_16-52-05_437.jpg');
INSERT INTO `expense` VALUES (78,63,1,7,0,'2011-08-30','Interior Eggshell White Paint (1 Quart)',1,10.78,10.78,0,0.93786,11.71786,'4714 08 80237 08/30/2011 4747','2011-09-07_16-52-05_437.jpg');
INSERT INTO `expense` VALUES (79,63,1,6,0,'2011-08-30','9* Paint Roller',1,4.97,4.97,0,0.43239,5.40239,'4714 08 80237 08/30/2011 4747','2011-09-07_16-52-05_437.jpg');
INSERT INTO `expense` VALUES (80,63,1,7,0,'2011-08-30','Interior Eggshell White Paint (1 Gallon)',2,23.96,47.92,0,4.16904,52.08904,'4714 08 80237 08/30/2011 4747','2011-09-07_16-52-05_437.jpg');
INSERT INTO `expense` VALUES (81,63,1,7,0,'2011-08-31','24* BiFold Doors',1,29.98,29.98,0,2.60826,32.58826,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (82,63,1,7,0,'2011-08-31','MDF Base/Trim 14&#39; (Package of 12)',1,63.38,63.38,0,5.51406,68.89406,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (83,63,1,7,0,'2011-08-31','ByPass Door Kit',1,11.98,11.98,0,1.04226,13.02226,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (84,63,1,7,0,'2011-08-31','Metal Shelf/Dowel Bracket/Support',1,2.97,2.97,0,0.25839,3.22839,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (85,63,1,7,0,'2011-08-31','14* Floor Registers',2,9.97,19.94,0,1.73478,21.67478,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (86,63,1,7,0,'2011-08-31','24* Door Slabs (ByPass Doors)',2,21.00,42.00,0,3.65400,45.65400,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (87,63,1,7,0,'2011-08-31','1*x6* MDF',5,7.96,39.80,0,3.46260,43.26260,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (88,63,1,7,0,'2011-08-31','1*-12&#39; Dowel (Closet Pole)',12,1.96,23.52,0,2.04624,25.56624,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (89,63,1,7,0,'2011-08-31','30* Prehung Interior Door',1,57.00,57.00,0,4.95900,61.95900,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (90,63,1,7,0,'2011-08-31','Dowel/Pole Sockets',2,1.38,2.76,0,0.24012,3.00012,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (91,63,1,7,0,'2011-08-31','Door Stop',1,1.97,1.97,0,0.17139,2.14139,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (92,63,1,7,0,'2011-08-31','Ivory Single Light Swith Plate',1,0.22,0.22,0,0.01914,0.23914,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (93,63,1,7,0,'2011-08-31','KwikSet Passage Door Handle',1,8.97,8.97,0,0.78039,9.75039,'4714 02 20251 08/31/2011 8905','2011-09-07_16-51-15_82.jpg');
INSERT INTO `expense` VALUES (94,64,2,7,0,'2011-09-03','3&#39;x5&#39;x1/2* WonderBoard (Cement)',1,9.79,9.79,0,0.85173,10.64173,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (95,64,2,6,0,'2011-09-03','1/4* Trowel',1,2.79,2.79,0,0.24273,3.03273,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (96,64,2,6,0,'2011-09-03','14* Manual Tile Cutter',1,18.97,18.97,0,1.65039,20.62039,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (97,64,2,7,0,'2011-09-03','4 1/4*x4 1/4* Almond Tile',1,15.68,15.68,0,1.36416,17.04416,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (98,64,2,6,0,'2011-09-03','1 1/4* RockOn Screws',1,7.57,7.57,0,0.65859,8.22859,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (99,64,2,7,0,'2011-09-03','Grout (White) - Premixed',1,8.97,8.97,0,0.78039,9.75039,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (100,64,2,7,0,'2011-09-03','Acryl Pro (1 Gallon)',1,11.97,11.97,0,1.04139,13.01139,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (101,64,2,6,0,'2011-09-03','Sponge',1,2.99,2.99,0,0.26013,3.25013,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (102,64,2,7,0,'2011-09-03','1/16* Tile Spacers',1,2.97,2.97,0,0.25839,3.22839,'4719 01 49278 09/03/2011 7015','2011-09-04_12-35-47_788.jpg');
INSERT INTO `expense` VALUES (103,64,1,6,0,'2011-09-04','8* Grout Float Tool',1,9.97,9.97,0,0.86739,10.83739,'4714 59 18727 09/04/2011 2086','2011-09-04_12-35-29_556.jpg');
INSERT INTO `expense` VALUES (104,64,1,6,0,'2011-09-04','3/16* Steel Trowel Tool',1,7.44,7.44,0,0.64728,8.08728,'4714 59 18727 09/04/2011 2086','2011-09-04_12-35-29_556.jpg');
INSERT INTO `expense` VALUES (105,0,22,2,1,'2011-09-03','Gas',1,42.28,42.28,1,0.00000,42.28000,'92000 11 011 1','0');
INSERT INTO `expense` VALUES (106,66,1,7,0,'2011-09-13','2* Exterior Specialty/Wood Screw (#6)',1,4.18,4.18,0,0.36366,4.54366,'4714 56 30355 09/13/2011 4345','2011-09-14_11-26-39_129.jpg');
INSERT INTO `expense` VALUES (107,66,1,6,0,'2011-09-13','Ryobi Bit Set',1,9.97,9.97,0,0.86739,10.83739,'4714 56 30355 09/13/2011 4345','2011-09-14_11-26-39_129.jpg');
INSERT INTO `expense` VALUES (108,66,1,7,0,'2011-09-13','Kwikset Combo Pack (Door Knob+Deadbolt)',2,32.97,65.94,0,5.73678,71.67678,'4714 56 30355 09/13/2011 4345','2011-09-14_11-26-39_129.jpg');
INSERT INTO `expense` VALUES (109,67,1,7,0,'2011-09-14','Kwikset Combo (Door Knob + Deadbolt)',1,29.94,29.94,0,2.60478,32.54478,'4714 57 10249 09/14/2011 1882','2011-09-14_12-04-19_815.jpg');
INSERT INTO `expense` VALUES (110,68,1,7,0,'2011-09-14','RV Anti-Freeze',1,4.98,4.98,0,0.43326,5.41326,'4714 57 10249 09/14/2011 1882','2011-09-14_12-04-19_815.jpg');
INSERT INTO `expense` VALUES (111,72,23,7,0,'2011-10-05','Craftsman Universal Remote (#30498)',1,44.99,44.99,0,3.91413,48.90413,'1049-7837-5719-2769-0619','2011-10-05_14-27-02_979.jpg');
INSERT INTO `expense` VALUES (112,72,23,7,0,'2011-10-05','Nickel Battery (#CR2032)',1,4.19,4.19,0,0.36453,4.55453,'1049-7837-5719-2769-0619','0');
INSERT INTO `expense` VALUES (113,0,1,7,0,'2011-10-09','Smoke Alarm (6 Pack)',1,24.97,24.97,0,2.17239,27.14239,'4714 56 72308 10/09/2011 7513','0');
INSERT INTO `expense` VALUES (114,0,1,6,0,'2011-10-09','Work Gloves',1,9.97,9.97,0,0.86739,10.83739,'4714 56 72308 10/09/2011 7513','0');
INSERT INTO `expense` VALUES (115,73,1,7,0,'2011-10-09','Anti-Freeze',1,4.98,4.98,0,0.43326,5.41326,'4714 56 72308 10/09/2011 7513','2011-10-09_19-49-26_645.jpg');
INSERT INTO `expense` VALUES (116,0,1,6,0,'2011-10-09','300&#39; Fiber Tape',1,29.96,29.96,0,2.60652,32.56652,'4714 56 72308 10/09/2011 7513','0');
INSERT INTO `expense` VALUES (117,76,24,25,0,'2011-10-27','Trash',1,37.24,37.24,0,0.00000,37.24000,'017335','2011-10-27_14-35-41_873.jpg');
INSERT INTO `expense` VALUES (118,76,24,25,0,'2011-10-27','Trash',1,9.80,9.80,0,0.00000,9.80000,'010957','2011-10-27_14-35-34_943.jpg');
INSERT INTO `expense` VALUES (119,74,1,7,0,'2011-10-27','Echo 16oz 2stroke Oil',1,8.97,8.97,0,0.78039,9.75039,'4714 56 96901 10/27/2011 9275','2011-10-27_17-25-23_595.jpg');
INSERT INTO `expense` VALUES (120,74,1,6,0,'2011-10-27','Trimmer Line .95mm',1,14.97,14.97,0,1.30239,16.27239,'4714 56 96901 10/27/2011 9275','2011-10-27_17-25-23_595.jpg');
INSERT INTO `expense` VALUES (121,34,1,7,0,'2011-05-03','RV Anti-Freeze',2,4.98,9.96,0,0.86652,10.82652,'4714 56 77265 05/03/2011 6082','2011-05-04_09-26-51_168.jpg');
INSERT INTO `expense` VALUES (122,37,1,6,0,'2011-05-06','6 in 1 Reversible ScrewDriver',1,5.98,5.98,0,0.52026,6.50026,'4714 59 49441 05/06/2011 2635','2011-11-10_22-47-35_177.jpg');
INSERT INTO `expense` VALUES (123,37,1,6,0,'2011-05-06','3/8* Ratchet',1,11.97,11.97,0,1.04139,13.01139,'4714 59 49441 05/06/2011 2635','2011-11-10_22-47-35_177.jpg');
INSERT INTO `expense` VALUES (124,37,1,6,0,'2011-05-06','Screw Container',1,3.27,3.27,0,0.28449,3.55449,'4714 59 49441 05/06/2011 2635','2011-11-10_22-47-35_177.jpg');
INSERT INTO `expense` VALUES (125,53,1,7,0,'2011-05-18','RV Anti-Freeze',2,4.98,9.96,0,0.86652,10.82652,'4714 08 63555 05/18/2011 2251','2011-11-10_23-07-40_555.jpg');
INSERT INTO `expense` VALUES (126,69,1,7,0,'2011-05-18','Smoke Alarm (6 pack)',1,24.97,24.97,0,2.17239,27.14239,'4714 08 63555 05/18/2011 2251','2011-11-10_23-07-40_555.jpg');
INSERT INTO `expense` VALUES (127,38,1,7,0,'2011-05-11','4*x4*-8&#39; Redwood',1,18.97,18.97,0,1.65039,20.62039,'4714 02 35341 05/11/2011 0251','2011-05-12_17-31-42_47.jpg');
INSERT INTO `expense` VALUES (128,38,1,7,0,'2011-05-11','3/8*x6* Hex Bolt',4,1.29,5.16,0,0.44892,5.60892,'4714 02 35341 05/11/2011 0251','2011-05-12_17-31-42_47.jpg');
INSERT INTO `expense` VALUES (129,38,1,7,0,'2011-05-11','3/8* Cut Washer',8,0.14,1.12,0,0.09744,1.21744,'4714 02 35341 05/11/2011 0251','2011-05-12_17-31-42_47.jpg');
INSERT INTO `expense` VALUES (130,38,1,7,0,'2011-05-10','4*x4*-10 Redwood',1,22.27,22.27,0,1.93749,24.20749,'4714 02 32199 05/10/2011 5291','2011-05-12_17-31-32_869.jpg');
INSERT INTO `expense` VALUES (131,38,1,7,0,'2011-05-10','2*x4*-8&#39; Redwood',3,7.77,23.31,0,2.02797,25.33797,'4714 02 32199 05/10/2011 5291','2011-05-12_17-31-32_869.jpg');
INSERT INTO `expense` VALUES (132,38,1,7,0,'2011-05-10','3* Red Deck Screws',1,9.37,9.37,0,0.81519,10.18519,'4714 02 32199 05/10/2011 5291','2011-05-12_17-31-32_869.jpg');
INSERT INTO `expense` VALUES (133,37,1,7,0,'2011-05-10','2*x4*-10&#39; Redwood',3,9.47,28.41,0,2.47167,30.88167,'4714 02 32181 05/10/2011 5291','2011-05-12_17-31-20_563.jpg');
INSERT INTO `expense` VALUES (134,37,1,7,0,'2011-05-10','4*x4*-10&#39; Redwood',1,22.27,22.27,0,1.93749,24.20749,'4714 02 32181 05/10/2011 5291','2011-05-12_17-31-20_563.jpg');
INSERT INTO `expense` VALUES (135,37,1,7,0,'2011-05-10','3/8* Cut Washer Pack',1,2.70,2.70,0,0.23490,2.93490,'4714 02 32181 05/10/2011 5291','2011-05-12_17-31-20_563.jpg');
INSERT INTO `expense` VALUES (136,37,1,7,0,'2011-05-10','3/8* Bolt Pack',1,3.14,3.14,0,0.27318,3.41318,'4714 02 32181 05/10/2011 5291','2011-05-12_17-31-20_563.jpg');
INSERT INTO `expense` VALUES (137,37,1,7,0,'2011-05-10','3/8*x6* Hex Bolt',6,0.94,5.64,0,0.49068,6.13068,'4714 02 32181 05/10/2011 5291','2011-05-12_17-31-20_563.jpg');
INSERT INTO `expense` VALUES (138,40,1,7,0,'2011-05-13','2*x4*-8&#39; Pressure Treated',4,4.57,18.28,0,1.59036,19.87036,'4714 01 97905 05/13/2011 5595','2011-12-29_12-36-29_36.jpg');
INSERT INTO `expense` VALUES (139,40,1,7,0,'2011-05-13','2*x4*-8&#39; Douglas Fir',9,1.78,16.02,0,1.39374,17.41374,'4714 01 97905 05/13/2011 5595','2011-12-29_12-36-29_36.jpg');
INSERT INTO `expense` VALUES (140,40,1,7,0,'2011-05-13','Deck Stain (Solid Color)',1,27.74,27.74,0,2.41338,30.15338,'4714 01 97905 05/13/2011 5595','2011-12-29_12-36-29_36.jpg');
INSERT INTO `expense` VALUES (141,40,1,7,0,'2011-05-13','4* 3/8* Rollers (2 Pack)',1,4.97,4.97,0,0.43239,5.40239,'4714 01 97905 05/13/2011 5595','2011-12-29_12-36-29_36.jpg');
INSERT INTO `expense` VALUES (142,40,1,7,0,'2011-05-13','3* Red Deck Screws',1,9.37,9.37,0,0.81519,10.18519,'4714 01 97905 05/13/2011 5595','2011-12-29_12-36-29_36.jpg');
INSERT INTO `expense` VALUES (143,40,1,7,0,'2011-05-13','1/4*x3 1/2* Concrete Tapcom Screw',1,24.97,24.97,0,2.17239,27.14239,'4714 01 97905 05/13/2011 5595','2011-12-29_12-36-29_36.jpg');
INSERT INTO `expense` VALUES (144,40,1,6,0,'2011-05-13','Small Screw Containers',2,3.27,6.54,0,0.56898,7.10898,'4714 01 97905 05/13/2011 5595','2011-12-29_12-36-29_36.jpg');
INSERT INTO `expense` VALUES (145,78,1,7,0,'2011-11-14','Outlet Plates, Single Gang (10pack)',1,1.99,1.99,0,0.17313,2.16313,'4714 58 58147 11/14/2011 6308','2011-11-16_08-25-49_151.jpg');
INSERT INTO `expense` VALUES (146,78,26,7,0,'2011-11-14','Outlet Plate, Double Gang',2,1.19,2.38,0,0.20706,2.58706,'040933','2011-11-16_08-26-22_174.jpg');
INSERT INTO `expense` VALUES (147,25,1,7,0,'2011-03-17','RV Anti-Freeze',2,4.98,9.96,0,0.86652,10.82652,'4714 07 83696 03/17/2011 8069','2011-11-18_11-15-43_89.jpg');
INSERT INTO `expense` VALUES (148,25,1,6,0,'2011-03-17','Push Broom',1,28.97,28.97,0,2.52039,31.49039,'4714 07 83696 03/17/2011 8069','2011-11-18_11-15-43_89.jpg');
INSERT INTO `expense` VALUES (149,27,1,7,0,'2011-03-26','2*x12*-12&#39; DF',2,12.84,25.68,0,2.23416,27.91416,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (150,27,1,7,0,'2011-03-26','2&#34;x10&#34;-8&#39; DF',1,6.81,6.81,0,0.59247,7.40247,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (151,27,1,7,0,'2011-03-26','2&#34;x4&#34;-8&#39; Pressure Treated',1,4.97,4.97,0,0.43239,5.40239,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (152,27,1,7,0,'2011-03-26','2&#34;x12&#34;-10 DF',3,10.72,32.16,0,2.79792,34.95792,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (153,27,1,7,0,'2011-03-26','Subfloor Adhesive',3,4.47,13.41,0,1.16667,14.57667,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (154,27,1,7,0,'2011-03-26','3/8&#34;x4&#34; Concrete Sleeve Anchor',1,9.67,9.67,0,0.84129,10.51129,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (155,27,1,7,0,'2011-03-26','10d Hanger Nails',1,4.47,4.47,0,0.38889,4.85889,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (156,27,1,7,0,'2011-03-26','3&#34; Gold Screws (5lb box)',1,19.97,19.97,0,1.73739,21.70739,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (157,27,1,7,0,'2011-03-26','1.5&#34; Gold Screws (5lb box)',1,19.97,19.97,0,1.73739,21.70739,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (158,27,1,7,0,'2011-03-26','2&#34;x8&#34; Joist Hangers',4,1.05,4.20,0,0.36540,4.56540,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (159,27,1,7,0,'2011-03-26','3/8&#34; Nuts (10 pack)',1,3.14,3.14,0,0.27318,3.41318,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (160,27,1,7,0,'2011-03-26','3/8&#34;x3&#34; Lag Screws',20,0.52,10.40,0,0.90480,11.30480,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (161,27,1,7,0,'2011-03-26','4&#39;x8&#39;x1/2&#34; Sheathing',1,12.97,12.97,0,1.12839,14.09839,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (162,27,1,7,0,'2011-03-26','4&#39;x8&#39;x23/32&#34; OSB',1,13.97,13.97,0,1.21539,15.18539,'4714 02 97689 03/26/2011 2129','2011-04-10_14-22-04_653.jpg');
INSERT INTO `expense` VALUES (163,27,1,7,0,'2011-03-28','1/4&#34;x3&#34; (5lb box)',1,9.77,9.77,0,0.84999,10.61999,'4714 01 34064 03/28/2011 9877','2011-04-10_14-22-22_846.jpg');
INSERT INTO `expense` VALUES (164,27,1,7,0,'2011-03-28','2&#34;x8&#34; Joist Hanger',2,1.05,2.10,0,0.18270,2.28270,'4714 01 34064 03/28/2011 9877','2011-04-10_14-22-22_846.jpg');
INSERT INTO `expense` VALUES (165,27,1,6,0,'2011-03-28','Adjustable Sawhorse (2 pack)',1,49.97,49.97,0,4.34739,54.31739,'4714 01 34064 03/28/2011 9877','2011-04-10_14-22-22_846.jpg');
INSERT INTO `expense` VALUES (166,27,1,6,0,'2011-03-28','1200Watt Dual Worklight w/ Stand',1,48.97,48.97,0,4.26039,53.23039,'4714 01 34064 03/28/2011 9877','2011-04-10_14-22-22_846.jpg');
INSERT INTO `expense` VALUES (167,27,1,7,0,'2011-03-28','2&#34;x4&#34;-96 Stud',2,1.78,3.56,0,0.30972,3.86972,'4714 01 34064 03/28/2011 9877','2011-04-10_14-22-22_846.jpg');
INSERT INTO `expense` VALUES (168,27,1,7,0,'2011-03-28','2&#34;x12&#34;-8&#39; DF',2,8.56,17.12,0,1.48944,18.60944,'4714 01 34064 03/28/2011 9877','2011-04-10_14-22-22_846.jpg');
INSERT INTO `expense` VALUES (169,27,1,7,0,'2011-03-28','2&#34;x10&#34;-8&#39; DF',1,6.81,6.81,0,0.59247,7.40247,'4714 01 34064 03/28/2011 9877','2011-04-10_14-22-22_846.jpg');
INSERT INTO `expense` VALUES (170,27,1,6,0,'2011-03-24','Ryobi 3x18 Belt Sander (+ 2yr warranty)',1,56.92,56.92,0,4.95204,61.87204,'4714 08 52335 03/24/2011 5415','2011-04-10_14-23-39_437.jpg');
INSERT INTO `expense` VALUES (171,27,1,6,0,'2011-03-24','3/8* Bosch Masonry Bit',1,7.27,7.27,0,0.63249,7.90249,'4714 08 52335 03/24/2011 5415','2011-04-10_14-23-39_437.jpg');
INSERT INTO `expense` VALUES (172,27,1,1,0,'2011-03-24','1/2* Dewalt Drill (+ 2yr warranty)',1,100.95,100.95,0,8.78265,109.73265,'4714 08 52335 03/24/2011 5415','2011-04-10_14-23-39_437.jpg');
INSERT INTO `expense` VALUES (173,27,1,7,0,'2011-03-29','2&#34;x4&#34;-92 5/8&#34; Stud',4,2.88,11.52,0,1.00224,12.52224,'4714 02 07076 03/29/2011 0058','2011-11-18_12-30-01_945.jpg');
INSERT INTO `expense` VALUES (174,27,1,6,0,'2011-03-29','Brass Stair Gauges (for framing square)',1,4.97,4.97,0,0.43239,5.40239,'4714 02 07076 03/29/2011 0058','2011-11-18_12-30-01_945.jpg');
INSERT INTO `expense` VALUES (175,27,1,6,0,'2011-03-29','24* Sweep PushBroom',1,15.99,15.99,0,1.39113,17.38113,'4714 02 07076 03/29/2011 0058','2011-11-18_12-30-01_945.jpg');
INSERT INTO `expense` VALUES (176,27,1,7,0,'2011-03-29','4&#34;x4&#34;-8&#39; DF Post',1,7.68,7.68,0,0.66816,8.34816,'4714 02 07076 03/29/2011 0058','2011-11-18_12-30-01_945.jpg');
INSERT INTO `expense` VALUES (177,32,1,7,0,'2011-04-28','3&#34; Red Deck Screws (1lb box)',1,8.69,8.69,0,0.75603,9.44603,'4714 01 40822 04/28/2011 4508','2011-04-28_18-18-29_370.jpg');
INSERT INTO `expense` VALUES (178,32,1,7,0,'2011-04-28','2&#34;x4&#34;-10&#39; Redwood',3,9.47,28.41,0,2.47167,30.88167,'4714 01 40822 04/28/2011 4508','2011-04-28_18-18-29_370.jpg');
INSERT INTO `expense` VALUES (179,32,1,7,0,'2011-04-28','4&#34;x4&#34;-10&#39; Redwood',1,22.27,22.27,0,1.93749,24.20749,'4714 01 40822 04/28/2011 4508','2011-04-28_18-18-29_370.jpg');
INSERT INTO `expense` VALUES (180,32,1,7,0,'2011-04-28','Solid Deck Paint (1 Gal)',1,27.74,27.74,0,2.41338,30.15338,'4714 01 40822 04/28/2011 4508','2011-04-28_18-18-29_370.jpg');
INSERT INTO `expense` VALUES (181,32,1,7,0,'2011-04-28','3/8&#34; Nuts (10 pack)',1,3.14,3.14,0,0.27318,3.41318,'4714 01 40822 04/28/2011 4508','2011-04-28_18-18-29_370.jpg');
INSERT INTO `expense` VALUES (182,32,1,7,0,'2011-04-28','3/8&#34; Cut Washers (25 pack)',1,2.70,2.70,0,0.23490,2.93490,'4714 01 40822 04/28/2011 4508','2011-04-28_18-18-29_370.jpg');
INSERT INTO `expense` VALUES (183,32,1,7,0,'2011-04-28','3/8&#34;x6&#34; Hex Bolt',4,0.94,3.76,0,0.32712,4.08712,'4714 01 40822 04/28/2011 4508','2011-04-28_18-18-29_370.jpg');
INSERT INTO `expense` VALUES (184,0,28,2,1,'2011-07-15','Gas',1,44.68,44.68,1,0.00000,44.68000,'007697','0');
INSERT INTO `expense` VALUES (185,0,29,6,0,'2011-10-06','1/2&#34; Chuck Key (Part #1313104)',1,16.60,16.60,1,0.00000,16.60000,'1200033','0');
INSERT INTO `expense` VALUES (186,30,25,25,0,'2011-04-28','Waste Disposal',1,23.52,23.52,0,0.00000,23.52000,'052151','2011-12-28_09-19-15_583.jpg');
INSERT INTO `expense` VALUES (187,0,1,6,0,'2011-11-07','3/4&#34;x5&#39; Black Pipe (for clamps)',2,14.99,29.98,0,2.60826,32.58826,'4714 08 38029 11/07/2011 5947','0');
INSERT INTO `expense` VALUES (188,0,1,6,0,'2011-11-07','3/4&#34; Pipe Caps (for clamps)',2,1.93,3.86,0,0.33582,4.19582,'4714 08 38029 11/07/2011 5947','0');
INSERT INTO `expense` VALUES (189,0,1,6,0,'2011-11-07','5Gal Mixer/Paddle',1,6.98,6.98,0,0.60726,7.58726,'4714 08 38029 11/07/2011 5947','0');
INSERT INTO `expense` VALUES (190,77,1,7,0,'2011-11-07','RV AntiFreeze',1,4.98,4.98,0,0.43326,5.41326,'4714 08 38029 11/07/2011 5947','2011-12-27_16-13-16_555.jpg');
INSERT INTO `expense` VALUES (191,0,30,2,1,'2011-11-14','Gas',1,42.44,42.44,0,0.00000,42.44000,'G282844','0');
INSERT INTO `expense` VALUES (192,0,15,2,1,'2011-09-19','Gas',1,39.16,39.16,1,0.00000,39.16000,'57527','0');
INSERT INTO `expense` VALUES (193,74,15,23,0,'2011-09-29','Mower Gas',1,12.04,12.04,1,0.00000,12.04000,'61026','0');
INSERT INTO `expense` VALUES (194,0,31,2,1,'2011-10-10','Gas',1,42.86,42.86,0,0.00000,42.86000,'92000','0');
INSERT INTO `expense` VALUES (195,0,32,2,1,'2011-11-03','Gas',1,40.97,40.97,0,0.00000,40.97000,'597346','0');
INSERT INTO `expense` VALUES (196,0,18,2,1,'2011-07-26','Gas',1,38.48,38.48,1,0.00000,38.48000,'173933','0');
INSERT INTO `expense` VALUES (197,0,18,2,1,'2011-08-10','Gas',1,34.77,34.77,1,0.00000,34.77000,'171530','0');
INSERT INTO `expense` VALUES (198,0,18,2,1,'2011-08-19','Gas',1,38.97,38.97,1,0.00000,38.97000,'172143','0');
INSERT INTO `expense` VALUES (199,0,33,2,1,'2011-06-01','Gas',1,42.44,42.44,1,0.00000,42.44000,'8517262','0');
INSERT INTO `expense` VALUES (200,0,34,2,1,'2011-06-09','Gas',1,43.54,43.54,1,0.00000,43.54000,'6744','0');
INSERT INTO `expense` VALUES (201,0,8,2,1,'2011-06-16','Gas',1,38.87,38.87,1,0.00000,38.87000,'116722995122161','0');
INSERT INTO `expense` VALUES (202,0,35,2,1,'2011-06-28','Gas',1,37.73,37.73,1,0.00000,37.73000,'89810','0');
INSERT INTO `expense` VALUES (203,0,14,2,1,'2011-04-28','Gas',1,44.88,44.88,1,0.00000,44.88000,'005520','0');
INSERT INTO `expense` VALUES (204,0,17,2,1,'2011-04-12','Gas',1,35.00,35.00,1,0.00000,35.00000,'1925537','0');
INSERT INTO `expense` VALUES (205,0,36,2,1,'2011-04-20','Gas',1,43.46,43.46,1,0.00000,43.46000,'212738576','0');
INSERT INTO `expense` VALUES (206,0,36,2,1,'2011-04-03','Gas',1,42.78,42.78,1,0.00000,42.78000,'153611261','0');
INSERT INTO `expense` VALUES (207,0,35,2,1,'2011-03-24','Gas',1,39.69,39.69,1,0.00000,39.69000,'81067','0');
INSERT INTO `expense` VALUES (208,0,14,2,1,'2011-03-18','Gas',1,38.48,38.48,1,0.00000,38.48000,'57730','0');
INSERT INTO `expense` VALUES (209,0,32,2,1,'2011-03-14','Gas',1,39.71,39.71,1,0.00000,39.71000,'553393','0');
INSERT INTO `expense` VALUES (210,0,36,2,1,'2011-03-08','Gas',1,40.55,40.55,1,0.00000,40.55000,'202721470','0');
INSERT INTO `expense` VALUES (211,0,14,2,1,'2011-03-03','Gas',1,37.04,37.04,1,0.00000,37.04000,'55139','0');
INSERT INTO `expense` VALUES (212,0,0,2,1,'2011-03-29','Gas',1,43.81,43.81,1,0.00000,43.81000,'4214272','0');
INSERT INTO `expense` VALUES (213,0,6,5,1,'2011-03-25','Castrol Synthetic 10w-30 Motor Oil (1Gal)',1,27.99,27.99,0,2.43513,30.42513,'2719-161349','0');
INSERT INTO `expense` VALUES (214,0,6,5,1,'2011-03-25','Castrol Synthetic 10w-30 Motor Oil (1 qt)',1,4.99,4.99,0,0.43413,5.42413,'2719-161349','0');
INSERT INTO `expense` VALUES (215,0,6,5,1,'2011-03-25','Fram Oil Filter HM3593A',1,7.99,7.99,0,0.69513,8.68513,'2719-161349','0');
INSERT INTO `expense` VALUES (216,79,37,7,0,'2011-11-26','Fabuloso Cleaner',1,1.00,1.00,0,0.08700,1.08700,'006921 2701 01 00013 94247 11/26/2011 16:34','2011-11-27_17-26-38_944.jpg');
INSERT INTO `expense` VALUES (217,0,38,6,0,'2011-11-25','1/2*x4&#39; Power Twist V-Belt',1,36.81,36.81,0,0.00000,36.81000,'6420352','0');
INSERT INTO `expense` VALUES (218,0,38,6,0,'2011-11-25','220V Paddle On/Off Switch',1,16.81,16.81,0,0.00000,16.81000,'6420352','0');
INSERT INTO `expense` VALUES (219,0,39,6,0,'2011-11-22','11/16&#34; WoodRiver Forstner Bit',1,6.89,6.89,0,0.59943,7.48943,'127289','0');
INSERT INTO `expense` VALUES (220,0,39,6,0,'2011-11-22','Arbor Drill Bit (for Hole Saws)',1,10.99,10.99,0,0.95613,11.94613,'127289','0');
INSERT INTO `expense` VALUES (221,0,39,6,0,'2011-11-22','1 1/8&#34; Fast Cut Hole Saw',1,8.49,8.49,0,0.73863,9.22863,'127289','0');
INSERT INTO `expense` VALUES (222,0,22,2,1,'2011-12-09','Gas',1,14.51,14.51,0,0.00000,14.51000,'795435','0');
INSERT INTO `expense` VALUES (223,0,40,6,0,'2011-11-22','Student Membership',1,50.00,50.00,0,0.00000,50.00000,'','0');
INSERT INTO `expense` VALUES (224,0,1,7,0,'2011-12-15','4&#39; Shop Light',1,24.76,24.76,0,2.15412,26.91412,'4714 08 63423 12/15/2011 5124','0');
INSERT INTO `expense` VALUES (225,0,1,7,0,'2011-12-15','Single Gang PVC Box',2,0.27,0.54,0,0.04698,0.58698,'4714 08 63423 12/15/2011 5124','0');
INSERT INTO `expense` VALUES (226,0,1,7,0,'2011-12-15','14-2 Gauge Romex Wiring (25&#39;)',1,11.20,11.20,0,0.97440,12.17440,'4714 08 63423 12/15/2011 5124','0');
INSERT INTO `expense` VALUES (227,0,1,7,0,'2011-12-15','10&#39; Foam Tape',1,2.25,2.25,0,0.19575,2.44575,'4714 08 63423 12/15/2011 5124','0');
INSERT INTO `expense` VALUES (228,0,1,7,0,'2011-12-12','Lithuania 2-Lamp Floodlight',1,9.97,9.97,0,0.86739,10.83739,'4714 10 44718 12/12/2011 4084','0');
INSERT INTO `expense` VALUES (229,0,1,7,0,'2011-12-12','4&#39; Shop Light',1,24.76,24.76,0,2.15412,26.91412,'4714 10 44718 12/12/2011 4084','0');
INSERT INTO `expense` VALUES (230,0,41,2,1,'2011-12-12','Gas',1,34.92,34.92,1,0.00000,34.92000,'1764','0');
INSERT INTO `expense` VALUES (231,81,1,7,0,'2011-12-19','2*x4*-10&#39; Douglas Fir',6,3.05,18.30,0,1.59210,19.89210,'4714 02 51561 12/19/2011 5246','2011-12-19_15-47-21_125.jpg');
INSERT INTO `expense` VALUES (232,81,1,7,0,'2011-12-19','2*x4*-12&#39; Douglas Fir',4,3.67,14.68,0,1.27716,15.95716,'4714 02 51561 12/19/2011 5246','2011-12-19_15-47-21_125.jpg');
INSERT INTO `expense` VALUES (233,81,1,7,0,'2011-12-19','2*x4*-8&#39; Douglas Fir',4,1.78,7.12,0,0.61944,7.73944,'4714 02 51561 12/19/2011 5246','.pureftpd-upload.4eefcd05.15.543d.f8a021e');
INSERT INTO `expense` VALUES (234,81,1,7,0,'2011-12-19','3/8* Galvanized Washers (25pack)',2,4.95,9.90,0,0.86130,10.76130,'4714 02 51561 12/19/2011 5246','2011-12-19_15-47-21_125.jpg');
INSERT INTO `expense` VALUES (235,81,1,6,0,'2011-12-19','3/8* Galvanized Nuts (25pack)',1,4.95,4.95,0,0.43065,5.38065,'4714 02 51561 12/19/2011 5246','2011-12-19_15-47-21_125.jpg');
INSERT INTO `expense` VALUES (236,81,1,7,0,'2011-12-19','3/8*x4* Galvanized Lag Screws',4,1.78,7.12,0,0.61944,7.73944,'4714 02 51561 12/19/2011 5246','2011-12-19_15-47-21_125.jpg');
INSERT INTO `expense` VALUES (237,81,1,7,0,'2011-12-19','3/8*x4* Galvanized Hex Bolt',16,1.44,23.04,0,2.00448,25.04448,'4714 02 51561 12/19/2011 5246','2011-12-19_15-47-21_125.jpg');
INSERT INTO `expense` VALUES (238,0,40,6,0,'2011-11-22','Existing Building Code Book',1,0.00,0.00,0,0.00000,0.00000,'5795889','0');
INSERT INTO `expense` VALUES (239,0,15,2,1,'2011-11-24','Gas',1,38.30,38.30,1,0.00000,38.30000,'79787','0');
INSERT INTO `expense` VALUES (240,0,40,6,0,'2011-12-22','Builders Code Book',1,106.53,106.53,1,0.00000,106.53000,'5799579','0');
INSERT INTO `expense` VALUES (241,0,3,7,0,'2011-12-17','3/4&#34; KnockOut Seal for Gang Box',1,1.43,1.43,0,0.12441,1.55441,'4743 06 47495 12/17/2011 3983','0');
INSERT INTO `expense` VALUES (242,0,3,7,0,'2011-12-17','3/4&#34; Cable Clamps for Gang Box (5 pack)',1,3.82,3.82,0,0.33234,4.15234,'4743 06 47495 12/17/2011 3983','0');
INSERT INTO `expense` VALUES (243,0,15,2,2,'2011-10-25','Gas',1,29.61,29.61,1,0.00000,29.61000,'69605','0');
INSERT INTO `expense` VALUES (244,0,1,6,0,'2011-09-20','9/16&#34; Holesaw',1,8.17,8.17,0,0.71079,8.88079,'4714 59 38485 09/20/2011 5135','0');
INSERT INTO `expense` VALUES (245,0,1,6,0,'2011-09-20','1/8&#34; Wood Drill Bit',1,3.70,3.70,0,0.32190,4.02190,'4714 59 38485 09/20/2011 5135','0');
INSERT INTO `expense` VALUES (246,0,1,6,0,'2011-09-20','15A 220V Plug',1,8.49,8.49,0,0.73863,9.22863,'4714 59 38485 09/20/2011 5135','0');
INSERT INTO `expense` VALUES (247,54,3,7,0,'2011-06-02','RV Antifreeze',2,4.98,9.96,0,0.86652,10.82652,'4743 59 53724 06/02/2011 2633','2011-06-03_07-29-17_389.jpg');
INSERT INTO `expense` VALUES (248,58,1,7,0,'2011-06-07','Pro Size Spray Can Texture',1,15.58,15.58,0,1.35546,16.93546,'4714 57 91728 06/07/2011 2531','2011-12-28_14-26-12_489.jpg');
INSERT INTO `expense` VALUES (249,58,1,7,0,'2011-06-27','4&#34;x4&#34;-8&#39; Pressure Treated',3,7.97,23.91,0,2.08017,25.99017,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (250,58,1,7,0,'2011-06-27','2&#34;x6&#34;-12&#39; Douglas Fir',1,5.80,5.80,0,0.50460,6.30460,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (251,58,1,7,0,'2011-06-27','2&#34;x4&#34;-12&#39; Douglas Fir',1,3.82,3.82,0,0.33234,4.15234,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (252,58,1,7,0,'2011-06-27','28&#34; JeldWen Flush Hardwood Door Slab',1,28.00,28.00,0,2.43600,30.43600,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (253,58,1,7,0,'2011-06-27','Door Hinge (set of 3)',1,24.97,24.97,0,2.17239,27.14239,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (254,58,1,7,0,'2011-06-27','Red Screws (1 lb box)',1,9.37,9.37,0,0.81519,10.18519,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (255,58,1,7,0,'2011-06-27','1/2&#34;x6&#34; Sleeve Anchors',12,2.63,31.56,0,2.74572,34.30572,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (256,58,1,7,0,'2011-06-27','Pro Size Texture Spray Can',1,15.58,15.58,0,1.35546,16.93546,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (257,58,1,6,0,'2011-06-27','Paint Brushes (2 Pack)',1,4.97,4.97,0,0.43239,5.40239,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (258,58,1,6,0,'2011-06-27','9&#34; Rollers (3 pack)',1,5.77,5.77,0,0.50199,6.27199,'4714 01 81834 06/27/2011 8936','2011-06-28_19-00-50_110.jpg');
INSERT INTO `expense` VALUES (259,58,1,6,0,'2011-06-28','Bosch 1/2&#34; Masonry Bit SDS+',1,15.47,15.47,0,1.34589,16.81589,'4714 08 21576 06/28/2011 3231','2011-06-28_19-01-51_411.jpg');
INSERT INTO `expense` VALUES (260,0,1,6,0,'2011-06-28','12oz Garage door lube',1,4.27,4.27,0,0.37149,4.64149,'4714 08 21576 06/28/2011 3231','0');
INSERT INTO `expense` VALUES (261,50,1,7,0,'2011-06-01','Behr Interior Paint',1,10.96,10.96,0,0.95352,11.91352,'4714 08 15324 06/01/2011 6192','2011-12-28_16-32-22_409.jpg');
INSERT INTO `expense` VALUES (262,50,1,7,0,'2011-06-01','GE Silicone',1,4.97,4.97,0,0.43239,5.40239,'4714 08 15324 06/01/2011 6192','2011-12-28_16-32-22_409.jpg');
INSERT INTO `expense` VALUES (263,50,1,7,0,'2011-06-01','Liquid Nails',1,1.74,1.74,0,0.15138,1.89138,'4714 08 15324 06/01/2011 6192','2011-12-28_16-32-22_409.jpg');
INSERT INTO `expense` VALUES (264,50,1,7,0,'2011-06-01','Rollers (3 pack)',1,7.97,7.97,0,0.69339,8.66339,'4714 08 15324 06/01/2011 6192','2011-12-28_16-32-22_409.jpg');
INSERT INTO `expense` VALUES (265,50,1,7,0,'2011-06-01','Killz II Primer Paint (1 Gallon)',1,15.96,15.96,0,1.38852,17.34852,'4714 08 15324 06/01/2011 6192','2011-12-28_16-32-22_409.jpg');
INSERT INTO `expense` VALUES (266,50,1,7,0,'2011-06-01','1*x6*-8&#39; Pine',2,7.74,15.48,0,1.34676,16.82676,'4714 08 15324 06/01/2011 6192','2011-12-28_16-32-22_409.jpg');
INSERT INTO `expense` VALUES (267,50,1,7,0,'2011-06-01','2&#39;x4&#39;x3/4&#34; Treated Plywood',1,14.44,14.44,0,1.25628,15.69628,'4714 08 15324 06/01/2011 6192','2011-12-28_16-32-22_409.jpg');
INSERT INTO `expense` VALUES (268,56,1,6,0,'2011-06-10','14 Quart Bucket',1,7.98,7.98,0,0.69426,8.67426,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (269,56,1,6,0,'2011-06-10','Terry Clothes (48 pack)',1,14.48,14.48,0,1.25976,15.73976,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (270,56,1,7,0,'2011-06-10','Renuzit',2,3.29,6.58,0,0.57246,7.15246,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (271,56,1,7,0,'2011-06-10','Large LC Neoprene',1,4.98,4.98,0,0.43326,5.41326,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (272,56,1,6,0,'2011-06-10','Dust Pan and Brush Set',1,5.98,5.98,0,0.52026,6.50026,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (273,56,1,6,0,'2011-06-10','Sponge Mop',1,11.97,11.97,0,1.04139,13.01139,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (274,56,1,6,0,'2011-06-10','Toilet Bowl Brush Set',1,6.98,6.98,0,0.60726,7.58726,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (275,56,1,7,0,'2011-06-10','Trash Bags',1,16.84,16.84,0,1.46508,18.30508,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (276,56,1,7,0,'2011-06-10','Fabulousa Cleaner (1 Gallon)',1,8.47,8.47,0,0.73689,9.20689,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (277,56,1,7,0,'2011-06-10','Clorox Wipes',1,4.78,4.78,0,0.41586,5.19586,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (278,56,1,7,0,'2011-06-10','409 Spray (32 oz)',1,3.27,3.27,0,0.28449,3.55449,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (279,56,1,7,0,'2011-06-10','Glass Cleaner (32 oz)',1,1.98,1.98,0,0.17226,2.15226,'4714 08 50359 06/10/2011 2523','2011-06-10_10-21-07_814.jpg');
INSERT INTO `expense` VALUES (280,50,1,6,0,'2011-05-31','Homer Bucket (5 Gallon)',2,2.54,5.08,0,0.44196,5.52196,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (281,50,1,7,0,'2011-05-31','Texture',1,8.93,8.93,0,0.77691,9.70691,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (282,50,1,7,0,'2011-05-31','Drywall Mud',1,7.50,7.50,0,0.65250,8.15250,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (283,50,1,6,0,'2011-05-31','Homer Bucket Lid',2,0.98,1.96,0,0.17052,2.13052,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (284,50,1,7,0,'2011-05-31','1&#34;x4&#34;-8&#39; Pine',1,4.94,4.94,0,0.42978,5.36978,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (285,50,1,7,0,'2011-05-31','Sand Sponge (Angled)',1,2.95,2.95,0,0.25665,3.20665,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (286,50,1,7,0,'2011-05-31','3M Sanding Sponges (2 pack)',1,3.97,3.97,0,0.34539,4.31539,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (287,0,15,2,1,'2011-05-04','Gas',1,43.18,43.18,1,0.00000,43.18000,'3510','0');
INSERT INTO `expense` VALUES (288,0,15,2,1,'2011-05-10','Gas',1,40.33,40.33,1,0.00000,40.33000,'5728','0');
INSERT INTO `expense` VALUES (289,39,1,7,0,'2011-05-13','Sleeve Anchor',1,9.67,9.67,0,0.84129,10.51129,'4714 08 44324 05/13/2011 3493','2011-12-29_07-56-32_627.jpg');
INSERT INTO `expense` VALUES (290,0,11,2,2,'2011-05-17','Gas',1,98.00,98.00,1,0.00000,98.00000,'131947','0');
INSERT INTO `expense` VALUES (291,40,1,7,0,'2011-05-16','2&#34;x4&#34;-8&#39; Pressure Treated',2,4.57,9.14,0,0.79518,9.93518,'4714 01 09421 05/16/2011 9418','2011-05-19_07-20-50_348.jpg');
INSERT INTO `expense` VALUES (292,40,1,7,0,'2011-05-16','Defiant Entry Knob SN MR PR',1,9.97,9.97,0,0.86739,10.83739,'4714 01 09421 05/16/2011 9418','2011-05-19_07-20-50_348.jpg');
INSERT INTO `expense` VALUES (294,50,1,7,0,'2011-05-31','Drywall All-Purpose Mud',1,12.74,12.74,0,1.10838,13.84838,'4714 02 01426 05/31/2011 5352','2011-06-02_07-04-21_334.jpg');
INSERT INTO `expense` VALUES (295,22,1,7,0,'2011-01-31','2&#34;x4&#34;-8&#39; Redwood',5,7.77,38.85,0,3.37995,42.22995,'4714 02 60372 01/31/2011 8762','28913 N Cedar Receipt 001.jpg');
INSERT INTO `expense` VALUES (296,22,1,7,0,'2011-01-31','2&#34;x6&#34;-8&#39; Redwood',5,11.27,56.35,0,4.90245,61.25245,'4714 02 60372 01/31/2011 8762','28913 N Cedar Receipt 001.jpg');
INSERT INTO `expense` VALUES (297,22,1,7,0,'2011-01-31','2&#34;x4&#34;-10&#39; Redwood',5,9.47,47.35,0,4.11945,51.46945,'4714 02 60372 01/31/2011 8762','28913 N Cedar Receipt 001.jpg');
INSERT INTO `expense` VALUES (298,22,1,7,0,'2011-01-25','4&#34;x4&#34;-8&#39; Redwood',2,18.97,37.94,0,3.30078,41.24078,'4714 02 42099 01/25/2011 5573','28913 N Cedar Receipt 002.jpg');
INSERT INTO `expense` VALUES (299,22,1,7,0,'2011-01-25','4&#34;x4&#34;-8&#39; Redwood',4,18.97,75.88,0,6.60156,82.48156,'4714 02 42099 01/25/2011 5573','28913 N Cedar Receipt 002.jpg');
INSERT INTO `expense` VALUES (300,22,1,7,0,'2011-01-25','Washers',2,4.79,9.58,0,0.83346,10.41346,'4714 02 42099 01/25/2011 5573','28913 N Cedar Receipt 002.jpg');
INSERT INTO `expense` VALUES (301,22,1,7,0,'2011-01-25','Hex Nuts',1,4.78,4.78,0,0.41586,5.19586,'4714 02 42099 01/25/2011 5573','28913 N Cedar Receipt 002.jpg');
INSERT INTO `expense` VALUES (302,22,2,7,0,'2011-01-25','Hex Bolts (Box)',1,36.24,36.24,0,3.15288,39.39288,'4714 02 42099 01/25/2011 5573','28913 N Cedar Receipt 002.jpg');
INSERT INTO `expense` VALUES (303,0,40,6,0,'2011-12-22','(Double Entry)',1,0.00,0.00,0,0.00000,0.00000,'125602','0');
INSERT INTO `expense` VALUES (304,0,43,29,1,'2012-01-10','Emission Test',1,15.00,15.00,1,0.00000,15.00000,'10765048','0');
INSERT INTO `expense` VALUES (305,0,40,30,0,'2012-01-05','International Private Sewage Disposal Code (IPSDC)',1,33.16,33.16,0,2.88492,36.04492,'129194','0');
INSERT INTO `expense` VALUES (306,0,44,27,1,'2012-01-10','Car Registration',1,48.71,48.71,1,0.00000,48.71000,'Check #5125','0');
INSERT INTO `expense` VALUES (307,0,18,2,1,'2012-01-17','Gas',1,33.66,33.66,1,0.00000,33.66000,'115842','0');
INSERT INTO `expense` VALUES (308,0,45,2,1,'2012-01-09','Gas',1,34.27,34.27,1,0.00000,34.27000,'0759271','0');
INSERT INTO `expense` VALUES (309,0,1,6,0,'2012-01-11','Metal Stakes with Orange Flags (100 pack)',1,7.98,7.98,0,0.69426,8.67426,'4714 09 08376 01/11/2012 8243','0');
INSERT INTO `expense` VALUES (310,0,19,1,0,'2012-01-11','CST/Berger 57-LM30PKG Auto-Laser Level Kit',1,407.93,407.93,0,0.00000,407.93000,'105-1434856-6001008','0');
INSERT INTO `expense` VALUES (311,0,19,6,0,'2012-01-11','CST/Berger 16ft Telescoping Rod',1,48.47,48.47,1,0.00000,48.47000,'105-1434856-6001008','0');
INSERT INTO `expense` VALUES (312,0,19,1,0,'2012-01-13','Bosch GLR225 Laser Distance Measurer ',1,138.28,138.28,0,0.00000,138.28000,'105-2958573-1685809','0');
INSERT INTO `expense` VALUES (313,0,19,6,0,'2012-01-13','GE 50542 Receptacle Tester',1,7.97,7.97,0,0.00000,7.97000,'105-2958573-1685809','0');
INSERT INTO `expense` VALUES (314,0,19,6,0,'2012-01-13','GE 50957 GFCI Tester',1,9.37,9.37,0,0.00000,9.37000,'105-2958573-1685809','0');
INSERT INTO `expense` VALUES (315,0,6,29,2,'2011-04-28','OmniSpark - Spark Plug Wire Set',1,19.99,19.99,0,1.73913,21.72913,'2661-178487','0');
INSERT INTO `expense` VALUES (316,0,0,0,0,'2011-05-31','Insurance',1,0.00,0.00,1,0.00000,0.00000,'','0');
INSERT INTO `expense` VALUES (317,0,47,26,2,'2011-01-31','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (318,0,47,26,2,'2011-02-28','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (319,0,47,26,2,'2011-03-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (320,0,47,26,2,'2011-04-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (321,0,47,26,2,'2011-05-31','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (322,0,47,26,2,'2011-06-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (323,0,47,26,2,'2011-07-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (324,0,47,26,2,'2011-08-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (325,0,47,26,2,'2011-09-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (326,0,47,26,2,'2011-10-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (327,0,47,26,2,'2011-11-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (328,0,47,26,1,'2011-12-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (329,0,47,26,1,'2011-01-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (330,0,47,26,1,'2011-02-28','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (331,0,47,26,1,'2011-03-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (332,0,47,26,1,'2011-04-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (333,0,47,26,1,'2011-05-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (334,0,47,26,1,'2011-06-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (335,0,47,26,1,'2011-07-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (336,0,47,26,1,'2011-08-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (337,0,47,26,1,'2011-09-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (338,0,47,26,1,'2011-10-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (339,0,47,26,1,'2011-11-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (340,0,47,26,1,'2011-12-30','Insurance',1,68.21,68.21,1,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (341,0,46,4,2,'2011-04-21','Brake Pads, Calipers, and Wheel work and Engine Belts',1,593.10,593.10,0,51.59970,644.69970,'15745','0');
INSERT INTO `expense` VALUES (342,0,27,23,0,'2011-05-06','Lawn Mower Gas',1,17.04,17.04,1,0.00000,17.04000,'124727','0');
INSERT INTO `expense` VALUES (343,0,48,2,1,'2011-12-19','Gas',1,26.71,26.71,0,0.00000,26.71000,'6658814','0');
INSERT INTO `expense` VALUES (344,0,47,26,2,'2012-01-30','Insurance',1,39.33,39.33,1,0.00000,39.33000,'','0');
INSERT INTO `expense` VALUES (345,0,47,26,1,'2012-01-30','Insurance',1,68.21,68.21,0,0.00000,68.21000,'','0');
INSERT INTO `expense` VALUES (346,0,1,6,0,'2012-01-04','Tempest II Utility Pump',1,68.97,68.97,0,6.00039,74.97039,'4714 56 85425 01/04/2012 4917','0');
INSERT INTO `expense` VALUES (347,0,49,29,2,'2011-04-19','LG HGM-235 Bluetooth Headset',1,14.99,14.99,1,0.00000,14.99000,'113464243','0');
INSERT INTO `expense` VALUES (348,0,15,2,1,'2012-01-01','Gas',1,39.42,39.42,1,0.00000,39.42000,'90080','0');
INSERT INTO `expense` VALUES (349,0,25,25,0,'2012-01-10','Garage/Office Cleanout',1,39.20,39.20,1,0.00000,39.20000,'000046','0');
INSERT INTO `expense` VALUES (350,0,15,2,1,'2011-09-13','Gas',1,25.07,25.07,1,0.00000,25.07000,'55119','0');
INSERT INTO `expense` VALUES (351,0,44,27,2,'2011-06-06','Registration',1,46.00,46.00,1,0.00000,46.00000,'','0');
INSERT INTO `expense` VALUES (352,0,15,2,2,'2012-02-07','Gas',1,20.00,20.00,1,0.00000,20.00000,'005623','0');
INSERT INTO `expense` VALUES (353,86,1,7,3,'2013-02-05','5Gal Homer Bucket',1,2.78,2.78,0,0.24186,3.02186,'4714 04 53076 02/05/2013 6263','2013-02-07_15-29-06_320.jpg');
INSERT INTO `expense` VALUES (354,86,1,7,3,'2013-02-05','HandHeld Spreader',1,10.98,10.98,0,0.95526,11.93526,'4714 04 53076 02/05/2013 6263','2013-02-07_15-29-06_320.jpg');
INSERT INTO `expense` VALUES (355,86,1,7,3,'2013-02-05','5Gal Home Bucket Lid',1,1.28,1.28,0,0.11136,1.39136,'4714 04 53076 02/05/2013 6263','2013-02-07_15-29-06_320.jpg');
INSERT INTO `expense` VALUES (356,86,1,7,3,'2013-02-05','40# Ice Melt',1,8.97,8.97,0,0.78039,9.75039,'4714 04 53076 02/05/2013 6263','2013-02-07_15-29-06_320.jpg');
INSERT INTO `expense` VALUES (357,85,50,7,3,'2013-02-01','RV Anti-Freeze',2,3.89,7.78,0,0.67686,8.45686,'454171412991766379','2013-02-07_15-29-14_595.jpg');
INSERT INTO `expense` VALUES (358,89,1,7,3,'2013-01-31','Hemlock Casing 1/2in x 3/16in',1,18.56,18.56,0,1.61472,20.17472,'4714 01 03560801/31/2013 6890','2013-02-07_15-29-42_981.jpg');
INSERT INTO `expense` VALUES (359,89,1,7,3,'2013-01-31','Behr 30oz Primer/Paint (White)',1,15.74,15.74,0,1.36938,17.10938,'4714 01 03560801/31/2013 6890','2013-02-07_15-29-42_981.jpg');
INSERT INTO `expense` VALUES (360,88,2,7,3,'2013-02-06','Anderson 100 30in Storm/Screen Door',1,97.00,97.00,0,8.43900,105.43900,'4719 02 35580 02/06/2013 7677','2013-02-07_15-29-50_429.jpg');
INSERT INTO `expense` VALUES (361,87,1,7,3,'2013-01-17','KwikSet SmartKey Deadbolt and Lock',1,65.92,65.92,0,5.73504,71.65504,'4714 08 68992 01/17/2013 6401','2013-02-07_15-30-01_804.jpg');
INSERT INTO `expense` VALUES (362,87,1,7,3,'2013-01-17','30inx80in Metal Entry Door w/ Sunburst Light',1,265.74,265.74,0,23.11938,288.85938,'4714 08 68992 01/17/2013 6401','2013-02-07_15-30-01_804.jpg');
INSERT INTO `expense` VALUES (363,90,2,7,3,'2013-01-31','1x4-8 Primed Pine Board',2,6.16,12.32,0,1.07184,13.39184,'4719 01 02988 01/31/2013 5017','2013-02-07_15-29-33_386.jpg');
INSERT INTO `expense` VALUES (364,90,2,7,3,'2013-01-31','Alex Fast Dry White Caulk',1,2.88,2.88,0,0.25056,3.13056,'4719 01 02988 01/31/2013 5017','2013-02-07_15-29-33_386.jpg');
INSERT INTO `expense` VALUES (365,90,2,7,3,'2013-01-31','16oz Spray Foam (Gaps & Cracks)',1,4.28,4.28,0,0.37236,4.65236,'4719 01 02988 01/31/2013 5017','2013-02-07_15-29-33_386.jpg');
INSERT INTO `expense` VALUES (366,90,2,7,3,'2013-01-31','1 5/8in Exterior Screws',1,8.47,8.47,0,0.73689,9.20689,'4719 01 02988 01/31/2013 5017','2013-02-07_15-29-33_386.jpg');
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_category`
--

DROP TABLE IF EXISTS `expense_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_category` (
  `id` int(2) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `shortdesc` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_category`
--

LOCK TABLES `expense_category` WRITE;
/*!40000 ALTER TABLE `expense_category` DISABLE KEYS */;
INSERT INTO `expense_category` VALUES (1,'Assets (Depreciation)','Tools or Equipment over $100 (include tax and shipping)');
INSERT INTO `expense_category` VALUES (2,'Vehicle Gas','Gasoline for Vehicle');
INSERT INTO `expense_category` VALUES (3,'Vehicle Tires','Tires for Vehicle');
INSERT INTO `expense_category` VALUES (4,'Vehicle Repair','Brakes, Engine, Transmission, etc');
INSERT INTO `expense_category` VALUES (5,'Vehicle Maintenance','Oil change, Oil/Air Filter, Light Bulbs, etc');
INSERT INTO `expense_category` VALUES (6,'Supplies','Small Tools, Drill Bits, Screws, Hoses, Cords, Nails, Safety Equipment, Protective Clothes, etc');
INSERT INTO `expense_category` VALUES (7,'Materials','Lumber, Hardware, etc');
INSERT INTO `expense_category` VALUES (8,'Communication','Second Phone Line, Long Distance, Cell Phone Service');
INSERT INTO `expense_category` VALUES (9,'Home Office','Mortgage Interest, Rent, Utilities, Homeowner/Renters Insurance');
INSERT INTO `expense_category` VALUES (11,'Taxes and Licenses','Payroll, Business Licenses, Permits');
INSERT INTO `expense_category` VALUES (12,'Advertising','Business Cards, PhoneBook Ads, Web Ads, Flyers, Brochures');
INSERT INTO `expense_category` VALUES (13,'Business Travel','Air Fare, Hotel, Rental Car');
INSERT INTO `expense_category` VALUES (14,'Insurance Payments','Liability Insurance');
INSERT INTO `expense_category` VALUES (15,'Rental Payments','Equipment such as computers, tools, warehouse space or land');
INSERT INTO `expense_category` VALUES (16,'Legal and Professional Fees','Fees for business-related legal matters');
INSERT INTO `expense_category` VALUES (17,'Commissions','Finder\'s Fees, Sales Commissions, Legal Referrals');
INSERT INTO `expense_category` VALUES (18,'Contract Labor','Sub- and independent Contractors, Additional Project Support');
INSERT INTO `expense_category` VALUES (19,'Repairs and Maintenance','Painting, Plumbing, Electrical, Computer Services');
INSERT INTO `expense_category` VALUES (20,'Utilities (for Business, not Personal)','Gas, Electricity, Water, Trash, Alarm Monitoring');
INSERT INTO `expense_category` VALUES (21,'Other Office Expenses','Pickup and Delivery Services, Data Backup');
INSERT INTO `expense_category` VALUES (22,'Miscellaneous Expenses','Answering Services, Bank Charges, Business-related Gifts');
INSERT INTO `expense_category` VALUES (23,'Equipment Gas','Gasoline for Equipment');
INSERT INTO `expense_category` VALUES (24,'Vehicle Oil','Oil for Vehicle');
INSERT INTO `expense_category` VALUES (25,'Waste Disposal','Waste Disposal');
INSERT INTO `expense_category` VALUES (26,'Vehicle Insurance','Auto Insurance');
INSERT INTO `expense_category` VALUES (27,'Vehicle Registration/License','Registration/Licensing Fees');
INSERT INTO `expense_category` VALUES (28,'Vehicle - Garage Rent','Garage Rent');
INSERT INTO `expense_category` VALUES (29,'Vehicle - Other Expense','Towing, Tools for Vehicle, Car Wash');
INSERT INTO `expense_category` VALUES (30,'Office Supplies','Memberships, Books, Pencils, Paper');
/*!40000 ALTER TABLE `expense_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `client_id` int(8) NOT NULL,
  `sku_id` int(8) NOT NULL,
  `project_id` int(8) NOT NULL,
  `bid_id` int(8) NOT NULL,
  `term_id` int(8) NOT NULL default '1',
  `date_start` date NOT NULL,
  `complete_date` date NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `reciepts` tinyint(1) NOT NULL,
  `image` tinyint(1) NOT NULL,
  `images` text NOT NULL,
  `milage_id` int(8) NOT NULL,
  `loan_amount` decimal(7,2) NOT NULL,
  `loan_paid` tinyint(1) NOT NULL default '0',
  `interest_amount` decimal(7,2) NOT NULL,
  `interest_paid` tinyint(1) NOT NULL default '0',
  `complete` tinyint(1) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `paid_checknum` varchar(50) NOT NULL,
  `paid_date` date NOT NULL,
  `project_cost` decimal(8,2) NOT NULL,
  `save_tax` decimal(8,2) NOT NULL,
  `actual_net` decimal(8,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,1,3,1,0,1,'2010-02-28','2010-02-28','Remove garbage inside and outside of residential structure as well as surrounding area (i.e., barn/shop)',500.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-02-28',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (2,1,4,1,0,1,'2010-03-21','2010-03-21','Remove and dispose of damaged deck material from west-facing house, as well as upper decking from master bedroom, and small deck platform in yard (west of house)',800.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-03-21',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (3,1,2,2,0,1,'2010-03-21','2010-03-21','Replace front door lock',100.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-03-21',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (4,1,1,2,0,1,'2010-04-06','2010-04-06','Winterize Residential Home - drain hot water tank, pour anti-freeze into drain pipes containing P-Traps, inspect for damaged pipes, blowout, and place \"winterized\" signs in designated areas (drains containing anti-freeze, hot water tank and fuse box).',200.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-04-06',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (5,1,3,2,0,1,'2010-04-06','2010-04-06','<p>Remove garbage inside and outside of residential structure as well as surrounding area (i.e., barn/shop)</p>',900.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-04-06',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (6,1,3,3,0,1,'2010-07-18','2010-07-18','Remove garbage inside and outside of residential structure as well as surrounding area (i.e., barn/shop)',400.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-07-18',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (7,1,3,4,0,1,'2010-08-01','2010-08-01','Remove garbage inside and outside of residential structure as well as surrounding area (i.e., garage)',250.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-08-01',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (8,1,1,13,0,1,'2010-10-21','2010-10-21','<p>Winterize Residential Home - drain hot water tank, pour anti-freeze into drain pipes containing P-Traps, inspect for damaged pipes, blowout, and place &quot;winterized&quot; signs in designated areas (drains containing anti-freeze, hot water tank and fuse box).</p>',275.00,0,0,'0',0,250.00,1,25.00,1,1,1,'','2010-10-21',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (9,1,5,5,0,1,'2010-10-23','2010-10-23','<p>Removal &amp; Re-Installation of New Vinyl Window<br />\r\nRepair/Patch Misc. Drywall Patches (hallway &amp; A/C unit hole)<br />\r\nRepair/Patch on Exterior (from the removed A/C unit)</p>',800.00,0,0,'0',0,0.00,0,0.00,0,1,1,'','2010-10-23',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (10,1,1,19,0,1,'2010-11-20','2010-11-20','<p>Winterize Residential Home - drain hot water tank, pour anti-freeze into  drain pipes containing P-Traps, inspect for damaged pipes, blowout, and  place &quot;winterized&quot; signs in designated areas (drains containing  anti-freeze, hot water tank and fuse box).</p>',178.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-11-20',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (11,1,6,4,0,1,'2010-11-24','2010-11-24','<p>Snow Shovel Sidewalk, Walkway, Steps, Front &amp; Back Deck, and Back Steps</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-11-24',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (12,1,6,4,0,1,'2010-11-29','2010-11-29','<p>Snow Shovel Sidewalk, Walkway, Steps, Front &amp; Back Deck, and Back Steps</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-11-29',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (13,1,6,23,0,1,'2010-11-29','2010-11-29','<p>Snow Shovel Garage/Alley (Parking access), Path to Rear Patio, Patio, Front Path &amp; Main Doorway</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-11-29',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (14,1,6,20,0,1,'2010-11-29','2010-11-29','<p>Snow Shoveled Half of driveway (3 car garage), Pathway to Main door</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-11-29',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (15,1,6,22,0,1,'2010-11-29','2010-11-29','',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-11-29',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (16,1,6,25,0,1,'2010-11-30','2010-11-30','<p>Snow Shovel Driveway (3-car garage), Pathway, Front Steps</p>',100.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-11-30',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (17,1,6,19,0,1,'2010-12-01','2010-12-01','<p>Snow Shovel Driveway, Sidewalk, Mailman pathway</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-12-01',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (18,1,3,26,2,1,'2010-12-14','2010-12-14','<p>Remove garbage inside and outside of commercial structure.</p>',675.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2010-12-14',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (20,1,6,28,6,1,'2011-01-04','2011-01-04','<p>Snow Shovel Pathway to Door, Steps, Driveway, and Pathway to Rear Door</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2011-01-04',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (21,1,6,4,5,1,'2011-01-04','2011-01-04','<p>Snow Shovel Sidewalk, Walkway, Steps, Front &amp; Back Deck, and Back Steps</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2011-01-04',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (22,1,7,27,8,1,'2011-01-25','2011-01-25','<p>Install a straight/simple deck railing (east side of the deck) on the south side of the house, and install an L-shaped deck railing on the east side of the house.&nbsp; Deck height&nbsp; is above 30&quot;, and requires a 36&quot; railing.&nbsp; Both deck railings and posts will be stained and weatherproofed with matching color to deck as well as matching design to the west deck &amp; railing.</p>',875.00,0,0,'',0,425.00,1,50.00,1,1,1,'','2011-01-25',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (23,1,1,24,0,1,'2011-02-26','2011-02-26','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Hot water tank&nbsp;- temperature setting turned to off/low, gas turned off, and drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 3 bathrooms (sinks, toilets, tubs/shower), kitchen (fridge, faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2011-02-26',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (24,1,3,27,0,1,'2011-03-11','2011-03-11','<p>Removed trash from House, Garage, and around property</p>',600.00,0,0,'',0,0.00,0,0.00,0,1,1,'1124 personal ck','2011-03-11',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (25,1,1,30,0,1,'2011-03-18','2011-03-18','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Hot water breaker panel turned off and tank drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 2 bathrooms (sinks, toilets, tubs/shower), kitchen (faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2592','2011-03-18',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (26,1,1,31,0,1,'2011-03-23','2011-03-23','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Hot water breaker panel turned off and tank drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 1 bathroom (sink, toilet, bathtub), kitchen (faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2593','2011-03-23',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (27,1,7,29,9,1,'2011-03-28','2011-03-28','<p>Built and Installed 5\' x 3\'+ Landing area (securing to foundation wall and to upper stairs).</p>\r\n<p>Built and installed stairs (3 steps), securing to new landing area.</p>\r\n<p>Installed Railing system to both sides of stairs (upper and lower)</p>\r\n<p>Cleaned and removed (properly disposed) of any waste/debris</p>',1700.00,0,0,'',0,900.00,1,90.00,1,1,1,'2604','2011-03-28',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (28,1,3,29,0,1,'2011-03-23','2011-03-23','<p>Remove garbage inside and outside of residential structure as well as surrounding area (i.e., farm/barn area)</p>',300.00,0,0,'',0,0.00,0,0.00,0,1,1,'2615','2011-03-23',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (29,1,3,31,0,1,'2011-04-02','2011-04-02','<p>Remove waste/debris from property</p>',300.00,0,0,'',0,0.00,0,0.00,0,1,1,'2632','2011-04-02',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (30,1,3,30,0,1,'2011-04-25','2011-04-25','<p>Remove all trash &amp; debris from the property (house, shop, and surrounding area)</p>',925.00,0,0,'',0,0.00,0,0.00,0,1,1,'2705','2011-04-25',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (31,1,7,31,14,1,'2011-04-27','2011-04-27','<p>Install railing system to downstairs basement.</p>',125.00,0,0,'',0,0.00,0,0.00,0,1,1,'2649','2011-04-27',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (32,1,7,29,12,1,'2011-04-29','2011-04-29','<p>Install Railing System (one side) to Porch (closest to left Garage).&nbsp;</p>\r\n<p>Railing consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Cap, Top &amp; Middle Rail</li>\r\n</ul>',415.00,0,0,'',0,0.00,0,0.00,0,1,1,'2680','2011-04-29',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (33,1,9,30,0,1,'2011-05-01','2011-05-01','<p><b>All Rooms</b><br />\r\nRemove cobwebs.  Vacuum carpets. Wash all floors.</p>\r\n<p><b>Kitchen</b><br />\r\nClean  appliances, counters, cabinets. Clean, scrub and  sanitize sinks. Clean and sanitize countertops and backsplashes. Clean  the range top and refrigerator top and exterior. Wash floor.</p>\r\n<p><b>Bathrooms</b><br />\r\nClean, scrub and  sanitize showers, bathtubs and sinks. Clean and sanitize vanities,  backsplashes and toilets. Clean mirrors. Wash floors and  tile walls.<b><br />\r\n</b></p>',175.00,0,0,'',0,0.00,0,0.00,0,1,1,'Doc 1104','2011-05-01',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (34,1,1,33,0,1,'2011-05-03','2011-05-03','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n    <li>Gas turned off and tank drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 1 bathroom (sink, toilet, bathtub), kitchen (faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2654','2011-05-03',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (35,1,8,4,0,1,'2011-05-04','2011-05-04','<p>Lawn care maintenance consisting of mowing and trimming</p>',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'2657','2011-05-04',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (36,1,1,35,0,1,'2011-05-09','2011-05-09','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n    <li>Breaker turned off and tank drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 1 bathroom (sink, toilet, bathtub), kitchen (faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2679','2011-05-09',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (37,1,7,29,15,1,'2011-05-11','2011-05-11','<p>\r\n	Install Railing System (remaining side) to Porch (closest to left Garage).&nbsp;</p>\r\n<p>\r\n	Railing consists of:</p>\r\n<ul>\r\n	<li>\r\n		Posts (no more than 4&#39; apart)</li>\r\n	<li>\r\n		Cap, Top &amp; Middle Rail</li>\r\n</ul>\r\n',415.00,0,0,'',0,0.00,0,0.00,0,1,1,'2648','2011-05-11',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (38,1,7,29,16,1,'2011-05-11','2011-05-11','<p>Install Railing System (both sides) to Porch (front of house).&nbsp;</p>\r\n<p>Railing consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Cap, Top &amp; Middle Rail</li>\r\n</ul>',355.00,0,0,'',0,0.00,0,0.00,0,1,1,'2673','2011-05-11',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (39,1,7,33,18,1,'2011-05-12','2011-05-12','<p>Install Rail System (anchored into the concrete steps) on both sides of back porch</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>',500.00,0,0,'',0,0.00,0,0.00,0,1,1,'2681','2011-05-12',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (40,1,7,35,20,1,'2011-05-13','2011-05-13','<p>Install Rail System (anchored into the concrete steps) on one side of back porch</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n    <li>Anchored into Concrete</li>\r\n</ul>',300.00,0,0,'',0,0.00,0,0.00,0,1,1,'2728','2011-05-13',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (41,1,9,29,0,1,'2011-05-11','2011-05-11','<p>Clean and mop entire basement - use fans to air out musty smell.  Also clean around exterior of house - removing mounds of dirt.</p>',130.00,0,0,'',0,0.00,0,0.00,0,1,1,'2672','2011-05-11',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (42,1,1,36,0,1,'2011-05-15','2011-05-15','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n    <li>Temperature Dial turned down, gas turned off and tank drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 3 bathrooms (sinks, toilets, bathtubs), kitchen (faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour eco-friendly anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2686','2011-05-15',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (43,1,12,34,0,1,'2011-05-11','2011-05-11','<p>De-Winterize Residential Home:</p>\r\n<ul>\r\n    <li>Close All Valves throughout house</li>\r\n    <li>Turn Main Water Valve On</li>\r\n    <li>Inspect Pipes for Damage</li>\r\n</ul>\r\n<p>Note: Copper pipe (cold) running into water heater tank is visibly cracked, and pipe is damaged.&nbsp; Also, downstairs toilet valve is broken.</p>\r\n<p>&nbsp;</p>',75.00,0,0,'',0,0.00,0,0.00,0,1,1,'1426','2011-05-11',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (44,1,7,30,21,1,'2011-05-18','2011-05-18','<p>Install Rail System (also install extension on sides) on both sides of front porch.</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>',525.00,0,0,'',0,0.00,0,0.00,0,1,1,'2682','2011-05-18',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (45,1,8,36,24,1,'2011-05-19','2011-05-19','<p>Lawn care maintenance consisting of mowing and trimming</p>',40.00,0,0,'',0,0.00,0,0.00,0,1,1,'2688','2011-05-19',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (46,1,8,30,0,1,'2011-05-19','2011-05-19','<p>Lawn care maintenance consisting of mowing and trimming</p>',30.00,0,0,'',0,0.00,0,0.00,0,1,1,'2687','2011-05-19',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (47,1,8,37,25,1,'2011-05-24','2011-05-24','<p>Lawn care maintenance consisting of mowing and trimming</p>',160.00,0,0,'',0,0.00,0,0.00,0,1,1,'2696','2011-05-24',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (48,1,8,19,0,1,'2011-05-25','2011-05-25','<p>Lawn Care consisting of trimming and mowing</p>',40.00,0,0,'',0,0.00,0,0.00,0,1,1,'1426','2011-05-25',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (49,1,5,37,26,1,'2011-05-24','2011-05-24','<p>Re-connect Venting to Top of Water Tank</p>',80.00,0,0,'',0,0.00,0,0.00,0,1,1,'2722','2011-05-24',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (50,1,11,23,22,1,'2011-06-06','2011-06-06','<p>Kitchen (cabinet under sink):</p>\r\n<ul>\r\n    <li>Unmount &amp; Remove Sink, Countertop, and effected Cabinet</li>\r\n</ul>\r\n<ul>\r\n    <li>Remove effected drywall from Wall &amp; effected Cabinet Base &amp; Bottom</li>\r\n</ul>\r\n<ul>\r\n    <li>Scrape and spray mold (Helps eliminate, clean and prevent mold) on Framing and Cabinet</li>\r\n</ul>\r\n<ul>\r\n    <li>Repair/Reinstall with new drywall materials</li>\r\n</ul>\r\n<ul>\r\n    <li>Primer (using Killz primer) &amp; Paint drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Rebuild and install the sink cabinet\'s bottom</li>\r\n</ul>\r\n<ul>\r\n    <li>Mount &amp; Reinstall Cabinet, Sink &amp; Countertop</li>\r\n</ul>\r\n<ul>\r\n    <li>Re-Caulk Sink and Countertop</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Dining Room:</p>\r\n<ul>\r\n    <li>Remove plaster &amp; drywall from wall &amp; ceiling to expose framing/slats</li>\r\n</ul>\r\n<ul>\r\n    <li>Scrap framing/slats and spray mold (Helps eliminate, clean and prevent mold)</li>\r\n</ul>\r\n<ul>\r\n    <li>Repair/Reinstall with new drywall materials</li>\r\n</ul>\r\n<ul>\r\n    <li>Primer (using Killz primer) &amp; Paint drywall</li>\r\n</ul>\r\n<p>&nbsp;</p>',1425.00,0,0,'',0,0.00,0,0.00,0,1,1,'2724','2011-06-06',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (51,1,11,23,23,1,'2011-06-06','2011-06-06','<p><strong>COMBINED INVOICES (INV #0050) - original amount of $825<br />\r\n</strong></p>\r\n<p>Kitchen (under sink):</p>\r\n<ul>\r\n    <li>Remove Countertop &amp; Cabinets from Wall</li>\r\n</ul>\r\n<ul>\r\n    <li>Remove effected drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Scrape and spray mold (Helps eliminate, clean and prevent mold) on Framing and the Back &amp; Bottom of Cabinets</li>\r\n</ul>\r\n<ul>\r\n    <li>Repair/Reinstall new drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Primer (using Killz primer) &amp; Paint drywall</li>\r\n</ul>\r\n<ul>\r\n    <li>Rebuild the sink cabinet\'s bottom (damaged and recommeneded to be replaced)</li>\r\n</ul>\r\n<ul>\r\n    <li>Reinstall Cabinets and Countertops</li>\r\n</ul>\r\n<p>NOTE:&nbsp; Once wall/cabinet is exposed if additional sources are identified we<br />\r\nwill advise.</p>',0.00,0,0,'',0,0.00,0,0.00,0,1,1,'','2011-06-06',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (52,1,3,38,0,1,'2011-05-25','2011-05-25','<p>Help serve eviction by placing all possessions of the evictees to curb side.&nbsp; Following up 24hours later with removing unclaimed possessions, and properly disposing of.</p>',600.00,0,0,'',0,0.00,0,0.00,0,1,1,'2784','2011-05-25',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (53,1,1,38,0,1,'2011-05-27','2011-05-27','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n    <li>Breaker turned off and tank drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 2 bathrooms (sinks, toilets, bathtubs), kitchen (faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour eco-friendly anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2725','2011-05-27',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (54,1,1,39,0,1,'2011-06-02','2011-06-02','<p>Winterize Residential Home.</p>\r\n<ul>\r\n    <li>Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n    <li>Breaker turned off, and tank drained</li>\r\n</ul>\r\n<ul>\r\n    <li>Blowout each outlet - 2 bathrooms (sinks, toilets, bathtubs), kitchen (faucet, and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n    <li>Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Pour eco-friendly anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n    <li>Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>\r\n<p>&nbsp;</p>',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2715','2011-06-02',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (55,1,3,38,0,1,'2011-06-10','2011-06-10','<p>Remove all carpets, carpet pads, tackstrips and carpet pad staples</p>',175.00,0,0,'',0,0.00,0,0.00,0,1,1,'1426','2011-06-10',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (56,1,9,38,0,1,'2011-06-10','2011-06-10','<p><b>All Rooms</b><br />\r\nRemove cobwebs. Wash all floors.</p>\r\n<p><b>Kitchen</b><br />\r\nClean  appliances, counters, cabinets. Clean, scrub and  sanitize sinks.  Clean and sanitize countertops and backsplashes. Clean  the range top  and refrigerator top and exterior. Wash floor. Install air freshener.</p>\r\n<p><b>Bathrooms</b><br />\r\nClean, scrub and  sanitize showers, bathtubs and sinks. Clean and  sanitize vanities,  backsplashes and toilets. Clean mirrors. Wash floors  and  tile walls. Installed air fresheners in each bathroom.</p>\r\n<p>Note: Installed additional air fresheners in recreation room (basement), and closet of downstairs bedroom (where breaker box is located)</p>',175.00,0,0,'',0,0.00,0,0.00,0,1,1,'2755','2011-06-10',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (57,1,8,38,0,1,'2011-06-16','2011-06-16','<p>Lawn care maintenance consisting of mowing and trimming, as well as light weeding (in front) and misc. yard cleanup in front &amp; back yard.</p>',125.00,0,0,'',0,0.00,0,0.00,0,1,1,'2755','2011-06-16',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (58,1,7,38,33,1,'2011-06-27','2011-07-05','<p>\r\n	Install existing Railing/Banister between Living Room and Entry Way, railing for upper stairway, and install Railing system (both sides) on front porch.&nbsp; New porch railing system consisting of:</p>\r\n<ul>\r\n	<li>\r\n		Posts (no more than 4&#39; apart)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Top and Middle Rail and Top Cap</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		anchored into concrete</li>\r\n</ul>\r\n',975.00,0,0,'',0,0.00,0,0.00,0,1,1,'2856','2011-07-05',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (59,1,7,40,32,1,'2011-07-07','2011-07-07','<p>Install Rail System on both sides of front porch/stairs &amp; on both sides of (interior) garage entryway (stairs).</p>\r\n<p>Railing System consists of:</p>\r\n<ul>\r\n    <li>Posts (no more than 4\' apart)</li>\r\n</ul>\r\n<ul>\r\n    <li>Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<ul>\r\n    <li>Posts are anchored into concrete</li>\r\n</ul>',900.00,0,0,'',0,0.00,0,0.00,0,1,1,'2770','2011-07-07',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (60,1,8,29,0,1,'2011-07-08','2011-07-08','<p>\r\n	Lawn care maintenance consisting of mowing and trimming</p>\r\n',160.00,0,0,'',0,0.00,0,0.00,0,1,1,'2855','2011-07-08',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (61,1,7,41,38,1,'2011-08-12','2011-08-12','<p>\r\n	Install Rail System on both sides of main entryway (stairs).</p>\r\n<p>\r\n	Railing System consists of:</p>\r\n<ul>\r\n	<li>\r\n		Posts (no more than 4&#39; apart)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Posts anchored into concrete</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Weatherproofed and waterproofed with white exterior solid stain</li>\r\n</ul>\r\n',400.00,0,0,'',0,0.00,0,0.00,0,1,1,'2840','2011-08-12',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (62,1,7,43,41,1,'2011-08-19','2011-08-19','<p>\r\n	Install Rail System on both sides of front of main entryway (stairs), and both sides of side entry of main entryway (stairs &amp; ramp).</p>\r\n<p>\r\n	Railing System consists of:</p>\r\n<ul>\r\n	<li>\r\n		Posts (no more than 4&#39; apart)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Top &amp; Middle Rail, and Cap</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n',835.00,0,0,'',0,200.00,1,20.00,1,1,1,'2835','2011-08-19',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (63,1,7,33,19,1,'2011-08-16','2011-09-01','<p>\r\n	Rebuild 2nd Bedroom</p>\r\n<ul>\r\n	<li>\r\n		Reframe in bedroom wall, closet, and hallway closet</li>\r\n	<li>\r\n		Re-wire bedroom light switch and outlet</li>\r\n	<li>\r\n		Drywall open walls</li>\r\n	<li>\r\n		Install Bedroom door, and bypass closet doors</li>\r\n	<li>\r\n		Install Base/Trim, Door Casing, and Closet cleats &amp; dowels</li>\r\n	<li>\r\n		Primer and Paint (White) Bedroom</li>\r\n</ul>\r\n<p>\r\n	*Due to having a load-bearing wall being removed by previous owner, ceiling structure is sagging and needs to be jacked up to reinstall new load-bearing wall.</p>\r\n',4965.00,0,0,'',0,2100.00,1,210.00,1,1,1,'2857','2011-09-01',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (64,1,5,38,42,1,'2011-08-27','2011-09-06','<p>\r\n	<strong>Upstairs Bathroom</strong></p>\r\n<ul>\r\n	<li>\r\n		Repair Hole</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Replace missing tile</li>\r\n</ul>\r\n<p>\r\n	Note:&nbsp; The new tiles will not be exactly matching the olders style, but will be solid color.</p>\r\n',650.00,0,0,'',0,0.00,0,0.00,0,1,1,'2888','2011-09-06',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (65,1,1,44,0,1,'2011-09-12','2011-09-13','<p>\r\n	Winterize Residential Home.</p>\r\n<ul>\r\n	<li>\r\n		Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Breaker turned off, and tank drained</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Blowout each outlet - 1 bathrooms (sink, toilets, shower), kitchen (faucet, refridgerator and dishwasher area), and laundry</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Pour eco-friendly anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>\r\n',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2865','2011-09-13',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (66,1,2,44,0,1,'2011-09-12','2011-09-13','<ul>\r\n	<li>\r\n		Replace all keyed locks (2 French Doors, and 1 Single + 3 deadbolts), and place keys in combination lockbox</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Lock all windows, and install wooden bars in the windows for added security</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Lock all doors, and install fastened secondary french doors for added security</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Installed sheet of plywood over window space (missing window)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Placed &quot;No Tresspassing&quot; &amp; &quot;Foreclosure&quot; signs on all windows/doors</li>\r\n</ul>\r\n',125.00,0,0,'',0,0.00,0,0.00,0,1,1,'2864','2011-09-13',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (67,1,2,45,0,1,'2011-09-14','2011-09-15','<ul>\r\n	<li>\r\n		Replace all keyed locks (2 Exterior Doors + 1 deadbolts), and place keys in combination lockbox</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Lock all windows, and install wooden bars in the main window for added security</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Lock all doors</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Installed sheet of plywood over window space (missing window)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Placed &quot;No Tresspassing&quot; &amp; &quot;Foreclosure&quot; signs on all windows/doors</li>\r\n</ul>\r\n',100.00,0,0,'',0,0.00,0,0.00,0,1,1,'2867','2011-09-15',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (69,1,7,45,0,1,'2011-09-15','2011-09-19','<p>\r\n	Install 3 smoke (Ionization) detectors:</p>\r\n<ul>\r\n	<li>\r\n		Hallway bettween bedrooms</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Recreation Room</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Kitchen/Living Area</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n',100.00,0,0,'',0,0.00,0,0.00,0,1,1,'2875','2011-09-19',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (68,1,1,45,0,1,'2011-09-14','2011-09-15','<p>\r\n	Winterize Residential Home.</p>\r\n<ul>\r\n	<li>\r\n		Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Breaker turned off, and tank drained</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Blowout each outlet - 1 bathrooms (sink, toilets, shower), kitchen (faucet), basement toilet and laundry</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Pour eco-friendly anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>\r\n',200.00,0,0,'',0,0.00,0,0.00,0,1,1,'2866','2011-09-15',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (70,1,7,44,0,1,'2011-09-16','2011-09-16','<p>\r\n	Install 2 Smoke (Ionization) Detectors:</p>\r\n<ul>\r\n	<li>\r\n		Hallway between downstairs bedrooms (&amp; Laundry)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Dining/Living Room</li>\r\n</ul>\r\n',75.00,0,0,'',0,0.00,0,0.00,0,1,1,'2874','2011-09-16',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (71,1,13,47,0,1,'2011-10-04','2011-10-04','<p>\r\n	Change Garage Door code.</p>\r\n<p>\r\n	Code: 3483 (spelled out as FIVE)</p>\r\n<p>\r\n	Craftsman 1/2HP (model # 132c2292-2)</p>\r\n',25.00,0,0,'',0,0.00,0,0.00,0,1,1,'1449','2011-10-04',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (72,1,13,47,0,1,'2011-10-05','2011-10-05','<ul>\r\n	<li>\r\n		Purchase and program a secondary remote (Craftsman Universal Remote, Model# 30498)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Install new battery (CR2032 Nickel Battery), and reprogram primary remote</li>\r\n</ul>\r\n<p>\r\n	Note: Craftsman garage door opener&#39;s model Number <b>CORRECTION</b>. Model # is 139.5398511</p>\r\n',100.00,0,0,'',0,0.00,0,0.00,0,1,1,'1450','2011-10-05',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (73,1,1,46,0,1,'2011-10-07','2011-10-10','<p>\r\n	Winterize Residential Home.</p>\r\n<ul>\r\n	<li>\r\n		Main water supply shut off (meter removed)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Breaker turned off, and tank drained</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Blowout each outlet - main floor bathroom (sink, toilets, shower), kitchen (faucet), basement bathroom (toilet, shower), laundry, and exterior valves (3)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Pour eco-friendly anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>\r\n',150.00,0,0,'',0,0.00,0,0.00,0,1,1,'2899','2011-10-10',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (74,1,8,46,0,1,'2011-10-25','2011-10-26','<p>\r\n	Lawn care maintenance consisting of mowing and trimming</p>\r\n',75.00,0,0,'',0,0.00,0,0.00,0,1,1,'2954','2011-10-26',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (75,1,4,46,0,1,'2011-10-25','2011-10-25','<p>\r\n	Remove basement carpet and padding</p>\r\n',300.00,0,0,'',0,0.00,0,0.00,0,1,1,'2977','2011-10-25',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (76,1,3,49,0,1,'2011-10-27','2011-10-27','<p>\r\n	Remove all debris/trash from interior and exterior.</p>\r\n',250.00,0,0,'',0,0.00,0,0.00,0,1,1,'3057','2012-03-10',47.04,71.04,131.92);
INSERT INTO `invoice` VALUES (77,1,1,50,0,1,'2011-11-09','2011-11-09','<p>\r\n	Winterize Residential Home.</p>\r\n<ul>\r\n	<li>\r\n		Main water supply shut off</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Gas turned off, and tank drained</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Blowout each outlet - upper floor bathroom (sink, toilets, shower), kitchen (faucet), basement bathroom (toilet, shower), laundry, and exterior valves (2)</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Inspect for damaged pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Pour eco-friendly anti-freeze into each drain pipes</li>\r\n</ul>\r\n<ul>\r\n	<li>\r\n		Place &quot;winterized&quot; signs&nbsp;in each designated areas, including hot water tank (signed &amp; dated)</li>\r\n</ul>\r\n',150.00,0,0,'',0,0.00,0,0.00,0,1,1,'2950','2011-11-09',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (78,1,7,51,0,1,'2011-11-12','2011-11-14','<p>\r\n	Secure all outlets &amp; lightswitches to outlet box, and install outlet &amp; lightswitch plate covers in basement and garage</p>\r\n',150.00,0,0,'',0,0.00,0,0.00,0,1,1,'3016','2012-01-18',4.75,50.84,94.41);
INSERT INTO `invoice` VALUES (79,1,9,42,0,1,'2011-11-27','2011-11-27','<p>\r\n	&nbsp;</p>\r\n<div>\r\n	<p>\r\n		<b>All Rooms</b><br />\r\n		Remove cobwebs. Wash all floors vinyl floors, and vacuum all carpets.</p>\r\n	<p>\r\n		<b>Kitchen</b><br />\r\n		Clean appliances, counters, cabinets. Clean, scrub and sanitize sinks. Clean and sanitize countertops and backsplashes. Clean the range top and refrigerator top and exterior. Wash floor.</p>\r\n	<p>\r\n		<b>Bathrooms</b><br />\r\n		Clean, scrub and sanitize bathtubs and sinks. Clean and sanitize vanities, backsplashes and toilets. Clean mirrors. Wash floors and tub-surround walls.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n',250.00,0,0,'',0,0.00,0,0.00,0,1,1,'2977','2011-11-27',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (80,1,9,49,0,1,'2011-12-13','2011-12-13','<p>\r\n	Clean the interior of the refrigerator.</p>\r\n<p>\r\n	Note: freezer side door has missing metal tray (2nd row) and missing door shelf (3rd shelf from bottom)</p>\r\n',50.00,0,0,'',0,0.00,0,0.00,0,1,1,'2977','2011-12-13',0.00,0.00,0.00);
INSERT INTO `invoice` VALUES (81,1,7,42,44,1,'2011-12-16','2011-12-19','<p>\r\n	Front Porch - install 4&#39;x6&#39; railing (currently missing)</p>\r\n<p>\r\n	Rear Stairs (on new addition) - install stair railing on both sides</p>\r\n<p>\r\n	Garage/Exterior Door - install stair railing on both sides</p>\r\n',400.00,0,0,'',0,0.00,0,0.00,0,1,1,'3016','2012-01-18',92.51,107.62,199.87);
INSERT INTO `invoice` VALUES (82,1,9,29,0,1,'2011-12-21','2011-12-22','<p>\r\n	-&nbsp; Remove tack strips, remaining carpet pad and staples from the family room</p>\r\n<p>\r\n	-&nbsp; Sweep/Mop/Vacuum floors</p>\r\n',80.00,0,0,'',0,0.00,0,0.00,0,1,1,'3001','2012-01-18',0.00,28.00,52.00);
INSERT INTO `invoice` VALUES (83,1,6,49,0,1,'2012-01-24','2012-01-24','<p>\r\n	Snow shovel driveway, walkway, and stairs</p>\r\n<p>\r\n	Spread d-icer on stairs &amp; landing at entryway</p>\r\n',150.00,0,0,'',0,0.00,0,0.00,0,1,1,'3024','2012-02-09',0.00,52.50,97.50);
INSERT INTO `invoice` VALUES (84,3,7,54,0,1,'2012-05-30','2012-08-13','<p>\r\n	build deck to client&#39;s design and specifications</p>\r\n<p>\r\n	&nbsp;</p>\r\n',2660.00,0,0,'',0,0.00,0,0.00,0,1,1,'online transfer','0212-08-13',0.00,931.00,1729.00);
INSERT INTO `invoice` VALUES (85,5,14,55,0,1,'2013-02-01','2013-02-01','<p>\r\n	3807 E 29th Ave, Spokane, WA 99223</p>\r\n<p>\r\n	RV Anti-freeze</p>\r\n',8.46,0,0,'',0,0.00,0,0.00,0,1,1,'1005','2013-02-27',8.46,0.00,0.00);
INSERT INTO `invoice` VALUES (86,5,14,55,0,1,'2013-02-05','2013-02-05','<p>\r\n	508 E Pine Needle Ave, Colbert, WA 99005:</p>\r\n<p>\r\n	Homer 5 Gal Bucket</p>\r\n<p>\r\n	Homer Bucket Lid</p>\r\n<p>\r\n	Fertilizer Hand-held Spreader</p>\r\n<p>\r\n	Ice Melt</p>\r\n',26.10,0,0,'',0,0.00,0,0.00,0,1,1,'1005','2013-02-27',26.10,0.00,0.00);
INSERT INTO `invoice` VALUES (87,4,14,55,0,1,'2013-01-17','2013-01-17','<p>\r\n	2304 W Liberty Ave, Spokane, WA 99205:</p>\r\n<p>\r\n	30&quot; Metal Door w/ Sunburst Window (Pre-Painted White)</p>\r\n<p>\r\n	KwikSet SmartKey Satin Nickel Pack (Lock and Deadbolt)</p>\r\n',360.52,0,0,'',0,0.00,0,0.00,0,1,1,'1001','2013-02-27',360.51,0.00,0.01);
INSERT INTO `invoice` VALUES (88,4,14,55,0,1,'2013-02-06','2013-02-06','<p>\r\n	2304 W Liberty Ave, Spokane, WA 99205:</p>\r\n<p>\r\n	30&quot; Anderson Storm/Screen Door</p>\r\n',105.44,0,0,'',0,0.00,0,0.00,0,1,1,'1001','2013-02-27',105.44,0.00,0.00);
INSERT INTO `invoice` VALUES (89,4,14,55,0,1,'2013-01-31','2013-01-31','<p>\r\n	2304 W LIberty Ave, Spokane, WA 99205:</p>\r\n<p>\r\n	18.75&#39; of Hemlock Door Trim/Casing</p>\r\n<p>\r\n	Behr Exterior Primer &amp; Paint</p>\r\n',37.28,0,0,'',0,0.00,0,0.00,0,1,1,'1001','2013-02-27',37.28,0.00,0.00);
INSERT INTO `invoice` VALUES (90,4,14,55,0,1,'2013-01-31','2013-01-31','<p>\r\n	2304 W Liberty Ave, Spokane, WA 99205:</p>\r\n<p>\r\n	(2) 1x4-8ft Primed Pine Boards</p>\r\n<p>\r\n	1 tube of Paintable Caulk</p>\r\n<p>\r\n	Spray Foam Can (Greatstuff)</p>\r\n<p>\r\n	1 5/8inch Exterior Grey Screws</p>\r\n',30.38,0,0,'',0,0.00,0,0.00,0,1,1,'1001','2013-02-27',30.38,0.00,0.00);
INSERT INTO `invoice` VALUES (91,4,15,56,0,1,'2013-03-13','2013-05-13','<p>\r\n	Loan for Carpet and Paint</p>\r\n',2800.00,0,0,'',0,2800.00,0,0.00,0,1,1,'1003','2013-05-13',0.00,980.00,1820.00);
INSERT INTO `invoice` VALUES (92,4,15,57,0,1,'2013-04-27','0000-00-00','<p>\r\n	Hot Water Tank, and Accessories</p>\r\n',400.00,0,0,'',0,0.00,0,0.00,0,0,0,'','0000-00-00',0.00,140.00,260.00);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `access_id` int(2) NOT NULL,
  `client_id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `fax` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'jcryuu','Blader01!',1,0,'Jason L Campbell','7925 N Scott Rd.','Spokane','WA','99217','(509) 217-8893','','jcryuu@gmail.com');
INSERT INTO `login` VALUES (2,'doc','Fivestar',3,1,'Doc J Nicolson','802 N Washington St','Spokane','WA','99201','(509) 991-4085','(509) 458-4001','doc@fivestarspokane.com');
INSERT INTO `login` VALUES (3,'cindy','Fivestar',3,1,'Cindy Carrigan','802 N Washington St','Spokane','WA','99201','(509) 844-3664','(509) 458-4001','cindy@fivestarspokane.com');
INSERT INTO `login` VALUES (4,'jessica','Fivestar',3,1,'Jessica Trejbal','802 N Washington St','Spokane','WA','99201','(509) 329-9493','(509) 458-4001','jessica@fivestarspokane.com');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master`
--

DROP TABLE IF EXISTS `master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master` (
  `id` tinyint(1) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `logo_image` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master`
--

LOCK TABLES `master` WRITE;
/*!40000 ALTER TABLE `master` DISABLE KEYS */;
INSERT INTO `master` VALUES (1,'JCrew','Jason L Campbell','7925 N Scott Rd','Spokane','WA','99217','5092178893','','jcryuu@gmail.com','docjas.com','');
/*!40000 ALTER TABLE `master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_login`
--

DROP TABLE IF EXISTS `master_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_login` (
  `id` int(3) unsigned NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_login`
--

LOCK TABLES `master_login` WRITE;
/*!40000 ALTER TABLE `master_login` DISABLE KEYS */;
INSERT INTO `master_login` VALUES (1,'jcryuu','blader01');
/*!40000 ALTER TABLE `master_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mileage`
--

DROP TABLE IF EXISTS `mileage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mileage` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `project_id` int(8) NOT NULL,
  `vehicle_id` int(4) NOT NULL,
  `invoice` varchar(8) NOT NULL default 'unknown',
  `invoice_2` varchar(8) NOT NULL,
  `invoice_3` varchar(8) NOT NULL,
  `drive_date` date NOT NULL,
  `start_miles` int(6) NOT NULL,
  `end_miles` int(6) NOT NULL,
  `subttl` int(6) NOT NULL,
  `notes` varchar(155) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mileage`
--

LOCK TABLES `mileage` WRITE;
/*!40000 ALTER TABLE `mileage` DISABLE KEYS */;
INSERT INTO `mileage` VALUES (1,13,1,'INV_0008','','','2010-10-21',187673,187747,74,'');
INSERT INTO `mileage` VALUES (2,5,1,'INV_0009','','','2010-10-21',187747,187826,79,'');
INSERT INTO `mileage` VALUES (3,5,1,'INV_0009','','','2010-10-23',187886,187958,72,'');
INSERT INTO `mileage` VALUES (4,5,1,'INV_0009','','','2010-11-03',188331,188403,72,'');
INSERT INTO `mileage` VALUES (5,19,1,'INV_0010','','','2010-11-20',188256,188280,24,'');
INSERT INTO `mileage` VALUES (7,4,1,'INV_0012','','','2010-11-29',189098,189119,21,'');
INSERT INTO `mileage` VALUES (8,23,1,'INV_0013','','','2010-11-29',189119,189126,7,'');
INSERT INTO `mileage` VALUES (9,20,1,'INV_0014','','','2010-11-29',189126,189160,34,'');
INSERT INTO `mileage` VALUES (11,25,1,'INV_0016','','','2010-11-30',189160,189232,72,'');
INSERT INTO `mileage` VALUES (12,19,1,'INV_0017','','','2010-12-01',189232,189256,24,'Work Performed');
INSERT INTO `mileage` VALUES (13,27,1,'INV_0024','','','2010-12-09',189480,189501,21,'Evaluation (Trash Out)');
INSERT INTO `mileage` VALUES (14,26,1,'INV_0018','','','2010-12-14',189774,189793,19,'Work Performed');
INSERT INTO `mileage` VALUES (15,27,1,'INV_0022','','','2011-01-03',190153,190173,20,'Evaluation (Deck)');
INSERT INTO `mileage` VALUES (16,28,1,'INV_0020','','','2011-01-04',190173,190201,28,'Work Performed');
INSERT INTO `mileage` VALUES (17,4,1,'INV_0021','','','2011-01-04',190201,190213,12,'Work Performed');
INSERT INTO `mileage` VALUES (18,27,1,'INV_0022','','','2011-01-25',190832,190839,7,'Home Depot');
INSERT INTO `mileage` VALUES (19,27,1,'INV_0022','','','2011-01-27',190839,190846,7,'Home Depot');
INSERT INTO `mileage` VALUES (20,27,1,'INV_0022','','','2011-01-31',190857,190864,7,'Home Depot');
INSERT INTO `mileage` VALUES (21,27,1,'INV_0022','','','2011-02-01',190885,190905,20,'');
INSERT INTO `mileage` VALUES (22,27,1,'INV_0022','','','2011-02-04',190937,190957,20,'Work Performed');
INSERT INTO `mileage` VALUES (23,29,1,'INV_0027','','','2011-02-13',191319,191330,11,'Evaluation');
INSERT INTO `mileage` VALUES (24,29,1,'INV_0027','','','2011-02-14',191336,191343,7,'Home Depot (Bid)');
INSERT INTO `mileage` VALUES (25,24,1,'INV_0023','','','2011-02-26',191570,191587,17,'Work Performed');
INSERT INTO `mileage` VALUES (26,27,1,'INV_0024','','','2011-03-11',192057,192099,42,'Work Performed');
INSERT INTO `mileage` VALUES (27,30,1,'INV_0025','','','2011-03-21',192516,192556,46,'Work Performed');
INSERT INTO `mileage` VALUES (28,31,1,'INV_0026','','','2011-03-22',192584,192612,28,'Work Performed (No Power, Drain Tank)');
INSERT INTO `mileage` VALUES (29,29,1,'INV_0028','','','2011-03-23',192612,192637,25,'Work performed');
INSERT INTO `mileage` VALUES (30,31,1,'INV_0026','','','2011-03-24',192656,192684,24,'Work performed');
INSERT INTO `mileage` VALUES (31,29,1,'INV_0027','','','2011-03-27',192753,192760,7,'Home Depot');
INSERT INTO `mileage` VALUES (32,29,1,'INV_0027','','','2011-03-27',192771,192796,25,'Material Drop-Off');
INSERT INTO `mileage` VALUES (33,29,1,'INV_0027','','','2011-03-28',192796,192821,25,'Work Performed');
INSERT INTO `mileage` VALUES (34,29,1,'INV_0027','','','2011-03-28',192821,192828,7,'Home Depot');
INSERT INTO `mileage` VALUES (35,29,1,'INV_0027','','','2011-03-28',192828,192853,25,'Work performed');
INSERT INTO `mileage` VALUES (36,29,1,'INV_0027','','','2011-03-29',192903,192910,7,'Home Depot');
INSERT INTO `mileage` VALUES (37,29,1,'INV_0027','','','2011-03-29',192910,192935,25,'Work performed');
INSERT INTO `mileage` VALUES (38,29,1,'INV_0027','','','2011-03-30',192935,192960,25,'Work Peformed');
INSERT INTO `mileage` VALUES (39,31,1,'INV_0029','','','2011-04-03',193128,193133,28,'Work Performed');
INSERT INTO `mileage` VALUES (40,30,1,'INV_0025','','','2011-04-25',193732,193778,46,'Performed Work');
INSERT INTO `mileage` VALUES (41,30,1,'INV_0025','','','2011-04-26',193778,193824,46,'Performed Work');
INSERT INTO `mileage` VALUES (42,31,1,'INV_0031','','','2011-04-27',193824,193852,28,'Work Performed');
INSERT INTO `mileage` VALUES (43,29,1,'INV_0032','','','2011-04-28',193852,193859,7,'Home Depot');
INSERT INTO `mileage` VALUES (44,29,1,'INV_0032','','','2011-04-29',193859,193884,25,'Work Performed');
INSERT INTO `mileage` VALUES (45,30,2,'INV_0030','','','2011-04-29',77632,77678,46,'Work Performed (1st load - Wood Recycling)');
INSERT INTO `mileage` VALUES (46,30,2,'INV_0030','','','2011-04-30',77678,77724,46,'Work Performed (2nd load - Wood Recycling)');
INSERT INTO `mileage` VALUES (47,30,2,'INV_0030','','','2011-04-30',77724,77770,46,'Work Performed (3rd load - Wood Recycling)');
INSERT INTO `mileage` VALUES (48,30,2,'INV_0030','','','2011-04-30',77770,77816,46,'Work Performed (4th load - Wood Recycling)');
INSERT INTO `mileage` VALUES (49,30,2,'INV_0030','','','2011-04-30',77816,77862,46,'Work Performed (5th Load - Wood Recycling)');
INSERT INTO `mileage` VALUES (50,30,2,'INV_0030','','','2011-04-30',77862,77908,46,'Work Performed (6th Load - Wood Recycling)');
INSERT INTO `mileage` VALUES (51,30,2,'INV_0030','','','2011-05-01',77908,77954,46,'Work Performed (Dump)');
INSERT INTO `mileage` VALUES (52,30,2,'INV_0033','','','2011-05-01',77954,78000,46,'Work Performed (Int. Cleaning)');
INSERT INTO `mileage` VALUES (53,33,1,'INV_0034','','','2011-05-03',193844,193859,15,'Work Performed');
INSERT INTO `mileage` VALUES (54,4,2,'INV_0035','','','2011-05-04',78000,78020,20,'Work Performed (Lawn Maintenance)');
INSERT INTO `mileage` VALUES (55,35,1,'INV_0036','','','2011-05-09',194326,194344,18,'Work Performed');
INSERT INTO `mileage` VALUES (56,29,2,'INV_0037','','','2011-05-10',78020,78027,7,'Home Depot');
INSERT INTO `mileage` VALUES (57,29,2,'INV_0037','','','2011-05-10',78027,78052,25,'Work Performed');
INSERT INTO `mileage` VALUES (58,34,1,'INV_0043','','','2011-05-11',194344,194361,17,'Work Performed');
INSERT INTO `mileage` VALUES (59,29,2,'INV_0038','','','2011-05-12',78052,78077,25,'Work Performed');
INSERT INTO `mileage` VALUES (60,33,2,'INV_0039','','','2011-05-13',78077,78092,15,'Work Performed');
INSERT INTO `mileage` VALUES (61,35,1,'INV_0040','','','2011-05-13',194361,194379,18,'No Power - Drained Tank');
INSERT INTO `mileage` VALUES (62,33,2,'INV_0039','','','2011-05-13',78092,78110,18,'Home Depot & Work Performed');
INSERT INTO `mileage` VALUES (63,30,2,'INV_0046','INV_0045','','2011-05-15',78110,78156,46,'Work Performed');
INSERT INTO `mileage` VALUES (64,29,2,'INV_0041','','','2011-05-16',78156,78181,25,'Work Performed');
INSERT INTO `mileage` VALUES (65,35,2,'INV_0036','INV_0040','','2011-05-17',78181,78199,18,'Work Performed');
INSERT INTO `mileage` VALUES (66,30,1,'INV_0044','','','2011-05-18',194379,194425,46,'');
INSERT INTO `mileage` VALUES (67,36,2,'INV_0042','','','2011-05-19',78199,78249,50,'Work Performed');
INSERT INTO `mileage` VALUES (68,37,2,'INV_0047','','','2011-05-24',78249,78300,51,'');
INSERT INTO `mileage` VALUES (69,38,2,'INV_0052','','','2011-05-25',78300,78334,34,'Eviction');
INSERT INTO `mileage` VALUES (72,37,1,'INV_0049','','','2011-05-29',194482,194533,51,'Work Performed');
INSERT INTO `mileage` VALUES (70,38,2,'INV_0052','INV_0053','','2011-05-27',78334,78400,66,'(includes 3 dump runs)');
INSERT INTO `mileage` VALUES (71,37,1,'INV_0049','','','2011-05-29',194475,194482,7,'Home Depot');
INSERT INTO `mileage` VALUES (73,39,1,'INV_0054','','','2011-06-02',194683,194700,17,'Box Code Worked, Key did not - No electricity too');
INSERT INTO `mileage` VALUES (74,39,1,'INV_0054','','','2011-06-03',194786,194803,17,'Work Performed');
INSERT INTO `mileage` VALUES (75,23,1,'INV_0050','','','2011-06-06',195347,195364,17,'Home Depot');
INSERT INTO `mileage` VALUES (76,23,1,'INV_0050','','','2011-06-06',195364,195381,17,'Work Performed');
INSERT INTO `mileage` VALUES (77,23,1,'INV_0050','','','2011-06-07',195381,195398,17,'Work Performed');
INSERT INTO `mileage` VALUES (78,23,1,'INV_0050','','','2011-06-09',195398,195415,17,'Work Performed');
INSERT INTO `mileage` VALUES (79,38,2,'INV_0055','','','2011-06-10',78457,78479,22,'Work Performed - Carpet & Pad Tear Out');
INSERT INTO `mileage` VALUES (80,38,1,'INV_0056','','','2011-06-11',195415,195422,7,'Home Depot');
INSERT INTO `mileage` VALUES (81,38,1,'INV_0055','INV_0056','','2011-06-12',195422,195444,22,'Work Performed');
INSERT INTO `mileage` VALUES (82,38,1,'INV_0055','INV_0056','','2011-06-13',195444,195466,22,'Work Performed');
INSERT INTO `mileage` VALUES (83,23,1,'INV_0050','','','2011-06-13',195466,195473,7,'Home Depot');
INSERT INTO `mileage` VALUES (84,23,1,'INV_0050','','','2011-06-13',195473,195490,17,'Work Performed');
INSERT INTO `mileage` VALUES (85,38,1,'INV_0055','INV_0056','','2011-06-13',195490,195512,22,'Work Performed');
INSERT INTO `mileage` VALUES (86,38,1,'INV_0057','','','2011-06-16',195512,195534,22,'Work Performed (included gas run)');
INSERT INTO `mileage` VALUES (87,38,1,'INV_0058','','','2011-06-22',196607,196633,26,'Work Performed and Stewarts True Hardware Store');
INSERT INTO `mileage` VALUES (88,38,1,'INV_0058','','','2011-06-23',196633,196655,22,'Work Performed');
INSERT INTO `mileage` VALUES (89,38,1,'INV_0058','','','2011-06-24',196655,196677,22,'Work Performed');
INSERT INTO `mileage` VALUES (90,38,2,'INV_0058','','','2011-06-27',78507,78577,7,'Home Depot');
INSERT INTO `mileage` VALUES (91,38,2,'INV_0058','','','2011-06-28',78577,78599,22,'Work Performed (Railing)');
INSERT INTO `mileage` VALUES (92,38,2,'INV_0058','','','2011-06-30',78599,78611,22,'Work Performed');
INSERT INTO `mileage` VALUES (93,38,2,'INV_0058','','','2011-07-02',78611,78633,22,'Work Performed');
INSERT INTO `mileage` VALUES (94,38,2,'INV_0058','','','2011-07-05',78633,78655,22,'Work Performed');
INSERT INTO `mileage` VALUES (95,40,2,'INV_0059','','','2011-07-05',78655,78662,7,'Home Depot');
INSERT INTO `mileage` VALUES (96,40,1,'INV_0059','','','2011-07-11',196677,196696,19,'Work Performed');
INSERT INTO `mileage` VALUES (97,40,2,'INV_0059','','','2011-07-11',78662,78669,7,'Home Depot');
INSERT INTO `mileage` VALUES (98,40,2,'INV_0059','','','2011-07-12',78669,78688,19,'Work Performed');
INSERT INTO `mileage` VALUES (99,29,2,'INV_0060','','','2011-07-18',78688,78710,22,'Work Performed');
INSERT INTO `mileage` VALUES (100,41,1,'INV_0061','','','2011-08-10',196696,196720,24,'Site Consultation/Measuring');
INSERT INTO `mileage` VALUES (101,41,1,'INV_0061','','','2011-08-10',196720,196727,7,'Home Depot');
INSERT INTO `mileage` VALUES (102,41,1,'INV_0061','','','2011-08-11',196727,196751,24,'Unloaded tools, but no power at house');
INSERT INTO `mileage` VALUES (103,43,1,'','','','2011-08-11',196751,196770,19,'View to Bid');
INSERT INTO `mileage` VALUES (104,41,1,'INV_0061','','','2011-08-12',196770,196794,24,'Work Performed');
INSERT INTO `mileage` VALUES (105,43,2,'INV_0062','','','2011-08-19',78910,78917,7,'Home Depot');
INSERT INTO `mileage` VALUES (106,43,2,'INV_0062','','','2011-08-20',78917,78937,20,'Work Performed');
INSERT INTO `mileage` VALUES (107,43,2,'INV_0062','','','2011-08-19',78937,78957,20,'Work Performed');
INSERT INTO `mileage` VALUES (108,33,2,'INV_0063','','','2011-08-21',78957,78964,7,'Home Depot');
INSERT INTO `mileage` VALUES (109,33,2,'INV_0063','','','2011-08-22',78964,78971,7,'Home Depot');
INSERT INTO `mileage` VALUES (110,33,2,'INV_0063','','','2011-08-22',78971,78989,18,'Work Performed (Framing and Electrical)');
INSERT INTO `mileage` VALUES (111,33,2,'INV_0063','','','2011-08-23',78989,78996,7,'Home Depot');
INSERT INTO `mileage` VALUES (112,33,2,'INV_0063','','','2011-08-23',78996,79014,18,'Work Performed (Install Drywall)');
INSERT INTO `mileage` VALUES (113,33,2,'INV_0063','','','2011-08-24',79014,79021,7,'Home Depot');
INSERT INTO `mileage` VALUES (114,33,2,'INV_0063','','','2011-08-24',79021,79039,18,'Work Performed (1st Coat Mud)');
INSERT INTO `mileage` VALUES (115,33,1,'INV_0063','','','2011-08-25',196989,196996,7,'Home Depot');
INSERT INTO `mileage` VALUES (116,33,1,'INV_0063','','','2011-08-25',196994,197012,18,'Work Performed (2nd Coat Mud)');
INSERT INTO `mileage` VALUES (117,33,1,'INV_0063','','','2011-08-27',197121,197139,18,'Work Performed (2nd Coat Mud Part 2)');
INSERT INTO `mileage` VALUES (118,33,1,'INV_0063','','','2011-08-29',197139,197157,18,'Work Performed (3rd Coat Mud - Topping)');
INSERT INTO `mileage` VALUES (119,33,2,'INV_0063','','','2011-08-29',79041,79059,18,'Work Performed (Textured)');
INSERT INTO `mileage` VALUES (120,33,1,'INV_0063','','','2011-08-30',197157,197190,33,'Home Depot (2 trips) & Work Performed (Primer & Paint)');
INSERT INTO `mileage` VALUES (121,33,2,'INV_0063','','','2011-08-31',79059,79066,7,'Home Depot ');
INSERT INTO `mileage` VALUES (122,33,2,'INV_0063','','','2011-08-31',79066,79084,18,'Work Performed (Finish Work)');
INSERT INTO `mileage` VALUES (123,33,2,'INV_0063','','','2011-09-01',79084,79102,18,'Work Performed (Finish Work & Cleanup)');
INSERT INTO `mileage` VALUES (124,38,1,'INV_0064','','','2011-09-03',197190,197215,25,'Site Consultation & Home Depot');
INSERT INTO `mileage` VALUES (125,38,1,'INV_0064','','','2011-09-05',197215,197237,22,'Work Performed (Demo, Cleanup, & Tiling)');
INSERT INTO `mileage` VALUES (126,38,1,'INV_0064','','','2011-09-06',197237,197259,22,'Work Performed (Grouting)');
INSERT INTO `mileage` VALUES (127,44,1,'INV_0065','INV_0066','','2011-09-14',197500,197500,7,'Home Depot');
INSERT INTO `mileage` VALUES (128,44,1,'INV_0065','INV_0066','','2011-09-14',197500,197500,1,'Work Performed');
INSERT INTO `mileage` VALUES (129,45,1,'INV_0068','INV_0069','','2011-09-14',197500,197500,1,'Site Consoltation');
INSERT INTO `mileage` VALUES (130,46,1,'','','','2011-09-14',197500,197500,1,'Site Consultation');
INSERT INTO `mileage` VALUES (131,45,1,'INV_0067','INV_0068','','2011-09-15',197500,197500,1,'Home Depot');
INSERT INTO `mileage` VALUES (132,45,1,'INV_0067','INV_0068','','2011-09-15',197500,197500,1,'Work Performed');
INSERT INTO `mileage` VALUES (133,45,1,'INV_0067','INV_0068','','2011-09-15',197500,197500,1,'Work Performed');
INSERT INTO `mileage` VALUES (134,44,1,'INV_0068','','','2011-09-16',197500,197543,1,'Work Performed');
INSERT INTO `mileage` VALUES (135,47,1,'INV_0071','','','2011-10-04',197945,197969,24,'Work Performed');
INSERT INTO `mileage` VALUES (136,47,1,'INV_0072','','','2011-10-05',197969,198010,41,'Work Performed + Sears Run');
INSERT INTO `mileage` VALUES (137,46,1,'INV_0073','','','2011-10-10',198085,198101,16,'Work Performed');
INSERT INTO `mileage` VALUES (138,46,2,'INV_0074','','','2011-10-25',198302,198318,16,'Work Performed');
INSERT INTO `mileage` VALUES (139,46,2,'INV_0075','','','2011-10-25',198318,198334,16,'Work Performed');
INSERT INTO `mileage` VALUES (140,49,2,'INV_0076','','','2011-10-27',79102,79166,64,'Work Performed (plus 2 Trips to Dump)');
INSERT INTO `mileage` VALUES (141,50,1,'INV_0077','','','2011-11-09',198581,198605,24,'Work Performed');
INSERT INTO `mileage` VALUES (142,42,1,'INV_0079','','','2011-11-26',198908,198916,8,'Supply Run');
INSERT INTO `mileage` VALUES (143,42,1,'INV_0079','','','2011-11-27',198916,198986,70,'Work Performed');
INSERT INTO `mileage` VALUES (144,49,1,'INV_0080','','','2011-12-13',199233,199271,38,'Work Performed');
INSERT INTO `mileage` VALUES (145,42,1,'INV_0081','','','2011-12-19',199295,199375,80,'Home Depot and Work Performed');
INSERT INTO `mileage` VALUES (146,29,1,'INV_0082','','','2011-12-22',199427,199452,25,'Work Performed');
INSERT INTO `mileage` VALUES (147,0,1,'','','','2012-01-01',199453,199453,0,'Starting Mileage for Year');
INSERT INTO `mileage` VALUES (148,0,2,'','','','2012-01-01',79167,79167,0,'Starting Mileage for Year');
INSERT INTO `mileage` VALUES (149,49,1,'INV_0083','','','2012-01-24',200001,200039,38,'Work Performed');
/*!40000 ALTER TABLE `mileage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectsites`
--

DROP TABLE IF EXISTS `projectsites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projectsites` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `code` varchar(4) NOT NULL,
  `map` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectsites`
--

LOCK TABLES `projectsites` WRITE;
/*!40000 ALTER TABLE `projectsites` DISABLE KEYS */;
INSERT INTO `projectsites` VALUES (1,'36124 N Milan Elk Rd','Chattoroy','WA','99003','2610','http://maps.google.com/maps?oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&q=36124+N+Milan+Elk+Rd,+Chattaroy,+WA+99003&um=1&ie=UTF-8&hq=&hnear=0x5361f85ddc29a92b:0x951d12627d29840c,36124+N+Milan+Elk+Rd,+Chattaroy,+WA+99003&gl=us&ei=vMLiTfurNKvQiAL0l7WoBg&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CCEQ8gEwAA');
INSERT INTO `projectsites` VALUES (2,'1852 N Driskill','Newport','WA','99156','6467','');
INSERT INTO `projectsites` VALUES (3,'4072 Garden Spot Rd','Loon Lake','WA','99148','0','');
INSERT INTO `projectsites` VALUES (4,'224 W Carlisle Ave','Spokane','WA','99205','0','http://maps.google.com/maps?q=224+w+carlisle,+spokane,+wa+99205&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e18e3b7bda66b:0x3ac117a72e370e8,224+W+Carlisle+Ave,+Spokane,+WA+99205&gl=us&ei=8LH-TfPkNOHmiAL_tMy7CA&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CBkQ8gEwAA');
INSERT INTO `projectsites` VALUES (5,'24515 S Pine Springs Rd','Cheney','WA','99004','6987','');
INSERT INTO `projectsites` VALUES (13,'104 W Broadway St','St. John','WA','99171','7149','http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=104+w+broadway,+st.+john,+wa+99171&aq=&gl=us&ie=UTF8&hq=&hnear=104+W+Broadway+St,+St+John,+Whitman,+Washington+99171&t=h&z=16');
INSERT INTO `projectsites` VALUES (19,'3419 W Glass Ave','Spokane','WA','99205','0','');
INSERT INTO `projectsites` VALUES (20,'2306 W Walker Ct','Spokane','WA','99208','0','');
INSERT INTO `projectsites` VALUES (22,'340 S Campbell St','Airway Heights','WA','99224','0','');
INSERT INTO `projectsites` VALUES (23,'5423 N Monroe St','Spokane','WA','99205','3590','http://maps.google.com/maps?q=5423+N+Monroe+St,+Spokane,+WA+99205&oe=utf-8&client=firefox-a&ie=UTF8&hq=&hnear=5423+N+Monroe+St,+Spokane,+Washington+99205&gl=us&z=16');
INSERT INTO `projectsites` VALUES (24,'909 E Harding Dr','Colbert','WA','99218','0','');
INSERT INTO `projectsites` VALUES (25,'755 N Dundee Dr','Post Falls','ID','83854','0','');
INSERT INTO `projectsites` VALUES (26,'2718 E Sprague Ave','Spokane','WA','99202','0','');
INSERT INTO `projectsites` VALUES (27,'29009 N Cedar Rd','Deer Park','WA','99006','7693','');
INSERT INTO `projectsites` VALUES (28,'2822 W Cleveland Ave','Spokane','WA','99205','0','');
INSERT INTO `projectsites` VALUES (29,'20812 N Greenbluff Dr','Colbert','WA','99005','9614','');
INSERT INTO `projectsites` VALUES (30,'4119 W Owens Rd','Deer Park','WA','99006','3166','');
INSERT INTO `projectsites` VALUES (31,'2809 W Mallon Ave','Spokane','WA','99201','8173','');
INSERT INTO `projectsites` VALUES (33,'1312 E Princeton Ave','Spokane','WA','99207','4909','');
INSERT INTO `projectsites` VALUES (34,'4033 S Schafer Rd','Spokane Valley','WA','99206','0000','');
INSERT INTO `projectsites` VALUES (35,'21 N Bolivar St','Spokane Valley','WA','99206','0024','');
INSERT INTO `projectsites` VALUES (36,'6840 W Majestic Ave','Rathrum','ID','83858','8272','http://maps.google.com/maps?q=539%20E%20Bridgeport%20Ave%2C%20Spokane%2C%20WA%2099207&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&sa=N&hl=en&tab=wl');
INSERT INTO `projectsites` VALUES (37,'17207 N Trails End Road','Rathdrum','ID','83858','8271','http://maps.google.com/maps?q=539%20E%20Bridgeport%20Ave%2C%20Spokane%2C%20WA%2099207&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&sa=N&hl=en&tab=wl');
INSERT INTO `projectsites` VALUES (38,'2304 W Courtland Ave','Spokane','WA','99205','3543','http://maps.google.com/maps?oe=utf-8&client=firefox-a&q=2304+W+Courtland+Ave,+Spokane,+WA+99205&ie=UTF8&hq=&hnear=0x549e1909a7d89dd5:0xd6739a4975c27a9f,2304+W+Courtland+Ave,+Spokane,+WA+99205&gl=us&daddr=2304+W+Courtland+Ave,+Spokane,+WA+99205&z=16');
INSERT INTO `projectsites` VALUES (39,'539 E Bridgeport Ave','Spokane','WA','99207','4141','http://maps.google.com/maps?q=539%20E%20Bridgeport%20Ave%2C%20Spokane%2C%20WA%2099207&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&sa=N&hl=en&tab=wl');
INSERT INTO `projectsites` VALUES (40,'13916 E 9th Ct','Veradale','WA','99037','0233','http://maps.google.com/maps?q=13916+e+9th+ct.,+veradale,+wa+99037&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e2088104689ed:0x4b53495d1d02f07b,13916+E+9th+Ct,+Veradale,+WA+99037&gl=us&ei=bOzvTc3HLIWgtwfKxsTCCQ&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CBYQ8gEwAA');
INSERT INTO `projectsites` VALUES (41,'9002 N Pamela St','Spokane','WA','99208','8562','http://maps.google.com/maps?q=9002+N+Pamela,+SPokane,+wa&oe=utf-8&client=firefox-a&gl=us&t=h&z=16');
INSERT INTO `projectsites` VALUES (42,'3855 Powers Rd','Loon Lake','WA','99148','7968','http://maps.google.com/maps?q=3855+Powers,+Loon+Lake,+wa&hl=en&client=firefox-a&gl=us&t=h&z=16');
INSERT INTO `projectsites` VALUES (43,'1017 W Providence Ave','Spokane','WA','99205','6197','http://maps.google.com/maps?q=1017+W+Providence,+spokane,+wa+99205&oe=utf-8&client=firefox-a&gl=us&t=h&z=16');
INSERT INTO `projectsites` VALUES (44,'6617 Thomas Lane','Nine Mile Falls','WA','99029','5878','http://maps.google.com/maps?q=6617+Thomas+Lane+Nine+Mile+Falls+99029&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e0652d1dd5493:0x3d4a2a072dd5bd20,6617+Thomas+Ln,+Nine+Mile+Falls,+WA+99026&gl=us&ei=uwJsTsejG5KKsAKBw9jKBA&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CBYQ8gEwAA');
INSERT INTO `projectsites` VALUES (45,'6211 N Alberta St','Spokane','WA','99205','3543','http://maps.google.com/maps?q=6211+n+alberta,+spokane,+wa&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e19618be1d0b1:0x7458f66c0a55b7e5,6211+N+Alberta+St,+Spokane,+WA+99205&gl=us&ei=6_hvTtyeGojWiALAypDuBg&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CBgQ8gEwAA');
INSERT INTO `projectsites` VALUES (46,'1920 N Regal St','Spokane','WA','99207','3590','http://www.google.com/search?q=1920+n+regal%2C+spokane%2C+wa&ie=utf-8&oe=utf-8&aq=t&rls=org.mozilla:en-US:official&client=firefox-a');
INSERT INTO `projectsites` VALUES (47,'723 E Upper Terrace Ln','Colbert','WA','99005','','http://maps.google.com/maps?q=723+e+upper+terrace,+colbert,+wa&oe=utf-8&rls=org.mozilla:en-US:unofficial&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e02b4ab593681:0x20a24d750c7d394e,723+E+Upper+Terrace+Ln,+Colbert,+WA+99005&gl=us&ei=6CSLTpX1BLKMsALuurjRBA&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CBwQ8gEwAA');
INSERT INTO `projectsites` VALUES (49,'1014 S Antelope Ave','Spokane','WA','99224','4498','http://maps.google.com/maps?q=1014+s+antelope,+airway+heights,+wa&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e16f8ab6486a9:0x713e52f03764e176,1014+S+Antelope+Ave,+Spokane,+WA+99224&gl=us&ei=PEqoTtyIGcmaiQLdxoGxCg&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CBsQ8gEwAA');
INSERT INTO `projectsites` VALUES (50,'1427 E 35th Ave','Spokane','WA','99203','0000','http://maps.google.com/maps?q=1427+E+35th+Ave,+Spokane,+WA+99203&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e22f38735420f:0x85a140fb23ae9c09,1427+E+35th+Ave,+Spokane,+WA+99203&gl=us&ei=NzW4TvSiDseXiALWmcG8BQ&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CCAQ8gEwAA');
INSERT INTO `projectsites` VALUES (51,'1024 N Fox Ridge Rd','Medical Lake','WA','99022','0042','http://maps.google.com/maps?q=1024+N+Fox+Ridge,+medical+lake,+wa&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e155aa9fb7503:0xfb5fb9e868e37bbf,1024+Fox+Ridge+Rd,+Medical+Lake,+WA+99022&gl=us&ei=P5m9TpalEs7XiALTvqyCAw&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CB0Q8gEwAA');
INSERT INTO `projectsites` VALUES (52,'1405 E Cambridge Ln','Spokane','WA','99203','','http://maps.google.com/maps?q=1405+E+Cambridge,+Spokane,+WA&oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&um=1&ie=UTF-8&hq=&hnear=0x549e22f4b4122b5f:0x84f9e61eee44e83a,1405+E+Cambridge+Ln,+Spokane,+WA+99203&gl=us&ei=ibf8TpWdIKKniQL_kMykDg&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CCAQ8gEwAA');
INSERT INTO `projectsites` VALUES (53,'12428 N Denver Drive','Mead','WA','99218','0000','http://maps.google.com/maps?oe=utf-8&rls=org.mozilla:en-US:official&client=firefox-a&q=12428+n+denver+dr.,+mead,+wa&um=1&ie=UTF-8&hq=&hnear=0x549e1dabae56d2db:0xe4a3dfef3914894b,12428+N+Denver+Dr,+Spokane,+WA+99218&gl=us&ei=-gtkT6j-FcKmiQKup8yiDw&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CCEQ8gEwAA');
INSERT INTO `projectsites` VALUES (54,'10720 E 31st Ave','Spokane Valley','WA','99206','','https://maps.google.com/maps?q=10720+E+31st+ave%2c+spokane+valley%2c+wa+99206');
INSERT INTO `projectsites` VALUES (55,'7925 N Scott Rd','Spokane','WA','99217','','');
INSERT INTO `projectsites` VALUES (56,'3807 E 29th Ave','Spokane','WA','99223','CMS','https://maps.google.com/maps?q=3807+e+29th+ave,+spokane,+wa+99223&ie=UTF-8&hq=&hnear=0x549e22472392730d:0x2492a7dc4f7c24de,3807+E+29th+Ave,+Spokane,+WA+99223&gl=us&ei=NsZJUcrwDeiGjAKBkYDgBA&ved=0CDMQ8gEwAA');
INSERT INTO `projectsites` VALUES (57,'1703 E 4th Ave','Spokane','WA','99202','OCN','https://maps.google.com/maps?q=1703+E+4th+Ave,+SPokane,+WA&ie=UTF-8&hq=&hnear=0x549e189c02565f2f:0x1ffacb5857831519,1703+E+4th+Ave,+Spokane,+WA+99202&gl=us&ei=WbRgUc-tKYG1iwKX1oD4DA&ved=0CDMQ8gEwAA');
/*!40000 ALTER TABLE `projectsites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sku`
--

DROP TABLE IF EXISTS `sku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sku` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `shortdesc` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sku`
--

LOCK TABLES `sku` WRITE;
/*!40000 ALTER TABLE `sku` DISABLE KEYS */;
INSERT INTO `sku` VALUES (1,'Winterize','');
INSERT INTO `sku` VALUES (2,'Lock Replacement','');
INSERT INTO `sku` VALUES (3,'Trash Out','');
INSERT INTO `sku` VALUES (4,'Demolition','');
INSERT INTO `sku` VALUES (5,'Repair','');
INSERT INTO `sku` VALUES (6,'Snow Removal','Shovel Walkway, Driveway, Paths');
INSERT INTO `sku` VALUES (7,'Installation','Installation');
INSERT INTO `sku` VALUES (8,'Lawn Maintenance','Lawn Maintenance');
INSERT INTO `sku` VALUES (9,'Interior Cleaning','Interior Cleaning');
INSERT INTO `sku` VALUES (10,'Exterior Cleaning','Minor Exterior Cleaning');
INSERT INTO `sku` VALUES (11,'Mold Remediation','Mold Removal/Remediation');
INSERT INTO `sku` VALUES (12,'De-Winterize','');
INSERT INTO `sku` VALUES (13,'Electronic Device Configuration','recode garage door opener');
INSERT INTO `sku` VALUES (14,'Materials','Supply Materials for a company');
INSERT INTO `sku` VALUES (15,'Short-term Loan','Short-term Loan');
/*!40000 ALTER TABLE `sku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terms` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms`
--

LOCK TABLES `terms` WRITE;
/*!40000 ALTER TABLE `terms` DISABLE KEYS */;
INSERT INTO `terms` VALUES (1,'Due on Receipt');
INSERT INTO `terms` VALUES (2,'Net 15');
INSERT INTO `terms` VALUES (3,'Net 30');
INSERT INTO `terms` VALUES (4,'Net 45');
INSERT INTO `terms` VALUES (5,'Net 60');
INSERT INTO `terms` VALUES (6,'Net 90');
INSERT INTO `terms` VALUES (7,'Test');
/*!40000 ALTER TABLE `terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `man_year` year(4) NOT NULL,
  `make` varchar(25) NOT NULL,
  `model` varchar(25) NOT NULL,
  `submodel` varchar(25) NOT NULL,
  `engine` varchar(155) NOT NULL,
  `notes` varchar(155) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,1994,'Subaru','Legacy','L','2.2L 2212 CC H4','5 Door Station Wagon (AWD)');
INSERT INTO `vehicles` VALUES (2,1981,'Ford','F-150','Custom','4.9L 300 CID L6 ','1/2 Ton Pickup (2WD - rear wheel drive)');
INSERT INTO `vehicles` VALUES (3,2003,'GMC','Yukon','Denali XL','6.0L V-8','AWD');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `shortname` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` VALUES (1,'Home Depot','5617 E Sprague Ave.','Spokane Valley','WA',99212,'(509) 534-8588','Home Depot - Valley');
INSERT INTO `vendor` VALUES (2,'Home Depot','9116 N Newport Highway','Spokane','WA',99218,'(509) 466-89','Home Depot - Northside');
INSERT INTO `vendor` VALUES (3,'Home Depot','21701 East Country Vista Dr.','Liberty Lake','WA',99019,'(509) 891-06','Home Depot - Liberty Lake');
INSERT INTO `vendor` VALUES (4,'Ziggys','17002 E Sprague Ave.','Spokane Valley','WA',99037,'(509) 922-18','Ziggys - Veradale');
INSERT INTO `vendor` VALUES (5,'O&#39;Reilly Auto Parts','3125 E Francis Ave','Spokane','WA',99208,'(509) 466-2086','O&#39;Reilly - Francis');
INSERT INTO `vendor` VALUES (6,'O&#39;Reilly Auto Parts','2204 N Argonne Rd','Spokane','WA',99212,'(509) 922-5020','O&#39;Reilly - Argonne');
INSERT INTO `vendor` VALUES (7,'O&#39;Reilly Auto Parts','11606 E Sprague Ave','Spokane Valley','WA',99206,'(509) 924-5001','O&#39;Reilly - Bowdish');
INSERT INTO `vendor` VALUES (8,'River Ridge Food & Gas','2508 W NW Blvd','Spokane','WA',99205,'(509) 325-5881','River Ridge Gas');
INSERT INTO `vendor` VALUES (9,'Stewarts True Value Hardware Store','1905 N Monroe St','Spokane','WA',99205,'(509) 000-0000','Tru Value - Monroe');
INSERT INTO `vendor` VALUES (10,'Shell Station','12310 SR 395','Spokane','WA',99218,'(509) 981-5000','Shell - 395');
INSERT INTO `vendor` VALUES (11,'Divines','1520 N Pines Rd','Spokane Valley','WA',99206,'(509) 922-3911','Divines - Pines');
INSERT INTO `vendor` VALUES (12,'Tesoro','209 N Sullivan Rd','Veradale','WA',99037,'(509) 000-0000','Tesoro - N Sullivan');
INSERT INTO `vendor` VALUES (13,'LMC Truck','15450 W 108th St','Lenexa','KS',66219,'(800) 562-8782','LMC Truck');
INSERT INTO `vendor` VALUES (14,'Tesoro','13819 E Trent Rd','Spokane','WA',99212,'(509) 928-5632','Tesoro - Trent');
INSERT INTO `vendor` VALUES (15,'Albertsons Express','8915 E Trent Ave','Spokane','WA',99212,'(509) 893-1142','Albertons Gas - Trent');
INSERT INTO `vendor` VALUES (16,'Exxon Express','25105 E Trent Ave','Newman Lake','WA',99025,'(509) 226-3331','Exxon - Newman Lake');
INSERT INTO `vendor` VALUES (17,'Hauser Smoke Shop','26913 W Highway 53','Hauser','ID',83854,'(208) 773-5571','Hauser Smoke Shop');
INSERT INTO `vendor` VALUES (18,'Conoco','1520 N Argonne Rd','Spokane','WA',99212,'(509) 892-5201','Conoco- Argonne');
INSERT INTO `vendor` VALUES (19,'Amazon','http://www.amazon.com','','',0,'','Amazon.com');
INSERT INTO `vendor` VALUES (20,'Chevron','1520 N Argonne Rd','Spokane Valley','WA',99206,'','Chevron - Mission & Argonne');
INSERT INTO `vendor` VALUES (21,'All-Wall','12700 N.E. 124th St. #9 ','Kirkland, WA','WA',98034,'(800) 929-0927','All-Wall - Kirkland');
INSERT INTO `vendor` VALUES (22,'7-Eleven','3409 N Argonne Rd','Millwood','WA',99212,'(509) 926-0380','7-11 Millwood');
INSERT INTO `vendor` VALUES (23,'Sears','4700 N Division St','Spokane','WA',99207,'(509) 482-5600','Sears - Northtown Mall');
INSERT INTO `vendor` VALUES (24,'Waste to Energy Plan','2900 S Geiger Blvd','Spokane','WA',99224,'(509) 625-6871','Waste Disposal - Airway Heights');
INSERT INTO `vendor` VALUES (25,'Valley Transfer Station','3941 N Sullivan Rd','Spokane','WA',99216,'','Waste Disposal - Sullivan');
INSERT INTO `vendor` VALUES (26,'Village Supply / True Value','220 E Lake Street','Medical Lake','WA',99022,'(509) 299-3451','True Value - Medical Lake');
INSERT INTO `vendor` VALUES (27,'Hico Village','9219 E Sprague Ave','Spokane','WA',99206,'','Hico Village - Argonne');
INSERT INTO `vendor` VALUES (28,'Tesoro','104 W 2nd Ave','Spokane','WA',99201,'','Tesoro - Piggy Mart');
INSERT INTO `vendor` VALUES (29,'eReplacementParts.com','564 W 932 S','Sandy','UT',84070,'(866) 802-6383','eReplacementParts.com');
INSERT INTO `vendor` VALUES (30,'Whitley Oil #1','217 S Division St','Spokane','WA',99201,'','Exxon - Whitley Oil');
INSERT INTO `vendor` VALUES (31,'7-Eleven','3409 N Argonne Rd','Millwood','WA',99212,'','7-Eleven - Millwood');
INSERT INTO `vendor` VALUES (32,'Cenex Zip Trip','1403 N Mullan Rd','Spokane','WA',99206,'(509) 926-3632','Zip Trip - Mullan');
INSERT INTO `vendor` VALUES (33,'Zin Foodmart','1703 E Francis Ave','Spokane','WA',99208,'(509) 482-1204','Zin Foodmart');
INSERT INTO `vendor` VALUES (34,'Coop Supply Inc','606 W Mullan','Post Falls','ID',83854,'','Coop Supply - Post Falls');
INSERT INTO `vendor` VALUES (35,'Costco 670','5601 E Sprague Ave','Spokane','WA',99206,'','Costco Gas - Valley');
INSERT INTO `vendor` VALUES (36,'Holiday #289','2303 N Argonne Rd','Spokane','WA',99212,'(509) 928-0436','Holiday - N Argonne');
INSERT INTO `vendor` VALUES (37,'Dollar Tree Stores, Inc','9211 E Montgomery Ave','Spokane','WA',99206,'(509) 893-0267','Dollar Tree - Argonne & Montgomery');
INSERT INTO `vendor` VALUES (38,'Grizzly Industrial, Inc','PO Box 2069','Bellingham','WA',98227,'(800) 523-4777','Grizzly');
INSERT INTO `vendor` VALUES (39,'Woodcraft (#573)','212 N Sullivan Rd, Ste C','Spokane Valley','WA',99037,'(509) 892-9663','Woodcraft (Sullivan & Sprague)');
INSERT INTO `vendor` VALUES (40,'International Code Council','4051 W Flossmoor Rd','County Club Hills','IL',60478,'','ICC');
INSERT INTO `vendor` VALUES (41,'Flying J','400 N Idahline Rd','Post Falls','ID',83854,'(208) 773-0593','Flying J - Post Falls');
INSERT INTO `vendor` VALUES (42,'Chevron','4020 E Seltice Way','Post Falls','ID',83854,'','Chevron - Post Falls');
INSERT INTO `vendor` VALUES (43,'Vehicle Emissions #15','920 N Hamilton St','Spokane','WA',99202,'(509) 482-7724','Vehicle Emission - Hamilton');
INSERT INTO `vendor` VALUES (44,'Spokane Valley Licensing','9405 E Sprague Ave','Spokane','WA',99206,'(509) 928-7891','DOL - Sprague Ave');
INSERT INTO `vendor` VALUES (45,'Northtown Gas & Deli','4615 N Division St','Spokane','WA',99207,'(800) 373-3277','Northtown Gas & Deli');
INSERT INTO `vendor` VALUES (46,'V.H. Services','12613 E Sprague Ave','Spokane Valley','WA',99216,'(509) 922-1995','VH Services - Mechanic');
INSERT INTO `vendor` VALUES (47,'Unigard Insurance Company','PO Box 90701','Bellevue','WA',98009,'','UniGard Insurance');
INSERT INTO `vendor` VALUES (48,'Broadway Station','5821 E Broadway Ave','Spokane Valley','WA',0,'(509) 534-2347','Broadway Station');
INSERT INTO `vendor` VALUES (49,'NewEgg.com','9997 Rose Hills Road','Whittier','CA',90601,'','NewEgg.com');
INSERT INTO `vendor` VALUES (50,'Big R','8307 E Trent Ave','Spokane','WA',99212,'(509) 922-1090','Big R');
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-08 15:10:20
