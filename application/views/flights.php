<!-- Table formatting for the Flights page 
     TE 
-->
<div id="body">
    <h3>Schedule</h3>
    <p>Hover over flight number for more information</p>
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
                <td><a data-toggle="tooltip" data-placement="top" title="{port1} - {port2}">{id}</a></td>
                <td>{from}</td>
                <td>{to}</td>
                <td>{dep}</td>
                <td>{arr}</td>
                <td>{plane}</td>
            </tr>
            {/schedule}
        </tbody>
    </table>        
</div>
<!-- Make tooltip look pretty -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>