<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerProductsDataTable extends DataTable
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
            $editBtn = "<a href='".route('admin.products.edit', $query->id)."' class='btn btn-warning'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<a href='".route('admin.products.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
            $moreBtn = '<div class="dropdown dropleft d-inline">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top:0px; left:0px; will-change:transform;">
                <a class="dropdown-item has-icon" style="margin-rigth:3%" href="'.route('admin.products-image-gallery.index', ['product' => $query->id]).'"><i class="far fa-images"> Galeria</i></a>
                <a class="dropdown-item has-icon" style="margin-rigth:3%" href="'.route('admin.products-variant.index', ['product' => $query->id]).'"><i class="far fa-file-alt"> Variants</i></a>
                </div>
            </div>';
            return $editBtn.$deleteBtn.$moreBtn;
        })
        ->addColumn('image', function($query){
            return $img = "<img width='100px' height='70px' src='".asset($query->thumb_image)."'></img>";
        })
        ->addColumn('type', function($query){
            switch ($query->product_type) {
                case 'new_arrival':
                    return '<i class="badge badge-success">New Arrival</i>';
                    break;
                    case 'featured_product':
                        return '<i class="badge badge-warning">Featured</i>';
                        break;
                        case 'top_product':
                            return '<i class="badge badge-info">Producto Top</i>';
                            break;
                            case 'best_product':
                                return '<i class="badge badge-danger">Best Product</i>';
                                break;
                default:
                return '<i class="badge badge-dark">None</i>';
                    break;
            }
        })
        ->addColumn('status', function($query){
            if($query->status == 1){
                $button = '<label class="custom-switch mt-2">
                <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                <span class="custom-switch-indicator"></span>
               </label>';
            }else{
                $button = '<label class="custom-switch mt-2">
                <input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                <span class="custom-switch-indicator"></span>
               </label>';
            }
            return $button;
        })
        ->addColumn('vendor', function($query){
            return $query->vendor->shop_name;
            
        })
        ->addColumn('approve', function($query){
            return "<select class='form-control is_approve' data-id='$query->id'>
                <option value='0'>Pending</option>
                <option selected value='1'>Approved</option>
            </select>";
        })
        ->rawColumns(['image', 'action','status', 'type', 'approve'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', '!=', Auth::user()->vendor->id)
                     ->where('is_approved', 1)
                     ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellerproducts-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0,'desc')
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
            Column::make('vendor')->title('Vendedor'),
            Column::make('image')->title('Imagen'),
            Column::make('name')->title('Nombre'),
            Column::make('price')->title('Precio'),
            Column::make('type')->title('Tipo'),
            Column::make('status')->title('Estado'),
            Column::make('approve')->title('Aprobar'),
            Column::computed('action')->title('Acción')
                  ->exportable(true)
                  ->printable(true)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerProducts_' . date('YmdHis');
    }
}
