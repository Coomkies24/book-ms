# Vintage Book Management System

## Description of the System
The Vintage Book Management System is a Laravel-based web application designed to manage a library archive. It goes beyond a standard CRUD application by implementing secure user authentication, role-based access control, and robust database relationships. The system features a custom vintage-themed user interface built with Bootstrap 5 and Blade templating, providing a clean and intuitive user experience while enforcing strict back-end security.

## List of Implemented Features

* **1. Complete CRUD Operations:** Users can seamlessly interact with the database to Create, Read, Update, and Delete book records.
  
* **2. Authentication:** A fully functional registration and login system that handles user sessions securely.

* **3. Middleware:** Internal routes and dashboards are strictly protected. Unauthenticated users are automatically redirected to the login page, preventing unauthorized access to the application's core features.

* **4. Authorization (Gates & Policies):** Role-based access control is enforced using a custom `BookPolicy`. The system distinguishes between "Admin" users (who have full CRUD privileges) and regular "Member" users (who are restricted to read-only access). Unauthorized actions are blocked with a 403 Forbidden response.

* **5. Eloquent Relationships:** The system utilizes a One-to-Many database relationship (`User hasMany Books`). When a new book is created, it is automatically linked to the `user_id` of the authenticated user who added it, enforcing proper data ownership and tracking.