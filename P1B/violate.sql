-- Three primary key constraints
-- 1. Primary key cannot be NULL
-- ERROR 1048 (23000): Column 'id' cannot be null
INSERT INTO Movie
VALUES (NULL, "Furious 7", 2015, "PG-13", "Universal Picture Inc."  );

-- 2. Primary key id cannot be duplicated
-- ERROR 1062 (23000): Duplicate entry '1' for key 'PRIMARY'
INSERT INTO Actor
VALUES (1, "Hanjing", "Fang", "Female", 19921006, NULL);

-- 3. Only one primary key is permitted per table
-- ERROR 1068 (42000): Multiple primary key defined
ALTER TABLE Director ADD PRIMARY KEY (first, last);

-- Six referential integrity constraints
-- 4. Should delete referencing attributes in MovieDirector and MovieGenre first
-- EERROR 1451 (23000): Cannot delete or update a parent row: a foreign key constraint fails (`TEST`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
DELETE FROM Movie 
WHERE id = 4734;

-- 5. Should delete the referencing attribute in MovieActor first
-- ERROR 1451 (23000): Cannot delete or update a parent row: a foreign key constraint fails (`TEST`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`))
DELETE FROM Actor
WHERE id = 135;

-- 6. Should delete the referencing attribute in MovieDirector first
-- Cannot delete or update a parent row: a foreign key constraint fails (`TEST`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`))
DELETE FROM Director
WHERE id = 5563;

-- 7.Should update the referenced attribute in Actor first
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`))
UPDATE MovieActor
SET aid = aid + 1;

-- 8.Should update the referenced attribute in Movie first
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
UPDATE MovieGenre
SET mid = mid + 1
WHERE genre = "Sci-Fi";


-- 9.Should update the referenced attribute in Director first
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`))
UPDATE MovieDirector
SET did = 115
WHERE mid = 3;

-- Three CHECK constraints
-- 10. id cannot be negative 
INSERT INTO Movie
VALUES (-1, "Furious 7", 2015, "PG-13", "Universal Picture Inc."  );

-- 11. invalid dob
INSERT INTO Director
VALUES (70000, "Hanjing", "Fang", 18921006, NULL );

-- 12. invalid sex 
INSERT INTO Actor
VALUES (69626, "Hanjing", "Fang", "Fem5le", 19921006, NULL );