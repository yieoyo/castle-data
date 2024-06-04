<div class="btn-group">
        <a href="{{ route('users.show', $id ?? $user->id) }}" class="btn btn-sm btn-secondary" title="{{ __('globals.show') }}">
            <span class="bi bi-eye"></span> <!-- Bootstrap eye icon -->
        </a>
        <a href="{{ route('users.edit', $id ?? $user->id) }}" class="btn btn-sm btn-warning" title="{{ __('globals.edit') }}">
            <span class="bi bi-pencil"></span> <!-- Bootstrap pencil icon -->
        </a>

        <a onclick="confirmDelete('{{ route('users.destroy', $id) }}')" href="#" class="btn btn-sm btn-danger"
           title="{{ __('globals.delete') }}">
            <span class="bi bi-trash"></span> <!-- Bootstrap arrow-return-left icon -->
        </a>
</div>