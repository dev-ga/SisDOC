<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\DB;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codper = auth()->user()->cedula;
        /*$usuario = Usuario::All();*/
        /*dd($u);*/
        $query = "select * from sno_personalnomina where codper = '$codper' order by codnom asc";
        /*$query = "select * from sno_personalnomina inner join sno_periodo on sno_personalnomina.codnom = sno_periodo.codnom where sno_personalnomina.codper = '$codper'";*/
        $query2 = "select * from sno_personalnomina inner join sno_periodo on sno_personalnomina.codnom = sno_periodo.codnom where sno_personalnomina.codper = '$codper'";
        
        $codnom = DB::connection('sigesp')->select($query);
        $codperi = DB::connection('sigesp')->select($query2);

        /*dd($usuario);*/
        /*return view('frontend.recibo', compact('usuario'));*/

        $query2 = "select * from sno_personalnomina inner join sno_periodo on sno_personalnomina.codnom = sno_periodo.codnom where sno_personalnomina.codper = '$codper'";

        return view('frontend.recibo')->with('codnom', $codnom)->with('codperi', $codperi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
