@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <!-- Inventario-->
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">Invetario</div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-6">
                              <div class="c-callout c-callout-info"><small class="text-muted">New Clients</small>
                                <div class="text-value-lg">9,123</div>
                              </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-6">
                              <div class="c-callout c-callout-danger"><small class="text-muted">Recuring Clients</small>
                                <div class="text-value-lg">22,643</div>
                              </div>
                            </div>
                            <!-- /.col-->
                          </div>
                          <!-- /.row-->
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-6">
                              <div class="c-callout c-callout-warning"><small class="text-muted">Pageviews</small>
                                <div class="text-value-lg">78,623</div>
                              </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-6">
                              <div class="c-callout c-callout-success"><small class="text-muted">Organic</small>
                                <div class="text-value-lg">49,123</div>
                              </div>
                            </div>
                            <!-- /.col-->
                          </div>
                          <!-- /.row-->
                        </div>
                        <!-- /.col-->
                      </div>
                      <!-- /.row--><br>
                      <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th class="text-center">
                              <svg class="c-icon">
                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-list-numbered"></use>
                              </svg>
                            </th>
                            <th>Categoría</th>
                            <th class="text-center">Estado</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                            <td class="text-left">
                            </td>
                            <td>
                            </td>
                            <td class="text-left">
                            </td>
                            <td>
                              <div class="small text-muted">
                                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                 <a href="#" data-toggle="modal"
                                             data-target="#category_create">
                                    <span    style="margin: 2px;"
                                             class="btn btn-blck btn-outline-primary"
                                             >
                                      <i class="c-icon cil-playlist-add"></i> Nueva Caregoría
                                    </span>
                                 </a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @foreach($categories as $category)
                          <tr>

                            <td class="text-center">
                            <a href="{{ url('/stock/' . $category->id . '/show') }}">
                              <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com"></div>
                            </a>
                            </td>
                            <td>
                            <a href="{{ url('/stock/' . $category->id) }}">
                              <div>{{ $category->name }}</div>
                            </a>
                              <div class="small text-muted">Actualizado el: {{ $category->updated_at }}</div>

                            </td>
                            <td class="text-center">
                                  <span class="{{ $category->status->class }}">
                                      {{ $category->status->name }}
                                  </span>
                            </td>
                            <td>
                              <div class="small text-muted">
                                <div class="btn-group">

                                  <a href="{{ url('/stock/' . $category->id . '/edit') }}">
                                    <button class="btn btn-blck btn-outline-primary" style="margin: 2px;">
                                      <i class="c-icon cil-color-border"></i> Editar
                                    </button>
                                   </a>
                                    <form action="{{ route('stock.destroy', $category->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                     <button type="submit" class="btn btn-blck btn-outline-danger" style="margin: 2px;"><i class="c-icon cil-x"></i> Eliminar</button>
                                    </form>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- / end Inventario-->
            </div>
          </div>
           <!-- /.modal-->
           <div class="modal fade" id="category_create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-primary" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">
                       <svg class="c-icon">
                         <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-list-numbered"></use>
                       </svg>
                       Crear Categoría
                    </h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  </div>
                  <div class="modal-body">
                  <form method="POST" action="{{ route('stock.store') }}">
                @csrf
                  <div class="form-group">
                    <label for="name">Nombre</label>
                      <input class="form-control" id="name" name="name" type="text" placeholder="Nombre de la categoría">
                      <input  type="hidden" id="status_id" name="status_id" value="5">
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" type="submit"> Crear</button>
                  </div>
                  </form>
                </div>
                <!-- /.modal-content-->
              </div>
              <!-- /.modal-dialog-->
            </div>
            <!-- /.modal-->

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
