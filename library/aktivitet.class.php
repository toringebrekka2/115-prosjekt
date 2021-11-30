<?php
    class Aktivitet {
        private $navn;
        private $ansvarlig;
        private $datoTid;

        function setNavn($navn) {
            $this->$navn = $navn;
        }

        function getNavn() {
            return $this->navn;
        }

        function setAnsvarlig($ansvarlig) {
            $this->ansvarlig = $ansvarlig;
        }

        function getAnsvarlig() {
            return $this->ansvarlig;
        }

        function setDatoTid($datoTid) {
            $this->datoTid = $datoTid;
        }

        function getDatoTid() {
            return $this->datoTid;
        }
    }
?>