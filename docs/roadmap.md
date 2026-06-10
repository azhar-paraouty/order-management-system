# Project Roadmap

## Purpose

This document tracks future ideas, enhancements and potential features.

Items listed here are not necessarily part of the current version.

---

# Version 1 Scope

Focus Areas:

* Login System
* Product Management
* Order Creation
* Kitchen Queue
* Order Status Tracking

Technology:

* HTML
* CSS
* JavaScript

Goal:

Create a functional frontend prototype demonstrating the complete restaurant workflow.

---

# Current Frontend JavaScript Roadmap

## Phase 1 — Product Interaction

Planned Features:

* Product selection
* Update "Currently Selecting" panel
* Quantity controls
* Product search (frontend only)

Learning Objectives:

* DOM selection
* Event listeners
* Dynamic updates

---

## Phase 2 — Cart Management

Planned Features:

* Add To Order
* Remove Item
* Dynamic Summary updates
* Order total calculation

Learning Objectives:

* Arrays
* Objects
* Dynamic rendering

---

## Phase 3 — Order Creation

Planned Features:

* Generate fake orders
* Assign order IDs
* Assign timestamps
* Store orders in JavaScript objects

Example:

```javascript
{
  orderId: 1,
  items: [...],
  status: "Pending"
}
```

Learning Objectives:

* Data structures
* State management

---

## Phase 4 — Kitchen Workflow

Planned Features:

* Pending → Cooking
* Cooking → Ready
* Clear Order

Learning Objectives:

* State transitions
* UI synchronization

---

## Phase 5 — Status Dashboard

Planned Features:

* View active orders
* Deliver order
* Cancel order
* Update displayed status

Learning Objectives:

* Shared state
* Workflow management

---

## Phase 6 — Multi-Page Simulation

Planned Features:

* localStorage
* sessionStorage
* Shared order data across pages

Learning Objectives:

* Client-side persistence
* Application state

---

# Version 2 Ideas

## User Management

Possible Features:

* Create staff accounts
* Edit staff accounts
* Disable accounts
* Role management

---

## Reporting Dashboard

Possible Features:

* Daily sales summary
* Product popularity
* Order statistics
* Revenue tracking

---

## Inventory Management

Possible Features:

* Ingredient tracking
* Stock levels
* Low stock alerts

---

## Notifications

Possible Features:

* Ready order alerts
* Visual notifications
* Sound notifications

---

## Enhanced Search

Possible Features:

* Filter by category
* Filter by status
* Filter by date

---

## UI Improvements

Possible Features:

* Improved styling
* Better responsiveness
* Mobile support
* Accessibility improvements

---

## Backend Features

Possible Features:

* MySQL database integration
* PHP authentication
* Session management
* CRUD operations
* AJAX updates

---

# Long-Term Learning Goals

This project is also being used to develop skills in:

* System Analysis
* Frontend Development
* JavaScript State Management
* Backend Development
* Database Design
* Authentication & Authorization
* CRUD Operations
* Full Stack Development
* Software Project Documentation

---

# Notes

Features should only move from this roadmap into active development when:

1. Requirements are clearly defined
2. Wireframes exist
3. Current phase is stable
4. The feature supports project learning objectives
