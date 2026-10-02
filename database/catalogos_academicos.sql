-- =============================================================================
-- Catálogos académicos: periodos y programas (carreras)
-- Base de datos: superarse_db (MySQL 8)
-- Fuente: periodos.xlsx y Programas.xlsx (exportados del sistema académico)
--
-- Columnas de control propias del sitio web:
--   visible_formularios -> 1 = aparece en los <select> de los formularios
--   es_actual           -> 1 = periodo académico vigente (solo uno)
--   nombre_web          -> nombre mostrado en formularios (programas); los
--                          programas con el mismo nombre_web salen una sola vez
-- Para agregar/quitar opciones de los formularios basta con editar estas
-- tablas; no hace falta tocar el código.
-- =============================================================================

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS periodos_academicos (
    id                    INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre                VARCHAR(120) NOT NULL,
    fecha_inicio          DATE         NOT NULL,
    fecha_fin             DATE         NOT NULL,
    inactivar_estudiantes TINYINT(1)   NULL DEFAULT NULL,
    ordenamiento          INT UNSIGNED NOT NULL DEFAULT 0,
    estado                ENUM('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
    visible_formularios   TINYINT(1)   NOT NULL DEFAULT 0,
    es_actual             TINYINT(1)   NOT NULL DEFAULT 0,
    created_at            TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at            TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_periodos_nombre (nombre),
    KEY idx_periodos_estado_orden (estado, ordenamiento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS programas_academicos (
    id                       INT UNSIGNED NOT NULL AUTO_INCREMENT,
    codigo                   VARCHAR(40)  NOT NULL,
    nombre                   VARCHAR(150) NOT NULL,
    nombre_q10               VARCHAR(150) NULL,
    nombre_web               VARCHAR(150) NULL COMMENT 'Nombre en formularios; agrupa sedes (ALP/MATRIZ). NULL = usa nombre',
    resolucion_autorizacion  VARCHAR(60)  NULL,
    fecha_resolucion         DATE         NULL,
    tipo_evaluacion          VARCHAR(30)  NOT NULL DEFAULT 'Cuantitativo',
    categoria                VARCHAR(120) NULL,
    aplica_grupos            TINYINT(1)   NOT NULL DEFAULT 1,
    aplica_preinscripciones  TINYINT(1)   NOT NULL DEFAULT 1,
    estado                   ENUM('Activo','Inactivo') NOT NULL DEFAULT 'Activo',
    visible_formularios      TINYINT(1)   NOT NULL DEFAULT 1,
    created_at               TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at               TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_programas_codigo (codigo),
    KEY idx_programas_estado_nombre (estado, nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Periodos ---------------------------------------------------------------
INSERT INTO periodos_academicos
    (nombre, fecha_inicio, fecha_fin, inactivar_estudiantes, ordenamiento, estado, visible_formularios, es_actual)
VALUES
    ('PAE MAYO - JUNIO-2026', '2026-05-01', '2026-06-01', NULL, 18, 'Activo', 0, 0),
    ('PAO MAYO - OCTUBRE 2026', '2026-05-25', '2026-10-26', NULL, 17, 'Activo', 1, 1),
    ('PAO NOVIEMBRE 2025 - ABRIL 2026', '2025-11-17', '2026-04-12', NULL, 16, 'Activo', 0, 0),
    ('PAO MAY-OCT 2025', '2025-06-09', '2025-10-18', NULL, 15, 'Activo', 0, 0),
    ('PAO NOVIEMBRE 2024-ABRIL 2025', '2024-11-11', '2025-05-11', NULL, 14, 'Activo', 0, 0),
    ('PAO MAYO-OCTUBRE 2024', '2024-06-03', '2024-11-03', NULL, 13, 'Activo', 0, 0),
    ('PAO NOVIEMBRE 2023-ABRIL 2024', '2023-11-13', '2024-04-07', NULL, 12, 'Activo', 0, 0),
    ('PAO MAYO-SEPTIEMBRE 2023', '2023-05-08', '2023-09-24', NULL, 11, 'Activo', 0, 0),
    ('PAO NOVIEMBRE 2022-ABRIL 2023', '2022-11-21', '2023-04-16', NULL, 10, 'Activo', 0, 0),
    ('PAE JULIO-OCTUBRE 2022', '2022-07-01', '2022-10-13', NULL, 9, 'Activo', 0, 0),
    ('PAO MAYO-OCTUBRE 2022', '2022-05-30', '2022-10-16', NULL, 8, 'Activo', 0, 0),
    ('PAE FEBRERO-ABRIL 2022', '2022-02-01', '2022-04-13', NULL, 7, 'Activo', 0, 0),
    ('PAO NOVIEMBRE 2021-ABRIL 2022', '2021-11-29', '2022-04-17', NULL, 6, 'Activo', 0, 0),
    ('PAO MAYO-OCTUBRE 2021', '2021-05-25', '2021-10-03', NULL, 5, 'Activo', 0, 0),
    ('PAO NOVIEMBRE 2020-ABRIL 2021', '2020-11-30', '2021-04-25', NULL, 4, 'Activo', 0, 0),
    ('PAE JULIO-SEPTIEMBRE 2020', '2020-07-01', '2020-09-13', NULL, 3, 'Activo', 0, 0),
    ('PAO MAYO-OCTUBRE 2020', '2020-05-31', '2020-09-27', NULL, 2, 'Activo', 0, 0),
    ('PAO NOV 2019- MARZO 2020', '2019-10-21', '2020-03-13', NULL, 1, 'Activo', 0, 0)
ON DUPLICATE KEY UPDATE
    fecha_inicio = VALUES(fecha_inicio),
    fecha_fin = VALUES(fecha_fin),
    inactivar_estudiantes = VALUES(inactivar_estudiantes),
    ordenamiento = VALUES(ordenamiento),
    estado = VALUES(estado);

-- Programas / carreras -----------------------------------------------------
-- AUTO EVALUCION y SEGUIMIENTO DOCENTE no son carreras: quedan ocultas en formularios.
INSERT INTO programas_academicos
    (codigo, nombre, nombre_q10, resolucion_autorizacion, fecha_resolucion, tipo_evaluacion, categoria, aplica_grupos, aplica_preinscripciones, estado, visible_formularios)
VALUES
    ('540413A01-L 1705', 'ADMINISTRACIÓN', 'ADMINISTRACIÓN', 'RPC-SO-45-N.727-2024', '2024-11-07', 'Cuantitativo', NULL, 1, 1, 'Activo', 1),
    ('550111A01-H-1705', 'ASISTENCIA PEDAGOGICA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR', 'ASISTENCIA PEDAGOGICA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR', 'RPC-SE-11-N.107-2020', '2022-02-11', 'Cuantitativo', 'Educación y formación', 1, 1, 'Activo', 1),
    ('ATDOC', 'AUTO EVALUCION', 'AUTO EVALUCION', NULL, NULL, 'Cuantitativo', 'Educación y formación', 0, 1, 'Activo', 0),
    ('550113A01-H-1705', 'EDUCACIÓN BÁSICA', 'EDUCACIÓN BÁSICA', 'RPC-SO-03-No.039-202', '2023-01-18', 'Cuantitativo', NULL, 1, 1, 'Activo', 1),
    ('550111H01-H-1701', 'EDUCACION BILINGÜE - ALP', 'EDUCACION BILINGÜE-ALPALLANA', 'RPC-SO-36-No.594-202', '2024-09-04', 'Cuantitativo', 'Educación y formación', 1, 1, 'Activo', 1),
    ('550111H01-H-1705', 'EDUCACION BILINGÜE - MATRÍZ', 'EDUCACION BILINGÜE', 'RPC-SO-36-No.594-202', '2024-09-04', 'Cuantitativo', 'Educación y formación', 1, 1, 'Activo', 1),
    ('550841C01-H-1701', 'ENFERMERÍA VETERINARIA - ALP', 'ENFERMERÍA VETERINARIA-ALPALLANA', 'RPC-SO-26-No.429-202', '2024-06-26', 'Cuantitativo', 'Agropecuario, silvicultura, pesca, acuicultura y veterinaria', 1, 1, 'Activo', 1),
    ('550841C01-H-1705', 'ENFERMERÍA VETERINARIA - MATRÍZ', 'ENFERMERÍA VETERINARIA', 'RPC-SO-26-No.429-202', '2024-06-26', 'Cuantitativo', 'Agropecuario, silvicultura, pesca, acuicultura y veterinaria', 1, 1, 'Activo', 1),
    ('540414G01-L-1705', 'MARKETING DIGITAL', 'MARKETING DIGITAL', 'RPC-SO-47-No721-2025', '2025-12-03', 'Cuantitativo', 'Comercio, mercadeo y publicidad', 1, 1, 'Activo', 1),
    ('550414M01-L-1705', 'MARKETING DIGITAL Y DISEÑO MULTIMEDIA', 'MARKETING DIGITAL Y DISEÑO MULTIMEDIA', 'RPC-SO-07-No109-2026', '2026-02-20', 'Cuantitativo', 'Comercio, mercadeo y publicidad', 1, 1, 'Activo', 1),
    ('550724B01-H-1705', 'MINERÍA', 'MINERÍA', 'RPC-SO-50-No.796-202', '2022-12-14', 'Cuantitativo', NULL, 1, 1, 'Activo', 1),
    ('550811D01-H-1705', 'PRODUCCIÓN ANIMAL', 'PRODUCCIÓN ANIMAL', 'RPC-SO-28-N.469-2024', '2024-07-10', 'Cuantitativo', NULL, 1, 1, 'Activo', 1),
    ('ISTS-GD-06', 'SEGUIMIENTO DOCENTE', 'SEGUIMIENTO DOCENTE', NULL, NULL, 'Cuantitativo', 'Educación y formación', 0, 1, 'Activo', 0),
    ('551022C02-L 1705', 'SEGURIDAD E HIGIENE DEL TRABAJO', 'SEGURIDAD E HIGIENE DEL TRABAJO', 'RPC-SO-01-N.001-2025', '2025-01-08', 'Cuantitativo', NULL, 1, 1, 'Activo', 1),
    ('541022B01-L-1705', 'SEGURIDAD Y PREVENCIÓN DE RIESGOS LABORALES', 'SEGURIDAD Y PREVENCIÓN DE RIESGOS LABORALES', 'RPC-SO-42-No.685-202', '2024-10-16', 'Cuantitativo', NULL, 1, 1, 'Activo', 1),
    ('540413A01-L-1705', 'TÉCNICO SUPERIOR EN ADMINISTRACIÓN', 'TÉCNICO SUPERIOR EN ADMINISTRACIÓN', 'RPC-SE-11-N.107-2020', '2022-02-11', 'Cuantitativo', 'Educación y formación', 1, 1, 'Activo', 1),
    ('540414J01-L-1705', 'TÉCNICO SUPERIOR EN MARKETING DIGITAL', 'TÉCNICO SUPERIOR EN MARKETING DIGITAL', 'RPC-SE-19-No.129-202', '2020-11-05', 'Cuantitativo', NULL, 1, 1, 'Activo', 1),
    ('550841B01-H-1705', 'TECNOLOGÍA SUPERIOR EN CUIDADO CANINO', 'TECNOLOGÍA SUPERIOR EN CUIDADO CANINO', 'RPC-SE-11-N.107-2020', '2022-02-11', 'Cuantitativo', 'Educación y formación', 1, 1, 'Activo', 1),
    ('550811F01-H-1705', 'TECNOLOGÍA SUPERIOR EN PRODUCCIÓN ANIMAL', 'TECNOLOGÍA SUPERIOR EN PRODUCCIÓN ANIMAL', 'RPC-SE-11-N.107-2020', '2022-02-11', 'Cuantitativo', 'Educación y formación', 1, 1, 'Activo', 1),
    ('550532A01-H-1705', 'TOPOGRAFÍA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR', 'TOPOGRAFÍA CON NIVEL EQUIVALENTE A TECNOLOGIA SUPERIOR', 'RPC-SO-12-No.320-202', '2021-06-16', 'Cuantitativo', NULL, 1, 1, 'Activo', 1)
ON DUPLICATE KEY UPDATE
    nombre = VALUES(nombre),
    nombre_q10 = VALUES(nombre_q10),
    resolucion_autorizacion = VALUES(resolucion_autorizacion),
    fecha_resolucion = VALUES(fecha_resolucion),
    tipo_evaluacion = VALUES(tipo_evaluacion),
    categoria = VALUES(categoria),
    aplica_grupos = VALUES(aplica_grupos),
    aplica_preinscripciones = VALUES(aplica_preinscripciones),
    estado = VALUES(estado);

-- Misma carrera en varias sedes (ALP / MATRIZ): un solo nombre en los formularios.
UPDATE programas_academicos SET nombre_web = 'EDUCACIÓN BILINGÜE'
WHERE codigo IN ('550111H01-H-1701', '550111H01-H-1705');

UPDATE programas_academicos SET nombre_web = 'ENFERMERÍA VETERINARIA'
WHERE codigo IN ('550841C01-H-1701', '550841C01-H-1705');
