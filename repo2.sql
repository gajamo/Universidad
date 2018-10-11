-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema repo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `repo` ;

-- -----------------------------------------------------
-- Schema repo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `repo` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `repo`.`area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `repo`.`area` ;

CREATE TABLE IF NOT EXISTS `repo`.`area` (
  `idarea` INT(11) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `area_idarea` INT(11) NOT NULL,
  PRIMARY KEY (`idarea`),
  INDEX `fk_area_area_idx` (`area_idarea` ASC),
  CONSTRAINT `fk_area_area`
    FOREIGN KEY (`area_idarea`)
    REFERENCES `repo`.`area` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`material` ;

CREATE TABLE IF NOT EXISTS `mydb`.`material` (
  `idmaterial` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `ruta` VARCHAR(45) NULL,
  PRIMARY KEY (`idmaterial`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`contenidoXArea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`contenidoXArea` ;

CREATE TABLE IF NOT EXISTS `mydb`.`contenidoXArea` (
  `idcontenidoXArea` INT NOT NULL AUTO_INCREMENT,
  `area_idarea` INT(11) NOT NULL,
  `material_idmaterial` INT NOT NULL,
  PRIMARY KEY (`idcontenidoXArea`),
  INDEX `fk_contenidoXArea_area1_idx` (`area_idarea` ASC),
  INDEX `fk_contenidoXArea_material1_idx` (`material_idmaterial` ASC),
  CONSTRAINT `fk_contenidoXArea_area1`
    FOREIGN KEY (`area_idarea`)
    REFERENCES `repo`.`area` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contenidoXArea_material1`
    FOREIGN KEY (`material_idmaterial`)
    REFERENCES `mydb`.`material` (`idmaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`autor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`autor` ;

CREATE TABLE IF NOT EXISTS `mydb`.`autor` (
  `idautor` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `nacionalidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idautor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`metadato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`metadato` ;

CREATE TABLE IF NOT EXISTS `mydb`.`metadato` (
  `material_idmaterial` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  `fechaIngreso` DATE NULL,
  `fechaModificacion` DATE NULL,
  `usuario` VARCHAR(45) NULL,
  `audiencia` VARCHAR(45) NULL,
  `moviles` CHAR NULL,
  `idioma` VARCHAR(45) NULL,
  `costo` DECIMAL NULL,
  INDEX `fk_metadato_material1_idx` (`material_idmaterial` ASC),
  CONSTRAINT `fk_metadato_material1`
    FOREIGN KEY (`material_idmaterial`)
    REFERENCES `mydb`.`material` (`idmaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`contenidoXAutor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`contenidoXAutor` ;

CREATE TABLE IF NOT EXISTS `mydb`.`contenidoXAutor` (
  `autor_idautor` INT NOT NULL,
  `material_idmaterial` INT NOT NULL,
  INDEX `fk_contenidoXAutor_autor1_idx` (`autor_idautor` ASC),
  INDEX `fk_contenidoXAutor_material1_idx` (`material_idmaterial` ASC),
  CONSTRAINT `fk_contenidoXAutor_autor1`
    FOREIGN KEY (`autor_idautor`)
    REFERENCES `mydb`.`autor` (`idautor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contenidoXAutor_material1`
    FOREIGN KEY (`material_idmaterial`)
    REFERENCES `mydb`.`material` (`idmaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`usuario` ;

CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `constrasena` VARCHAR(45) NOT NULL,
  `administrador` BIT(1) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;

USE `repo` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
