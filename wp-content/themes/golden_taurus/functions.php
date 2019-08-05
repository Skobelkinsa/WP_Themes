<?php
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

$true_page = 'myparameters.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите

/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */

function true_include_myuploadscript() {
    // у вас в админке уже должен быть подключен jQuery, если нет - раскомментируйте следующую строку:
    // wp_enqueue_script('jquery');
    // дальше у нас идут скрипты и стили загрузчика изображений WordPress
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    // само собой - меняем admin.js на название своего файла
    wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/admin.js', array('jquery'), null, false );
}

add_action( 'admin_enqueue_scripts', 'true_include_myuploadscript' );

function true_options() {
    global $true_page;
    add_options_page( 'Настройки темы Golden Taurus', 'Настройки темы Golden Taurus', 'manage_options', $true_page, 'true_option_page');
}
add_action('admin_menu', 'true_options');

/**
 * Возвратная функция (Callback)
 */
function true_option_page(){
    global $true_page;
    ?><div class="wrap">
    <h2>Дополнительные параметры сайта</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php
        settings_fields('true_options'); // меняем под себя только здесь (название настроек)
        do_settings_sections($true_page);
        ?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
    </div><?php
}

/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием true_options (это также видно в предыдущей функции)
 */
function true_option_settings() {
    global $true_page;
    $categories = get_categories( array(
        'taxonomy'     => 'category',
        'type'         => 'post',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'pad_counts'   => false,
        // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
    ) );
    $list = array();
    foreach ($categories as $category){
        $list[$category->term_id] = $category->name;
    }
    // Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
    register_setting( 'true_options', 'true_options', 'true_validate_settings' ); // true_options

    // Добавляем секцию
    add_settings_section( 'true_section_0', 'Базовые настройки', '', $true_page );
    add_settings_section( 'true_section_1', 'Настройки меню', '', $true_page );
    add_settings_section( 'true_section_2', 'Первый экран', '', $true_page );
    add_settings_section( 'true_section_3', 'Второй экран', '', $true_page );
    add_settings_section( 'true_section_4', 'Третий экран', '', $true_page );
    add_settings_section( 'true_section_5', 'Четвертый экран', '', $true_page );
    add_settings_section( 'true_section_6', 'Пятый экран', '', $true_page );
    add_settings_section( 'true_section_7', 'Шестой экран', '', $true_page );
    add_settings_section( 'true_section_8', 'Форма в подвале', '', $true_page );
    add_settings_section( 'true_section_9', 'Подвал', '', $true_page );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => 'js_code',
        'desc'      => '',
        'label_for' => 'js_code'
    );
    add_settings_field( 'js_code', 'Коды метрик и прочего', 'true_option_display_settings', $true_page, 'true_section_0', $true_field_params );


    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => 'mail_to',
        'desc'      => '', // описание
        'label_for' => 'mail_to' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( 'mail_to', 'Почта для заявок', 'true_option_display_settings', $true_page, 'true_section_0', $true_field_params );

    $true_field_params = array(
        'type'      => 'image',
        'id'        => 'favicon',
        'desc'      => '56x56',
        'label_for' => 'favicon'
    );
    add_settings_field( 'favicon', 'Favicon', 'true_option_display_settings', $true_page, 'true_section_0', $true_field_params );

    $true_field_params = array(
        'type'      => 'select',
        'id'        => 'top_slider_category',
        'desc'      => 'Рубрика для верхнего слайдера',
        'label_for' => 'top_slider_category',
        'vals'		=> $list
    );
    add_settings_field( 'top_slider_category', 'Рубрика для верхнего слайдера', 'true_option_display_settings', $true_page, 'true_section_0', $true_field_params );

    $true_field_params = array(
        'type'      => 'image', // тип
        'id'        => 'menu_logo',
        'desc'      => '', // описание
        'label_for' => 'menu_logo' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( 'menu_logo', 'Ссылка на картинку логотипа для меню', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => 'menu_button',
        'desc'      => 'Если не заполнено, кнопка не выведется на экран', // описание
        'label_for' => 'menu_button' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( 'menu_button', 'Название кнопки в меню', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => 'menu_button_link',
        'desc'      => '', // описание
        'label_for' => 'menu_button_link' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( 'menu_button_link', 'Ссылка кнопки в меню', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => '1_screen_title',
        'desc'      => 'Если не заполнено, блок не выведется на экран', // описание
        'label_for' => '1_screen_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( '1_screen_title', 'Заголовок', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '1_screen_desc',
        'desc'      => '',
        'label_for' => '1_screen_desc'
    );
    add_settings_field( '1_screen_desc', 'Описание', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => '2_screen_title',
        'desc'      => 'Если не заполнено, блок не выведется на экран', // описание
        'label_for' => '2_screen_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( '2_screen_title', 'Заголовок', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '2_screen_desc',
        'desc'      => '',
        'label_for' => '2_screen_desc'
    );
    add_settings_field( '2_screen_desc', 'Описание', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params );

    $true_field_params = array(
        'type'      => 'image',
        'id'        => '2_screen_img',
        'desc'      => 'Если не заполнено, картинка не выведется',
        'label_for' => '2_screen_img'
    );
    add_settings_field( '2_screen_img', 'Картинка', 'true_option_display_settings', $true_page, 'true_section_3', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => '3_screen_title',
        'desc'      => 'Если не заполнено, блок не выведется на экран', // описание
        'label_for' => '3_screen_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( '3_screen_title', 'Заголовок', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => '3_screen_sub_title',
        'desc'      => '', // описание
        'label_for' => '3_screen_sub_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( '3_screen_sub_title', 'Подзаголовок', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '3_screen_desc',
        'desc'      => '',
        'label_for' => '3_screen_desc'
    );
    add_settings_field( '3_screen_desc', 'Описание', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params );

    $true_field_params = array(
        'type'      => 'image',
        'id'        => '3_screen_img',
        'desc'      => 'Если не заполнено, картинка не выведется',
        'label_for' => '3_screen_img'
    );
    add_settings_field( '3_screen_img', 'Картинка', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params );

    $true_field_params = array(
        'type'      => 'image',
        'id'        => '3_screen_bg',
        'desc'      => '1920х700',
        'label_for' => '3_screen_bg'
    );
    add_settings_field( '3_screen_bg', 'Картинка фона', 'true_option_display_settings', $true_page, 'true_section_4', $true_field_params );

    $true_field_params = array(
        'type'      => 'select',
        'id'        => 'section_5_category',
        'desc'      => 'Рубрика для блока',
        'label_for' => 'section_5_category',
        'vals'		=> $list
    );
    add_settings_field( 'section_5_category', 'Рубрика для верхнего слайдера', 'true_option_display_settings', $true_page, 'true_section_5', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => '5_screen_title',
        'desc'      => '', // описание
        'label_for' => '5_screen_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( '5_screen_title', 'Заголовок', 'true_option_display_settings', $true_page, 'true_section_5', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '5_screen_desc',
        'desc'      => '',
        'label_for' => '5_screen_desc'
    );
    add_settings_field( '5_screen_desc', 'Описание', 'true_option_display_settings', $true_page, 'true_section_5', $true_field_params );

    $true_field_params = array(
        'type'      => 'select',
        'id'        => 'section_6_category',
        'desc'      => 'Рубрика для блока',
        'label_for' => 'section_6_category',
        'vals'		=> $list
    );
    add_settings_field( 'section_6_category', 'Рубрика для блока', 'true_option_display_settings', $true_page, 'true_section_6', $true_field_params );

    $true_field_params = array(
        'type'      => 'text',
        'id'        => '6_screen_title',
        'desc'      => '',
        'label_for' => '6_screen_title'
    );
    add_settings_field( '6_screen_title', 'Заголовок', 'true_option_display_settings', $true_page, 'true_section_6', $true_field_params );

    $true_field_params = array(
        'type'      => 'text',
        'id'        => '6_screen_count',
        'desc'      => '',
        'label_for' => '6_screen_count'
    );
    add_settings_field( '6_screen_count', 'Кол-во отображаемых записей', 'true_option_display_settings', $true_page, 'true_section_6', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => '7_screen_title',
        'desc'      => '', // описание
        'label_for' => '7_screen_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( '7_screen_title', 'Заголовок', 'true_option_display_settings', $true_page, 'true_section_7', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '7_screen_desc',
        'desc'      => '',
        'label_for' => '7_screen_desc'
    );
    add_settings_field( '7_screen_desc', 'Описание', 'true_option_display_settings', $true_page, 'true_section_7', $true_field_params );

    $true_field_params = array(
        'type'      => 'select',
        'id'        => 'section_7_category',
        'desc'      => 'Рубрика для блока',
        'label_for' => 'section_7_category',
        'vals'		=> $list
    );
    add_settings_field( 'section_7_category', 'Рубрика для блока', 'true_option_display_settings', $true_page, 'true_section_7', $true_field_params );

    $true_field_params = array(
        'type'      => 'text',
        'id'        => '7_screen_count',
        'desc'      => '',
        'label_for' => '7_screen_count'
    );
    add_settings_field( '7_screen_count', 'Кол-во отображаемых записей', 'true_option_display_settings', $true_page, 'true_section_7', $true_field_params );

    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => '8_screen_title',
        'desc'      => '', // описание
        'label_for' => '8_screen_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( '8_screen_title', 'Заголовок', 'true_option_display_settings', $true_page, 'true_section_8', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '8_screen_desc',
        'desc'      => '',
        'label_for' => '8_screen_desc'
    );
    add_settings_field( '8_screen_desc', 'Описание', 'true_option_display_settings', $true_page, 'true_section_8', $true_field_params );

    $true_field_params = array(
        'type'      => 'image',
        'id'        => '8_screen_img',
        'desc'      => '',
        'label_for' => '8_screen_img'
    );
    add_settings_field( '8_screen_img', 'Картинка', 'true_option_display_settings', $true_page, 'true_section_8', $true_field_params );

    $true_field_params = array(
        'type'      => 'image',
        'id'        => '9_footer_logo',
        'desc'      => '',
        'label_for' => '9_footer_logo'
    );
    add_settings_field( '9_footer_logo', 'Лого', 'true_option_display_settings', $true_page, 'true_section_9', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '9_screen_left',
        'desc'      => '',
        'label_for' => '9_screen_left'
    );
    add_settings_field( '9_screen_left', 'Левый блок', 'true_option_display_settings', $true_page, 'true_section_9', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '9_screen_center',
        'desc'      => '',
        'label_for' => '9_screen_center'
    );
    add_settings_field( '9_screen_center', 'Центральный блок', 'true_option_display_settings', $true_page, 'true_section_9', $true_field_params );

    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => '9_screen_right',
        'desc'      => '',
        'label_for' => '9_screen_right'
    );
    add_settings_field( '9_screen_right', 'Правй блок', 'true_option_display_settings', $true_page, 'true_section_9', $true_field_params );

    /*
        // Создадим textarea в первой секции
        $true_field_params = array(
            'type'      => 'textarea',
            'id'        => 'my_textarea',
            'desc'      => 'Пример большого текстового поля.'
        );
        add_settings_field( 'my_textarea_field', 'Большое текстовое поле', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

        // Добавляем вторую секцию настроек

        add_settings_section( 'true_section_2', 'Другие поля ввода', '', $true_page );

        // Создадим чекбокс
        $true_field_params = array(
            'type'      => 'checkbox',
            'id'        => 'my_checkbox',
            'desc'      => 'Пример чекбокса.'
        );
        add_settings_field( 'my_checkbox_field', 'Чекбокс', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

        // Создадим выпадающий список
        $true_field_params = array(
            'type'      => 'select',
            'id'        => 'my_select',
            'desc'      => 'Пример выпадающего списка.',
            'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
        );
        add_settings_field( 'my_select_field', 'Выпадающий список', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

        // Создадим радио-кнопку
        $true_field_params = array(
            'type'      => 'radio',
            'id'      => 'my_radio',
            'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
        );
        add_settings_field( 'my_radio', 'Радио кнопки', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );
        */

}
add_action( 'admin_init', 'true_option_settings' );

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function true_option_display_settings($args) {
    extract( $args );

    $option_name = 'true_options';

    $o = get_option( $option_name );


    switch ( $type ) {
        case 'text':
            $o[$id] = esc_attr( stripslashes($o[$id]) );
            echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'image':
            $o[$id] = esc_attr( stripslashes($o[$id]) );
            $w = 150;
            $h = 150;
            $default = get_stylesheet_directory_uri() . '/img/no-image.png';
            if( $o[$id] ) {
                $image_attributes = wp_get_attachment_image_src( $o[$id], array($w, $h) );
                $src = $image_attributes[0];
            } else {
                $src = $default;
            }
            echo '
            <div>
                <img data-src="' . $default . '" src="' . $src . '" width="' . $w . 'px" height="' . $h . 'px" />
                <div>
                    <input class="regular-text" type="hidden" name="' . $option_name . '['.$id.']" id="' . $id . '" value="' . $o[$id] . '" />
                    <button type="button" class="upload_image_button button">Загрузить</button>
                    <button type="submit" class="remove_image_button button">&times;</button>
                </div>
            </div>';
            //echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;

        case 'textarea':
            $o[$id] = esc_attr( stripslashes($o[$id]) );
            echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'checkbox':
            $checked = ($o[$id] == 'on') ? " checked='checked'" :  '';
            echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";
            echo ($desc != '') ? $desc : "";
            echo "</label>";
            break;
        case 'select':
            echo "<select id='$id' name='" . $option_name . "[$id]'>";
            foreach($vals as $v=>$l){
                $selected = ($o[$id] == $v) ? "selected='selected'" : '';
                echo "<option value='$v' $selected>$l</option>";
            }
            echo ($desc != '') ? $desc : "";
            echo "</select>";
            break;
        case 'radio':
            echo "<fieldset>";
            foreach($vals as $v=>$l){
                $checked = ($o[$id] == $v) ? "checked='checked'" : '';
                echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
            }
            echo "</fieldset>";
            break;

    }
}

/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
    foreach($input as $k => $v) {
        $valid_input[$k] = trim($v);

        /* Вы можете включить в эту функцию различные проверки значений, например
        if(! задаем условие ) { // если не выполняется
            $valid_input[$k] = ''; // тогда присваиваем значению пустую строку
        }
        */
    }
    return $valid_input;
}

function printr($arr){
    echo "<pre>".print_r($arr, 1)."</pre>";
}