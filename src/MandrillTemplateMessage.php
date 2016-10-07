<?php

namespace NotificationChannels\MandrillTemplate;

class MandrillTemplateMessage
{
    /**
     * The data to pass to the template
     *
     * @var array
     */
    protected $data;

    /**
     * The template name
     *
     * @var string
     */
    protected $template;

    public function __construct()
    {

    }

    /**
     *  Set the template data
     *
     * @param $array
     *
     * @return $this
     */
    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     *  Set the template name
     *
     * @param $string
     *
     * @return $this
     */
    public function template($template)
    {
        $this->template = $template;

        return $this;
    }

    public function toArray()
    {
        return [
            'template' => $this->template,
            'data' => $this->data,
        ];
    }

}
