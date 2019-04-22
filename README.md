# Canalside Health Centre
A healthcare system for a fictitious GP surgery. The system formulates part of a university assignment.

## About
A web application built using OOP PHP following an MVC structure. The application sits on top of a MySQL database.

## Project structure
The htdocs directory contains all files that makes up the application
The sql directory contains all files required to build and populate the database

## Usage
### Patients
1. Patients register with the GP Surgery by attending the clinic and speaking to receptionist. They can then sign up to this system using their patient ID.
2. Patients can view their personal details on the details page. To edit details a patient should phone the surgery.
3. Patients can view their upcoming and previous appointments using the bookings page. To alter a booking a patient should phone the surgery.

### Receptionists
1. Receptionists can register new patients using the registration page. To register a patient, you must fill in the form and click submit. Patient ID are auto-generated and un-changable.
2. Receptionists can un-register patients from the surgery. This system isn't implemented yet.
3. Receptionists can add a diary of appointments to the system by filling in the form on the diaries page. Once a diary is added, it will show up on the same page.
4. Receptionists can view available appointments across all of the current days diaries by clicking "View appointments" on the diaries page.
5. Receptionists can book appointments by clicking "Book" at the bottom of each diary on the appointments page, then filling in the form on the next page in the process. The system to modify and cancel appointments has not yet been implemented.
6. Receptionists can add new receptionists and GP accounts to the system by filling in the form on the users page.
7. Receptionists can view the user profiles of patients by clicking "View all" and selecting a users profile. The search facility above the button has not yet been implemented.

## Next Release
- Protect application from XSS and SQL attacks and improve security on accessibility
- Implement ORM fully using the Active Record design pattern
- Improve GUI design and UX
- Build upon the booking system, adding modify and cancel to appointments
- Build search engine for patient profile
- Add patients appointment history to the user profile section for receptionists
- Allow patients to record additional secondary addresses and contact details 
- Add full functionality for clinicians
- Improve dashboard functionality for receptionists and patients