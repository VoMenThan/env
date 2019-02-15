-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 04:25 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `envzone_db`
--
CREATE DATABASE IF NOT EXISTS `envzone_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `envzone_db`;

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2019-01-24 05:02:26', '2019-01-24 05:02:26', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href="https://gravatar.com">Gravatar</a>.', 0, '1', '', '', 0, 0),
(2, 1, 'admin', 'than.vo@envzone.com', '', '::1', '2019-01-24 05:05:02', '2019-01-24 05:05:02', 'dsfasfsaf', 0, '1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', '', 0, 1),
(3, 1, 'admin', 'than.vo@envzone.com', '', '::1', '2019-01-24 05:05:16', '2019-01-24 05:05:16', 'sdfasfsafa', 0, '1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', '', 0, 1),
(4, 1, 'admin', 'than.vo@envzone.com', '', '::1', '2019-01-24 05:08:10', '2019-01-24 05:08:10', 'than asdkfsdkfjhakdshfksa', 0, '1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_draft_submissions`
--

CREATE TABLE IF NOT EXISTS `wp_gf_draft_submissions` (
  `uuid` char(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `form_id` mediumint(8) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `ip` varchar(39) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `source_url` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `submission` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`uuid`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_entry`
--

CREATE TABLE IF NOT EXISTS `wp_gf_entry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) unsigned NOT NULL,
  `post_id` bigint(20) unsigned DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_starred` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(39) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `source_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_agent` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `currency` varchar(5) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_status` varchar(15) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` decimal(19,2) DEFAULT NULL,
  `payment_method` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `transaction_id` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `is_fulfilled` tinyint(1) DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `transaction_type` tinyint(1) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`),
  KEY `form_id_status` (`form_id`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_gf_entry`
--

INSERT INTO `wp_gf_entry` (`id`, `form_id`, `post_id`, `date_created`, `date_updated`, `is_starred`, `is_read`, `ip`, `source_url`, `user_agent`, `currency`, `payment_status`, `payment_date`, `payment_amount`, `payment_method`, `transaction_id`, `is_fulfilled`, `created_by`, `transaction_type`, `status`) VALUES
(1, 1, NULL, '2019-01-27 23:31:37', '2019-01-27 23:31:37', 0, 0, '::1', 'http://localhost/env/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'USD', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'trash'),
(2, 1, NULL, '2019-01-27 23:31:50', '2019-01-27 23:31:50', 0, 0, '::1', 'http://localhost/env/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 'USD', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'trash');

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_entry_meta`
--

CREATE TABLE IF NOT EXISTS `wp_gf_entry_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `entry_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  `item_index` varchar(60) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_key` (`meta_key`(191)),
  KEY `entry_id` (`entry_id`),
  KEY `meta_value` (`meta_value`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wp_gf_entry_meta`
--

INSERT INTO `wp_gf_entry_meta` (`id`, `form_id`, `entry_id`, `meta_key`, `meta_value`, `item_index`) VALUES
(1, 1, 1, '1', 'than.vo@envzone.com', ''),
(2, 1, 1, '2', 'demo demo', ''),
(3, 1, 2, '1', 'than.vo@envzone.com', ''),
(4, 1, 2, '2', 'demo demo', '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_entry_notes`
--

CREATE TABLE IF NOT EXISTS `wp_gf_entry_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) unsigned NOT NULL,
  `user_name` varchar(250) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  `note_type` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `sub_type` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_id` (`entry_id`),
  KEY `entry_user_key` (`entry_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_form`
--

CREATE TABLE IF NOT EXISTS `wp_gf_form` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_gf_form`
--

INSERT INTO `wp_gf_form` (`id`, `title`, `date_created`, `date_updated`, `is_active`, `is_trash`) VALUES
(1, 'Form Menu', '2019-01-27 23:08:09', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_form_meta`
--

CREATE TABLE IF NOT EXISTS `wp_gf_form_meta` (
  `form_id` mediumint(8) unsigned NOT NULL,
  `display_meta` longtext COLLATE utf8mb4_unicode_520_ci,
  `entries_grid_meta` longtext COLLATE utf8mb4_unicode_520_ci,
  `confirmations` longtext COLLATE utf8mb4_unicode_520_ci,
  `notifications` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_gf_form_meta`
--

INSERT INTO `wp_gf_form_meta` (`form_id`, `display_meta`, `entries_grid_meta`, `confirmations`, `notifications`) VALUES
(1, '{"title":"Form Menu","description":"","labelPlacement":"top_label","descriptionPlacement":"below","button":{"type":"text","text":"Submit","imageUrl":""},"fields":[{"type":"text","id":1,"label":"","adminLabel":"","isRequired":true,"size":"medium","errorMessage":"","visibility":"visible","inputs":null,"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","maxLength":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"Enter your email","cssClass":"","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","enablePasswordInput":"","multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"useRichTextEditor":false,"pageNumber":1,"fields":""},{"type":"textarea","id":2,"label":"","adminLabel":"","isRequired":true,"size":"medium","errorMessage":"","visibility":"visible","inputs":null,"formId":1,"description":"","allowsPrepopulate":false,"inputMask":false,"inputMaskValue":"","maxLength":"","inputType":"","labelPlacement":"","descriptionPlacement":"","subLabelPlacement":"","placeholder":"Your message","cssClass":"","inputName":"","noDuplicates":false,"defaultValue":"","choices":"","conditionalLogic":"","productField":"","form_id":"","useRichTextEditor":false,"multipleFiles":false,"maxFiles":"","calculationFormula":"","calculationRounding":"","enableCalculation":"","disableQuantity":false,"displayAllCategories":false,"pageNumber":1,"fields":""}],"version":"2.4.4","id":1,"useCurrentUserAsAuthor":true,"postContentTemplateEnabled":false,"postTitleTemplateEnabled":false,"postTitleTemplate":"","postContentTemplate":"","lastPageButton":null,"pagination":null,"firstPageCssClass":null,"nextFieldId":3}', NULL, '{"5c4e39d99c74c":{"id":"5c4e39d99c74c","name":"Default Confirmation","isDefault":true,"type":"message","message":"Thanks for contacting us! We will get in touch with you shortly.","url":"","pageId":"","queryString":""}}', '{"5c4e39d990b31":{"id":"5c4e39d990b31","to":"{admin_email}","name":"Admin Notification","event":"form_submission","toType":"email","subject":"New submission from {form_title}","message":"{all_fields}"}}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_form_revisions`
--

CREATE TABLE IF NOT EXISTS `wp_gf_form_revisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) unsigned NOT NULL,
  `display_meta` longtext COLLATE utf8mb4_unicode_520_ci,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date_created` (`date_created`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_gf_form_view`
--

CREATE TABLE IF NOT EXISTS `wp_gf_form_view` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `ip` char(15) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `count` mediumint(8) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `date_created` (`date_created`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_gf_form_view`
--

INSERT INTO `wp_gf_form_view` (`id`, `form_id`, `date_created`, `ip`, `count`) VALUES
(1, 1, '2019-01-28 02:27:59', '', 11),
(2, 1, '2019-02-01 10:25:30', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=412 ;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/env', 'yes'),
(2, 'home', 'http://localhost/env', 'yes'),
(3, 'blogname', 'EnvZone', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'than.vo@envzone.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:87:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:39:"index.php?&page_id=22&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"([^/]+)/embed/?$";s:37:"index.php?name=$matches[1]&embed=true";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:24:"([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:22:"[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:2:{i:0;s:19:"akismet/akismet.php";i:1;s:29:"gravityforms/gravityforms.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', 'a:2:{i:0;s:80:"/Applications/XAMPP/xamppfiles/htdocs/env/wp-content/plugins/akismet/akismet.php";i:1;s:0:"";}', 'no'),
(40, 'template', 'envzone', 'yes'),
(41, 'stylesheet', 'envzone', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '43764', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(79, 'widget_text', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '22', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '0', 'yes'),
(93, 'initial_db_version', '43764', 'yes'),
(94, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(95, 'fresh_site', '0', 'yes'),
(96, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(100, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(101, 'sidebars_widgets', 'a:3:{s:19:"wp_inactive_widgets";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:17:"unique-sidebar-id";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(102, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(103, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(105, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(106, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(107, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(108, 'nonce_key', ',Rsco)iZvmMDVQiV}q!vlB;[;Q=s4|g_CbRERMgeu0qEP`9{;I!_@{:%4&{s|Em4', 'no'),
(109, 'nonce_salt', 'fT|Y!gdfZ5XePX(TLa^Fp|64TtC&g}tH{vW&26.-i_j|42~OFC:E3Oh?NElZ&5w%', 'no'),
(110, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(113, 'cron', 'a:6:{i:1550203347;a:1:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}}i:1550206947;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1550206959;a:2:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1550217041;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1550272001;a:1:{s:17:"gravityforms_cron";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(114, 'theme_mods_twentynineteen', 'a:3:{s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1548325121;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}s:18:"nav_menu_locations";a:0:{}}', 'yes'),
(116, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-5.0.3.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-5.0.3.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-5.0.3-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-5.0.3-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"5.0.3";s:7:"version";s:5:"5.0.3";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"5.0";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1550201036;s:15:"version_checked";s:5:"5.0.3";s:12:"translations";a:0:{}}', 'no'),
(121, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1550201049;s:7:"checked";a:4:{s:7:"envzone";s:0:"";s:14:"twentynineteen";s:3:"1.2";s:15:"twentyseventeen";s:3:"2.0";s:13:"twentysixteen";s:3:"1.8";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'no'),
(122, 'auth_key', 'ZMr1$Y2FoApza*A],O5kxzG}).]&^t|41kiaU8tOUfrvf;!OMZ}EzC_2eq.p~zC=', 'no'),
(123, 'auth_salt', '}u&Jow]DE$>chl6>/P-vuD#mxqY$ocESfpNMX$SI=a}[OpXGMtaYKO#lfbJbxO%K', 'no'),
(124, 'logged_in_key', 'az~:iLQ{,Kl+ui3f54m#3BlDg3DZ)`%`+dqpNNL9~<SsDgJQ]!m+QiFv=!Dz.6Gg', 'no'),
(125, 'logged_in_salt', 'z]Rf!2`y45-l8=vKsGVj)X2-0RnK}UFpp0rjYD#[(DN1[Dy-=,WZ70:Wjq^PkI@?', 'no'),
(129, 'can_compress_scripts', '1', 'no'),
(144, 'recently_activated', 'a:0:{}', 'yes'),
(146, 'current_theme', '', 'yes'),
(147, 'theme_mods_envzone', 'a:4:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1548477668;s:4:"data";a:1:{s:19:"wp_inactive_widgets";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes'),
(148, 'theme_switched', '', 'yes'),
(174, 'widget_akismet_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(217, 'category_children', 'a:0:{}', 'yes'),
(243, 'theme_mods_twentyseventeen', 'a:4:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1548477687;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-1";a:0:{}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}}}}', 'yes'),
(321, 'widget_gform_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(330, 'gf_site_key', 'ac77398c-e088-42e3-88d9-ea9639428810', 'yes'),
(331, 'gf_site_secret', 'c3189042-5766-4b54-8030-b569d26a59a6', 'yes'),
(345, 'gf_db_version', '2.4.4', 'yes'),
(346, 'rg_form_version', '2.4.4', 'yes'),
(347, 'gform_enable_background_updates', '1', 'yes'),
(348, 'gform_pending_installation', '', 'yes'),
(349, 'gravityformsaddon_gravityformswebapi_version', '1.0', 'yes'),
(350, 'gform_version_info', 'a:10:{s:12:"is_valid_key";b:1;s:6:"reason";s:0:"";s:7:"version";s:5:"2.4.6";s:3:"url";s:164:"http://s3.amazonaws.com/gravityforms/releases/gravityforms_2.4.6.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=oE2x5auD9N98l4hveqXyWyQ1VPs%3D";s:15:"expiration_time";i:1580660107;s:9:"offerings";a:51:{s:12:"gravityforms";a:5:{s:12:"is_available";b:1;s:7:"version";s:5:"2.4.6";s:14:"version_latest";s:5:"2.4.6";s:3:"url";s:164:"http://s3.amazonaws.com/gravityforms/releases/gravityforms_2.4.6.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=oE2x5auD9N98l4hveqXyWyQ1VPs%3D";s:10:"url_latest";s:164:"http://s3.amazonaws.com/gravityforms/releases/gravityforms_2.4.6.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=oE2x5auD9N98l4hveqXyWyQ1VPs%3D";}s:21:"gravityforms2checkout";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.0";s:14:"version_latest";s:3:"1.0";}s:26:"gravityformsactivecampaign";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.6";s:14:"version_latest";s:3:"1.6";s:3:"url";s:189:"http://s3.amazonaws.com/gravityforms/addons/activecampaign/gravityformsactivecampaign_1.6.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=Me3yt4Zlo8y3xr1Yye9IcWf0TEg%3D";s:10:"url_latest";s:189:"http://s3.amazonaws.com/gravityforms/addons/activecampaign/gravityformsactivecampaign_1.6.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=Me3yt4Zlo8y3xr1Yye9IcWf0TEg%3D";}s:32:"gravityformsadvancedpostcreation";a:3:{s:12:"is_available";b:0;s:7:"version";s:10:"1.0-beta-1";s:14:"version_latest";s:12:"1.0-beta-1.3";}s:20:"gravityformsagilecrm";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.2";s:14:"version_latest";s:3:"1.2";}s:24:"gravityformsauthorizenet";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.6";s:14:"version_latest";s:3:"2.6";}s:18:"gravityformsaweber";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"2.8";s:14:"version_latest";s:3:"2.8";s:3:"url";s:173:"http://s3.amazonaws.com/gravityforms/addons/aweber/gravityformsaweber_2.8.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=Xo6Y1Q6aHUS2jdyVaQIEgH6NcL8%3D";s:10:"url_latest";s:173:"http://s3.amazonaws.com/gravityforms/addons/aweber/gravityformsaweber_2.8.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=Xo6Y1Q6aHUS2jdyVaQIEgH6NcL8%3D";}s:21:"gravityformsbatchbook";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.3";s:14:"version_latest";s:3:"1.3";}s:18:"gravityformsbreeze";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.3";s:14:"version_latest";s:3:"1.3";}s:27:"gravityformscampaignmonitor";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"3.7";s:14:"version_latest";s:3:"3.7";s:3:"url";s:191:"http://s3.amazonaws.com/gravityforms/addons/campaignmonitor/gravityformscampaignmonitor_3.7.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=EVBx0PzWk9gW1ScTDa44J22qyHo%3D";s:10:"url_latest";s:191:"http://s3.amazonaws.com/gravityforms/addons/campaignmonitor/gravityformscampaignmonitor_3.7.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=EVBx0PzWk9gW1ScTDa44J22qyHo%3D";}s:20:"gravityformscampfire";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.1";s:14:"version_latest";s:5:"1.2.1";}s:22:"gravityformscapsulecrm";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.3";s:14:"version_latest";s:3:"1.3";}s:26:"gravityformschainedselects";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.1";s:14:"version_latest";s:5:"1.1.3";}s:23:"gravityformscleverreach";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.4";s:14:"version_latest";s:3:"1.4";s:3:"url";s:187:"http://s3.amazonaws.com/gravityforms/addons/cleverreach/gravityformscleverreach_1.4.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=%2Fl2A51SThtxy%2FVjxuGAWwIJoSVQ%3D";s:10:"url_latest";s:187:"http://s3.amazonaws.com/gravityforms/addons/cleverreach/gravityformscleverreach_1.4.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=%2Fl2A51SThtxy%2FVjxuGAWwIJoSVQ%3D";}s:19:"gravityformscoupons";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.8";s:14:"version_latest";s:5:"2.8.3";}s:17:"gravityformsdebug";a:5:{s:12:"is_available";b:1;s:7:"version";s:0:"";s:14:"version_latest";s:10:"1.0.beta11";s:3:"url";s:0:"";s:10:"url_latest";s:178:"http://s3.amazonaws.com/gravityforms/addons/debug/gravityformsdebug_1.0.beta11.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=bwYvBHEknA1Ckb2mqxsJqP6vHhQ%3D";}s:19:"gravityformsdropbox";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.1";s:14:"version_latest";s:5:"2.1.1";}s:16:"gravityformsemma";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.2";s:14:"version_latest";s:5:"1.2.5";s:3:"url";s:169:"http://s3.amazonaws.com/gravityforms/addons/emma/gravityformsemma_1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=MQAUpbLWNhc8WI5QncYzNA8fVns%3D";s:10:"url_latest";s:175:"http://s3.amazonaws.com/gravityforms/addons/emma/gravityformsemma_1.2.5.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=se%2BO%2BvkmdNv2IdOx9m3ToJ4re0M%3D";}s:22:"gravityformsfreshbooks";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.5";s:14:"version_latest";s:5:"2.5.2";}s:23:"gravityformsgetresponse";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.2";s:14:"version_latest";s:3:"1.2";s:3:"url";s:185:"http://s3.amazonaws.com/gravityforms/addons/getresponse/gravityformsgetresponse_1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=OfQFGDA6B3jzpGwaXz4wW%2FvpDc0%3D";s:10:"url_latest";s:185:"http://s3.amazonaws.com/gravityforms/addons/getresponse/gravityformsgetresponse_1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=OfQFGDA6B3jzpGwaXz4wW%2FvpDc0%3D";}s:21:"gravityformsgutenberg";a:5:{s:12:"is_available";b:1;s:7:"version";s:10:"1.0-rc-1.2";s:14:"version_latest";s:10:"1.0-rc-1.2";s:3:"url";s:186:"http://s3.amazonaws.com/gravityforms/addons/gutenberg/gravityformsgutenberg_1.0-rc-1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=NGfn8a1rzF7mh43OrZmWlTkfd5k%3D";s:10:"url_latest";s:186:"http://s3.amazonaws.com/gravityforms/addons/gutenberg/gravityformsgutenberg_1.0-rc-1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=NGfn8a1rzF7mh43OrZmWlTkfd5k%3D";}s:21:"gravityformshelpscout";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.5";s:14:"version_latest";s:5:"1.5.1";}s:20:"gravityformshighrise";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.2";s:14:"version_latest";s:5:"1.2.3";}s:19:"gravityformshipchat";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.2";s:14:"version_latest";s:3:"1.2";}s:20:"gravityformsicontact";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.3";s:14:"version_latest";s:5:"1.3.1";s:3:"url";s:183:"http://s3.amazonaws.com/gravityforms/addons/icontact/gravityformsicontact_1.3.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=Z%2F98BtQMW5r1l0v7syMv%2F%2FQCt7Y%3D";s:10:"url_latest";s:183:"http://s3.amazonaws.com/gravityforms/addons/icontact/gravityformsicontact_1.3.1.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=n4l%2Fy6rBkO61rZlgxVG%2BnSmzdZc%3D";}s:19:"gravityformslogging";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.3";s:14:"version_latest";s:5:"1.3.1";s:3:"url";s:175:"http://s3.amazonaws.com/gravityforms/addons/logging/gravityformslogging_1.3.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=nhGAljWxEY3TUCBwLzelWwrVE4U%3D";s:10:"url_latest";s:179:"http://s3.amazonaws.com/gravityforms/addons/logging/gravityformslogging_1.3.1.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=9W9AVWVhV6X9pKLVLM%2BbY3wi0FU%3D";}s:19:"gravityformsmadmimi";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.2";s:14:"version_latest";s:3:"1.2";s:3:"url";s:179:"http://s3.amazonaws.com/gravityforms/addons/madmimi/gravityformsmadmimi_1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=06M%2FM8Kjl1P%2FpuhU85Ye9ToY9pE%3D";s:10:"url_latest";s:179:"http://s3.amazonaws.com/gravityforms/addons/madmimi/gravityformsmadmimi_1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=06M%2FM8Kjl1P%2FpuhU85Ye9ToY9pE%3D";}s:21:"gravityformsmailchimp";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"4.5";s:14:"version_latest";s:3:"4.5";s:3:"url";s:181:"http://s3.amazonaws.com/gravityforms/addons/mailchimp/gravityformsmailchimp_4.5.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=5e7ZXVlPS%2BhDAqnOFPEso5TPc1o%3D";s:10:"url_latest";s:181:"http://s3.amazonaws.com/gravityforms/addons/mailchimp/gravityformsmailchimp_4.5.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=5e7ZXVlPS%2BhDAqnOFPEso5TPc1o%3D";}s:19:"gravityformsmailgun";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.1";s:14:"version_latest";s:5:"1.1.1";s:3:"url";s:175:"http://s3.amazonaws.com/gravityforms/addons/mailgun/gravityformsmailgun_1.1.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=FOYtu2oFoB6rWpra6VGfd5BhbaY%3D";s:10:"url_latest";s:177:"http://s3.amazonaws.com/gravityforms/addons/mailgun/gravityformsmailgun_1.1.1.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=jac9AyKvG3OcmxQSdhcfdGNFPHA%3D";}s:26:"gravityformspartialentries";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.3";s:14:"version_latest";s:3:"1.3";}s:18:"gravityformspaypal";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"3.1";s:14:"version_latest";s:5:"3.1.1";}s:33:"gravityformspaypalexpresscheckout";a:3:{s:12:"is_available";b:0;s:7:"version";s:0:"";s:14:"version_latest";N;}s:29:"gravityformspaypalpaymentspro";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.3";s:14:"version_latest";s:5:"2.3.3";}s:21:"gravityformspaypalpro";a:3:{s:12:"is_available";b:0;s:7:"version";s:5:"1.8.1";s:14:"version_latest";s:5:"1.8.1";}s:20:"gravityformspicatcha";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.0";s:14:"version_latest";s:3:"2.0";}s:16:"gravityformspipe";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.1";s:14:"version_latest";s:3:"1.1";}s:17:"gravityformspolls";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"3.1";s:14:"version_latest";s:5:"3.1.4";}s:20:"gravityformspostmark";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.0";s:14:"version_latest";s:3:"1.0";s:3:"url";s:179:"http://s3.amazonaws.com/gravityforms/addons/postmark/gravityformspostmark_1.0.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=dxerxE%2BqJGhFPDhPFvdfJulVEeM%3D";s:10:"url_latest";s:179:"http://s3.amazonaws.com/gravityforms/addons/postmark/gravityformspostmark_1.0.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=dxerxE%2BqJGhFPDhPFvdfJulVEeM%3D";}s:16:"gravityformsquiz";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"3.1";s:14:"version_latest";s:5:"3.1.8";}s:19:"gravityformsrestapi";a:5:{s:12:"is_available";b:1;s:7:"version";s:10:"2.0-beta-2";s:14:"version_latest";s:10:"2.0-beta-2";s:3:"url";s:182:"http://s3.amazonaws.com/gravityforms/addons/restapi/gravityformsrestapi_2.0-beta-2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=PcH0YIxqAmxVAllBXf7tfX0RmMk%3D";s:10:"url_latest";s:182:"http://s3.amazonaws.com/gravityforms/addons/restapi/gravityformsrestapi_2.0-beta-2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=PcH0YIxqAmxVAllBXf7tfX0RmMk%3D";}s:20:"gravityformssendgrid";a:5:{s:12:"is_available";b:1;s:7:"version";s:3:"1.2";s:14:"version_latest";s:3:"1.2";s:3:"url";s:179:"http://s3.amazonaws.com/gravityforms/addons/sendgrid/gravityformssendgrid_1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=EXfDrjBqkEphhJqhDuB7Jz%2BWXJY%3D";s:10:"url_latest";s:179:"http://s3.amazonaws.com/gravityforms/addons/sendgrid/gravityformssendgrid_1.2.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=EXfDrjBqkEphhJqhDuB7Jz%2BWXJY%3D";}s:21:"gravityformssignature";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"3.6";s:14:"version_latest";s:5:"3.6.3";}s:17:"gravityformsslack";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.8";s:14:"version_latest";s:3:"1.8";}s:18:"gravityformsstripe";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.6";s:14:"version_latest";s:7:"2.6.0.2";}s:18:"gravityformssurvey";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"3.3";s:14:"version_latest";s:5:"3.3.1";}s:18:"gravityformstrello";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.2";s:14:"version_latest";s:5:"1.2.2";}s:18:"gravityformstwilio";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"2.5";s:14:"version_latest";s:5:"2.5.2";}s:28:"gravityformsuserregistration";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"4.0";s:14:"version_latest";s:5:"4.0.3";}s:20:"gravityformswebhooks";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.1";s:14:"version_latest";s:5:"1.1.5";}s:18:"gravityformszapier";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"3.1";s:14:"version_latest";s:5:"3.1.2";}s:19:"gravityformszohocrm";a:3:{s:12:"is_available";b:0;s:7:"version";s:3:"1.5";s:14:"version_latest";s:5:"1.5.2";}}s:9:"is_active";s:1:"1";s:14:"version_latest";s:5:"2.4.6";s:10:"url_latest";s:164:"http://s3.amazonaws.com/gravityforms/releases/gravityforms_2.4.6.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Expires=1550373838&Signature=oE2x5auD9N98l4hveqXyWyQ1VPs%3D";s:9:"timestamp";i:1550201044;}', 'yes'),
(355, 'rg_gforms_key', '850526bba2717304174e3fdc64ac1760', 'yes'),
(356, 'rg_gforms_enable_akismet', '1', 'yes'),
(357, 'rg_gforms_currency', 'USD', 'yes'),
(358, 'gform_enable_toolbar_menu', '1', 'yes'),
(393, 'gform_email_count', '2', 'yes'),
(409, '_site_transient_timeout_theme_roots', '1550202847', 'no'),
(410, '_site_transient_theme_roots', 'a:4:{s:7:"envzone";s:7:"/themes";s:14:"twentynineteen";s:7:"/themes";s:15:"twentyseventeen";s:7:"/themes";s:13:"twentysixteen";s:7:"/themes";}', 'no'),
(411, '_site_transient_update_plugins', 'O:8:"stdClass":5:{s:12:"last_checked";i:1550201052;s:7:"checked";a:3:{s:19:"akismet/akismet.php";s:3:"4.1";s:29:"gravityforms/gravityforms.php";s:5:"2.4.4";s:9:"hello.php";s:5:"1.7.1";}s:8:"response";a:1:{s:19:"akismet/akismet.php";O:8:"stdClass":12:{s:2:"id";s:21:"w.org/plugins/akismet";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"4.1.1";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.4.1.1.zip";s:5:"icons";a:2:{s:2:"2x";s:59:"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272";s:2:"1x";s:59:"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272";}s:7:"banners";a:1:{s:2:"1x";s:61:"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904";}s:11:"banners_rtl";a:0:{}s:6:"tested";s:5:"5.0.3";s:12:"requires_php";b:0;s:13:"compatibility";O:8:"stdClass":0:{}}}s:12:"translations";a:0:{}s:9:"no_update";a:1:{s:9:"hello.php";O:8:"stdClass":9:{s:2:"id";s:25:"w.org/plugins/hello-dolly";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";s:5:"icons";a:2:{s:2:"2x";s:63:"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=969907";s:2:"1x";s:63:"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=969907";}s:7:"banners";a:1:{s:2:"1x";s:65:"https://ps.w.org/hello-dolly/assets/banner-772x250.png?rev=478342";}s:11:"banners_rtl";a:0:{}}}}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=107 ;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 3, '_wp_trash_meta_status', 'draft'),
(4, 3, '_wp_trash_meta_time', '1548306185'),
(5, 3, '_wp_desired_post_slug', 'privacy-policy'),
(6, 2, '_wp_trash_meta_status', 'publish'),
(7, 2, '_wp_trash_meta_time', '1548306188'),
(8, 2, '_wp_desired_post_slug', 'sample-page'),
(15, 1, '_wp_old_slug', 'hello-world__trashed'),
(16, 1, '_edit_lock', '1548627556:1'),
(17, 8, '_edit_lock', '1548322891:1'),
(30, 22, '_edit_lock', '1548324124:1'),
(32, 26, '_edit_lock', '1548327588:1'),
(33, 29, '_edit_lock', '1548325150:1'),
(34, 31, '_edit_lock', '1548325222:1'),
(35, 33, '_edit_lock', '1548325304:1'),
(36, 35, '_edit_lock', '1548325528:1'),
(37, 36, '_edit_lock', '1548325360:1'),
(38, 38, '_edit_lock', '1548325380:1'),
(39, 40, '_edit_lock', '1548325398:1'),
(40, 42, '_edit_lock', '1548325416:1'),
(41, 44, '_edit_lock', '1548325434:1'),
(42, 46, '_edit_lock', '1548325456:1'),
(43, 48, '_edit_lock', '1548325515:1'),
(44, 51, '_edit_lock', '1548325558:1'),
(45, 53, '_edit_lock', '1548325572:1'),
(46, 55, '_edit_lock', '1548325587:1'),
(47, 57, '_edit_lock', '1548325603:1'),
(48, 59, '_edit_lock', '1548380396:1'),
(49, 61, '_edit_lock', '1548325633:1'),
(50, 63, '_edit_lock', '1548325651:1'),
(51, 65, '_edit_lock', '1548325666:1'),
(52, 67, '_edit_lock', '1548385532:1'),
(53, 69, '_edit_lock', '1548325693:1'),
(54, 71, '_edit_lock', '1548329598:1'),
(55, 73, '_edit_lock', '1548627555:1'),
(60, 77, '_edit_lock', '1548627553:1'),
(69, 82, '_edit_lock', '1548627552:1'),
(73, 85, '_edit_lock', '1548630770:1'),
(76, 88, '_edit_lock', '1548385565:1'),
(77, 90, '_edit_lock', '1548385602:1'),
(78, 92, '_edit_lock', '1548385627:1'),
(79, 94, '_edit_lock', '1548385650:1'),
(80, 96, '_edit_lock', '1548385661:1'),
(81, 98, '_edit_lock', '1548386721:1'),
(82, 100, '_edit_lock', '1548388150:1'),
(85, 103, '_wp_attached_file', '2019/01/img-blog-the-innovative.png'),
(86, 103, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:575;s:6:"height";i:380;s:4:"file";s:35:"2019/01/img-blog-the-innovative.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:35:"img-blog-the-innovative-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:35:"img-blog-the-innovative-300x198.png";s:5:"width";i:300;s:6:"height";i:198;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(89, 85, '_thumbnail_id', '103'),
(92, 82, '_thumbnail_id', '103'),
(95, 77, '_thumbnail_id', '103'),
(98, 73, '_thumbnail_id', '103'),
(101, 1, '_thumbnail_id', '103'),
(106, 85, '_wp_old_date', '2019-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=107 ;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2019-01-24 05:02:26', '2019-01-24 05:02:26', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2019-01-27 22:18:50', '2019-01-27 22:18:50', '', 0, 'http://localhost/env/?p=1', 0, 'post', '', 4),
(2, 1, '2019-01-24 05:02:26', '2019-01-24 05:02:26', '<!-- wp:paragraph -->\n<p>This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href="http://localhost/env/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'trash', 'closed', 'open', '', 'sample-page__trashed', '', '', '2019-01-24 05:03:08', '2019-01-24 05:03:08', '', 0, 'http://localhost/env/?page_id=2', 0, 'page', '', 0),
(3, 1, '2019-01-24 05:02:26', '2019-01-24 05:02:26', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://localhost/env.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'trash', 'closed', 'open', '', 'privacy-policy__trashed', '', '', '2019-01-24 05:03:05', '2019-01-24 05:03:05', '', 0, 'http://localhost/env/?page_id=3', 0, 'page', '', 0),
(5, 1, '2019-01-24 05:03:05', '2019-01-24 05:03:05', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://localhost/env.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '3-revision-v1', '', '', '2019-01-24 05:03:05', '2019-01-24 05:03:05', '', 3, 'http://localhost/env/index.php/2019/01/24/3-revision-v1/', 0, 'revision', '', 0),
(6, 1, '2019-01-24 05:03:08', '2019-01-24 05:03:08', '<!-- wp:paragraph -->\n<p>This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href="http://localhost/env/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2019-01-24 05:03:08', '2019-01-24 05:03:08', '', 2, 'http://localhost/env/index.php/2019/01/24/2-revision-v1/', 0, 'revision', '', 0),
(7, 1, '2019-01-24 05:03:11', '2019-01-24 05:03:11', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2019-01-24 05:03:11', '2019-01-24 05:03:11', '', 1, 'http://localhost/env/index.php/2019/01/24/1-revision-v1/', 0, 'revision', '', 0),
(8, 1, '2019-01-24 07:51:37', '2019-01-24 07:51:37', '', 'About Us', '', 'publish', 'closed', 'closed', '', 'about-us', '', '', '2019-01-24 07:51:37', '2019-01-24 07:51:37', '', 0, 'http://localhost/env/?page_id=8', 0, 'page', '', 0),
(9, 1, '2019-01-24 07:51:37', '2019-01-24 07:51:37', '', 'About Us', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2019-01-24 07:51:37', '2019-01-24 07:51:37', '', 8, 'http://localhost/env/index.php/2019/01/24/8-revision-v1/', 0, 'revision', '', 0),
(22, 1, '2019-01-24 09:52:52', '2019-01-24 09:52:52', '', 'Homepage', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2019-01-24 10:04:26', '2019-01-24 10:04:26', '', 0, 'http://localhost/env/?page_id=22', 0, 'page', '', 0),
(23, 1, '2019-01-24 09:52:52', '2019-01-24 09:52:52', '', 'home', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2019-01-24 09:52:52', '2019-01-24 09:52:52', '', 22, 'http://localhost/env/index.php/2019/01/24/22-revision-v1/', 0, 'revision', '', 0),
(24, 1, '2019-01-24 10:04:26', '2019-01-24 10:04:26', '', 'Homepage', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2019-01-24 10:04:26', '2019-01-24 10:04:26', '', 22, 'http://localhost/env/index.php/2019/01/24/22-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2019-01-24 10:20:32', '2019-01-24 10:20:32', '', 'Partnership', '', 'publish', 'closed', 'closed', '', 'partnership', '', '', '2019-01-24 10:39:52', '2019-01-24 10:39:52', '', 0, 'http://localhost/env/?page_id=26', 0, 'page', '', 0),
(27, 1, '2019-01-24 10:20:32', '2019-01-24 10:20:32', '', 'Partnerships', '', 'inherit', 'closed', 'closed', '', '26-revision-v1', '', '', '2019-01-24 10:20:32', '2019-01-24 10:20:32', '', 26, 'http://localhost/env/26-revision-v1/', 0, 'revision', '', 0),
(28, 1, '2019-01-24 10:20:55', '2019-01-24 10:20:55', '', 'Partnership', '', 'inherit', 'closed', 'closed', '', '26-revision-v1', '', '', '2019-01-24 10:20:55', '2019-01-24 10:20:55', '', 26, 'http://localhost/env/26-revision-v1/', 0, 'revision', '', 0),
(29, 1, '2019-01-24 10:21:14', '2019-01-24 10:21:14', '', 'Process Framework', '', 'publish', 'closed', 'closed', '', 'process-framework', '', '', '2019-01-24 10:21:14', '2019-01-24 10:21:14', '', 0, 'http://localhost/env/?page_id=29', 0, 'page', '', 0),
(30, 1, '2019-01-24 10:21:14', '2019-01-24 10:21:14', '', 'Process Framework', '', 'inherit', 'closed', 'closed', '', '29-revision-v1', '', '', '2019-01-24 10:21:14', '2019-01-24 10:21:14', '', 29, 'http://localhost/env/29-revision-v1/', 0, 'revision', '', 0),
(31, 1, '2019-01-24 10:21:45', '2019-01-24 10:21:45', '', 'Client - Focus Solutions', '', 'publish', 'closed', 'closed', '', 'client-focus-solutions', '', '', '2019-01-24 10:21:45', '2019-01-24 10:21:45', '', 0, 'http://localhost/env/?page_id=31', 0, 'page', '', 0),
(32, 1, '2019-01-24 10:21:45', '2019-01-24 10:21:45', '', 'Client - Focus Solutions', '', 'inherit', 'closed', 'closed', '', '31-revision-v1', '', '', '2019-01-24 10:21:45', '2019-01-24 10:21:45', '', 31, 'http://localhost/env/31-revision-v1/', 0, 'revision', '', 0),
(33, 1, '2019-01-24 10:23:03', '2019-01-24 10:23:03', '', 'Careers', '', 'publish', 'closed', 'closed', '', 'careers', '', '', '2019-01-24 10:23:03', '2019-01-24 10:23:03', '', 0, 'http://localhost/env/?page_id=33', 0, 'page', '', 0),
(34, 1, '2019-01-24 10:23:03', '2019-01-24 10:23:03', '', 'Careers', '', 'inherit', 'closed', 'closed', '', '33-revision-v1', '', '', '2019-01-24 10:23:03', '2019-01-24 10:23:03', '', 33, 'http://localhost/env/33-revision-v1/', 0, 'revision', '', 0),
(35, 1, '2019-01-24 10:27:51', '2019-01-24 10:27:51', '', 'Real Estate & Property', '', 'publish', 'closed', 'closed', '', 'real-estate-property', '', '', '2019-01-24 10:27:51', '2019-01-24 10:27:51', '', 0, 'http://localhost/env/?page_id=35', 0, 'page', '', 0),
(36, 1, '2019-01-24 10:24:51', '2019-01-24 10:24:51', '', 'Hospitality', '', 'publish', 'closed', 'closed', '', 'hospitality', '', '', '2019-01-24 10:24:51', '2019-01-24 10:24:51', '', 0, 'http://localhost/env/?page_id=36', 0, 'page', '', 0),
(37, 1, '2019-01-24 10:24:51', '2019-01-24 10:24:51', '', 'Hospitality', '', 'inherit', 'closed', 'closed', '', '36-revision-v1', '', '', '2019-01-24 10:24:51', '2019-01-24 10:24:51', '', 36, 'http://localhost/env/36-revision-v1/', 0, 'revision', '', 0),
(38, 1, '2019-01-24 10:25:15', '2019-01-24 10:25:15', '', 'Hospitality', '', 'publish', 'closed', 'closed', '', 'hospitality-2', '', '', '2019-01-24 10:25:15', '2019-01-24 10:25:15', '', 0, 'http://localhost/env/?page_id=38', 0, 'page', '', 0),
(39, 1, '2019-01-24 10:25:15', '2019-01-24 10:25:15', '', 'Hospitality', '', 'inherit', 'closed', 'closed', '', '38-revision-v1', '', '', '2019-01-24 10:25:15', '2019-01-24 10:25:15', '', 38, 'http://localhost/env/38-revision-v1/', 0, 'revision', '', 0),
(40, 1, '2019-01-24 10:25:32', '2019-01-24 10:25:32', '', 'E-Commerce & Retail', '', 'publish', 'closed', 'closed', '', 'e-commerce-retail', '', '', '2019-01-24 10:25:32', '2019-01-24 10:25:32', '', 0, 'http://localhost/env/?page_id=40', 0, 'page', '', 0),
(41, 1, '2019-01-24 10:25:32', '2019-01-24 10:25:32', '', 'E-Commerce & Retail', '', 'inherit', 'closed', 'closed', '', '40-revision-v1', '', '', '2019-01-24 10:25:32', '2019-01-24 10:25:32', '', 40, 'http://localhost/env/40-revision-v1/', 0, 'revision', '', 0),
(42, 1, '2019-01-24 10:25:48', '2019-01-24 10:25:48', '', 'Financial Services', '', 'publish', 'closed', 'closed', '', 'financial-services', '', '', '2019-01-24 10:25:48', '2019-01-24 10:25:48', '', 0, 'http://localhost/env/?page_id=42', 0, 'page', '', 0),
(43, 1, '2019-01-24 10:25:48', '2019-01-24 10:25:48', '', 'Financial Services', '', 'inherit', 'closed', 'closed', '', '42-revision-v1', '', '', '2019-01-24 10:25:48', '2019-01-24 10:25:48', '', 42, 'http://localhost/env/42-revision-v1/', 0, 'revision', '', 0),
(44, 1, '2019-01-24 10:26:06', '2019-01-24 10:26:06', '', 'Non-profit Organization', '', 'publish', 'closed', 'closed', '', 'non-profit-organization', '', '', '2019-01-24 10:26:06', '2019-01-24 10:26:06', '', 0, 'http://localhost/env/?page_id=44', 0, 'page', '', 0),
(45, 1, '2019-01-24 10:26:06', '2019-01-24 10:26:06', '', 'Non-profit Organization', '', 'inherit', 'closed', 'closed', '', '44-revision-v1', '', '', '2019-01-24 10:26:06', '2019-01-24 10:26:06', '', 44, 'http://localhost/env/44-revision-v1/', 0, 'revision', '', 0),
(46, 1, '2019-01-24 10:26:26', '2019-01-24 10:26:26', '', 'Healthcare', '', 'publish', 'closed', 'closed', '', 'healthcare', '', '', '2019-01-24 10:26:26', '2019-01-24 10:26:26', '', 0, 'http://localhost/env/?page_id=46', 0, 'page', '', 0),
(47, 1, '2019-01-24 10:26:26', '2019-01-24 10:26:26', '', 'Healthcare', '', 'inherit', 'closed', 'closed', '', '46-revision-v1', '', '', '2019-01-24 10:26:26', '2019-01-24 10:26:26', '', 46, 'http://localhost/env/46-revision-v1/', 0, 'revision', '', 0),
(48, 1, '2019-01-24 10:26:50', '2019-01-24 10:26:50', '', 'Logistics & Supply Chain', '', 'publish', 'closed', 'closed', '', 'logistics-supply-chain', '', '', '2019-01-24 10:26:50', '2019-01-24 10:26:50', '', 0, 'http://localhost/env/?page_id=48', 0, 'page', '', 0),
(49, 1, '2019-01-24 10:26:50', '2019-01-24 10:26:50', '', 'Logistics & Supply Chain', '', 'inherit', 'closed', 'closed', '', '48-revision-v1', '', '', '2019-01-24 10:26:50', '2019-01-24 10:26:50', '', 48, 'http://localhost/env/48-revision-v1/', 0, 'revision', '', 0),
(50, 1, '2019-01-24 10:27:51', '2019-01-24 10:27:51', '', 'Real Estate & Property', '', 'inherit', 'closed', 'closed', '', '35-revision-v1', '', '', '2019-01-24 10:27:51', '2019-01-24 10:27:51', '', 35, 'http://localhost/env/35-revision-v1/', 0, 'revision', '', 0),
(51, 1, '2019-01-24 10:28:13', '2019-01-24 10:28:13', '', 'Full Cycle Development', '', 'publish', 'closed', 'closed', '', 'full-cycle-development', '', '', '2019-01-24 10:28:13', '2019-01-24 10:28:13', '', 0, 'http://localhost/env/?page_id=51', 0, 'page', '', 0),
(52, 1, '2019-01-24 10:28:13', '2019-01-24 10:28:13', '', 'Full Cycle Development', '', 'inherit', 'closed', 'closed', '', '51-revision-v1', '', '', '2019-01-24 10:28:13', '2019-01-24 10:28:13', '', 51, 'http://localhost/env/51-revision-v1/', 0, 'revision', '', 0),
(53, 1, '2019-01-24 10:28:28', '2019-01-24 10:28:28', '', 'IT Outsourcing', '', 'publish', 'closed', 'closed', '', 'it-outsourcing', '', '', '2019-01-24 10:28:28', '2019-01-24 10:28:28', '', 0, 'http://localhost/env/?page_id=53', 0, 'page', '', 0),
(54, 1, '2019-01-24 10:28:28', '2019-01-24 10:28:28', '', 'IT Outsourcing', '', 'inherit', 'closed', 'closed', '', '53-revision-v1', '', '', '2019-01-24 10:28:28', '2019-01-24 10:28:28', '', 53, 'http://localhost/env/53-revision-v1/', 0, 'revision', '', 0),
(55, 1, '2019-01-24 10:28:44', '2019-01-24 10:28:44', '', 'Testing', '', 'publish', 'closed', 'closed', '', 'testing', '', '', '2019-01-24 10:28:44', '2019-01-24 10:28:44', '', 0, 'http://localhost/env/?page_id=55', 0, 'page', '', 0),
(56, 1, '2019-01-24 10:28:44', '2019-01-24 10:28:44', '', 'Testing', '', 'inherit', 'closed', 'closed', '', '55-revision-v1', '', '', '2019-01-24 10:28:44', '2019-01-24 10:28:44', '', 55, 'http://localhost/env/55-revision-v1/', 0, 'revision', '', 0),
(57, 1, '2019-01-24 10:28:58', '2019-01-24 10:28:58', '', 'Client Center', '', 'publish', 'closed', 'closed', '', 'client-center', '', '', '2019-01-24 10:28:58', '2019-01-24 10:28:58', '', 0, 'http://localhost/env/?page_id=57', 0, 'page', '', 0),
(58, 1, '2019-01-24 10:28:58', '2019-01-24 10:28:58', '', 'Client Center', '', 'inherit', 'closed', 'closed', '', '57-revision-v1', '', '', '2019-01-24 10:28:58', '2019-01-24 10:28:58', '', 57, 'http://localhost/env/57-revision-v1/', 0, 'revision', '', 0),
(59, 1, '2019-01-24 10:29:13', '2019-01-24 10:29:13', '', 'Software Quality Assurance', '', 'publish', 'closed', 'closed', '', 'software-quality-assurance', '', '', '2019-01-24 10:29:13', '2019-01-24 10:29:13', '', 0, 'http://localhost/env/?page_id=59', 0, 'page', '', 0),
(60, 1, '2019-01-24 10:29:13', '2019-01-24 10:29:13', '', 'Software Quality Assurance', '', 'inherit', 'closed', 'closed', '', '59-revision-v1', '', '', '2019-01-24 10:29:13', '2019-01-24 10:29:13', '', 59, 'http://localhost/env/59-revision-v1/', 0, 'revision', '', 0),
(61, 1, '2019-01-24 10:29:29', '2019-01-24 10:29:29', '', 'DevOps', '', 'publish', 'closed', 'closed', '', 'devops', '', '', '2019-01-24 10:29:29', '2019-01-24 10:29:29', '', 0, 'http://localhost/env/?page_id=61', 0, 'page', '', 0),
(62, 1, '2019-01-24 10:29:29', '2019-01-24 10:29:29', '', 'DevOps', '', 'inherit', 'closed', 'closed', '', '61-revision-v1', '', '', '2019-01-24 10:29:29', '2019-01-24 10:29:29', '', 61, 'http://localhost/env/61-revision-v1/', 0, 'revision', '', 0),
(63, 1, '2019-01-24 10:29:46', '2019-01-24 10:29:46', '', 'Blog', '', 'publish', 'closed', 'closed', '', 'blog', '', '', '2019-01-24 10:29:46', '2019-01-24 10:29:46', '', 0, 'http://localhost/env/?page_id=63', 0, 'page', '', 0),
(64, 1, '2019-01-24 10:29:46', '2019-01-24 10:29:46', '', 'Blog', '', 'inherit', 'closed', 'closed', '', '63-revision-v1', '', '', '2019-01-24 10:29:46', '2019-01-24 10:29:46', '', 63, 'http://localhost/env/63-revision-v1/', 0, 'revision', '', 0),
(65, 1, '2019-01-24 10:30:02', '2019-01-24 10:30:02', '', 'Events', '', 'publish', 'closed', 'closed', '', 'events', '', '', '2019-01-24 10:30:02', '2019-01-24 10:30:02', '', 0, 'http://localhost/env/?page_id=65', 0, 'page', '', 0),
(66, 1, '2019-01-24 10:30:02', '2019-01-24 10:30:02', '', 'Events', '', 'inherit', 'closed', 'closed', '', '65-revision-v1', '', '', '2019-01-24 10:30:02', '2019-01-24 10:30:02', '', 65, 'http://localhost/env/65-revision-v1/', 0, 'revision', '', 0),
(67, 1, '2019-01-24 10:30:19', '2019-01-24 10:30:19', '', 'Knowledge', '', 'publish', 'closed', 'closed', '', 'knowledge', '', '', '2019-01-25 03:00:56', '2019-01-25 03:00:56', '', 0, 'http://localhost/env/?page_id=67', 0, 'page', '', 0),
(68, 1, '2019-01-24 10:30:19', '2019-01-24 10:30:19', '', 'Knowledge Center', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2019-01-24 10:30:19', '2019-01-24 10:30:19', '', 67, 'http://localhost/env/67-revision-v1/', 0, 'revision', '', 0),
(69, 1, '2019-01-24 10:30:33', '2019-01-24 10:30:33', '', 'Studio', '', 'publish', 'closed', 'closed', '', 'studio', '', '', '2019-01-24 10:30:33', '2019-01-24 10:30:33', '', 0, 'http://localhost/env/?page_id=69', 0, 'page', '', 0),
(70, 1, '2019-01-24 10:30:33', '2019-01-24 10:30:33', '', 'Studio', '', 'inherit', 'closed', 'closed', '', '69-revision-v1', '', '', '2019-01-24 10:30:33', '2019-01-24 10:30:33', '', 69, 'http://localhost/env/69-revision-v1/', 0, 'revision', '', 0),
(71, 1, '2019-01-24 11:35:40', '2019-01-24 11:35:40', '', 'Education', '', 'publish', 'closed', 'closed', '', 'education', '', '', '2019-01-24 11:35:40', '2019-01-24 11:35:40', '', 0, 'http://localhost/env/?page_id=71', 0, 'page', '', 0),
(72, 1, '2019-01-24 11:35:40', '2019-01-24 11:35:40', '', 'Education', '', 'inherit', 'closed', 'closed', '', '71-revision-v1', '', '', '2019-01-24 11:35:40', '2019-01-24 11:35:40', '', 71, 'http://localhost/env/71-revision-v1/', 0, 'revision', '', 0),
(73, 1, '2019-01-25 01:43:13', '2019-01-25 01:43:13', '<!-- wp:paragraph -->\n<p>From software testing services to maintenence and support, your productivity will be maximized by our large team of certified QA engineers.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Our goal is to help clients find the right software development services through the various outsourcing models that we use. We help match clients to the right developer teams. Our goal is to ensure that clients find teams who are reliable, capable, honest, and experienced. Additionally, the teams should be well equipped with the right infrastructure and resources. We are mindful of client needs to reduce costs while improving quality, through the outsourcing process. We act as the bridge between the client and the vendor.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Since the success of the project might rest on our shoulders, we look for talented, responsible go getters to work for us. We help build strong teams that can take on any challenge. In the process, employees learn many things in the workplace we offer. They get to develop further skills in the area of their expertise. We also offer chances for growth into other areas, should they feel like exploring new areas of growth. We are constantly striving to nurture talent at the same time, offering a place for exploration and discovery.</p>\n<!-- /wp:paragraph -->', 'Tech Trends and Innovations for Businesses', 'EnvZone prides itself on executing complex projects for clients. Our software services rely heavily on the skills of the people we work with and we prize them for the benefits they bring to the organization. We also prioritize the requirements of clients, which can range from simple onetime projects to complex long-term development processes.', 'publish', 'open', 'open', '', 'demo', '', '', '2019-01-27 22:18:42', '2019-01-27 22:18:42', '', 0, 'http://localhost/env/?p=73', 0, 'post', '', 0),
(74, 1, '2019-01-25 01:43:13', '2019-01-25 01:43:13', '<!-- wp:paragraph -->\n<p>From software testing services to maintenence and support, your productivity will be maximized by our large team of certified QA engineers.</p>\n<!-- /wp:paragraph -->', 'demo', '', 'inherit', 'closed', 'closed', '', '73-revision-v1', '', '', '2019-01-25 01:43:13', '2019-01-25 01:43:13', '', 73, 'http://localhost/env/73-revision-v1/', 0, 'revision', '', 0),
(76, 1, '2019-01-25 01:54:42', '2019-01-25 01:54:42', '<!-- wp:paragraph -->\n<p>From software testing services to maintenence and support, your productivity will be maximized by our large team of certified QA engineers.</p>\n<!-- /wp:paragraph -->', 'Tech Trends and Innovations for Businesses', 'EnvZone prides itself on executing complex projects for clients. Our software services rely heavily on the skills of the people we work with and we prize them for the benefits they bring to the organization. We also prioritize the requirements of clients, which can range from simple onetime projects to complex long-term development processes.', 'inherit', 'closed', 'closed', '', '73-revision-v1', '', '', '2019-01-25 01:54:42', '2019-01-25 01:54:42', '', 73, 'http://localhost/env/73-revision-v1/', 0, 'revision', '', 0),
(77, 1, '2019-01-25 02:03:54', '2019-01-25 02:03:54', '<!-- wp:paragraph -->\n<p><a href="https://www.facebook.com/hashtag/electric?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCdOYfrkuPzm4B0zNh4U6P2_dXExLpCSGzAEFWwgfprA36s0aVvIcSaXuhFj2edc12JVuXLKnDUW7od3zIcaK4WyY-k_HU85fD0mT3mAWXYdQZH_iqsUYxkv9RGY9RQtBJemtDN46DxynpDM390jpfwgbOJ-QWOZSsdG9LcACGJzsoJ0hgz4y4oNVWjXyHxT-Trezw2-hkKtFZTg6vAUI6U7wTa-irBBjdeB3p1UUE5Qgcr8oezNuOngYEsjofvnsWkXFgEsRFCYpjTletleZZPbXuEWQUNfLcKP4WbxiKHVdPWuoO1NXy9OoI-UUVQ_oQk0vuhjBlzaIYGLap4GrNXqsbt&amp;__tn__=%2ANK-R">#Electric</a>, New York-based startup that provides chat-driven IT support, has raised $25 million in the Series B round led by&nbsp;<a href="https://www.facebook.com/hashtag/ggv?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCdOYfrkuPzm4B0zNh4U6P2_dXExLpCSGzAEFWwgfprA36s0aVvIcSaXuhFj2edc12JVuXLKnDUW7od3zIcaK4WyY-k_HU85fD0mT3mAWXYdQZH_iqsUYxkv9RGY9RQtBJemtDN46DxynpDM390jpfwgbOJ-QWOZSsdG9LcACGJzsoJ0hgz4y4oNVWjXyHxT-Trezw2-hkKtFZTg6vAUI6U7wTa-irBBjdeB3p1UUE5Qgcr8oezNuOngYEsjofvnsWkXFgEsRFCYpjTletleZZPbXuEWQUNfLcKP4WbxiKHVdPWuoO1NXy9OoI-UUVQ_oQk0vuhjBlzaIYGLap4GrNXqsbt&amp;__tn__=%2ANK-R">#GGV</a>. As a part of the deal, Jeff Richards, GGV''s capital managing partner, joins the board of directors.</p>\n<!-- /wp:paragraph -->', 'Electric Raises $25M Series B As It Scales Its', '', 'publish', 'open', 'open', '', 'electric-raises-25m-series-b-as-it-scales-its', '', '', '2019-01-27 22:18:25', '2019-01-27 22:18:25', '', 0, 'http://localhost/env/?p=77', 0, 'post', '', 0),
(78, 1, '2019-01-25 02:03:54', '2019-01-25 02:03:54', '<!-- wp:paragraph -->\n<p><a href="https://www.facebook.com/hashtag/electric?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCdOYfrkuPzm4B0zNh4U6P2_dXExLpCSGzAEFWwgfprA36s0aVvIcSaXuhFj2edc12JVuXLKnDUW7od3zIcaK4WyY-k_HU85fD0mT3mAWXYdQZH_iqsUYxkv9RGY9RQtBJemtDN46DxynpDM390jpfwgbOJ-QWOZSsdG9LcACGJzsoJ0hgz4y4oNVWjXyHxT-Trezw2-hkKtFZTg6vAUI6U7wTa-irBBjdeB3p1UUE5Qgcr8oezNuOngYEsjofvnsWkXFgEsRFCYpjTletleZZPbXuEWQUNfLcKP4WbxiKHVdPWuoO1NXy9OoI-UUVQ_oQk0vuhjBlzaIYGLap4GrNXqsbt&amp;__tn__=%2ANK-R">#Electric</a>, New York-based startup that provides chat-driven IT support, has raised $25 million in the Series B round led by <a href="https://www.facebook.com/hashtag/ggv?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCdOYfrkuPzm4B0zNh4U6P2_dXExLpCSGzAEFWwgfprA36s0aVvIcSaXuhFj2edc12JVuXLKnDUW7od3zIcaK4WyY-k_HU85fD0mT3mAWXYdQZH_iqsUYxkv9RGY9RQtBJemtDN46DxynpDM390jpfwgbOJ-QWOZSsdG9LcACGJzsoJ0hgz4y4oNVWjXyHxT-Trezw2-hkKtFZTg6vAUI6U7wTa-irBBjdeB3p1UUE5Qgcr8oezNuOngYEsjofvnsWkXFgEsRFCYpjTletleZZPbXuEWQUNfLcKP4WbxiKHVdPWuoO1NXy9OoI-UUVQ_oQk0vuhjBlzaIYGLap4GrNXqsbt&amp;__tn__=%2ANK-R">#GGV</a>. As a part of the deal, Jeff Richards, GGV''s capital managing partner, joins the board of directors.</p>\n<!-- /wp:paragraph -->', 'Electric Raises $25M Series B As It Scales Its', '', 'inherit', 'closed', 'closed', '', '77-revision-v1', '', '', '2019-01-25 02:03:54', '2019-01-25 02:03:54', '', 77, 'http://localhost/env/77-revision-v1/', 0, 'revision', '', 0),
(79, 1, '2019-01-25 02:04:39', '2019-01-25 02:04:39', '<!-- wp:paragraph -->\n<p><a href="https://www.facebook.com/hashtag/electric?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCdOYfrkuPzm4B0zNh4U6P2_dXExLpCSGzAEFWwgfprA36s0aVvIcSaXuhFj2edc12JVuXLKnDUW7od3zIcaK4WyY-k_HU85fD0mT3mAWXYdQZH_iqsUYxkv9RGY9RQtBJemtDN46DxynpDM390jpfwgbOJ-QWOZSsdG9LcACGJzsoJ0hgz4y4oNVWjXyHxT-Trezw2-hkKtFZTg6vAUI6U7wTa-irBBjdeB3p1UUE5Qgcr8oezNuOngYEsjofvnsWkXFgEsRFCYpjTletleZZPbXuEWQUNfLcKP4WbxiKHVdPWuoO1NXy9OoI-UUVQ_oQk0vuhjBlzaIYGLap4GrNXqsbt&amp;__tn__=%2ANK-R">#Electric</a>, New York-based startup that provides chat-driven IT support, has raised $25 million in the Series B round led by&nbsp;<a href="https://www.facebook.com/hashtag/ggv?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCdOYfrkuPzm4B0zNh4U6P2_dXExLpCSGzAEFWwgfprA36s0aVvIcSaXuhFj2edc12JVuXLKnDUW7od3zIcaK4WyY-k_HU85fD0mT3mAWXYdQZH_iqsUYxkv9RGY9RQtBJemtDN46DxynpDM390jpfwgbOJ-QWOZSsdG9LcACGJzsoJ0hgz4y4oNVWjXyHxT-Trezw2-hkKtFZTg6vAUI6U7wTa-irBBjdeB3p1UUE5Qgcr8oezNuOngYEsjofvnsWkXFgEsRFCYpjTletleZZPbXuEWQUNfLcKP4WbxiKHVdPWuoO1NXy9OoI-UUVQ_oQk0vuhjBlzaIYGLap4GrNXqsbt&amp;__tn__=%2ANK-R">#GGV</a>. As a part of the deal, Jeff Richards, GGV''s capital managing partner, joins the board of directors.</p>\n<!-- /wp:paragraph -->', 'Electric Raises $25M Series B As It Scales Its', '', 'inherit', 'closed', 'closed', '', '77-revision-v1', '', '', '2019-01-25 02:04:39', '2019-01-25 02:04:39', '', 77, 'http://localhost/env/77-revision-v1/', 0, 'revision', '', 0),
(81, 1, '2019-01-25 02:05:26', '2019-01-25 02:05:26', '<!-- wp:paragraph -->\n<p>From software testing services to maintenence and support, your productivity will be maximized by our large team of certified QA engineers.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Our goal is to help clients find the right software development services through the various outsourcing models that we use. We help match clients to the right developer teams. Our goal is to ensure that clients find teams who are reliable, capable, honest, and experienced. Additionally, the teams should be well equipped with the right infrastructure and resources. We are mindful of client needs to reduce costs while improving quality, through the outsourcing process. We act as the bridge between the client and the vendor.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Since the success of the project might rest on our shoulders, we look for talented, responsible go getters to work for us. We help build strong teams that can take on any challenge. In the process, employees learn many things in the workplace we offer. They get to develop further skills in the area of their expertise. We also offer chances for growth into other areas, should they feel like exploring new areas of growth. We are constantly striving to nurture talent at the same time, offering a place for exploration and discovery.</p>\n<!-- /wp:paragraph -->', 'Tech Trends and Innovations for Businesses', 'EnvZone prides itself on executing complex projects for clients. Our software services rely heavily on the skills of the people we work with and we prize them for the benefits they bring to the organization. We also prioritize the requirements of clients, which can range from simple onetime projects to complex long-term development processes.', 'inherit', 'closed', 'closed', '', '73-revision-v1', '', '', '2019-01-25 02:05:26', '2019-01-25 02:05:26', '', 73, 'http://localhost/env/73-revision-v1/', 0, 'revision', '', 0),
(82, 1, '2019-01-25 02:30:29', '2019-01-25 02:30:29', '<!-- wp:paragraph -->\n<p>Let’s take a look at a subset of that topline number.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Of the almost $40 billion raised by women in 2018, 50 known rounds were above the $100 million mark for this year, making up for 65 percent ($26.2 billion) of the dollar amounts raised by companies with at least one female founder.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In contrast, male-only founded companies raised 338 rounds above $100 million at $103 billion (53 percent) of dollars raised by male-only teams.</p>\n<!-- /wp:paragraph -->', '2018 Sets All-Time High For', 'In contrast, male-only founded companies raised 338 rounds above $100 million at $103 billion (53 percent) of dollars raised by male-only teams.', 'publish', 'open', 'open', '', '2018-sets-all-time-high-for', '', '', '2019-01-27 22:18:13', '2019-01-27 22:18:13', '', 0, 'http://localhost/env/?p=82', 0, 'post', '', 0),
(83, 1, '2019-01-25 02:30:29', '2019-01-25 02:30:29', '<!-- wp:paragraph -->\n<p>Let’s take a look at a subset of that topline number.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Of the almost $40 billion raised by women in 2018, 50 known rounds were above the $100 million mark for this year, making up for 65 percent ($26.2 billion) of the dollar amounts raised by companies with at least one female founder.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In contrast, male-only founded companies raised 338 rounds above $100 million at $103 billion (53 percent) of dollars raised by male-only teams.</p>\n<!-- /wp:paragraph -->', '2018 Sets All-Time High For', 'In contrast, male-only founded companies raised 338 rounds above $100 million at $103 billion (53 percent) of dollars raised by male-only teams.', 'inherit', 'closed', 'closed', '', '82-revision-v1', '', '', '2019-01-25 02:30:29', '2019-01-25 02:30:29', '', 82, 'http://localhost/env/82-revision-v1/', 0, 'revision', '', 0),
(85, 1, '2019-01-27 02:31:25', '2019-01-27 02:31:25', '<!-- wp:paragraph -->\n<p>Anyone who’s tried talking to their parents about a job search has realized the same thing: the employment market, and specifically, the gig economy, has changed immeasurably over the past generation.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {"id":103} -->\n<figure class="wp-block-image"><img src="http://localhost/env/wp-content/uploads/2019/01/img-blog-the-innovative.png" alt="" class="wp-image-103"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p>There’s certain jobs that are&nbsp;<a href="https://www.dailyinfographic.com/10-hottest-jobs-2020">becoming more crucial than ever</a>, and it’s important to stay aware of skills that are increasingly in demand. But beyond individual job roles, it’s also key to look at wider trends across the job market- such as the growth of the gig economy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>This colorful infographic starts by defining the gig economy as the sector of the service industry involving temporary work, which has gained a million workers in the past decade. To illustrate this growth, the graphic tracks the growth of 3 selected start-ups- AirBnb, Uber, and Lyft- over the past ten years. For readers who use these services regularly, it’s slightly incredible to be reminded that AirBnb only appeared in 2008 (and Uber in 2009, and Lyft in 2012).</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>It’s clear that the gig economy is here to stay: by 2027, the number of gig economy employees is set to overtake the number of traditional workers in the US economy. What remains to be seen is how society adapts to this shift, and whether workers will enjoy increased flexibility or lament the decreased stability in their work lives.</p>\n<!-- /wp:paragraph -->', 'What You Didn’t Know About the Gig Economy', '', 'publish', 'open', 'open', '', 'what-you-didnt-know-about-the-gig-economy', '', '', '2019-01-27 22:26:45', '2019-01-27 22:26:45', '', 0, 'http://localhost/env/?p=85', 0, 'post', '', 0),
(86, 1, '2019-01-25 02:31:25', '2019-01-25 02:31:25', '<!-- wp:paragraph -->\n<p>Anyone who’s tried talking to their parents about a job search has realized the same thing: the employment market, and specifically, the gig economy, has changed immeasurably over the past generation.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>There’s certain jobs that are&nbsp;<a href="https://www.dailyinfographic.com/10-hottest-jobs-2020">becoming more crucial than ever</a>, and it’s important to stay aware of skills that are increasingly in demand. But beyond individual job roles, it’s also key to look at wider trends across the job market- such as the growth of the gig economy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>This colorful infographic starts by defining the gig economy as the sector of the service industry involving temporary work, which has gained a million workers in the past decade. To illustrate this growth, the graphic tracks the growth of 3 selected start-ups- AirBnb, Uber, and Lyft- over the past ten years. For readers who use these services regularly, it’s slightly incredible to be reminded that AirBnb only appeared in 2008 (and Uber in 2009, and Lyft in 2012).</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>It’s clear that the gig economy is here to stay: by 2027, the number of gig economy employees is set to overtake the number of traditional workers in the US economy. What remains to be seen is how society adapts to this shift, and whether workers will enjoy increased flexibility or lament the decreased stability in their work lives.</p>\n<!-- /wp:paragraph -->', 'What You Didn’t Know About the Gig Economy', '', 'inherit', 'closed', 'closed', '', '85-revision-v1', '', '', '2019-01-25 02:31:25', '2019-01-25 02:31:25', '', 85, 'http://localhost/env/85-revision-v1/', 0, 'revision', '', 0),
(87, 1, '2019-01-25 03:00:56', '2019-01-25 03:00:56', '', 'Knowledge', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2019-01-25 03:00:56', '2019-01-25 03:00:56', '', 67, 'http://localhost/env/67-revision-v1/', 0, 'revision', '', 0),
(88, 1, '2019-01-25 03:08:28', '2019-01-25 03:08:28', '', 'Accessibility', '', 'publish', 'closed', 'closed', '', 'accessibility', '', '', '2019-01-25 03:08:28', '2019-01-25 03:08:28', '', 0, 'http://localhost/env/?page_id=88', 0, 'page', '', 0),
(89, 1, '2019-01-25 03:08:28', '2019-01-25 03:08:28', '', 'Accessibility', '', 'inherit', 'closed', 'closed', '', '88-revision-v1', '', '', '2019-01-25 03:08:28', '2019-01-25 03:08:28', '', 88, 'http://localhost/env/88-revision-v1/', 0, 'revision', '', 0),
(90, 1, '2019-01-25 03:09:00', '2019-01-25 03:09:00', '', 'Terms of use', '', 'publish', 'closed', 'closed', '', 'terms-of-use', '', '', '2019-01-25 03:09:00', '2019-01-25 03:09:00', '', 0, 'http://localhost/env/?page_id=90', 0, 'page', '', 0),
(91, 1, '2019-01-25 03:09:00', '2019-01-25 03:09:00', '', 'Terms of use', '', 'inherit', 'closed', 'closed', '', '90-revision-v1', '', '', '2019-01-25 03:09:00', '2019-01-25 03:09:00', '', 90, 'http://localhost/env/90-revision-v1/', 0, 'revision', '', 0),
(92, 1, '2019-01-25 03:09:27', '2019-01-25 03:09:27', '', 'Privacy Policy', '', 'publish', 'closed', 'closed', '', 'privacy-policy', '', '', '2019-01-25 03:09:27', '2019-01-25 03:09:27', '', 0, 'http://localhost/env/?page_id=92', 0, 'page', '', 0),
(93, 1, '2019-01-25 03:09:27', '2019-01-25 03:09:27', '', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '92-revision-v1', '', '', '2019-01-25 03:09:27', '2019-01-25 03:09:27', '', 92, 'http://localhost/env/92-revision-v1/', 0, 'revision', '', 0),
(94, 1, '2019-01-25 03:09:40', '2019-01-25 03:09:40', '', 'Help', '', 'publish', 'closed', 'closed', '', 'help', '', '', '2019-01-25 03:09:40', '2019-01-25 03:09:40', '', 0, 'http://localhost/env/?page_id=94', 0, 'page', '', 0),
(95, 1, '2019-01-25 03:09:40', '2019-01-25 03:09:40', '', 'Help', '', 'inherit', 'closed', 'closed', '', '94-revision-v1', '', '', '2019-01-25 03:09:40', '2019-01-25 03:09:40', '', 94, 'http://localhost/env/94-revision-v1/', 0, 'revision', '', 0),
(96, 1, '2019-01-25 03:10:00', '2019-01-25 03:10:00', '', 'Affiliate Program', '', 'publish', 'closed', 'closed', '', 'affiliate-program', '', '', '2019-01-25 03:10:00', '2019-01-25 03:10:00', '', 0, 'http://localhost/env/?page_id=96', 0, 'page', '', 0),
(97, 1, '2019-01-25 03:10:00', '2019-01-25 03:10:00', '', 'Affiliate Program', '', 'inherit', 'closed', 'closed', '', '96-revision-v1', '', '', '2019-01-25 03:10:00', '2019-01-25 03:10:00', '', 96, 'http://localhost/env/96-revision-v1/', 0, 'revision', '', 0),
(98, 1, '2019-01-25 03:20:12', '2019-01-25 03:20:12', '', 'Customer Support', '', 'publish', 'closed', 'closed', '', 'customer-support', '', '', '2019-01-25 03:20:12', '2019-01-25 03:20:12', '', 0, 'http://localhost/env/?page_id=98', 0, 'page', '', 0),
(99, 1, '2019-01-25 03:20:12', '2019-01-25 03:20:12', '', 'Customer Support', '', 'inherit', 'closed', 'closed', '', '98-revision-v1', '', '', '2019-01-25 03:20:12', '2019-01-25 03:20:12', '', 98, 'http://localhost/env/98-revision-v1/', 0, 'revision', '', 0),
(100, 1, '2019-01-25 03:30:31', '2019-01-25 03:30:31', '', 'Contact Us', '', 'publish', 'closed', 'closed', '', 'contact-us', '', '', '2019-01-25 03:30:31', '2019-01-25 03:30:31', '', 0, 'http://localhost/env/?page_id=100', 0, 'page', '', 0),
(101, 1, '2019-01-25 03:30:31', '2019-01-25 03:30:31', '', 'Contact Us', '', 'inherit', 'closed', 'closed', '', '100-revision-v1', '', '', '2019-01-25 03:30:31', '2019-01-25 03:30:31', '', 100, 'http://localhost/env/100-revision-v1/', 0, 'revision', '', 0),
(103, 1, '2019-01-27 22:13:00', '2019-01-27 22:13:00', '', 'img-blog-the-innovative', '', 'inherit', 'open', 'closed', '', 'img-blog-the-innovative', '', '', '2019-01-27 22:13:00', '2019-01-27 22:13:00', '', 85, 'http://localhost/env/wp-content/uploads/2019/01/img-blog-the-innovative.png', 0, 'attachment', 'image/png', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(105, 1, '2019-01-27 22:21:30', '2019-01-27 22:21:30', '<!-- wp:paragraph -->\n<p>Anyone who’s tried talking to their parents about a job search has realized the same thing: the employment market, and specifically, the gig economy, has changed immeasurably over the past generation.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {"id":103} -->\n<figure class="wp-block-image"><img src="http://localhost/env/wp-content/uploads/2019/01/img-blog-the-innovative.png" alt="" class="wp-image-103"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p>There’s certain jobs that are&nbsp;<a href="https://www.dailyinfographic.com/10-hottest-jobs-2020">becoming more crucial than ever</a>, and it’s important to stay aware of skills that are increasingly in demand. But beyond individual job roles, it’s also key to look at wider trends across the job market- such as the growth of the gig economy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>This colorful infographic starts by defining the gig economy as the sector of the service industry involving temporary work, which has gained a million workers in the past decade. To illustrate this growth, the graphic tracks the growth of 3 selected start-ups- AirBnb, Uber, and Lyft- over the past ten years. For readers who use these services regularly, it’s slightly incredible to be reminded that AirBnb only appeared in 2008 (and Uber in 2009, and Lyft in 2012).</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>It’s clear that the gig economy is here to stay: by 2027, the number of gig economy employees is set to overtake the number of traditional workers in the US economy. What remains to be seen is how society adapts to this shift, and whether workers will enjoy increased flexibility or lament the decreased stability in their work lives.</p>\n<!-- /wp:paragraph -->', 'What You Didn’t Know About the Gig Economy', '', 'inherit', 'closed', 'closed', '', '85-revision-v1', '', '', '2019-01-27 22:21:30', '2019-01-27 22:21:30', '', 85, 'http://localhost/env/85-revision-v1/', 0, 'revision', '', 0),
(106, 1, '2019-01-27 23:15:15', '2019-01-27 23:15:15', '<!-- wp:paragraph -->\n<p>Anyone who’s tried talking to their parents about a job search has realized the same thing: the employment market, and specifically, the gig economy, has changed immeasurably over the past generation.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {"id":103} -->\n<figure class="wp-block-image"><img src="http://localhost/env/wp-content/uploads/2019/01/img-blog-the-innovative.png" alt="" class="wp-image-103"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p>There’s certain jobs that are&nbsp;<a href="https://www.dailyinfographic.com/10-hottest-jobs-2020">becoming more crucial than ever</a>, and it’s important to stay aware of skills that are increasingly in demand. But beyond individual job roles, it’s also key to look at wider trends across the job market- such as the growth of the gig economy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>This colorful infographic starts by defining the gig economy as the sector of the service industry involving temporary work, which has gained a million workers in the past decade. To illustrate this growth, the graphic tracks the growth of 3 selected start-ups- AirBnb, Uber, and Lyft- over the past ten years. For readers who use these services regularly, it’s slightly incredible to be reminded that AirBnb only appeared in 2008 (and Uber in 2009, and Lyft in 2012).</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>It’s clear that the gig economy is here to stay: by 2027, the number of gig economy employees is set to overtake the number of traditional workers in the US economy. What remains to be seen is how society adapts to this shift, and whether workers will enjoy increased flexibility or lament the decreased stability in their work lives.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->', 'What You Didn’t Know About the Gig Economy', '', 'inherit', 'closed', 'closed', '', '85-autosave-v1', '', '', '2019-01-27 23:15:15', '2019-01-27 23:15:15', '', 85, 'http://localhost/env/85-autosave-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE IF NOT EXISTS `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'Devops', 'devops', 0),
(3, 'Education', 'education', 0),
(4, 'Healthcare', 'healthcare', 0),
(5, 'Hospitality', 'hospitality', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(73, 2, 0),
(77, 3, 0),
(82, 4, 0),
(85, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'category', '', 0, 1),
(3, 3, 'category', '', 0, 1),
(4, 4, 'category', '', 0, 1),
(5, 5, 'category', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'wp496_privacy'),
(15, 1, 'show_welcome_panel', '1'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '4'),
(18, 1, 'wp_user-settings', 'libraryContent=browse'),
(19, 1, 'wp_user-settings-time', '1548381284'),
(20, 1, 'session_tokens', 'a:2:{s:64:"ef26677da57fbf47ce16b501a960f7575dea207643d10534c40d1e9e4e702f66";a:4:{s:10:"expiration";i:1548693760;s:2:"ip";s:3:"::1";s:2:"ua";s:120:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36";s:5:"login";i:1548520960;}s:64:"14761ebe34e9a4be48e03a4825abd6d0e6a01bc399f85b77c3fddefbdf75f454";a:4:{s:10:"expiration";i:1548799113;s:2:"ip";s:3:"::1";s:2:"ua";s:114:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36";s:5:"login";i:1548626313;}}'),
(21, 1, 'gform_recent_forms', 'a:1:{i:0;s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BTt4iF8tF.7.1.OqstYwrJ86LPNfAS1', 'admin', 'than.vo@envzone.com', '', '2019-01-24 05:02:26', '', 0, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
