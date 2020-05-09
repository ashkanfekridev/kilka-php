<?php


namespace App;


class Template
{
    protected $templates_path = __DIR__ . "/../../resorces/views/";

    public function render($view, $data = [])
    {
        $view = $this->templates_path . ltrim($view, '/') . '.php';
        $view = file_get_contents($view);
//        echo = {{ var }}
        preg_match_all('/{{ (.+?) }}/', $view, $vars);
        foreach ($vars[1] as $var) {
            $view = str_replace('{{ ' . $var . ' }}', "<?php echo $" . $var . "; ?>", $view);
        }
////        foreach = @foreach()
        preg_match_all('/@foreach(.+)/', $view, $foreach);

        foreach ($foreach[1] as $for) {
            $view = str_replace('@foreach' . $for, "<?php foreach(" . $for . "){ ?>", $view);
        }

//endforeach

//        preg_match_all('/@endforeach/', $view, $endforeach);
//        return print_r($endforeach);
//        foreach ($endforeach[1] as $endfor) {
            $view = str_replace('@endforeach', "<?php } ?>", $view);
//        }


        $temp_view = __DIR__ . '/temp_' . time() . rand() . '.php';
        file_put_contents($temp_view, preg_replace('/\/+/', '/', $view));
        extract($data);
        ob_start();
        require $temp_view;
        echo ob_get_clean();
//        unlink($temp_view);
    }
}