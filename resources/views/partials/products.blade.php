<div id="myDIV" class="container">
    <div class="wrapper">
        <div class="col-md-2">
            <!-- Sidebar Links -->
            <ul class="list-unstyled components">
                <li class="customList"><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Narrow By Tag </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <input id="opensource" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Open Source</a>
                            <label for="opensource"></label>
                        </li>
                        <li>
                            <input id="freeware" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Freeware</a>
                            <label for="freeware"></label>
                        </li>
                        <li>
                            <input id="botnet" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Botnet</a>
                            <label for="botnet"></label>
                        </li>
                        <li>
                            <input id="bitcoin" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Bitcoin</a>
                            <label for="bitcoin"></label>
                        </li>
                    </ul>
                </li>
                <li class="customList"><a href="#homeSubmen" data-toggle="collapse" aria-expanded="false">Narrow By Name </a>
                    <ul class="collapse list-unstyled" id="homeSubmen">
                        <li>
                            <input id="op_systems" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Op. Systems</a>
                            <label for="op_systems"></label>
                        </li>
                        <li>
                            <input id="device_systems" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Device Systems</a>
                            <label for="device_systems"></label>
                        </li>
                        <li>
                            <input id="middleware" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">MiddleWare</a>
                            <label for="middleware"></label>
                        </li>
                        <li>
                            <input id="utility_software" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Utility Software</a>
                            <label for="utility_software"></label>
                        </li>
                    </ul>
                </li>
                <li class="customList">
                    <a href="#homeSubme" data-toggle="collapse" aria-expanded="false">Narrow By OS </a>
                    <ul class="collapse list-unstyled" id="homeSubme">
                        <li>
                            <input id="windows" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Windows</a>
                            <label for="windows"></label>
                        </li>
                        <li>
                            <input id="macOS" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Mac OS</a>
                            <label for="macOS"></label>
                        </li>
                        <li>
                            <input id="linux" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Linux</a>
                            <label for="linux"></label>
                        </li>
                        <li>
                            <input id="debian" type="checkbox" name="vehicle" value="Bike">
                            <a href="#">Debian</a>
                            <label for="debian"></label>
                        </li>
                    </ul>
                </li>
            </ul>
		</div>
		<div class="col-md-10">
        <div class="content">
            <div class="row">
                <div class="col-xs-8">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" class="white-box form-control" id="txtQuery" placeholder="Search...">
                        </div>
                        <button id="btnSearch" type="button" class="btn btn-default">Search</button>
                        <button id="btnClear" type="button" class="btn btn-default">Clear</button>
                    </form>
                </div>
                <div class="col-xs-4">
                    <button id="btnAdd" type="button" class="btn btn-default pull-right">Add New Record</button>
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-xs-12">
                    <table id="grid"></table>
                </div>
            </div>
        </div>

        <div id="dialog" style="visibility: hidden;">
            <input type="hidden" id="ID" />
            <form>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name">
                </div>
                <div class="form-group">
                    <label for="Tags">Tags</label>
                    <input type="text" class="form-control" id="Tags" />
                </div>
                <div class="form-group">
                    <label for="Rate">Rate</label>
                    <input type="text" class="form-control" id="Rate" />
                </div>
                <button type="button" id="btnSave" class="btn btn-default">Save</button>
                <button type="button" id="btnCancel" class="btn btn-default">Cancel</button>
            </form>
        </div>
		</div>
    </div>
</div>