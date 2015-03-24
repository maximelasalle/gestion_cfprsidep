<style>
			body.loaded #header_cfprLogo
			{
				left: 0;
				-moz-transition-delay: left 3s ease-out 2s;
				-webkit-transition-delay: left 3s ease-out 2s;
				-o-transition: left 3s ease-out 2s;
				transition: left 3s ease-out 2s;
			}
			
			body.loaded header
			{
				height: 70px;
				-moz-transition-delay: height 2s ease-out 2s;
				-webkit-transition-delay: height 2s ease-out 2s;
				-o-transition: height 2s ease-out 2s;
				transition: height 2s ease-out 2s;

			}
			
			body.loaded #login_cfprCornerLogo
			{
				bottom: -500px;
				right: -500px;
				visibility: hidden;
				-moz-transition-delay: bottom 2s ease-out 2s, right 2s ease-out 2s, visibility 2s ease-out 2s;
				-webkit-transition-delay: bottom 2s ease-out 2s, right 2s ease-out 2s, visibility 2s ease-out 2s;
				-o-transition: bottom 2s ease-out 2s, right 2s ease-out 2s, visibility 2s ease-out 2s;
				transition: bottom 2s ease-out 2s, right 2s ease-out 2s, visibility 2s ease-out 2s;
			}
			
			body.loaded form.loginDisabling
			{
				opacity: 0;
				visibility: hidden;

			}
			
			body.loaded #login_loginBox
			{
				left: -600px;
				opacity: 0;
				visibility: hidden;
				-moz-transition-delay: left 2s ease-out 2s, opacity 0.1 ease-out 4s, visibility 0.1 ease-out 4s;
				-webkit-transition-delay: left 2s ease-out 2s, opacity 0.1 ease-out 4s, visibility 0.1 ease-out 4s;
				-o-transition: left 2s ease-out 2s, opacity 0.1 ease-out 4s, visibility 0.1 ease-out 4s;
				transition: left 2s ease-out 2s, opacity 0.1 ease-out 4s, visibility 0.1 ease-out 4s;
			}
			
			body.loaded #login_antiOverflow
			{
				height: 0px;
				width: 0px;
				-moz-transition-delay: width 2s ease-out 4s, height 2s ease-out 4s;
				-webkit-transition-delay: width 2s ease-out 4s, height 2s ease-out 4s;
				-o-transition: width 2s ease-out 4s, height 2s ease-out 4s;
				transition: width 2s ease-out 4s, height 2s ease-out 4s;
			}
			
			@media only screen and (max-device-width: 480px) 
			{
				
				body.loaded header
				{
					height: 10%;
					-moz-transition-delay: height 2s ease-out 2s;
					-webkit-transition-delay: height 2s ease-out 2s;
					-o-transition: height 2s ease-out 2s;
					transition: height 2s ease-out 2s;
				}	
				
				body.loaded #login_cfprSmallLogo
				{
					top: -0.5%;
					-moz-transition-delay: top 3s  ease-out 2s;
					-webkit-transition-delay: top 3s  ease-out 2s;
					-o-transition: top 3s  ease-out 2s;
					transition: top 3s  ease-out 2s;

				}
			}
			
</style>