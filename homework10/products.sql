CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,  -- Added AUTO_INCREMENT
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)  -- Added primary key
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `description`, `created_at`) VALUES
('Kitty Brush', 'to brush away the pain and suffering', '2025-04-01 13:25:41'),
('hamburgur', 'hamburgur', '2025-04-01 13:26:34'),
('diamond pickaxe', 'to mine diamonds', '2025-04-01 13:27:29'),
('bobcoin', 'limited crypto currency', '2025-04-01 13:30:05');
COMMIT;
