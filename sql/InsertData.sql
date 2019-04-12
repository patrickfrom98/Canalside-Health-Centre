INSERT INTO mvc_user (user_id, username, password) VALUES
  (1, "p-thompson", "$2y$10$YRLjhMptb5hQV6l3A/dn8e9z2msJkoVMMS1TPHQMlI5z9U.cBkiqu"),
  (2, "w-watson", "$2y$10$YRLjhMptb5hQV6l3A/dn8e9z2msJkoVMMS1TPHQMlI5z9U.cBkiqu"),
  (3, "r-dodd", "$2y$10$YRLjhMptb5hQV6l3A/dn8e9z2msJkoVMMS1TPHQMlI5z9U.cBkiqu"),
  (4, "h-hamdani", "$2y$10$YRLjhMptb5hQV6l3A/dn8e9z2msJkoVMMS1TPHQMlI5z9U.cBkiqu"),
  (5, "l-mossy", "$2y$10$YRLjhMptb5hQV6l3A/dn8e9z2msJkoVMMS1TPHQMlI5z9U.cBkiqu");


INSERT INTO mvc_role (user_id, role) VALUES
  (1, "Receptionist"),
  (2, "Patient"),
  (3, "Patient"),
  (4, "Patient"),
  (5, "Patient");


INSERT INTO mvc_patient (patient_id, user_id, title, gender, forename, surname) VALUES
  ("8GOL4BG8VR6RZLRV", 2, "Mrs", "F", "Wendy", "Watson"),
  ("LGGL6RANBP4RE82H", 3, "Mr", "M", "Richard", "Dodd"),
  ("68D088C7OPKMAY4Y", 4, "Master", "M", "Hugo", "Hamdani"),
  ("2QY8H0QTKZQSMGP6", 5, "Miss", "F", "Laura", "Mossy"),
  ("PTU3467YTSP110Q1", NULL, "Miss", "F", "Ellie", "Appleton"),
  ("CHS265780T6YQ38P", NULL, "Mr", "M", "Roger", "Stevens");


INSERT INTO mvc_address (patient_id, address_1, address_2, town, county, postcode) VALUES
  ("8GOL4BG8VR6RZLRV", "32 Spring Road", "Bradley", "Huddersfield", "West Yorkshire", "HD2 1QL"),
  ("LGGL6RANBP4RE82H", "32 Spring Road", "Bradley", "Huddersfield", "West Yorkshire", "HD2 1QL"),
  ("68D088C7OPKMAY4Y", "32 Spring Road", "Bradley", "Huddersfield", "West Yorkshire", "HD2 1QL"),
  ("2QY8H0QTKZQSMGP6", "2 Colby Avenue", "Fixby", "Huddersfield", "West Yorkshire", "HD1 1LR"),
  ("PTU3467YTSP110Q1", "16 Porcelly Road", "Birkby", "Huddersfield", "West Yorkshire", "HD2 7PR"),
  ("CHS265780T6YQ38P", "122 Bowlden Road", "Fartown", "Huddersfield", "West Yorkshire", "HD1 3RR");


INSERT INTO mvc_contact (patient_id, mobile, landline, email) VALUES
  ("8GOL4BG8VR6RZLRV", "07918253140", "01484402344", "w.thompson@hotmail.com"),
  ("LGGL6RANBP4RE82H", "07345900276", "01484402344", "r.thompson@gmail.com"),
  ("68D088C7OPKMAY4Y", "07882281340", "01484402344", "h.thompson@gmail.com"),
  ("2QY8H0QTKZQSMGP6", "07945887828", "01676356790", "l.williamson@hotmail.co.uk"),
  ("PTU3467YTSP110Q1", "07919333448", "01484997096", "e.appleton@gmail.com"),
  ("CHS265780T6YQ38P", "07333485967", "01484992402", "r.stevens@virginmedia.com");


INSERT INTO mvc_diary (diary_id, diary_name, diary_date, clinician_name, start_time, end_time) VALUES
  (1, "Dr Hoggle 08:00 - 12:00", "2019-04-11", "Dr Hoggle", "08:00", "12:00"),
  (2, "Dr Chan 12:00 - 18:00", "2019-04-11", "Dr Chan", "12:00", "18:00"),
  (3, "Dr Smith 09:00 - 14:00", "2019-04-11", "Dr Smith", "09:00", "14:00"),
  (4, "Dr Felding 08:00 - 18:00", "2019-04-11", "Dr Felding", "08:00", "18:00"),
  (5, "Mrs Kendrick 08:00 - 13:00", "2019-04-11", "Mrs Kendrick", "08:00", "13:00"),
  (6, "Dr Parkinson 13:00 - 16:00", "2019-04-11", "Dr Parkinson", "13:00", "16:00"),
  (7, "Dr Hoggle 08:00 - 12:00", "2019-04-12", "Dr Hoggle", "08:00", "12:00"),
  (8, "Dr Chan 12:00 - 18:00", "2019-04-12", "Dr Chan", "12:00", "18:00"),
  (9, "Dr Smith 09:00 - 14:00", "2019-04-12", "Dr Smith", "09:00", "14:00"),
  (10, "Dr Felding 08:00 - 18:00", "2019-04-12", "Dr Felding", "08:00", "18:00"),
  (11, "Mrs Kendrick 08:00 - 13:00", "2019-04-12", "Mrs Kendrick", "08:00", "13:00"),
  (12, "Dr Parkinson 13:00 - 16:00", "2019-04-12", "Dr Parkinson", "13:00", "16:00"),
  (13, "Dr Hoggle 08:00 - 12:00", "2019-04-13", "Dr Hoggle", "08:00", "12:00"),
  (14, "Dr Chan 12:00 - 18:00", "2019-04-13", "Dr Chan", "12:00", "18:00"),
  (15, "Dr Smith 09:00 - 14:00", "2019-04-13", "Dr Smith", "09:00", "14:00"),
  (16, "Dr Felding 08:00 - 18:00", "2019-04-13", "Dr Felding", "08:00", "18:00"),
  (17, "Mrs Kendrick 08:00 - 13:00", "2019-04-13", "Mrs Kendrick", "08:00", "13:00"),
  (18, "Dr Parkinson 13:00 - 16:00", "2019-04-13", "Dr Parkinson", "13:00", "16:00");


INSERT INTO mvc_appointment (appointment_id, appointment_time, patient_id, patient_name) VALUES
  (1, "08:00", "8GOL4BG8VR6RZLRV", "Mrs Wendy Watson"),
  (2, "08:15", "68D088C7OPKMAY4Y", "Master Hugo Hamdani"),
  (3, "08:30", "8GOL4BG8VR6RZLRV", "Mrs Wendy Watson"),
  (4, "08:45", "LGGL6RANBP4RE82H", "Mr Richard Dodd"),
  (5, "09:00", "2QY8H0QTKZQSMGP6", "Miss Laura Mossy"),
  (6, "13:15", "PTU3467YTSP110Q1", "Miss Ellie Appleton");


INSERT INTO mvc_diary_appointment (appointment_id, diary_id) VALUES
  (1, 7),
  (2, 7),
  (3, 7),
  (4, 7),
  (5, 7),
  (6, 8);