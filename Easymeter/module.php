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
                  case 2:
                break;  
                 $this->ConnectParent("{AC6C6E74-C797-40B3-BA82-F135D941D1A2}");

        }
        }
        public function ReceiveData($JSONString)
		{
			$data = json_decode($JSONString);

		}

        public function MeineErsteEigeneFunktion() {
            // Selbsterstellter Code
        }
    }
?>
