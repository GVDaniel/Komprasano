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
                          <tr style="background-color:#edfbd2;">
                            <td class="text-center">
                                <a href="">
                                <div class="c-avatar"><img class="c-avatar-img" src="{{asset('assets/img/avatars/1.jpg')}}" alt="user@email.com"></div>
                                </a>
                            </td>
                            <td>
                            <a href="">
                              <div><strong>{{ $category->name }}</strong></div>
                            </a>
                              <div class="small text-muted">Actualizado el: {{ $category->updated_at }}</div>

                            </td>
                            <td class="text-center">

                                  </span>
                            </td>
                            <td>
                              <div class="small text-muted">
                                <div class="btn-group">
                                    <a href="#" data-toggle="modal"
                                                data-target="#subcategory_create">
                                        <span   style="margin: 2px;"
                                                class="btn btn-blck btn-outline-primary"
                                                >
                                        <i class="c-icon cil-playlist-add"></i> Crear Subcategoría
                                        </span>
                                    </a>
                                    <a href="/stock">
                                        <span class="btn btn-blck btn-outline-primary"
                                              style="margin: 2px;">
                                                <i class="c-icon cil-action-undo"></i> Volver
                                        </span>
                                    </a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @foreach ($category->subcategories as $subcategory)
                          <tr>
                            <td class="text-center">
                                <a href="">
                                <div class="c-avatar"><img class="c-avatar-img" src="{{asset('assets/img/avatars/1.jpg')}}" alt="user@email.com"></div>
                                </a>
                            </td>
                            <td>
                            <a href="">
                              <div><strong>{{ $subcategory->name }}</strong></div>
                            </a>
                              <div class="small text-muted">Actualizado el:fecha</div>

                            </td>
                            <td class="text-center">
                                  <span class="">
                                  {{ $subcategory->status->name }}
                                  </span>
                            </td>
                            <td>
                              <div class="small text-muted">
                                <div class="btn-group">
                                    <a href="{{ url('/stock/' . $subcategory->id . '/subcategoryEdit') }}">
                                    <button class="btn btn-blck btn-outline-primary" style="margin: 2px;"><i class="c-icon cil-color-border"></i> Editar</button>
                                    </a>
                                    <form action="{{ route('stock.subcategoryDestroy', $subcategory->id) }}" method="POST">
                                    @method('GET')
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
           <div class="modal fade" id="subcategory_create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <form method="POST" action="{{ route('stock.subcategories') }}">
                      @csrf
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="text-input">Text Input</label>
                          <div class="col-md-9">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Nombre de la Subcategoría">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="textarea-input">Descripción Corta</label>
                          <div class="col-md-9">
                            <textarea class="form-control" id="description_short" name="description_short" rows="2" placeholder="Descripción Corta"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="textarea-input">Descripción Larga</label>
                          <div class="col-md-9">
                            <textarea class="form-control" id="description_large" name="description_large" rows="4" placeholder="Descripción Larga"></textarea>
                          </div>
                        </div>
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <input type="hidden" name="image" value="imagen.jpg">
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
