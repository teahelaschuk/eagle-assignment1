<!-- Data to show: # of planes in your fleet, # flights scheduled on any day, and the names of your base airport and those that you fly to.  -->
<!-- <div class="row">
    <div class="span-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1><span class="glyphicon glyphicon-plane"></span> Fleet</h1> 
            </div>
            <div class="panel-body">
                <p>Number of Fleet: {fleetNum}</p>
            </div>
        </div>
    </div>
    <div class="span-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1><span class="glyphicon glyphicon-time"></span> Schedule</h1> 
            </div>
            <div class="panel-body">
                <p>Flights per Day: {flightsNum}</p>
            </div>
        </div>
    </div>
</div>
-->
<h4><span class="glyphicon glyphicon-plane"></span> Number of Fleet: {fleetNum}</h4> 
<h4><span class="glyphicon glyphicon-time"></span> Flights per Day: {flightsNum}</h4> 
<h3><span class="glyphicon glyphicon-map-marker"></span> Airports</h3>
<!-- Will try and make it look purdy l8r -->

<h4>Base Airport: </h4> <p>{baseAirport}</p>
<h4>Connecting Airports</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <!-- table headers -->
            <td><b>Code</b></td>
            <td><b>Airport</b></td>
        </tr>
    </thead>
    <tbody>
        {airports}
        <tr>
            <!-- table content taken from FlightInfo model -->
            <td>{id}</td>
            <td>{airport}</td>
        </tr>
        {/airports}
    </tbody>
</table>  

<br>
<br>