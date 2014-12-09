Pour info.... vient d'ailleurs


CREATE FUNCTION Class_Type(text) RETURNS text AS '
	SELECT class FROM Tbtype
	WHERE type = $1;'
LANGUAGE 'plpgsql';

CREATE TRIGGER trg_Class_Type(text) RETURNS text AS '
	SELECT Class_Empl FROM Tbxxx
	WHERE type = $1;'
LANGUAGE 'plpgsql';

CREATE FUNCTION Archiv_Site() RETURNS OPAQUE AS '
BEGIN IF NEW.texte != OLD.texte THEN
                      INSERT INTO archive(id, date_modif, texte)
                      VALUES (OLD.id,OLD.date_modif,OLD.texte);
           END IF;
           RETURN NEW;
END;'
LANGUAGE 'plpgsql';

CREATE TRIGGER trg_Archiv_Site 
	BEFORE INSERT OR DELETE OR UPDATE ON Tbsite
	FOR EACH ROW EXECUTE PROCEDURE Archiv_Site();
