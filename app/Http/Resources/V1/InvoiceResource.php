<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    private array $types=['C'=>'Cartão','B'=>'Boleto','P'=>'pix'];


    public function toArray(Request $request): array
    {
        $paid=$this->paid;
        return [

            'user'=>[ 
                'name'=>$this->user->name,
                'email'=>$this->user->email
            ],
            'type'=>$this->types[$this->type],
            'value'=>'R$ '. number_format($this->value,2,',','.'),
            'paid'=>$paid ?'Pago':'Não pago',
            'PaymentDate'=>$paid?Carbon::parse($this->payment_date)->format('d/m/Y'):null,
            'paymentSince'=>$paid?Carbon::parse($this->payment_date)->diffForHumans():null,
        ];
    }
}
