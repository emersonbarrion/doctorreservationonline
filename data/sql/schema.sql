CREATE TABLE cro_admin_users (id BIGINT AUTO_INCREMENT, username VARCHAR(255) NOT NULL UNIQUE, email VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(32) NOT NULL, fname VARCHAR(255) NOT NULL, lname VARCHAR(255) NOT NULL, address TEXT, contact1 VARCHAR(255), contact2 VARCHAR(255), user_group BIGINT NOT NULL, lastlogin DATETIME, status VARCHAR(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_group_idx (user_group), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_cms (id BIGINT AUTO_INCREMENT, page_url_id BIGINT NOT NULL, content_name VARCHAR(255) NOT NULL, content_text TEXT, content_image TEXT, created_by BIGINT NOT NULL, updated_by BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX updated_by_idx (updated_by), INDEX page_url_id_idx (page_url_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_cms_images (id BIGINT AUTO_INCREMENT, location VARCHAR(255) NOT NULL, content_name VARCHAR(255) NOT NULL, content_image TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_cms_texts (id BIGINT AUTO_INCREMENT, location VARCHAR(255) NOT NULL, content_name VARCHAR(255) NOT NULL, content_text TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_court_close (id BIGINT AUTO_INCREMENT, reservationid BIGINT NOT NULL, closedate VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX reservationid_idx (reservationid), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_courts (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, indoor TINYINT(1) DEFAULT '0' NOT NULL, lights TINYINT(1) DEFAULT '0' NOT NULL, priorreservationhours BIGINT NOT NULL, maxreservationhours BIGINT NOT NULL, rate DOUBLE(18, 2) NOT NULL, start_time VARCHAR(255) NOT NULL, end_time VARCHAR(255) NOT NULL, status VARCHAR(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_groups (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_pages (id BIGINT AUTO_INCREMENT, page_url VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_payments (id BIGINT AUTO_INCREMENT, reservationid BIGINT NOT NULL, rate DOUBLE(18, 2) NOT NULL, payment_date DATE NOT NULL, payment_type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX reservationid_idx (reservationid), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_reservations (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, userid BIGINT NOT NULL, courtid BIGINT NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, payment_status VARCHAR(255) DEFAULT '0' NOT NULL, status VARCHAR(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX userid_idx (userid), INDEX courtid_idx (courtid), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cro_users (id BIGINT AUTO_INCREMENT, username VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(32) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, fname VARCHAR(255), lname VARCHAR(255), minitial VARCHAR(255), phone VARCHAR(255), subscription VARCHAR(255), status BIGINT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE cro_admin_users ADD CONSTRAINT cro_admin_users_user_group_cro_groups_id FOREIGN KEY (user_group) REFERENCES cro_groups(id);
ALTER TABLE cro_cms ADD CONSTRAINT cro_cms_updated_by_cro_admin_users_id FOREIGN KEY (updated_by) REFERENCES cro_admin_users(id) ON DELETE CASCADE;
ALTER TABLE cro_cms ADD CONSTRAINT cro_cms_page_url_id_cro_pages_id FOREIGN KEY (page_url_id) REFERENCES cro_pages(id) ON DELETE CASCADE;
ALTER TABLE cro_court_close ADD CONSTRAINT cro_court_close_reservationid_cro_reservations_id FOREIGN KEY (reservationid) REFERENCES cro_reservations(id);
ALTER TABLE cro_payments ADD CONSTRAINT cro_payments_reservationid_cro_reservations_id FOREIGN KEY (reservationid) REFERENCES cro_reservations(id) ON DELETE CASCADE;
ALTER TABLE cro_reservations ADD CONSTRAINT cro_reservations_userid_cro_users_id FOREIGN KEY (userid) REFERENCES cro_users(id);
ALTER TABLE cro_reservations ADD CONSTRAINT cro_reservations_courtid_cro_courts_id FOREIGN KEY (courtid) REFERENCES cro_courts(id);
