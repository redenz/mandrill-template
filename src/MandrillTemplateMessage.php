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
    public function tempate($template)
    {
        $this->template = $template;

        return $this;
    }

}
