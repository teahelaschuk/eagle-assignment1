<div id="body">
   <h3>Booking</h3>     
    <div class="panel panel-default">
       <div class="panel-body">        
            <!-- flight booking form -->
            <form role="form" action="/booking/submit" method="get">
                <div class="form-group">
                    <label for="departure">Departing From:</label>
                    <select class="form-control" id="departure" name="departure">
                        {cities}
                        <option>{community}</option>
                        {/cities}
                    </select>
                </div>
                <div class="form-group">
                    <label for="arrival">Arriving At:</label>
                    <select class="form-control" id="arrival" name="arrival">
                        {cities}
                        <option>{community}</option>
                        {/cities}
                    </select>
                </div>                        
                <div class="form-group"> 
                    <button type="submit" class="btn btn-default" name="submit">Update Flights</button>
                </div>
            </form>  
       </div>
    </div>
    
   
   {trips}
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
            {legs}
            <tr>
                <!-- table content taken from FlightInfo model -->
                <td><a data-toggle="tooltip" data-placement="top" title="{port1} - {port2}">{id}</a></td>
                <td>{from}</td>
                <td>{to}</td>
                <td>{dep}</td>
                <td>{arr}</td>
                <td>{plane}</td>
            </tr>
            {/legs}
        </tbody>
    </table> 
    {/trips}
   
   <br/>
   <br/>
   
</div>
