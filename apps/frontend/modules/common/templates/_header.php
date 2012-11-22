<div id="headerdiv">
	<div id="head1"><img src="/images/logo.png" width="230" height="62" /></div>
    <div id="head2"><img src="/images/logo2.png" width="389" height="65" /></div>
</div>

<div class="clearfix"></div>

<div id="header2div">
 <div id="mainmenu">
 	<ul>
    	<a href="/index"><li>HOME</li></a>
    	<a href="/reservation"><li>RESERVATION</li></a>
    	<a href="#"><li>REGISTER</li></a>
    	<?php if($sf_user->isAuthenticated()):?>
    		<a href="/index/logout"><li>LOGOUT</li></a>
    	<?php endif; ?>
    </ul>
 </div>
 
 <div class="clearfix"></div>
 
 <div id="spiel2">TEXT HERE ( MAYBE COMPANY SLOGAN OR QUOTE )</div>
 
</div>