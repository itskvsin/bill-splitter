# 💸 Bill Splitting App (PHP + MySQL)

A simple web app to split bills among friends or groups, built using PHP, MySQL, HTML, CSS, and JS. This app allows users to create bills, assign participants, record who paid, and notify each participant of their share via email or SMS.

---

## 🌐 Live Demo

Check out the app live here:  
[https://yourdomain.com/billSplitter](https://bill-splitter.fwh.is)

---

## 🚀 Features

- ✅ User Registration & Login
- ✅ Create new bills (title, total amount, who paid)
- ✅ Add participants (name, contact, amount owed)
- ✅ Store all bill and participant data in MySQL
- ✅ Send **email or SMS** notifications depending on the contact type
- ✅ View summary after submission
- ✅ Clean UI with mobile responsiveness
- ⚙️ Notification logic in modular `notifyMail.php` and `notifySms.php`

---

## 📁 Folder Structure
/billSplitter
│
├── index.php
├── login.php
├── register.php
├── submitBill.php
│
├── notifyMail.php # PHPMailer email notification logic
├── notifySms.php # SMS logic (see notes below)
│
├── config.php # DB connection
├── storedLogin.php
├── storedRegister.php
│
├── styles/
│ ├── style.css
│ └── submitBill.css
│
├── images/
│ └── logo.png
│
└── vendor/ # Composer dependencies (e.g. PHPMailer)


---

## 🛠️ Setup Instructions

1. **Clone the repo**
   ```bash
   git clone https://github.com/YOUR_USERNAME/billSplitter.git
   cd billSplitter


Set up database

Import the following tables in MySQL:
```   
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  contact VARCHAR(20),
  password VARCHAR(255)
);

CREATE TABLE bill (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  title VARCHAR(255),
  paid_by VARCHAR(100),
  total_amt FLOAT,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE participants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  bill_id INT,
  name VARCHAR(100),
  contact VARCHAR(100),
  amt FLOAT,
  FOREIGN KEY (bill_id) REFERENCES bill(id)
);
```

3. **Install dependencies**
```
composer install
```

4.**Configure environment**
```
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=billSplitter

EMAIL_HOST=smtp.gmail.com
EMAIL_USERNAME=your_email@gmail.com
EMAIL_PASSWORD=your_app_password

INFOMAIL_API=your_api_key (deprecated due to DLT)
```

📬 Notifications
📧 Email (notifyMail.php)

Uses PHPMailer to send participant emails if contact is a valid email address.
📱 SMS (notifySms.php)

Attempts to send SMS using API (e.g., Fast2SMS, Infobip). However...

⚠️ DLT Blockage for Indian Numbers

Due to TRAI DLT regulations, SMS messages to Indian numbers are rejected unless:

    You register on a DLT platform

    You get your sender ID and templates approved

    You use a DLT-compliant SMS provider (e.g., MSG91, Karix, RouteMobile)

Currently, SMS notifications do not work for Indian numbers.
We are seeking community help on this.

🤝 Contributing

Want to help us solve the DLT SMS issue?

    Fork the repo

    Tweak notifySms.php to use a DLT-compliant service

    Submit a pull request!

Or if you know a free or affordable SMS gateway that works with Indian numbers, feel free to open an issue.


🧑‍💻 Author
Kevin Solanki
Made with ❤️ for learning and sharing
Reach out via email or submit issues on GitHub!
