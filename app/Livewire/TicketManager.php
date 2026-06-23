<?php

namespace App\Livewire;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use Livewire\Component;
use Livewire\WithPagination;

class TicketManager extends Component
{
    use WithPagination;

    public $search = '';
    public $titulo = '';
    public $descripcion = '';
    public $estado = 'abierto';
    public $selectedTicketId;

    public $openDelete=false; //


    public $showingTicketModal = false;
    public $selectedTicket = null;
    

    //MODAL DE VER TICKET

    public function openViewModal($id)
    {
        $this->selectedTicket= Ticket::findOrFail($id);
        $this->showingTicketModal = true;
    }

    public function closeViewModal()
    {
        $this->showingTicketModal = false;
        $this->selectedTicket = null;
    }


    //
    //FUNCION ELIMINAR TICKET

    public function openDeleteModal($id)
    {
        $this->dispatch("open-delete-modal"); 
        $this->selectedTicketId= $id;
        $this->openDelete = true;    
    }

   public function delete()
    { 
        if (!$this->selectedTicketId) {
            return;
        }

        $ticket = Ticket::find($this->selectedTicketId);

    
        if ($ticket) {
            $ticket->delete();
            
            session()->flash('message', 'El ticket #' . $this->selectedTicketId . ' ha sido eliminado con éxito.');
        } else {
         
            session()->flash('error', 'No se pudo encontrar el ticket para eliminar.');
        }
        $this->reset('selectedTicketId');
        $this->dispatch('close-delete-modal'); //cierro la modal
    }



    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules(): array
    {
        return (new StoreTicketRequest())->rules();
    }


    //FUNCION GUARDAR TICKET CREADO
    public function save()
    {
        $validatedData = $this->validate();
        Ticket::create($validatedData);

        $this->reset(['titulo', 'descripcion', 'estado']);
        $this->dispatch('close-modal');
        session()->flash('message', 'Ticket creado correctamente.');
    }

    public function render()
    {

        //Busco y filtro por titulo y descripcion    
        $tickets = Ticket::where('titulo', 'ilike', '%' . $this->search . '%')
            ->orWhere('descripcion', 'ilike', '%' . $this->search . '%')
            ->orderBy('fecha', 'desc')
            ->paginate(10);

        return view('livewire.ticket-manager', [
            'tickets' => $tickets
        ]);
    }
}