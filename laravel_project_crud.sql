-- -- phpMyAdmin SQL Dump
-- -- version 5.1.1
-- -- https://www.phpmyadmin.net/
-- --
-- -- Host: 127.0.0.1
-- -- Generation Time: Jul 04, 2022 at 07:02 AM
-- -- Server version: 10.4.22-MariaDB
-- -- PHP Version: 8.1.2

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- --
-- -- Database: `laravel_project_crud`
-- --

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `comments`
-- --

-- CREATE TABLE `comments` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` int(10) UNSIGNED NOT NULL,
--   `post_id` int(10) UNSIGNED NOT NULL,
--   `parent_id` int(10) UNSIGNED DEFAULT NULL,
--   `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `comments`
-- --

-- INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `body`, `created_at`, `updated_at`) VALUES
-- (1, 3, 23, NULL, 'fevge', '2022-06-03 04:45:01', '2022-06-03 04:45:01'),
-- (2, 3, 23, NULL, 'good blog', '2022-06-03 04:45:37', '2022-06-03 04:45:37'),
-- (3, 3, 23, 2, 'thank u', '2022-06-03 04:45:45', '2022-06-03 04:45:45'),
-- (4, 3, 21, NULL, 'really nice post', '2022-06-03 04:47:57', '2022-06-03 04:47:57'),
-- (5, 3, 21, 4, 'thank u', '2022-06-03 04:48:04', '2022-06-03 04:48:04'),
-- (6, 3, 20, NULL, 'good...', '2022-06-06 01:15:02', '2022-06-06 01:15:02'),
-- (7, 3, 20, 6, 'thank u', '2022-06-06 01:15:15', '2022-06-06 01:15:15');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `failed_jobs`
-- --

-- CREATE TABLE `failed_jobs` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
--   `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
--   `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `like_dislikes`
-- --

-- CREATE TABLE `like_dislikes` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `post_id` int(11) NOT NULL,
--   `like` smallint(6) NOT NULL DEFAULT 0,
--   `dislike` smallint(6) NOT NULL DEFAULT 0,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `migrations`
-- --

-- CREATE TABLE `migrations` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `batch` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `migrations`
-- --

-- INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
-- (6, '2014_10_12_000000_create_users_table', 1),
-- (7, '2014_10_12_100000_create_password_resets_table', 1),
-- (8, '2019_08_19_000000_create_failed_jobs_table', 1),
-- (9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
-- (11, '2022_06_02_110137_create_posts_table', 2),
-- (13, '2022_06_03_095413_create_comments_table', 3),
-- (14, '2022_06_03_104802_create_like_dislikes_table', 4),
-- (15, '2022_06_07_101120_add_role_as_to_users_table', 5);

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `password_resets`
-- --

-- CREATE TABLE `password_resets` (
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `password_resets`
-- --

-- INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
-- ('janvi@gmail.com', '$2y$10$1M2EIp2V9mJXvwzD2WVOYejl8EpeAnUTOgBVo1QsXyJMMt4t/PaHq', '2022-05-17 01:06:19'),
-- ('henil.astech@gmail.com', '$2y$10$kFhxwNWp.wR6LpOs0553te64Cci2smzTEL9inx7DEWDsoWLLM2YTy', '2022-05-18 05:49:03');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `personal_access_tokens`
-- --

-- CREATE TABLE `personal_access_tokens` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `tokenable_id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `last_used_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `posts`
-- --

-- CREATE TABLE `posts` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `posts`
-- --

-- INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
-- (15, 4, 'Voluptas saepe dolor qui harum ut.', 'Blanditiis nulla illum sed omnis. Et est repellat ut. Molestias deserunt dolores error ut. Numquam quis sed voluptatibus iste nulla est sunt. Exercitationem voluptate qui optio. Veritatis culpa in adipisci dolorum inventore rem dolor eaque. Magnam qui accusamus odio beatae eligendi aspernatur. Fugit ducimus et dolores est labore eligendi excepturi. Sint sapiente perspiciatis velit qui repellendus eum aliquam. Ipsum quaerat aliquam voluptatem laudantium. Omnis in repudiandae iste sequi.', 'image/post/1734595373566068.jpg', '2022-06-03 01:20:57', '2022-06-03 02:05:21'),
-- (18, 3, 'Laborum architecto eligendi porro.', 'Quis in et voluptate vel. Perferendis ut omnis aut illum dolorum. Mollitia beatae et non. Officia ea minima alias deleniti aspernatur dolor sint. Reiciendis quisquam modi quis ab sed quam. Consequuntur eligendi molestias facere aut dolorem veniam laudantium quasi. Nemo voluptatum ut et deserunt autem. Dolor eum nam rerum excepturi velit impedit. Laudantium itaque suscipit voluptates sed repellendus eum sapiente.', 'image/post/1734598002711060.jpeg', '2022-06-03 02:02:44', '2022-06-03 02:02:44'),
-- (19, 4, 'Repudiandae quaerat veritatis quod dolor.', 'Et tenetur est sed quam voluptas consequatur. Corrupti nobis tenetur ut esse quibusdam omnis. Ut laborum quis architecto. Neque et consequuntur iusto dolorum recusandae neque. Reprehenderit aut vel rem illum non dolorem. Dicta et provident rerum sequi molestiae ad magni perferendis. Recusandae molestiae aut sit iusto. Saepe expedita reprehenderit porro ullam. Suscipit recusandae omnis culpa quae odio placeat. Ad voluptatibus in aut. Nostrum nisi omnis ducimus. Eum aut quibusdam perferendis non et nisi. Placeat quia necessitatibus quo ea id minus eum. Quasi dolor nostrum eum placeat repellendus inventore et qui.', 'image/post/1734598065328884.jpeg', '2022-06-03 02:03:44', '2022-06-03 02:03:44'),
-- (20, 3, 'Molestias reprehenderit voluptas adipisci et et.', 'Itaque autem sint sed aut. Aut necessitatibus quaerat occaecati eaque. Sunt alias ut tempora. Nulla facere ut impedit eum. Qui qui repellendus modi non atque. Numquam pariatur esse delectus sed asperiores. Aliquid rerum vel consequatur rerum ut placeat. Omnis debitis id velit necessitatibus. Vitae et recusandae placeat ab et. Ducimus neque dolorem repudiandae molestiae et reiciendis expedita. Quis dolorum atque quas natus facilis rem. Sed facere excepturi sapiente illo. Repellat deserunt sint odio amet. Asperiores ut et quibusdam rerum odio quidem.', 'image/post/1734598111702219.jpeg', '2022-06-03 02:04:28', '2022-06-03 02:04:28'),
-- (21, 3, 'Velit odio qui eligendi odit sit accusantium.', 'Sit reprehenderit vitae autem aut. Est nobis et quas sed perferendis facere. Et placeat repellat ipsa at minus. Repellat laboriosam est officiis. Rerum et molestias corporis nam culpa. Ut dolor nisi voluptatem eius exercitationem facilis. Iusto pariatur quae et qui eum veritatis odio. Voluptatem illum facere rerum nobis omnis et sint ipsum. Iure nemo qui sunt similique. Magni aliquid magni ut exercitationem autem voluptas nulla. Dolores debitis aut voluptatem magni reiciendis laborum deleniti. Quis aspernatur eos consequatur illo saepe voluptatem vel id. Est quos necessitatibus illo et asperiores accusamus. Vel minus numquam similique quidem dolores nulla dolor impedit. Quis praesentium necessitatibus officiis sint.', 'image/post/1734598226431422.jpg', '2022-06-03 02:06:17', '2022-06-03 02:06:17'),
-- (22, 4, 'Sed quo ea sequi.', 'Dignissimos dolorem cum consequuntur quidem et dolorem voluptatem. Officiis voluptates molestias pariatur quod. Id a ipsam voluptatem asperiores quisquam ullam. Tempore dicta voluptatem esse. Consequatur quo unde vel at quibusdam. Omnis est et cumque nisi est et. Fugit fuga aut placeat illo recusandae ut temporibus. Doloribus qui et quae voluptas eum. Ducimus eos blanditiis nostrum est quidem aut. Pariatur dolorem itaque qui autem.', 'image/post/1734598273912804.jpg', '2022-06-03 02:07:03', '2022-06-03 02:07:03'),
-- (23, 3, 'Est quasi corrupti dolorem et rerum et mollitia.', 'Voluptatem et harum qui. Enim itaque quo eum alias expedita. Minus quidem rerum et quam vel vel. Voluptatem soluta consectetur aut reprehenderit mollitia. Porro non saepe consectetur soluta. Labore eaque rerum doloribus. Aut fuga culpa odit.', 'image/post/1734598301558775.jpg', '2022-06-03 02:07:29', '2022-06-03 02:07:29');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `users`
-- --

-- CREATE TABLE `users` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email_verified_at` timestamp NULL DEFAULT NULL,
--   `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `role_as` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `users`
-- --

-- INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
-- (3, 'Janvi Joshi', 'janvi.astech@gmail.com', NULL, '$2y$10$tTGR7LT8cst44fzUBlUu3.itXw6fb5SiUdElOgI.3G5ppcMy2yS0O', 'G7Z4HxjrdFVag7YKpFWnvwhKxrxnsI7DpINZgmxmPjU0XzVTWoEFx9DgmCt9', '2022-06-02 06:05:12', '2022-06-09 05:34:38', 1),
-- (4, 'henil', 'henil.astech@gmail.com', NULL, '$2y$10$g8kyg0JQ5zoeKAuxi3OneueVAQE9h.8mWL4w7pqvyKVbrg7dd9Umm', NULL, '2022-06-03 05:40:07', '2022-06-03 05:40:07', 0);

-- --
-- -- Indexes for dumped tables
-- --

-- --
-- -- Indexes for table `comments`
-- --
-- ALTER TABLE `comments`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `failed_jobs`
-- --
-- ALTER TABLE `failed_jobs`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

-- --
-- -- Indexes for table `like_dislikes`
-- --
-- ALTER TABLE `like_dislikes`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `migrations`
-- --
-- ALTER TABLE `migrations`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `password_resets`
-- --
-- ALTER TABLE `password_resets`
--   ADD KEY `password_resets_email_index` (`email`);

-- --
-- -- Indexes for table `personal_access_tokens`
-- --
-- ALTER TABLE `personal_access_tokens`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
--   ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

-- --
-- -- Indexes for table `posts`
-- --
-- ALTER TABLE `posts`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `posts_user_id_foreign` (`user_id`);

-- --
-- -- Indexes for table `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `users_email_unique` (`email`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `comments`
-- --
-- ALTER TABLE `comments`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- --
-- -- AUTO_INCREMENT for table `failed_jobs`
-- --
-- ALTER TABLE `failed_jobs`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `like_dislikes`
-- --
-- ALTER TABLE `like_dislikes`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `migrations`
-- --
-- ALTER TABLE `migrations`
--   MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

-- --
-- -- AUTO_INCREMENT for table `personal_access_tokens`
-- --
-- ALTER TABLE `personal_access_tokens`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `posts`
-- --
-- ALTER TABLE `posts`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

-- --
-- -- AUTO_INCREMENT for table `users`
-- --
-- ALTER TABLE `users`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- --
-- -- Constraints for dumped tables
-- --

-- --
-- -- Constraints for table `posts`
-- --
-- ALTER TABLE `posts`
--   ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
