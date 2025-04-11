-- Froggie's Delight SQL Dump

-- Database setup
CREATE DATABASE `froggies_delight`;

-- Table creation for frog-related products
CREATE TABLE `frog_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserting sample frog products
INSERT INTO `frog_products` (`name`, `description`) VALUES
('Frog Plushie', 'A cuddly, soft frog plush toy for your collection!'),
('Frog Mug', 'Enjoy your beverages in a frog-themed mug.'),
('Frog Garden Statue', 'A cute frog statue for your garden.'),
('Frog Keychain', 'Carry a frog everywhere with this adorable keychain.'),
('Frog T-shirt', 'Wear your love for frogs on your sleeve with this t-shirt.');

COMMIT;

