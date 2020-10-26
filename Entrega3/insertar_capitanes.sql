CREATE OR REPLACE FUNCTION insertar_capitanes ()
RETURNS void AS
$$
BEGIN
    INSERT INTO usuario SELECT pnombre, genero, nro_pasaporte, nacionalidad FROM personal
    WHERE es_capitan = 1;
END
$$ language plpgsql