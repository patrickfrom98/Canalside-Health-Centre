# Canalside Health Centre
A healthcare system for a fictitious company. The system formulates part of a university assignment.

## About
A web application built using OOP PHP following an MVC structure. The application sits on top of a MySQL database.

## Features
* Login system supporting patients, receptionists and GP's
* Appointments system (book, check-in, in-progress, attended, cancel, block)
* Record consultations (triage notes, prescriptions)

## Project structure
The htdocs directory contains all files that makes up the application
The sql directory contains all files required to build and populate the database

## Usage
### Patients
1. Patients register with the GP Surgery by attending the clinic and speaking to receptionist.
2. Patients book, amend and cancel appointments by calling the receptionists at the surgery or by speaking to receptionists at the surgery.
3. Patients check-in for appointments by attending the clinic and signing in via a special computer at the surgery or by speaking to receptionists at the surgery.
4. Patients unregister with the GP surgery by attending the clinic and speaking to the receptionists

### Receptionists
1. Receptionists register patients face-to-face. The receptionist will record the patients details including their title, forename, surname and gender. A contact number, email and home address will also be recorded. A landline number is optionally recorded. On registry a random, unique patient id is generated and given to the patient to allow he/she to signup to the system.
2. Receptionists book appointments by ...
3. Receptionists unregister patients by searching for the patient using the patient id that the patient states to the receptionist and clicking the "unregister" button.

### GP's
