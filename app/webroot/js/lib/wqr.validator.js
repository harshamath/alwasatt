var custom_validator = {

	numericFormat : function(fld, e, extraCheck, precision) {
        var key = '';
		var strCheck = '0123456789';
		if (extraCheck)
			strCheck += extraCheck;
		var whichCode = (window.Event) ? e.which : e.keyCode;
	
		if (whichCode == 13) return true;  // Enter
		if (whichCode == 8) return true;  // Backspace
		if (whichCode == 0) return true;  // Null
		if (whichCode == 9) return true;  // Tab
	
		key = String.fromCharCode(whichCode);  // Get key value from key code
		if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key
		var x = new String(fld.value);
			if (precision === undefined)
				precision = false;
			var dotexp = /\./;
			var dotsearch = x.search(dotexp);
		if (key == '.')
		{
				if (precision !== false && precision === 0) {
					return false;
				}
				
				if ( dotsearch != -1 ) return false;
		}
        
        if (precision) {
            
            if ( dotsearch != -1 ) {
                
                var dotafter = x.split('.')[1];
                
                dotafter = new String(dotafter);
                
                if (dotafter.length >= precision)
                    return false;
            }
        }
        
        return true;
    },
    
    floatFormat : function(fld, e, precision) {
        if (precision === undefined)
            precision = false;
        return this.numericFormat(fld, e, '.', precision);
    },
	
	fractionFormat : function(fld, e) {
        var key = '';
		var strCheck = '0123456789./ ';
		var whichCode = (window.Event) ? e.which : e.keyCode;
	
		if (whichCode == 13) return true;  // Enter
		if (whichCode == 8) return true;  // Backspace
		if (whichCode == 0) return true;  // Null
		if (whichCode == 9) return true;  // Tab
	
		key = String.fromCharCode(whichCode);  // Get key value from key code
		if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key
		
		var x = new String(fld.value);
		
		var dotexp = /\./;
		var dotsearch = x.search(dotexp);
		
		var fractexp = /\//;
		var fractsearch = x.search(fractexp);
		
		var spaceexp = /\ /;
		var spacesearch = x.search(spaceexp);

		if(x == '0' && key != '.') return false;
						
		if (key == '.')
		{
				if ( fractsearch != -1 || spacesearch != -1) return false;
				if ( dotsearch != -1 ) return false;
		}
		if (key == '/')
		{
				if( x.length <= 0 ) return false;
				if(x.charAt(x.length-1) === ' ') return false;
				if ( dotsearch != -1 ) return false;
				if ( fractsearch != -1 ) return false;
		}
		if (key == ' ')
		{
				if( x.length <= 0 ) return false;
				if ( dotsearch != -1 || fractsearch != -1) return false;
				if ( spacesearch != -1 ) return false;
		}
        
        return true;
    },
    
	timeFormat : function(field, e) {
		reqDashboard.show_savesleep_button();
		
		var obj = this;
		var whichCode = (window.Event) ? e.which : e.keyCode;
		
		var strCheck = '1234567890';
		
		if (whichCode == 13) return true; // Enter
		if (whichCode == 8) return true;  // Backspace
		if (whichCode == 0) return true;  // Null
		if (whichCode == 9) return true;  // Tab
		
		key = String.fromCharCode(whichCode);  // Get key value from key code
		
		var val = new String(field.value);
		var intVal = parseInt(val);
		//
		// Changed && to || - Bug Ref: CLO21327 'Move Workout' link not showing up - Fitness
		// now it will show, if excercise is present or recomndation is on
		//
		if( obj.checkClass(field, 'hrs') || obj.checkClass(field, 'hours') ) {
			
			if(val.length == 0) {
				if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key
			} else if(val.length == 1) {
				if(intVal == 1){
					strCheck += '0';
					if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key	
				} else if(intVal == 2){
					strCheck = '01234';	
					if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key	
				} else if(intVal > 2 || intVal < 0){
					return false;	
				}
				else {
					strCheck = '0123456789';
					if ( strCheck.indexOf(key) == -1 ) return false;
				}
				
			} else if (val.length > 1) {
				strCheck = '0123456789';
				if ( strCheck.indexOf(key) == -1 ) return false;
				field.value = '';
				//return false;
			}
			
		} if( obj.checkClass(field, '12hrs') ) {
			
			if(val.length == 0) {
				if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key
			} else if(val.length == 1) {
				//strVal = field.value;
				if(intVal == 1){
					strCheck = '012';
					if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key	
				} 
				else if(intVal > 1 || intVal < 0){
					return false;	
				} else {
					strCheck = '0123456789';
					if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key	
				}
			} else if (val.length > 1) {
				strCheck = '0123456789';
				if ( strCheck.indexOf(key) == -1 ) return false;
				field.value = '';
				//return false;
			}
			
		}
		else {
			
			if(val.length == 0) {
				if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key
			} else if(val.length == 1) {
				if(intVal >= 1 && intVal <= 5){
					strCheck += '0';
					if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key	
				} 
				else if(intVal > 5 || intVal < 0){
					return false;	
				} else {
					strCheck = '0123456789';
					if ( strCheck.indexOf(key) == -1 ) return false;	
				}
			} else if (val.length > 1) {
				
				strCheck = '0123456789';
				if ( strCheck.indexOf(key) == -1 ) return false;
				field.value = '';
				//return false;
			}
		} 
		
		return true;
	},
	
	alphabetFormat : function(fld, e) {
		
		var whichCode = (window.Event) ? e.which : e.keyCode;
		
		if (whichCode == 13) return true;  // Enter
		if (whichCode == 8) return true;  // Backspace
		if (whichCode == 0) return true;  // Null
		if (whichCode == 9) return true;  // Tab
		
		if((whichCode >= 65 && whichCode <= 90) || (whichCode >= 97 && whichCode <= 122)){
			return true;
		}
		
		return false;
	},
	
	allSpecialCharacters : function(fld, e, extraCheck) {
		
        var key = '';
		var strCheck = "!@#$%^&*()-=_+[]\\;/{}|:<>?,.\"\'";
		if (extraCheck)
			strCheck += extraCheck;
		var whichCode = (window.Event) ? e.which : e.keyCode;
	
		if (whichCode == 13) return true;  // Enter
		if (whichCode == 8) return true;  // Backspace
		if (whichCode == 0) return true;  // Null
		if (whichCode == 9) return true;  // Tab
	
		key = String.fromCharCode(whichCode);  // Get key value from key code
		if ( strCheck.indexOf(key) == -1 ) return false;  // Not a valid key
        
        return true;
		
    },
	
	isNumeric : function(elem){
		return !( isNaN($(elem).val()) ); 
	},
	
	checkClass : function(element, cls) {
		var reg = new RegExp('\\b' + cls + '\\b');
	    return reg.test(element.className);	
	},
	
	autoTimeFormat : function(field, e) {
		var obj = this;
		var whichCode = (window.Event) ? e.which : e.keyCode;
		var strCheck = '1234567890';
		
		if (whichCode == 13) return true; // Enter
		if (whichCode == 8) return true;  // Backspace
		if (whichCode == 0) return true;  // Null
		if (whichCode == 9) return true;  // Tab

		// if value entered from numeric pad
		if (whichCode >=96 && whichCode<=105){ 
			whichCode = whichCode - 48;
		}
		key = String.fromCharCode(whichCode);  // Get key value from key code
		
		var val = new String(field.value);
		var intVal = parseInt(val);
		//console.log(key +' - '+e.keyCode+' - '+whichCode);		

		// if Value not a number		
		if ( isNaN(intVal) ) {
			intVal = 0;
			$(field).val(intVal);
		}
		
		// check if hours aor minutes
		if( obj.checkClass(field, 'hrs') ){
			var minv = 1;
			var maxv = 12;
			var newVal = intVal%maxv; 
			if ( newVal ==0){ newVal = 12;}
		}else if( obj.checkClass(field, 'mins') ){
			var minv = 0;
			var maxv = 59;
			var newVal = intVal%60; 
		}
		
		// if value is 0 check
		$(field).val(newVal);
		if (intVal >= minv && intVal <= maxv) {
			return true; // Valid Value
		} else {
			//console.log(intVal +' >'+minv +' to '+maxv +' -> '+newVal);	
			return false; //not in range
		}
	}

}	