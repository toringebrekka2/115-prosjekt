<?php
    class Bruker {
        private $brukernavn;
        private $passord;

        function setBrukernavn($brukernavn) {
            $this->brukernavn = $brukernavn;
        }

        function getBrukernavn() {
            return $this->brukernavn;
        }
    }
?>