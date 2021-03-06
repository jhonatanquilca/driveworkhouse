<?php

class Menu {

    private static $_controller;

    public static function getMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<span class="fa fa-dashboard"></span><span class="sidebar-title">Dashboard</span><span class="sidebar-title-tray"><!--<span class="label label-xs bg-primary">New</span>--></span>',
                'url' => Yii::app()->homeUrl,
                'access' => 'action_dashboard_index',
                'active_rules' => array('module' => 'principal', 'controller' => 'dashboard')
            ),
            array('label' => '<span class="fa fa-group fa-x2"></span><span class="sidebar-title">Clientes</span><span class="sidebar-title-tray"></span>',
                'url' => array('/cliente/cliente/admin/'),
                'access' => 'action_cliente_admin',
                'active_rules' => array('module' => 'cliente', 'controller' => 'cliente'/*, 'action' => 'admin'*/)
            ),
            array('label' => '<span class="fa fa-money"></span><span class="sidebar-title">Cobranzas</span><span class="caret"></span>', 'url' => '#',
                'itemOptions' => array('class' => 'dropdown-list'),
                'linkOptions' => array('class' => 'accordion-toggle'),
                'items' => array(
                    array('label' => '<span class="fa fa-shopping-cart"></span>Deudas', 'url' => array('/cobranzas/deuda/admin/'), 'access' => 'action_deuda_admin', 'active_rules' => array('module' => 'cobranzas', 'controller' => 'deuda', 'action' => 'admin')),
                    array('label' => '<span class="fa fa-legal"></span>Pagos', 'url' => array('/cobranzas/pago/admin/'), 'access' => 'action_pago_admin', 'active_rules' => array('module' => 'cobranzas', 'controller' => 'pago', 'action' => 'admin')),
                )),
        );
        return self::generateMenu($items);
    }

    public static function getAdminMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<span class="fa fa-home"></span><span class="sidebar-title"> Principal</span>', 'url' => Yii::app()->homeUrl),
            array('label' => '<span class="fa fa-user"></span><span class="sidebar-title">Usuarios</span>',
                'url' => Yii::app()->user->ui->userManagementAdminUrl,
                'access' => 'Cruge.ui.*', 'active_rules' => array('module' => 'cruge')
            ),
            array('label' => '<span class="fa fa-bookmark"></span><span class="sidebar-title">Plantillas Descripción</span>',
                'url' => array('/cobranzas/descripcionPalntilla/admin/'),
                'access' => 'action_descripcionPalntilla_admin', 'active_rules' => array('module' => 'cobranzas', 'controller' => 'descripcionPalntilla', 'action' => 'admin')
            ),
        );

        return self::generateMenu($items);
    }

    /**
     * Function to create a menu with acces rules and active item
     * @param array $items items to build the men
     * @return array the formated menuu
     */
    private static function generateMenu($items) {
        $menu = array();
        foreach ($items as $k => $item) {
            $access = false;
            $menu_item = $item;
            // Check children access
            if (isset($item['items'])) {
                $menu_item['items'] = array();
                // Check childrens access
                foreach ($item['items'] as $j => $children) {
                    if ($access = Yii::app()->user->checkAccess($children['access'])) {
                        $menu_item['items'][$j] = $children;
                        if (isset($children['active_rules']) && self::getActive2($children['active_rules'])) {
                            $menu_item['items'][$j]['active'] = true;
                            $menu_item['active'] = true;
                        }
                    }
                }
            } else {
                // Check item access
                if (isset($item['access'])) {
                    $access = Yii::app()->user->checkAccess($item['access']);
                } else {
                    $access = true;
                }
                // Check active
                if (isset($item['active_rules'])) {
                    $menu_item['active'] = self::getActive2($item['active_rules']);
                }
            }
            // If acces to the item or any child add to the menu
            if ($access) {
                $menu[] = $menu_item;
            }
        }
        return $menu;
    }

    private static function getActive2($active_rules) {
        $current = false;
        //MODULE
        $module = false;
        //CONTROLLER
        $controller = FALSE;
        //ACTION
        $action = false;
        if (self::$_controller) {
            if (is_array(current($active_rules))) {
                foreach ($active_rules as $rule) {
                    $operator = isset($rule['operator']) ? $rule['operator'] : '==';
                    if (isset($rule['module'])) {
                        if (self::$_controller->module) {
                            $module = self::BooleanOperator($operator, self::$_controller->module->id, $rule['module']);
                        }
                    } else {
                        $module = true;
                    }
                    if (isset($rule['controller'])) {
                        $controller = self::BooleanOperator($operator, self::$_controller->id, $rule['controller']);
                    } else {
                        $controller = true;
                    }
                    if (isset($rule['action'])) {
                        $action = self::BooleanOperator($operator, self::$_controller->action->id, $rule['action']);
                    } else {
                        $action = true;
                    }
                    if (!isset($rule['controller']) && !isset($rule['module']) && !isset($rule['action']))
                        $current = false;
                    else
                        $current = $module && $controller && $action;
                    if (!$current)
                        break;
                }
            } else {
                $operator = isset($active_rules['operator']) ? $active_rules['operator'] : '==';
                if (isset($active_rules['module'])) {
                    if (self::$_controller->module) {
                        $module = self::BooleanOperator($operator, self::$_controller->module->id, $active_rules['module']);
                    }
                } else {
                    $module = true;
                }
                if (isset($active_rules['controller'])) {
                    $controller = self::BooleanOperator($operator, self::$_controller->id, $active_rules['controller']);
                } else {
                    $controller = true;
                }
                if (isset($active_rules['action'])) {
                    $action = self::BooleanOperator($operator, self::$_controller->action->id, $active_rules['action']);
                } else {
                    $action = true;
                }
                if (!isset($active_rules['controller']) && !isset($active_rules['module']) && !isset($active_rules['action']))
                    $current = false;
                else
                    $current = $module && $controller && $action;
//                var_dump($current);
            }
        }
        return $current;
    }

    private static function BooleanOperator($operator, $compare1, $compare2) {
        $result = FALSE;
        if ($operator == "==")
            $result = $compare1 == $compare2;
        if ($operator == "!=")
            $result = $compare1 != $compare2;
        return $result;
    }

}
