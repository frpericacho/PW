<?php

    class Animal
    {
        const PESO_MEDIO = 50;
        private $color;
        private $peso;

        private static $contador = 0;

        public function __construct($col, $pes)
        {
            $this->color = $col;
            $this->peso = $pes;
            self::$contador = self::$contador + 1;
        }

        public function __destruct()
        {
            echo 'llamando al destructor';
        }

        public function getColor()
        {
            return $this->color;
        }

        public function setColor($col)
        {
            $this->color = $col;
        }

        public function getPeso()
        {
            return $this->peso;
        }

        public function setPeso($pes)
        {
            $this->peso = $pes;
        }

        public function sumarPeso()
        {
            $this->peso = $this->peso + 1;
        }

        public static function mover()
        {
            echo 'el animal se mueve';
        }
    }

    class Pez extends Animal
    {
        private $mar;

        public function setMar($m)
        {
            $this->mar = $m;
        }

        public function getMar()
        {
            return $this->mar;
        }
    }

    class Gato extends Animal
    {
        private $mau;

        public function setMau($m)
        {
            $this->mau = $m;
        }

        public function getMau()
        {
            return $this->mau;
        }
    }
