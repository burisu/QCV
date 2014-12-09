\connect - postgres
-- Tous utilisateurs
GRANT SELECT on personnes TO PUBLIC;
GRANT SELECT on typemultimedia TO PUBLIC;
GRANT SELECT on difficultes TO PUBLIC;
GRANT SELECT on pertinences TO PUBLIC;
GRANT SELECT on testtypes TO PUBLIC;
GRANT SELECT on refthemes TO PUBLIC;
GRANT SELECT on themes TO PUBLIC;
GRANT SELECT on questions TO PUBLIC;
GRANT SELECT on choix TO PUBLIC;
GRANT SELECT on multimedia TO PUBLIC;
GRANT SELECT on sujets TO PUBLIC;
GRANT SELECT on memoire TO PUBLIC;
GRANT SELECT on details TO PUBLIC;
-- Droit standard de saisie
GRANT SELECT on personnes TO GROUP contrib;
GRANT SELECT on typemultimedia TO GROUP contrib;
GRANT SELECT on difficultes TO GROUP contrib;
GRANT SELECT on pertinences TO GROUP contrib;
GRANT SELECT on testtypes TO GROUP contrib;
GRANT SELECT on refthemes TO GROUP contrib;
GRANT SELECT on themes TO GROUP contrib;
GRANT SELECT on questions TO GROUP contrib;
GRANT SELECT on choix TO GROUP contrib;
GRANT SELECT on multimedia TO GROUP contrib;
GRANT SELECT on sujets TO GROUP contrib;
GRANT SELECT on memoire TO GROUP contrib;
GRANT SELECT on details TO GROUP contrib;
-- Exceptions
GRANT INSERT on questions TO GROUP contrib;
-- Masters: 
GRANT SELECT,INSERT,UPDATE on personnes TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on typemultimedia TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on difficultes TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on pertinences TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on testtypes TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on refthemes TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on themes TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on questions TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on choix TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on multimedia TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on sujets TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on memoire TO GROUP contrib;
GRANT SELECT,INSERT,UPDATE on details TO GROUP contrib;
-- Exceptions
GRANT INSERT,UPDATE on questions TO GROUP master;
REVOKE INSERT,UPDATE on memoire FROM GROUP master;
-- Administrateur des tables de référence
GRANT SELECT,INSERT,UPDATE on personnes TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on typemultimedia TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on difficultes TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on pertinences TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on testtypes TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on refthemes TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on themes TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on questions TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on choix TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on multimedia TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on sujets TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on memoire TO GROUP admin;
GRANT SELECT,INSERT,UPDATE on details TO GROUP admin;
