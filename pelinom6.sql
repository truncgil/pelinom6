/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pelinom6

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-04 10:59:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contents
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_type` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kid` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s` int(255) DEFAULT NULL,
  `tkid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` int(255) DEFAULT 0,
  `breadcrumb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fields` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES ('1', '30201494', 'Test sayfa', 'Sayfa', null, '', null, null, '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', 0x7B225F746F6B656E223A2262596C67466D65414261774D4B593742324E63454C387445706D4E43777555624A5843473734676F222C226964223A2231222C226B6964223A226D61696E222C226F6C64736C7567223A223330323031343934222C227469746C65223A2254657374207361796661222C22736C7567223A223330323031343934222C2274797065223A225361796661222C2268746D6C223A223C703E4275726173C4B12050656C696E6F6D20696C652079617AC4B16C616E20266F756D6C3B726E656B2062697220736179666164C4B1722E266E6273703B3C5C2F703E222C226261636B223A6E756C6C7D, '2019-12-04 07:00:06', '2019-12-04 07:00:06', 'main', null, '[]', null, '0', '', null);

-- ----------------------------
-- Table structure for fields
-- ----------------------------
DROP TABLE IF EXISTS `fields`;
CREATE TABLE `fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `input_type` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'input type',
  `values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fields
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------

-- ----------------------------
-- Table structure for translate
-- ----------------------------
DROP TABLE IF EXISTS `translate`;
CREATE TABLE `translate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `ceviri` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kr` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `dil` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=226 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of translate
-- ----------------------------
INSERT INTO `translate` VALUES ('150', 'tr', 'Türkçe', 'e7d707a26e7f7b6ff52c489c60e429b1', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('151', 'Çevirisini Düzenle', 'Çevirisini Düzenle', 'b29503a48585f9cf50647406a8a883fb', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('152', ' Çevirisini bu sayfadan düzenleyebilirsiniz', ' Çevirisini bu sayfadan düzenleyebilirsiniz', '3a173616f5e5c876fa206c674b9b5a2c', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('153', 'Tüm İçeriklerin Satırlarını Oluştur', 'Tüm İçeriklerin Satırlarını Oluştur', '2222c8610fe6fa5745a5840108e9bede', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('154', 'Dili Şu Şekilde Değiştir:', 'Dili Şu Şekilde Değiştir:', 'a6d666cd74c8183a24c881d9edb7ef7e', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('155', 'İçerik', 'İçerik', '74e3100394242ac03b68b06d87f06842', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('156', 'Çeviri', 'Çeviri', '244a901ac68d0216aab8d4ea9466ec30', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('157', 'İşlem', 'İşlem', '792e76c0e5c706b935c366c4e3092ee4', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('158', 'Bu satırı sil', 'Bu satırı sil', '4299a6b5b791fe604ce4e476d7d9f6ca', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('159', 'Profil Ayarları', 'Profil Ayarları', '835753b44a8e7d5ffb4cdcdf20e4c05f', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('160', 'Adı', 'Adı', '687529c7029fa12076a0417397faea50', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('161', 'Soyadı', 'Soyadı', '7dac2c3cabb787ea566001f6b84fdabf', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('162', 'E-Mail', 'E-Mail', '082e55a73f10496681c84231dc1c88f7', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('163', 'Telefon', 'Telefon', '0975cf6baccb3862c31522c2b5b8fabc', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('164', 'Şifre', 'Şifre', 'd179bd56682615b740d552d862917f5e', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('165', '(Değiştirmek istemiyorsanız boş bırakın)', '(Değiştirmek istemiyorsanız boş bırakın)', 'f9bd3a923bc6b57ed5b17b6114ac95cd', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('166', 'Bilgilerimi Güncelle', 'Bilgilerimi Güncelle', 'bf8390626f118e4bcfe869141783a7a5', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('167', 'Özet', 'Özet', '7fb75e88482853722ea1ab645c9c29a4', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('168', 'İçerik Türleri', 'İçerik Türleri', '7743f7778a4cf6f122c5a970551faee1', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('169', 'Ana İçerikler', 'Ana İçerikler', '0e363cda889997325b81bc8192f626bb', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('170', 'Test sayfa', 'Test sayfa', '7dd1787c07aac64f196ae889f3da25e7', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('171', 'Bekleyiniz...', 'Bekleyiniz...', '3f1f4e23fa70f6b57ea211c982f30984', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('172', 'İçerik Yönetimi', 'İçerik Yönetimi', 'ed88ffd69987e9139845295bfc26126e', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('173', 'İçerikler', 'İçerikler', '1e06ea8c02013373e0531984e91cfe7f', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('174', 'Türler', 'Türler', 'a275561898585949df47eacab3028582', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('175', 'Alanlar', 'Alanlar', '24c2be4cd75b7603be3d0f2d48fbfc45', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('176', 'Kullanıcı Yönetimi', 'Kullanıcı Yönetimi', '63e936b71add8a10303d038ee0177953', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('177', 'Kullanıcılar', 'Kullanıcılar', '44ca30def362373fa40173958523f8a3', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('178', 'Dil Ayarları', 'Dil Ayarları', 'e49e4949965362cfc103fbf9696bb27c', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('179', 'Diller', 'tr,en,de,ar', 'e3efbb3fe9188673859d5722719030b5', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('180', 'Çıkış Yap', 'Çıkış Yap', '5cfecff1a3d8fd9cd2ad628d8187e473', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('181', 'Siteye Dön', 'Siteye Dön', '8ab8f7627a78313893f6605cbb3ea273', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('182', 'İşlem yapılıyor...', 'İşlem yapılıyor...', '21aacf5ed2dc54f3a5d982e503ebd3e1', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('183', 'Hayır', 'Hayır', '9f336ee8ff7f2f635c68d08fd78a1cce', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('184', 'Evet', 'Evet', 'f94f854949fc94f06c85986f1e814b34', 'tr', '2019-12-04 07:45:27', '2019-12-04 07:45:27');
INSERT INTO `translate` VALUES ('185', 'Web Site Title', 'Trunçgil Pelinom', '007d4c4ad27b74d1642ba79a485010d7', 'tr', '2019-12-04 07:45:33', '2019-12-04 07:45:33');
INSERT INTO `translate` VALUES ('186', 'Title', 'Title', 'b78a3223503896721cca1303f776159b', 'tr', '2019-12-04 07:45:33', '2019-12-04 07:45:33');
INSERT INTO `translate` VALUES ('187', 'en', 'İngilizce', '9cfefed8fb9497baa5cd519d7d2bb5d7', 'tr', '2019-12-04 07:45:57', '2019-12-04 07:45:57');
INSERT INTO `translate` VALUES ('188', 'de', 'Almanca', '5f02f0889301fd7be1ac972c11bf3e7d', 'tr', '2019-12-04 07:45:57', '2019-12-04 07:45:57');
INSERT INTO `translate` VALUES ('189', 'ar', 'Arapça', 'c582dec943ff7b743aa0691df291cea6', 'tr', '2019-12-04 07:45:57', '2019-12-04 07:45:57');
INSERT INTO `translate` VALUES ('190', 'Bu sayfada ana içerikler yer almakta', 'Bu sayfada ana içerikler yer almakta', '3a68ea772fd4b455292d0e5b9a971744', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('191', 'Ekle', 'Ekle', 'b9fc42962abe4ab0906b14ef3f18f715', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('192', 'Resim', 'Resim', 'fd92621c8c2476a8e6425609ae201301', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('193', 'Başlık', 'Başlık', '0266cf5c382987a6981ec1d832912e81', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('194', 'URL', 'URL', 'e6b391a8d2c4d45902a23a8b6585703d', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('195', 'Kategorisi', 'Kategorisi', '547a8304c403998f637461903cb48abf', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('196', 'Tip', 'Tip', '12ae2a12586001e30745cb0457586ae3', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('197', 'Durum', 'Durum', '074f4bc80f8c351c3037899b5ab1021e', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('198', 'İşlemler', 'İşlemler', '90fc8fe1919549ecb2211daf62a267d2', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('199', 'Resim Yükle', 'Resim Yükle', 'b3f05fc59312b4729415580430e8888b', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('200', 'Yayında Değil', 'Yayında Değil', '148a1c3ebba470089a6f3acb17682204', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('201', 'Yayında', 'Yayında', '0bfa83be06771602df5d05d28d993d3a', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('202', 'içeriğini silmek istediğinizden emin misiniz?', 'içeriğini silmek istediğinizden emin misiniz?', '36e7513bea4ba8e6bbf2d3c041172b53', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('203', 'Silinecek!', 'Silinecek!', 'dd00c651b382380f33f6f790d59c84b7', 'tr', '2019-12-04 07:46:30', '2019-12-04 07:46:30');
INSERT INTO `translate` VALUES ('204', 'İçeriğini Düzenle', 'İçeriğini Düzenle', '1cb9a0d597785d4e41e982c4cb44b966', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('205', 'İçerik Tipi', 'İçerik Tipi', '7541627bc1a852b48247dc03b03a4670', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('206', 'Kapak Resmi Yükle', 'Kapak Resmi Yükle', '3960ab3a0f96f9c328ffbd4a2e3dac10', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('207', 'İçeriğini Web\'de Gör', 'İçeriğini Web\'de Gör', '972b54c443ea4013938918b494c23bca', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('208', 'Değişiklikleri Kaydet', 'Değişiklikleri Kaydet', '398ca8b6afae34d1f9e4100b7be42786', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('209', 'İçeriğin dosyalarını buraya bırakarak veya tıklayarak yükleyebilirsiniz', 'İçeriğin dosyalarını buraya bırakarak veya tıklayarak yükleyebilirsiniz', 'f8ebb31f2aee98eca71c26deb136da1b', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('210', 'Çeviriler', 'Çeviriler', '2c13c99399a091b885c3f22e9fff50c6', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('211', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '2e8b4e71cb1ebb40ed5336f676630ade', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('212', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '2e8b4e71cb1ebb40ed5336f676630ade', 'en', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('213', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '2e8b4e71cb1ebb40ed5336f676630ade', 'de', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('214', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '<p>Burası Pelinom ile yazılan &ouml;rnek bir sayfadır.&nbsp;</p>', '2e8b4e71cb1ebb40ed5336f676630ade', 'ar', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('215', 'Çoklu İçerik Ekle', 'Çoklu İçerik Ekle', '7bfae25b14a1efe57b98e7ad4ba37219', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('216', 'Bu kutuya birden fazla başlık yazarak bu alana çoklu olarak içerik ekleyebilirsiniz:', 'Bu kutuya birden fazla başlık yazarak bu alana çoklu olarak içerik ekleyebilirsiniz:', 'd628472f261dd9e59f4c0d84966b4a21', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('217', 'Tip Seçiniz', 'Tip Seçiniz', '50e9674bec0743a97fb602c4f1583697', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('218', 'Alanı İçerikleri', 'Alanı İçerikleri', 'a2a4179be9f5407d763cbf239e17e2c5', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('219', 'Sıra', 'Sıra', '421c5f83ffa080ee302c67bec972d829', 'tr', '2019-12-04 07:46:32', '2019-12-04 07:46:32');
INSERT INTO `translate` VALUES ('220', 'Mevcut Tipler', 'Mevcut Tipler', '7e48cb9366b54e7b238e3adcf3a34cd0', 'tr', '2019-12-04 07:48:20', '2019-12-04 07:48:20');
INSERT INTO `translate` VALUES ('221', 'İkon', 'İkon', '6e73fc8da0343f7ce441ed36845f7a39', 'tr', '2019-12-04 07:48:20', '2019-12-04 07:48:20');
INSERT INTO `translate` VALUES ('222', 'Virgüllerle ayırın', 'Virgüllerle ayırın', 'd4a10044817bd0951a2deecfdca8edaf', 'tr', '2019-12-04 07:48:20', '2019-12-04 07:48:20');
INSERT INTO `translate` VALUES ('223', 'Bir türe ait girilen tüm alanların yönetildiği bölüm', 'Bir türe ait girilen tüm alanların yönetildiği bölüm', 'c33c4bbffaa456714d4a384258a9a633', 'tr', '2019-12-04 07:48:22', '2019-12-04 07:48:22');
INSERT INTO `translate` VALUES ('224', 'Form Tipi', 'Form Tipi', '1a7e9afdbf51f94a0a88730607602e93', 'tr', '2019-12-04 07:48:22', '2019-12-04 07:48:22');
INSERT INTO `translate` VALUES ('225', 'Ön Tanımlı Değerler', 'Ön Tanımlı Değerler', '31a5c6da2645f1b55624f7e8b324cab6', 'tr', '2019-12-04 07:48:22', '2019-12-04 07:48:22');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'Sayfa', null, '2019-12-04 06:59:45', '2019-12-04 06:59:45', 'sayfa', 'file');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pic` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recover` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Pelinom', 'Admin', null, null, 0x7B225F746F6B656E223A2262596C67466D65414261774D4B593742324E63454C387445706D4E43777555624A5843473734676F222C226E616D65223A2250656C696E6F6D222C227375726E616D65223A2241646D696E222C22656D61696C223A2261646D696E4070656C696E6F6D2E636F6D222C2270686F6E65223A22303030303030303030222C2270617373776F7264223A6E756C6C7D, '000000000', 'admin@pelinom.com', null, '$2y$10$k6UkA8b154y4PCTsfIq0Jebtb/5NmnjqULnLu9A.u4Qr3sFDNR0vm', null, '2019-12-04 06:54:18', '2019-12-04 06:57:02', null, 'users,languages,contents,new,fields,search', null);

-- ----------------------------
-- Table structure for values
-- ----------------------------
DROP TABLE IF EXISTS `values`;
CREATE TABLE `values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `row` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of values
-- ----------------------------
