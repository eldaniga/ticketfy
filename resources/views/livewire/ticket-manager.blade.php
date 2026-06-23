<div x-data="{ darkMode: true }" 
     :class="darkMode ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-900'" 
     class="p-6 min-h-screen transition-colors duration-200">
    
    <div class="max-w-7xl mx-auto">
        
       <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold" :class="darkMode ? 'text-white' : 'text-gray-800'">Gestión de Tickets</h1>
        
            <button @click="darkMode = !darkMode" 
                type="button"
                class="flex items-center gap-2 px-4 py-2 rounded-full font-medium shadow transition duration-150"
                :class="darkMode ? 'bg-gray-800 hover:bg-gray-700 text-yellow-400' : 'bg-white hover:bg-gray-100 text-indigo-600 border border-gray-200'">
                <span x-show="!darkMode">☀️ </span>
                <span x-show="darkMode">🌙 </span>
            </button>
        </div>
        
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-600 text-white rounded-lg shadow">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6" 
             x-data="{ openCreate: false }" 
             @close-modal.window="openCreate = false">
            
            <div class="w-full md:w-1/3">
                <input wire:model.live="search" type="text" placeholder="Buscar ticket..." 
                       class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       :class="darkMode ? 'bg-gray-800 border-gray-700 text-white' : 'bg-white border-gray-300 text-gray-900'">
            </div>

            <button @click="openCreate = true" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition duration-150">
                + Nuevo Ticket
            </button>

            <div x-show="openCreate" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center bg-black bg-opacity-50 p-4" x-cloak>
                <div @click.away="openCreate = false" class="rounded-lg max-w-md w-full p-6 border"
                     :class="darkMode ? 'bg-gray-800 border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                    <h3 class="text-lg font-bold mb-4">Crear Nuevo Ticket</h3>
                    
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Título</label>
                            <input wire:model="titulo" type="text" class="w-full px-3 py-2 rounded border"
                                   :class="darkMode ? 'bg-gray-700 border-gray-600 text-white' : 'bg-gray-50 border-gray-300 text-gray-900'">
                            @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Descripción</label>
                            <textarea wire:model="descripcion" rows="3" class="w-full px-3 py-2 rounded border"
                                      :class="darkMode ? 'bg-gray-700 border-gray-600 text-white' : 'bg-gray-50 border-gray-300 text-gray-900'"></textarea>
                            @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Estado</label>
                            <select wire:model="estado" class="w-full px-3 py-2 rounded border"
                                    :class="darkMode ? 'bg-gray-700 border-gray-600 text-white' : 'bg-gray-50 border-gray-300 text-gray-900'">
                                <option value="abierto">Abierto</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="cerrado">Cerrado</option>
                            </select>
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button" @click="openCreate = false" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Cancelar</button>
                            <button  wire:click="save()" type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="rounded-lg overflow-hidden border" 
             :class="darkMode ? 'bg-gray-800 border-gray-700' : 'bg-white border-gray-200 shadow-sm'"
             x-data="{ openDelete: false }"
             @open-delete-modal.window="openDelete = true"
             @close-delete-modal.window="openDelete = false">
            
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr :class="darkMode ? 'bg-gray-700 text-gray-300' : 'bg-gray-100 text-gray-600'" class="text-sm">
                        <th class="p-4">ID</th>
                        <th class="p-4">Título</th>
                        <th class="p-4">Estado</th>
                        <th class="p-4">Fecha de Creación</th>
                        <th class="p-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm" :class="darkMode ? 'divide-gray-700' : 'divide-gray-200'">
                    @forelse($tickets as $ticket)
                        <x-ticket-row :ticket="$ticket"  />
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500">No se encontraron tickets.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-4 border-t" :class="darkMode ? 'bg-gray-800 border-gray-700' : 'bg-gray-50 border-gray-200'">
                {{ $tickets->links() }}
            </div>

            <div x-show="openDelete" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center bg-black bg-opacity-50 p-4" x-cloak>
                <div @click.away="openDelete = false" class="rounded-lg max-w-sm w-full p-6 border"
                     :class="darkMode ? 'bg-gray-800 border-gray-700 text-white' : 'bg-white border-gray-200 text-gray-900'">
                    <h3 class="text-lg font-bold mb-2">¿Confirmar Eliminación?</h3>
                    <p class="text-sm mb-4" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">Esta acción no se puede deshacer de forma sencilla.</p>
                    <div class="flex justify-end gap-2">
                        <button @click="openDelete = false" class="bg-gray-600 text-white px-4 py-2 rounded text-sm">Cancelar</button>
                        <button wire:click="delete" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm">Eliminar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>



@if($showingTicketModal && $selectedTicket)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
                
        {{-- Contenedor del Modal --}}
        <div class="w-full max-w-md rounded-xl shadow-xl overflow-hidden transform transition-all border"
             :class="darkMode ? 'bg-gray-900 border-gray-700 text-white' : ' bg-white rounded-lg  max-w-md w-full border border-slate-800/80 shadow-xl'">
                        
            {{-- Cabecera --}}
            <div class="p-6 border-b flex justify-between items-center" 
                 :class="darkMode ? 'border-gray-700' : 'border-gray-200'">
                <h3 class="text-lg font-bold">Detalles del Ticket #{{ $selectedTicket->id }}</h3>
                <button wire:click="closeViewModal" class="text-gray-400 hover:text-gray-500 text-xl">&times;</button>
            </div>

            {{-- Contenido --}}
            <div class="p-6 space-y-4">
                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Título</span>
                    <p class="text-base font-medium mt-1">{{ $selectedTicket->titulo }}</p>
                </div>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Descripción</span>
                    <p class="text-sm mt-1 whitespace-pre-line" :class="darkMode ? 'text-gray-300' : 'text-gray-600'">
                        {{ $selectedTicket->descripcion }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Estado</span>
                        <div class="mt-1">
                            <span class="px-2 py-1 rounded text-xs font-semibold 
                                {{ $selectedTicket->estado === 'abierto' ? 'bg-blue-900 text-blue-200' : '' }}
                                {{ $selectedTicket->estado === 'en_proceso' ? 'bg-yellow-950 text-yellow-300' : '' }}
                                {{ $selectedTicket->estado === 'cerrado' ? 'bg-green-900 text-green-200' : '' }}">
                                {{ $selectedTicket->estado }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Fecha de Creación</span>
                        <p class="text-sm mt-1" :class="darkMode ? 'text-gray-300' : 'text-gray-600'">
                            {{ $selectedTicket->fecha->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Pie del Modal --}}
            <div class="p-4 flex justify-end border-t bg-opacity-50" 
                 :class="darkMode ? 'border-gray-700 bg-gray-800/30' : 'border-gray-200 bg-gray-50'">
                <button wire:click="closeViewModal" 
                        class="px-4 py-2 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    Cerrar
                </button>
            </div>

        </div>
    </div>
@endif


</div>