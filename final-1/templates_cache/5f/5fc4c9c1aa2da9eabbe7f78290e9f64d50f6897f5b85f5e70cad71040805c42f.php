<?php

/* table.tmpl */
class __TwigTemplate_2e181fd9ebbda0f6190b6b46c2e8cb9d9b371581ff0e8c43b7eb900ff000abb0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.tmpl", "table.tmpl", 1);
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
    table {
      border-collapse: collapse;
    }

    tr.heading {
      font-weight: bolder;
    }

    td {
      border: 1px solid black;
      padding: 0 0.5em;
    }
  </style>
";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        echo "  <h2>";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, ($context["tableName"] ?? null)), "html", null, true);
        echo "</h2>
  <table>
    <tr class=\"heading\">
      ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter(twig_get_attribute($this->env, $this->getSourceContext(), ($context["table"] ?? null), 0, array())));
        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
            // line 25
            echo "        <td>";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</td>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "    </tr>
    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["table"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 29
            echo "      <tr>
        ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["row"]);
            foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                // line 31
                echo "          <td>";
                echo twig_escape_filter($this->env, $context["cell"]);
                echo "</td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cell'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "  </table>
";
    }

    public function getTemplateName()
    {
        return "table.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 35,  96 => 33,  87 => 31,  83 => 30,  80 => 29,  76 => 28,  73 => 27,  64 => 25,  60 => 24,  53 => 21,  50 => 20,  32 => 4,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table.tmpl", "C:\\OpenServer\\domains\\loftschool-php\\final-1\\templates\\table.tmpl");
    }
}
