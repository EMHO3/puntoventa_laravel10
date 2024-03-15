@extends('layouts.admin')
@section('contenido')
<div class="col-md-10">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detalle Ingreso</h3>
        </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <p>{{$ingreso->nombre}}</p>
                </div>
                <div class="form-group">
                    <label for="tipo_documento">Tipo de documento</label>
                    <p>{{$ingreso->tipo_comprobante}}</p>
                </div>
                <div class="form-group">
                    <label for="num_documento">Numero de documento</label>
                    <p>{{$ingreso->num_comprobante}}</p>
                </div>

                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table id="detalles" class="table table-hover ">
                            <thead style="background-color:violet;">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio de Compra</th>
                                    <th>Precio de Venta</th>
                                    <th>Sub total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total: </th>
                                <th><h4 id="total">$ {{number_format($ingreso->total,2)}}</h4></th>
                            </tfoot>
                            <tbody>
                                @foreach ( $detalles as $det )
                                    <tr>
                                        <td>{{$det->producto}}</td>
                                        <td>{{$det->cantidad}}</td>
                                        <td>{{$det->precio_compra}}</td>
                                        <td>{{$det->precio_venta}}</td>
                                        <td>{{number_format($det->cantidad*$det->precio_compra,2)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection