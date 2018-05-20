<form method="GET" action="{{ route('productSearch') }}">
    <div class="input-group stylish-input-group shift-down">

        {{ csrf_field() }}
        <input type="text" class="white-box form-control"  placeholder="Search" name="search">
        <span class="input-group-addon btn">
            <button type="submit" id="search_btn">
                <span class="glyphicon glyphicon-search" ></span>
            </button>
        </span>

    </div>
</form>