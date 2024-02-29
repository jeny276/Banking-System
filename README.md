# Banking-System
This project is a simple web-based banking system implemented using PHP, HTML, CSS, and MySQL. It provides essential banking functionalities such as user authentication, account management, fund transfer, transaction history, and more.


# Features
User Authentication: Users can register for a new account and log in securely.
Account Management: Users can view their account details, including balance and personal information.
Deposit: Users can deposit funds into their account.
Withdrawal: Users can withdraw funds from their account.
Transfer Money: Users can transfer funds between accounts.
Transaction History: Users can view their transaction history, including deposits, withdrawals, and transfers.
Responsive Design: The application has a responsive design to ensure optimal user experience across devices.

# Technologies Used
Frontend: HTML, CSS, Bootstrap
Backend: PHP
Database: MySQL

# How  To Implement It at local machine
1. Create Database named bank
2. create 2 tables namely user_data and transaction
3. In table user_data create column with name uname[varchar],password[varchar],phone[varchar],email[varchar],gender[varchar],photo[varchar],amount[INT]. Make uname as primary key
4. In table transaction create column with name  uname[varchar]'dep_amount[100],timestamp[datetime],id[int],with_amount[int],sent_amount[int],received_amount[int],rec_name[varchar],sender_name[varchar].
5. download all files and folders which are uploaded with same name .
6. run this on local host.[XAMPP is required].
