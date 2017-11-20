<?php

/* base.tmpl */
class __TwigTemplate_eef606cebc4018fe8203eb122da6f042460f3a1cd0f82e3d3df67dcd79e97f82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <title>Админка</title>
  ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "</head>
<body>
";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "</body>
</html>";
    }

    // line 6
    public function block_head($context, array $blocks = array())
    {
        // line 7
        echo "  ";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.tmpl";
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  44 => 7,  41 => 6,  36 => 12,  34 => 10,  30 => 8,  28 => 6,  21 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.tmpl", "C:\\OpenServer\\domains\\loftschool-php\\final-1\\templates\\base.tmpl");
    }
}
