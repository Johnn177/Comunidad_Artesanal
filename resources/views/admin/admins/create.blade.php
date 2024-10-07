@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Crear Nuevo Administrador</h4>

                            <!-- Formulario para crear el nuevo administrador -->
                            <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>

                                <!--<div class="form-group">
                                    <label for="type">Tipo de Administrador</label>
                                    <select name="type" class="form-control" id="type" required>
                                        <option value="superadmin">Super Administrador</option>
                                        <option value="admin">Administrador</option>
                                        <option value="subadmin">Sub Administrador</option>
                                        <option value="vendor">Vendedor</option>
                                    </select>
                                </div>-->

                                <div class="form-group">
                                    <label for="roles">Seleccionar Roles</label>
                                    <select name="roles[]" class="form-control" id="roles" multiple required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Teléfono</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>

                                <button type="submit" class="btn btn-success">Crear Administrador</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
