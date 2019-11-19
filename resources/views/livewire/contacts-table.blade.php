<div>
    <div class="row mb-4">
        <div class="col form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>
        <div class="col">
            <input wire:model="query" type="text" class="form-control" placeholder="Search Contacts...">
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <a href="#0" role="button" wire:click="sortBy('name')">
                        Name @include('livewire._sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th>
                    <a href="#0" role="button" wire:click="sortBy('email')">
                        Email @include('livewire._sort-icon', ['field' => 'email'])
                    </a>
                </th>
                <th>
                    <a href="#0" role="button" wire:click="sortBy('birthdate')">
                        Birthdate @include('livewire._sort-icon', ['field' => 'birthdate'])
                    </a>
                </th>
                <th aria-label="Actions"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <th>{{ $contact->name }}</th>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->birthdate->format('m/d/y') }}</td>
                    <td class="text-right">
                        <a href="#">Edit</a>
                        <a href="#">Remove</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col">
            {{ $contacts->links() }}
        </div>
        <div class="col text-secondary text-right">
            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} results
        </div>
    </div>
</div>
