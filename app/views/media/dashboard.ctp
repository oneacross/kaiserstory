<style type="text/css">
#content {position:absolute; top:0; bottom:0; left:0; right:0;
			margin:20px; height:90%; width:90%;}
#left {float:left;}
#right {float:right;}

.left {float:left;}
.right {float:right;}

p {font-size:50px;}
</style>

<div id="content" >
<div align="center"><?php echo $html->image(feelvox); ?></div>
<div id="left" align="center">
     <p class="name">Obama</p>
     <div id="emotions">
     <img src="http://chart.apis.google.com/chart?chs=300x150&cht=p3&chco=17A317,FC0505&chd=t:<?php echo $Obama['percentage']['positive']; echo","; echo $Obama['percentage']['negative']?>&chdl=Positive|Negative&chp=0.9&chma=|2" width="300" height="150" alt="" />
     <br>
         <?php echo floor(($Obama['percentage']['positive']) * 10000 + .5) * .01;?> % positive<br/>
     	 <?php echo floor(($Obama['percentage']['negative']) * 10000 + .5) * .01; ?> % negative<br/>
     	 <?php echo floor(($Obama['percentage']['neutral']) * 10000 + .5) * .01; ?> % neutral<br/>
	 <?php echo $Obama['total'] ;?> total mentions<br/>
     </div>
     <div id="plusminus">
     	  <div id="positivewords" class="left"><b>Positive</b><br>
	  <?php foreach ($Obama['words']['positive'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
	  <div id="negativewords" class="right"><b>Negative</b><br>
	  <?php foreach ($Obama['words']['negative'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
     </div>
</div>

<div id="right" align="center">
     <p class="name">Bachmann</p>
     <div id="emotions">
     <img src="http://chart.apis.google.com/chart?chs=300x150&cht=p3&chco=FC0505,17A317&chd=t:<?php echo $Bachmann['percentage']['positive']; echo","; echo $Bachmann['percentage']['negative']?>&chdl=Positive|Negative&chp=0.9&chma=|2" width="300" height="150" alt="" />
     <br>
         <?php echo floor(($Bachmann['percentage']['positive']) * 10000 + .5) * .01;?> % positive<br/>
     	 <?php echo floor(($Bachmann['percentage']['negative']) * 10000 + .5) * .01;?> % negative<br/>
     	 <?php echo floor(($Bachmann['percentage']['neutral']) * 10000 + .5) * .01;?> % neutral<br/>
	 <?php echo $Bachmann['total'] ;?> total mentions<br/>
     </div>
     <div id="plusminus">
     	  <div id="positivewords" class="left"><b>Positive</b><br>
	  <?php foreach ($Bachmann['words']['positive'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
	  <div id="negativewords" class="left"><b>Negative</b><br>
	  <?php foreach ($Bachmann['words']['negative'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
     </div>
</div>
</div>