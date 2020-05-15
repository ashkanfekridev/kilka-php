<?php


namespace App;


class Template
{
    protected $templates_path = __DIR__ . "/../../resorces/views/";
    protected $temp_dir = __DIR__ . '/temp/';

    protected $components = [];


    public function render($view, $data = [])
    {
        $view = $this->templates_path . ltrim($view, '/') . '.php';
        $view = file_get_contents($view);

// caching
        $view_hash = md5($view);
        $temp_view = __DIR__ . '/temp/' . $view_hash . '.php';
        $temp_dir = $this->temp_dir;
        $temp_files = scandir($temp_dir);

        if (array_search($view_hash . '.php', $temp_files)) {
            extract($data);
            ob_start();
            return require_once $temp_view;
            echo ob_get_clean();
        } else {

//        echo = {{ var }}
            preg_match_all('/{{(.+)}}/', $view, $vars);
//        return Response::json($vars);
//        return var_dump($vars);
            foreach ($vars[1] as $var) {
                $view = str_replace('{{' . $var . '}}', "<?php echo $" . trim($var, ' ') . "; ?>", $view);
            }
//        return;
////        foreach = @foreach() -t public
///
            preg_match_all('/@foreach(.+)/', $view, $foreach);


            foreach ($foreach[1] as $for) {
                $view = str_replace('@foreach' . $for, "<?php foreach" . $for . "{ ?>", $view);
            }

//endforeach

            $view = str_replace('@endforeach', "<?php } ?>", $view);


            file_put_contents($temp_view, preg_replace('/\/+/', '/', $view));
            extract($data);
            ob_start();
            require $temp_view;
            echo ob_get_clean();
//        unlink($temp_view);
        }
    }


    public function view($view)
    {
        return $this->components;
        return $view;
    }


    public function addComponent($pattern, callable $callback)
    {
        $this->components[] = [
            'pattern' => $pattern,
            'callback' => $callback
        ];
    }


}