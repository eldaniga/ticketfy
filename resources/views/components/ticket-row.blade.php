
@props(['ticket'])
<div>

<tr wire:click="openViewModal({{ $ticket->id }})" 
    class="cursor-pointer opacity-60 hover:opacity-100 transition-all duration-150"
    :class="darkMode ? 'hover:bg-gray-800/50' : 'hover:bg-gray-50'">

    
    <td class="p-4 font-mono" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
        #{{ $ticket->id }}
    </td>
    
    <td class="p-4">
        <span class="font-medium block" :class="darkMode ? 'text-white' : 'text-gray-900'">
            {{ $ticket->titulo }}
        </span>
        <span class="text-xs line-clamp-1" :class="darkMode ? 'text-gray-400' : 'text-gray-500'">
            {{ $ticket->descripcion }}
        </span>
    </td>
    
    <td class="p-4">
        <span class="px-2 py-1 rounded text-xs font-semibold 
            {{ $ticket->estado === 'abierto' ? 'bg-blue-900 text-blue-200' : '' }}
            {{ $ticket->estado === 'en_proceso' ? 'bg-yellow-950 text-yellow-300' : '' }}
            {{ $ticket->estado === 'cerrado' ? 'bg-green-900 text-green-200' : '' }}">
            {{ $ticket->estado }}
        </span>
    </td>
    
    <td class="p-4" :class="darkMode ? 'text-gray-400' : 'text-gray-600'">
        {{ $ticket->fecha->format('d/m/Y H:i') }}
    </td>
    
    <td class="p-4 text-center">
       
        <button wire:click.stop="openDeleteModal({{ $ticket->id }})" 
                class="text-red-400 hover:text-red-500 font-medium relative z-10">
            Eliminar
        </button>
    </td>
</tr>
</div>
