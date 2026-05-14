<div class="table-responsive">
    <table id="{{ isset($id) ? $id : 'data' }}" class="table table-bordered table-striped table-hover" style="width:100%">
        {{ $slot }}
    </table>
</div>
