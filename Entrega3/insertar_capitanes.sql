CREATE OR REPLACE FUNCTION insertar_capitanes ()
RETURNS void AS
$$
BEGIN
    INSERT INTO usuario SELECT nro_pasaporte, pnombre, edad, genero, nacionalidad FROM personal
    WHERE es_capitan = 1;
END
$$ language plpgsql