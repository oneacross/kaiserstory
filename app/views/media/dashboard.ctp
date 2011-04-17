<style type="text/css">
#content {position:absolute; top:0; bottom:0; left:0; right:0;
			margin:20px; height:90%; width:90%;}
#left {float:left;}
#right {float:right;}

p {font-size:50px;}
</style>

<div id="content" >
<div id="left" align="center">
     <p class="name">Obama</p>
     <div id="emotions">
     <img src="http://chart.apis.google.com/chart?chs=300x150&cht=p3&chco=FC0505,17A317&chd=t:<?php echo $Obama['percentage']['positive']; echo","; echo $Obama['percentage']['negative']?>&chdl=Positive|Negative&chp=0.9&chma=|2" width="300" height="150" alt="" />
     <br>
         <?php echo $Obama['percentage']['positive'];?> % positive<br/>
     	 <?php echo $Obama['percentage']['positive'] ?> % negative<br/>
     	 <?php echo $Obama['percentage']['neutral'] ?> % neutral
     </div>
     <div id="plusminus">
     	  <div id="positivewords" class="left">+
	  <?php foreach ($Obama['words']['positive'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
	  <div id="negativewords" class="left">-
	  <?php foreach ($Obama['words']['negative'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
     </div>
</div>

<div id="right" align="center">
     <p class="name">Bachmann</p>
     <div id="emotions">
     <img src="http://chart.apis.google.com/chart?chs=300x150&cht=p3&chco=FC0505,17A317&chd=t:<?php echo $Bachmann['percentage']['positive']; echo","; echo $Bachmann['percentage']['negative']?>&chdl=Positive|Negative&chp=0.9&chma=|2" width="300" height="150" alt="" />
     <br>
         <?php echo $Bachmann['percentage']['positive'];?> % positive<br/>
     	 <?php echo $Bachmann['percentage']['positive'] ?> % negative<br/>
     	 <?php echo $Bachmann['percentage']['neutral'] ?> % neutral
     </div>
     <div id="plusminus">
     	  <div id="positivewords" class="left">+
	  <?php foreach ($Bachmann['words']['positive'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
	  <div id="negativewords" class="left">-
	  <?php foreach ($Bachmann['words']['negative'] as $word=>$n): echo $word." ".$n."<br>"; endforeach;?> </div>
     </div>
</div>
</div>