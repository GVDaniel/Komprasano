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
                      <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th class="text-center">
                              <svg class="c-icon">
                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-list-numbered"></use>
                              </svg>
                            </th>
                            <th>{{ __('Editar') }}: {{ $subcategory->name }}</th>
                            <th class="text-center">Estado</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        <form method="POST" action="/stock/subcategoryUpdate/{{ $subcategory->id }}">
                        @csrf
                        @method('PUT')
                          <tr>
                            <td class="text-center">
                              <div class="c-avatar"><img class="c-avatar-img" src="{{asset('assets/img/avatars/1.jpg')}}" alt="user@email.com"></div>
                            </td>
                            <td style="vertical-align: top;">
                              <div class="form-group">
                                  <input class="form-control" id="name" name="name" type="text" value="{{ $subcategory->name }}" placeholder="Nombre de la subcategoría">
                              </div>
                              <div class="form-group">
                                  <textarea class="form-control" id="description_short" name="description_short" rows="4" placeholder="Descripción Corta">{{ $subcategory->description_short }}</textarea>
                              </div>
                            </td>
                            <td class="text-center" style="vertical-align: top;">
                              <div class="form-group">
                                <select class="form-control" id="status_id" name="status_id">
                                    <option value="{{ $subcategory->status->id }}">{{ $subcategory->status->name }}</option>
                                    <optgroup label=Estados>
                                    <option value="5">En Stock</option>
                                    <option value="6">Por Agotarse</option>
                                    <option value="7">Agotado</option>
                                </select>
                              </div>
                              <div class="form-group">
                                 <textarea class="form-control" id="description_large" name="description_large" rows="4" placeholder="Descripción Larga">{{ $subcategory->description_large }}</textarea>
                              </div>
                            </td>
                            <td style="vertical-align: top;">
                              <div class="small text-muted">
                                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                    <button class="btn btn-blck btn-outline-primary" type="submit">
                                            <i class="c-icon cil-color-border"></i> Guardar
                                    </button>
                                    <a href="javascript: history.go(-1)">
                                        <span class="btn btn-blck btn-outline-primary">
                                                <i class="c-icon cil-action-undo"></i> Volver
                                        </span>
                                    </a>
                                    <label class="btn btn-primary mt-2 ml-1">
                                        <i class="cil-plus"></i>
                                        <i class="cil-file"></i>
                                        New file <input type="file" name="file" id="file-file-input" hidden>
                                    </label>
                                    <input class="form-control" type="text" name="image" value="imagen.jpg">
                                    <small>imagen.jpg</small>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </form>
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
@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
