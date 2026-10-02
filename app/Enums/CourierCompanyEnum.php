<?php

namespace App\Enums;

enum CourierCompanyEnum : string 
{
    case DHL = 'DHL';
    case FedEx = 'FedEx';
    case UPS = 'UPS';
    case USPS = 'USPS';
    case Aramex = 'Aramex';
}
