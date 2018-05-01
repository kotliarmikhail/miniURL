<?php
namespace Application\InputFilter;

use Zend\InputFilter\InputFilter;

class FormUrlFilter extends InputFilter
{
    public function __construct($form)
    {
        $this->add([
            'name' => 'long_url',
            'required' => true,
            'allowEmpty' => true,
            'filters' => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 4,
                        'max' => 100,
                    ],
                ],

            ],
        ]);

        $this->add([
            'name' => 'search_text_source',
            'required' => false,

        ]);
    }
}
