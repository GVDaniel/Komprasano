@extends('dashboard.base')

@section('content')

<div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header"><strong>Crear Nueva Categoría</strong></div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" id="name" type="text" placeholder="Nombre de la categoría">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit"> Crear</button>
                    </div>
                  </div>
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
                            <tr>
                              <td><strong>Nombre</strong></td>
                              <td>
                                  <span class="badge badge-pill badge-success">
                                      Activada
                                  </span>
                              </td>
                              <td>
                                <a href="" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                <form action="" method="POST">
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
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