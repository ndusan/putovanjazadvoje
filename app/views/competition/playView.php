<style type="text/css">
	body { font-family:Verdana, Arial, Helvetica, sans-serif; }
	#container { width:100%; float:left; border-bottom:1px solid #000000; border-top:1px solid #000000; padding: 20px 0; margin: 10px 0; }
	#puzzle { width: 310px; float:left; }
	#sortable { list-style-type: none; margin:0px; padding: 0px; width:309px; height:309px; background:url(http://rohitsengar.cueblocks.net/puzzle/images/img1.jpg) center center no-repeat; }
	#sortable li { margin: 3px 3px 0 0; float: left; width: 100px; height: 100px; color:#FFFFFF; }
	#stats { background-color:#DDFFAA; margin-top:25px; width:309px; text-align: center; font-size:18px; }
	#time, #moves { font-size: 26px; }
	#start { background-color: #000000; color:#FFFFFF; opacity: 0.75; font-size:16px; text-align:center; padding: 15px 0; margin: 135px 0; width: 100%; float:left; cursor:pointer; }
	
	#more { float:left; width: 228px; height:auto; margin-left:40px; background-color:#DDFFAA; }
	#more .images{ float:left; margin: 0 0 8px 8px; cursor:pointer; }
	#more .images img{ width:100px; height:100px; border: 1px solid #009900; }
	p{ margin-left: 20px;}
</style>



<h2>Image Puzzle Using jQuery</h2>

<div id="container">
<!-- Image Puzzle -->
<div id="puzzle">
<!-- Image Puzzle -->
<ul id="sortable">
	<div id="start">Click to Start</div>
</ul>
<!-- Puzzle Stats -->
<div id="stats"><span id="moves">0</span> moves, <span id="time">0</span> seconds</div>
</div>

<div id="more">
<h3>Try These ...</h3>
<div class="images"><img src="http://rohitsengar.cueblocks.net/puzzle/images/img1.jpg" alt="Puzzle Image" title="Add to puzzle" /></div>
<div class="images"><img src="http://rohitsengar.cueblocks.net/puzzle/images/img2.jpg" alt="Puzzle Image" title="Add to puzzle" /></div>
<div class="images"><img src="http://rohitsengar.cueblocks.net/puzzle/images/img3.jpg" alt="Puzzle Image" title="Add to puzzle" /></div>
<div class="images"><img src="http://rohitsengar.cueblocks.net/puzzle/images/img4.jpg" alt="Puzzle Image" title="Add to puzzle" /></div>
<div class="images"><img src="http://rohitsengar.cueblocks.net/puzzle/images/img5.jpg" alt="Puzzle Image" title="Add to puzzle" /></div>
<div class="images"><img src="http://rohitsengar.cueblocks.net/puzzle/images/img6.jpg" alt="Puzzle Image" title="Add to puzzle" /></div>
</div>

</div>