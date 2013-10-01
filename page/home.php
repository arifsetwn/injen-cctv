<h2>Status Perangkat</h2>
<hr>
<table class="table table-striped">
    	<tr><td width="100">Kernel Info </td> <td>: <?php $uname=shell_exec("uname -a | awk '{print $1, $2, $3}' "); echo $uname; ?></td></tr>
	<tr><td width="100">Tanggal </td> <td>: <?php $waktu=shell_exec("date | awk '{print $1, $3, $2, $6}'"); echo $waktu; ?></td></tr>
	<tr><td width="100">Waktu </td> <td>: <?php $waktu=shell_exec("date | awk '{print $4, $5}'"); echo $waktu; ?></td></tr>
	<tr><td width="100">Uptime </td> <td>: <?php $uptime=shell_exec("uptime | awk '{print $3}'"); echo "$uptime"; ?></td></tr>

</table>

<a href="#cekmodal" role="button" class="btn" data-toggle="modal">Cek Perangkat Terhubung</a>


<div id="cekmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="Levelmodal" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
<h3 id="myModalLabel">Status Perangkat</h3>
</div>
<div class="modal-body">
<pre>
<?php

$cekstatus=shell_exec('sh /www/injen/script/cekstatus.sh ');
echo $cekstatus;	

?>	
<a href="javascript:popUp('/injen/page/runssh.php')">Run SSH Tunnel</a>
</pre>		
</div>
</div>

</div>

<script = "JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=500,height=600,left = 262,top = 84');");
}
</script>
