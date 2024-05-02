## Product Sell and Rental Service Management

1. Product sell and rental service management involves the administration and oversight of transactions related to the sale and rental of products or services. This encompasses various aspects, including inventory management, customer interaction, billing, and tracking of sales and rentals.

2. Customer Interaction: Effective customer interaction is crucial for successful product sell and rental service management. This includes providing excellent customer service, addressing customer inquiries and concerns, and ensuring a seamless experience throughout the sales or rental process.

3. Sales and Rental Tracking: Tracking sales and rentals is vital for assessing business performance and identifying areas for improvement. This involves monitoring sales and rental transactions, analyzing sales data to identify trends and patterns, and generating reports to provide insights into business performance.

4. Overall, effective product sell and rental service management requires careful planning, efficient operations, and a focus on delivering exceptional customer experiences. By implementing robust management practices and leveraging technology solutions, businesses can streamline their operations, enhance customer satisfaction, and drive growth in their product sell and rental service offerings.

This project has been made for my University course CSE-3100(Web Engineering Labratory). I really wroked hard to learn the basics of laravel to seek a career as a developer in future. Further I'll create more laravel projects in future just only to improve my skills and fun.

# Requirements

The only thing you need to install locally is [Composer](https://getcomposer.org/) and [Xaamp](https://www.apachefriends.org/download.html)

# Installation

1. Clone the project and change the directory
```
git clone https://github.com/Ashsifat1511/WebProject.git

cd WebProject
```
2. Install the dependencies
```
composer install
```
3. Copy `.env.example` to `.env`
```
cp .env.example .env
```
4. Generate application key 
```
php artisan key:generate
```
5. Configure your database connection in `.env` file. Add your preferred database name in `DB_DATABASE` variable.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
6. Add your stripe credenttials at '.env' file for payment gateway using
```
STRIPE_KEY=pk_test_xxxxxxxxxxxxxxxxxxxxxxxxxxx
STRIPE_SECRET=sk_test_xxxxxxxxxxxxxxxxxxxxxxxx
```
7. Start XAMPP Control Panel and start the MySQL server.
8. Run the migration with seeders
```
php artisan migrate --seed
```
9. Start the web server
```
php artisan serve
```
10. Credentials for admin
```
Username: sifatashrarul
Password: 1234
```
11. For Customer use Registration
## Support and Contact

For any assistance or inquiries, feel free to connect with me on sifatashrarul@gmail.com
