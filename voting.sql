DROP DATABASE IF EXISTS voting;
CREATE DATABASE voting;

Use voting;

DROP TABLE IF EXISTS candidates;
CREATE TABLE IF NOT EXISTS  candidates  (
   candidate_id   integer NOT NULL,
   election_id   integer DEFAULT NULL,
   name  varchar(255) DEFAULT NULL,
   photo  varchar(255) DEFAULT NULL,
  PRIMARY KEY ( candidate_id ),
  KEY  election_id  ( election_id )
);



DROP TABLE IF EXISTS  election ;
CREATE TABLE IF NOT EXISTS  election  (
   election_id  integer NOT NULL,
   title  varchar(255) DEFAULT NULL,
   description  varchar(255) DEFAULT NULL,
   start_date  date DEFAULT NULL,
   end_date  date DEFAULT NULL,
  PRIMARY KEY ( election_id )
);



DROP TABLE IF EXISTS  programs ;
CREATE TABLE IF NOT EXISTS  programs  (
   program_id       integer NOT NULL,
   candidate_id       integer DEFAULT NULL,
   program_title  varchar(255) DEFAULT NULL,
   program_description  varchar(255) DEFAULT NULL,
   program_video  varchar(255) DEFAULT NULL,
   program_affiche  varchar(255) DEFAULT NULL,
  PRIMARY KEY ( program_id ),
  KEY  candidate_id  ( candidate_id )
) ;



DROP TABLE IF EXISTS  user ;
CREATE TABLE IF NOT EXISTS  user  (
   user_id       integer NOT NULL,
   username  varchar(255) DEFAULT NULL,
   email  varchar(255) DEFAULT NULL,
   password  varchar(255) DEFAULT NULL,
   is_admin  integer DEFAULT NULL,
  PRIMARY KEY ( user_id )
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



DROP TABLE IF EXISTS  votes ;
CREATE TABLE IF NOT EXISTS  votes  (
   vote_id       integer NOT NULL,
   election_id       integer not NULL,
   user_id       integer DEFAULT NULL,
   encrypted_vote  varchar(255) not NULL,
   timestamp  timestamp NULL DEFAULT NULL,
  PRIMARY KEY ( vote_id ),
  KEY  election_id  ( election_id ),
  KEY  user_id  ( user_id )
);

