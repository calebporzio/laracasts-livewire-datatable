<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactsTable extends Component
{
    use WithPagination;

    public $query = '';
    public $sortField = '';
    public $sortAsc = true;
    public $perPage = 10;

    public function search($query)
    {
        $this->query = $query;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortField = $field;
            $this->sortAsc = true;
        }
    }

    public function sortDirection()
    {
        return $this->sortAsc ? 'asc' : 'desc';
    }

    public function contacts()
    {
        return Contact::search($this->query)
            ->orderBy($this->sortField, $this->sortDirection())
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.contacts-table', [
            'contacts' => $this->contacts(),
            'sortDirection' => $this->sortDirection(),
        ]);
    }
}
