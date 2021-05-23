<div class="form-group">
    <form action="{{ Request::url() }}" method="get" class="form-horizontal">
        {{ $slot }}
        <div class="btn-group">
            <button type="submit" class="btn btn-secondary">Filter</button>
            <a href="{{ Request::url() }}" class="btn btn-default">Clear filters</a>
        </div>
    </form>
</div>
