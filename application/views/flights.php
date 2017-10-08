<!-- Table formatting for the Flights page 
     TE 
-->
<div id="body">
    <table class="table table-striped">
        <thead>
            <tr>
                <!-- table headers -->
                <td><b>Flight Number</b></td>
                <td><b>From</b></td>
                <td><b>To</b></td>
                <td><b>Departure</b></td>
                <td><b>Arrival</b></td>
                <td><b>Plane</b></td>
            </tr>
        </thead>
        <tbody>
            {schedule}
            <tr>
                <!-- table content taken from FlightInfo model -->
                <td>{flightid}</td>
                <td>{to}</td>
                <td>{from}</td>
                <td>{dep}</td>
                <td>{arr}</td>
                <td>{plane}</td>
            </tr>
            {/schedule}
        </tbody>
    </table>        
</div>
