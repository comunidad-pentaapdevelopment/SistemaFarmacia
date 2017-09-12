SELECT 
	`id`,`nombre`,`direccion`,`telefono`,`latitud`,`longitud`,`estaPago`,`localidad`,`turno`, 
	IF(`distanciaKmTwoDec` < 1,CONCAT(`distanciaKmTwoDec` * 1000, " Metros"),CONCAT(CAST(`distanciaKmTwoDec` AS DECIMAL(16,2)), " KM")) as DistanciaAMostrar,
    `distanciaKmTwoDec`
FROM
(
    SELECT *,CAST(`distanciaKm` AS DECIMAL(16,3)) as distanciaKmTwoDec
    FROM 
    (
        SELECT *, (acos(sin(radians(-26.82925200000000)) * sin(radians(`latitud`)) + cos(radians(-26.82925200000000)) * 		
        cos(radians(`latitud`)) * cos(radians(-65.19972300000000) - radians(`longitud`))) * 6371) as distanciaKm FROM `farmacias` ORDER 		BY distanciaKm
    ) as FarmaciasConDistancia
) as FarmaciasCercaMio