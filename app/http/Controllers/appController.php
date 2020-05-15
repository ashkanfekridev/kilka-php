<?php

use App\DB;

class appController
{
    public function index()
    {
        $template = new \App\Template();

        $template->addComponent('/{{(.+)}}/', function ($view) {
            preg_match_all('/{{(.+)}}/', $view, $vars);
//        return Response::json($vars);
//        return var_dump($vars);
            foreach ($vars[1] as $var) {
                $view = str_replace('{{' . $var . '}}', "<?php echo $" . trim($var, ' ') . "; ?>", $view);
            }
        });
        $users = [
            ["name" => "ashkan"],
            ["name" => "joe"],
        ];

        return print_r($template->view('wellcome'));

        return print_r(\App\Response::view('wellcome', ['a' => 'b']));

        $db = new DB();
        $db->query('SELECT * FROM users');
        $users = $db->rowCount();
        return print_r(jsonView($users));
    }
}