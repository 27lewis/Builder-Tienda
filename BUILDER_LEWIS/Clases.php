<?php

class Memoria{
	public $tipo,$capacidad;
}

class PC{

	public $procesador,$pantalla,$memoria,$disco,$tarjeta;

	public function __toString(){
		$salida= "Procesador: ". $this->procesador . "<br>Pantalla: " . $this->pantalla
		. "<br>Memoria: " . $this->memoria->tipo . " " . $this->memoria->capacidad .
		"<br>Disco duro: " . $this->disco . "<br>Tarjeta Grafica: " . $this->tarjeta;

		return $salida;
	}

}

abstract class PCbuilder {

	public $PC;

	public function crearPC(){
		$this->PC = new PC();
	}

	public abstract function buildProcesador();
	public abstract function buildPantalla();
	public abstract function buildMemoria();
	public abstract function buildDisco();
	public abstract function buildTarjeta();	
}

class EnvyBuilder extends PCbuilder{

	public function buildMemoria(){
		$memoria = new Memoria();
		$memoria->tipo = "SDRAM DDR3L<br>";
		$memoria->capacidad = "8 GB<br>";
		$this->PC->memoria = $memoria;
	}

	public function buildProcesador(){
		
		$this->PC->procesador="Intel Core i7-5500U<br>";
	}

	public function buildPantalla(){
		$this->PC->pantalla= "15 pulgadas<br>";
	}

	public function buildDisco(){
		$this->PC->disco= "SATA de 1TB<br>";
	}
	public function buildTarjeta(){
		$this->PC->tarjeta= "NVIDIA GeForce 840M<br>";
	}
}
class PavilionBuilder extends PCBuilder{

	public function buildMemoria(){
		$memoria = new Memoria();
		$memoria->tipo =  "SDRAM DDR3L<br>";
		$memoria->capacidad = "6 GB<br>";
		$this->PC->memoria = $memoria;
	}

	public function buildProcesador(){
		
		$this->PC->procesador="i5-5200U<br>";
	}

	public function buildPantalla(){
		$this->PC->pantalla= "15,6 pulgadas<br>";
	}

	public function buildDisco(){
		$this->PC->disco= "SATA de 500TB<br>";
	}
	public function buildTarjeta(){
		$this->PC->tarjeta= "NVIDIA GeForce 840M<br>";
	}
}
class PCDirector{

	public $PCBuilder;


	public function constructPC(){

		$this->PCBuilder->crearPC();
		$this->PCBuilder->buildProcesador();
		$this->PCBuilder->buildPantalla();
		$this->PCBuilder->buildMemoria();
		$this->PCBuilder->buildDisco();
		$this->PCBuilder->buildTarjeta();
	}


	public function getPC(){
		return $this->PCBuilder->PC;
	}
}


?>