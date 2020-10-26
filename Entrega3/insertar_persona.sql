CREATE OR REPLACE FUNCTION insertar_persona (nombre VARCHAR, sexo VARCHAR, nro_pasaporte VARCHAR, nacionalidad VARCHAR, clave VARCHAR)
RETURNS void AS
$$
BEGIN
    INSERT INTO usuario VALUES (nombre, sexo, nro_pasaporte, nacionalidad, clave);
END
$$ language plpgsql