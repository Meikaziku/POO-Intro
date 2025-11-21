<?php

class MachineACafe
{
    private string $marque;
    private int $cafe;
    private bool $enFonction;

    public function __construct(string $marque)
    {
        $this->marque = $marque;
        $this->cafe = 0;
        $this->enFonction = false;
    }



    public function allumage(): array
    {
        
        $this->enFonction = !$this->enFonction;
        if ($this->enFonction) {
            
            return ['success' => true, 'message' => "$this->marque est en fonction.", 'methode' => "on_off"];
            
        } else {
            return ['success' => false, 'message' => "$this->marque n'est pas en fonction.", 'methode' => "on_off"];
        }
        
    }

    public function mettreUneDosette(): array
    {
        if ($this->cafe >= 1) {
            return ['success' => false, 'message' => "Impossible de mettre plus d'une dosette.", 'methode' => "insert_dosette"];
        } else {
            $this->cafe = 1;

             return ['success' => true, 'message' => "Je mets une dosette.", 'methode' => "insert_dosette"];
        }

    }

    public function faireDuCafe(): array
    {

        if ($this->enFonction === false) {
            return ['success' => false, 'message' => "la machine n'est pas allumé", 'methode' => "couler_cafe"];
        }

        if ($this->cafe === 0) {
            return ['success' => false, 'message' => "Aucune dostte n'est intégré", 'methode' => "couler_cafe"];
        }


        $this->cafe = 0;
        return ['success' => true, 'message' => "Le café est pret !", 'methode' => "couler_cafe"];
        
    }
}
