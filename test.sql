
    CREATE TABLE `user`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `title` VARCHAR(10),
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `roles` INT NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
    );

    CREATE TABLE `room`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `picture_url` VARCHAR(255),
    `country` VARCHAR(100),
    `city` VARCHAR(150),
    `address` VARCHAR(255),
    `zip_code` VARCHAR(15),
    `capacity` INT NOT NULL,
    `category` ENUM('réunion', 'bureau','formation','coworking') NOT NULL
    );

    CREATE TABLE `reservation`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `slot_id` INT NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
    );

    ALTER TABLE `reservation` 
    ADD FOREIGN KEY (`slot_id`) REFERENCES `slot`(`id`) ON DELETE NO ACTION,
    ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE NO ACTION;

    CREATE TABLE `feedback`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `room_id` INT NOT NULL,
    `comment` TEXT NOT NULL,
    `score` INT NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
    );

    ALTER TABLE `feedback` 
    ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE NO ACTION,
    ADD FOREIGN KEY (`room_id`) REFERENCES `room`(`id`) ON DELETE CASCADE;

    CREATE TABLE `slot`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `room_id` INT NOT NULL,
    `arrival_date` DATETIME NOT NULL,
    `departure_date` DATETIME NOT NULL,
    `price` FLOAT,
    `status` ENUM('libre','réservé') NOT NULL
    );

    ALTER TABLE `slot` ADD FOREIGN KEY (`room_id`) REFERENCES `room`(`id`) ON DELETE CASCADE;

SELECT * FROM `feedback, room, user` WHERE `feedback`.`room_id` = `room`.`id` AND `feedback`.`user_id` = `user`.`id` AND `room`.`id` = 1;

INSERT INTO `user` (`username`, `first_name`, `last_name`, `password`, `email`) VALUES ('raphael', 'raphael', 'alcantara', '1234','raphael@gmail.com');

$feed = $dbh->query("SELECT * 
FROM slot 
JOIN room  
ON slot.room_id = room.id 
JOIN feedback 
ON feedback.room_id = room.id 
WHERE slot.id = $_GET[id]
ORDER BY slot.arrival_date DESC");