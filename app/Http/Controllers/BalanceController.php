<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\ValdateFormRequest;  
class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pegar dados do usuuario
        //dd(auth()->user()->name);

         $bala = auth()->user()->balance;
         $amount = $bala ? $bala->amount : 0;


        return view('admin.balance.index',compact('amount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.balance.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ValdateFormRequest $request)
    {
        //dd($request->all());

       // $balance->deposit($request->amount);
       //dd(auth()->user()->balance()->firstOrCreate([


       $balance = auth()->user()->balance()->firstOrCreate([]);
           $response = $balance->deposit($request->amount);

          if($response['success']){

           return redirect()->route('saldo')
           ->with("success" ,$response['message']);


           return redirect()
              -> back()
              ->with("error" ,$response['message']);


            }
          

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function withDrall(){
        return view('admin.balance.withdraw');


    }
    public function withDrallstore(ValdateFormRequest $request){

      //  dd($request->all());

       $balance = auth()->user()->balance()->firstOrCreate([]);
       $response = $balance->withDrall($request->amount);

      if($response['success']){

       return redirect()->route('saldo')
       ->with("success" ,$response['message']);


       return redirect()
          ->back()
          ->with("error" ,$response['message']);
      }else{
        return redirect()->route('saldo')
        ->with("error" ,$response['message']);
      }
    }
    public function transfer(){

        return view('admin.balance.transferencia');

    }

    public function transfstore(Request $request,User $user){
       //dd(auth()->user()->balance()->firstOrcreate([]));

       if (!$sender = $user->getSender($request->sender)){

          
        return redirect()
          ->back()
          ->with('error','Usuario informado nao foi encontrado!');

          if ($sender->id === auth()->user()->id ){

          
              return redirect()
                ->back()
                ->with('error','Não pode transferir para o mesmo');


              
              }

   }


   return view('admin.balance.transfer-confirm',compact('sender'));

         
    }

    public function confirmar(Request $request){

   dd($request->all());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
