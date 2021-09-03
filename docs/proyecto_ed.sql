/* SQL Manager for MySQL                              5.8.0.53936 */
/* -------------------------------------------------------------- */
/* Host     : localhost                                           */
/* Port     : 3306                                                */
/* Database : proyecto_ed                                         */


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8mb4' */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `proyecto_ed`;

CREATE DATABASE `proyecto_ed`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `proyecto_ed`;

/* Dropping database objects */

DROP TRIGGER IF EXISTS `unidad_educativa_a_BEFORE_UPDATE`;
DROP TRIGGER IF EXISTS `unidad_educativa_a_BEFORE_INSERT`;
DROP TRIGGER IF EXISTS `miembro_BEFORE_UPDATE`;
DROP TRIGGER IF EXISTS `miembro_BEFORE_INSERT`;
DROP TRIGGER IF EXISTS `dde_BEFORE_UPDATE`;
DROP TRIGGER IF EXISTS `dde_BEFORE_INSERT`;
DROP TABLE IF EXISTS `unidad_educativa_a`;
DROP TABLE IF EXISTS `rol`;
DROP TABLE IF EXISTS `miembro`;
DROP TABLE IF EXISTS `fuente`;
DROP TABLE IF EXISTS `dde`;
DROP TABLE IF EXISTS `usuario`;
DROP TABLE IF EXISTS `estado`;
DROP TABLE IF EXISTS `comunidad`;
DROP TABLE IF EXISTS `municipio`;
DROP TABLE IF EXISTS `departamento`;
DROP TABLE IF EXISTS `archivo`;

/* Structure for the `archivo` table : */

CREATE TABLE `archivo` (
  `id_archivo` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INTEGER(11) DEFAULT NULL,
  `id_item` INTEGER(11) DEFAULT 0,
  `id_tabla` INTEGER(11) DEFAULT 0,
  `nombre_ar` VARCHAR(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion_ar` VARCHAR(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_ar` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `ruta_ar` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha_crea_ar` DATETIME DEFAULT NULL,
  `fecha_mod_ar` DATETIME DEFAULT NULL,
  `fecha_elim_ar` DATETIME DEFAULT NULL,
  `estado` INTEGER(11) DEFAULT NULL,
  `us_mod` INTEGER(11) DEFAULT NULL,
  `us_elim` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id_archivo`)
) ENGINE=InnoDB
AUTO_INCREMENT=46 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `departamento` table : */

CREATE TABLE `departamento` (
  `id_departamento` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre_dep` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `descripcion_dep` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id_departamento`)
) ENGINE=InnoDB
AUTO_INCREMENT=10 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `municipio` table : */

CREATE TABLE `municipio` (
  `id_municipio` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` INTEGER(11) NOT NULL,
  `nombre_mun` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `descripcion_mun` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id_municipio`),
  KEY `municipio_departamento` USING BTREE (`id_departamento`),
  CONSTRAINT `municipio_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`)
) ENGINE=InnoDB
DELAY_KEY_WRITE=1 AUTO_INCREMENT=32 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `comunidad` table : */

CREATE TABLE `comunidad` (
  `id_comunidad` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_municipio` INTEGER(11) NOT NULL,
  `nombre_com` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `aliado_com` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `observacion_com` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id_comunidad`),
  KEY `comunidad_municipio` USING BTREE (`id_municipio`),
  CONSTRAINT `comunidad_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`)
) ENGINE=InnoDB
AUTO_INCREMENT=74 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `estado` table : */

CREATE TABLE `estado` (
  `id_estado` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `descripcion` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `observaciones` VARCHAR(500) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id_estado`)
) ENGINE=InnoDB
AUTO_INCREMENT=6 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `usuario` table : */

CREATE TABLE `usuario` (
  `id_usuario` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre_usu` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `apellido_usu` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `usu_correo` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `usu_pass` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `fecha_crea` DATETIME DEFAULT NULL,
  `fecha_mod` DATETIME DEFAULT NULL,
  `fecha_elim` DATETIME DEFAULT NULL,
  `estado` INTEGER(11) NOT NULL,
  `rol_id` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`id_usuario`)
) ENGINE=InnoDB
AUTO_INCREMENT=29 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `dde` table : */

CREATE TABLE `dde` (
  `id_dde` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_municipio` INTEGER(11) NOT NULL,
  `id_estado` INTEGER(11) NOT NULL,
  `id_usuario` INTEGER(11) NOT NULL,
  `d_cod` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `d_nombre` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `d_director_nombre` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `d_director_tel` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `d_datos` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `d_fecha_crea` DATETIME DEFAULT NULL,
  `d_fecha_mod` DATETIME DEFAULT NULL,
  `d_fecha_elim` DATETIME DEFAULT NULL,
  `e1` TINYINT(4) NOT NULL DEFAULT 0,
  `e2` TINYINT(4) NOT NULL DEFAULT 0,
  `e3` TINYINT(4) NOT NULL DEFAULT 0,
  `e4` TINYINT(4) NOT NULL DEFAULT 0,
  `d_avance` INTEGER(11) NOT NULL,
  `d_estado` INTEGER(11) NOT NULL,
  `us_mod` INTEGER(11) DEFAULT NULL,
  `us_elim` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id_dde`),
  KEY `dde_estado` USING BTREE (`id_estado`),
  KEY `dde_municipio` USING BTREE (`id_municipio`),
  KEY `dde_usuario` USING BTREE (`id_usuario`),
  CONSTRAINT `dde_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `dde_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  CONSTRAINT `dde_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB
AUTO_INCREMENT=36 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `fuente` table : */

CREATE TABLE `fuente` (
  `id_fuente` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre_fue` VARCHAR(250) COLLATE utf8_general_ci NOT NULL,
  `descripcion_fue` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha_crea_fue` DATETIME DEFAULT NULL,
  `fecha_mod_fue` DATETIME DEFAULT NULL,
  `fecha_elim_fue` DATETIME DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id_fuente`)
) ENGINE=InnoDB
AUTO_INCREMENT=6 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `miembro` table : */

CREATE TABLE `miembro` (
  `id_miembro` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_municipio` INTEGER(11) NOT NULL,
  `id_estado` INTEGER(11) NOT NULL,
  `id_usuario` INTEGER(11) NOT NULL,
  `m_cod` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `m_nombre` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `m_contactos` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `m_observacion` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `m_fecha_crea` DATETIME DEFAULT NULL,
  `m_fecha_mod` DATETIME DEFAULT NULL,
  `m_fecha_elim` DATETIME DEFAULT NULL,
  `e1` TINYINT(4) NOT NULL DEFAULT 0,
  `e2` TINYINT(4) NOT NULL DEFAULT 0,
  `e3` TINYINT(4) NOT NULL DEFAULT 0,
  `e4` TINYINT(4) NOT NULL DEFAULT 0,
  `e5` TINYINT(4) NOT NULL DEFAULT 0,
  `e6` TINYINT(4) NOT NULL,
  `m_avance` DECIMAL(10,0) NOT NULL,
  `m_estado` INTEGER(11) NOT NULL,
  `us_mod` INTEGER(11) DEFAULT NULL,
  `us_elim` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id_miembro`),
  KEY `miembro_estado` USING BTREE (`id_estado`),
  KEY `miembro_usuario` USING BTREE (`id_usuario`),
  KEY `miembro_municipio_idx` USING BTREE (`id_municipio`),
  CONSTRAINT `miembro_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `miembro_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  CONSTRAINT `miembro_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB
AUTO_INCREMENT=4 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `rol` table : */

CREATE TABLE `rol` (
  `id_rol` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INTEGER(11) NOT NULL,
  `id_departamento` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`id_rol`),
  KEY `rol_usuario_idx` USING BTREE (`id_usuario`),
  KEY `rol_departamento_idx` USING BTREE (`id_departamento`),
  CONSTRAINT `rol_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rol_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB
AUTO_INCREMENT=20 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `unidad_educativa_a` table : */

CREATE TABLE `unidad_educativa_a` (
  `id_unidad_a` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_comunidad` INTEGER(11) NOT NULL,
  `id_estado` INTEGER(11) NOT NULL,
  `id_fuente` INTEGER(11) NOT NULL,
  `id_usuario` INTEGER(11) NOT NULL,
  `a_cod` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `a_nombre` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `a_director_nombre` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `a_director_tel` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `a_centro_salud` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `a_dna` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `a_pcpa` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `a_tecnico` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `a_responsable` VARCHAR(500) COLLATE utf8_general_ci DEFAULT NULL,
  `a_docen_ini_v` INTEGER(11) DEFAULT NULL,
  `a_docen_ini_m` INTEGER(11) DEFAULT NULL,
  `a_docen_pri_v` INTEGER(11) DEFAULT NULL,
  `a_docen_pri_m` INTEGER(11) DEFAULT NULL,
  `a_docen_sec_v` INTEGER(11) DEFAULT NULL,
  `a_docen_sec_m` INTEGER(11) DEFAULT NULL,
  `a_est_ini_v` INTEGER(11) DEFAULT NULL,
  `a_est_ini_m` INTEGER(11) DEFAULT NULL,
  `a_est_pri_v` INTEGER(11) DEFAULT NULL,
  `a_est_pri_m` INTEGER(11) DEFAULT NULL,
  `a_est_sec_v` INTEGER(11) DEFAULT NULL,
  `a_est_sec_m` INTEGER(11) DEFAULT NULL,
  `a_per_med_v` INTEGER(11) DEFAULT NULL,
  `a_per_med_m` INTEGER(11) DEFAULT NULL,
  `a_per_enf_v` INTEGER(11) DEFAULT NULL,
  `a_per_enf_m` INTEGER(11) DEFAULT NULL,
  `a_fecha_crea` DATETIME DEFAULT NULL,
  `a_fecha_mod` DATETIME DEFAULT NULL,
  `a_fecha_elim` DATETIME DEFAULT NULL,
  `e1` TINYINT(4) NOT NULL DEFAULT 0,
  `e2` TINYINT(4) NOT NULL DEFAULT 0,
  `e3` TINYINT(4) NOT NULL DEFAULT 0,
  `e4` TINYINT(4) NOT NULL DEFAULT 0,
  `e1_2` TINYINT(4) NOT NULL DEFAULT 0,
  `e2_2` TINYINT(4) NOT NULL DEFAULT 0,
  `e3_2` TINYINT(4) NOT NULL DEFAULT 0,
  `e4_2` TINYINT(4) NOT NULL,
  `a_avance` INTEGER(11) NOT NULL,
  `a_avance2` INTEGER(11) NOT NULL,
  `a_estado` INTEGER(11) NOT NULL,
  `us_mod` INTEGER(11) DEFAULT NULL,
  `us_elim` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id_unidad_a`),
  KEY `unidad_educativa_a_comunidad_idx` USING BTREE (`id_comunidad`),
  KEY `unidad_educativa_a_estado_idx` USING BTREE (`id_estado`),
  KEY `unidad_educativa_a_fuente_idx` USING BTREE (`id_fuente`),
  KEY `unidad_educativa_a_usuario_idx` USING BTREE (`id_usuario`),
  CONSTRAINT `unidad_educativa_a_comunidad` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id_comunidad`),
  CONSTRAINT `unidad_educativa_a_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `unidad_educativa_a_fuente` FOREIGN KEY (`id_fuente`) REFERENCES `fuente` (`id_fuente`),
  CONSTRAINT `unidad_educativa_a_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB
AUTO_INCREMENT=147 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Data for the `departamento` table  (LIMIT 0,500) */

INSERT INTO `departamento` (`id_departamento`, `nombre_dep`, `descripcion_dep`) VALUES
  (1,'Beni',''),
  (2,'Cochabamba',''),
  (3,'Oruro',''),
  (4,'Potosí',''),
  (5,'La Paz',''),
  (6,'Tarija',''),
  (7,'Pando',''),
  (8,'Sucre',''),
  (9,'Santa Cruz','');
COMMIT;

/* Data for the `municipio` table  (LIMIT 0,500) */

INSERT INTO `municipio` (`id_municipio`, `id_departamento`, `nombre_mun`, `descripcion_mun`) VALUES
  (1,1,'Riberalta','Riberalta'),
  (2,1,'San Borja','San Borja '),
  (3,2,'Villa Tunari','Villa Tunari'),
  (4,2,'Shinahota','Shinahota'),
  (6,2,'Puerto Villarroel','Puerto Villarroel'),
  (7,2,'Cochabamba','GAD  CBBA SEDEGES / CEPAT '),
  (8,2,'Chimore','Chimore'),
  (11,5,'La Paz','GAMLP'),
  (12,5,'El Alto','GAM EL ALTO '),
  (13,7,'Cobija','Cobija'),
  (14,7,'Gonzalo Moreno','Gonzalo Moreno'),
  (15,7,'Pando','GAD PANDO CEPAT'),
  (16,9,'Santa Cruz','GAD  Santa Cruz  (Seguridad Ciudadana)'),
  (17,9,'Montero','GAM Montero'),
  (18,7,'Bolpebra','Bolpebra'),
  (19,7,'El Sena','El Sena'),
  (20,9,'El Torno','El Torno'),
  (21,7,'Filadelfia','Filadelfia'),
  (22,9,'La Guardia','La Guardia'),
  (23,7,'Nueva Esperanza ','Nueva Esperanza '),
  (24,7,'Porvenir','Porvenir'),
  (25,7,'Puerto Rico','Puerto Rico'),
  (26,2,'Quillacollo','Quillacollo'),
  (27,2,'Sacaba','Sacaba'),
  (28,7,'San Lorenzo','San Lorenzo'),
  (29,7,'Santa Rosa','Santa Rosa'),
  (30,2,'Sipe Sipe','Sipe Sipe'),
  (31,2,'Vinto','Vinto');
COMMIT;

/* Data for the `comunidad` table  (LIMIT 0,500) */

INSERT INTO `comunidad` (`id_comunidad`, `id_municipio`, `nombre_com`, `aliado_com`, `observacion_com`) VALUES
  (1,3,'Chipiriri','',NULL),
  (2,3,'Paracty','',NULL),
  (3,3,'Eterazama','',NULL),
  (4,3,'Villa 14 de septiembre ','',NULL),
  (5,3,'Villa Tunari ','',NULL),
  (6,4,'Zona Central ','',NULL),
  (7,1,'Barrio Litoral','',NULL),
  (8,1,'Barrio  Tajibos ','',NULL),
  (9,1,'Barrio Cristo Rey ','',NULL),
  (10,7,'Zona Sur ','',NULL),
  (11,12,'Distrito 12','',NULL),
  (12,2,'San Miguel','',NULL),
  (13,2,'San Antonio','',NULL),
  (14,2,'Los Manguitos','',NULL),
  (15,13,'Cobija','',NULL),
  (16,14,'Portachuelo','',NULL),
  (17,14,'Gonzalo Moreno','',NULL),
  (18,14,'Pedro Herrera','',NULL),
  (19,14,'Candelaria','',NULL),
  (20,14,'Agua Dulce','',NULL),
  (21,6,'Bia Recuate (NR - YK)','',NULL),
  (22,6,'Villa Nueva','',NULL),
  (23,6,'Villa Verde','',NULL),
  (24,11,'Distrito 18 ','',NULL),
  (25,11,'Distrito 21','',NULL),
  (26,11,'Distrito 19','',NULL),
  (28,16,'Distrito 4','',NULL),
  (29,16,'Distrito 9','',NULL),
  (32,16,'Distrito 1','',NULL),
  (33,16,'Distrito 3','',NULL),
  (34,16,'Distrito 5','',NULL),
  (35,16,'La Guardia','',NULL),
  (36,16,'Distrito 12','',NULL),
  (37,12,'Distrito 8','',NULL),
  (38,16,'El Torno ','',NULL),
  (40,16,'Distrito10','',NULL),
  (41,16,'Distrito 11 ','',NULL),
  (42,16,'Distrito 8','',NULL),
  (43,16,'Distrito 7 ','',NULL),
  (44,7,'Zona Central ','',NULL),
  (45,7,'Zona Norte ','',NULL),
  (47,7,'Municipio de Vinto','',NULL),
  (48,7,'Municipio de Quillacollo','',NULL),
  (49,7,'Municipio de Sipe Sipe','',NULL),
  (50,7,'Municipio de Cochabamba','',NULL),
  (51,7,'Municipio de Sacaba','',NULL),
  (52,15,'Abaroa','',NULL),
  (53,15,'Filadelfia  capital ','',NULL),
  (54,15,'Porvenir capital','',NULL),
  (55,15,'Porvenir  ','',NULL),
  (56,15,'Santa Lucía (municpio de Bella Flor) ','',NULL),
  (57,17,'','',NULL),
  (58,12,'Distrito 8 Las Mercedes','',NULL),
  (59,8,'La Mision (NR-BTH)','',NULL),
  (60,8,'Puerto Aurora (NR-Q)','',NULL),
  (61,8,'Tres Islas','',NULL),
  (62,8,'Antonia Valencia','',NULL),
  (63,8,'Santa Anita','',NULL),
  (64,6,'Ayopaya (Q)','',NULL),
  (65,6,'Puerto Villarroel (Y/M/Q)','',NULL),
  (66,6,'Ingavi ','',NULL),
  (67,6,'Ivirgarzama','',NULL),
  (68,13,'Barrio Perla del Acre ','',NULL),
  (69,13,'Barrio Mapajo','',NULL),
  (70,13,'Zona Central ','',NULL),
  (71,13,'Barrio Paraiso ','',NULL),
  (73,17,'','',NULL);
COMMIT;

/* Data for the `estado` table  (LIMIT 0,500) */

INSERT INTO `estado` (`id_estado`, `tipo`, `descripcion`, `observaciones`) VALUES
  (1,'Direcciones Distritales','DDE y los temas a abordar (R1.IVO5)','Datos de cada DDE - D. Distrales - Directores UE (Nombre, cuidad, directores, contactos, ver variables y base de datos en el otro archivo excel) de 4 departamentos'),
  (2,'Unidades Educativas A','Planes de convivencia pacífica y armónica, aplicación de protocolos de prevención y el enfoque esperado (R2.IVO6)','UE, ubicación, datos director - PCPA.  (ver variables y base de datos en el otro archivo excel) '),
  (3,'Unidades Educativas B','Aplicación del protocolo del sistema educativo y mecanismos de referencia y contra referencia (R2.IVO7, R4.IVO3)','UE, ubicación, datos director, DNA municipio, datos de responsable, Centros de salud o redes salud (ver variables y base de datos en el otro archivo excel) '),
  (4,'Miembros de Personal Técnico','Miembros de personal técnico y los temas a abordar (R1.IVO2)','Datos de cada contraparte subnacional -  programa - servicios (Nombre, cuidad,  contactos, voy a confirmar a cabalidad las variables, pero ya pueden ir avanzando con estas) de 4 departamentos.'),
  (5,'Otros','','');
COMMIT;

/* Data for the `usuario` table  (LIMIT 0,500) */

INSERT INTO `usuario` (`id_usuario`, `nombre_usu`, `apellido_usu`, `usu_correo`, `usu_pass`, `fecha_crea`, `fecha_mod`, `fecha_elim`, `estado`, `rol_id`) VALUES
  (1,'Administrador','','admin@gmail.com','admin',NULL,NULL,NULL,0,1),
  (27,'prueba',NULL,'prueba2@gmail.com','prueba2',NULL,NULL,NULL,0,2),
  (28,'prueba@gmail.com',NULL,'prueba@gmail.com','prueba',NULL,NULL,NULL,0,3);
COMMIT;

/* Data for the `dde` table  (LIMIT 0,500) */

INSERT INTO `dde` (`id_dde`, `id_municipio`, `id_estado`, `id_usuario`, `d_cod`, `d_nombre`, `d_director_nombre`, `d_director_tel`, `d_datos`, `d_fecha_crea`, `d_fecha_mod`, `d_fecha_elim`, `e1`, `e2`, `e3`, `e4`, `d_avance`, `d_estado`, `us_mod`, `us_elim`) VALUES
  (1,2,1,1,'cod_dd1','San Borja','Wilner Raul Millares Cupary','71127076','','2021-06-04 00:00:00',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (2,1,1,1,'cod_dd2','Riberalta','Daniel Gil Aro','73968208','','2021-06-04 00:00:01',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (3,17,1,1,'cod_dd3','Director Distrital ','Agustin Flores Flores ','70093122','','2021-06-04 00:00:02',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (4,16,1,1,'cod_dd4','Director Departamental de Educación','Eliseo Huayllani Silvestre','72189282','','2021-06-04 00:00:03',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (5,16,1,1,'cod_dd5','Sub Director Educación Regular','José Luis Balderrama Aranda','72189294 - 67986338','','2021-06-04 00:00:04',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (6,16,1,1,'cod_dd6','Santa Cruz I','Rubén Alvarez Machi','72972927','','2021-06-04 00:00:05',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (7,16,1,1,'cod_dd7','Santa Cruz ll','Albina Abasto Quiroz','75003735','','2021-06-04 00:00:06',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (8,16,1,1,'cod_dd8','Santa Cruz III','Angélica María Quiroga Vidal','71323479','','2021-06-04 00:00:07',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (9,16,1,1,'cod_dd9','Plan 3.000','Everth Vargas Rivero','75353430','','2021-06-04 00:00:08',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (10,20,1,1,'cod_dd10','El Torno ','Edmundo Pineyro Carballo','70982025','','2021-06-04 00:00:09',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (11,22,1,1,'cod_dd11','La Guardia','David Montaño Rosales','67704355','','2021-06-04 00:00:10',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (12,8,1,1,'cod_dd12','Chimoré','Loriant Elder Dávalos Cayo','77452698','','2021-06-04 00:00:11',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (13,3,1,1,'cod_dd13','Villa Tunari','David Villca Colque ','72290603','','2021-06-04 00:00:12',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (14,6,1,1,'cod_dd14','Puerto Villarroel','Sandra Rudir Sánchez Iraizos','71756156','','2021-06-04 00:00:13',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (15,4,1,1,'cod_dd15','Shinahota','Martín Jaldín Jaldín','71737823','','2021-06-04 00:00:14',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (16,31,1,1,'cod_dd16','Vinto','Ramiro Terán Chávez','63896213','','2021-06-04 00:00:15',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (17,26,1,1,'cod_dd17','Quillacollo','Óscar Terán Chávez','75942969','','2021-06-04 00:00:16',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (18,27,1,1,'cod_dd18','Sacaba','Félix Guike Ramirewz Trujillo','74300885 - 63867300','','2021-06-04 00:00:17',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (19,30,1,1,'cod_dd19','Sipe Sipe','Freddy Ramiro Guzmán Pérez ','71737836','','2021-06-04 00:00:18',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (20,7,1,1,'cod_dd20','Distrital Cochabamba I.','Ponce Coca Jorge Mario','78352666','','2021-06-04 00:00:19',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (21,7,1,1,'cod_dd21','Cochabamba II','Aramayo Lazarte Norka','73780248','','2021-06-04 00:00:20',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (22,13,1,1,'cod_dd22','Cobija','Rosaura L. Acosta','67451666','','2021-06-04 00:00:21',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (23,29,1,1,'cod_dd23','Santa Rosa','Rita Regina Cachi Paxi','72929052','','2021-06-04 00:00:22',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (24,18,1,1,'cod_dd24','Bolpebra','Marcelo Cristhian Argollo Corrales','72922452','','2021-06-04 00:00:23',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (25,25,1,1,'cod_dd25','Puerto Rico','Rodolfo Muller Rivera','72917268','','2021-06-04 00:00:24',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (26,24,1,1,'cod_dd26','Porvenir','Simón Espino Quispe','69566578','','2021-06-04 00:00:25',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (27,21,1,1,'cod_dd27','Filadelfia','Sergio Yucra Canaviri','67137972','','2021-06-04 00:00:26',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (28,28,1,1,'cod_dd28','San Lorenzo','Beatriz López Rengifo','69560689','','2021-06-04 00:00:27',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (29,23,1,1,'cod_dd29','Nueva Esperanza ','René Cruz Jiménez','72931356','','2021-06-04 00:00:28',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (30,19,1,1,'cod_dd30','El Sena','Virginia Correa Cárdenas','74768004','','2021-06-04 00:00:29',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (31,14,1,1,'cod_dd31','Gonzalo Moreno',' Reynaldo Cuéllar Guarena','73924639','','2021-06-04 00:00:30',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (32,12,1,1,'cod_dd32','Distrital 3 ','Mirtha Apaza Montecinos','70520219','','2021-06-04 00:00:31',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (33,11,1,1,'cod_dd33','Director Departamental ','Carmelo López Valda','2201964','','2021-06-04 00:00:32',NULL,NULL,0,0,0,0,0,0,NULL,NULL),
  (34,11,1,1,'cod_dd34','Distrital 2','','','','2021-06-04 00:00:33',NULL,NULL,0,0,0,0,0,0,NULL,NULL);
COMMIT;

/* Data for the `fuente` table  (LIMIT 0,500) */

INSERT INTO `fuente` (`id_fuente`, `nombre_fue`, `descripcion_fue`, `fecha_crea_fue`, `fecha_mod_fue`, `fecha_elim_fue`) VALUES
  (1,'CANADA ','POBLACIÓN META PROYECTO CANADÁ','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'NC ESPANOL','POBLACIÓN META PROYECTO NC  ESPAÑOL','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (3,'NC  CANADA ','','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (4,'F GLOBALES ','POBLACIÓN META  CPD   FONDOS GLOBALES EDUCACIÓN ','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (5,'KOIKA ','POBLACIÓN META PROYECTO KOICA','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

/* Data for the `rol` table  (LIMIT 0,500) */

INSERT INTO `rol` (`id_rol`, `id_usuario`, `id_departamento`) VALUES
  (18,27,2),
  (19,27,1);
COMMIT;

/* Data for the `unidad_educativa_a` table  (LIMIT 0,500) */

INSERT INTO `unidad_educativa_a` (`id_unidad_a`, `id_comunidad`, `id_estado`, `id_fuente`, `id_usuario`, `a_cod`, `a_nombre`, `a_director_nombre`, `a_director_tel`, `a_centro_salud`, `a_dna`, `a_pcpa`, `a_tecnico`, `a_responsable`, `a_docen_ini_v`, `a_docen_ini_m`, `a_docen_pri_v`, `a_docen_pri_m`, `a_docen_sec_v`, `a_docen_sec_m`, `a_est_ini_v`, `a_est_ini_m`, `a_est_pri_v`, `a_est_pri_m`, `a_est_sec_v`, `a_est_sec_m`, `a_per_med_v`, `a_per_med_m`, `a_per_enf_v`, `a_per_enf_m`, `a_fecha_crea`, `a_fecha_mod`, `a_fecha_elim`, `e1`, `e2`, `e3`, `e4`, `e1_2`, `e2_2`, `e3_2`, `e4_2`, `a_avance`, `a_avance2`, `a_estado`, `us_mod`, `us_elim`) VALUES
  (1,1,3,1,1,'cod-1','Padre Constante Luchsich','Edzon Camacho Montaño \n','72780896','Hospital materno infantil Chipiriri','Dra. Noemi Luisaga Romero\nResponsable DNA Villa Tunari\nTelf.: 69527723','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,0,0,0,16,9,0,0,0,0,255,218,2,3,0,8,'2021-06-04 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (2,2,3,1,1,'cod-2','Paracty A','Evaristo Soliz Coria \n','72263010','Posta de San Rafael ','Dra. Noemi Luisaga Romero\nResponsable DNA Villa Tunari\nTelf.: 69527724','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,2,3,9,12,5,36,29,166,166,170,148,0,1,1,0,'2021-06-04 00:00:01',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (3,3,3,1,1,'cod-3','Bolivia Venezuela ','Hilarión Galo Pérez Chávez \n','79780707','Centro Eterazama ','Dra. Noemi Luisaga Romero\nResponsable DNA Villa Tunari\nTelf.: 69527725','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,3,5,10,5,9,41,40,190,172,169,145,3,1,1,3,'2021-06-04 00:00:02',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (4,4,3,1,1,'cod-4','Villa 14 de septiembre ','Willy  Mario Apaza Peñarrieta\n','72788158','Centro de Salud Villa 14 de septiembre ','Dra. Noemi Luisaga Romero\nResponsable DNA Villa Tunari\nTelf.: 69527726','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,3,9,16,0,0,49,60,255,292,0,0,3,2,0,6,'2021-06-04 00:00:03',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (5,5,3,1,1,'cod-5','Francisco Vignaud','Raúl Montero Chiri\n','72790334','Hospital Villa Tunari ','Dra. Noemi Luisaga Romero\nResponsable DNA Villa Tunari\nTelf.: 69527727','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,0,0,0,9,18,0,0,0,0,295,285,10,15,3,23,'2021-06-04 00:00:04',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (6,6,3,1,1,'cod-6','Técnico Humanístico Evo Morales Ayma A (THEMA) ',' Juan Edgar Quelca Paco \n','67502011','Centro de salud Shinahota ','Dr. Néstor Ricaldez Cáceres','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,0,0,0,17,12,0,0,0,0,248,190,3,5,7,8,'2021-06-04 00:00:05',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (7,6,3,1,1,'cod-7','Técnico Humanístico Evo Morales Ayma B (THEMA) ','Ramón Adriázola Herrera \n','75481800','Centro de salud Shinahota ','Dr. Néstor Ricaldez Cáceres','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,0,0,0,15,15,0,0,0,0,219,179,3,5,7,8,'2021-06-04 00:00:06',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (8,6,3,1,1,'cod-8','German Busch B','José Antonio Mendoza \n','74351635','Centro de salud Shinahota ','Dr. Néstor Ricaldez Cáceres','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',1,3,7,13,9,7,55,51,263,217,149,140,3,5,7,8,'2021-06-04 00:00:07',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (9,6,3,1,1,'cod-9','Demetrio canelas ','Emir Tonorio \n','71462560','Centro de salud Shinahota ','Dr. Néstor Ricaldez Cáceres','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,2,3,7,7,7,13,28,187,161,158,152,3,5,7,8,'2021-06-04 00:00:08',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (10,6,3,1,1,'cod-10','Mariscal Sucre ','Juan Baltazar Castro \n','72278043','Centro de salud Shinahota ','Dr. Néstor Ricaldez Cáceres','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,3,8,4,10,5,44,47,174,179,158,150,3,5,7,8,'2021-06-04 00:00:09',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (11,7,3,1,1,'cod-11','Bolivariana Martha Olmos ','Elias Tito Sotto Chuquimia ','71947310','Centro de Salud Fauvel ','','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,2,4,9,1,2,22,15,244,201,82,76,2,3,0,12,'2021-06-04 00:00:10',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (12,8,3,1,1,'cod-12','Los Tajibos ','Rose Mary Salvatierra Barreto ','68381176','Centro de Salud Fauvel','','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',1,2,5,14,3,1,45,35,265,236,166,184,0,0,0,0,'2021-06-04 00:00:11',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (13,9,3,1,1,'cod-13','Guido Gutierrez Montero','Fidel Choque Mamani','73902701','Cristo Rey','','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,3,7,15,2,3,50,61,225,218,167,147,2,1,0,7,'2021-06-04 00:00:12',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (14,9,3,1,1,'cod-14','Ismael Carrasco Tellería','Manuel Silvestre Saravia Cartagena ','65237986','René Salazar ','','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,2,6,6,4,3,37,39,104,99,137,158,1,1,0,5,'2021-06-04 00:00:13',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (15,10,2,1,1,'cod-15','Voces Libres ','Wagner Villegas \n','71726224','Red de Salud Zona Sur ','Directora DNA Raquel Nogales celular: 71742848       Stephanie Oropeza Técnica DNA celular: 72275482','','Técnica: Patricia Umabrila','',0,5,2,16,9,15,65,75,250,222,200,207,0,0,0,0,'2021-06-04 00:00:14',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (16,10,2,1,1,'cod-16','Ayni Pacha','José Mamani Apaza \n','72799062','Red de Salud Zona Sur ','Directora DNA Raquel Nogales celular: 71742848       Stephanie Oropeza Técnica DNA celular: 72275483','','Técnica: Patricia Umabrila','',0,0,0,0,10,16,0,0,0,0,180,178,0,0,0,0,'2021-06-04 00:00:15',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (17,10,2,1,1,'cod-17','9 de Marzo','Janeth Victoria Claure Reyes  ','70749134','Red de Salud Zona Sur ','Directora DNA Raquel Nogales celular: 71742848       Stephanie Oropeza Técnica DNA celular: 72275484','','Técnica: Patricia Umabrila','',1,1,2,11,11,11,20,28,186,179,178,139,0,0,0,0,'2021-06-04 00:00:16',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (18,10,2,1,1,'cod-18','Gran Tunari','Sandro Aramayo Vargas \n','74123745','Red de Salud Zona Sur ','Directora DNA Raquel Nogales celular: 71742848       Stephanie Oropeza Técnica DNA celular: 72275485','','Técnica: Patricia Umabrila','',0,2,1,7,8,4,37,30,88,63,61,61,0,0,0,0,'2021-06-04 00:00:17',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (19,10,2,1,1,'cod-19','Arnoldo Schiwimler Gamza','Ramiro Moisés Cruz Mamani ','63881768','Red de Salud Zona Sur ','Directora DNA Raquel Nogales celular: 71742848       Stephanie Oropeza Técnica DNA celular: 72275486','','Técnica: Patricia Umabrila','',0,3,5,10,10,11,49,35,191,188,193,176,0,0,0,0,'2021-06-04 00:00:18',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (20,11,2,1,1,'cod-20','República de Canadá ','Elvio Cabrera Lujan\n','72085714','RED DE SALUD KOREA','DNA 12\n(Zona Ampliación San Martín, calle Tacna, en la sede social. 71226609)','','Técnica: Elizabeth Cáceres - UE solo capacitacion y entrega de materiales ','',0,4,6,10,11,13,63,70,208,233,209,203,0,0,0,0,'2021-06-04 00:00:19',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (21,11,2,1,1,'cod-21','Villa Sajama B ','Luciano Tapia Flores\n','79543044','RED DE SALUD KOREA','DNA 12\n(Zona Ampliación San Martín, calle Tacna, en la sede social. 71226609)','','Técnica: Elizabeth Cáceres - UE solo capacitacion y entrega de materiales ','',0,0,0,0,18,12,0,0,0,0,250,243,0,0,0,0,'2021-06-04 00:00:20',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (22,11,2,1,1,'cod-22','Mercedes Elio de Rivero B','Patricia Pantoja\n ','70677028','RED DE SALUD KOREA','DNA 12\n(Zona Ampliación San Martín, calle Tacna, en la sede social. 71226609)','','Técnica: Elizabeth Cáceres - UE solo capacitacion y entrega de materiales ','',0,0,0,0,10,19,0,0,0,0,276,275,0,0,0,0,'2021-06-04 00:00:21',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (23,11,2,1,1,'cod-23','Retama B ','Gladys Vargas Mamani\n','71595907','RED DE SALUD KOREA','DNA 12\n(Zona Ampliación San Martín, calle Tacna, en la sede social. 71226609)','','Técnica: Elizabeth Cáceres - UE solo capacitacion y entrega de materiales ','',0,0,0,0,19,13,0,0,0,0,234,234,0,0,0,0,'2021-06-04 00:00:22',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (24,11,2,1,1,'cod-24','San Martín de Porrez','Piedad Chauca -Edwin Condori \n','73072166 - 67026371','RED DE SALUD KOREA','DNA 12\n(Zona Ampliación San Martín, calle Tacna, en la sede social. 71226609)','','Técnica: Elizabeth Cáceres - UE solo capacitacion y entrega de materiales ','',0,3,8,20,14,14,47,42,335,345,325,291,0,0,0,0,'2021-06-04 00:00:23',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (25,12,3,1,1,'cod-25','San Miguel','Sinforiano Usnayo Uri \n','67339407','Centro de Salud San Borja','DNA San Borja','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,0,3,0,1,3,0,0,26,25,89,80,1,0,0,0,'2021-06-04 00:00:24',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (26,13,3,1,1,'cod-26','San Antonio del Maniqui','Neisa Najaya Bude  \n','67314438','Centro de Salud San Borja','DNA San Borja','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,0,4,1,0,1,0,0,39,47,0,0,0,0,0,0,'2021-06-04 00:00:25',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (27,14,3,1,1,'cod-27','Los Manguitos ','Neisa Najaya Bude  \n','67314438','Centro de Salud San Borja','DNA San Borja','','Técnica: A designar  R4 con el 2do desembolso solo capacitacion y entrega de materiales ','',0,0,2,0,0,1,0,0,24,21,17,4,0,0,0,0,'2021-06-04 00:00:26',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (28,15,2,2,1,'cod-28','Mariano Baptista','Claudia R. Anti Moya','','Cobija','DNA Cobija Barrio Conavi, calle Elvira Gutiérrez, frente al Hotel Estrella del Norte, detrás de la U.E Cobija A ','','Técnica: Nancy Choque ','',1,1,3,13,11,4,29,27,204,207,201,199,0,0,0,0,'2021-06-04 00:00:27',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (29,15,2,2,1,'cod-29','Dr. Antonio Vaca Diez Primario (Sin inicial)','Shakty Lucía Fagalde La Fuente ','67660603','Roberto Galindo','DNA Cobija Barrio Conavi, calle Elvira Gutiérrez, frente al Hotel Estrella del Norte, detrás de la U.E Cobija A ','','Técnica: Nancy Choque ','',0,0,4,9,8,17,0,0,209,260,256,338,0,0,0,0,'2021-06-04 00:00:28',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (30,15,2,2,1,'cod-30','Madre Nazaria','Edmundo Lovera Gonzales ','72556527','Santa Clara (Centro SAPSI).','DNA Cobija Barrio Conavi, calle Elvira Gutiérrez, frente al Hotel Estrella del Norte, detrás de la U.E Cobija A ','','Técnica: Nancy Choque ','',0,3,6,3,9,6,32,21,176,197,119,116,0,0,0,0,'2021-06-04 00:00:29',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (31,15,2,2,1,'cod-31','Mariscal Sucre','Bill Nelson Sarzuri Laura ','73502646','Santa Clara (Centro SAPSI).','DNA Cobija Barrio Conavi, calle Elvira Gutiérrez, frente al Hotel Estrella del Norte, detrás de la U.E Cobija A ','','Técnica: Nancy Choque ','',0,3,3,11,9,10,50,49,208,207,196,210,0,0,0,0,'2021-06-04 00:00:30',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (32,15,2,2,1,'cod-32','Cobija A','Ismelda L. Amusquivar Quimo ','72713031','Roberto Galindo, Messutti. Clinica Burgos.','DNA Cobija Barrio Conavi, calle Elvira Gutiérrez, frente al Hotel Estrella del Norte, detrás de la U.E Cobija A ','','Técnica: Nancy Choque ','',0,2,3,12,8,7,35,47,270,236,168,175,0,0,0,0,'2021-06-04 00:00:31',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (33,15,2,2,1,'cod-33','Defensores del Acre B','Alejandro Gonzales Guayao ','67665217','Santa Clara (Centro SAPCI)- SEDES.','DNA Cobija Barrio Conavi, calle Elvira Gutiérrez, frente al Hotel Estrella del Norte, detrás de la U.E Cobija A ','','Técnica: Nancy Choque ','',0,3,2,11,0,0,85,86,268,243,0,0,0,0,0,0,'2021-06-04 00:00:32',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (34,16,2,2,1,'cod-34','Dios es Amor','Lic. Mirza Saenz J. ','74751328','SAFCI -Salud Familiar Comunitaria Interculatural - Portachuelo','Dr. Ruddy Justiniano  Rodríguez  Responsable DNA -Defensa de la Mujer, Psicólogo. Municipio Gonzalo ','','Técnica: Nancy Choque ','',0,2,4,3,3,5,20,14,74,74,48,59,0,0,0,0,'2021-06-04 00:00:33',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (35,17,2,2,1,'cod-35','Gonzalo Moreno (Secundario)','Lic. Feliciano Pessoa T. ','73965333','Centro de Salud- SEDES','Dr. Ruddy Justiniano  Rodríguez  Responsable DNA -Defensa de la Mujer, Psicólogo. Municipio Gonzalo ','','Técnica: Nancy Choque ','',0,0,0,0,2,4,0,0,0,0,68,79,0,0,0,0,'2021-06-04 00:00:34',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (36,18,2,2,1,'cod-36','Las Piedras','Alfredo Sandoval ','63814852','Posta Sanitaria','Dr. Ruddy Justiniano  Rodríguez  Responsable DNA -Defensa de la Mujer, Psicólogo. Municipio Gonzalo ','','Técnica: Nancy Choque ','',0,2,2,5,0,0,17,26,69,69,0,0,0,0,0,0,'2021-06-04 00:00:35',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (37,19,2,2,1,'cod-37','Candelaria','Lic. Aleisa Lino T.','73908644','No tienen, van a G.Moreno.','Dr. Ruddy Justiniano  Rodríguez  Responsable DNA -Defensa de la Mujer, Psicólogo. Municipio Gonzalo ','','Técnica: Nancy Choque ','',0,1,3,4,1,5,12,5,13,20,22,16,0,0,0,0,'2021-06-04 00:00:36',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (38,20,2,2,1,'cod-38','Agua Dulce','Lic. Juana Chambi ','71249460','Posta Sanitaria','Dr. Ruddy Justiniano  Rodríguez  Responsable DNA -Defensa de la Mujer, Psicólogo. Municipio Gonzalo ','','Técnica: Nancy Choque ','',0,1,2,5,3,5,6,6,34,35,31,33,0,0,0,0,'2021-06-04 00:00:37',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (39,21,2,2,1,'cod-39','Yaicuate ','Ronal Olivera Rios \n ','63965283','Bia Recuaté','Dra. Liliana Vásquez Orellana\nResponsable DNA \n68471748','','Técnica: Jhaskara Chumacero ','',0,0,1,2,2,3,0,0,27,18,14,8,1,0,0,1,'2021-06-04 00:00:38',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (40,22,2,2,1,'cod-40','Villa Nueva','Verónica Sanga Quiruchi\n','71782598','Villa Nueva','Dra. Liliana Vásquez Orellana\nResponsable DNA \n68471749','','Técnica: Jhaskara Chumacero ','',0,1,4,8,2,4,10,6,58,50,76,64,0,0,0,0,'2021-06-04 00:00:39',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (41,23,2,2,1,'cod-41','Toribio Claure Montaño','Santos Juan Córdoba\n','72218875','Villa Verde','Dra. Liliana Vásquez Orellana\nResponsable DNA \n68471750','','Técnica: Jhaskara Chumacero ','',0,2,6,10,0,0,48,43,156,160,0,0,0,0,0,0,'2021-06-04 00:00:40',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (42,23,2,2,1,'cod-42','Rodolfo Joaquín Illanes Alvarado','Santos Juan Córdoba\n','72218875','Villa Verde','Dra. Liliana Vásquez Orellana\nResponsable DNA \n68471751','','Técnica: Jhaskara Chumacero ','',0,0,0,0,13,7,0,0,0,0,248,163,0,0,0,0,'2021-06-04 00:00:41',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (43,23,2,2,1,'cod-43','Villa Verde','Santos Juan Córdoba\n','72218875','Villa Verde','Dra. Liliana Vásquez Orellana\nResponsable DNA \n68471752','','Técnica: Jhaskara Chumacero ','',0,1,1,1,0,0,4,3,26,30,0,0,0,0,0,0,'2021-06-04 00:00:42',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (44,24,2,3,1,'cod-44','Rvdo. Padre Walter Strub ','Simon Condori ','76240882','Centro de salud Rosales ','Calle 30, Laguna Cota Cota','','Técnicos: Juan Pablo Larrea y Nelson Figueredo','',0,5,5,28,0,0,77,66,314,269,0,0,0,0,0,0,'2021-06-04 00:00:43',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (45,25,2,3,1,'cod-45','Juan Pablo II','Jacinta Canaviri ','73033552','Centro de salud Seguencoma','2da meseta, Alto Seguencoma ','','Técnicos: Juan Pablo Larrea y Nelson Figueredo','',0,2,5,6,7,7,30,17,77,100,66,62,0,0,0,0,'2021-06-04 00:00:44',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (46,26,2,3,1,'cod-46','Chasquipampa A','Roberto Carlos Sepulveda ','60689503','Centro de salud Chasquipampa ','Calle 53 N°100 Chasquipampa','','Técnicos: Juan Pablo Larrea y Nelson Figueredo','',0,0,10,28,0,0,0,0,459,421,0,0,0,0,0,0,'2021-06-04 00:00:45',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (47,26,2,3,1,'cod-47','Chasquipampa C','Miriam Perales ','70538361','Centro de salud Chasquipampa ','Calle 53 N°100 Chasquipampa','','Técnicos: Juan Pablo Larrea y Nelson Figueredo','',0,10,0,0,0,0,142,143,0,0,0,0,0,0,0,0,'2021-06-04 00:00:46',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (48,24,2,3,1,'cod-48','Achumani ','Connie Guzmán ','73241719','Centro de salud Achumani','Calle 40, avenida Las Madres, Achumani','','Técnicos: Juan Pablo Larrea y Nelson Figueredo','',0,4,2,23,0,0,63,72,197,219,0,0,0,0,0,0,'2021-06-04 00:00:47',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (49,25,2,3,1,'cod-49','Juan Hershel A','Sandra Conde ','77772986','Centro de salud Obrajes ','Calle 11, esquina Av. Hernando Siles, Obrajes ','','Técnicos: Juan Pablo Larrea y Nelson Figueredo','',0,0,4,18,0,0,0,0,267,244,0,0,0,0,0,0,'2021-06-04 00:00:48',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (50,25,2,3,1,'cod-50','Juan Hershel C','Marianela Maldonado ','75889424','Centro de salud Obrajes ','Calle, esquina Costanerita, Obrajes ','','Técnicos: Juan Pablo Larrea y Nelson Figueredo','',0,8,0,0,0,0,121,111,0,0,0,0,0,0,0,0,'2021-06-04 00:00:49',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (51,28,2,3,1,'cod-51','Villa Rosario I','Juana Gloria Chuvey Cuellar                                                ','72626308- 75620420 ','CS Santa Rosita','DNA  Sub Alcadía Distrito 4','','Técnica: Siria Aramayo ','',0,1,0,10,0,0,11,13,107,101,0,0,0,0,0,0,'2021-06-04 00:00:50',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (52,29,2,3,1,'cod-52','Hrnos. Antonio y Marcos Cavanis (TT) ','Maria del Rosario Cortez Vaca  ','70207504','CS San Carlos','DNA  Sub Alcadía Distrito 9','','Técnica: Siria Aramayo ','',0,0,4,27,0,0,0,0,462,444,0,0,0,0,0,0,'2021-06-04 00:00:51',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (53,42,2,3,1,'cod-53','Virgen de Urkupiña (TT)',' Patricia García Mercado             ','75374384','Hosp. Municipal Distrito 8','DNA  Sub Alcaldía Distrito 8','','Técnica: Siria Aramayo ','',0,3,5,15,0,0,40,50,313,292,0,0,0,0,0,0,'2021-06-04 00:00:52',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (54,38,2,3,1,'cod-54','Eliana Vaca Antelo','Yerson Urrutia                     ','72111306','CS El Torno','DNA  El Torno','','Técnica: Siria Aramayo ','',0,2,3,12,0,0,27,26,174,193,0,0,0,0,0,0,'2021-06-04 00:00:53',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (55,32,2,3,1,'cod-55','San Martín','Jeannette Salazar Arteaga   ','75009250','CS Willy Lamaitre','DNA  Sub Alcadía Distrito 1','','Técnica: Siria Aramayo ','',0,0,0,21,0,0,0,0,290,336,0,0,0,0,0,0,'2021-06-04 00:00:54',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (56,33,2,3,1,'cod-56','Pampa de la Isla A','Lourdes Bonilla  \n','63513125','CS Pampa de la Isla','DNA  Sub Alcaldía Distrito 3','','Técnica: Siria Aramayo ','',0,0,2,17,0,0,0,0,273,274,0,0,0,0,0,0,'2021-06-04 00:00:55',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (57,34,2,3,1,'cod-57','Piniel','Walter Ovando                    ','79890102','CS Los Tusequis','DNA  Sub Alcaldía Distrito 5','','Técnica: Siria Aramayo ','',0,2,1,7,0,0,37,36,128,126,0,0,0,0,0,0,'2021-06-04 00:00:56',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (58,35,2,3,1,'cod-58','Domingo Savio','Nelcy Aguado                     ','68832254','CS Sagrada Familia','DNA  La Guardia','','Técnica: Siria Aramayo ','',0,0,1,10,0,0,0,0,138,134,0,0,0,0,0,0,'2021-06-04 00:00:57',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (59,34,2,3,1,'cod-59','Csota Rica ','Miriam Gómez               \n','71341055','CS Los Tusequis  y CS Norte ','DNA  Sub Alcaldía Distrito 5','','Técnica: Siria Aramayo ','',0,0,0,6,0,0,0,0,77,65,0,0,0,0,0,0,'2021-06-04 00:00:58',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (60,36,2,3,1,'cod-60','CENETROP Primaria (Indirecto con Visión Mundial).','Debora Fabiola Flires Camacho                 ','72613449','Pro Salud - Distrito 12','DNA  Sub Alcaldía Distrito 12','','Técnica: Siria Aramayo ','',0,2,2,11,0,0,26,29,177,173,0,0,0,0,0,0,'2021-06-04 00:00:59',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (61,37,2,3,1,'cod-61','Católico Mercedes A','Maria Luz Condori Mamani ','79592315 - 67087741','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',0,6,3,18,0,0,44,63,182,263,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (62,37,2,3,1,'cod-62','República del Japón A ','Juana Pacassi Ruiz\n','77272996','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',0,3,7,11,0,0,37,53,122,174,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (63,37,2,3,1,'cod-63','San Agustín  A','Orlando Miguel Mollo Laura \n','67137978','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',1,3,7,9,0,0,48,68,172,247,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (64,37,2,3,1,'cod-64','Simón Bolívar A','Carlos Arancibia Cachi\n','79697567','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',0,3,4,11,0,0,31,44,128,185,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (65,37,2,3,1,'cod-65','República del Japón B','Nilo Manuel Villanueva Quispe \n','69972555','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',0,0,0,0,12,15,0,0,0,0,184,121,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (66,37,2,3,1,'cod-66','24 de septiembre','Eliodoro Chambi Plata\n','67140832','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',0,2,2,3,0,0,17,24,36,52,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (67,37,2,3,1,'cod-67','Boliviano Japonés A ','Juan José Choquehuanca Cruz \n','76505134','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',0,4,7,10,0,0,44,64,157,227,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (68,37,2,3,1,'cod-68','Nuevo Amanecer Fe y Alegria A','Nestor Bernardo Acarapi Quispe\n','79684805','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',2,4,8,17,0,0,77,111,273,297,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (69,37,2,3,1,'cod-69','Simón Bolívar Sur','Máximo Ichuta Apaza \n','60616144','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',0,3,7,9,6,8,29,38,100,143,64,88,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (70,37,2,3,1,'cod-70','San Silvestre ','Lucio Sanga Alejo\n','72568040','Red Salud Senkata \n(Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elisabeth Cáceres ','',1,2,5,7,6,8,38,55,113,163,89,101,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (71,37,2,3,1,'cod-71','San Silvestre M','Juan Carlos Choque Sosa\n ','73631198','','','','Técnico: Guillermo Dávalos ','',0,3,3,15,3,12,38,40,230,242,216,218,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (72,37,2,3,1,'cod-72','San Silvestre T','Paty Karina Gutierrez Vasquez\n','60095937','','','','Técnico: Guillermo Dávalos ','',0,2,2,10,3,6,49,46,151,136,95,111,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (73,38,2,4,1,'cod-73','Bicentenario','Cristhian Cuellar                     ','75192209','Red Norte','DNA  El Torno','','Técnica: Siria Aramayo','',0,0,0,0,7,25,0,0,0,0,248,243,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (74,28,2,4,1,'cod-74','6 de Junio I','Basilio Loza Mendoza                                   ','70892676','CS Santa Isabel','DNA  Sub Alcaldía Distrito 2','','Técnica: Siria Aramayo','',0,0,0,0,5,16,0,0,0,0,242,251,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (75,34,2,4,1,'cod-75','Luz y Saber  I','Eddy Condori                                                                      ','76021344','CS Hamacas ','DNA  Sub Alcaldía Distrito 5','','Técnica: Siria Aramayo','',0,0,0,0,12,12,0,0,0,0,302,267,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (76,40,2,4,1,'cod-76',' ','Ingrid Guzmán \n','77018659','CS San Carlos','DNA  Sub Alcaldía Distrito 9','','Técnica: Siria Aramayo','',0,0,0,0,6,36,0,0,0,0,465,475,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (77,41,2,4,1,'cod-77','18 de Marzo','David Cuentas                                                     ','70873384','CS 18 Marzo','DNA  Sub Alcaldía Distrito 11','','Técnica: Siria Aramayo','',0,0,0,0,12,13,0,0,0,0,344,357,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (78,42,2,4,1,'cod-78','Virgen de Urkupiña (TM)','Patricia García Mercado                         ','775374384','Hops. Municipal\nDistrito 8 ','DNA  Sub  Alcaldía Distrito 8','','Técnica: Siria Aramayo','',0,0,0,0,12,10,0,0,0,0,265,300,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (79,43,2,4,1,'cod-79','CENETROP Secundaria (Indirecto Visión Mundial)','Debora Fabiola Flores Camacho                               ','72613449','Pro Salud Distrito 12 ','DNA  Sub Alcaldía Distrito 7','','Técnica: Siria Aramayo','',0,2,2,11,5,9,26,29,177,173,208,202,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (80,44,2,4,1,'cod-80','Sucre','Tania Cinthia Garcia.   ','70349243','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,0,0,0,13,19,0,0,0,0,317,285,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (81,44,2,4,1,'cod-81','Cobija','Nilton Carlos Arcani Pérez ','76807719','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,0,2,14,10,16,0,0,192,187,123,149,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (82,45,2,4,1,'cod-82','Branko Petricevic','Maria Luisa Espinoza Zuazo ','79368317','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,0,7,18,0,0,0,0,251,202,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (83,45,2,4,1,'cod-83','San Vicente de Paul','Lorena Santivañez   \n','71411262','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,0,3,7,0,0,0,0,111,91,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (84,10,2,4,1,'cod-84','Sebastían Pagador ','Edson Villarroel  \n','72787558','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,0,0,0,13,26,0,0,0,0,372,402,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (85,10,2,4,1,'cod-85','Juan José Torres','Reynaldo Ovando \n','76417090','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,3,11,17,0,0,48,48,378,352,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (86,10,2,4,1,'cod-86','Elizardo Pérez ','Wilian Alejandro Vargas Huayhua \n','73894349','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,0,0,0,15,18,0,0,0,0,287,246,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (87,10,2,4,1,'cod-87','San Andrés','Franklin Gonzalez.    \n','76913498','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,2,6,9,11,12,24,26,198,141,151,153,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (88,10,2,4,1,'cod-88','María Ayma Mamani','Audon Rodríguez Arce.  ','74102349','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,3,10,11,15,24,45,33,292,312,239,280,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (89,10,2,4,1,'cod-89','Bárbara Lamas ','Edwin Zanga \n','71463489','','DNA Cercado Cochabamba','','Técnica: Patricia Umbarila','',0,7,7,23,0,0,114,104,400,400,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (90,47,2,4,1,'cod-90','Álvaro García  Linera','Tito Apaza \n','71414155','CEPAT CBBA','','','Técnica: Jhaskara Chumacero','',0,2,6,4,0,0,8,15,191,158,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (91,47,2,4,1,'cod-91','Martín Cárdes Hermosa','Miguel Ángel Bueno  \n','67243278','CEPAT CBBA','','','Técnica: Jhaskara Chumacero','',0,0,0,0,9,11,0,0,0,0,279,233,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (92,48,2,4,1,'cod-92','Néstor Adriáloza Menéndez','Dunia Teresa López Soto \n','71491403','CEPAT CBBA','','','Técnica: Jhaskara Chumacero','',0,0,0,0,21,26,0,0,0,0,453,384,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (93,48,2,4,1,'cod-93','Teresa Urquidi','Olga Arce García \n','72270492','CEPAT CBBA','','','Técnica: Jhaskara Chumacero','',0,0,6,14,0,0,0,0,187,211,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (94,49,2,4,1,'cod-94',' Mariscal Sucre','Patricia Carola Moreira García ','67576078','CEPAT CBBA','','','Técnica: Jhaskara Chumacero','',0,0,4,27,0,0,0,0,405,383,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (95,49,2,4,1,'cod-95','Andrés Uzeda Ocampo','María Garro \n','70397134','CEPAT CBBA','','','Técnica: Jhaskara Chumacero','',0,0,0,0,15,30,0,0,0,0,548,497,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (96,50,2,4,1,'cod-96','Juancito Pinto B','Robert Orellana\n','72765069','CEPAT CBBA','Dra. Raquel Nogales Responsable DNA','','Técnica: Jhaskara Chumacero','',0,0,21,19,0,0,45,49,321,305,209,223,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (97,50,2,4,1,'cod-97','Santo Domingo de Guzmán','Mirtha Alcoba \n','72976637','CEPAT CBBA','Dra. Raquel Nogales Responsable DNA','','Técnica: Jhaskara Chumacero','',0,2,0,6,3,8,11,11,46,42,56,49,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (98,51,2,4,1,'cod-98','Boliviano Británico','Orlando Jiménez Arispe \n','71778251','CEPAT CBBA','Lic. Ibeth Corrales Zambrana\nResponsable DNA \n75481534','','Técnica: Jhaskara Chumacero','',0,0,0,0,14,17,0,0,0,0,364,407,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (99,51,2,4,1,'cod-99','Natalio Arauco','María Panozo \n','60768618','CEPAT CBBA','Lic. Ibeth Corrales Zambrana\nResponsable DNA \n75481535','','Técnica: Jhaskara Chumacero','',0,0,4,19,0,0,0,0,340,332,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (100,52,2,4,1,'cod-100','Abaroa','Carla Helen Aquino Valdivia ','72926360','Cobija','DNA Cobija Hernán Roca      72923529','','Técnica: Nancy Choque. Solo capacitación y entrega de matariales','',0,1,1,4,3,6,0,0,50,61,40,58,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (101,53,2,4,1,'cod-101','Filadelfia ',' Marcelino Condori \n','74556560','Filadelfia','DNA Filadelfia (lado Alcaldía)  Katherine  76103915','','Técnica: Nancy Choque. Solo capacitación y entrega de matariales','',1,0,1,5,5,3,13,8,37,43,52,43,4,2,4,2,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (102,54,2,4,1,'cod-102','Serafín Castedo','Gonzalo Chambi \n','68151853','San Martín de Pórres','DNA Porvenir - Barrio San Jorge. Feente al Coliseo.                        Dra. Blanca Muñoz - Responsable                 72917413','','Técnica: Nancy Choque. Solo capacitación y entrega de matariales','',0,2,1,5,6,5,24,16,98,105,83,86,2,0,0,2,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (103,55,2,4,1,'cod-103','Bruno Racua  Secundario','Ruth Jimena Alave Mamani ','71501721','San Martín de Pórres','DNA Porvenir - Barrio San Jorge. Feente al Coliseo.                        Dra. Blanca Muñoz - Responsable                 72917414','','Técnica: Nancy Choque. Solo capacitación y entrega de matariales','',0,0,0,0,12,4,0,0,0,0,136,114,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (104,56,2,4,1,'cod-104',' Hugo Antequera ','Freddy Tuco Vásquez ','72922210','SAFCI  Santa  Lucía','Santa Lucía                   Responsable DNA: Andrès Arroyo Zabala                           72912501            (Técnico, área legal) y apoyo de la Abogada del SLIM.','','Técnica: Nancy Choque. Solo capacitación y entrega de matariales','',0,1,3,3,3,5,14,14,53,42,48,38,6,0,1,6,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (105,57,2,4,1,'cod-105','Nacional la Floresta  Secundario','Lic. Luisa Alegría Orellana ','71610806','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,2,9,4,11,0,0,114,109,215,204,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (106,57,2,4,1,'cod-106','Franz Tamayo Secundario','Lic. Santos Francis Ruiz ','79864037','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,5,18,8,10,0,0,285,282,207,206,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (107,57,2,4,1,'cod-107','Libertad','Lic. Pastor Ribera C. \n','71028209','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,0,0,7,15,0,0,0,0,225,228,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (108,57,2,4,1,'cod-108','Nacional Guabirá 1','Lic. Raquel Rivero \n','70996241','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,6,13,0,0,0,0,238,214,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (109,57,2,4,1,'cod-109','Nacional Guabirá 2 ','Lic. Johel Ibarra Roldan ','70091206','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,0,0,6,18,0,0,0,0,314,326,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (110,57,2,4,1,'cod-110','Germán Busch Becerra','Lic. Liseth Cruz Humerez  ','68911768','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,0,0,7,7,0,0,0,0,244,222,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (111,57,2,4,1,'cod-111','Angel Limpias Diaz','Jose E. Roly Caceres Gutierrez\n','74433649','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,2,5,8,8,7,24,26,184,169,151,180,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (112,57,2,4,1,'cod-112','San Ramón de la Víbora (primaria AM)','Lic. Maria Jesus Terceros Pedraza','','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,2,5,13,0,0,53,52,207,202,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (113,57,2,4,1,'cod-113','31 de Agosto\n(secundaria PM)','Lic. Carlos Ortega Ramos\n','72670042','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,1,5,3,9,0,0,90,75,195,162,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (114,57,2,4,1,'cod-114','Tupac Katari (inicial y primaria)','Lic. Ruth  Yanet Angulo Moreno\n','76394613','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,1,4,0,0,0,0,53,47,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (115,57,2,4,1,'cod-115','Santa Rosita ','Lic. Fatima coca arteaga\n','61546500','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,3,4,7,0,0,51,63,87,73,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (116,57,2,4,1,'cod-116','Santa Ana ','Lic. Norka Miranda Cazorla\n','62063914','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,3,3,7,0,0,33,41,87,73,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (117,57,2,4,1,'cod-117','Juancito Pinto Secundaria ','Melby Arauz \n','76081713','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,0,0,0,6,13,0,0,0,0,299,276,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (118,57,2,4,1,'cod-118','Juancito Pinto ','Lic. Remberto Maldonado   ','77331137','','DNA Montero','','Técnico: Guillermo Dávalos ','',0,4,4,22,0,0,78,90,426,382,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (119,58,2,4,1,'cod-119','Akapana Fuerza Andina ','Lucas Martin Mamani Lipa \n','65679595','Red Salud Senkata (Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elizabeth Cáceres ','',0,3,4,9,7,5,24,35,138,113,78,110,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (120,58,2,4,1,'cod-120','Ecológico Baden Powel','\nCarlos Aleberto Torrez Mita\n','71224033','Red Salud Senkata (Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elizabeth Cáceres ','',0,3,4,5,9,11,24,34,87,124,88,127,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (121,58,2,4,1,'cod-121','Topater','Rafael Walter Marca Flores\n ','71939872','Red Salud Senkata (Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elizabeth Cáceres ','',2,3,8,14,12,9,73,67,247,262,179,184,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (122,58,2,4,1,'cod-122','Tupac Amaru','\nGladys Fernadez Mamani\n','67032689','Red Salud Senkata (Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elizabeth Cáceres ','',1,2,3,5,8,8,31,45,108,156,108,95,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (123,58,2,4,1,'cod-123','5 de Agosto Las Nieves ','Elizabeth Quispe Villarpando\n','76254572','Red Salud Senkata (Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elizabeth Cáceres ','',0,2,3,4,6,5,15,20,68,97,43,36,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (124,58,2,4,1,'cod-124','15 de Abril','Claudia Alejandra Espejo Choque\n','73081049','Red Salud Senkata (Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elizabeth Cáceres ','',0,2,4,5,7,7,20,27,83,97,64,90,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (125,58,2,4,1,'cod-125','Boliviano Japonés B','Andrea Laura Pujro\n','71503810','Red Salud Senkata (Senkata 79 Hospital Municipal Modelo Boliviano Japonés calle Llullaullaco Responsable Lic. Patricia Choque 72040022)','DNA (Distrito 8 Senkata, Zona 27 de Mayo, Av. Japón y Av. 27 mayo en Sede Social. 71226608)','','Técnica: Elizabeth Cáceres ','',0,0,0,0,14,9,0,0,0,0,219,169,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (126,59,2,5,1,'cod-126','La Misión','Eloy Puquino \n','72233269','La Misión','Dr. Edil Aranibar Ardaya Responsable DNA 72265357','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,1,3,3,3,3,7,1,21,15,24,28,2,1,2,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (127,60,2,5,1,'cod-127','Puerto Aurora ','Olmar Zambrana Rivera \n','68486900','Puerto Aurora','Dr. Edil Aranibar Ardaya Responsable DNA 72265358','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,1,5,3,7,3,7,10,65,80,82,67,2,2,1,1,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (128,61,2,5,1,'cod-128','Tres Islas ','Juan Carlos  Macías Contreras ','68576077','Santa Isabel','Dr. Edil Aranibar Ardaya Responsable DNA 72265359','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',1,0,1,3,2,2,6,12,22,19,37,28,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (129,62,2,5,1,'cod-129','Antonia Valencia','Juan Carlos  Macías Contreras ','68576077','Estaño Palmito','Dr. Edil Aranibar Ardaya Responsable DNA 72265360','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,0,0,3,1,3,3,2,17,26,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (130,63,2,5,1,'cod-130','Santa Anita','Cristhiam Cruz Mamani ','73785551','Sta. Anita','Dr. Edil Aranibar Ardaya Responsable DNA 72265361','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,1,4,3,3,2,11,3,28,31,24,28,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (131,63,2,5,1,'cod-131','Remanzo ','Cristhiam Cruz Mamani ','73785551','Sta. Anita','Dr. Edil Aranibar Ardaya Responsable DNA 72265362','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,0,1,0,3,0,4,1,10,11,5,19,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (132,63,2,5,1,'cod-132','Betania del Chapare','Cristhiam Cruz Mamani ','73785551','Sta. Anita','Dr. Edil Aranibar Ardaya Responsable DNA 72265363','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,1,1,2,2,1,1,0,10,17,6,4,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (133,63,2,5,1,'cod-133','El Carmen ','Cristhiam Cruz Mamani ','73785551','Sta. Anita','Dr. Edil Aranibar Ardaya Responsable DNA 72265364','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,1,0,2,1,1,8,8,23,26,16,14,1,1,0,1,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (134,63,2,5,1,'cod-134',' 27 de octubre','Cristhiam Cruz Mamani ','73785551','Sta. Anita','Dr. Edil Aranibar Ardaya Responsable DNA 72265365','','Técnica: Jhaskara Chumacero - Las UE 6, 7, 8 y 9 pertenecen a un núcleo. Con ellas se deará capacitación y materiales ','',0,0,0,2,0,0,3,3,16,7,0,0,2,0,0,2,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (135,64,2,5,1,'cod-135','Ayopaya ','Simón Wilfredo Rojas \n','74378927','Ayopaya','Dra. Liliana Vásquez Orellana\nResponsable DNA\n68471748','','Técnica: Jhaskara Chumacero','',1,0,4,2,6,6,14,16,71,60,119,113,0,1,0,1,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (136,65,2,5,1,'cod-136','Eduardo Abaroa','Elsa Segovia Villazón \n','74363329','Pto Villarroel','Dra. Liliana Vásquez Orellana\nResponsable DNA\n68471749','','Técnica: Jhaskara Chumacero','',0,0,0,0,9,5,0,0,0,0,61,55,2,2,1,5,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (137,66,2,5,1,'cod-137','Ingavi','Deysi Morales \n','71796861','Ayopaya','Dra. Liliana Vásquez Orellana\nResponsable DNA\n68471750','','Técnica: Jhaskara Chumacero','',1,0,4,2,0,0,13,13,70,63,0,0,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (138,66,2,5,1,'cod-138','6 de agosto (IDH)','Deysi Morales \n','71796861','Ayopaya','Dra. Liliana Vásquez Orellana\nResponsable DNA\n68471751','','Técnica: Jhaskara Chumacero','',0,0,0,0,3,2,0,0,0,0,43,40,1,0,0,1,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (139,67,2,5,1,'cod-139','Técnico Humanístico ivirgarzama','Rimer Flores Reque \n ','76940379','Ivirgarzama ','Dra. Liliana Vásquez Orellana\nResponsable DNA\n68471752','','Técnica: Jhaskara Chumacero','',0,0,0,0,13,17,0,0,0,0,266,234,26,12,0,38,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (140,68,2,5,1,'cod-140','Simón Bolivar','Juana Condori Ayca \n','71273342','CS 27 de mayo','DNA Cobija   Barrio Conavi, calle Elvira  Gutiérrez, frente al Hotel Estrella del Norte, detrás de la U.E Cobija  A  (a 2 cuadras) ,                Responsable:                 \nDr. Mirlo Rodríguez                 67660801','','Técnica: Nancy Choque ','',0,3,4,10,7,8,43,48,202,225,179,165,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (141,69,2,5,1,'cod-141','Héroes de la Distancia','Yoniester Texeira \n','71117469','CS Mapajo ','','','Técnica: Nancy Choque ','',0,2,3,11,11,10,34,22,187,220,356,445,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (142,70,2,5,1,'cod-142','Dr Antonio Vaca Diez Secundaria ','Esnider Velarde M. \n','71118289','CS Roberto Galindo ','','','Técnica: Nancy Choque ','',0,0,0,0,11,13,0,0,0,0,260,275,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (143,71,2,5,1,'cod-143','Defensores del Acre SEC.','Elisa Quiroga \n','70904335','CS Santa Clara ','','','Técnica: Nancy Choque ','',0,0,0,0,6,10,0,0,0,0,162,176,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL),
  (144,70,2,5,1,'cod-144','Mariano Baptista','Claudia R. Anti Moya \n','73012542','CS Cobija','','','Técnica: Nancy Choque ','',1,1,3,13,11,4,29,27,204,207,201,199,0,0,0,0,'0000-00-00 00:00:00',NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL);
COMMIT;

/* Definition for the `dde_BEFORE_INSERT` trigger : */

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' TRIGGER `dde_BEFORE_INSERT` BEFORE INSERT ON `dde`
  FOR EACH ROW
BEGIN
set new.d_avance = 0;
	IF (NEW.e1 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
    
    IF (NEW.e2 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
    
    IF (NEW.e3 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
    
    IF (NEW.e4 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
END$$

DELIMITER ;

/* Definition for the `dde_BEFORE_UPDATE` trigger : */

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' TRIGGER `dde_BEFORE_UPDATE` BEFORE UPDATE ON `dde`
  FOR EACH ROW
BEGIN
set new.d_avance = 0;
	IF (NEW.e1 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
    
    IF (NEW.e2 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
    
    IF (NEW.e3 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
    
    IF (NEW.e4 = 2) THEN
		set new.d_avance = new.d_avance + 25;
	END IF;
END$$

DELIMITER ;

/* Definition for the `miembro_BEFORE_INSERT` trigger : */

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' TRIGGER `miembro_BEFORE_INSERT` BEFORE INSERT ON `miembro`
  FOR EACH ROW
BEGIN
set new.m_avance = 0;
	IF (NEW.e1 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e2 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e3 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e4 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e5 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e6 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.m_avance > 100) THEN
		set new.m_avance = new.m_avance -2;
	END IF;
END$$

DELIMITER ;

/* Definition for the `miembro_BEFORE_UPDATE` trigger : */

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' TRIGGER `miembro_BEFORE_UPDATE` BEFORE UPDATE ON `miembro`
  FOR EACH ROW
BEGIN
set new.m_avance =0;
	IF (NEW.e1 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e2 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e3 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e4 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e5 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.e6 = 2) THEN
		set new.m_avance = new.m_avance + (100/6);
	END IF;
    
    IF (NEW.m_avance > 100) THEN
		set new.m_avance = new.m_avance -2;
	END IF;
    
    IF (NEW.m_avance <0) THEN
		set new.m_avance = new.m_avance +2;
	END IF;
END$$

DELIMITER ;

/* Definition for the `unidad_educativa_a_BEFORE_INSERT` trigger : */

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' TRIGGER `unidad_educativa_a_BEFORE_INSERT` BEFORE INSERT ON `unidad_educativa_a`
  FOR EACH ROW
BEGIN
set new.a_avance = 0;
set new.a_avance2 = 0;
	IF (NEW.e1 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    IF (NEW.e2 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    IF (NEW.e3 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    IF (NEW.e4 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    	IF (NEW.e1_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
    
    IF (NEW.e2_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
    
    IF (NEW.e3_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
    
    IF (NEW.e4_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
END$$

DELIMITER ;

/* Definition for the `unidad_educativa_a_BEFORE_UPDATE` trigger : */

DELIMITER $$

CREATE DEFINER = 'root'@'localhost' TRIGGER `unidad_educativa_a_BEFORE_UPDATE` BEFORE UPDATE ON `unidad_educativa_a`
  FOR EACH ROW
BEGIN
set new.a_avance = 0;
set new.a_avance2 = 0;
	IF (NEW.e1 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    IF (NEW.e2 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    IF (NEW.e3 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    IF (NEW.e4 = 2) THEN
		set new.a_avance = new.a_avance + 25;
	END IF;
    
    	IF (NEW.e1_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
    
    IF (NEW.e2_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
    
    IF (NEW.e3_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
    
    IF (NEW.e4_2 = 2) THEN
		set new.a_avance2 = new.a_avance2 + 25;
	END IF;
END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;