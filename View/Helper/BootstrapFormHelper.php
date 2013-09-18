<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {

    public function create($model = null, $options = array()) {
        $defaultOptions = array(
            'class' => 'form-horizontal',
            'role' => 'form',
        );

        if(!empty($options['inputDefaults'])) {
            $options = array_merge($defaultOptions['inputDefaults'], $options['inputDefaults']);
        } else {
            $options = array_merge($defaultOptions, $options);
        }
        return parent::create($model, $options);
    }

    // Remove this function to show the fieldset & language again
    public function input($name, $options = array()) {
        $defaultOptions = array(
            'type' => null,
            'label' => array(
                'class' => 'col-lg-2 control-label text-right'
            ),
            'before' => null, // to convert .input-prepend
            'between' => '<div class="col-lg-10 pull-right">',
            'after' => '</div>',
            'div' => array(
                'class' => 'form-group'
            ),
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'class' => 'form-control',
        );

        if(isset($options['label'])) {
            $options['label'] = array('text' => $options['label'], 'class' => 'col-lg-2 control-label text-right');
        }
        $options = array_merge($defaultOptions, $options);

        if($options['type'] == 'checkbox') {
            $options['between'] = '<div class="col-lg-10 pull-right"><div class="col-lg-1 pull-left">';
            $options['after'] = '</div></div>';
        }
        return parent::input($name, $options);
    }

    public function submit($caption = null, $options = array()) {
        $defaultOptions = array(
            'class' => 'btn btn-primary',
            'div' =>  'form-group',
            'before' => '<div class="col-lg-offset-2 col-lg-10">',
            'after' => '</div>',
        );
        $options = array_merge($defaultOptions, $options);
        return parent::submit($caption, $options);
    }

}