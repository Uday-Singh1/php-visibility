<?php

declare(strict_types=1);

class BankAccount {
  private string $banknummer;
  protected float $saldo;

  public function __construct(string $banknummer, float $saldo = 0.0) {
    $this->banknummer = $banknummer;
    $this->saldo = $saldo;
  }

  public function toevoegen(float $bedrag): void {
    $this->saldo += $bedrag;
  }

  public function onttrekken(float $bedrag): void {
    $saldoNaOnttrekken = $this->saldo - $bedrag;
    if ($saldoNaOnttrekken >= 0) {
      $this->saldo = $saldoNaOnttrekken;
    } else {
      echo "Onttrekking niet toegestaan. Saldo te laag.<br>";
    }
  }

  public function getBanknummer(): string {
    return $this->banknummer;
  }

  public function getSaldo(): float {
    return $this->saldo;
  }
}

class BankAccountPlus extends BankAccount {
  private float $boeterente;

  public function __construct(string $banknummer, float $boeterente, float $saldo = 0.0) {
    parent::__construct($banknummer, $saldo);
    $this->boeterente = $boeterente;
  }

  public function onttrekken(float $bedrag): void {
    $saldoNaOnttrekken = $this->saldo - $bedrag;
    if ($saldoNaOnttrekken >= -$this->boeterente) {
      $this->saldo = $saldoNaOnttrekken;
      $boetebedrag = $bedrag > $this->saldo ? $this->boeterente : 0.2;
    } else {
      echo "Onttrekking niet toegestaan. Saldo te laag.<br>";
    }
  }

  public function getBoetebedrag(): float {
    $boetebedrag = $this->saldo < 1 ? $this->boeterente : 0.0;
    return $boetebedrag;
  }

  public function getBoeterente(): float {
    return $this->boeterente;
  }
}

$rekening = new BankAccountPlus('NL05 342342345', 0.1);
$rekening->toevoegen(100);
$rekening->onttrekken(50);
echo "Banknummer: " . $rekening->getBanknummer() . "<br>";
echo "Saldo: " . $rekening->getSaldo() . "<br>";
echo "Boetebedrag: " . $rekening->getBoetebedrag() . "<br>";
echo "Boeterente: " . $rekening->getBoeterente() . "<br>";
?>
