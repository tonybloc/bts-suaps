<script>
document.getElementById('j1-2018-01-15').innerHTML = 'mabite';
var usersTab = <?php echo $_SESSION['UsersCalendar'];?>;
console.log(usersTab);
var userTabStartindex;
var userTabEndindex;
var bufferDatas;

for (var bufferTab1 = 0;bufferTab1<usersTab.length;bufferTab1++)
{
	var bString = usersTab[bufferTab1];
	var dateReserv =  new Date(bString.date);
	dateReserv= dateReserv.toISOString();
	
	document.write(bString.date);
	document.write(dateReserv);
	//document.write("place "+ bString.place);
	//document.write("place "+dateReserv.getFullYear());
	document.getElementById("j"+bString.place+"-"+dateReserv.getFullYear()+"-"+dateReserv.getMonth()+"-"+dateReserv.getDate()).innerHTML = bString.name + bString.Lastname;
}
/*console.log(bString.length);
console.log(bString.name);
for (var i = 0;i<bString.length;i++)
{
 bString = usersTab[i];
 console.log(bString.indexOf('name')+"bite");
}
    */
    //bufferDatas = bufferString.slice(bufferString.indexOf("{"),"}");
    //usersTab = bufferString.slice(bufferString.indexOf("}",userTabEndindex));

//console.log(bufferDatas);
//console.log(usersTab);
</script>; 