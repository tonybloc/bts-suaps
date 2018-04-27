<script>
    var usersTab = <?= isset($_SESSION['UsersCalendar'])?$_SESSION['UsersCalendar']:"''"?>;
    for (var bufferTab1 = 0;bufferTab1<usersTab.length;bufferTab1++)
    {
    	var bString = usersTab[bufferTab1];
    	var date = bString.date
    	var id = ("j"+bString.place+"-"+date);
    	var idInvite = bString.idInvite;

    	console.log(idInvite);
    	if(idInvite != "")
        {
    		document.getElementById(id).innerHTML = "" 
            	+"<p class='cel_value_name'>"
            	+ bString.name + " " + bString.Lastname 
            	+ "</p>"
            	+"<p class='cel_value_email'>" 
            	+ bString.email 
            	+"</p>"
            	+"<p class='cel_value_invite'>(Invité)</p>"
            	+"<p hidden>"
            	+ idInvite
            	+"</p>";
            	
        }
    	else
        {
    		document.getElementById(id).innerHTML = "" 
            	+"<p class='cel_value_name'>"
            	+ bString.name + " " + bString.Lastname 
            	+ "</p>"
            	+"<p class='cel_value_email'>" 
            	+ bString.email 
            	+"</p>";
        }
    }    
</script>