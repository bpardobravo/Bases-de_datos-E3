CREATE OR REPLACE FUNCTION insertar_capitanes ()
RETURNS void AS
$$
BEGIN
    INSERT INTO usuario (nro_pasaporte, unombre, edad, sexo, nacionalidad) SELECT nro_pasaporte, pnombre, edad, genero, nacionalidad FROM personal
    WHERE es_capitan = 1;
END
$$ language plpgsql
