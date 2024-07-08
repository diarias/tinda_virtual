<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
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
            $editBtn = "<a href='".route('vendor.products.edit', $query->id)."' class='btn btn-warning'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<a href='".route('vendor.products.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
            $moreBtn = '<div class="btn-group dropstart" style="margin-left:4px">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-cog"></i>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item has-icon" style="margin-rigth:3%" href="'.route('vendor.products-image-gallery.index', ['product' => $query->id]).'"><i class="far fa-images"> Galeria</i></li>
              <li><a class="dropdown-item has-icon" style="margin-rigth:3%" href="'.route('vendor.products-variant.index', ['product' => $query->id]).'"><i class="far fa-file-alt"> Variants</i></li>
            </ul>
          </div>';
            return $editBtn.$deleteBtn.$moreBtn;
        })
        ->addColumn('image', function($query){
            return $img = "<img width='100px' height='70px' src='".asset($query->thumb_image)."'></img>";
        })
        ->addColumn('type', function($query){
            switch ($query->product_type) {
                case 'new_arrival':
                    return '<i class="badge bg-success">New Arrival</i>';
                    break;
                case 'featured_product':
                    return '<i class="badge bg-warning">Featured</i>';
                    break;
                case 'top_product':
                    return '<i class="badge bg-info">Producto Top</i>';
                    break;
                            case 'best_product':
                                return '<i class="badge bg-danger">Best Product</i>';
                                break;
                default:
                return '<i class="badge bg-dark">None</i>';
                    break;
            }
        })
        ->addColumn('status', function($query){
            if($query->status == 1){
                //$button = '<label class="custom-switch mt-2">
                //<input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                //<span class="custom-switch-indicator"></span>
               //</label>';
               $button = '<div class="form-check form-switch">
               <input checked class="form-check-input change-status" type="checkbox" id="flexSwitchCheckDefault" data-id="'.$query->id.'">
                </div>';
            }else{
                //$button = '<label class="custom-switch mt-2">
                //<input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                //<span class="custom-switch-indicator"></span>
               //</label>';
               $button = '<div class="form-check form-switch">
               <input class="form-check-input change-status" type="checkbox" id="flexSwitchCheckDefault" data-id="'.$query->id.'">
                </div>';
            }
            return $button;
        })
        ->addColumn('approved', function($query){
            if($query->status == 1) {
                return '<i class="badge bg-success">Approved</i>';
            } else {
                return '<i class="badge bg-warning">Pending</i>';
            }
        })
        ->rawColumns(['image', 'action','status', 'type', 'approved'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', Auth::user()->vendor->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproduct-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::make('image')->width(150)->title('Imagen'),
            Column::make('name')->title('Nombre'),
            Column::make('price')->title('Precio'),
            Column::make('approved')->title('Aprobar'),
            Column::make('type')->width(50)->title('tipo'),
            Column::make('status')->title('Estado'),
            Column::computed('action')->title('Acción')
                  ->exportable(true)
                  ->printable(true)
                  ->width(500)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProduct_' . date('YmdHis');
    }
}
