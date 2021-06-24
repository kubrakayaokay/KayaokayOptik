-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 17 May 2021, 19:09:17
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kayaokay_optik`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `isactive` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`id`, `name`, `url`, `image`, `createdAt`, `updatedAt`, `isactive`) VALUES
(10, 'Hugo BOSS', 'hugo-boss', 'boss_250x65-6071.png', '2021-05-12 15:46:13', NULL, 1),
(11, 'Armani Exchange', 'armani-exchange', 'armani_2020-5617.png', '2021-05-12 15:46:32', NULL, 1),
(12, 'Burberry', 'burberry', 'burberry_2020-4561.png', '2021-05-12 15:46:50', NULL, 1),
(13, 'Tommy Hilfiger', 'tommy-hilfiger', 'tommy1-0641.png', '2021-05-15 11:55:38', NULL, 1),
(14, 'Prada', 'prada', 'prada_2020-6592.png', '2021-05-15 11:55:50', NULL, 1),
(15, 'DOLCE  & GABBANA', 'dolce-gabbana', 'dolce_2020-2965.png', '2021-05-15 11:56:19', NULL, 1),
(16, 'GUCCI', 'gucci', 'gucci_2020-6712.png', '2021-05-15 11:56:43', NULL, 1),
(17, 'LEVI\'S', 'levi-s', 'markalar_levis_250x65-1783.png', '2021-05-15 11:57:09', NULL, 1),
(18, 'MUSTANG', 'mustang', 'mustang1-7536.png', '2021-05-15 11:58:27', NULL, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `category_id` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `old_price` varchar(6) COLLATE utf8_turkish_ci NOT NULL,
  `new_price` varchar(6) COLLATE utf8_turkish_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `sex` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `degrade` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  `polarize` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  `frame_color` varchar(7) COLLATE utf8_turkish_ci NOT NULL,
  `glass_material` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `frame_material` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `keywords` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(5) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `content`, `category_id`, `name`, `old_price`, `new_price`, `brand_id`, `sex`, `degrade`, `polarize`, `frame_color`, `glass_material`, `frame_material`, `url`, `title`, `description`, `keywords`, `isActive`, `createdAt`) VALUES
(7, '<p>Armani Exchange 4089S 81588G 53*21*140 modeli, %100 UV korumalı ve 2 yıl garantili g&uuml;neş g&ouml;zl&uuml;ğ&uuml; orijinal kutusu , silme bezi ve garanti belgesi ile birlikte g&ouml;nderilmektedir. Fotoğraftaki g&uuml;neş g&ouml;zl&uuml;ğ&uuml; kutusu g&ouml;sterim ama&ccedil;lı olup; markanın orijinal alternatiflerinden g&ouml;nderim ger&ccedil;ekleştirilebilmektedir. Ek olarak yedek temizleme spreyi ve silme bezi &uuml;cretsiz olarak siparişinize eklenmektedir. Armani Exchange 4089S 81588G 53*21*140 g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; sadece 585,00 TL &uuml;cret ve peşin fiyatına 9 taksit se&ccedil;eneği ile satın alabilirsiniz.</p>\r\n\r\n<p>Online alışveriş sitemizden alacağınız Armani Exchange 4089S 81588G 53*21*140 g&uuml;neş g&ouml;zl&uuml;ğ&uuml; i&ccedil;in plaket, sap, vida ayarı ve vida değişimi t&uuml;m Atasun Optik noktalarında &ouml;m&uuml;r boyu &uuml;cretsiz olarak yapılmaktadır. Ultrasonik Bakım Temizleyicileri ile g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; ilk g&uuml;nk&uuml; kadar temiz olsun; t&uuml;m Atasun Optik noktalarında bulunan ultrasonik temizlik hizmeti ile dilediğiniz zaman g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z&uuml; &uuml;cretsiz olarak temizliyoruz.</p>\r\n\r\n<p>Her zaman yanınızdayız; g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z ile ilgili garanti kapsamındaki t&uuml;m par&ccedil;a değişim ve tamir işlemleri Atasun Optik noktalarından veya ve online olarak tamamen &uuml;cretsiz yapılmaktadır. Garanti kapsamı dışındaki par&ccedil;a değişim ve bakım işlemleriniz ise par&ccedil;a &uuml;creti karşılığında &ouml;m&uuml;r boyu yapılmaktadır.</p>', '3', 'Armani Exchange 4089S 81588G', '780.00', '585.00', 11, 'female', 'true', 'false', '#ffc0cb', 'Organik', 'Plastik', 'armani-exchange-4089s-81588g', 'Armani Exchange 4089S 81588G', 'Armani Exchange 4089S 81588G', 'Armani Exchange 4089S 81588G', 1, '2021-05-16 01:09:56'),
(8, '<p>&Uuml;R&Uuml;N A&Ccedil;IKLAMASI</p>\r\n\r\n<p>Gucci GG0024S HAVANA 58*16*140 modeli, %100 UV korumalı ve 2 yıl garantili g&uuml;neş g&ouml;zl&uuml;ğ&uuml; orijinal kutusu , silme bezi ve garanti belgesi ile birlikte g&ouml;nderilmektedir. Fotoğraftaki g&uuml;neş g&ouml;zl&uuml;ğ&uuml; kutusu g&ouml;sterim ama&ccedil;lı olup; markanın orijinal alternatiflerinden g&ouml;nderim ger&ccedil;ekleştirilebilmektedir. Ek olarak yedek temizleme spreyi ve silme bezi &uuml;cretsiz olarak siparişinize eklenmektedir. Gucci GG0024S HAVANA 58*16*140 g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; sadece 1.725,00 TL &uuml;cret ve peşin fiyatına 9 taksit se&ccedil;eneği ile satın alabilirsiniz.</p>\r\n\r\n<p>Online alışveriş sitemizden alacağınız Gucci GG0024S HAVANA 58*16*140 g&uuml;neş g&ouml;zl&uuml;ğ&uuml; i&ccedil;in plaket, sap, vida ayarı ve vida değişimi t&uuml;m Atasun Optik noktalarında &ouml;m&uuml;r boyu &uuml;cretsiz olarak yapılmaktadır. Ultrasonik Bakım Temizleyicileri ile g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; ilk g&uuml;nk&uuml; kadar temiz olsun; t&uuml;m Atasun Optik noktalarında bulunan ultrasonik temizlik hizmeti ile dilediğiniz zaman g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z&uuml; &uuml;cretsiz olarak temizliyoruz.</p>\r\n\r\n<p>Her zaman yanınızdayız; g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z ile ilgili garanti kapsamındaki t&uuml;m par&ccedil;a değişim ve tamir işlemleri Atasun Optik noktalarından veya ve online olarak tamamen &uuml;cretsiz yapılmaktadır. Garanti kapsamı dışındaki par&ccedil;a değişim ve bakım işlemleriniz ise par&ccedil;a &uuml;creti karşılığında &ouml;m&uuml;r boyu yapılmaktadır.</p>', '3', 'Gucci GG0024S HAVANA', '2300.0', '1725.0', 16, 'female', 'false', 'false', '#B64D20', 'Organik', 'Asetat', 'gucci-gg0024s-havana', 'Gucci GG0024S HAVANA', 'Gucci GG0024S HAVANA', 'Gucci GG0024S HAVANA', 1, '2021-05-16 01:16:48'),
(9, '<p>Tommy Hilfiger 1663/S 807 50*19*140 modeli, %100 UV korumalı ve 2 yıl garantili g&uuml;neş g&ouml;zl&uuml;ğ&uuml; orijinal kutusu , silme bezi ve garanti belgesi ile birlikte g&ouml;nderilmektedir. Fotoğraftaki g&uuml;neş g&ouml;zl&uuml;ğ&uuml; kutusu g&ouml;sterim ama&ccedil;lı olup; markanın orijinal alternatiflerinden g&ouml;nderim ger&ccedil;ekleştirilebilmektedir. Ek olarak yedek temizleme spreyi ve silme bezi &uuml;cretsiz olarak siparişinize eklenmektedir. Tommy Hilfiger 1663/S 807 50*19*140 g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; sadece 550,00 TL &uuml;cret ve peşin fiyatına 9 taksit se&ccedil;eneği ile satın alabilirsiniz.</p>\r\n\r\n<p>Online alışveriş sitemizden alacağınız Tommy Hilfiger 1663/S 807 50*19*140 g&uuml;neş g&ouml;zl&uuml;ğ&uuml; i&ccedil;in plaket, sap, vida ayarı ve vida değişimi t&uuml;m Atasun Optik noktalarında &ouml;m&uuml;r boyu &uuml;cretsiz olarak yapılmaktadır. Ultrasonik Bakım Temizleyicileri ile g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; ilk g&uuml;nk&uuml; kadar temiz olsun; t&uuml;m Atasun Optik noktalarında bulunan ultrasonik temizlik hizmeti ile dilediğiniz zaman g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z&uuml; &uuml;cretsiz olarak temizliyoruz.</p>\r\n\r\n<p>Her zaman yanınızdayız; g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z ile ilgili garanti kapsamındaki t&uuml;m par&ccedil;a değişim ve tamir işlemleri Atasun Optik noktalarından veya ve online olarak tamamen &uuml;cretsiz yapılmaktadır. Garanti kapsamı dışındaki par&ccedil;a değişim ve bakım işlemleriniz ise par&ccedil;a &uuml;creti karşılığında &ouml;m&uuml;r boyu yapılmaktadır.</p>', '2', 'Tommy Hilfiger 1663S 807', '1100.0', '550.00', 13, 'unisex', 'false', 'false', '#0D0D0B', 'Organik', 'Asetat', 'tommy-hilfiger-1663-s-807', 'Tommy Hilfiger 1663/S 807', 'Tommy Hilfiger 1663/S 807', 'Tommy Hilfiger 1663/S 807', 1, '2021-05-16 01:19:56'),
(10, '<p>Gucci GG0008S BLACK 53*20*145 modeli, %100 UV korumalı ve 2 yıl garantili g&uuml;neş g&ouml;zl&uuml;ğ&uuml; orijinal kutusu , silme bezi ve garanti belgesi ile birlikte g&ouml;nderilmektedir. Fotoğraftaki g&uuml;neş g&ouml;zl&uuml;ğ&uuml; kutusu g&ouml;sterim ama&ccedil;lı olup; markanın orijinal alternatiflerinden g&ouml;nderim ger&ccedil;ekleştirilebilmektedir. Ek olarak yedek temizleme spreyi ve silme bezi &uuml;cretsiz olarak siparişinize eklenmektedir. Gucci GG0008S BLACK 53*20*145 g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; sadece 2.100,00 TL &uuml;cret ve peşin fiyatına 9 taksit se&ccedil;eneği ile satın alabilirsiniz.</p>\r\n\r\n<p>Online alışveriş sitemizden alacağınız Gucci GG0008S BLACK 53*20*145 g&uuml;neş g&ouml;zl&uuml;ğ&uuml; i&ccedil;in plaket, sap, vida ayarı ve vida değişimi t&uuml;m Atasun Optik noktalarında &ouml;m&uuml;r boyu &uuml;cretsiz olarak yapılmaktadır. Ultrasonik Bakım Temizleyicileri ile g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml; ilk g&uuml;nk&uuml; kadar temiz olsun; t&uuml;m Atasun Optik noktalarında bulunan ultrasonik temizlik hizmeti ile dilediğiniz zaman g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z&uuml; &uuml;cretsiz olarak temizliyoruz.</p>\r\n\r\n<p>Her zaman yanınızdayız; g&uuml;neş g&ouml;zl&uuml;ğ&uuml;n&uuml;z ile ilgili garanti kapsamındaki t&uuml;m par&ccedil;a değişim ve tamir işlemleri Atasun Optik noktalarından veya ve online olarak tamamen &uuml;cretsiz yapılmaktadır. Garanti kapsamı dışındaki par&ccedil;a değişim ve bakım işlemleriniz ise par&ccedil;a &uuml;creti karşılığında &ouml;m&uuml;r boyu yapılmaktadır.</p>', '7', 'Gucci GG0008S BLACK', '2800.0', '2.100,', 16, 'male', 'false', 'false', '#ff2400', 'Organik', 'Asetat', 'gucci-gg0008s-black', 'Gucci GG0008S BLACK', 'Gucci GG0008S BLACK', 'Gucci GG0008S BLACK', 1, '2021-05-16 20:24:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `parent_category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `keywords` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `url`, `image`, `parent_category_id`, `title`, `description`, `keywords`, `createdAt`) VALUES
(1, 'Kadın', 'kadin', 'rayban-gunes-gozlukleri-4-5931.jpg', 0, 'Kadın', 'Kadın', 'Kadın', '2021-05-11 21:39:54'),
(2, 'Kadın-Yuvarlak', 'yuvarlak', '', 1, 'Yuvarlak', 'Yuvarlak', 'Yuvarlak', '2021-05-11 21:40:20'),
(3, 'Kadın-Köşeli', 'kadin-koseli', '', 1, 'Kadın-Köşeli', 'Kadın-Köşeli', 'Kadın-Köşeli', '2021-05-11 21:40:40'),
(4, 'Kadın-Damla', 'kadin-damla', '', 1, 'Kadın-Damla', 'Kadın-Damla', 'Kadın-Damla', '2021-05-11 21:40:59'),
(6, 'Erkek', 'erkek', 'hp-teaser-sg-m-desktop-1437.jpg', 0, 'Erkek', 'Erkek', 'Erkek', '2021-05-11 22:02:20'),
(7, 'Erkek-Köşeli', 'erkek-koseli', '', 6, 'Erkek-Köşeli', 'Erkek-Köşeli', 'Erkek-Köşeli', '2021-05-11 22:02:37'),
(8, 'Çocuk', 'cocuk', 'lacoste-cocuk-gunes-gozugu-7981.jpg', 0, 'Çocuk', 'Çocuk', 'Çocuk', '2021-05-11 22:23:00'),
(9, 'Çocuk-Kemik', 'cocuk-kemik', '', 8, 'Çocuk-Kemik', 'Çocuk-Kemik', 'Çocuk-Kemik', '2021-05-13 01:11:59'),
(10, 'Çocuk-Damla', 'cocuk-damla', '', 8, 'Çocuk-Damla', 'Çocuk-Damla', 'Çocuk-Damla', '2021-05-16 20:37:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_image_gallery`
--

CREATE TABLE `product_image_gallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `isCover` tinyint(5) NOT NULL,
  `rank` int(11) NOT NULL,
  `isActive` tinyint(5) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_image_gallery`
--

INSERT INTO `product_image_gallery` (`id`, `product_id`, `image`, `isCover`, `rank`, `isActive`, `createdAt`) VALUES
(393, 7, 'gu034606-4089s-81588g-5321140-637196325868803882-40597.jpg', 0, 0, 1, '2021-05-16 01:12:28'),
(394, 7, 'gu034606-4089s-81588g-5321140-637196325976147905-83146.png', 1, 0, 1, '2021-05-16 01:12:28'),
(395, 8, 'gu032907-gg0024s-havana-58-636434012075691670-12084.jpg', 0, 0, 1, '2021-05-16 01:17:03'),
(396, 8, 'gu032907-gg0024s-havana-58-636434011999406674-52714.png', 1, 0, 1, '2021-05-16 01:17:03'),
(397, 9, 'gu034121-1663s-807-5019140-636874907021795085-90321.png', 1, 0, 1, '2021-05-16 01:20:13'),
(398, 9, 'gu034121-1663s-807-5019140-636874907018043871-34270.jpg', 0, 0, 1, '2021-05-16 01:20:13'),
(399, 10, 'gu032903-gg0008s-black-53-636434011985525756-54739.jpg', 0, 0, 1, '2021-05-16 20:24:39'),
(400, 10, 'gu032903-gg0008s-black-53-636434007662223832-23451.png', 1, 0, 1, '2021-05-16 20:24:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `contact` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `about_us` varchar(550) COLLATE utf8_turkish_ci NOT NULL,
  `mission` varchar(550) COLLATE utf8_turkish_ci NOT NULL,
  `vision` varchar(550) COLLATE utf8_turkish_ci NOT NULL,
  `site_url` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `social_media` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `smtp_mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_services` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `footer_logo` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `favicon` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `keywords`, `contact`, `about_us`, `mission`, `vision`, `site_url`, `social_media`, `smtp_mail`, `site_services`, `logo`, `footer_logo`, `favicon`) VALUES
(1, 'KayaOkay Optik', 'KayaOkay Optik', 'KayaOkay Optik', '{\"phone\":\"0533 333 33 33 \",\"gsm\":\"0533 333 33 33 \",\"email\":\"kayaokayoptik@gmail.com\",\"address\":\"\\u0130stanbul \"}', 'Firma hakkında kısa bilgilendirme yazısı, firma hakkında kısa bilgilendirme yazısı, firma hakkında kısa bilgilendirme yazısı, firma hakkında kısa bilgilendirme yazısı.', 'Misyon yazısı gelecek, misyon yazısı gelecek, misyon yazısı gelecek.', 'Vizyon yazısı gelecek, vizyon yazısı gelecek, vizyon yazısı gelecek.', 'https://dizaynperde.loc', '{\"facebook\":\"https:\\/\\/www.facebook.com\",\"twitter\":\"https:\\/\\/twitter.com\",\"instagram\":\"http:\\/\\/instagram.com\"}', '{\"host\":\"ssl:\\/\\/smtp.googlemail.com\",\"port\":\"465\",\"email\":\"kayaokayoptik@gmail.com\",\"password\":\"1357910Kk\"}', '{\"google_analytics\":\"\",\"yandex_metrica\":\"\",\"extra_services\":\"\"}', 'logo.png', 'logo-uzs-3.png', 'favicon-uzs.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `content` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `isActive` tinyint(5) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `name`, `image`, `content`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'Kayaokay Optik', '4671857-4086.jpg', '{\"one\":\"  A\\u00e7\\u0131klama k\\u00fcbra test\",\"two\":\"  A\\u00e7\\u0131klama 2\",\"three\":\"  \"}', 0, 1, '2021-05-11 21:26:25'),
(2, 'Kayaokay Optik', 'gozluk-5706.jpg', '{\"one\":\"\",\"two\":\"\",\"three\":\"\"}', 0, 1, '2021-05-11 21:33:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(5) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `isActive`, `createdAt`) VALUES
(1, 'UZS Elektrik', 'info@batuhan.com', '25f9e794323b453885f5181f1b624d0b', 1, '2019-10-30 17:41:09');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_image_gallery`
--
ALTER TABLE `product_image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `product_image_gallery`
--
ALTER TABLE `product_image_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
