INSERT INTO `user` (username, email, password, name, surname) VALUES
('testuser', 'test@example.com', '$2y$10$eImiTXuWVxfM37uY4JANjQ8VVKf7A6xgZjwFqi/Nj3T4N0qP/a0z.', 'Gino', 'Pino');

INSERT INTO notification (id_user, `message`, is_read) VALUES
(9, 'Test notification', 0);

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
