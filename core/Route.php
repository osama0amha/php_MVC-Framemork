<?php

namespace app\core;

class Route
{

    protected array $path = [];
    protected Request $request;
    public Response  $response;

    public function __construct(Request $request ,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $url, $content)
    {
          $this->path['get'][$url] = $content;
    }
    public function resolve()
    {
        $getMethod = $this->request->getMethod();
        $getPath = $this->request->getPath();
        $content = $this->path[$getMethod][$getPath]??false;

      if(!$content){
          $this->response->status(401);
          return  $this->MainView("__404");
      }

      if(is_string($content))
      {

          return $this->MainView($content);
      }
      if(is_array($content)){
          $content[0] = new $content[0]();
      }
      return call_user_func($content);

    }

    public function MainView($view)
    {
        $layoutView = $this->LayoutView();
        $viewContent = $this->ViewContent($view);
        return str_replace('{{content}}',$viewContent,$layoutView);

    }
    public function LayoutView()
    {
         ob_start();
         include_once Application::$DirRoute ."/View/Layout/main.php";
         return ob_get_clean();
    }
    public function ViewContent($view)
    {
        ob_start();
        include_once Application::$DirRoute ."/View/$view.php";
        return ob_get_clean();

    }
}