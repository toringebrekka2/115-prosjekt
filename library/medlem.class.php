<?php
    class Medlem  {
        private $aktiviteter = array();
        private $roller = array();
        private $fornavn, $etternavn, $adresse, $postnr, $mobilnr, $epost, $fødselsdato, $kjønn, $medlemSiden, $kontigentStatus;

        function __construct($fornavn, $etternavn, $adresse, $postnr, $mobilnr, $epost, $fødselsdato, $kjønn, $medlemSiden, $kontigentStatus) {
            $this->fornavn = $fornavn;
            $this->etternavn = $etternavn;
            $this->adresse = $adresse;
            $this->postnr = $postnr;
            $this->mobilnr = $mobilnr;
            $this->epost = $epost;
            $this->fødselsdato = $fødselsdato;
            $this->kjønn = $kjønn;
            $this->medlemSiden = $medlemSiden;
            $this->kontigentStatus = $kontigentStatus;
        }

        function addAktivitet($akt) {
            $this->aktiviteter[$akt];
        }

        function getAktiviteter() {
            return $this->aktiviteter;
        }

        function addRolle($rolle) {
            $this->roller[$rolle];
        }

        function getRoller() {
            return $this->roller;
        }

        function registrerMedlem() {
            $tilkobling = new mysqli("localhost", "root", "root", "medlemdatabase");
            $regMedlemQuery1 = "
            INSERT INTO medlem 
                (id, fornavn, etternavn, adresse, postnr, mobilnr, epost, fødselsdato, kjønn, interesser, aktiviteter, medlemsiden, kontigentstatus)
            VALUES
                (null, '";
                $regMedlemQuery1 .= $this->fornavn;
                $regMedlemQuery1 .= "', '";
                $regMedlemQuery1 .= $this->etternavn;
                $regMedlemQuery1 .= "', '";
                $regMedlemQuery1 .= $this->adresse;
                $regMedlemQuery1 .= "', '"; 
                $regMedlemQuery1 .= $this->postnr;
                $regMedlemQuery1 .= "', '"; 
                $regMedlemQuery1 .= $this->mobilnr;
                $regMedlemQuery1 .= "', '"; 
                $regMedlemQuery1 .= $this->epost;
                $regMedlemQuery1 .= "', '"; 
                $regMedlemQuery1 .= $this->fødselsdato;
                $regMedlemQuery1 .= "', '"; 
                $regMedlemQuery1 .= $this->kjønn;
                $regMedlemQuery1 .= "', '";
                $regMedlemQuery1 .= $this->;
                $regMedlemQuery1 .= "', '";
                $regMedlemQuery1 .= $this->;
                $regMedlemQuery1 .= "', '"; 
                $regMedlemQuery1 .= $this->medlemSiden;
                $regMedlemQuery1 .= "', '"; 
                $regMedlemQuery1 .= $this->kontigentStatus;
                $regMedlemQuery1 .= "');";

            //hvis queryene returnerer true (vellykket) gis det beskjed om, hvis ikke gis det beskjed om at noe gikk galt.
            if($tilkobling->query($regMedlemQuery1)) {
                echo "Medlemmet " . $_POST['fornavn'] . " " . $_POST['etternavn'] . " ble registrert!";
            } else {
                echo "Det skjedde en feil - medlemmet ble ikke registrert.";
            }
            
        }
    }
?>