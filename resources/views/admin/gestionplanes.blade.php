@extends('layouts.layout')

@section('content')
    @php
        $paises = [
            'ar' => 'Argentina',
            'bo' => 'Bolivia',
            'br' => 'Brasil',
            'cl' => 'Chile',
            'co' => 'Colombia',
            'ec' => 'Ecuador',
            'mx' => 'México',
            'pe' => 'Perú',
            've' => 'Venezuela',
        ];
    @endphp
    <style>
        .modal {
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close, .closeDelete {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <div class="p-4">
        <div>
            <h2 class="text-xl">Gestionar Planes</h2>
            <div class="flex flex-col">
                <table>
                    <thead>
                        <td>Nombre</td>
                        <td class="text-center">Tiempo<br/>Meses</td>
                        <td class="text-center">Cantidad de<br/> Anuncios</td>
                        <td class="text-center">Precio<br/>Argentina</td>
                        <td class="text-center">Precio<br/>Bolivia</td>
                        <td class="text-center">Precio<br/>Brasil</td>
                        <td class="text-center">Precio<br/>Chile</td>
                        <td class="text-center">Precio<br/>Colombia</td>
                        <td class="text-center">Precio<br/>Ecuaodr</td>
                        <td class="text-center">Precio<br/>Mexico</td>
                        <td class="text-center">Precio<br/>Perú</td>
                        <td class="text-center">Precio<br/>Venezuela</td>
                        <td class="text-center">Acción</td>
                    </thead>
                    <tbody>
                        @forelse($planes as $plan)
                            <td class="px-4 py-2">{{ $plan->nombre }}</td>
                            <td class="px-4 py-2">{{ $plan->tiempo_meses }}</td>
                            <td class="px-4 py-2">{{ $plan->cantidad_anuncios }}</td>
                            <td class="px-4 py-2">ARS {{ $plan->precio_ar }}</td>
                            <td class="px-4 py-2">BOB {{ $plan->precio_bo }}</td>
                            <td class="px-4 py-2">BRL {{ $plan->precio_br }}</td>
                            <td class="px-4 py-2">CLP {{ $plan->precio_cl }}</td>
                            <td class="px-4 py-2">COP {{ $plan->precio_co }}</td>
                            <td class="px-4 py-2">USD {{ $plan->precio_ec }}</td>
                            <td class="px-4 py-2">MXN {{ $plan->precio_mx }}</td>
                            <td class="px-4 py-2">PEN {{ $plan->precio_pe }}</td>
                            <td class="px-4 py-2">USD {{ $plan->precio_ve }}</td>
                            <td class="px-4 py-2">
                                <div class="flex">
                                    <img src="{{ asset('assets/icons/pencil.svg')}}" alt="edit" width="20" title="Editar">
                                    <img src="{{ asset('assets/icons/delete.svg')}}" alt="delete" width="16" id="deleteBtn" name="{{ $plan->id}}" title="Eliminar">
                                </div>
                            </td>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">No hay planes disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($errors->has('mensaje'))
                    <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
                        {{ $errors->first('mensaje') }}
                    </div>
                @endif
                <div>
                    <button class="bg-blue-500 text-white p-1 rounded-md" id="myBtn">Crear Plan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->

    <div id="modalDelete" class="modal fixed w-full h-full hidden">
        <div class="modal-content rounded-md">
            <span class="closeDelete">&times;</span>
            <div>
                <h2 class="text-xl">¿Desea eliminar este plan?</h2>
                <div>
                    <form action="{{ route('admin.eliminarplan') }}" method="POST" name="eliminar_form">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id_eliminar" value="">
                        <input type="hidden" name="accion" value="eliminar">
                        <div class="flex">
                            <button type="button" onclick="document.getElementById('modalDelete').style.display = 'none'" class="bg-red-500 text-white p-1 rounded-md" autofocus>No</button>
                            <button type="submit" class="bg-green-500 text-white p-1 mx-1 rounded-md">Si</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fixed w-full h-full hidden">
        <!-- Modal content -->
        <div class="modal-content rounded-md">
            <span class="close">&times;</span>
            <h2>Crear Plan</h2>
            <form action="{{ route('admin.editarplan') }}" class="flex flex-col" method="POST">
                @csrf
                <input type="text" placeholder="Nombre" name="nombre" required>
                <input type="number" placeholder="Meses" name="tiempo_meses" min="1" required>
                <div>
                    <input type="number" placeholder="Cantidad de Anuncios" name="cantidad_anuncios" min="1"
                        required>
                </div>
                @foreach ($paises as $codigo => $nombre)
                    <div class="flex flex-row my-1">
                        <div class="flex flex-row">
                            <label>Precio {{ $nombre }}</label><img src="{{ asset("assets/flags/{$codigo}.svg") }}"
                                alt="ve" width="16" class="mx-1">
                        </div>
                        <input type="number" min="1" name="precio_{{ $codigo }}" required
                            class="border-pink-500 border-2 rounded-md">
                    </div>
                @endforeach
                <input type="hidden" name="accion" value="crear">
                <button class="bg-blue-500 text-white p-1 rounded-md" type="submit">Crear Plan</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/modal.js')}}"></script>
@endsection
