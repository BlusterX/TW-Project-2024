CREATE TABLE IF NOT EXISTS `user` (
    id_user INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(512) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (`id_user`),
    UNIQUE KEY (`username`)
) ENGINE = InnoDB;
  
CREATE TABLE IF NOT EXISTS product (
	id_product INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    `description` TEXT,
    img VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id_product`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS cart (
    id_cart INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    PRIMARY KEY (`id_cart`),
    FOREIGN KEY (`id_user`) REFERENCES user(`id_user`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS cart_product (
    id_cart INT NOT NULL,
    id_product INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    PRIMARY KEY (`id_cart`, `id_product`),
    FOREIGN KEY (`id_cart`) REFERENCES cart(`id_cart`),
    FOREIGN KEY (`id_product`) REFERENCES product(`id_product`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `order` (
    id_order INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`id_order`),
    FOREIGN KEY (`id_user`) REFERENCES user(`id_user`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS notification (
    id_notification INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    `message` TEXT NOT NULL,
    is_read BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (`id_notification`),
    FOREIGN KEY (`id_user`) REFERENCES user(`id_user`)
) ENGINE = InnoDB;
