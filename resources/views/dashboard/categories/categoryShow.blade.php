@extends('dashboard.base')

@section('content')

<div class="container-fluid">
            <div class="fade-in">
              <div class="row">
              <example-component></example-component>
              <createCategory-component></createCategory-component>
                <div class="col-sm-6">
                  <div class="card">
                      <div class="card-header">
                        <i class="fa fa-align-justify"></i>Información</div>
                      <div class="card-body">
                          <br>
                          <h4>Nombre:</h4>
                          <p>{{ $category->name }}</p>
                          <h4> Status: </h4>
                          <p>
                              <span class="badge badge-pill badge-primary">
                                Activada
                              </span>
                          </p>
                          <h4>Creada el:</h4>
                          <p>{{ $category->created_at }}</p>
                          <h4>Actualizada el:</h4>
                          <p>{{ $category->updated_at }}</p>
                          <a href="{{ route('categories.index') }}" class="btn btn-block btn-primary">{{ __('Volver') }}</a>
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
                              <td><a href="{{ url('/categories/' . $category->id) }}"><strong>{{ $category->name }}</strong></a></td>
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
                  <div class="card">
                    <div class="card-header"><strong>Subcategorías</strong></div>
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $subcategory)
                            <tr>
                              <td><strong>{{ $subcategory->name }}</strong></td>
                              <td>
                                  <span class="badge badge-pill badge-success">
                                      Activada
                                  </span>
                              </td>
                              <td>
                                <a href="{{ url('/categories/' . $subcategory->id . '/edit') }}" class="btn btn-block btn-primary">Editar</a>
                              </td>
                              <td>
                                <!-- <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                    <button class="btn btn-block btn-danger">Eliminar</button>
                                </form> -->
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