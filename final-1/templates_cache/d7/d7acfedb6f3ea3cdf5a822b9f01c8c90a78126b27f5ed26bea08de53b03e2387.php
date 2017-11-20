<?php

/* availableTables.tmpl */
class __TwigTemplate_5b0afa52e7e63c315b3ca724b850703f1eac9c689cae9325cf71870c53e3d5d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.tmpl", "availableTables.tmpl", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.tmpl";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "  <style type=\"text/css\">
    a {
      font-size: 30px;
    }
  </style>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "  <ul>
    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
            // line 14
            echo "      <li>
        <a href=\"/final-1/admin.php?table=";
            // line 15
            echo twig_escape_filter($this->env, $context["table"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $context["table"]), "html", null, true);
            echo "</a><br>
      </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "  </ul>
";
    }

    public function getTemplateName()
    {
        return "availableTables.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 18,  54 => 15,  51 => 14,  47 => 13,  44 => 12,  41 => 11,  32 => 4,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "availableTables.tmpl", "C:\\OpenServer\\domains\\loftschool-php\\final-1\\templates\\availableTables.tmpl");
    }
}
