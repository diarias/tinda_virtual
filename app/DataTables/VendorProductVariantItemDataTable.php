<?php

namespace App\DataTables;

use App\Models\ProductVariantItem;
use App\Models\VendorProductVariantItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductVariantItemDataTable extends DataTable
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
            //$variantItemBtn = "<a style='margin-left:2%' href='".route('admin.products-variant-item.index', ['productId' => request()->product, 'variantId' => $query->id])."' class='btn btn-info'><i class='far fa-caret-square-right'></i></a>";
            $editBtn = "<a href='".route('vendor.products-variant-item.edit', $query->id)."' class='btn btn-warning'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<a href='".route('vendor.products-variant-item.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

            return $editBtn.$deleteBtn;
        })
        ->addColumn('is_default', function($query){
            if($query->is_default == 1){
                return '<i class="badge bg-success">default</i>';
            }else{
                return '<i class="badge bg-danger">no</i>';
            }
        })
        ->addColumn('variant_name',function($query){
            return $query->productVariant->name;
        })
        ->addColumn('status', function($query){
            if($query->status == 1){
               $button = '<div class="form-check form-switch">
               <input checked class="form-check-input change-status" type="checkbox" id="flexSwitchCheckDefault" data-id="'.$query->id.'">
                </div>';
            }else{
               $button = '<div class="form-check form-switch">
               <input class="form-check-input change-status" type="checkbox" id="flexSwitchCheckDefault" data-id="'.$query->id.'">
                </div>';
            }
            return $button;
        })
        ->rawColumns(['action','status', 'is_default'])   
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariantItem $model): QueryBuilder
    {
        return $model->where('product_variant_id', request()->variantId)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproductvariantitem-table')
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
            Column::make('name')->title('Nombre'),
            Column::make('variant_name')->title('Nombre variante'),
            Column::make('price')->title('Precio'),
            Column::make('is_default')->title('Es Predeterminado'),
            Column::make('status')->title('Estado'),
            Column::computed('action')->title('Acción')
            ->exportable(false)
            ->printable(false)
            ->width(400)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProductVariantItem_' . date('YmdHis');
    }
}
