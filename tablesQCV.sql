-- \connect - postgres
CREATE SEQUENCE "no_quest";
CREATE SEQUENCE "no_test";

CREATE TABLE "personnes" (
	"nom" character varying(40) PRIMARY KEY,
	"mail" character varying(64) NOT NULL DEFAULT '?');

CREATE TABLE "typemultimedia" (
	"typmmd" character varying(24) PRIMARY KEY);

CREATE TABLE "difficultes" (
	"difficulte" int4 PRIMARY KEY,
	"libdiff" character varying(44));

CREATE TABLE "pertinences" (
	"pertinence" int4 PRIMARY KEY,
	"libpert" character varying(44));

CREATE TABLE "humour" (
	"humour" int4 PRIMARY KEY,
	"libhum" character varying(44));

CREATE TABLE "testtypes" (
	"testtype" character varying(24) PRIMARY KEY,	
	"libtype" character varying(44));

CREATE TABLE "refthemes" (
	"themes" character varying(80) PRIMARY KEY,
	"valideur" character varying(40) REFERENCES personnes ON UPDATE CASCADE);

CREATE TABLE "themes" (
	"theme" character varying(80) PRIMARY KEY REFERENCES refthemes,
	"themesup" character varying(80) REFERENCES refthemes);

CREATE TABLE "questions" (
	"noq" int4 PRIMARY KEY DEFAULT nextval('no_quest'),
	"question" text,
	"reponse" text,
	"auteur" character varying(40) DEFAULT CURRENT_USER, -- pas de FK
	"valideur" character varying(40) REFERENCES personnes ON UPDATE CASCADE,
	"date" date DEFAULT CURRENT_DATE );

CREATE TABLE "choix" (
	"noq" int4 REFERENCES "questions",
	"noc" int4 CHECK (noc between 1 and 99),
	"val" int4 NOT NULL DEFAULT 0,
	"choix" character varying(256),
	"comment" character varying(80),
	"humour" int4 REFERENCES "humour" DEFAULT 0),
	"valideur" character varying(40) REFERENCES personnes ON UPDATE CASCADE,
	"date" date DEFAULT CURRENT_DATE ),
	PRIMARY KEY (noq,noc));

CREATE TABLE "multimedia" (
	"noq" int4 REFERENCES "questions",
	"typmmd" character varying(24) REFERENCES "typemultimedia",
	"url" character varying(128),
	"legende" character varying(80));

CREATE TABLE "sujets" (
	"noq" int4 REFERENCES "questions",
	"theme" character varying(80) REFERENCES "themes" ,
	"pertinence" int4 REFERENCES "pertinences" DEFAULT 9 ,
	"difficulte" int4 REFERENCES "difficultes" DEFAULT 9),
	"humour" int4 REFERENCES "humour" DEFAULT 0);

CREATE TABLE "memoire" (
	"notest" int4 PRIMARY KEY DEFAULT nextval('no_test'),
	"utilisateur" character varying(40) REFERENCES personnes ON UPDATE CASCADE,
	"theme" character varying(80) REFERENCES "themes",
	"nbq"   int4 NOT NULL DEFAULT 0,
	"score" int4 NOT NULL DEFAULT 0,
	"ideal" int4 NOT NULL DEFAULT 0,
	"duree" INTERVAL,
	"datedeb" timestamp  DEFAULT CURRENT_TIMESTAMP,
	"datefin" timestamp  DEFAULT CURRENT_TIMESTAMP,
	"pertinence" int4 REFERENCES "pertinences" DEFAULT 0,
	"difficulte" int4 REFERENCES "difficultes" DEFAULT 0,
	"testtype" character varying(24) REFERENCES "testtypes" );	

CREATE TABLE "details" (
	"utilisateur" character varying(40) REFERENCES personnes ON UPDATE CASCADE,
	"datetest" date  DEFAULT CURRENT_DATE,
	"noq" int4 REFERENCES "questions",
	"notest" int4 REFERENCES "memoire",
	"score"int4 NOT NULL DEFAULT 0); -- (note_max - resultat)

CREATE FUNCTION calc_duree(timestamp,timestamp)
RETURNS interval
AS 'SELECT CAST(($1 - $2) AS INTERVAL);'
LANGUAGE 'SQL';

