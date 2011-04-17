<style type="text/css">
#content {position:absolute; top:0; bottom:0; left:0; right:0;
			margin:20px; }

#left {float:left;}
#right {float:right;}

.left {float:left;}
.right {float:right;}

p {font-size:50px;}
p.top {font-size:30px;}
</style>

<div id="content" >
<div align="center">
<?php echo $html->image(feelvox); ?><br>
<p class="top">Candidates watch out! <br>Do you know what we think about you?<br> Feelvox knows.</p>
<iframe src="http://www.facebook.com/plugins/like.php?href=www.feelvox.com&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
<a href="http://twitter.com/share" class="twitter-share-button" data-text="Politicians watch out! Do you know what we think about you? Made at #swsj #techbasv" data-count="none" data-via="feelvox">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>
<div style="width:800; margin-left:20%;">
<div id="left" align="center">
     <p class="name">Obama</p>
     <div id="emotions">
     <img src="http://www.tdbimg.com/files/2009/01/06/img-author-photo---barack-obama_123942996229.jpg"><br>
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
     <img src="http://images.politico.com/global/thumbnail/bachmann-50x50.jpg"><br>
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
</div>