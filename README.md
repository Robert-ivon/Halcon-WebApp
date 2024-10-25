# Halcon Web Application

## Project Overview
This project is a web application for **Halcon**, a construction material distributor, designed to automate their internal order management processes. The application allows customers to track order statuses, while employees can manage orders through an administrative dashboard.

## Features
- Track order status by customer number and invoice number.
- Administrative dashboard for employees with role-based access.
- Upload and display delivery photos for proof of delivery.
- Search and manage orders by invoice number, customer number, date, or status.
- Restore and modify deleted orders.

## Roles and Departments
- **Sales**: Handle customer orders.
- **Purchasing**: Manage material procurement.
- **Warehouse**: Prepare orders for delivery.
- **Route**: Distribute orders and upload delivery photos.

## Technologies Used
- Frontend: HTML, CSS, JavaScript
- Backend: Node.js / Express.js
- Database: MySQL
- Version Control: GitHub

## Project Description

The **Halcon Web App** is a Laravel-based web application designed for managing orders and employees within a construction materials distributor. The application provides tools for employees to create and manage customer orders, track order statuses, and manage roles and departments. The app is tailored to support multiple departments, including Sales, Warehouse, and Route, each having distinct permissions.

---

## Features

- **Order Management**: Create and manage customer orders with status tracking (e.g., Ordered, In process, In route, Delivered).
- **User Management**: Manage users with role and department assignments.
- **Photo Management**: Upload and manage photos for order deliveries as proof.
- **Role and Department Management**: Create, edit, and organize roles and departments within the company.

---

## Progress Overview

**Completed**:
1. **Database Structure**: Models and migrations for `User`, `Order`, `Photo`, `Role`, and `Department` with relationships.
2. **CRUD Operations**: Full CRUD operations for users, orders, photos, roles, and departments.
3. **Controllers and Views**: Controllers and views to handle all CRUD functionalities.
4. **Seeders**: Database seeders for initial test data.
5. **Routes**: RESTful routes using `Route::resource`.

**In Progress**:
- Additional authentication and role-based access control (if applicable).
