-- Users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM("admin", "staff") DEFAULT "staff"
);

-- Bookings
CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    client_name VARCHAR(100),
    booking_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tee Times
CREATE TABLE tee_times (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_id INT,
    tee_time DATETIME NOT NULL,
    status ENUM("available", "booked", "completed") DEFAULT "available",
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

-- Inventory
CREATE TABLE inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(100),
    quantity INT,
    price DECIMAL(10,2)
);

-- Payments
CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    amount DECIMAL(10,2),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Maintenance
CREATE TABLE maintenance_tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    task_name VARCHAR(100) NOT NULL,
    scheduled_date DATETIME NOT NULL,
    assigned_to INT,
    status ENUM("pending", "in_progress", "completed") DEFAULT "pending",
    FOREIGN KEY (assigned_to) REFERENCES users(id)
);

-- Loyalty Points
CREATE TABLE loyalty_points (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    points INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Rentals
CREATE TABLE rentals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(100),
    user_id INT,
    status ENUM("available", "rented", "returned") DEFAULT "available",
    rental_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tournaments
CREATE TABLE tournaments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    date DATE
);
CREATE TABLE tournament_players (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tournament_id INT,
    user_id INT,
    score INT,
    FOREIGN KEY (tournament_id) REFERENCES tournaments(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Staff Shifts
CREATE TABLE shifts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    start_time DATETIME,
    end_time DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE payroll (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    hours_worked DECIMAL(5,2),
    pay_rate DECIMAL(10,2),
    pay_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Memberships
CREATE TABLE memberships (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    tier ENUM("basic", "premium"),
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Course Layout
CREATE TABLE course_layout (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hole_number INT,
    par INT,
    yardage INT
);

-- Food Orders
CREATE TABLE food_orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(100),
    quantity INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Feedback
CREATE TABLE feedback (
    id INT PRIMARY KEY AUTO_INCREMENT,
    rating INT,
    comment TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

