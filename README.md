# College Educational Website – Final Year Project (PFE)

This project is a dynamic educational website developed as part of a Final Year Project (PFE). It is designed to serve an Islamic educational institution (Othman Ibn Affane Institution for teaching Coran and it's Sciences), with features for managing teachers, subjects, sessions, and user interaction via forums.

##  Website Overview

The site includes:
- An informative homepage
- Pages for Islamic courses: Aqidah, Fiqh, Hadith, and Akhlaq
- Contact and about pages
- Teacher management (add/view teachers)
- Session management
- Forums for discussions (students and teachers)
- Secure login system

##  Technologies Used

- **Frontend**: HTML5, CSS3, Bootstrap 4, Animate.css, Owl Carousel
- **Backend**: PHP
- **Database**: MySQL (via phpMyAdmin)
- **Local server**: XAMPP

##  Website Overview

The platform includes:

-  **Homepage** with navigation and course overview
-  **Course Pages** on Islamic teachings (Aqidah, Fiqh, Hadith, Akhlaq)
-  **Teacher Management** – Add/view teachers dynamically via PHP/MySQL
-  **Session Management** – Create and view sessions
-  **Forum** – Students and teachers can interact (simple PHP forum)
-  **Login System** – Basic authentication system using PHP sessions
-  **Contact Form** – Static HTML form (demo only)


##  How to Run the Project Locally (Using XAMPP)

To run the site on your local machine using XAMPP, follow these steps:

1. **Download and Install XAMPP**
   - From [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)

2. **Launch Apache and MySQL**

3. **Place the Project Folder**
   - Copy the `college` folder into the `htdocs` directory inside your XAMPP installation:
     ```
     C:\xampp\htdocs\college
     ```

4. **Set Up the Database**
   - Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Create a new database (e.g., `college_db`)
   - Import the provided `.sql` file (if available) to set up the tables.

5. **Configure the Database Connection**
   - Open `college/config.php`
   - Update the database connection parameters if needed:
     ```php
     $conn = new mysqli("localhost", "root", "", "college_db");
     ```

6. **Access the Website**
   - Visit [http://localhost/college](http://localhost/college) in your browser.



