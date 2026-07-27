# 📘 **ISLAND BITES DOCUMENTATION**

This document aims to introduce meaningful Software Project Documentation for the project.

| Section | Description |
|---------|-------------|
| **[1. Project Overview](#1-project-overview)** | Introduces the project objectives, technology stack and the overall restaurant workflow. |
| **[2. Version 1 Requirements](#2-version-1-requirements-stable)** | Documents the completed functional and non-functional requirements implemented in Version 1. |
| **[3. Version 2 Requirements](#3-version-2-requirements-current)** | Lists the planned functional and non-functional requirements currently targeted for Version 2. |
| **[4. Design Decisions](#4-design-decisions)** | Explains the key architectural and design decisions made throughout the project. |
| **[5. Development Log](#5-development-log)** | Presents a chronological timeline of project milestones, major implementations and development progress. |
| **[6. Future Works](#-6-future-works)** | Outlines potential long-term enhancements and future directions beyond the current project scope. |

---

# 1. PROJECT OVERVIEW

**Objective**: To develop a Full-Stack `Restaurant Order Management System` that demonstrates complete operational workflow. 

**Technology Stack**:

* HTML
* CSS
* JavaScript
* PHP
* MySQL

**Typical Workflow**:

* Customer comes in, and places an Order.
* Desk Staff logs into his/her Account, and takes the Order.
* Kitchen Staff logs into his/her Account, and updates Status of the Order.
* Desk Staff can view the Status of the Order.
* When Order `Ready`, deliver to Customer.

> Status: Pending ▶️ Cooking ▶️ Ready ▶️ Delivered _(or Cancelled)_

---

# 2. VERSION 1 REQUIREMENTS (Stable)

### 2.1 Functional Requirements

| ID / Requirement                 | Description                                                                     | Status  |
| -------------------------------- | ------------------------------------------------------------------------------- | :-----: |
| **FR 1.0 Authentication**        | The System should authenticate Staff before granting access to protected pages. |    ✅   |
| FR 1.1 Login                     | The System should allow authorised Staff to log into the System.                |    ✅   |
| FR 1.2 Protected Pages           | The System should restrict access based on Staff roles.                         |    ✅   |
| FR 1.3 Logout                    | The System should allow authenticated Users to safely log out.                  |    ✅   |
| **FR 2.0 Product Management**    | The System should allow the Admin to manage Products.                           |    ✅   |
| FR 2.1 View Products             | The System should display Products retrieved from the database.                 |    ✅   |
| FR 2.2 Create Products           | The System should allow the Admin to create new Products.                       |    ✅   |
| FR 2.3 Update Products           | The System should allow the Admin to modify existing Products.                  |    ✅   |
| FR 2.4 Delete Products           | The System should allow the Admin to remove Products.                           |    ✅   |
| FR 2.5 Product Pagination        | The System should progressively display additional Products when requested.     |    ✅   |
| **FR 3.0 Order Creation**        | The System should allow Desk Staff to create Customer Orders.                   |    ✅   |
| FR 3.1 Product Selection         | The System should allow Products to be selected for an Order.                   |    ✅   |
| FR 3.2 Item Customisation        | The System should allow Product quantities, sizes and add-ons to be selected.   |    ✅   |
| FR 3.3 Order Summary             | The System should display an Order Summary before confirmation.                 |    ✅   |
| FR 3.4 Total Calculation         | The System should calculate the total price of an Order.                        |    ✅   |
| FR 3.5 Confirm Order             | The System should create an Order and store its Order Items.                    |    ✅   |
| **FR 4.0 Kitchen Queue**         | The System should support Kitchen processing of Orders.                         |    ✅   |
| FR 4.1 Pending Orders            | The System should display newly created Orders in the Pending Queue.            |    ✅   |
| FR 4.2 Cooking Orders            | The System should allow Kitchen Staff to mark Orders as Cooking.                |    ✅   |
| FR 4.3 Ready Orders              | The System should allow Kitchen Staff to mark Orders as Ready.                  |    ✅   |
| FR 4.4 Clear Orders              | The System should allow completed Orders to be cleared from the Kitchen Queue.  |    ✅   |
| FR 4.5 Order Pagination          | The System should progressively display additional Orders when requested.       |    ✅   |
| **FR 5.0 Order Status Tracking** | The System should track the progress of every Order.                            |    ✅   |
| FR 5.1 View Status               | The System should display the current Status of each Order.                     |    ✅   |
| FR 5.2 Deliver Orders            | The System should allow Ready Orders to be delivered.                           |    ✅   |
| FR 5.3 Cancel Orders             | The System should allow Orders to be cancelled when appropriate.                |    ✅   |
| FR 5.4 Status Synchronisation    | The System should synchronise Order Status across all Staff pages.              |    ✅   |
| **FR 6.0 Business Rules**        | The System should enforce valid Order state transitions.                        |    ✅   |
| FR 6.1 Valid Transitions         | The System should only allow valid Status changes throughout the workflow.      |    ✅   |
| FR 6.2 Valid Orders              | The System should only allow valid Order Creation.                              |    ✅   |

### 2.2 Non-Functional Requirements

| ID / Requirement               | Description                                                                       | Status  |
| ------------------------------ | --------------------------------------------------------------------------------- | :-----: |
| **NFR 1.0 Usability**          | The System shall provide an intuitive interface for Restaurant Staff.             |    ✅   |
| NFR 1.1 Consistent Layout      | The System shall maintain a consistent layout across all pages.                   |    ✅   |
| NFR 1.2 Simple Navigation      | The System shall minimise the number of steps required to complete routine tasks. |    ✅   |
| **NFR 2.0 Security**           | The System shall protect Staff accounts and restricted pages.                     |    ✅   |
| NFR 2.1 Password Protection    | The System shall securely store User passwords.                                   |    ✅   |
| NFR 2.2 Session Management     | The System shall maintain authenticated User sessions.                            |    ✅   |
| **NFR 3.0 Reliability**        | The System shall preserve Order information within the database.                  |    ✅   |
| NFR 3.1 Persistent Storage     | The System shall store Products and Orders persistently.                          |    ✅   |
| NFR 3.2 Data Integrity         | The System shall maintain consistent Order information across pages.              |    ✅   |
| **NFR 4.0 Maintainability**    | The System shall remain organised and easy to maintain.                           |    ✅   |
| NFR 4.1 Modular Structure      | The System shall separate files according to their responsibilities.              |    ✅   |
| NFR 4.2 Database Configuration | The System shall centralise database connection settings.                         |    ✅   |

---

# 3. VERSION 2 REQUIREMENTS (Current)

### 3.1 Functional Requirements

| ID / Requirement                           | Description                                                                     | Status  |
| ------------------------------------------ | ------------------------------------------------------------------------------- | :-----: |
| **FR 1.0 Authentication Improvements**     | The System should improve authentication and account management.                |    ⌛   |
| FR 1.1 Login Attempts                      | The System should limit unsuccessful login attempts.                            |    ⌛   |
| FR 1.2 Login Audit                         | The System should record User login attempts.                                   |    ⌛   |
| FR 1.3 Username Validation                 | The System should validate Usernames dynamically during login.                  |    ⌛   |
| FR 1.4 Staff Management                    | The System should allow the Admin to manage Staff accounts and roles.           |    ⌛   |
| **FR 2.0 Product Management Improvements** | The System should improve Product administration.                               |    ⌛   |
| FR 2.1 Product Search                      | The System should allow Products to be searched by name.                        |    ⌛   |
| FR 2.2 Product Filtering                   | The System should allow Products to be filtered by Category.                    |    ⌛   |
| FR 2.3 Product Statistics                  | The System should display statistics for individual Products and Orders.        |    ⌛   |
| FR 2.4 Image Uploads                       | The System should support Product image uploads instead of file paths.          |    ⌛   |
| **FR 3.0 Order Dashboard Improvements**    | The System should improve the Order creation process.                           |    ⌛   |
| FR 3.1 Customer Information                | The System should record the Customer's name for each Order.                    |    ⌛   |
| FR 3.2 Order Validation                    | The System should improve Order validation before confirmation.                 |    ⌛   |
| FR 3.3 Duplicate Prevention                | The System should combine identical Order Items into a single entry.            |    ⌛   |
| FR 3.4 Product Customisation               | The System should provide Product-specific customisation options.               |    ⌛   |
| FR 3.5 Recent Orders                       | The System should display only recent completed Orders in the sidebar.          |    ⌛   |
| **FR 4.0 Order Tracking Improvements**     | The System should improve Order monitoring across Staff pages.                  |    ⌛   |
| FR 4.1 Order Search                        | The System should allow Orders to be searched by Order ID.                      |    ⌛   |
| FR 4.2 Order Filtering                     | The System should allow Orders to be filtered by Status and Date.               |    ⌛   |
| FR 4.3 Improved Delivery Validation        | The System should prevent invalid delivery actions through improved validation. |    ⌛   |
| FR 4.4 Kitchen Validation                  | The System should improve validation before clearing completed Orders.          |    ⌛   |
| **FR 5.0 System Enhancements**             | The System should improve usability and overall workflow.                       |    ⌛   |
| FR 5.1 Welcome Messages                    | The System should personalise the interface using the logged-in User's name.    |    ⌛   |
| FR 5.2 Logout Confirmation                 | The System should request confirmation before logging out.                      |    ⌛   |
| FR 5.3 Staff Guidance                      | The System should provide built-in guidance for Staff members.                  |    ⌛   |

### 3.2 Non-Functional Requirements

| ID / Requirement               | Description                                                                             | Status  |
| ------------------------------ | --------------------------------------------------------------------------------------- | :-----: |
| **NFR 1.0 Performance**        | The System should improve responsiveness during normal operation.                       |    ⌛   |
| NFR 1.1 Asynchronous Updates   | The System should update page contents without requiring full page refreshes.           |    ⌛   |
| NFR 1.2 Pagination Stability   | The System should maintain pagination state during simultaneous actions.                |    ⌛   |
| **NFR 2.0 Security**           | The System should strengthen application security.                                      |    ⌛   |
| NFR 2.1 Server-side Validation | The System should validate incoming data on the server before processing requests.      |    ⌛   |
| NFR 2.2 Exception Handling     | The System should handle database exceptions gracefully.                                |    ⌛   |
| **NFR 3.0 Usability**          | The System should improve the overall User experience.                                  |    ⌛   |
| NFR 3.1 Responsive Design      | The System should support different screen sizes.                                       |    ⌛   |
| NFR 3.2 Interface Improvements | The System should provide a cleaner and more consistent interface.                      |    ⌛   |
| NFR 3.3 Animations             | The System should provide smoother visual transitions and interactions.                 |    ⌛   |
| **NFR 4.0 Maintainability**    | The System should remain easy to maintain and extend.                                   |    ⌛   |
| NFR 4.1 Refactoring            | The System should simplify existing code where appropriate.                             |    ⌛   |
| NFR 4.2 Naming Standards       | The System should follow consistent naming conventions throughout the codebase.         |    ⌛   |
| NFR 4.3 Documentation          | The System should contain meaningful comments and internal documentation.               |    ⌛   |
| NFR 4.4 Database Design        | The System should improve the database structure to better model Product customisation. |    ⌛   |

---

# 4. DESIGN DECISIONS

This Section consists of important design decisions and architectural choices.

## Internal Staff System

Decision:
- Build an internal restaurant operations system rather than a customer ordering platform.

Reason:
- The project focuses on workflow management and operational efficiency.

## Login Only Authentication

Decision:
- Users can login but cannot register.

Reason:
- The restaurant is assumed to be a small business where accounts are managed directly by the owner (Admin).

## Separate Kitchen Queue and Order Status

Decision:
- Keep both pages separate.

Reason:
- Different staff roles perform different tasks.

Kitchen Staff:

* Process orders
* Update Order status
* Status: Pending ▶️ Cooking ▶️ Ready

Front Desk Staff:

* Monitor order progress
* Deliver orders
* Cancel orders
* Status: Ready ▶️ Delivered _(or Cancelled)_

## Frontend First Approach

Decision:
- Build frontend before backend.

Reason:
- Validate workflows, layout, navigation and usability before introducing PHP and MySQL.

## JavaScript Before Backend

Decision:
- Complete frontend interactions before implementing persistent storage.

Reason:
- Allowed the project workflow to be validated before introducing server-side technologies.

## Backend Integration Strategy

Decision:
- Introduce PHP and MySQL together rather than exploiting each technology in isolation.

Reason:
- The objective is to build a realistic full-stack workflow where PHP interacts directly with the database.

## Phased Implementation

Decision:
- Developing the application across multiple Versions.

Reason:
- This helps to prevent scope creep and refine the project as required.

---

# 5. DEVELOPMENT LOG

This section tracks the evolution of the `Island Bites` project. It presents the completed milestones in a _timeline_ format.

## **30/05/2026** - Project Created

### Initial Objectives:

* Practice structured system development
* Improve requirements analysis skills
* Improve frontend development skills
* Learn backend integration later
* Follow a realistic project workflow

> Created GitHub repository for the Island Bites Order Management System.

## **01/06/2026** - Business Requirements & System Analysis

### Completed:

* Business Overview
* User Roles & Responsibilities
* Functional Requirements
* Non-Functional Requirements
* Workflow Analysis
* State Definitions
* Navigation Planning

> The project scope was defined as a small restaurant order management system focused on improving communication between front desk staff and kitchen staff.

## **02/06/2026** - Initial Wireframes

### Created wireframes for:

* Login Page
* Product Management Page
* Kitchen Queue Page
* Order Dashboard Page
* Order Status Page

> Translate business requirements into visual screens before beginning frontend development.

## **10/06/2026** - HTML/CSS Frontend Structure

### Static Pages Completed:

* Login Page
* Product Management Page
* Kitchen Queue Page
* Order Dashboard Page
* Order Status Page

### CSS Layout Implemented:

* Page layouts
* Navigation sections
* Product cards
* Order cards
* Summary panels
* Buttons
* Search bars
* Dashboard sections

*The project now has a complete static frontend prototype, based on approved wireframes.*

> Users can visually navigate the system and understand the intended workflow. No business logic or data persistence has been implemented yet.

## **26/06/2026** - JavaScript Frontend Prototype

### Completed:
* Product selection
* Quantity controls
* Order Summary management
* Dynamic Total calculation
* Fake order creation
* Kitchen queue state transitions
* Order status updates
* Frontend-only state management

*Implemented the initial frontend behaviour using JavaScript.*

> The application now simulates the complete restaurant workflow using frontend technologies only. All data remains temporary and hardcoded, providing a foundation for backend integration.

## **08/07/2026** - Begin with inital PHP structure

### Completed:
* User Authentication for Usernames and Passwords.
* Use of password hashing to make password unreadable.
* Established succesful connection with the Maria Database.
* Logout Button was added for all major web pages.

*Focus was on Authentication and Login page.*

> Users now have to enter the appropriate credentials to access a protected page. The system retain the User's info for for a particular session.

## **16/07/2026** - CRUD Operations for Admin Page

### Completed:
* Added Initial Product data (using /island_bites.sql), with their respective images
* Show 5 Additional products on screen when clicking on 'View More Products'.
* Delete a product (from database) when 'REMOVE' Button is clicked. 
* Display a Product Entry or Modification form respectively, when:
  'Create New Products' or 'UPDATE' Buttons are clicked.
* Simplified the Database Setup (using /configurations.php)

> The Admin can now Create, Update, Delete and View More Products, all from a User Friendly UI. This allows for seperation of duties between Page Admin and Database Administrator.

## **22/07/2026** - Create Orders for Items in Order Dashboard Page

### Completed:
* Fetch Products directly from Database.
* Display 5 products at a time.
* View More Products Button: To display subsequent Products from Database.
* When 'Confirm Order' is clicked: Create the Order and Store Order Items data in Database.
* Upated Left Panel to reflect 'Completed Orders' ready to be delivered.

> The Desk Staff can now Create Orders for the Customer based on available Products. When the Order is 'Ready', the Staff can see it from the Left Panel.

## **25/07/2026** - Processing Order Cards in Kitchen Queue Page

### Completed:
* Fetch Orders directly from Database, right when they are created (pending state). 
* For each order, display the time it was updated/created and Order Items.
* Display 3 orders at a time, and increment by 3 each time.
* More Orders Button: To display subsequent Orders from Database. Modified to function like a Button instead.
* Clicking on 'COOK' updates the Order state from 'Pending' to 'Cooking'
* Clicking on 'READY' updates the Order state from 'Cooking' to 'Ready'
* Clicking on 'CLEAR', ONLY possible when the Status of the Order Status is 'Delivered' OR 'Cancelled'

> The Kitchen Staff can now clearly see each Order, and its current status. This ensures that Orders having priority are cooked and prepared first.

## **26/07/2026** - Controlling the States of each Order in Order Status Page

### Completed:
* Status dynamically updates:
  - Pending (Desk Staff) -> Cooking (Kitchen Staff) 
  - Cooking (Kitchen Staff) -> Ready (Kitchen Staff)
  - Ready (Kitchen Staff) -> Delivered (Desk Staff)
  - ...when other pages update
* Desk Staff can click on 'CANCEL' button anytime during the Ordering process. (Pending, Cooking or Ready)
* Desk Staff can ONLY click on 'DELIVER' ONLY if the Status is currently set to 'Ready'.
* Business Rules are being enforced for the 'DELIVER' and 'CANCEL' Buttons.

> The Desk Staff can now clearly see each Order, and its current status, and can decide to either Deliver or Cancel it. This enables the Staff to keep track of each Orders, and take Business Decisions.

---

## **27/07/2026** - Software Documentation

### Completed:
* Version 1 officially over.
* Brainstormed Version 2 Ideas.
* Functional and Non-Functional Requirements for Version 2 defined.
* Archived `development_log.md` and `roadmap.md`.

> The project now has a clearer overview. It highlights current functionalities (V1), planned enhancements (V2) and future direction.

---

# ✨ 6. FUTURE WORKS
- Customer payment is handled.
- Component-based frontend. (Use React)
- Modern, interactive UI with rich animations. (Use Tailwind CSS)
- REST API integration and multi-device support. (Build a backend API using Python Flask)
- Containerized cloud deployment. (Use Docker)
- AI-powered features. (Help bots, product recommendations using machine learning, etc)