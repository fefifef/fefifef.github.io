<?php
    class Beamer
    {
        private string $hersteller;
        private string $modell;
        private float $tagespreis;
        private float $lumen;
        private bool $wlan;

        public function __construct(string $hersteller, string $modell, float $tagespreis, float $lumen, bool $wlan = false)
        {
            $this -> setHersteller($hersteller);
            $this -> setModell($modell);
            $this -> setTagespreis($tagespreis);
            $this -> setLumen($lumen);
            $this -> setWlan($wlan);
        }

        public function getWochenpreis()
        {
            return ($this -> getTagespreis() * 7 * 0.90);
        }

        public function getWlan() : bool
        {
                return $this->wlan;
        }
        public function setWlan(bool $wlan)
        {
                $this->wlan = $wlan;

                return $this;
        }
        public function getLumen() : float
        {
                return $this->lumen;
        }
        public function setLumen(float $lumen)
        {
                $this->lumen = $lumen;

                return $this;
        }
        public function getTagespreis() : float
        {
                return $this->tagespreis;
        }
        public function setTagespreis(float $tagespreis)
        {
                $this->tagespreis = $tagespreis;

                return $this;
        }
        public function getModell() : string
        {
                return $this->modell;
        }
        public function setModell(string $modell)
        {
                $this->modell = $modell;

                return $this;
        }
        public function getHersteller() : string
        {
                return $this->hersteller;
        }
        public function setHersteller(string $hersteller)
        {
                $this->hersteller = $hersteller;

                return $this;
        }
    }
?>