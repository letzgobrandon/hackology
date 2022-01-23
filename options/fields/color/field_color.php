<?php
class NHP_Options_color extends NHP_Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since NHP_Options 1.0
	*/
	function __construct($field = array(), $value ='', $parent){
		
		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
        if (empty($this->field['std']))
            $this->field['std'] = '';
		$this->value = $value;
		//$this->render();
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since NHP_Options 1.0
	*/
	function render(){
		$class = (isset($this->field['class']))?$this->field['class']:'';
        echo '<input type="text" id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" value="'.$this->value.'" class="'.$class.' popup-colorpicker" data-default-color="'.$this->field['std'].'" />';
		
	}//function
	
	
	/**
	 * Enqueue Function.
	 *
	 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
	 *
	 * @since NHP_Options 1.0
	*/
	function enqueue(){
		
		wp_enqueue_script(
			'nhp-opts-field-color-js', 
			NHP_OPTIONS_URL.'fields/color/field_color.js', 
			array('jquery', 'wp-color-picker'),//'farbtastic'),
			time(),
			true
		);

		wp_enqueue_style('wp-color-picker');
		
	}//function
	
}//class
?>