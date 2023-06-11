CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  phone_number VARCHAR(20),
  role VARCHAR(10)
);

CREATE TABLE Artisans (
  artisan_id INT PRIMARY KEY,
  company_name VARCHAR(255),
  company_address VARCHAR(255),
  description TEXT,
  profile_picture VARCHAR(255),
);

CREATE TABLE Services (
  service_id INT PRIMARY KEY,
  service_name VARCHAR(255),
  service_description TEXT
);

CREATE TABLE Artisan_Services (
  artisan_id INT,
  service_id INT,
  PRIMARY KEY (artisan_id, service_id),
  FOREIGN KEY (artisan_id) REFERENCES Artisans(artisan_id),
  FOREIGN KEY (service_id) REFERENCES Services(service_id)
);

CREATE TABLE Availabilities (
  availability_id INT PRIMARY KEY,
  artisan_id INT,
  date DATE,
  start_time TIME,
  end_time TIME,
  FOREIGN KEY (artisan_id) REFERENCES Artisans(artisan_id)
);

CREATE TABLE Requests (
  request_id INT PRIMARY KEY,
  user_id INT,
  service_id INT,
  description TEXT,
  date_requested DATE,
  status VARCHAR(10),
  location VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (service_id) REFERENCES Services(service_id)
);

CREATE TABLE Quotes (
  quote_id INT PRIMARY KEY,
  artisan_id INT,
  request_id INT,
  quote_amount DECIMAL(10, 2),
  quote_description TEXT,
  date_quoted DATE,
  status VARCHAR(10),
  FOREIGN KEY (artisan_id) REFERENCES Artisans(artisan_id),
  FOREIGN KEY (request_id) REFERENCES Requests(request_id)
);

CREATE TABLE Payments (
  payment_id INT PRIMARY KEY,
  user_id INT,
  artisan_id INT,
  request_id INT,
  quote_id INT,
  payment_amount DECIMAL(10, 2),
  date_paid DATE,
  payment_method VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (artisan_id) REFERENCES Artisans(artisan_id),
  FOREIGN KEY (request_id) REFERENCES Requests(request_id),
  FOREIGN KEY (quote_id) REFERENCES Quotes(quote_id)
);

CREATE TABLE Messages (
  message_id INT PRIMARY KEY,
  user_id INT,
  artisan_id INT,
  request_id INT,
  message_text TEXT,
  date_sent DATETIME,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (artisan_id) REFERENCES Artisans(artisan_id),
  FOREIGN KEY (request_id) REFERENCES Requests(request_id)
);

CREATE TABLE Notifications (
  notification_id INT PRIMARY KEY,
  user_id INT,
  message TEXT,
  date_sent DATETIME,
  is_read BOOLEAN,
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Reviews (
  review_id INT PRIMARY KEY,
  user_id INT,
  artisan_id INT,
  rating INT,
  review_text TEXT,
  date_reviewed DATE,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (artisan_id) REFERENCES Artisans(artisan_id)
);
