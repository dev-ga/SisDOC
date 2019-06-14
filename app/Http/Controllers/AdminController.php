<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*use Illuminate\Database\Eloquent\Collection;*/
use Illuminate\Pagination\LengthAwarePaginator;
use App\Usuario;
use App\Organizacion;
/*use DB;*/

class AdminController extends Controller
{

    public function totalusuarios()
    {

        $usuario = Usuario::paginate(10);    //para renderizar
        $usuarios = Usuario::all();         //para el contador
        $totalusuarios = count($usuarios);

        $organizacion = Organizacion::paginate(10);
        $orga = Organizacion::all();
        $totalorga = count($orga);

        $querynominas = "select * from sno_nomina where racnom = '1' order by codnom";
        $querynominas = DB::connection('sigesp')->select($querynominas);
        $totalnominas = count($querynominas);

        $queryperiodos = "select distinct sno_periodo.fecdesper, sno_periodo.fechasper, sno_nomina.racnom
                        from sno_periodo inner join sno_nomina on sno_periodo.codnom = sno_nomina.codnom
                        and sno_periodo.cerper = '1' and sno_nomina.racnom = '1'";
        $queryperiodos = DB::connection('sigesp')->select($queryperiodos);
        $totalperi = count($queryperiodos);



        /*dd($usuario);*/



        return view('admin')->with('totalusuarios', $totalusuarios)
                            ->with('totalorga', $totalorga)
                            ->with('totalperi', $totalperi)
                            ->with('totalnominas', $totalnominas)
                            ->with('usuario', $usuario)
                            ->with('organizacion', $organizacion)
                            ->with('querynominas', $querynominas)
                            ->with('queryperiodos', $queryperiodos);
        /*return view('admin', compact('totalusuario', 'totalorga'));
        /*dd($totalorga);*/

    }

    
    
    public function actualizausuario()
    {
        $usuarios = Usuario::all();
        return view('actualiza')->with('usuarios', $usuarios);
    }



 
    public function eliminarusuario($id)

    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return view();
    }

    
}
