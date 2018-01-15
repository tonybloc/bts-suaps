<script>
document.getElementById('j1-2018-01-15').innerHTML = 'mabite';
var usersTab ="";
usersTab = <?php echo $_SESSION['UsersCalendar'];?>;
console.log(usersTab);
var userTabStartindex;
var userTabEndindex;
var bufferDatas;
var bufferString = usersTab[0];
for (var i = 0;i<usersTab.length;i++)
{
 bufferString = usersTab[i];
 console.log(bufferString.indexOf('name'));
};
    
    bufferDatas = bufferString.slice(usersTab.indexOf("{"),"}");
    usersTab = usersTab.slice(usersTab.indexOf("}",userTabEndindex));

console.log(bufferDatas);
console.log(usersTab);
</script>; 