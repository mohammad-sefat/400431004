SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `count` int(20) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;