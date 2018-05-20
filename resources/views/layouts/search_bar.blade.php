<form method="GET" action="{{ route('productSearch') }}">
    <fieldset>
        <div class="input-group stylish-input-group shift-down">

            {{ csrf_field() }}
            <input type="text" class="white-box form-control"
                   placeholder="Search" name="search"
                   @if(isset($old_value))
                   value="{{ $old_value }}"
                    @endif
            >
            <span class="input-group-addon btn">
                <button type="submit" id="search_btn">
                    <span class="glyphicon glyphicon-search" ></span>
                </button>
            </span>

        </div>
    </fieldset>
</form>