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
   <div class="panel panel-default">
       <div class="panel-heading">
           Trips from {from} to {to}:
       </div>
       <div class="panel-body">
           {trips}
           {id}
           <br/>
           {/trips}           
       </div>       
   </div>
   
</div>
