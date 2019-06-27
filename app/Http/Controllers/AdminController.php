<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*use Illuminate\Database\Eloquent\Collection;*/
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
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

    
    
    public function listausuarios()
    {
        $usuarios = Usuario::all();
        return view('listarusuarios')->with('usuarios', $usuarios);
    }

    public function listaempresas()
    {
        $orga = Organizacion::all();
        return view('listarempresas')->with('orga', $orga);
    }

    public function listanominas()
    {
        $querynominas = "select * from sno_nomina where racnom = '1' order by codnom";
        $querynominas = DB::connection('sigesp')->select($querynominas);
        $totalnominas = count($querynominas);
        return view('listarnominas')->with('querynominas', $querynominas);
    }

    public function periodoscerrados()
    {
        $queryperiodos = "select distinct sno_periodo.fecdesper, sno_periodo.fechasper, sno_nomina.racnom
                        from sno_periodo inner join sno_nomina on sno_periodo.codnom = sno_nomina.codnom
                        and sno_periodo.cerper = '1' and sno_nomina.racnom = '1'";
        $queryperiodos = DB::connection('sigesp')->select($queryperiodos);
        return view('listarusuarios')->with('queryperiodos', $queryperiodos);
    }

    public function editarusuario($id)

    {
        $usuario = Usuario::where('id', $id)->get();
        // $usuario::with('pregunta')->get();
       
        return view('update')->with('usuario', $usuario);
    }

    public function actualizausuario(Request $request, $id)

    {
        $validacion = validator::make($request->all(),
        [
            'nombre'            => 'required|max:50',
            'apellido'          => 'required|max:50',
            'cedula'            => 'required|max:10',
            'organizacion_id'   => 'required|max:1',
            'email'             => 'email|unique:usuarios',
            'password'          => 'required|min:6|max:10',
            'pregunta_id'       =>'required|max:1',
            'respuesta'         =>'required|max:50'

        ]);
        if ($validacion->fails())
        
        {
            return redirect('update')->withInput()->withErrors($validacion);
        }

        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $cedula = $request->input('cedula');
        $organizacion = $request->input('organizacion_id');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $pregunta = $request->input('pregunta_id');
        $respuesta = $request->input('respuesta');

       
        $data = array (
            'nombre' => $nombre,
            'apellido' => $apellido,
            'cedula' => $cedula,
            'organizacion_id' => $organizacion,
            'email' => $email,
            'password' => $password,
            'pregunta_1' => $pregunta,
            'respuesta' => $respuesta,
        );
        
        Usuario::find($id)->update($data);

        return view('admin');
       

       
       
    }


 
    public function eliminarusuario($id)

    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return view('listar-usuarios');
    }

    
}
