<?php

// Classe do Widget
class Redes_Sociais_Widget extends WP_Widget
{

    // Construtor do Widget
    function __construct()
    {
        parent::__construct(
            'redes_sociais_widget',
            __('Redes Sociais Widget', 'text_domain'),
            array(
                'description' => __('Widget para exibir links das redes sociais.', 'text_domain'),
            )
        );
    }

    // Formulário do Widget
    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : '';
        $youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : '';
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : '';
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>
    <?php
    }

    // Atualiza as instâncias do Widget
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = isset($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['linkedin'] = isset($new_instance['linkedin']) ? strip_tags($new_instance['linkedin']) : '';
        $instance['youtube'] = isset($new_instance['youtube']) ? strip_tags($new_instance['youtube']) : '';
        $instance['instagram'] = isset($new_instance['instagram']) ? strip_tags($new_instance['instagram']) : '';
        $instance['facebook'] = isset($new_instance['facebook']) ? strip_tags($new_instance['facebook']) : '';
        return $instance;
    }

    // Exibe o Widget
    public function widget($args, $instance)
    {
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
        $linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : '';
        $youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : '';
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : '';

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
    ?>


        <ul class="redes-sociais">
            <?php if (!empty($linkedin)) : ?>
                <li>
                    <a class="mr-2 mb-1" rel="noreferrer" href="<?php echo esc_url($linkedin); ?>" target="_blank" title="LinkedIn">
                        <i class="ti ti-brand-linkedin"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($youtube)) : ?>
                <li>
                    <a class="mr-2 mb-1" rel="noreferrer" href="<?php echo esc_url($youtube); ?>" target="_blank" title="Youtube">
                        <i class="ti ti-brand-youtube"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instagram)) : ?>
                <li>
                    <a class="mr-2 mb-1" rel="noreferrer" href="<?php echo esc_url($instagram); ?>" target="_blank" title="Instagram">
                        <i class="ti ti-brand-instagram"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($facebook)) : ?>
                <li>
                    <a class="mr-2 mb-1" rel="noreferrer" href="<?php echo esc_url($facebook); ?>" target="_blank" title="Facebook">
                        <i class="ti ti-brand-facebook"></i>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
<?php
        echo $args['after_widget'];
    }
}

// Adicione um gancho para o WordPress registrar o widget
add_action('widgets_init', 'register_redes_sociais_widget');

// Função para registrar o widget
function register_redes_sociais_widget()
{
    register_widget('Redes_Sociais_Widget');
}
