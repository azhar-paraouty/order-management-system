# Development Log

## Purpose

This document tracks the evolution of the Island Bites project.

It records:

* completed milestones,
* important design decisions,
* architectural choices,
* and lessons learned throughout development.

---

# 2026-05-30

## Project Created

Created GitHub repository for the Island Bites Order Management System.

### Initial Objectives

* Practice structured system development
* Improve requirements analysis skills
* Improve frontend development skills
* Learn backend integration later
* Follow a realistic project workflow

---

# 2026-06-01

## Business & System Analysis Completed

Completed:

* Business Overview
* User Roles & Responsibilities
* Functional Requirements
* Non-Functional Requirements
* Workflow Analysis
* State Definitions
* Navigation Planning

### Key Outcome

The project scope was defined as a small restaurant order management system focused on improving communication between front desk staff and kitchen staff.

---

# 2026-06-02

## Initial Wireframes Completed

Created wireframes for:

* Login Page
* Product Management Page
* Kitchen Queue Page
* Order Dashboard Page
* Order Status Page

### Purpose

Translate business requirements into visual screens before beginning frontend development.

---

# 2026-06-10

## HTML/CSS Frontend Structure Completed

Created static frontend pages based on approved wireframes.

Pages Completed:

* Login Page
* Product Management Page
* Kitchen Queue Page
* Order Dashboard Page
* Order Status Page

### CSS Layout Implemented

Completed:

* Page layouts
* Navigation sections
* Product cards
* Order cards
* Summary panels
* Buttons
* Search bars
* Dashboard sections

### Key Outcome

The project now has a complete static frontend prototype.

Users can visually navigate the system and understand the intended workflow.

No business logic or data persistence has been implemented yet.

---

# 2026-06-26

## JavaScript Frontend Prototype Completed

Implemented the initial frontend behaviour using JavaScript.

Completed:

* Product selection
* Quantity controls
* Order Summary management
* Dynamic Total calculation
* Fake order creation
* Kitchen queue state transitions
* Order status updates
* Frontend-only state management

### Key Outcome

The application now simulates the complete restaurant workflow using frontend technologies only.

All data remains temporary and hardcoded, providing a foundation for backend integration.

---

# 2026-07-08

## Begin with inital PHP structure

Focus was on Authentication and Login page.

Completed:

* User Authentication for Usernames and Passwords.
* Use of password hashing to make password unreadable.
* Established succesful connection with the Maria Database.
* Logout Button was added for all major web pages.

### Key Outcome

Users now have to enter the appropriate credentials to access a protected page.

The system retain the User's info for for a particular session.

---

# 2026-07-16

## CRUD Operations for Admin Page

Completed:

* Added Initial Product data (using /island_bites.sql), with their respective images
* Show 5 Additional products on screen when clicking on 'View More Products'.
* Delete a product (from database) when 'REMOVE' Button is clicked. 
* Display a Product Entry or Modification form respectively, when:
  'Create New Products' or 'UPDATE' Buttons are clicked.
* Simplified the Database Setup (using /configurations.php)


### Key Outcome

The Admin can now Create, Update, Delete and View More Products, all from a User Friendly UI.

This allows for seperation of duties between Page Admin and Database Administrator.

---

# 2026-07-22

## Create Orders for Items in Order Dashboard Page

Completed:
* Fetch Products directly from Database.
* Display 5 products at a time.
* View More Products Button: To display subsequent Products from Database.
* When 'Confirm Order' is clicked: Create the Order and Store Order Items data in Database.
* Upated Left Panel to reflect 'Completed Orders' ready to be delivered.


### Key Outcome

The Desk Staff can now Create Orders for the Customer based on available Products.

When the Order is 'Ready', the Staff can see it from the Left Panel.

---

# 2026-07-25

## Processing Order Cards in Kitchen Queue Page

Completed:
* Fetch Orders directly from Database, right when they are created (pending state). 
* For each order, display the time it was updated/created and Order Items.
* Display 3 orders at a time, and increment by 3 each time.
* More Orders Button: To display subsequent Orders from Database. Modified to function like a Button instead.
* Clicking on 'COOK' updates the Order state from 'Pending' to 'Cooking'
* Clicking on 'READY' updates the Order state from 'Cooking' to 'Ready'
* Clicking on 'CLEAR', ONLY possible when the Status of the Order Status is 'Delivered' OR 'Cancelled'


### Key Outcome

The Kitchen Staff can now clearly see each Order, and its current status.

This ensures that Orders having priority are cooked and prepared first.

---

# Design Decisions

## Internal Staff System

Decision:

Build an internal restaurant operations system rather than a customer ordering platform.

Reason:

The project focuses on workflow management and operational efficiency.

---

## Login Only Authentication

Decision:

Users can login but cannot register.

Reason:

The restaurant is assumed to be a small business where accounts are managed directly by the owner.

---

## Separate Kitchen Queue and Order Status

Decision:

Keep both pages separate.

Reason:

Different staff roles perform different tasks.

Kitchen Staff:

* Process orders
* Update cooking status

Front Desk Staff:

* Monitor order progress
* Deliver orders
* Cancel orders

---

## Frontend First Approach

Decision:

Build frontend before backend.

Reason:

Validate workflows, layout, navigation and usability before introducing PHP and MySQL.

---

## JavaScript Before Backend

Decision:

Complete frontend interactions before implementing persistent storage.

Reason:

Allowed the project workflow to be validated before introducing server-side technologies.

---

## Backend Integration Strategy

Decision:

Introduce PHP and MySQL together rather than exploiting each technology in isolation.

Reason:

The objective is to build a realistic full-stack workflow where PHP interacts directly with the database.

---

# Current Status

## Completed

* Requirements Analysis
* Workflow Design
* Wireframes
* Initial Project Structure
* HTML Structure
* CSS Layout
* JavaScript Frontend Prototype
* Backend Planning
* Database Design

## In Progress

* Backend Architecture Planning
* PHP Integration
* Authentication
* CRUD Operations
* Database Integration

## Upcoming

* System Testing
