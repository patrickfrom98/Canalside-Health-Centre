SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS mvc_patient;
DROP TABLE IF EXISTS mvc_user;
DROP TABLE IF EXISTS mvc_role;
DROP TABLE IF EXISTS mvc_contact;
DROP TABLE IF EXISTS mvc_address;
DROP TABLE IF EXISTS mvc_diary;
DROP TABLE IF EXISTS mvc_appointment;
DROP TABLE IF EXISTS mvc_diary_appointment;

CREATE TABLE mvc_patient (
    patient_id VARCHAR(16) NOT NULL,
    user_id INT,
    title VARCHAR(6) NOT NULL,
    gender VARCHAR(1) NOT NULL,
    forename VARCHAR(20) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    PRIMARY KEY (patient_id)
);

CREATE TABLE mvc_user (
    user_id INT AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(60) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE mvc_role (
    user_id INT NOT NULL,
    role VARCHAR(12) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE mvc_contact (
    patient_id VARCHAR(16) NOT NULL,
    mobile VARCHAR(11) NOT NULL,
    landline VARCHAR(11),
    email VARCHAR(50) NOT NULL,
    PRIMARY KEY (patient_id)
);

CREATE TABLE mvc_address (
    patient_id VARCHAR(16) NOT NULL,
    address_1 VARCHAR(35) NOT NULL,
    address_2 VARCHAR(20) NOT NULL,
    town VARCHAR(20) NOT NULL,
    county VARCHAR(20),
    postcode VARCHAR(8) NOT NULL,
    PRIMARY KEY (patient_id)
);

CREATE TABLE mvc_diary (
    diary_id INT AUTO_INCREMENT NOT NULL,
    diary_name VARCHAR(40) NOT NULL,
    diary_date DATE NOT NULL,
    clinician_name VARCHAR(35) NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    PRIMARY KEY (diary_id)
);

CREATE TABLE mvc_appointment (
    appointment_id INT AUTO_INCREMENT NOT NULL,
    appointment_time TIME NOT NULL,
    PRIMARY KEY (appointment_id)
);

CREATE TABLE mvc_diary_appointment (
    appointment_id INT NOT NULL,
    diary_id  INT NOT NULL,
    PRIMARY KEY (diary_id, appointment_id)
);

ALTER TABLE mvc_role ADD CONSTRAINT mvc_role_fk0 FOREIGN KEY (user_id) REFERENCES mvc_user(user_id);

ALTER TABLE mvc_contact ADD CONSTRAINT mvc_contact_fk0 FOREIGN KEY (patient_id) REFERENCES mvc_patient(patient_id);

ALTER TABLE mvc_address ADD CONSTRAINT mvc_address_fk0 FOREIGN KEY (patient_id) REFERENCES mvc_patient(patient_id);

ALTER TABLE mvc_patient ADD CONSTRAINT mvc_patient_fk0 FOREIGN KEY (user_id) REFERENCES mvc_user(user_id);

ALTER TABLE mvc_diary_appointment ADD CONSTRAINT mvc_diary_appointment_fk0 FOREIGN KEY (diary_id) REFERENCES mvc_diary(diary_id);
ALTER TABLE mvc_diary_appointment ADD CONSTRAINT mvc_diary_appointment_fk1 FOREIGN KEY (appointment_id) REFERENCES mvc_appointment(appointment_id);

SET FOREIGN_KEY_CHECKS = 1;
