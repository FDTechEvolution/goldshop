<?php

/* /Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig */
class __TwigTemplate_f2b16fc6ceaa77875ab3a60a9f99eda0c581d34d998b1f9f1a6912ca07dbd641 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e5d17c78c8576df7c2797ba4ee3aebee88eda67c1c1f113ab0647ef27d24d89e = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_e5d17c78c8576df7c2797ba4ee3aebee88eda67c1c1f113ab0647ef27d24d89e->enter($__internal_e5d17c78c8576df7c2797ba4ee3aebee88eda67c1c1f113ab0647ef27d24d89e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig"));

        // line 18
        $context["isController"] = (twig_lower_filter($this->env, (isset($context["type"]) ? $context["type"] : null)) == "controller");
        // line 19
        if ((isset($context["isController"]) ? $context["isController"] : null)) {
            // line 20
            $context["uses"] = twig_array_merge((isset($context["uses"]) ? $context["uses"] : null), array(0 => "Cake\\TestSuite\\IntegrationTestCase"));
        } else {
            // line 22
            $context["uses"] = twig_array_merge((isset($context["uses"]) ? $context["uses"] : null), array(0 => "Cake\\TestSuite\\TestCase"));
        }
        // line 25
        $context["uses"] = twig_sort_filter((isset($context["uses"]) ? $context["uses"] : null));
        // line 26
        echo "<?php
namespace ";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["baseNamespace"]) ? $context["baseNamespace"] : null), "html", null, true);
        echo "\\Test\\TestCase\\";
        echo twig_escape_filter($this->env, (isset($context["subNamespace"]) ? $context["subNamespace"] : null), "html", null, true);
        echo ";

";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["uses"]) ? $context["uses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["dependency"]) {
            // line 30
            echo "use ";
            echo twig_escape_filter($this->env, $context["dependency"], "html", null, true);
            echo ";
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dependency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
/**
 * ";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["fullClassName"]) ? $context["fullClassName"] : null), "html", null, true);
        echo " Test Case
 */
";
        // line 36
        if ((isset($context["isController"]) ? $context["isController"] : null)) {
            // line 37
            echo "class ";
            echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : null), "html", null, true);
            echo "Test extends IntegrationTestCase
{
";
        } else {
            // line 40
            echo "class ";
            echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : null), "html", null, true);
            echo "Test extends TestCase
{
";
        }
        // line 44
        if ((isset($context["properties"]) ? $context["properties"] : null)) {
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["propertyInfo"]) {
                // line 46
                echo "
    /**
     * ";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "description", array()), "html", null, true);
                echo "
     *
     * @var ";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "type", array()), "html", null, true);
                echo "
     */
    public \$";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "name", array()), "html", null, true);
                if ($this->getAttribute($context["propertyInfo"], "value", array())) {
                    echo " = ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "value", array()), "html", null, true);
                }
                echo ";
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['propertyInfo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 56
        if ((isset($context["fixtures"]) ? $context["fixtures"] : null)) {
            // line 57
            echo "
    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [";
            // line 63
            echo $this->getAttribute((isset($context["Bake"]) ? $context["Bake"] : null), "stringifyList", array(0 => $this->env->getExtension('Jasny\Twig\ArrayExtension')->values((isset($context["fixtures"]) ? $context["fixtures"] : null))), "method");
            echo "];
";
        }
        // line 66
        if ((isset($context["construction"]) ? $context["construction"] : null)) {
            // line 67
            echo "
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
";
            // line 76
            if ((isset($context["preConstruct"]) ? $context["preConstruct"] : null)) {
                // line 77
                echo "        ";
                echo (isset($context["preConstruct"]) ? $context["preConstruct"] : null);
                echo "
";
            }
            // line 79
            echo "        \$this->";
            echo (((isset($context["subject"]) ? $context["subject"] : null) . " = ") . (isset($context["construction"]) ? $context["construction"] : null));
            echo "
";
            // line 80
            if ((isset($context["postConstruct"]) ? $context["postConstruct"] : null)) {
                // line 81
                echo "        ";
                echo (isset($context["postConstruct"]) ? $context["postConstruct"] : null);
                echo "
";
            }
            // line 83
            echo "    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->";
            // line 92
            echo twig_escape_filter($this->env, (isset($context["subject"]) ? $context["subject"] : null), "html", null, true);
            echo ");

        parent::tearDown();
    }
";
        }
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) ? $context["methods"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 99
            echo "
    /**
     * Test ";
            // line 101
            echo twig_escape_filter($this->env, $context["method"], "html", null, true);
            echo " method
     *
     * @return void
     */
    public function test";
            // line 105
            echo twig_escape_filter($this->env, Cake\Utility\Inflector::camelize($context["method"]), "html", null, true);
            echo "()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 111
        if ( !(isset($context["methods"]) ? $context["methods"] : null)) {
            // line 112
            echo "
    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        // line 123
        echo "}
";
        
        $__internal_e5d17c78c8576df7c2797ba4ee3aebee88eda67c1c1f113ab0647ef27d24d89e->leave($__internal_e5d17c78c8576df7c2797ba4ee3aebee88eda67c1c1f113ab0647ef27d24d89e_prof);

    }

    public function getTemplateName()
    {
        return "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 123,  211 => 112,  209 => 111,  198 => 105,  191 => 101,  187 => 99,  183 => 98,  175 => 92,  164 => 83,  158 => 81,  156 => 80,  151 => 79,  145 => 77,  143 => 76,  132 => 67,  130 => 66,  125 => 63,  117 => 57,  115 => 56,  102 => 52,  97 => 50,  92 => 48,  88 => 46,  84 => 45,  82 => 44,  75 => 40,  68 => 37,  66 => 36,  61 => 34,  57 => 32,  48 => 30,  44 => 29,  37 => 27,  34 => 26,  32 => 25,  29 => 22,  26 => 20,  24 => 19,  22 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * Test Case bake template
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{% set isController = type|lower == 'controller' %}
{% if isController %}
    {%- set uses = uses|merge(['Cake\\\\TestSuite\\\\IntegrationTestCase']) %}
{% else %}
    {%- set uses = uses|merge(['Cake\\\\TestSuite\\\\TestCase']) %}
{% endif %}

{%- set uses = uses|sort %}
<?php
namespace {{ baseNamespace }}\\Test\\TestCase\\{{ subNamespace }};

{% for dependency in uses %}
use {{ dependency }};
{% endfor %}

/**
 * {{ fullClassName }} Test Case
 */
{% if isController %}
class {{ className }}Test extends IntegrationTestCase
{
{% else %}
class {{ className }}Test extends TestCase
{
{% endif %}

{%- if properties %}
{% for propertyInfo in properties %}

    /**
     * {{ propertyInfo.description }}
     *
     * @var {{ propertyInfo.type }}
     */
    public \${{ propertyInfo.name }}{% if propertyInfo.value %} = {{ propertyInfo.value }}{% endif %};
{% endfor %}
{% endif %}

{%- if fixtures %}

    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [{{ Bake.stringifyList(fixtures|values)|raw }}];
{% endif %}

{%- if construction %}

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
{% if preConstruct %}
        {{ preConstruct|raw }}
{% endif %}
        \$this->{{ (subject ~ ' = ' ~ construction)|raw }}
{% if postConstruct %}
        {{ postConstruct|raw }}
{% endif %}
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->{{ subject }});

        parent::tearDown();
    }
{% endif %}

{%- for method in methods %}

    /**
     * Test {{ method }} method
     *
     * @return void
     */
    public function test{{ method|camelize }}()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endfor %}

{%- if not methods %}

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endif %}
}
", "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig", "");
    }
}
