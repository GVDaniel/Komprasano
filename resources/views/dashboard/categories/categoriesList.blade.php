@extends('dashboard.base')

@section('content')

<div class="container-fluid">
            <div class="fade-in">
              <div class="row">
              <example-component></example-component>
              <createCategory-component></createCategory-component>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header"><strong>Crear Nueva Categoría</strong></div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Nombre de la categoría">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit"> Crear</button>
                    </div>
                  </div>
                  </form>
                </div>
                <!-- /.col-->
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header"><strong>Categorías Existentes</strong></div>
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                              <td><strong>{{ $category->name }}</strong></td>
                              <td>
                                  <span class="badge badge-pill badge-success">
                                      Activada
                                  </span>
                              </td>
                              <td>
                                <a href="{{ url('/categories/' . $category->id . '/edit') }}" class="btn btn-block btn-primary">Editar</a>
                              </td>
                              <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                    <button class="btn btn-block btn-danger">Eliminar</button>
                                </form>
                              </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
                <!-- /.col-->
              </div>
            </div>
          </div>


@endsection

@section('javascript')

@endsection