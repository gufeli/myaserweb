<?php

namespace App\DataTables;

use App\Models\Solicitud;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SolicitudDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'solicituds.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Solicitud $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Solicitud $model)
    {
        return $model->newQuery()->with(['cupo','institucion','examen','exameninstitucion']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'language' => [
                    'url' => url('http://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'),//<--here
                ],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'fecha_inicio',
            ['title' => 'Cupo',
               'data' => 'cupo.serial',
               'name' => 'id_serial'],
            'nombre',
            //'id_examen',
            ['title' => 'Examen',
            'data' => 'examen.name',
            'name' => 'id_examen'],
            //'id_institucion',
             ['title' => 'Institucion',
             'data' => 'institucion.name',
             'name' => 'id_institucion'],
            //'id_examen_institucion',
             ['title' => 'Costo',
             'data' => 'exameninstitucion.valor_previser',
             'name' => 'id_examen_institucion'],
            'fecha_cita',
            'progreso',
            'observacion',
            'hora'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'solicitudsdatatable_' . time();
    }
}
