# PHP-REGISTER
PHP MY ADMIN PROJECT.
Make sure to have the database and the right table. 

CREATE TABLE `users2` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

AUTO INCREMENT ID
INDEX user_id, user_name, password in PHPMyAdmin.
