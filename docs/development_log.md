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
* Status Dashboard Page

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
* Status Dashboard Page

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

## Separate Kitchen Queue and Status Dashboard

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

Validate workflows, layout, navigation and usability before introducing PHP, MySQL and AJAX.

---

## Simple Initial Architecture

Decision:

Start with HTML and CSS only.

Reason:

Focus on structure and page layout before implementing interactivity and business logic.

---

## JavaScript Before Backend

Decision:

Implement frontend state management before introducing backend technologies.

Reason:

Allows learning:

* DOM manipulation
* Event handling
* Arrays and objects
* State management
* Dynamic UI updates

before introducing databases and server-side logic.

---

# Current Status

## Completed

* Requirements Analysis
* Workflow Design
* Wireframes
* Initial Project Structure
* HTML Structure
* CSS Layout

## In Progress

* Frontend JavaScript Development

## Upcoming

* Product Selection Logic
* Order Cart Logic
* Kitchen Queue State Logic
* Frontend State Management
* Frontend Prototype Completion
* Backend Planning
* Backend Integration
