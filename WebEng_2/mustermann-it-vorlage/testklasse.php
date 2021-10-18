<?php
    $meinAuto = new Fahrzeug(10);
    $meinAuto->starteMotor();
    $meinAuto->beschleunige_Fahrzeug();

    $meinSegelBoot = new Segelboot(50,500);
    $meinSegelBoot->starteMotor();

    class Fahrzeug{
        protected $motorLaeuft;
        protected $geschwindigkeit;
        protected $maxGeschwindigkeit = 200;

        public function setMax_Geschwindigkeit($maxGeschwindigkeit){
            if($maxGeschwindigkeit > 0)
            {
                $this->maxGeschwindigkeit = $maxGeschwindigkeit;
            }else{
                echo "Wie soll eine negative GEschwindigkeit erreciht werden!";
            }
            
        }
        public function getMax_Geschwindigkeit(){
            return $this->maxGeschwindigkeit;
        }

        function __construct($maxGeschwindigkeit=200) {
            $this->motorLaeuft = false;
            $this->geschwindigkeit = 0;
            $this->setMax_Geschwindigkeit($maxGeschwindigkeit);
        }


        public function starteMotor(){
            echo "Der Moto läuft! <br/>";
            $this->motorLaeuft = true;
        }

        public function beschleunige_Fahrzeug(){
            if($this->motorLaeuft == true)
            {
                if(($this->geschwindigkeit + 20) <= $this->maxGeschwindigkeit)
                {
                    $this->geschwindigkeit += 20;
                    echo "Das Fahrzeug fährt nun schneller, aktuelle geschwindigkeit $this->geschwindigkeit km/h <br/>";
                }else{
                    $this->geschwindigkeit = $this->maxGeschwindigkeit;
                    echo "Willst dich umbringen du fährst max Speed ($this->maxGeschwindigkeit) <br/>";
                }
               
            }else
            {
                echo "Wie soll das Fahrzeug beschleunigen, der Motor ist aus! <br/>";
            }
        }

        public function bremse_Fahrzeug($abbremsGeschindigkeit){
            if($this->motorLaeuft == true)
            {
                if(($this->geschwindigkeit - $abbremsGeschindigkeit)>= 0)
                {
                    $this->geschwindigkeit = $this->geschwindigkeit - $abbremsGeschindigkeit;
                    echo "Das Fahrzeug bremst um $abbremsGeschindigkeit km/h ab und fäht nun $this->geschwindigkeit km/h <br/>";
                }else
                {
                    $this->geschwindigkeit = 0;
                    $this->motorLaeuft = false;
                    echo "Das Fahrzeug bremst auf 0 km/h, du hast abgewürgt der Motor ist aus! <br/>";
                }
            }else
            {
                echo "Ja eigentlich sollte es auch ohne laufenden Motor bremsen macht es aber nicht.... <br/>";
            }
        }
    }

    class Segelboot extends Fahrzeug{
        private $maxTiefgang;

        public function __construct($maxTiefgang,$maxGeschwindigkeit)
        {
            $this->maxTiefgang = $maxTiefgang;
            $this->setMax_Geschwindigkeit($maxGeschwindigkeit);
            $this->motorLaeuft = true;
        }
        public function starteMotor()
        {
            echo "Bei Segelboot nicht möglich";
        }
    }
?>