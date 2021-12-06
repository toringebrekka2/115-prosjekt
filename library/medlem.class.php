<?php
    class Medlem  {
        private $aktiviteter = array();
        private $roller = array();
        private $fornavn, $etternavn, $adresse, $postnr, $mobilnr, $epost, $fødselsdato, $kjønn, $interesser, $medlemSiden, $kontigentStatus;

        function __construct($fornavn, $etternavn, $adresse, $postnr, $mobilnr, $epost, $fødselsdato, $kjønn, $interesser, $aktiviteter, $medlemSiden, $kontigentStatus) {
            $this->fornavn = $fornavn;
            $this->etternavn = $etternavn;
            $this->adresse = $adresse;
            $this->postnr = $postnr;
            $this->mobilnr = $mobilnr;
            $this->epost = $epost;
            $this->fødselsdato = $fødselsdato;
            $this->kjønn = $kjønn;
            $this->interesser = $interesser;
            foreach($aktiviteter as $value) {
                $this->aktiviteter[] = $value;
            }
            $this->medlemSiden = $medlemSiden;
            $this->kontigentStatus = $kontigentStatus;
        }

        function registrerMedlem() {
            $tilkobling = new mysqli("localhost", "root", "Passord123", "medlemdatabase");
            $regMedlemQuery = "
            INSERT INTO medlem 
                (id, fornavn, etternavn, adresse, postnr, mobilnr, epost, fødselsdato, kjønn, interesser, medlemsiden, kontigentstatus)
            VALUES
                (null, '";
                $regMedlemQuery .= $this->fornavn;
                $regMedlemQuery .= "', '";
                $regMedlemQuery .= $this->etternavn;
                $regMedlemQuery .= "', '";
                $regMedlemQuery .= $this->adresse;
                $regMedlemQuery .= "', '"; 
                $regMedlemQuery .= $this->postnr;
                $regMedlemQuery .= "', '"; 
                $regMedlemQuery .= $this->mobilnr;
                $regMedlemQuery .= "', '"; 
                $regMedlemQuery .= $this->epost;
                $regMedlemQuery .= "', '"; 
                $regMedlemQuery .= $this->fødselsdato;
                $regMedlemQuery .= "', '"; 
                $regMedlemQuery .= $this->kjønn;
                $regMedlemQuery .= "', '";
                $regMedlemQuery .= $this->interesser;
                $regMedlemQuery .= "', '";
                $regMedlemQuery .= $this->medlemSiden;
                $regMedlemQuery .= "', '"; 
                $regMedlemQuery .= $this->kontigentStatus;
                $regMedlemQuery .= "'); ";

            //hvis queryen returnerer true (vellykket) gis det beskjed om, hvis ikke gis det beskjed om at noe gikk galt.
            if($tilkobling->query($regMedlemQuery)) {
        foreach($this->aktiviteter as $value) {
        $mid = intval(mysqli_insert_id($tilkobling));   
        echo $mid . " " . $value;
            $tilkobling->query("INSERT INTO medlemaktivitet (medlemID, aktivitet) SELECT (SELECT id FROM medlem WHERE id = $mid), (SELECT id FROM aktivitet WHERE aktivitetsnavn = '$value');");
            //$tilkobling->query("UPDATE medlemaktivitet SET medlem = 'medlemID', aktivitet = (SELECT id FROM aktivitet WHERE aktivitetsnavn = $value);");
        }

                echo "Medlemmet " . $this->fornavn . " " . $this->etternavn . " ble registrert!";
            } else {
                echo "Det skjedde en feil - medlemmet ble ikke registrert.";
            }

            mysqli_close($tilkobling);
        }
    }
?>