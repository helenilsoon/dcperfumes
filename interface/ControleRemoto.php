<?php
require_once "Controlador.php";

class ControleRemoto implements Controlador
{
    private $volume;
    private $ligado;
    private $tocando;

    //método contructor
    public function __construct()
    {
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }

    //métodos getter e setter

    public function getVolume()
    {return $this->volume;}

    public function getLigado()
    {return $this->ligado;}

    public function getTocando()
    {return $this->tocando;}

    public function setVolume($volume)
    {$this->volume = $volume;return $this;}

    public function setLigado($ligado)
    {$this->ligado = $ligado;return $this;}

    public function setTocando($tocando)
    {$this->tocando = $tocando;return $this;}

    public function ligar()
    {
        $this->setLigado(true);
    }
    public function desligar()
    {
        $this->setLigado(false);
    }
    public function abrirMenu()
    {
        echo "<br> Está ligado?: " . ($this->getLigado() ? "SIM" : "NÂO");
        echo "<br> Está Tocando?: " . ($this->getTocando() ? "SIM" : "NÂO");
        echo "<br> volume: " . $this->getVolume();

        for ($i = 0; $i <= $this->getVolume(); $i += 10) {
            echo '|';

        }
        echo "<br>";
    }
    public function fecharMenu()
    {
        echo '<br>Fechando Menu';

    }
    public function maisVolume()
    {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() + 5);
        }
    }
    public function menosVolume()
    {

        if ($this->getLigado()) {
            $thi->setVolume($this->getVolume() - 5);
        }
    }
    public function ligarMudo()
    {
        if ($this->getLigado() && $this->getVolume() > 0) {
            $this->setVolume(0);

        }

    }
    public function desligarMudo()
    {
        if ($this->getLigado() && $this->getVolume() == 0) {
            $this->getVolume(50);

        }
    }
    public function play()
    {
        if ($this->getLigado() && !($this->getTocando())) {
            $this->setTocando(true);
        }
    }
    public function pause()
    {
        if ($this->getLigado() && $this->getTocando()) {

            $this->setTocando(false);

        }

    }

}
