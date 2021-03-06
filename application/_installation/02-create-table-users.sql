CREATE TABLE IF NOT EXISTS `login`.`users` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
 `session_id` varchar(48) DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
 `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
 `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
 `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
 `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
 `user_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
 `user_account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'user''s account type (basic, premium, etc)',
 `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
 `user_remember_me_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
 `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
 `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
 `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
 `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
 `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
 `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
 `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
 `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
 `user_provider_type` text COLLATE utf8_unicode_ci,
 `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'First Name',
 `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Last Name',
 `user_street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Street Address',
 `user_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'City',
 `user_state` char(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'State two letter',
 `user_zip` char(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'zip code',
 `mobile_phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mobile Phone',
 `home_phone` varchar(22) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Home Phone',
 `full_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Full Name',
 `user_fb` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Facebook',
 `user_twitter` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Twitter',
 `user_github` varchar(22) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Github',
 `user_gp` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Google Plus',
 `work_phone` varchar(22) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Work Phone',
 PRIMARY KEY (`user_id`),
 UNIQUE KEY `user_name` (`user_name`),
 UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

INSERT INTO `login`.`users` (`user_id`, `session_id`, `user_name`, `user_password_hash`, `user_email`, `user_active`, `user_deleted`, `user_account_type`, `user_has_avatar`, `user_remember_me_token`, `user_creation_timestamp`, `user_suspension_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`, `first_name`, `last_name`, `user_street`, `user_city`, `user_state`, `user_zip`, `mobile_phone`, `home_phone`, `full_name`, `user_fb`, `user_twitter`, `user_github`, `user_gp`, `work_phone`) VALUES
(1, NULL, 'bendev30', '$2y$10$bjYJMjJLFVNUDRWVL4KPBO5GKfDPNOG506O5xbTk7DgJJJ2wG6Q3W', 'collins.drums@gmail.com', 1, 0, 7, 0, NULL, 1442712218, NULL, 1448394126, 0, NULL, NULL, NULL, NULL, 'DEFAULT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'demo2', '$2y$10$OvprunjvKOOhM1h9bzMPs.vuwGIsOqZbw88rzSyGCTJTcE61g5WXi', 'demo2@demo.com', 1, 0, 1, 0, NULL, 1422205178, NULL, 1422209189, 0, NULL, NULL, NULL, NULL, 'DEFAULT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

