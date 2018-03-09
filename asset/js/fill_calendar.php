<script>
    var usersTab = <?php echo $_SESSION['UsersCalendar'];?>;
    for (var bufferTab1 = 0;bufferTab1<usersTab.length;bufferTab1++)
    {
    	var bString = usersTab[bufferTab1];
    	var date = bString.date
    	var id = ("j"+bString.place+"-"+date);
    	document.getElementById(id).innerHTML ="<p class='cel_value_name'>"+ bString.name + " " + bString.Lastname + "</p><p class='cel_value_email'>" + bString.email +"</p>";

    }
</script>