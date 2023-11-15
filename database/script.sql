use `elecciones2023`;

select `voto` from `padron` 
where `dni` = "40319143";
  
-- Corrobora si el DNI existe
SELECT CASE WHEN EXISTS (SELECT 1 FROM `padron` where `dni` = '40319143') THEN '1' ELSE '0' END AS resultado;

SELECT `voto` FROM `padron` WHERE `dni` = "40319143";




INSERT INTO `urna` (`bregman`, `bullrich`, `massa`, `milei`, `schiaretti`, `blanco`) VALUES
(1, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `urna` (`massa`) VALUES ('1');

UPDATE `padron` SET `voto` = '0' WHERE `id` = (SELECT `id` FROM `padron` WHERE `dni` = '41221919');

select `id` from `padron`
where `dni` = "41221919";



INSERT INTO `padron` (`id`, `nombre`, `apellido`, `dni`) VALUES (NULL, 'Milagros Anahí', 'Pedernera Diaz', '41221919');