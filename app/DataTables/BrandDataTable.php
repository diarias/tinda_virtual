<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
{
     /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $editBtn = "<a href='".route('admin.brand.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.brand.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

                return $editBtn.$deleteBtn;
            })
            ->addColumn('logo', function($query){
               return "<img width='100px' src='".asset($query->logo)."' ></img>";
            })
            ->addColumn('is_featured', function($query){
                $active = '<i class="badge badge-success">Yes</i>';
                $inActive = '<i class="badge badge-danger">No</i>';
                if($query->is_featured == 1){
                    return $active;
                }else {
                    return $inActive;
                }
            })
            ->addColumn('status', function($query){
                if($query->status == 1){
                    $button = '<label class="custom-switch mt-2">
                        <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status" >
                        <span class="custom-switch-indicator"></span>
                    </label>';
                }else {
                    $button = '<label class="custom-switch mt-2">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                        <span class="custom-switch-indicator"></span>
                    </label>';
                }
                return $button;
            })
            ->rawColumns(['logo', 'is_featured', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('brand-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ])
                    ->language([
                        'emptyTable' => 'No hay datos disponibles en la tabla',
                        'info' => 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                        'infoEmpty' => 'Mostrando 0 a 0 de 0 registros',
                        'infoFiltered' => '(filtrado de _MAX_ registros totales)',
                        'lengthMenu' => 'Mostrar _MENU_ registros por página',
                        'loadingRecords' => 'Cargando...',
                        'processing' => 'Procesando...',
                        'search' => 'Buscar:',
                        'zeroRecords' => 'No se encontraron registros coincidentes',
                        'paginate' => [
                            'first' => 'Primero',
                            'last' => 'Último',
                            'next' => 'Siguiente',
                            'previous' => 'Anterior'
                        ],
                        'aria' => [
                            'sortAscending' => ': activar para ordenar la columna ascendente',
                            'sortDescending' => ': activar para ordenar la columna descendente'
                        ],
                        'select' => [
                            'rows' => [
                                '_' => 'Seleccionado %d filas',
                                '0' => 'Haga clic en una fila para seleccionarla',
                                '1' => '1 fila seleccionada'
                            ]
                        ]
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('logo')->width(200)->title('Logo'),
            Column::make('name')->width(300)->title('Nombre'),
            Column::make('is_featured')->title('esta_presentado'),
            Column::make('status')->title('Estado'),
            Column::computed('action')->title('Acción')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brand_' . date('YmdHis');
    }
}
