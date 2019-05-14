<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Test</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
        
    </head>
    <body>
        <div id="main" class="container-fluid">
            <br>
            <h1>Test clientes</h1>
            <div class="card">
                <div class="card-header">
                        Clientes
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="text-center">
                            <tr>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Telefono</th>
                              <th>Estado</th>
                              <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr v-for="cliente in clientes" :key="cliente.id" class="text-center">
                                <td>@{{ cliente.id }}</td>
                                <td>@{{ cliente.nombre }}</td>
                                <td>@{{ cliente.apellido }}</td>
                                <td>@{{ cliente.telefono }}</td>
                                <td>
                                    
                                    <span class="badge badge-danger" v-show="cliente.status === 0">Inactivo</span>
           
                                    <span class="badge badge-success" v-show="cliente.status === 1">Activo</span>
            
                                </td>                            
                                <td>
                                    
                                    <button class="btn btn-success" v-show="cliente.status === 0" @click="changeStatus(cliente, pagination.current_page)">Activar</button>

                                    <button class="btn btn-danger" v-show="cliente.status === 1" @click="changeStatus(cliente, pagination.current_page)"> Inactivar</button>
                                    
                                </td>
                            </tr>
                            
                            <tr v-if="clientes.length === 0">
                                <td colspan="6" class="text-center">
                                   No se encontraron registros
                                </td>
                            </tr>
                                                    
                        </tbody>
                    </table>

                    <div class="row" v-if="clientes.length > 0">
                    <div class="col-md-1">
                        <span class="badge badge-primary">Total: @{{pagination.total}}</span>
                    </div>
                    <div class="col-md-11">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#!" @click="getClientes(pagination.prev_page_url)">Anterior</a></li>
                                <li class="page-item disabled"><a class="page-link text-dark" href="#!">@{{ pagination.current_page }} de @{{ pagination.last_page}}</a></li>
                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#!" @click="getClientes(pagination.next_page_url)">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
            
        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
