INSERT INTO `user` (username, email, `password`, `name`, surname, is_admin) VALUES
('admin', 'admin@example.it', '$2y$10$0qmNsbN2TY0qsujQ53.2uu94QOuGd2SCk5gqaHGB7bL/SzHPWam.S', 'Admin', 'Admin', 1),
('gferrari', 'gferrari@example.it', '$2y$10$KLjjplhDaajPmi8/jydhx.L0Rq7K727J0DGfz4fOHEkO36eNE1Cs.', 'Giulia', 'Ferrari', 0),
('sandreatti', 'sandreatti@example.it', '$2y$10$WduRoRvGSpFpqRy/gG6gVOX5OdR/r7viW4bZTY4HB3WX0OuxQCeKu', 'Simone', 'Andreatti', 0),
('mromano', 'mromano@example.it', '$2y$10$TKkhrzV.fNgA4Zg4LKUfD.DT75BH3wlKC6hnkTokI.eNg5I.Hzqt6' , 'Martina', 'Romano', 0),
('fdonnini', 'fdonnini@example.it', '$2y$10$DZL2i3LtEnGmZXS/RpXiXeObIQJP7SF1Q/8KzizpnZMXKpaXXJOeG', 'Fabio', 'Donnini', 0);

INSERT INTO notification (id_user, `message`, is_read) VALUES
(1, 'Test notification', 0);
(1, 'Test 2 notification', 0);
(1, 'Test 3 notification', 0);
(1, 'Test 4 notification', 0);

INSERT INTO cart (id_user) VALUES
(1),
(2),
(3),
(4),
(5);

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('1996 Nintendo Console', 349.99, 5, 'La console Nintendo del 1996 è un classico senza tempo, perfetta per i collezionisti e gli appassionati di retrogaming.', '1996_nintendo_console.png');
('Nes Classic Edition', 99.99, 15, 'La NES Classic Edition ripropone i grandi classici Nintendo con un design retrò e giochi preinstallati.', 'nes_classic_edition.png');
('Nintendo 3DS Xl', 249.99, 8, 'Nintendo 3DS XL offre un display più grande e un’immersiva esperienza di gioco portatile, compatibile con tutti i giochi 3DS.', 'nintendo_3ds_xl.png');
('Nintendo Switch blue and red Controllers', 299.99, 12, 'La Nintendo Switch con Joy-Con blu e rosso offre un’esperienza di gioco versatile e coinvolgente, perfetta per ogni occasione.', 'nintendo_switch_br_controllers.png');
('Nintendo Switch Lite', 199.99, 10, 'Nintendo Switch Lite è la console portatile ideale per chi ama giocare ovunque con leggerezza e comodità.', 'nintendo_switch_lite.png');
('Nintendo Wii U', 259.99, 7, 'Nintendo Wii U unisce il divertimento della console tradizionale con funzionalità uniche del GamePad.', 'nintendo_wii_u.png');
('Playstation PS3', 149.99, 20, 'Playstation 3 rivoluziona il gaming con grafica HD, giochi indimenticabili e funzionalità multimediali.', 'playstation_ps3.png');
('Playstation PS4', 299.99, 18, 'Playstation 4 offre prestazioni elevate e una vasta libreria di giochi esclusivi e multiplayer.', 'playstation_ps4.png');
('Playstation VR Headset', 349.99, 6, 'Il visore Playstation VR ti immerge in mondi virtuali incredibili per un’esperienza di gioco unica.', 'playstation_vr_headset.png');
('PlayStation', 79.99, 25, 'La console che ha definito un’era. PlayStation è un pezzo di storia del gaming.', 'playstation.png');
('Xbox Joystick', 59.99, 30, 'Joystick Xbox ergonomico e preciso, ideale per migliorare le tue performance di gioco.', 'xbox_joystick.png');
('Xbox One', 279.99, 10, 'Xbox One combina gaming, intrattenimento e streaming in una potente console.', 'xbox_one.png');
