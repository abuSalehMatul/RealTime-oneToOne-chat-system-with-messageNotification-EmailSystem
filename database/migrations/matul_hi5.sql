-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 08:59 PM
-- Server version: 10.1.34-MariaDB
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
-- Database: `matul_hi5`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adds_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adds_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `style` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ads_post_on` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `embed_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `article_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `article_info_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_info_description` longtext COLLATE utf8_unicode_ci,
  `article_featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `article_saved_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdraw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datwise` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `heading` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `is_published` int(11) DEFAULT NULL,
  `comment_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checkbox` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `read_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_likes` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_dislikes` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_loves` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_angry` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_sad` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_happy` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `buyer_item_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_status` tinyint(1) DEFAULT NULL,
  `buyer_pro_weight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_sale_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_pro_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_pro_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_commission_percentage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_hidden_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_hidden_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_hidden_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `buyer_saved_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chatrooms`
--

CREATE TABLE `chatrooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `chatRoomId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE `comment_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_reactions`
--

CREATE TABLE `comment_reactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_reaction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_available` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `coupon_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `criteria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `used` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_method` text COLLATE utf8_unicode_ci,
  `selected_product` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disputes`
--

CREATE TABLE `disputes` (
  `id` int(10) UNSIGNED NOT NULL,
  `dispute_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dispute_maker` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `open_with` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dispute_maker_id` int(11) NOT NULL,
  `replyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_checked` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schedule_checked` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_start_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_end_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_ticket_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interested_in_event` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `going_in_event` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_is_online` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_need_approval` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `need_approval` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_host_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_host_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_modal_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_published` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_modals`
--

CREATE TABLE `event_modals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_start_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_end_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_ticket_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_visitors`
--

CREATE TABLE `event_visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_modal_id` int(11) DEFAULT NULL,
  `going_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_setups`
--

CREATE TABLE `home_page_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `homepage_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `userleveler` int(11) NOT NULL,
  `userbeenleveled` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `membership_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `membership_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cell_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nid_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `yearly_income` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `share_rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blah` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_options`
--

CREATE TABLE `menu_options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `show_order` int(11) NOT NULL,
  `ref` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_options`
--

INSERT INTO `menu_options` (`id`, `name`, `link`, `show_order`, `ref`) VALUES
(1, 'User Access', '/UserAccess', 1, 'profile_drop_down'),
(2, 'HelpDesk', '/admin', 3, 'profile_drop_down'),
(3, 'Category Setup', '/CategorySetup', 4, 'profile_drop_down'),
(4, 'Admin Panel', '/admin', 5, 'profile_drop_down'),
(5, 'Edit Product Listing', '/admin', 6, 'profile_drop_down'),
(6, 'Refresh Order', '/admin', 7, 'profile_drop_down'),
(7, 'Query Screen', '/QueryScreen', 2, 'profile_drop_down'),
(8, 'Brand Update', '/brandupdate', 8, 'profile_drop_down'),
(9, 'Accountant', '/accountant', 9, 'profile_drop_down'),
(10, 'Advertisement', '/advertisement', 0, 'profile_drop_down'),
(14, 'Membership admin', '/membership', 0, 'profile_drop_down'),
(15, 'Homepage Setup', '/homepage-setup', 10, 'profile_drop_down'),
(16, 'Training Setup', '/trainsetup', 11, 'profile_drop_down'),
(17, 'Exam Setup', '/examsetup', 12, 'profile_drop_down'),
(18, 'Event Admin', '/events', 13, 'style=\"float:right;margin-right: -124px;'),
(19, 'Blog Admin', '/public-blog', 14, 'profile_drop_down'),
(22, 'SendEmail', '/sendemailforunread', 11, 'profile_drop_down'),
(23, 'Faq Setup', '/faqsetup', 15, 'profile_drop_down');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `RoomId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `readWriteStatus` int(11) NOT NULL,
  `activationStatus` int(11) NOT NULL,
  `UTC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `selftime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_11_191629_create_buyers_table', 1),
(4, '2018_10_11_191646_create_sellers_table', 1),
(5, '2018_10_12_194145_create_articles_table', 1),
(6, '2018_11_07_110554_add_status_column_to_user_table', 1),
(7, '2018_11_08_150306_create_orders_table', 1),
(8, '2018_11_16_221256_create_menu_options_table', 1),
(9, '2018_11_16_221256_create_site_info_table', 1),
(10, '2018_11_16_221256_create_user_menu_table', 1),
(11, '2018_11_17_043724_create_queries_table', 1),
(12, '2018_11_17_091510_add_fields_in_users_table', 1),
(13, '2018_11_22_143254_create_saved_posts_table', 1),
(14, '2018_12_01_104115_add_buyer_saved_status_to_buyers', 1),
(15, '2018_12_01_120751_add_seller_saved_status_to_buyers', 1),
(16, '2018_12_01_124821_add_article_saved_status_to_buyers', 1),
(17, '2018_12_10_201905_change_article_table', 1),
(18, '2018_12_10_202540_change_sellers_table', 1),
(19, '2018_12_12_045327_change_sellers_again_table', 1),
(20, '2018_12_12_045517_change_sellers_again_d_table', 1),
(21, '2018_12_15_083338_create_categories_table', 1),
(22, '2018_12_15_104630_create_balances_table', 1),
(23, '2018_12_15_113749_add_details_to_balances', 1),
(24, '2018_12_15_130629_add_with_to_balances', 1),
(25, '2018_12_15_131535_add_datwise_to_balances', 1),
(26, '2018_12_15_133412_change_nullable_balances_stable', 1),
(27, '2018_12_15_194436_change_nullable_f_balances_table', 1),
(28, '2018_12_23_104046_chatroom', 1),
(29, '2018_12_23_104253_message', 1),
(30, '2018_12_23_134617_create_table_coupon', 1),
(31, '2018_12_31_082958_add_online_status', 1),
(32, '2019_01_05_103903_leveltable', 1),
(33, '2019_01_07_055758_create_professions_table', 1),
(34, '2019_01_10_100052_add_utc_zone_to_user', 1),
(35, '2019_01_10_215839_create_menu_option_seeding_table', 1),
(36, '2019_01_20_123612_updates_menu_option_table', 1),
(37, '2019_01_23_203938_create_home_page_setups', 1),
(38, '2019_01_26_195318_create_memberships_table', 1),
(39, '2019_02_02_125557_create_blog_posts_table', 1),
(40, '2019_02_03_084924_create_event_visitors_table', 1),
(41, '2019_02_05_145812_create_comment_post_table', 1),
(42, '2019_02_09_062719_update_blog_comment_table', 1),
(43, '2019_02_09_075507_create_events_table', 1),
(44, '2019_02_09_075704_create_event_modals_table', 1),
(45, '2019_02_09_130443_advertisement_new_matul', 1),
(46, '2019_02_09_132127_change_to_advertisement_table_matul', 1),
(47, '2019_02_09_135413_create_examination_table', 1),
(48, '2019_02_09_135845_create_faq_table', 1),
(49, '2019_02_09_140119_create_training_table', 1),
(50, '2019_02_09_130443_create__advertisement_new_matul', 2),
(51, '2019_02_16_030943_create_disputes_table', 2),
(52, '2019_02_16_050630_create_replies_table', 2),
(53, '2019_02_16_153805_add_dispute_naker_id_to_disputes', 2),
(54, '2019_02_16_154701_add_replyer_id_to_disputes', 2),
(55, '2019_02_16_155959_add_dispute_no_to_replies', 2),
(56, '2019_02_17_164250_add_event_id_to__event__models', 2),
(57, '2019_02_17_165717_add_event_modal_image_in_events', 2),
(58, '2019_02_17_202030_create_comment_reactions', 2),
(59, '2019_02_20_193608_add_is_published_in_events', 2),
(60, '2019_02_22_062526_add_replyer_id_to_replies', 2),
(61, '2019_02_26_153959_add_buy_colunms_to_blog_posts', 2),
(62, '2019_02_26_185702_add_reactions_to_blog_posts', 2),
(63, '2019_02_27_185918_add_verify', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_order_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(10) UNSIGNED NOT NULL,
  `profession_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `note_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dispute_no` int(11) NOT NULL,
  `replyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_posts`
--

CREATE TABLE `saved_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `seller_status` tinyint(1) DEFAULT NULL,
  `seller_item_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_pro_weight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_org_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_sale_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_pro_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_pro_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `seller_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_info_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_info_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_info_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_commission_percentage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seller_saved_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `attr_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `attr_value` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id`, `attr_name`, `attr_value`) VALUES
(1, 'logo_pic', '1549780726.png'),
(2, 'test_next_to_logo', 'Favicon'),
(3, 'header_left_pic', '1549780726.png'),
(4, 'site_name', '.center'),
(5, 'site_slogan', 'everything I need ...'),
(9, 'form_opacity', '1'),
(6, 'header_right_pic', '1548180905.png'),
(7, 'above_footer_pic', '1549780690.png'),
(8, 'footer_pic', '1548180820.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `IsAdmin` tinyint(1) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_id` text COLLATE utf8_unicode_ci,
  `webcam_image` text COLLATE utf8_unicode_ci,
  `onlineStatus` int(11) DEFAULT NULL,
  `utc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_tokekn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `IsAdmin`, `location`, `phone_no`, `paypal_email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `status`, `photo_id`, `webcam_image`, `onlineStatus`, `utc`, `verify_tokekn`, `verify_status`) VALUES
(2, 'Bakibillah Sakib', 'sakib192@gmail.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$bzWRUgJtWHw1HDrCF/WadOvk5td24f7LoC4VjVez20g2XAFsrDlkS', NULL, NULL, '2018-11-16 12:09:19', '2018-11-16 12:09:19', '1', NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Arefa', 'arefa@hi5.com', '1542355689.jpg', 1, NULL, NULL, NULL, '$2y$10$lv1HoFX7pJzsYxjPEuZn9ubov9UMUZLMZlsGLyafdIALrKDPPk6OC', NULL, 'nHOrkk8k5fIXpRK23z9Mg71ZYVrQ5njFBinUFsa1QkzVPSjE1pod7k93mIm1', '2018-11-16 13:45:36', '2018-11-16 14:08:09', '1', NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Awais', 'awais@cbsurety.com', 'default.png', 1, NULL, NULL, NULL, '$2y$10$5A7Jtkle1JzHNcpkTXyRTupkTaSQF1kSowVI.YXNy.dLRyj0d1VSa', '2018-11-16 12:04:35', NULL, '2018-11-19 02:22:08', '2018-11-19 02:22:08', '1', NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Arefa', 'arefa.akhter.nila@gmail.com', '1549780419.jpg', NULL, NULL, NULL, NULL, '$2y$10$jbFstj1yBMTnEQdnEuavW.eZCXpfKVkxN8EcFoCGiS.QmDiO38ojK', NULL, '5BebzgV5EEJqb8SXQKfQKG9bA9ZSw4KdqbwwTYw5SZEEQsqBIbKg03WZIoKy', '2018-11-19 02:23:45', '2019-02-10 14:34:44', '1', NULL, '1549780484.png', 1, '480', NULL, 0),
(6, 'Muhammad Kashif', 'aa@aa.com', '1544338965.jpg', NULL, NULL, NULL, NULL, '$2y$10$6uVO5vV8cK0prwGcFq4/n.qL1WdWU9WLnPZ58z.EtWoKv9crCcWaC', NULL, '8r6HqN4RPgqdhSikmgTkqgrGupKmJxrPfxnpW7820iUzv4ZJGVxQbMM6r9vY', '2018-11-19 02:29:31', '2019-02-09 01:02:44', '1', NULL, NULL, 1, '-360', NULL, 0),
(41, 'admin', 'admin@hi5.com', '1548357919.jpg', 1, NULL, NULL, NULL, '$2y$10$6uVO5vV8cK0prwGcFq4/n.qL1WdWU9WLnPZ58z.EtWoKv9crCcWaC', '2018-11-16 12:04:35', '78LqpbiGs1nsflgOHoY5lkBR1LeAeehJDy8Cl7FRvWkKsf6sNXGyfHPcfo5z', '2018-11-16 12:04:35', '2019-02-09 01:52:09', '1', '1547977754.jpg', '1548181284.png', 0, '-300', NULL, 0),
(42, 'Ujjal', 'ujjal@hi5.com', '1542771611.JPG', NULL, NULL, NULL, NULL, '$2y$10$f9fqtlj4ISGjqR68dOFj1etBCDwfl2F9uOtaFBUHCZItk9Ipcmgvq', NULL, 'UKPebRGWkqLzYIbJ4qj8EOQoigcy7vk5AD0UZX2kxQ9bT66Adp8Z7yJzlyt7', '2018-11-21 09:36:16', '2018-11-21 09:40:11', '1', NULL, NULL, NULL, NULL, NULL, 0),
(43, 'Hamid Raza', 'badshah.hazor@gmail.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$7EsnPOuhgVf2mwUSzPUvd.CFZ6jPLpnqhoGzYBvU78JzNq2C/9ECu', NULL, 'oyACFEx8fkcGxG6CurjyN13n3BwvwiIVEifqslWteXO7vGc8ZYJ8me4JY1wm', '2018-12-03 01:09:52', '2018-12-03 01:09:52', '1', NULL, NULL, NULL, NULL, NULL, 0),
(44, 'waqas767', 'waqas767@yahoo.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$3aM6H6ZFgW3UUGiLQdPEDOb62vh6IaT9J4BcrqzdQilzAiAyh02x6', NULL, NULL, '2018-12-03 08:59:09', '2018-12-03 08:59:09', '1', NULL, NULL, NULL, NULL, NULL, 0),
(45, 'babar afzal', 'babarmalik6444@gmail.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$AurO88j5fhBTrvxErZaVj.QOmhHoX7Ft.aqVH6.7qGOLJ79TJx6u2', NULL, NULL, '2018-12-04 05:43:09', '2018-12-04 05:43:09', '1', NULL, NULL, NULL, NULL, NULL, 0),
(46, 'Masum Kabir', 'mylearning705@gmail.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$9qGpqlt6drufsZ82Qq/9L.oOjXvGLrfmfLNLnxMrxbYeQK/M9tm.G', NULL, 'jkoSnPhe8AGpLqYHzOfunEkictT90Gm8Fk4ulgKQXiRB3Tiu98vweonYn6MX', '2018-12-04 15:11:04', '2018-12-04 15:11:04', '1', NULL, NULL, NULL, NULL, NULL, 0),
(47, 'ankur', 'ankurmakavana7@gmail.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$E1EH/1KEEO5nZ1FOjE5j4OjlOB/g8SlDR.Ixkp/ELG.ZcruwiyAJ.', NULL, NULL, '2018-12-08 14:51:25', '2018-12-08 14:51:25', '1', NULL, NULL, NULL, NULL, NULL, 0),
(48, 'Bakibillah Sakib', 'developer@sakibian.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$vRsVUn0x448z1YLHR5OfHeV5YhTDSnK5IsdtAKbW1.L0y.RnR3JMS', NULL, NULL, '2018-12-24 17:23:27', '2018-12-24 17:23:27', '1', NULL, NULL, NULL, NULL, NULL, 0),
(49, 'Saleh', 'unmax.systems@gmail.com', 'default.png', NULL, NULL, NULL, NULL, '$2y$10$bvCSMBiK9FkEq/9GkdRQV.srJSKASmnXmHx68KjJ2/HO72SNHf01G', NULL, NULL, '2018-12-31 13:08:13', '2018-12-31 13:08:13', '1', NULL, NULL, NULL, NULL, NULL, 0),
(51, 'Abu Saleh Matul', 'saleh.matul@gmail.com', 'saleh.matul@gmail.com', NULL, 'Dhaka', '0101010', 'a@a.com', '$2y$10$MpOjpvYKdGHhhDxOer/rl.eZkLO4o7SB1YUQ4EcV13sj9nhA9Vc7i', '2019-02-27 18:00:00', NULL, '2019-02-28 13:53:41', '2019-02-28 13:55:12', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_options_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `user_id`, `menu_options_id`) VALUES
(262, 41, 18),
(261, 41, 17),
(260, 41, 16),
(259, 41, 15),
(258, 41, 9),
(257, 41, 8),
(256, 41, 6),
(255, 41, 5),
(330, 5, 19),
(329, 5, 18),
(328, 5, 17),
(327, 5, 22),
(326, 5, 16),
(325, 5, 15),
(324, 5, 9),
(323, 5, 8),
(75, 43, 10),
(76, 43, 1),
(77, 43, 7),
(78, 43, 2),
(79, 43, 3),
(80, 43, 4),
(81, 43, 5),
(82, 43, 6),
(83, 43, 8),
(84, 43, 9),
(254, 41, 4),
(253, 41, 3),
(252, 41, 2),
(251, 41, 7),
(250, 41, 1),
(249, 41, 14),
(248, 41, 10),
(263, 41, 19),
(322, 5, 6),
(321, 5, 5),
(320, 5, 4),
(319, 5, 3),
(318, 5, 2),
(317, 5, 7),
(316, 5, 1),
(315, 5, 14),
(314, 5, 10),
(331, 5, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buyers_buyer_item_code_unique` (`buyer_item_code`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatrooms`
--
ALTER TABLE `chatrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chatrooms_chatroomid_unique` (`chatRoomId`);

--
-- Indexes for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disputes`
--
ALTER TABLE `disputes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_modals`
--
ALTER TABLE `event_modals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_visitors`
--
ALTER TABLE `event_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_setups`
--
ALTER TABLE `home_page_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_options`
--
ALTER TABLE `menu_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_posts`
--
ALTER TABLE `saved_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_seller_item_code_unique` (`seller_item_code`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatrooms`
--
ALTER TABLE `chatrooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_post`
--
ALTER TABLE `comment_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disputes`
--
ALTER TABLE `disputes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_modals`
--
ALTER TABLE `event_modals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_visitors`
--
ALTER TABLE `event_visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_page_setups`
--
ALTER TABLE `home_page_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_options`
--
ALTER TABLE `menu_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_posts`
--
ALTER TABLE `saved_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
