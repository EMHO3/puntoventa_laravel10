@extends('layouts.admin')
@section('contenido')
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nuevo proveedor</h3>
        </div>
        <form action="{{route('proveedor.store')}}" method="POST" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="ingrese el nombre del proveedor">
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
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese su tipo de documento">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su tipo de documento">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su tipo de documento">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                    <button type="submit" class="btn btn-danger me-1 mb-1">Eliminar</button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection