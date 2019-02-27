<?
    // Klassendefinition
    class Easymeter extends IPSModule {

        // Der Konstruktor des Moduls
        // Überschreibt den Standard Kontruktor von IPS
        public function __construct($InstanceID) {
            // Diese Zeile nicht löschen
            parent::__construct($InstanceID);

            // Selbsterstellter Code
        }

        // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            // Diese Zeile nicht löschen.
            parent::Create();
            $this->RegisterPropertyInteger('Gateway', 0);
            $this->RegisterPropertyInteger('Update', 1);
        }

        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();

            switch ($this->ReadPropertyInteger('Gateway')) {
            case 0: //ClientSocket
                $this->ForceParent('{3CFF0FD9-E306-41DB-9B5A-9D06D38576C3}');
                break;
            case 1: //SerialPort
                $this->ForceParent('{6DC3D946-0D31-450F-A8C6-C42DB8D7D4F1}');
                break;
        }
        }
        public function ReceiveData($JSONString)
		{
			$data = json_decode($JSONString);
			       IPS_LogMessage("IOSplitter RECV", utf8_decode($data->Buffer));
			           //We would parse our payload here before sending it further...
			            //Lets just forward to our children
			$this->SendDataToChildren(json_encode(Array("DataID" => "{66164EB8-3439-4599-B937-A365D7A68567}", "Buffer" => $data->Buffer)));
		}

        public function MeineErsteEigeneFunktion() {
            // Selbsterstellter Code
        }
    }
?>
