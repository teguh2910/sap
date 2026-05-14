<form action="{{ $action }}" method="POST" class="d-inline" onsubmit="return confirm('{{ isset($message) ? $message : 'Are you sure you want to delete this item?' }}');">
    {{ csrf_field() }}
    @if(isset($method) && strtoupper($method) !== 'POST')
        <input type="hidden" name="_method" value="{{ strtoupper($method) }}">
    @endif
    <button type="submit" class="btn btn-xs btn-danger">{{ isset($label) ? $label : 'Delete' }}</button>
</form>
