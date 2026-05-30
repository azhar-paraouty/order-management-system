# Island Bites — Order Management System

## 📌 Project Overview

This project documents the early analysis and planning stages of a fictional restaurant order management system called **Island Bites**.

The goal of the project is not to immediately jump into coding, but rather to follow a more structured and realistic system development approach by progressing through:

- Business analysis
- Requirements gathering
- Wireframing
- Frontend prototyping
- Backend integration (later phase)

This repository is intentionally being developed progressively to:
- track the evolution of the system over time,
- document design decisions,
- demonstrate structured problem-solving,
- and showcase genuine technical growth rather than rushed implementation.

---

# PHASE 1 — BUSINESS & SYSTEM ANALYSIS

## Goal

Understand the business before designing screens.

# Step 1 — Business Overview

## Purpose

Defining:
- what the business does,
- who uses the system,
- what operational problems exist.


## Business Name

**Island Bites**


## Business Type

FICTIONAL Small takeaway restaurant, located in Port Louis

## Team Structure

- Owner
- Front Desk Staff
- Kitchen Staff

## Current Problems

- paper orders – not easy to keep track
- lost/damaged receipts – customers have already paid but waiting for delivery by showing their ticket
- unclear cooking queue – not knowing which client has priority
- delayed communication between desk staff and kitchen staff
- Overall, business lacks visibility and everything seems disorganised and unclear

## System Goal

Create a digital order workflow tracking system to integrate operations at Island Bites.

# Step 2 — User Roles & Responsibilities

## Purpose

Defining:
- WHO uses the system,
- WHAT they are allowed to do.

This becomes critical later for:
- login systems,
- permissions,
- navigation,
- dashboards.

## Front Desk

### Can:
- create orders
- view order queue
- mark delivered
- search orders

### Cannot:
- manage staff
- access admin settings

## Kitchen Staff

### Can:
- view pending orders
- update cooking status (example: queued order → started cooking → finished cooking)
- mark ready

### Cannot:
- delete orders
- access reports

## Admin

### Can:
- manage menu items, prices and products sold
- manage categories
- monitor operations

# Step 3 — Functional Requirements

## Purpose

Defining:

> What the system MUST do.

## Product Management

System must:
- display menu items
- organize products by category
- display prices
- display availability
- allow admin to manage products

## Order Management

- System must allow Front Desk Staff to create orders from a dashboard
- System must generate unique order ID
- System must timestamp orders for queuing purposes

## Queue Management

- System must display pending orders to the Kitchen Staff
- System must separate orders by status

## Status Management

- System must allow status updates
- System must prevent invalid transitions

## Search & Filtering

- System must allow searching by order number
- System must allow searching for products (both Customers and Front Desk staff)

## Authentication

- System must allow secure login/logout

# Step 4 — Non-Functional Requirements

## Purpose

Defining:

> HOW the system should behave.

## Usability

- interface must be easy to use
- minimal clicks required

## Performance

- pages should load quickly

## Reliability

- orders should not disappear after refresh

## Security

- only authorized users can access admin pages

## Maintainability

- code structure should remain organized

# Step 5 — Core Workflows

## Purpose

Understanding:
- operational flow,
- business process,
- state changes.

## Order Workflow

```text
Customer places order
    ↓
Front desk creates order
    ↓
Order enters pending queue
    ↓
Kitchen marks cooking
    ↓
Kitchen marks ready
    ↓
Front desk marks delivered
````

# Step 6 — System States

## Purpose

Defining:

> What states entities can exist in.

## Order States

* Pending
* Cooking
* Ready
* Delivered
* Cancelled

## Transition Rules (need to be followed)

```text
Pending → Cooking
Cooking → Ready
Ready → Delivered
```

# Step 7 — Page Inventory

## Purpose

Identifying all the system screens to help prevent random page creation later.

## Public Pages

* index.html
* menu.html
* about.html

## Staff Pages

* dashboard.html
* orders.html
* kitchen_queue.html

## Admin Pages

* admin_dashboard.html (Business Overview)
* manage_menu.html (CRUD Operations)

# Step 8 — Navigation Flow

## Purpose

Understanding:

* how users move,
* where actions lead,
* page relationships.

## Example Navigation

```text
Dashboard
    ↓
Create Order
    ↓
Pending Queue
    ↓
Kitchen Queue
    ↓
Completed Orders
```

# Step 9 — Wireframes

The system will next move into wireframing and visual planning.

This includes:

* layout,
* sections,
* positioning,
* navigation,
* usability.

## Focus Areas

* Header
* Navigation
* Main Content
* Sidebar?
* Buttons

# Step 10 — Folder & Architecture Planning

## Planning the Structure

```text
project/
│
├── index.html
├── orders.html
├── kitchen.html
│
├── css/
│   └── style.css
│
├── js/
│   └── app.js
│
├── images/
│
└── wireframes/
```

Later:

* PHP integration
* database integration
* API structure
* additional folders/files

---

# PHASE 2 — FRONTEND PROTOTYPE

## Goal

Create:

* screens,
* layout,
* interactions,
* navigation,
* UI flow,

WITHOUT backend yet.

## Frontend Technologies

* HTML
* CSS
* JavaScript

## IMPORTANT

The frontend now is a simulated system.

Meaning:

* fake data,
* temporary arrays,
* hardcoded menu items,
* fake order queue.

---

# PHASE 3 — BACKEND INTEGRATION

Only AFTER frontend stabilizes.

This is where:

* PHP,
* MySQL,
* sessions,
* CRUD,
* authentication,
* AJAX

become meaningful.

# 📈 Development Philosophy

This project is intentionally being built progressively rather than rushed into full implementation immediately.

The objective is to:

* understand business workflows,
* improve system thinking,
* strengthen frontend foundations,
* and later integrate backend architecture in a structured way.

The repository will continue evolving as:

* requirements become refined,
* wireframes are created,
* frontend prototypes are developed,
* and backend functionality is integrated.


# 👤 Author

Azhar |
Year 3 Information Systems Student |
Mauritius