<div class="mb-3">
    <a href="{{ route('students.index', array_merge(request()->all(), ['sort' => request('sort') === 'asc' ? 'desc' : 'asc'])) }}" class="btn btn-outline-secondary btn-sm">
        Sort by Name:
        @if(request('sort') === 'asc')
            <strong>ASC</strong>
        @elseif(request('sort') === 'desc')
        <strong>DESC</strong>
        @endif
    </a>
</div>



