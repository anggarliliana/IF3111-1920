<!DOCTYPE html>
<html>
<head>
	<title>Laporan|Lapor.Itera</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/nav.css') ?>">
</head>
<body>

  <!-- Navigasi -->
  <b:else/>
  <nav id='nav'>
  <a class='toggleMenu' href='#'><i class='fa fa-th-list'/> Menu</a>
 <!-- navigation menu start -->
 <ul class='nav nav-menu2'>
  <li><a class='active' href="<?php echo site_url('home'); ?>">Home</a></li>
  <li><a href='<?php echo site_url('login'); ?>'>Login</a>
   </ul>
  </li>
 </ul>
 <form action='/search' id='search-form' method='get' 
style='display: inline;'>
<table>
  <tbody>
    <tr>
      <td class='search-box'>
<input id='search-box' name='q' onblur='if
(this.value==&apos;&apos;)this.value=this.defaultValue;' onfocus='if
(this.value==this.defaultValue)this.value=&apos;&apos;;' type='text' 
value='Search...' vinput=''/>
</td> 
<td class='search-button'><input id='search-button' type='submit' 
value=''/></td>
</tr>
</tbody>
</table>
</form>
  </nav>
  </b:if>
  <div class='clear'/>
  <!-- navigation menu end -->
<br> 

  <legend>Detail Laporan</legend>
  <hr>

  <div class="artikel">
  <p><?php echo $berita->isi ?></p>
  </div>

  <br>

  <div class="Lampiran">
    <label>Lampiran : </label>
    <a href=""><img src="<?php echo base_url('assets/file/'.$berita->file) ?>"></a>
  </div>
   
  
  <ul>
    <li>Waktu: <?php echo $berita->waktu ?></li>
    <li>Aspek: <?php echo $berita->aspek ?></li>
    <li style="float: right;"><a href="<?php echo base_url('laporan/delete/'.$berita->id_laporan) ?>">Hapus Laporan/Komentar</a></li>
  </ul>
  <br>
  <br>
  <hr>

<!-- footer -->
     <div id="footer">
        <div class="footer-text">
          LAMPOR SIMPLE ITERA
      </div>
        <div class="footer-content">
            Copyright &copy; Dewi Rahayu & Anggar Liliana
        </div>
      </div>
</div>


</body>
</html>
