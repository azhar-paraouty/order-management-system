<?php

// Backend Integration (PHP/SQL) v1

/*
NOTE: IMPLEMENTATIONS ARE NOT HARDCODED ANYMORE (wherever possible)

A. DATABASE CONSIDERATIONS 

Database Design:
- DB name: 'island_bites'
- Tables: 'users', 'products', 'orders', 'order_items'
- users (stores data about the people who use the system):
  - AUTO INC INT u_id (PK)
  - VARCHAR username
  - VARCHAR password (hashed)
  - ENUM user_role IN ('desk', 'kitchen', 'admin')

- products:
  - AUTO INC INT p_id (PK)
  - VARCHAR name
  - DECIMAL price
  - VARCHAR img // Store image filename/path rather than the image itself
  - ENUM category IN ('Burgers', 'Pizzas', 'Noodles', 'Drinks', 'Desserts')

- orders: 
  - AUTO INC INT o_id (PK)
  - ENUM status IN ('pending', 'cooking', 'ready', 'delivered', 'cancelled')
  - DATE/TIME created_at
  - DATE/TIME updated_at

- order_items:
  - AUTO INC INT i_id (PK)
  - INT o_id (FK)
  - INT p_id (FK)
  - INT quantiy
  - ENUM size IN ('small', 'medium', 'large', 'N/A') // Can select ONLY 1
  - VARCHAR addons IN ('cheese', 'pine', 'fries', 'None') // Can select multiple


B. PHP REQUIREMENTS

1. General Requirements (across pages):
- Add Logout Button
- Header Search Functionality
- Filter Button
- Dynamically fetch data from DB and NOT Hardcoded (anymore)
- Enforce Business and Security Rules (wherever possible)

2. login.php (Authentication)
- Users log in and can access respective pages (Authorization)
- Hash user passwords
- At this point, use session_start()
- Use of isset(), to protect random access to web pages.

- Logout at the end of a User Session, using session_destroy (Applicable to ALL pages)

3. admin.php
- Fetch product (cards) from database
- Attach UPDATE/REMOVE button (listeners) to the product cards

- Handle CRUD Operations (update database accordingly):
  - UPDATE: Upon clicking on 'UPDATE', Make selection editable (example: price or category) and click on 'CONFIRM' Button.
  - REMOVE: User gets some sort of pop-up/confirmation message before definitely removing the product.
  - View More Products: Dynamically fetch subsequent rows from the Database, (phpMyAdmin) 5 at a time.
  - Create New Products: Screen to Allow the Admin to enter details about a product.

- Remove 'Top 3 Products' Section.
- View More Products/Create New Products -> Need to be under the Table

4. order_dashboard.php
- Update the Left Panel (Completed Orders) each time an Order is 'Ready'
- Then, Desk Staff can update the Status of a completed order to 'Delivered' of order_status.php 

- Fetch Products directly from Database 
- Display 9 products at a time?
- View More Products: To display subsequent Products from Database

- When 'Confirm Order' is clicked:
  - Create the Order,
  - Store Order Items data,
  - Reset SUMMARY Panel and
  - Send Order Items data to Kitchen Queue Page.

5. kitchen_queue.php
- When 'Confirm Order' is clicked (in Order Dashboard Page), Create a 'Pending Orders' card (with 'COOK' Button)
- Display 3-5 Recent Orders ONLY and Click on 'MORE' to view the rest.

- Clicking on 'COOK' updates the Status of 'Order Status' page from 'Pending' to 'Cooking'
- Clicking on 'READY' updates the Status of 'Order Status' page from 'Cooking' to 'Ready'
- Clicking on 'CLEAR', ONLY possible when the Status of 'Order Status' page is 'Delivered' OR 'Cancelled'
  -> Business Rule is being enforced for the 'CLEAR' Button.

6. order_status.php
- Status can dynamically change:
  - Pending (Desk Staff) -> Cooking (Kitchen Staff) 
  - Cooking (Kitchen Staff) -> Ready (Kitchen Staff)
  - Ready (Kitchen Staff) -> Delivered (Desk Staff)
  - ...when (other) pages update

- Desk Staff can click on 'CANCEL' button anytime during the Order process.
- Desk Staff can ONLY click on 'DELIVER' ONLY if the Status is currently set to 'Ready'
  -> Business Rule is being enforced for the 'DELIVER' Button.

*/

?>