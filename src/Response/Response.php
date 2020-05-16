<?php


namespace App;


class Response
{

    /**
     * @param $json
     * @return false|string
     */
    public static function json($json){
        header("Content-Type: application/json; charset=UTF-8");
        return json_encode($json);
    }


    /**
     * @param $view
     * @param array $data
     */
    public static function view($view, $data=[]){
        $view = VIEW_DIR . ltrim($view, '/') . '.php';
        $view = file_get_contents($view);
        // caching
        $view_hash = md5($view);
        $temp_dir = VIEW_TEMP_DIR;
        $temp_view = $temp_dir . $view_hash . '.php';
        $temp_files = scandir($temp_dir);

        if (array_search($view_hash . '.php', $temp_files)) {
            extract($data);
            ob_start();
            return require_once $temp_view;
            echo ob_get_clean();
        }else{
            //        echo = {{ var }}
            preg_match_all('/{{(.+)}}/', $view, $vars);
            foreach ($vars[1] as $var) {
                $view = str_replace('{{' . $var . '}}', "<?php echo $" . trim($var, ' ') . "; ?>", $view);
            }
//        return;
////        foreach = @foreach()
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


}