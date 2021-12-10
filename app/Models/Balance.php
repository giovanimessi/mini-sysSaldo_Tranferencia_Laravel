<?php

namespace App\Models;

use GrahamCampbell\ResultType\Success;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Historic;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;

class Balance extends Model
{
    use HasFactory;

   public $timestamps = false;


    public function deposit(float $amount) : Array{
      
        DB::beginTransaction();

        $totalbefore = $this->amount ? $this->amount :  0;
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
            DB::commit();
            return [
                'success' => true,
                'message' => 'Sucesso ao recarregar'
            ];
             }else{
                DB::rollBack();
             
            return [
                'danger' => FALSE,
                'message' => 'Falha ao recarregar'
                
            ];
        }
    }
        public function withDrall(float $amount) : Array{
          if($this->amount < $amount){
              return [
                  'success' => false,
                  'message' => "Saldo Insuficiente",
              ];

          }

            DB::beginTransaction();

            $totalbefore = $this->amount ? $this->amount :  0;
           // dd( $totalbefore);
            $this->amount -= $amount;
            //dd( $this->amount);
            $balance = $this->save();
           // dd( $balance);
    
          $historico = auth()->user()->historics()->create([
            
            'type'           => "O",
            'amount'         => $amount,
            'total_before'   => $totalbefore,
            'total_after'    => $this->amount,
            'date'           => date('Ymd'),
          
            
           ]);
           
    
    
            if($balance && $historico){
                DB::commit();
                return [
                    'success' => true,
                    'message' => 'Sucesso na retirada do valor',
                ];
                 }else{
                    DB::rollBack();
                 
                return [
                    'danger' => FALSE,
                    'message' => 'Falha no saque',
                    
                ];
            }


        }
    

}
