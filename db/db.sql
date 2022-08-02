SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE hr;

CREATE TABLE roles (
    id int not null AUTO_INCREMENT,
    rolename varchar(255),
    create_at timestamp,
    update_at timestamp,
    delete_at timestamp,
    PRIMARY KEY (id),
);

CREATE TABLE departments (
    id int not null AUTO_INCREMENT,
    deptname varchar(255),
    parent_id int,
    create_at timestamp,
    update_at timestamp,
    delete_at timestamp,
    PRIMARY KEY (id),
);

CREATE TABLE role_dept (
    id int not null AUTO_INCREMENT,
    role_id int,
    dept_id int,
    role_level int,
    PRIMARY KEY (id),
);

CREATE TABLE staffs (
    id int not null AUTO_INCREMENT,
    lastName varchar(255),
    firstName varchar(255),
    gender TINYINT (2),
    bday date,
    staff_address varchar(255),
    email varchar(255),
    phone int, 
    staff_status TINYINT,
    dept_id int ,
    role_id int ,
    avatar varchar (255), 
    is_admin int DEFAULT null, 
    create_at timestamp,
    update_at timestamp,
    delete_at timestamp,
    PRIMARY KEY (id),
    FOREIGN KEY (dept_id) REFERENCES departments(id),
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

INSERT INTO `staffs`(lastName,firstName,gender,bday,address,phone,is_admin)  VALUES ('My My','admin', '1','1997/17/06','Hanoi','000000000000',1 );

