<div class="col-md-2">
    <form action="{{route('productsByTag')}}" method="post">
    {{ csrf_field() }}
    <!-- Sidebar Links -->
        <ul class="list-unstyled components">
            <li class="customList"><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Narrow By Tag </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">

                    @if(isset($tags))
                    @foreach($tags as $tag)            
                
                    <li>
                        <input id="opensource" type="checkbox" name="{{$tag->tag_name}}" value="{{$tag->tag_name}}">
                        <a href="#"><label style="cursor: pointer;" for="opensource">{{$tag->tag_name}}</label></a>

                    </li>

                    @endforeach
                    @endif

                </ul>
            </li>
           
            <li class="customList">
                <button  type="submit">
                    Search By Tag
                </button>
            </li>
        </ul>
    </form>
</div>