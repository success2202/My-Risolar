<?php 
namespace App\Interfaces;

interface paymentInterface 
{
    public function InitiatePayment($req);
    public function ProcessFlutterPayment($request);
    public function HanglePaystackPayment($req);
    public function initiateFlutterCheckout($request);
    public function initiatePaystackCheckout($request);
    public function AdminInitiatePayment($request);
    public function ProcessManualPayment($request);
}