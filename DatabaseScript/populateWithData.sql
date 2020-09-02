LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,1994,'Subaru','Legacy','L','2.2L 2212 CC H4','5 Door Station Wagon (AWD)');
INSERT INTO `vehicles` VALUES (2,1981,'Ford','F-150','Custom','4.9L 300 CID L6 ','1/2 Ton Pickup (2WD - rear wheel drive)');
INSERT INTO `vehicles` VALUES (3,2003,'GMC','Yukon','Denali XL','6.0L V-8','AWD');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;