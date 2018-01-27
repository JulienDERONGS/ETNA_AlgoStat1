#------------------------------------------------------------
#                 AlgoStat1 SQL creation statement
#------------------------------------------------------------

CREATE database IF NOT EXISTS       `algostat_db`
CHARACTER SET                       'utf8'
COLLATE                             'utf8_general_ci';
USE                                 `algostat`;

#------------------------------------------------------------
#                       Table: Sort type
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS          `sort_type` (
        sort_type_id                int auto_increment NOT NULL,
        sort_type_name              varchar(300),
        PRIMARY KEY                 (sort_type_id)
) ENGINE = InnoDB;

#------------------------------------------------------------
#                       Table: Stat
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS          `stat` (
        stat_id                     int auto_increment NOT NULL,
        FK_sort_type_id             int NOT NULL,
        stat_time                   float(5, 5),
        stat_cost                   int(10, 5),
        PRIMARY KEY                 (sort_id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Foreign Key attribute adding
#------------------------------------------------------------

ALTER TABLE Stat ADD CONSTRAINT FOREIGN KEY (FK_sort_type_id) REFERENCES sort_type(sort_type_id);
