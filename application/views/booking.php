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
       <!-- trip options here
            Work in progress: having trouble getting data from form-->
       <div class="panel-body">
           {from} <br/> {to}
       </div>       
   </div>
   
</div>
