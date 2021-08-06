$(function()
{
      
				/* Email Form Input */
				function validateEmail(email)	{
					var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
					if(emailReg.test(email)) {
						return true;
					} else {
						return false;
					}
				}
				
				/* URL Form Input */
				 function validateURL(textval) {
					 var urlregex = new RegExp(
						   "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
					 return urlregex.test(textval);
				}
				
				/* Integer Number Form Input */
				 function validateInteger(){
					$(".int-value").on('keydown', function (e) {
						// Allow: backspace, delete, tab, escape, enter and .
						if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
							 // Allow: Ctrl+A, Command+A
							(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
							 // Allow: home, end, left, right, down, up
							(e.keyCode >= 35 && e.keyCode <= 40)) {
								 // let it happen, don't do anything
								 return;
						}
						// Ensure that it is a number and stop the keypress
						if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
							e.preventDefault();
						}
					});
				}
				
				/* Integer Number Form Input */
				function validateCharacter(){
					$('.valid-character').keyup(function() {
						if (this.value.match(/[^a-zA-Z ]/g)) {
							this.value = this.value.replace(/[^a-zA-Z ]/g, '');
						}
					});
				}
        validateInteger(); validateCharacter();
})


