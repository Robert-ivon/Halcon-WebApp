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

Recent Updates
1. Dashboard Views Completed
The following role-based dashboards were implemented and completed today:

Purchasing Dashboard:

Displays orders that need to be purchased.
Allows users to view and update orders that require material procurement.
Warehouse Dashboard:

Displays orders that are in process or in route.
Allows users to update the status of orders and prepare them for delivery.
Includes the option to mark orders as "In Process" and "In Route."
Route Dashboard:

Displays orders in transit.
Allows users to upload delivery photos and mark orders as "Delivered."
2. Soft Delete and Restore Functionality
Soft delete functionality was added to the users table.
Admin users can now delete and restore users without losing data, maintaining the integrity of the database.
3. Photo Upload for Route Orders
The Route Dashboard now includes the functionality for users to upload delivery photos when orders are marked as "Delivered."
Photos are stored in the public directory, and the delivery_photo column in the orders table has been updated to store the file path.
4. Middleware for Access Control
Middleware has been implemented to restrict access to dashboards based on user roles:
Admin users can access the Admin Dashboard.
Sales users can access the Sales Dashboard.
Purchasing users can access the Purchasing Dashboard.
Warehouse users can access the Warehouse Dashboard.
Route users can access the Route Dashboard.
5. Alerts and Notifications
Toastr notifications have been integrated into the application to display success and error messages dynamically.
Bootstrap alerts are used for basic notifications, such as form validation messages and success/error notifications after actions.
6. Database Adjustments
Added the delivery_photo column in the orders table to store file paths of the uploaded photos.
Created a migration to add the department_id column to the users table for department assignment.