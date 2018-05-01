<?php
namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class UrlForm extends Form
{
    public function __construct($name = null)
    {

        parent::__construct('url');
        $this->setAttribute('method', 'post');

        $this->add([
            'name' => 'id',
            'attributes' => [
                'type'  => 'hidden',
            ],
        ]);

        $this->add([
            'name' => 'long_url',
            'attributes' => [
                'type'  => 'url',
                'placeholder' => 'http://yousupersite.com/',
                'autocomplete' => false,
            ],
            'options' => [
                'label' => 'Original url',
            ],
        ]);


        $this->add([
            'name' => 'submit',
            'attributes' => [
                'type'  => 'submit',
                'value' => 'Reduce url',
                'id' => 'submitbutton',
            ],
        ]);
        $this->add(array(
            'name' => 'search_text_source',
            'type' => 'radio',
            'options' => array(
                'value_options' => [
                    'one_week' => 'One week',
                    'one_month' => 'One month',
                ],
            ),
        ));
    }
}
