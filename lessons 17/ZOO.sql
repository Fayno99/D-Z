USE ZOO;
CREATE TABLE `animals`(
                          `id` INT AUTO_INCREMENT,
                          name VARCHAR(255) NOT NULL,
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                          update_at  TIMESTAMP DEFAULT
                                                           CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                          PRIMARY KEY (id)

);

CREATE TABLE `food_animal`(
                              `id` INT AUTO_INCREMENT,
                              `animal_feed_id` INT NOT NULL,
                              `animal_id` INT NOT NULL,
                              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                              update_at  TIMESTAMP DEFAULT
                                                               CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                              PRIMARY KEY (id)
);

CREATE TABLE `food`(
                       `id` INT AUTO_INCREMENT,
                       `animal_feed` VARCHAR(255) NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       update_at  TIMESTAMP DEFAULT
                                                        CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                       PRIMARY KEY (id)
);


CREATE TABLE `supervisor`(
                             `id` INT AUTO_INCREMENT,
                             `supervisor_id` INT NOT NULL,
                             `animals_id` INT NOT NULL,
                             created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                             update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                             time  TIMESTAMP DEFAULT
                                                              CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                             PRIMARY KEY (id)
);


CREATE TABLE `emplooyee`(
                            `id` INT AUTO_INCREMENT,
                            `name` VARCHAR(255) NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            update_at  TIMESTAMP DEFAULT
                                                             CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            PRIMARY KEY (id)
);
ALTER TABLE
    `supervisor` ADD CONSTRAINT `supervisor_supervisor_id_foreign` FOREIGN KEY(`supervisor_id`) REFERENCES `emplooyee`(`id`);
ALTER TABLE
    `supervisor` ADD CONSTRAINT `supervisor_animals_id_foreign` FOREIGN KEY(`animals_id`) REFERENCES `animals`(`id`);
ALTER TABLE
    `food_animal` ADD CONSTRAINT `food_animal_id_foreign` FOREIGN KEY(`animal_id`) REFERENCES `animals`(`id`);
ALTER TABLE
    `food_animal` ADD CONSTRAINT `food_animal_animal_feed_id_foreign` FOREIGN KEY(`animal_feed_id`) REFERENCES `food`(`id`);

