<script>  
    
function hitung1() {
      var nomor1 = document.getElementById('no1').value;
      var nomor2 = document.getElementById('no2').value;
      var nomor3 = document.getElementById('no3').value;
      var ttl_diskon = parseInt(nomor1) * parseFloat(nomor3) /100;
      var ttl_harga = parseInt(nomor1) - parseFloat(ttl_diskon);
      var result = parseFloat(ttl_harga) * parseFloat(nomor2);
      if (!isNaN(result)) {
         document.getElementById('no4').value = result;
      }
}

function togNav() {
  var nav = document.getElementById("mySidenav");
  if (nav.style.width == '250px') {
    nav.style.width = '0';
    nav.style.opacity = 0;
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
  } else if (main.style.width == '420px') {
    nav.style.width = "100%";
    nav.style.opacity = 1;
    	document.getElementById("mySidenav").style.width = "100%";
	    document.getElementById("main").style.marginLeft = "0";
	    document.body.style.backgroundColor = "white";
    }else{
    nav.style.width = "250px";
    nav.style.opacity = 1;
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}
  }
  
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}
</script>
<script type="text/javascript" src="<?php echo base_url("resources/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("resources/js/jquery-3.1.1.min.js"); ?>"></script>
</body>
</html>