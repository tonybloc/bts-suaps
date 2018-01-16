<script>
document.getElementById('j1-2018-01-16').innerHTML = 'mabite';
var usersTab = <?php echo $_SESSION['UsersCalendar'];?>;
console.log(usersTab);
var userTabStartindex;
var userTabEndindex;
var bufferDatas;

for (var bufferTab1 = 0;bufferTab1<usersTab.length;bufferTab1++)
{
	var bString = usersTab[bufferTab1];
	var dateReserv =  new Date(bString.date);
	
	console.log(bString.date);
	console.log(dateReserv.getFullYear());
	console.log(dateReserv.getUTCMonth());
	console.log(dateReserv.getDate());
	var id = ("j"+bString.place+"-"+dateReserv.getFullYear()+"-"+dateReserv.getMonth()+"-"+dateReserv.getDate());
	var aff = bString.name + bString.Lastname;
	//document.getElementById(id).innerHTML = aff;
}
console.log(bString.length);
console.log(bString.name);
for (var i = 0;i<bString.length;i++)
{
 bString = usersTab[i];
 console.log(bString.indexOf('name')+"bite");
}
    
    //bufferDatas = bufferString.slice(bufferString.indexOf("{"),"}");
    //usersTab = bufferString.slice(bufferString.indexOf("}",userTabEndindex));

//console.log(bufferDatas);
//console.log(usersTab);
</script>; 