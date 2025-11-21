<?php


final class MachineACaffeController
{
    private MachineACafe $machineACafe;

    public function __construct()
    {
        session_start();

        // Récupère l'entité de la session ou en crée une nouvelle
        if (isset($_SESSION['coffeeMachine'])) {
            $this->machineACafe = $_SESSION['coffeeMachine'];
        } else {
            $this->machineACafe = new MachineACafe("Senseo");
            $_SESSION['coffeeMachine'] = $this->machineACafe;
        }
    }

    public function handleRequest(): void {
        header('Content-Type: application/json'); // Ajout du header JSON
        
        $action = $_POST['action'] ?? '';
        
        $response = match($action) {
            'on_off' => $this->machineACafe->allumage(),
            'insert_dosette' => $this->machineACafe->mettreUneDosette(),
            'couler_cafe' => $this->machineACafe->faireDuCafe(),
            
            default => ['success' => false, 'message' => 'Action inconnue', 'methode' => 'methode inconnue' ]
        };
        
        // Sauvegarde l'entité mise à jour en session
        $_SESSION['coffeeMachine'] = $this->machineACafe;
        
        echo json_encode($response);
    }
    
    

    
}
