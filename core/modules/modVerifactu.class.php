<?php

include_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';

/**
 *  Module Verifactu - Descriptor
 */
class modVerifactu extends DolibarrModules
{
    public function __construct($db)
    {
        global $langs;

        $this->db = $db;

        // Unique ID for this module (500000+ recommended for custom modules)
        $this->numero = 500001;

        // Name and description
        $this->rights_class = 'verifactu';
        $this->family = "financial";
        $this->name = "Verifactu";
        $this->description = "Sistema Veri*Factu para Dolibarr";
        $this->version = '1.0.0';

        // Module position in admin list
        $this->module_position = 500;

        // Directories to create when module is enabled
        $this->dirs = array(
            '/verifactu',
            '/verifactu/xml',
            '/verifactu/json'
        );

        // Dependencies
        $this->depends = array();
        $this->requiredby = array();

        // Config pages
        $this->config_page_url = array('verifactu_admin.php@verifactu');

        // Hooks
        $this->module_parts = array(
            'hooks' => array(
                'invoicecard',
                'pdfgeneration'
            )
        );

        // Add a menu entry under "Facturación"
        $this->menu = array();

        $r = 0;
        $this->menu[$r++] = array(
            'fk_menu' => 'fk_mainmenu=billing',
            'type' => 'left',
            'titre' => 'Verifactu',
            'mainmenu' => 'billing',
            'leftmenu' => 'verifactu',
            'url' => '/verifactu/admin/verifactu_admin.php',
            'langs' => 'verifactu@verifactu',
            'position' => 100,
            'enabled' => '1',
            'perms' => '1',
            'target' => '',
            'user' => 0
        );
    }
}
