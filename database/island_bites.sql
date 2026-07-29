-- ------------------------------------------------------------------------------------

-- ---------------------------
-- DATABASE: `island_bites` --
-- ---------------------------

CREATE DATABASE IF NOT EXISTS `island_bites`;

USE `island_bites`;

-- ------------------------------------------------------------------------------------

-- -----------------------------
-- CREATE TABLE AND STRUCTURE --
-- -----------------------------

-- Table: `products`

CREATE TABLE `products` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL UNIQUE,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` enum('Burgers','Pizzas','Noodles','Drinks','Desserts') NOT NULL,

  PRIMARY KEY (`p_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ------------------------------------------------------------------------------------

-- Table: `users`

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `user_role` enum('desk','kitchen','admin') NOT NULL,

  PRIMARY KEY (`u_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ------------------------------------------------------------------------------------

-- Table: `orders`

CREATE TABLE `orders` (
  `o_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` enum('pending','cooking','ready','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),

  PRIMARY KEY (`o_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ------------------------------------------------------------------------------------

-- Table: `order_items`

CREATE TABLE `order_items` (
    `i_id` INT(10) NOT NULL AUTO_INCREMENT,
    `o_id` INT(11) NOT NULL,
    `p_id` INT(11) NOT NULL,
    `quantity` INT(11) NOT NULL,
    `size` ENUM('Small','Medium','Large','N/A') NOT NULL,
    `addons` VARCHAR(255) NOT NULL,

    PRIMARY KEY (`i_id`),

    KEY (`o_id`),
    KEY (`p_id`),

    CONSTRAINT `fk_order`
        FOREIGN KEY (`o_id`) REFERENCES `orders`(`o_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT `fk_product`
        FOREIGN KEY (`p_id`) REFERENCES `products`(`p_id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ------------------------------------------------------------------------------------

-- --------------------------------------
-- INSERT INITIAL DATA INTO THE TABLES --
-- --------------------------------------

-- Initial Data: `products`

INSERT INTO `products` (`name`, `price`, `image`, `category`) VALUES

-- BURGERS
('Cheese Burger', 200.00, 'cheese_burger.jpg', 'Burgers'),
('Chicken Burger', 225.00, 'chicken_burger.jpg', 'Burgers'),
('Beef Burger', 250.00, 'beef_burger.jpg', 'Burgers'),

-- PIZZAS
('Chicken Pizza', 400.00, 'chicken_pizza.jpg', 'Pizzas'),
('Salmon Pizza', 450.00, 'salmon_pizza.jpg', 'Pizzas'),
('Vegetarian Pizza', 350.00, 'vegetarian_pizza.jpg', 'Pizzas'),

-- NOODLES
('Chicken Noodles', 180.00, 'chicken_noodles.jpg', 'Noodles'),
('Instant Noodles', 150.00, 'instant_noodles.jpg', 'Noodles'),
('Veg Noodles', 125.00, 'veg_noodles.jpg', 'Noodles'),

-- DRINKS
('Cola', 60.00, 'cola.jpg', 'Drinks'),
('Mojito', 140.00, 'mojito.jpg', 'Drinks'),
('Orange Juice', 50.00, 'orange_juice.jpg', 'Drinks'),

-- DESSERTS
('Chocolate Cake', 150.00, 'chocolate_cake.jpg', 'Desserts'),
('Vanilla Ice Cream', 120.00, 'vanilla_ice_cream.jpg', 'Desserts'),
('Fruit Salad', 140.00, 'fruit_salad.jpg', 'Desserts');

-- ------------------------------------------------------------------------------------

-- Initial Data: `users`

INSERT INTO `users` (`username`, `password`, `user_role`) VALUES
('Admin', '$2y$10$K2MecImFEJM99vKQ0hKtP./FQww.Xt92zM432qJ0T/EF8MDoA18B6', 'admin'),
('John', '$2y$10$OcQ0JwQy2JQzkgQYfNeT9.pHASPOC9joBMcopazngWv6JkdCk0B6O', 'desk'),
('Jane', '$2y$10$1lgyJsv8f4zUTt/QWGKdOeWBr/n3j7e4LLS0MKdwiXjqS5QSUmyuK', 'kitchen');

-- ------------------------------------------------------------------------------------

COMMIT;