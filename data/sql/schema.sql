CREATE TABLE cro_admin_users (id BIGINT AUTO_INCREMENT, username VARCHAR(255) NOT NULL UNIQUE, email VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(32) NOT NULL, fname VARCHAR(255) NOT NULL, lname VARCHAR(255) NOT NULL, address TEXT, contact1 VARCHAR(255), contact2 VARCHAR(255), website VARCHAR(255), company_slogan VARCHAR(255) NOT NULL, company_logo VARCHAR(255), lastlogin DATETIME NOT NULL, status TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_courts (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT '0' NOT NULL, indoor TINYINT(1) DEFAULT '0' NOT NULL, lights TINYINT(1) DEFAULT '0' NOT NULL, priorreservationhours BIGINT NOT NULL, maxreservationhours BIGINT NOT NULL, rate DOUBLE(18, 2) NOT NULL, start_time DATETIME NOT NULL, end_time DATETIME NOT NULL, created_by BIGINT NOT NULL, updated_by BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX updated_by_idx (updated_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_payments (id BIGINT AUTO_INCREMENT, reservationid BIGINT NOT NULL, rate DOUBLE(18, 2) NOT NULL, payment_date DATE NOT NULL, payment_type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX reservationid_idx (reservationid), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_reservations (id BIGINT AUTO_INCREMENT, userid BIGINT NOT NULL, courtid BIGINT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, start_time DATETIME NOT NULL, end_time DATETIME NOT NULL, status TINYINT(1) DEFAULT '0' NOT NULL, payment_status VARCHAR(255) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX userid_idx (userid), INDEX courtid_idx (courtid), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_users (id BIGINT AUTO_INCREMENT, username VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(32) NOT NULL, fname VARCHAR(255) NOT NULL, lname VARCHAR(255) NOT NULL, minitial VARCHAR(255), email VARCHAR(255) NOT NULL UNIQUE, phone VARCHAR(255), user_type VARCHAR(255) NOT NULL, subscription_type VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE cro_courts ADD CONSTRAINT cro_courts_updated_by_cro_admin_users_id FOREIGN KEY (updated_by) REFERENCES cro_admin_users(id);
ALTER TABLE cro_payments ADD CONSTRAINT cro_payments_reservationid_cro_reservations_id FOREIGN KEY (reservationid) REFERENCES cro_reservations(id) ON DELETE CASCADE;
ALTER TABLE cro_reservations ADD CONSTRAINT cro_reservations_userid_cro_users_id FOREIGN KEY (userid) REFERENCES cro_users(id);
ALTER TABLE cro_reservations ADD CONSTRAINT cro_reservations_courtid_cro_courts_id FOREIGN KEY (courtid) REFERENCES cro_courts(id);
