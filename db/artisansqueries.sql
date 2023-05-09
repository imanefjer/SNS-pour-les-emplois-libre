-- Create artisans table
CREATE TABLE IF NOT EXISTS artisans (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW()
);

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW()
);

-- Create services table
CREATE TABLE IF NOT EXISTS services (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW()
);

-- Create artisan-services table
CREATE TABLE IF NOT EXISTS artisan_services (
    id SERIAL PRIMARY KEY,
    artisan_id INTEGER NOT NULL,
    service_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (artisan_id) REFERENCES artisans (id),
    FOREIGN KEY (service_id) REFERENCES services (id)
);

-- Create orders table
CREATE TABLE IF NOT EXISTS orders (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL,
    artisan_id INTEGER NOT NULL,
    service_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    description TEXT,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (artisan_id) REFERENCES artisans (id),
    FOREIGN KEY (service_id) REFERENCES services (id)
);

-- Create user-status
CREATE TABLE IF NOT EXISTS user_status (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL,
    artisan_id INTEGER NOT NULL,
    service_id INTEGER NOT NULL,
    status VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (artisan_id) REFERENCES artisans (id),
    FOREIGN KEY (service_id) REFERENCES services (id)
);

-- Create reviews table
CREATE TABLE IF NOT EXISTS reviews (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL,
    artisan_id INTEGER NOT NULL,
    service_id INTEGER NOT NULL,
    review VARCHAR(255) NOT NULL,
    rating INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (artisan_id) REFERENCES artisans (id),
    FOREIGN KEY (service_id) REFERENCES services (id)
);
-- Create aritsan_locations
CREATE TABLE IF NOT EXISTS artisan_locations (
    id SERIAL PRIMARY KEY,
    artisan_id INTEGER NOT NULL,
    state VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (artisan_id) REFERENCES artisans (id)
);