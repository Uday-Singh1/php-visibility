 <!-- Vraag 7 en 8  -->

 <?php

class Bankrekening {
  public $banknummer = 'NL05 342342345';
  public $balans = null;
  public $bedragToevoegen;
  public $nieuwgeld;
  public $bedragontrekken;
  public $nieuwgeldmin;

  public function toevoegen() {
      $this->bedragToevoegen = 100;
      $this->nieuwgeld = $this->balans + $this->bedragToevoegen;
      echo $this->nieuwgeld;
  }

  public function onttrekken() {
      if ($this->bedragontrekken === $this->balans) {
          echo "te weinig geld";
      } else {
          $this->bedragontrekken = 100;
          $this->nieuwgeldmin = $this->balans - $this->bedragontrekken;
          echo $this->nieuwgeldmin;
      }
  }
}

class BankrekeningPlus extends Bankrekening {
  public $limiet = 1000;
  public $rente;

  public function onttrekken() {
      if ($this->balans === 1000) {
          echo "te weinig geld";
      } else {
          $this->bedragontrekken = 100;
          $this->nieuwgeldmin = $this->balans - $this->bedragontrekken;
          echo $this->nieuwgeldmin;
      }
  }

  public function rente() {
      $this->rente = $this->balans * 0.05;
      echo $this->rente;
  }
  
    public function sum() {
        echo 'Banknummer: ' . $this->banknummer . '<br>';
        if ($this->balans === 0) {
            echo 'Balance: <br>';
        } else {
            echo 'Balance: ' . number_format($this->balans, 2) . '<br>';
        }
        echo 'Interest: ' . $this->rente . '<br>';
        echo 'Date: ' . date('Y-m-d');
    }
}

$rekening = new BankrekeningPlus();
$rekening->rente(); // geeft de waarde van de $rente-eigenschap
$rekening->sum(); // geeft de waarde van de $banknummer, $balans, $rente-eigenschappen en de huidige datum
?>



   

