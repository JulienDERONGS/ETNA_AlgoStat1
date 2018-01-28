#------------------------------------------------------------
#                 AlgoStat1 SQL creation statement
#------------------------------------------------------------

CREATE database IF NOT EXISTS       `algostat_db`
CHARACTER SET                       'utf8'
COLLATE                             'utf8_general_ci';
USE                                 `algostat_db`;

#------------------------------------------------------------
#                       Table: Sort type
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS          `Sort_type` (
        sort_type_id                int auto_increment NOT NULL,
        sort_type_name              varchar(300) NOT NULL,
        PRIMARY KEY                 (sort_type_id)
) ENGINE = InnoDB;

#------------------------------------------------------------
#                       Table: Stat
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS          `Stat` (
        stat_id                     int auto_increment NOT NULL,
        FK_sort_type_id             int NOT NULL,
        stat_time                   float(5, 5) NOT NULL,
        stat_cost                   int(10) NOT NULL,
        PRIMARY KEY                 (stat_id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Foreign Key attribute adding
#------------------------------------------------------------

ALTER TABLE Stat ADD CONSTRAINT FOREIGN KEY (FK_sort_type_id) REFERENCES Sort_type(sort_type_id);

INSERT INTO Sort_type (sort_type_name)
VALUES ("Insertion"), ("Selection"), ("Bubble");
