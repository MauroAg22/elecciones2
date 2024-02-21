-- Instrucciones para gestionar las votaciones.

UPDATE `padron` SET `voto` = 0; -- Resetea todos los votos de las personas

DELETE FROM `urna`; -- Borra todos los votos

UPDATE `votacion` SET `estado` = 1 WHERE `id` = 1; -- Inicia las votaciones

UPDATE `votacion` SET `estado` = 0 WHERE `id` = 1; -- Finaliza las votaciones

select `estado` from `votacion`; -- Pregunta si la votación está en curso