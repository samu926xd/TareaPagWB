<?php
class Evento{
    public $nomevent;
    public $tipoevent;
    public $lugar; 
    public $fecha; 
    public $hora; 
    public function __construct($nomevent, $tipoevent, $lugar, $fecha, $hora){
        $this->nomevent = $nomevent;
        $this->tipoevent = $tipoevent;
        $this->lugar = $lugar;
        $this->fecha = $fecha;
        $this->hora = $hora;
        
    }
    public function mostrar(){
        return "Evento: $this->nomevent | Tipo: $this->tipoevent | Lugar: $this->lugar | Fecha: $this->fecha | Hora: $this->hora";
    }
}

class maneven{
    private $eventos = [];
    public function agregarEvento(Evento $evento) {
        $this->eventos[] = $evento;
    }
public function mostrarEventos(){
    foreach ($this->eventos as $evento) {
        echo $evento->mostrar() . "<br>";
    }
}

public function filtrEvent($criterio, $valor) {
    foreach ($this->eventos as $evento) {
        if (property_exists($evento, $criterio) && stripos($evento->$criterio, $valor) !== false) {
            echo $evento->mostrar() . "<br>";
        }
    }

}
}
("P004",	"Hogar de mascota","30/01/2025","18:00");
echo "<h3>Todos los eventos:</h3>";
$gestor->mostrarEventos();
echo "<h3>Filtrar por tipo 'lugar':</h3>";
$gestor->filtrEvent("tipo", "lugar");

?>