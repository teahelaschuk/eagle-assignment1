<div id="body">
	<!-- <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

	<p>If you would like to edit this page you'll find it located at:</p>
	<code>application/views/welcome_message.php</code>

	<p>The corresponding controller for this page is found at:</p>
	<code>application/controllers/Welcome.php</code>

	<p>If you are exploring CodeIgniter for the very first time, you should 
		start by reading the <a href="http://www.codeigniter.com/user_guide/">User Guide</a>.</p>
        -->

        <h3>Planes</h3>
        <p>Select a plane for more </p>
        <table class="table table-striped">
            <thead>
            <tr>
                <!-- table headers -->
                <td><b>Planes</b></td>
            </tr>
            </thead>
            <tbody>
            {add}
            {planes}
            <tr>
                <!-- table content taken from FlightInfo model -->
                <td>
                    <a href="/fleet/{id}">
                        {id}
                    </a>
                </td>

            </tr>
            {/planes}
            </tbody>
        </table>
        
</div>
