CREATE TABLE Movie
(
	id INT NOT NULL,
	title VARCHAR(100) NOT NULL,
	year INT, 
	rating VARCHAR(10), 
	company VARCHAR(50),
    PRIMARY KEY(id),                            -- id is the primary key of Movie
    CHECK (id > 0 AND year > 1900 )             -- check whether id is positive and year is valid
)ENGINE = INNODB;

CREATE TABLE Actor
(
	id INT NOT NULL, 
	last VARCHAR(20), 
	first VARCHAR(20), 
	sex VARCHAR(6), 
	dob DATE NOT NULL, 
	dod DATE,
	PRIMARY KEY(id),                                       -- id is the primary key of Actor   
	CHECK (id > 0 AND dob > 19000000 AND dod > 19000000),  -- check whether the dates are valid   
	CHECK (sex = "Male" OR sex = "FEMALE")                                            
)ENGINE = INNODB;

CREATE TABLE Director
(
	id INT NOT NULL, 
	last VARCHAR(20), 
	first VARCHAR(20), 
	dob DATE NOT NULL, 
	dod DATE,
	PRIMARY KEY(id),                                       -- id is the primary key of Director
	CHECK (id >0 AND dob > 19000000 AND dod > 19000000)    -- check whether the dates are valid
)ENGINE = INNODB;

CREATE TABLE MovieGenre
(
	mid INT NOT NULL,                          
	genre VARCHAR(20),
	-- PRIMARY KEY(mid),
    FOREIGN KEY (mid) REFERENCES Movie(id)   -- mid is the Foreign key of MovieGenre, referecing id in Movie
)ENGINE = INNODB;

CREATE TABLE MovieDirector
(
	mid INT, 
	did INT,
	-- PRIMARY KEY(mid,did),
	FOREIGN KEY (mid) REFERENCES Movie(id),    -- mid is the Foreign key of MovieDirector, referecing id in Movie
	FOREIGN KEY (did) REFERENCES Director(id)  -- did is the Foreign key of MovieDirector, referecing id in Director
)ENGINE = INNODB;

CREATE TABLE MovieActor
(
    mid INT, 
    aid INT,
    role VARCHAR(50),
    PRIMARY KEY(mid,aid),
    FOREIGN KEY (mid) REFERENCES Movie(id),    -- mid is the Foreign key of MovieActor, referecing id in Movie
    FOREIGN KEY (aid) REFERENCES Actor(id)     -- aid is the Foreign key of MovieActor, referecing id in Actor
)ENGINE = INNODB;

CREATE TABLE Review
(
    name VARCHAR(20), 
    time TIMESTAMP, 
	mid INT, 
	rating INT, 
	comment VARCHAR(500),
	PRIMARY KEY(mid,name,time),
	FOREIGN KEY(mid) REFERENCES Movie(id)      -- mid is the Foreign key of Review referecing id in Movie
)ENGINE = INNODB;

CREATE TABLE MaxPersonID 
(
	id INT
	-- PRIMARY KEY(id)
)ENGINE = INNODB;

CREATE TABLE MaxMovieID
(
	id INT
	-- PRIMARY KEY(id)
)ENGINE = INNODB;