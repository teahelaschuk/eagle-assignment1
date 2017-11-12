<?php
/*
 * Menu navbar, just an unordered list
 */
?>
<ul class="nav">
    {menudata}
    <li><a href="{link}">{name}</a></li>
    {/menudata}
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            {userroledata}
            <li><a href="/roles/user_role/{role}">{title}</a></li> 
            {/userroledata}        
        </ul>
    </li>
</ul>
