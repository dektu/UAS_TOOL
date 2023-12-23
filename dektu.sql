CREATE DATABASE simahasiswa;
USE simahasiswa;
CREATE TABLE tbmahasiswa(
    nim CHAR(10) PRIMARY KEY NOT NULL,
    nama VARCHAR(255) NOT NULL,
    prodi VARCHAR(255) NOT NULL
);