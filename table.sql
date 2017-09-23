use jadrn009;

drop table if exists person;

create table person(
    id int AUTO_INCREMENT PRIMARY KEY,
    fname varchar(30) NOT NULL,
    mname varchar(30) NOT NULL,
    lname varchar(30) NOT NULL,
    address1 varchar(40) NOT NULL,
    address2 varchar(40) NOT NULL,
    city varchar(30) NOT NULL,
    state varchar(15) NOT NULL,
    zip varchar(15) NOT NULL,
    phone varchar(15) NOT NULL,
    email varchar(40) NOT NULL,
    gender varchar(10) NOT NULL,
    dob varchar(10) NOT NULL,
    experience varchar(15) NOT NULL,
    category varchar(15) NOT NULL,
    medical varchar(200) NOT NULL,
	image varchar(100) NOT NULL);
    
INSERT INTO person VALUES(0,'Jim','Brian','Robeson','3456 30th St','','San Diego','CA','92104','805-143433','jrobeson@yahoo.com','Male','05-15-1992','novice','Teen','none','office_worker_1.jpeg');    
INSERT INTO person VALUES(0,'Robert','Bobert','Jones','1512 Abbott St','Apartment 3','San Diego','California','92106','1112346789','rjones@gmail.com','Male','02-21-1968','expert','Adult','Sore throat','office_worker_2.jpeg');
INSERT INTO person VALUES(0,'Sarah','BoBarah','Joseph','9339 Via Rapida St','Apt. 6','San Jose','CA','92111','619-916-6916','sjoseph22@yahoo.com','Female','01-01-1987','experienced','Adult','none','office_worker_3.jpeg');
INSERT INTO person VALUES(0,'Bill','Bo','Krump','1445 Camino Del Rio','','San Diego','CA','92108','805-448-9090','bkrmp@gmail.com','Male','04-04-1970','novice','Adult','Restless leg syndrome','office_worker_4.jpeg');
INSERT INTO person VALUES(0,'Sally','Renee','Reese','2910 Market St','Apt. 9','San Diego','CA','92101','619-236-0000','sallyR@cox.net','Female','02-19-1954','expert','Senior','none','office_worker_5.jpeg');