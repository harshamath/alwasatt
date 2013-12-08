/**
 * Textfiled With Caption
 * 
 * @author      Jamshed Iqbal
 * @created     20-Apr-2012
 * @uses        $('#textfield').twc({caption: 'Default Value'});
 */
(function($) {
    $.fn.twc = function(settings) {
        settings = jQuery.extend({
            caption:null,
			hide_on_focus:false
        }, settings);
		
        return this.each(function()
        {
            var $this = $(this);
            
            if ($this.parent().is('.twc_wrap')) {
                return false;
            }
			
            var thisId = $this.attr('id');
			
            if (thisId)
                var labelfor = ' for="'+thisId+'"';
            else
                var labelfor = '';
			
            if (settings.caption === null)
                var label_caption = $this.attr('caption') ? $this.attr('caption') : '';
            else
                var label_caption = settings.caption;
			
            $this.wrap('<div class="twc_wrap" />');
			
            $this.after('<label class="twc_label"'+labelfor+' style="display:none;">'+label_caption+'</label>');
			
            /*
			$this
            .blur(function()
            {
                if ($this.val() == '')
                {
                    $this.next('.twc_label').show();
                }
                else
                {
                    $this.next('.twc_label').hide();
                }
            })
            .keyup(function()
            {
                if ($this.val() != '')
                {
                    $this.next('.twc_label').hide();
                }
            });
			*/
			
			$this.blur(function()
            {
                if ($this.val() == '')
                {
                    $this.next('.twc_label').show();
                }
                else
                {
                    $this.next('.twc_label').hide();
                }
            });
			
			if (settings.hide_on_focus === false) {
				
				$this.keyup(function()
				{
					if ($this.val() != '')
					{
						$this.next('.twc_label').hide();
					}
				});
			}
			else {
				$this.focus(function()
				{
					$this.next('.twc_label').hide();
				});
			}
			
            if ($this.val() == '')
                $this.next('.twc_label').show();
        });

    };

    $.fn.twc_remove = function()
    {
        return this.each(function()
        {
            var $this = $(this);
            var $c = $this.parent();
            if ($c.is('.twc_wrap'))
            {
                $this.unwrap();
                var $n = $this.next();
                if ($n.is('.twc_label'))
                    $n.remove();
            }
        });
    };

})(jQuery);