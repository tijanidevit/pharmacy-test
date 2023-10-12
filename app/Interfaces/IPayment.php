<?php

namespace App\Interfaces;


interface IPayment{
    public function acceptPayment($amount);
}
