<?php
class Controller {
    protected $framework;

    public function __construct() {
        $framework = Base::instance();

        $this->framework = $framework;
    }

    public function convert_md($data) {
        $html = Markdown::instance()->convert($data);
        return $html;
    }

    public function seo_slug($data) {
        //Lower case everything
        $seo = strtolower($data);
        //Make alphanumeric (removes all other characters)
        $seo = preg_replace("/[^a-z0-9_\s-]/", "", $data);
        //Clean up multiple dashes or whitespaces
        $seo = preg_replace("/[\s-]+/", " ", $data);
        //Convert whitespaces and underscore to dash
        $seo = preg_replace("/[\s_]/", "-", $data);
        return $seo;
    }
}

/* End of file controller.php
 * Location: FUNCTION
 */
