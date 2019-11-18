<div>
    <div class="row mb-4">
        <div class="col form-inline">
            Per Page: &nbsp;
            <select class="form-control" wire:model="perPage">
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>
        <div class="col">
            <input class="form-control" type="text" placeholder="Search Contacts..." wire:model="query">
        </div>
    </div>

    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th><a href="#" wire:click.prevent="sortBy('name')">Name @if ($sortField === 'name') {!! $sortAsc ? '&#9660;' : '&#9650;' !!} @endif</a></th>
                <th><a href="#" wire:click.prevent="sortBy('email')">Email @if ($sortField === 'email') {!! $sortAsc ? '&#9660;' : '&#9650;' !!} @endif</a></th>
                <th><a href="#" wire:click.prevent="sortBy('birthdate')">Birthdate @if ($sortField === 'birthdate') {!! $sortAsc ? '&#9660;' : '&#9650;' !!} @endif</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr wire:key="{{ $contact->id }}">
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->birthdate->format('m/d/Y') }}</td>
                    <td>
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
        <div class="col text-right text-secondary">
            Showing {{ $contacts->count() }} results of {{ $contacts->total() }}
        </div>
    </div>
</div>
