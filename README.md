# BigRed: Golf Course Management System

**Author:** Rick Hayes  
**Version:** 1.1  
**License:** MIT  
**Codename:** BigRed  

BigRed is a powerful PHP-based solution for golf course management, now upgraded to version 1.1 with expanded features. Built on PHP, MySQL, and Apache, it offers a complete toolkit for operational efficiency and customer satisfaction.

## Features
- **Tee Time Management:** Real-time booking system.
- **Maintenance Tracking:** Schedule and monitor tasks.
- **Pro Shop Inventory:** Manage stock and sales.
- **Payment Processing:** Handle fees with online gateway support.
- **CRM:** Track client interactions and history.
- **Analytics:** Revenue and booking insights.
- **Weather Integration:** Real-time weather updates.
- **Customer Loyalty Program:** Reward frequent players with points.
- **Mobile App Interface:** Responsive design with API endpoints.
- **Equipment Rentals:** Manage carts and gear.
- **Tournament Management:** Organize events and scoring.
- **Staff Management:** Schedule shifts and track payroll.
- **Membership Management:** Handle subscriptions and benefits.
- **Course Mapping:** Interactive hole layouts.
- **Communication Tools:** Email/SMS notifications.
- **Food & Beverage:** POS for on-site dining.
- **Feedback System:** Collect customer reviews.

## Tech Stack
- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Server:** Apache 2.4+
- **Frontend:** HTML, CSS (responsive), JavaScript (Chart.js)
- **External:** OpenWeatherMap API, PHPMailer, Stripe/PayPal SDK

## Installation
1. **Clone or Download:**
   - Obtain the project files from the source repository or distribution package.

2. **Database:**
   - Update `config/database.php` with your MySQL credentials (host, username, password, database name).
   - Import `db/schema.sql` into your MySQL database using a tool like phpMyAdmin or the command line: `mysql -u username -p database_name < db/schema.sql`.

3. **Weather Integration:**
   - Sign up for a free API key at [OpenWeatherMap](https://openweathermap.org/).
   - Insert your API key into `models/Weather.php` at the `$apiKey` variable.

4. **Payment Gateway:**
   - Install Composer dependencies: `composer require stripe/stripe-php phpmailer/phpmailer` in the project root.
   - Update `controllers/PaymentController.php` and `views/proshop.php` with your Stripe secret and publishable keys.

5. **Deploy:**
   - Place the `BigRed` directory in your Apache web root (e.g., `/var/www/html`).
   - Ensure `.htaccess` is enabled by setting `AllowOverride All` in your Apache configuration (e.g., `/etc/apache2/apache2.conf`).

6. **Access:**
   - Visit `http://localhost/BigRed` in your browser.

## Usage
- **Login:** Use default admin credentials (set in `db/schema.sql`) or create a new user.
- **Dashboard:** View weather updates and navigate to features.
- **API:** Access endpoints like `index.php?action=api_bookings` for mobile integration.

## Development
### Directory Structure
```
BigRed/
├── config/           # Configuration files (e.g., database.php)
├── controllers/      # Application logic controllers
├── models/           # Data models for database interaction
├── views/            # HTML templates for UI
├── css/              # Stylesheets (responsive design)
├── js/               # JavaScript files (e.g., Chart.js)
├── assets/           # Images and other static assets
├── db/               # Database schema (schema.sql)
├── index.php         # Main entry point and router
├── .htaccess         # URL rewriting rules
└── README.md         # Project documentation
```

### Adding a New Feature
1. **Create a Model:**
   - Add a new file in `models/` (e.g., `NewFeature.php`).
   - Define a class with database interaction methods using PDO (see `models/User.php` for an example).
   - Example: `public function getAllItems() { $stmt = $this->db->query("SELECT * FROM new_table"); return $stmt->fetchAll(PDO::FETCH_ASSOC); }`

2. **Create a Controller:**
   - Add a new file in `controllers/` (e.g., `NewFeatureController.php`).
   - Include the model and define methods (e.g., `index()` for listing items).
   - Example: `public function index() { $items = $this->newFeatureModel->getAllItems(); require_once "views/new_feature.php"; }`

3. **Create a View:**
   - Add a new file in `views/` (e.g., `new_feature.php`).
   - Use HTML and PHP to display data (see `views/booking.php` for structure).
   - Example: `<table><?php foreach ($items as $item): ?><tr><td><?php echo $item["name"]; ?></td></tr><?php endforeach; ?></table>`

4. **Update Routing:**
   - Open `index.php` and add a new case in the switch statement.
   - Example: `case "newfeature": $controller = new NewFeatureController(); $controller->index(); break;`

5. **Database Schema:**
   - Update `db/schema.sql` with new tables if needed.
   - Example: `CREATE TABLE new_table (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(100));`

6. **Styling:**
   - Add CSS rules to `css/style.css` for responsive design.
   - Use media queries for mobile compatibility (e.g., `@media (max-width: 600px) { ... }`).

### Dependencies
- Install Composer: `php -r "copy(\"https://getcomposer.org/installer\", \"composer-setup.php\");" && php composer-setup.php`
- Install Stripe and PHPMailer: `php composer.phar require stripe/stripe-php phpmailer/phpmailer`
- Include `vendor/autoload.php` in files using these libraries.

### Testing
- Use a local server (e.g., `php -S localhost:8000`) or Apache to test changes.
- Verify database connections and API integrations (weather, payments) work as expected.

## Contributing
Fork the project, make changes, and submit a pull request. Adhere to MIT license terms.

## Roadmap
- Enhanced mobile app with native support
- Advanced analytics with predictive insights
- Multi-course management

## Support
Contact Rick Hayes at Encrypter15@gmail.com for assistance or to report issues.

