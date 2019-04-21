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
  ("CHS0000000000000", 2, "Mrs", "F", "Wendy", "Watson"),
  ("CHS0000000000001", 3, "Mr", "M", "Richard", "Dodd"),
  ("CHS0000000000002", 4, "Master", "M", "Hugo", "Hamdani"),
  ("CHS0000000000003", 5, "Miss", "F", "Laura", "Mossy"),
  ("CHS0000000000004", NULL, "Miss", "F", "Ellie", "Appleton"),
  ("CHS0000000000005", NULL, "Mr", "M", "Roger", "Stevens");


INSERT INTO mvc_address (patient_id, address_1, address_2, town, county, postcode) VALUES
  ("CHS0000000000000", "32 Spring Road", "Bradley", "Huddersfield", "West Yorkshire", "HD2 1QL"),
  ("CHS0000000000001", "32 Spring Road", "Bradley", "Huddersfield", "West Yorkshire", "HD2 1QL"),
  ("CHS0000000000002", "32 Spring Road", "Bradley", "Huddersfield", "West Yorkshire", "HD2 1QL"),
  ("CHS0000000000003", "2 Colby Avenue", "Fixby", "Huddersfield", "West Yorkshire", "HD1 1LR"),
  ("CHS0000000000004", "16 Porcelly Road", "Birkby", "Huddersfield", "West Yorkshire", "HD2 7PR"),
  ("CHS0000000000005", "122 Bowlden Road", "Fartown", "Huddersfield", "West Yorkshire", "HD1 3RR");


INSERT INTO mvc_contact (patient_id, mobile, landline, email) VALUES
  ("CHS0000000000000", "07918253140", "01484402344", "w.thompson@hotmail.com"),
  ("CHS0000000000001", "07345900276", "01484402344", "r.thompson@gmail.com"),
  ("CHS0000000000002", "07882281340", "01484402344", "h.thompson@gmail.com"),
  ("CHS0000000000003", "07945887828", "01676356790", "l.williamson@hotmail.co.uk"),
  ("CHS0000000000004", "07919333448", "01484997096", "e.appleton@gmail.com"),
  ("CHS0000000000005", "07333485967", "01484992402", "r.stevens@virginmedia.com");


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
  (1, "08:00", "CHS0000000000000", "Mrs Wendy Watson"),
  (2, "08:15", "CHS0000000000002", "Master Hugo Hamdani"),
  (3, "08:30", "CHS0000000000000", "Mrs Wendy Watson"),
  (4, "08:45", "CHS0000000000001", "Mr Richard Dodd"),
  (5, "09:00", "CHS0000000000003", "Miss Laura Mossy"),
  (6, "13:15", "CHS0000000000004", "Miss Ellie Appleton");


INSERT INTO mvc_diary_appointment (appointment_id, diary_id) VALUES
  (1, 7),
  (2, 7),
  (3, 7),
  (4, 7),
  (5, 7),
  (6, 8);