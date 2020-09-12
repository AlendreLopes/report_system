<?php
    // This method don't find file that I nedd to call
    //$this->registerJsFile('@themes/js/navbarBootstrap.js');
    //$this->registerCssFile('@themes/css/navbarBootstrap.css');
    use backend\assets\MenuReportAsset;
    // Call models
    use backend\models\LaudosMenu;
    use backend\models\LaudosMenuPrimario;
    use backend\models\LaudosMenuSecundario;
    // Menu List
    $menu = LaudosMenu::find()
    ->where(['exibir' => '1'])->orderBy(['titulo' => SORT_ASC])
    ->all();
    MenuReportAsset::register($this);
    ?>
    <div id="cssmenu" class="row">
        <ul class="navbar-nav">
        <li><a>Listar Laudos:</a> </li>
        <?php
        if($menu){
            foreach ($menu as $menus):
            ?>
            <li>
                <a><?=$menus->titulo?> </a>
                <ul>
                <?php
                $primario = LaudosMenuPrimario::find()->where(['laudos_menu_id' => $menus->id, 'exibir' => '1'])->orderBy(['titulo' => SORT_ASC])->all();
                if($primario)
                {
                    foreach ($primario as $primarios):
                        $secundario  = LaudosMenuSecundario::find()->where(['laudos_menu_primario_id' => $primarios->id, 'exibir' => '1'])->orderBy(['titulo' => SORT_ASC])->all();
                        if($secundario):
                            ?>
                            <li>
                                <a href="#"><?=$primarios->titulo?> &raquo </a>
                                <ul>
                                <?php
                                foreach ($secundario as $secundarios):
                                    ?>
                                    <li>
                                        <a href="<?=$secundarios->pagina?>"><?=$secundarios->titulo?></a>
                                    </li>
                                    <?php
                                endforeach;
                                ?>
                                </ul>
                            </li>
                            <?php
                        else:
                            ?>
                            <li>
                                <a href="<?=$primarios->pagina?>"><?=$primarios->titulo?></a>
                            </li>
                            <?php
                        endif;
                    endforeach;
                }
                ?>
                </ul>
            </li>
            <?php
            endforeach;
        }else {
            ?>
            <li>Sem Menu para exibir...</li>
        <?php
        }
        ?>
        </ul>
    </div>
