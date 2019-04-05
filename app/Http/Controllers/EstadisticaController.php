<?php

namespace App\Http\Controllers;

use App\DataTables\EstadisticaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEstadisticaRequest;
use App\Http\Requests\UpdateEstadisticaRequest;
use App\Repositories\EstadisticaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use Charts;
use App\Models\Estadistica;

class EstadisticaController extends AppBaseController
{
    /** @var  EstadisticaRepository */
    private $estadisticaRepository;

    public function __construct(EstadisticaRepository $estadisticaRepo)
    {
        $this->estadisticaRepository = $estadisticaRepo;
    }

    /**
     * Display a listing of the Estadistica.
     *
     * @param EstadisticaDataTable $estadisticaDataTable
     * @return Response
     */
    public function index(EstadisticaDataTable $estadisticaDataTable)
    {
        // $total = Estadistica::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
    $total = Estadistica::where(DB::raw("(to_char(created_at,'YYYY'))"),date('Y'))
                ->get();          

        $pie  =  Charts::database($total, 'pie', 'highcharts')
        ->title('Tasa de Accidentalidad (por meses)')
        ->dimensions(1000,500)
        ->groupByMonth(date('Y'), true)
        ->responsive(true);
        return $estadisticaDataTable->render('estadisticas.index', ['pie' => $pie]);

    }

    /**
     * Show the form for creating a new Estadistica.
     *
     * @return Response
     */
    public function create()
    {
        $k = 240000;
        //ia
        $tasaAccidentalidad = DB::table('ausentismos')
        ->where('ausentismos.id_tipoausentismo','=', '2')
        ->select('ausentismos.id')->count();
        $numeroTrabajadores = DB::table('empleados')
        ->select('empleados.*')->count();
        $totalTasaAccidentalidad = ($tasaAccidentalidad /$numeroTrabajadores) *100;

        //is
        $severidadAccidente = DB::table('ausentismos')
        ->where('ausentismos.id_tipoausentismo','=', '2')
        ->sum('ausentismos.tiempo_ausencia');
        $employ = DB::table('ausentismos')
        ->join('empleados', 'empleados.id', '=', 'ausentismos.id_empleado')
        ->where('ausentismos.id_tipoausentismo','=', '2')
        ->select('ausentismos.id_empleado')->count();
        $totalSeveridadAccidente = ($severidadAccidente + 240)/((240*$employ)-$severidadAccidente)*$k;
        //if
        $totalFrecuenciaAccidentes = ($tasaAccidentalidad/240)*$k;
        //ma 
        $accidenteMortal = DB::table('ausentismos')
        ->where([['ausentismos.id_tipoausentismo','=', '2'],
                        ['ausentismos.Grado', '=', 'SEVERO']])->count();

        $accidenteTrabajo = DB::table('ausentismos')
        ->where('ausentismos.id_tipoausentismo','=', '2')->count();

        $TotalMortalidadAccidente = $accidenteMortal/$accidenteTrabajo * 100;

        //ili
        $indiceLeccionesIncapacitantes = $totalFrecuenciaAccidentes*$totalSeveridadAccidente/1000;

        return view('estadisticas.create', ['totalTasaAccidentalidad' => $totalTasaAccidentalidad, 
        'totalFrecuenciaAccidentes' => $totalFrecuenciaAccidentes,
        'totalSeveridadAccidente' => $totalSeveridadAccidente,
        'TotalMortalidadAccidente' => $TotalMortalidadAccidente,
        'indiceLeccionesIncapacitantes' => $indiceLeccionesIncapacitantes]);

    }

    /**
     * Store a newly created Estadistica in storage.
     *
     * @param CreateEstadisticaRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadisticaRequest $request)
    {
        $input = $request->all();

        $estadistica = $this->estadisticaRepository->create($input);

        Flash::success('Estadistica saved successfully.');

        return redirect(route('estadisticas.index'));
    
    }

    /**
     * Display the specified Estadistica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadistica = $this->estadisticaRepository->findWithoutFail($id);

        if (empty($estadistica)) {
            Flash::error('Estadistica not found');

            return redirect(route('estadisticas.index'));
        }

        return view('estadisticas.show')->with('estadistica', $estadistica);
    }

    /**
     * Show the form for editing the specified Estadistica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadistica = $this->estadisticaRepository->findWithoutFail($id);

        if (empty($estadistica)) {
            Flash::error('Estadistica not found');

            return redirect(route('estadisticas.index'));
        }

        return view('estadisticas.edit')->with('estadistica', $estadistica);
    }

    /**
     * Update the specified Estadistica in storage.
     *
     * @param  int              $id
     * @param UpdateEstadisticaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadisticaRequest $request)
    {
        $estadistica = $this->estadisticaRepository->findWithoutFail($id);

        if (empty($estadistica)) {
            Flash::error('Estadistica not found');

            return redirect(route('estadisticas.index'));
        }

        $estadistica = $this->estadisticaRepository->update($request->all(), $id);

        Flash::success('Estadistica updated successfully.');

        return redirect(route('estadisticas.index'));
    }

    /**
     * Remove the specified Estadistica from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadistica = $this->estadisticaRepository->findWithoutFail($id);

        if (empty($estadistica)) {
            Flash::error('Estadistica not found');

            return redirect(route('estadisticas.index'));
        }

        $this->estadisticaRepository->delete($id);

        Flash::success('Estadistica deleted successfully.');

        return redirect(route('estadisticas.index'));
    }
}
