<?php

namespace App\Models;

use GrahamCampbell\ResultType\Success;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Historic;

class Balance extends Model
{
    use HasFactory;

   public $timestamps = false;


    public function deposit(float $amount) : Array{
    

        $totalbefore = $this->amount;
       // dd( $totalbefore);
        $this->amount += $amount;
        //dd( $this->amount);
        $balance = $this->save();
       // dd( $balance);

      $historico = auth()->user()->historics()->create([
        
        'type'           => "I",
        'amount'         => $amount,
        'total_before'   => $totalbefore,
        'total_after'    => $this->amount,
        'date'           => date('Ymd'),
      
        
       ]);
       


        if($balance && $historico){
            return [
                'success' => true,
                'message' => 'Sucesso ao recarregar'
            ];
            return [
                'danger' => FALSE,
                'message' => 'Falha ao recarregar'
                
            ];
        }
    }

}
