jQuery(document).ready(function(){
	jQuery('#homeslider').bxSlider({
		mode:'fade',
	 	controls:false,
	 	auto:true,
	 	pager:true
	 });
	 jQuery('.toggle').on('click',function(){
		jQuery('.topnav').slideToggle();
		jQuery('.bodyclose').toggleClass('active');
	 })
	 jQuery('.bodyclose').on('click',function(){
		jQuery(this).removeClass('active');
		jQuery('.topnav').removeAttr('style');
	 });
	 jQuery('.switch-box').on('click', function(){
		jQuery(this).find('span').toggleClass('active');
		jQuery(this).find('.switch-btb').toggleClass('active');
	 });
	 jQuery('.sub-menu').parents('li').prepend('<span class="plusmenu">+</span>')
	 jQuery('ul.topnav li').find('.plusmenu').on('click', function(){
		if(jQuery(this).hasClass('active')) {
			jQuery(this).removeClass('active');
			jQuery(this).html('+');
			jQuery(this).parent(this).removeClass('active')
		} else {
			jQuery('ul.topnav li').find('.plusmenu').removeClass('active');
			jQuery('ul.topnav ul li').find('.plusmenu').html('+');
			jQuery(this).addClass('active');
			jQuery(this).html('-');
			jQuery(this).parent(this).addClass('active')
		}
	});
	jQuery('.loginslide').on('click',function(){
		if($("#myregister").is(":visible")){
			$("#myregister").slideUp("slow", function(){
				$("#mylogins").slideDown("slow");
			});
		} else {
			$("#mylogins").slideDown("slow");
		}
		
	});
	jQuery('.registerslide').on('click',function(){
		if($("#mylogins").is(":visible")){
			$("#mylogins").slideUp("slow", function(){
				$("#myregister").slideDown("slow");
			});
		} else {
			$("#myregister").slideDown("slow");
		}
	});
	function validateEmail(email) { 
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	} 
	jQuery(document).on("click",".signedup",function(e){
		var html = jQuery(".hsignedup").html();
		var AJAXURL = jQuery("#SiteURL").val();
		jQuery(".hsignedup").html(jQuery("#loaders").html());
		var Email = jQuery("#Email").val();
		var Password = jQuery("#Password").val();
		var ConfirmPassword = jQuery("#ConfirmPassword").val();
		if(jQuery("#HireType:checked").length==0){
			var UserType = 0;
		} else {
			var UserType = 1;
		}
		if(jQuery.trim(Email)=='' || jQuery.trim(Password)=='' || jQuery.trim(ConfirmPassword)==''){
			jQuery.gritter.add({
				title: 'Error!',
				text: 'All fields are mandatory.',
				class_name: 'growl-danger',
				image: AJAXURL+'images/error.png',
				sticky: false,
				time: ''
			 });
			jQuery(".hsignedup").html(html);
			return false;
		} else if(validateEmail(Email)===false){
			jQuery.gritter.add({
				title: 'Error!',
				text: 'Invalid Email',
				class_name: 'growl-danger',
				image: AJAXURL+'images/error.png',
				sticky: false,
				time: ''
			 });
			jQuery(".hsignedup").html(html);
			return false;
		} else if(jQuery.trim(Password)!=jQuery.trim(ConfirmPassword)){
			jQuery.gritter.add({
				title: 'Error!',
				text: 'Password and confirm password should match',
				class_name: 'growl-danger',
				image: AJAXURL+'images/error.png',
				sticky: false,
				time: ''
			 });
			jQuery(".hsignedup").html(html);
			return false;
		}
		
		jQuery.ajax({
			type: "POST",
			url: AJAXURL+"user/signup",
			data: { Email: Email, Password: Password, UserType: UserType }
		}).success(function(res) {
			if(res==0){
				jQuery.gritter.add({
					title: 'Error!',
					text: 'Email already exist in our database.',
					class_name: 'growl-danger',
					image: AJAXURL+'images/error.png',
					sticky: false,
					time: ''
			 	});
				jQuery(".hsignedup").html(html);
				return false;
			} else {
				document.location.href= AJAXURL+"user/dashboard";
			}
		});
	});
	jQuery("#regform").submit(function(e){
		e.preventDefault();
		jQuery(".signedup").click();
		return false;
	});
	
	jQuery(document).on("click",".loggedin",function(e){
		var html = jQuery(".hloggedin").html();
		var AJAXURL = jQuery("#SiteURL").val();
		jQuery(".hloggedin").html(jQuery("#loaders").html());
		var Email = jQuery("#Emails").val();
		var Password = jQuery("#Passwords").val();
		if(jQuery.trim(Email)=='' || jQuery.trim(Password)==''){
			jQuery.gritter.add({
				title: 'Error!',
				text: 'All fields are mandatory.',
				class_name: 'growl-danger',
				image: AJAXURL+'images/error.png',
				sticky: false,
				time: ''
			 });
			jQuery(".hloggedin").html(html);
			return false;
		} else if(validateEmail(Email)===false){
			jQuery.gritter.add({
				title: 'Error!',
				text: 'Invalid Email',
				class_name: 'growl-danger',
				image: AJAXURL+'images/error.png',
				sticky: false,
				time: ''
			 });
			jQuery(".hloggedin").html(html);
			return false;
		} 
		
		jQuery.ajax({
			type: "POST",
			url: AJAXURL+"user/login",
			data: { Email: Email, Password: Password }
		}).success(function(res) {
			if(res==0){
				jQuery.gritter.add({
					title: 'Error!',
					text: 'Invalid username or password.',
					class_name: 'growl-danger',
					image: AJAXURL+'images/error.png',
					sticky: false,
					time: ''
			 	});
				jQuery(".hloggedin").html(html);
				return false;
			} else {
				document.location.href= AJAXURL+"user/dashboard";
			}
		});
	});
	jQuery("#loginform").submit(function(e){
		e.preventDefault();
		jQuery(".loggedin").click();
		return false;
	});
});