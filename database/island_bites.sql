-- This file shall be used for products setup of the website.
-- Database structure is assumed to be completed.

USE island_bites;

INSERT INTO products (name, price, image, category)
VALUES

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