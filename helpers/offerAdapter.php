<?php
class offerAdapter {
	private $link;
    public $html;
    public $type; // $type = 'root' or 'preview'
    function __construct($type = 'root', $link = '') {
        $this->type = $type;
        $this->link = $link;
    }

	function offerSwitcher($type) {
		switch($type) {
			case "preview": {
				$this->html = 'view/includes/estimate_panel_preview.php';
            } break;
            case "root": {
				$this->html = ($_SESSION['id']!="" && $_SESSION['name']!='')?'view/includes/estimate_panel_root.php':'';
            } break;
            default: $this->html = ($_SESSION['id']!="" && $_SESSION['name']!='')?'view/includes/estimate_panel_root.php':'';
		}
		return $this->html;
	}
}

?>