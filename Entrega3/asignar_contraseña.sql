CREATE OR REPLACE FUNCTION insertar_contraseña (clave VARCHAR)
RETURNS void AS
$$
BEGIN
    UPDATE usuario set contraseña = clave WHERE usuario.contraseña IS NULL;
END
$$ language plpgsql