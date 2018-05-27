<div class="col-md-2">
    <form action="{{route('productsByTag')}}" method="post">
    {{ csrf_field() }}
    <!-- Sidebar Links -->
        <ul class="list-unstyled components">

            <li class="customList"><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Narrow By Tag </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <input id="opensource" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label style="cursor: pointer;" for="opensource">Open Source</label></a>

                    </li>
                    <li>
                        <input id="freeware" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label style="cursor: pointer;" for="freeware">Freeware</label></a>

                    </li>
                    <li>
                        <input id="botnet" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label style="cursor: pointer;" for="botnet">Botnet</label></a>

                    </li>
                    <li>
                        <input id="bitcoin" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label style="cursor: pointer;" for="bitcoin">Bitcoin</label></a>

                    </li>
                </ul>
            </li>
            <li class="customList"><a href="#homeSubmen" data-toggle="collapse" aria-expanded="false">Narrow By Name </a>
                <ul class="collapse list-unstyled" id="homeSubmen">
                    <li>
                        <input id="op_systems" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label for="op_systems">Op. Systems</label></a>

                    </li>
                    <li>
                        <input id="device_systems" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label for="device_systems">Device Systems</label></a>

                    </li>
                    <li>
                        <input id="middleware" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label for="middleware">MiddleWare</label></a>

                    </li>
                    <li>
                        <input id="utility_software" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label for="utility_software">Utility Software</label></a>

                    </li>
                </ul>
            </li>
            <li class="customList">
                <a href="#homeSubme" data-toggle="collapse" aria-expanded="false">Narrow By OS </a>
                <ul class="collapse list-unstyled" id="homeSubme">
                    <li>
                        <input id="windows" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label for="windows">Windows</label></a>

                    </li>
                    <li>
                        <input id="macOS" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label for="macOS">Mac OS</label></a>

                    </li>
                    <li>
                        <input id="linux" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"><label for="linux">Linux</label></a>

                    </li>
                    <li>
                        <input id="debian" type="checkbox" name="vehicle" value="Bike">
                        <a href="#"> <label for="debian">Debian</label></a>

                    </li>
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