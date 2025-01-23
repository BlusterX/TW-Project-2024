INSERT INTO `user` (username, email, password, name, surname) VALUES
('testuser', 'test@example.com', '$2y$10$eImiTXuWVxfM37uY4JANjQ8VVKf7A6xgZjwFqi/Nj3T4N0qP/a0z.', 'Gino', 'Pino');

INSERT INTO notification (id_user, `message`, is_read) VALUES
(9, 'Test notification', 0);

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('1996 Nintendo Console', 349.99, 5, 'La console Nintendo del 1996 è un classico senza tempo, perfetta per i collezionisti e gli appassionati di retrogaming.', '1996 Nintendo Console.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Nes Classic Edition', 99.99, 15, 'La NES Classic Edition ripropone i grandi classici Nintendo con un design retrò e giochi preinstallati.', 'Nes Classic Edition.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Nintendo 3DS Xl', 249.99, 8, 'Nintendo 3DS XL offre un display più grande e un’immersiva esperienza di gioco portatile, compatibile con tutti i giochi 3DS.', 'Nintendo 3DS Xl.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Nintendo Switch blue and red Controllers', 299.99, 12, 'La Nintendo Switch con Joy-Con blu e rosso offre un’esperienza di gioco versatile e coinvolgente, perfetta per ogni occasione.', 'nintendo switch blue and red Controllers.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Nintendo Switch Lite', 199.99, 10, 'Nintendo Switch Lite è la console portatile ideale per chi ama giocare ovunque con leggerezza e comodità.', 'Nintendo Switch Lite.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Nintendo Wii U', 259.99, 7, 'Nintendo Wii U unisce il divertimento della console tradizionale con funzionalità uniche del GamePad.', 'Nintendo Wii U.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Playstation PS3', 149.99, 20, 'Playstation 3 rivoluziona il gaming con grafica HD, giochi indimenticabili e funzionalità multimediali.', 'Playstation PS3.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Playstation PS4', 299.99, 18, 'Playstation 4 offre prestazioni elevate e una vasta libreria di giochi esclusivi e multiplayer.', 'Playstation PS4.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Playstation VR Headset', 349.99, 6, 'Il visore Playstation VR ti immerge in mondi virtuali incredibili per un’esperienza di gioco unica.', 'Playstation VR Headset.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('PlayStation', 79.99, 25, 'La console che ha definito un’era. PlayStation è un pezzo di storia del gaming.', 'Playstation.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Xbox Joystick', 59.99, 30, 'Joystick Xbox ergonomico e preciso, ideale per migliorare le tue performance di gioco.', 'Xbox Joystick.png');

INSERT INTO product (`name`, price, stock, `description`, img) VALUES
('Xbox One', 279.99, 10, 'Xbox One combina gaming, intrattenimento e streaming in una potente console.', 'Xbox One.png');
