@extends('layouts.admin')
@section('contenido')
<div class="col-md-10">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nuevo Ingreso</h3>
        </div>
        <form action="{{route('ingreso.store')}}" method="POST" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="proveedor">Proveedor</label>
                    <select name="id_proveedor" class="form-control" id="id_proveedor">
                        @foreach ($personas as $persona )
                            <option value="{{$persona->id_persona}}">{{$persona->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipo_documento">Tipo de documento</label>
                    <select name="tipo_documento" class="form-control" id="tipo_documento">
                        <option value="rfc">RFC</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="num_documento">Numero de documento</label>
                    <input type="text" class="form-control" name="num_documento" id="num_documento" placeholder="Ingrese su tipo de documento">
                </div>
                <div class="form-group">
                    <label for="proveedor">Productos</label>
                    <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
                        @foreach ($productos as $producto )
                            <option value="{{$producto->id_producto}}">{{$producto->Articulo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">cantidad</label>
                    <input type="number"  class="form-control" name="pcantidad" id="pcantidad"  placeholder="Ingrese la cantidad">
                </div>
                <div class="form-group">
                    <label for="pcompra">Precio de compra</label>
                    <input type="number"  class="form-control" name="pprecio_compra" id="pprecio_compra" step="0.01" min="0" placeholder="P.compra">
                </div>
                <div class="form-group">
                    <label for="pventa">Precio de venta</label>
                    <input type="number"  class="form-control" name="pprecio_venta" id="pprecio_venta" step="0.01" min="0" placeholder="P.venta">
                </div>
                <div class="form-group col-4">
                    <label for="accion">Accion</label>
                    <button type="button" id="bt_add" class="btn btn-block btn-outline-success ">Agregar </button>
                </div>

                <div class="card-content">
                    <div class="card-body">
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table id="detalles" class="table table-hover ">
                            <thead style="background-color:violet;">
                                <tr>
                                    <th>Opciones</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio de Compra</th>
                                    <th>Precio de Venta</th>
                                    <th>Sub total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total">$ 0.00</h4></th>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                    <button type="submit" class="btn btn-danger me-1 mb-1">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>
 <!-- agregando javascript -->
@push('scripts')
<script>
    $(document).ready(function () {
        $('#bt_add').click(function () {
            agregar();
        });
    });
    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();
    $('#pidarticulo').change(mostrarValores);

    function mostrarValores(){
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        $('#pcantidad').val(datosArticulo[1]);
        $('#unidad').html(datosArticulo[2])
    }

    function agregar(){
        
        datosArticulo=document.getElementById('pidarticulo').value.split('_');

        idarticulo=datosArticulo[0];
        articulo=$("#pidarticulo option:selected").text();
        cantidad=$("#pcantidad").val();
        precio_compra=$("#pprecio_compra").val();
        precio_venta=$("#pprecio_venta").val();
        
        if (idarticulo!="" && cantidad!="" && precio_compra!="" && precio_venta!=""){
           
            subtotal[cont]=(precio_compra*cantidad);
            total=total+subtotal[cont];
           
            var fila='<tr class="selected" id="fila'+cont+
                '"> <td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont+
                ')";>X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+idarticulo+
                '</td><td><input type="number" name="cantidad[]" value="'+cantidad+
                '"></td> <td><input type="number" name="precio_compra[]" value="'+precio_compra+
                '"></td> <td> <input type="number" name="precio_venta[]" value="'+precio_venta+
                '"</td><td>'+subtotal[cont]+'</td></tr>';
             cont++;
             limpiar();
             $("#total").html("$:"+total);
             evaluar();
             $("#detalles").append(fila);
       
        }else{
            alert("Error al ingresar los datos del artículo");
        }

    }

    function limpiar() {
        $("#pcantidad").val("");
        $("#pprecio_compra").val("");
        $("#pprecio_venta").val("");

    }
    
    function evaluar() {
        if (total>0) {
            $("#guardar").show();
        }else{
            $("#guardar").hide();
        }
    }

    function eliminar(index){
        total=total-subtotal[index];
        $("#total").html("$: " + total);
        $("#fila" + index).remove();
        evaluar();
    }
</script>
@endpush
@endsection