<?php

$js_down='<script src="/js/ap/one_track.js"></script>';

$main_content.='

<div class="ap">
	<div id="wiev_ap" class="fr ac"><div>►</div></div>
	
    <div id="ap_body" class="fr ac">
		<div id="ap_c">&nbsp;<audio id="ap1"></audio></div>
		
		
		<div>
			<div id="applay" class="fl ap_btn"></div>
			<div id="appause" class="fl ap_btn"></div>
			
			<div id="apstop" class="fl ap_btn"></div>
			<div id="apall" class="fl">
				
				<div id="apload" class="rel">
					<div id="approgress">&nbsp;</div>
					<div id="apcanv"><canvas id="apcanvas" width="225px" height="10px">canvas not supported</canvas></div>
				</div>
				<div class="cl"></div>
				
				<div id="aptimevol" class="fr">
					<div id="aptime">&nbsp;</div>
					<div id="apvol">
						<div>
						<canvas id="apvolcanvas" width="100px" height="6px">громкость не поддерживается браузером</canvas>
						</div>
						<div id="rupor" class="fl ap_btn"></div>
						<div id="volprocent" class="fr">85%</div>
						<div class="cl"></div>
					</div>
				</div>
				
				<div id="btn_ext" class="fr">
					&nbsp;
				</div>				
				<div class="cl"></div>
			</div>
			
        	<div class="cl"></div>
		</div>

	</div><div class="cl"></div>
</div>';