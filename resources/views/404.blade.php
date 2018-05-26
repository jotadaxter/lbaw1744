@extends('layouts.app')

@section('content')
    <div class="about container panel-limit-margin">
        <h3 class="panel-title">404</h3>
            <div class="container padded">
                <div class="white-box">
				<style>
					table a:link		{font-size:8pt; color:red}
					table a:visited		{font-size:8pt; color:#4e4e4e}
				</style>

				<table width="400" cellpadding="3" cellspacing="5">
					<tr>
						<td id="tableProps" valign="top" align="left"><img id="pagerrorImg" SRC="\icons\pagerror.ico" width="25" height="33"></td>
						<td id="tableProps2" align="left" valign="middle" width="360"><h1 id="errortype"
						style="COLOR: black; font-size: 13pt; font-family: sans-serif"><span id="errorText">The page cannot be found</span></h1>
						</td>
						</tr>
						<tr>
						<td id="tablePropsWidth" width="400" colspan="2"><font
						style="COLOR: black; font-size: 8pt; font-family: sans-serif">The page you are looking for might have been
						removed, had its name changed, or is temporarily unavailable.</font></td>
						</tr>
						<tr>
						<td id="tablePropsWidth2" width="400" colspan="2"><font id="LID1"
						style="COLOR: black; font-size:8pt; font-family: sans-serif"><hr color="#C0C0C0" noshade>
						<p id="LID2">Please try the following:</p><ul>
						<li id="list1">If you typed the page address in the Address bar, make sure that it is
						spelled correctly.<br>
						</li>
						<li id="list2">Open the <a href="javascript:location.assign(document.location.origin)">Vapor</a> home page, and then look for links to the information
						you want. </li>
						<li id="list3">Click the <a href="javascript:history.back(1)"><img valign=bottom border=0 src="\icons\back.ico"> Back</a> button to try another link. </li>    
						</ul>
						<p><br>
						</p>
						<h2 id="ietext" style="font-size:8pt; font-family: sans-serif; color:black">HTTP 404 - File not found<br>
						Vapor Explorer <BR>
						</h2>
						</font></td>

					</tr>
				</table>
            </div>
        </div>
    </div>
@endsection

