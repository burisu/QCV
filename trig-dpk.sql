-- =========================================================================
-- Triggers and functions - Pierre Jarillon - 2005-07-19 - 16:00
-- =========================================================================

-- tlocapack ----------------------------------------------------------------

CREATE OR REPLACE FUNCTION histolocapack() RETURNS TRIGGER AS $thistlocapack$
BEGIN
          
  IF (TG_OP = 'UPDATE') THEN
	INSERT INTO thistlocapack SELECT OLD.*, now();
  	RETURN NEW;
  ELSIF (TG_OP = 'DELETE') THEN
	INSERT INTO thistlocapack SELECT OLD.*, now();
  END IF;
  RETURN OLD;
END;
$thistlocapack$ language plpgsql;

CREATE TRIGGER thistlocapack 
  AFTER UPDATE OR DELETE ON tlocapack 
  FOR EACH ROW EXECUTE PROCEDURE histolocapack();

-- tlocapict ----------------------------------------------------------------

CREATE OR REPLACE FUNCTION histolocapict() RETURNS TRIGGER AS $thistlocapict$
BEGIN
          
  IF (TG_OP = 'UPDATE') THEN
	INSERT INTO thistlocapict SELECT OLD.*, now();
  	RETURN NEW;
  ELSIF (TG_OP = 'DELETE') THEN
	INSERT INTO thistlocapict SELECT OLD.*, now();
  END IF;
  RETURN OLD;
END;
$thistlocapict$ language plpgsql;

CREATE TRIGGER thistlocapict 
  AFTER UPDATE OR DELETE ON tlocapict 
  FOR EACH ROW EXECUTE PROCEDURE histolocapict();

-- tpackage------------------------------------------------------------------
-- Functions necessary to check useful redundancy in tpackage

CREATE OR REPLACE FUNCTION checkfree() RETURNS TRIGGER AS $freeok$
DECLARE
	enreg RECORD;
BEGIN
	IF NEW.lictype IS NULL THEN
            NEW.lictype :='unkno';
        END IF;	
	SELECT INTO enreg * FROM tlicence WHERE lictype = NEW.lictype;
	IF NOT FOUND THEN
		NEW.free := 'U';
		NEW.lictype := 'unkno';
	ELSE
		NEW.free := enreg.free;
	END IF;
	RETURN NEW;
END;
$freeok$ language plpgsql;

CREATE TRIGGER freeok
  BEFORE INSERT OR UPDATE ON tpackage
  FOR EACH ROW EXECUTE PROCEDURE checkfree();

-- =========================================================================
