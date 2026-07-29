# Version 2 Ideas (Possible Features)

This document shows brainstorming that was done for Version 2 to define Functional and Non-Functional Requirements.

## General Implementations

* Database Re-design:
  - NOT every addons is associated with every product. (Example: Cheese is NOT an add-on to Ice Creams)
  - Proper account creation with password hashing. (Refer to: 'create_users.php' file)
  - Need to catch SQL Exceptions as appropriate.

* Backend Enhancements:
  - AJAX updates the screen, rather than full refresh. (Performance Optimisation)
  - Improved server-side validations, whereever appropriate.
  - Make actual use for '$error_message'. (echo the message)

* UI Improvements:
  - Improved styling and UI. (Example: Use a Darker colour palette)
  - Animation-like interactions. (Example: Smoother Transitions between pages, order status, etc)
  - Better use of screen space.
  - Proper design, supporting small -> big screens.

* Architecture Changes:
  - Refactor codes. (Example: use functions, simpler codes)
  - Follow standard convention for naming variables.
  - Meaningful comments throughout.

* Quality of Life Changes:
  - Pagination is not affected by simultaneous requests. (Example: Can View 5+5 Products, and Update a product at the same time, without resetting the LIMIT to 5)
  - Welcome the Staff. (Example: "*Welcome, Azhar!*")
  - Add some documentation/manual/Quick Guide on the Left Side panels to help Staff navigate the System.
  
* Logout Button should come with Validation. 
  - "*Do you want to Logout?*".
  - Then, "*Thank you, Goodbye!*".

* Search & Filtering: **(NOT IMPLEMENTED IN V1)**
  - Search by Product name.
  - Search by Order ID.
  - Filter by Product category.
  - Filter by Order status.
  - Filter by Order date/time.

---

## Login Page

* AJAX Implementation. (Dynamically check for Username as User types in)

* Log each User attempts to Login. (Username and Time)

* For a correct Username, allow up to 3 attempts.
  - After 3 incorrect tries, prevent subsequent logins.

* Implement 'Contact Admin for credentials'.

---

## Admin Page
* Admin can view each  User logs. (from Login Page)

* Admin can unblock a *Username* that had 3 incorrect Login attempts.

* Admin can manage Staff. (Front Desk and Kitchen accounts)
  - Disable and re-activate accounts.
  - Manage User roles.

* Admin Dashboard:
  - Sales Statistics. (Example: Total Sales made, Popular product/category, etc)

* Admin should be able to REMOVE a Product. (without FK Constraints)

* Products Table:
  - Improve styling, making it visually more appealing.
  - Add a mini stats option, for each individual Products. (Example: Quantity Sold, Total Sales)

* Images should be attached as files and NOT file path, when UPDATING/CREATING/REMOVING Products.

---

## Order Dashboard Page
* Order Items duplication fix:
  - Group same order items together in the Summary Panel.
  - That is, NO 2 exactly same orders should occur twice.
  - Rather, combine them when creating the Order.

* Improved Validation for Order Items creation (Example: Screen Pop-up)

* Customer Name is taken for each Orders. Facilitates checkout experience.

* Products on display:
  - Add additional Products and Categories.
  - Set Initial Products loading Limit to 9 instead. Then +5 each time 'View More'.

* Order Creation:
  - More customisation options for Orders. (Example: Pizza toppings, Sides, etc)
  - Customisation should be appropriate to the Item. (Example: Fries is NOT an 'Add-on' for Pizza)
  - Reset Order data when selecting a different product.

* Display only recent orders (status = 'ready') in the Left side panel to avoid congestion.

* AJAX Implementation:
  - Dynamically retrieve Products from DB.
  - Send Order Items data, using AJAX instead of URL.

---

## Order Status Page
* Integrate 'DELIVER' and 'CANCEL' Buttons within the Order Cards
  ```
  Order #301
  Cheese Burger x1
  Total Price: Rs 200
  Status: Pending
  -------------------
  DELIVER  |  CANCEL
  ```

* Improved Validation when Delivering orders, where status != 'ready' (Example: Screen Pop-up)

* Re-arrange Order Item cards to make more efficient use of screen space.

* Group Orders based on their Status. (Or use Filtering option)

* AJAX Implementation:
  - Real-time updates of Orders on screen.
  - Send Order Items data, using AJAX instead of URL.

---

## Kitchen Queue Page
* 'Add-ons' need to be displayed clearly. (Currently an array)

* Need to improve the Business Rule about CLAERING an Order. (Validation)

* AJAX Implementation:
  - Real-time updates of Orders on screen.
  - Send Order Items data, using AJAX instead of URL.