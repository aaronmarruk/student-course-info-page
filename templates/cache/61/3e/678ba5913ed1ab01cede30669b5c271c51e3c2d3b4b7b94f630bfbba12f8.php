<?php

/* course-page.html */
class __TwigTemplate_613e678ba5913ed1ab01cede30669b5c271c51e3c2d3b4b7b94f630bfbba12f8 extends Twig_Template
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
        // line 1
        echo "<!-- LS Header ripped d'reckly from Learning Space -->
";
        // line 2
        $this->env->loadTemplate("learningspace-header.html")->display($context);
        echo " 

  <!-- Nav tabs -->
<ul class=\"nav nav-pills\" role=\"tablist\">
  <li class=\"active\"><a href=\"#my-modules\" role=\"tab\" data-toggle=\"tab\">My Modules</a></li>
  <li><a href=\"#course-information\" role=\"tab\" data-toggle=\"tab\">Course Information</a></li>
</ul>

<!-- Tab panes -->
<div class=\"tab-content\">
  <div class=\"tab-pane active\" id=\"my-modules\">
    <!-- My Modules -->
  <!-- <h1 id=\"section--my-modules\">My Modules</h1> -->
  <ul class=\"module-list\">
  ";
        // line 17
        echo "  ";
        // line 18
        echo "  ";
        // line 19
        echo " 
  ";
        // line 20
        $context["readableName"] = "";
        // line 21
        echo "
  ";
        // line 23
        echo "  ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 24
            echo "    ";
            if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName") != (isset($context["readableName"]) ? $context["readableName"] : null))) {
                // line 25
                echo "      
      ";
                // line 26
                $context["name"] = $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName");
                // line 27
                echo "
      <li class=\"module-list__module\">

        ";
                // line 30
                if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "idnumber") != "")) {
                    // line 31
                    echo "          <h5 class=\"module-list__code badge\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "idnumber"), "html", null, true);
                    echo "</h5>
        ";
                }
                // line 33
                echo "
        <h1 class=\"module-list__title\"><a href=\"";
                // line 34
                echo twig_escape_filter($this->env, (((isset($context["siteRoot"]) ? $context["siteRoot"] : null) . "/course/view.php?id=") . $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "id")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName"), "html", null, true);
                echo "</a></h2>
        
        ";
                // line 36
                if (($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "summary") != "")) {
                    // line 37
                    echo "        <p class=\"module-list__item-desc\">
          ";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "summary"), "html", null, true);
                    echo "
        </p>
        ";
                }
                // line 41
                echo "        ";
                // line 42
                echo "        ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["readingLists"]) ? $context["readingLists"] : null), $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName"), array(), "array"), 0, array(), "array"), "name") != "")) {
                    // line 43
                    echo "          
          <a class=\"module-list__readings-link\" href=\"";
                    // line 44
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["readingLists"]) ? $context["readingLists"] : null), $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "readableName"), array(), "array"), 0, array(), "array"), "url"), "html", null, true);
                    echo "\"><span><i class=\"fa fa-book\"></i> Reading list</span></a>

        ";
                }
                // line 47
                echo "           
      </li>
    
    ";
            } else {
                // line 51
                echo "      ";
                echo "    
    ";
            }
            // line 53
            echo "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "</ul>
<!-- END My Modules -->
  </div>



  <div class=\"tab-pane\" id=\"course-information\">
    <!-- Welcome -->
    ";
        // line 62
        if (((isset($context["courseWelcome"]) ? $context["courseWelcome"] : null) != "")) {
            // line 63
            echo "    <h1>";
            echo twig_escape_filter($this->env, (isset($context["courseName"]) ? $context["courseName"] : null), "html", null, true);
            echo "</h1>
    <p>";
            // line 64
            echo nl2br(twig_escape_filter($this->env, (isset($context["courseWelcome"]) ? $context["courseWelcome"] : null), "html", null, true));
            echo "</p>
    <img src=\"";
            // line 65
            echo twig_escape_filter($this->env, (isset($context["courseWelcomePhoto"]) ? $context["courseWelcomePhoto"] : null), "html", null, true);
            echo "\">
    <p>";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["courseWelcomeName"]) ? $context["courseWelcomeName"] : null), "html", null, true);
            echo "</p>
    <p>";
            // line 67
            echo twig_escape_filter($this->env, (isset($context["courseWelcomeJobTitle"]) ? $context["courseWelcomeJobTitle"] : null), "html", null, true);
            echo "</p>
    ";
        }
        // line 69
        echo "    <!-- END Welcome -->
    
    <!-- Contacts -->
    ";
        // line 72
        if (($this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "name") != null)) {
            // line 73
            echo "    <h1 id=\"section--personal-tutor\">Personal Tutor</h1>
    <p>Your personal tutor is who you should contact if you need to speak to somebody regarding course matters.</p>
    <ul class=\"contact-cards\">
      <li class=\"contact-cards__card\">
        <ul class=\"contact-cards__details\">
          <button type=\"button\" class=\"btn btn-default\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"left\" data-content=\"Vivamus sagittis lacus vel augue laoreet rutrum faucibus.\">
  Popover on left
</button>
          <li class=\"contact-cards__pic\"></li>
          <li class=\"contact-cards__text\"><h3>";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "name"), "html", null, true);
            echo "</h3></li>
          <li class=\"contact-cards__text\"><strong>";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "jobTitle"), "html", null, true);
            echo "</strong></li>
          <li class=\"contact-cards__text\"><a href=\"mailto:";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "email"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "email"), "html", null, true);
            echo "</a></li>
          <li class=\"contact-cards__text\">";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["personalTutor"]) ? $context["personalTutor"] : null), "telephone"), "html", null, true);
            echo "</li>
        </ul>
      </li>
    </ul>
    ";
        }
        // line 90
        echo "    <!-- END Contacts -->

    <!-- Files -->
    ";
        // line 93
        if (((isset($context["files"]) ? $context["files"] : null) != null)) {
            // line 94
            echo "    <h1 id=\"section--important-documents\">Important documents</h1>
    <p>Below you will find important documents relating to your course</p>
    <ul class=\"files-list\">
      ";
            // line 97
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 98
                echo "      <li class=\"files-list__file\">
        <a class=\"files-list__file-link\" href=\"";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "link"), "html", null, true);
                echo "\">
        <p class=\"files-list__file-title\"><small>";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "title"), "html", null, true);
                echo "</small></p>
        <i class=\"files-list__icon fa fa-cloud-download\"></i>
      <!-- <ul class=\"files-list__file-meta\">
        <li>
        ";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "size"), "html", null, true);
                echo "
        </li>
        <li>
        ";
                // line 107
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "ext"), "html", null, true);
                echo "
        </li>
      </ul> -->
      </a>
      </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            echo "    </ul>
    ";
        }
        // line 115
        echo "    <!-- END Files -->

    <!-- Reading Lists -->
    <!-- <h2>Reading Lists</h2>
    <ul>
      ";
        // line 120
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["readingLists"]) ? $context["readingLists"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["moduleReadingList"]) {
            // line 121
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["moduleReadingList"]) ? $context["moduleReadingList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 122
                echo "          <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name"), "html", null, true);
                echo "</a></li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 124
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['moduleReadingList'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 125
        echo "    </ul> -->
    <!-- END Reading Lists -->
  </div>
</div>
<!-- LS Footer – Ripped d'reckly from Learning Space -->
";
        // line 130
        $this->env->loadTemplate("learningspace-footer.html")->display($context);
    }

    public function getTemplateName()
    {
        return "course-page.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  295 => 130,  288 => 125,  282 => 124,  271 => 122,  266 => 121,  262 => 120,  255 => 115,  251 => 113,  239 => 107,  233 => 104,  226 => 100,  222 => 99,  219 => 98,  215 => 97,  210 => 94,  208 => 93,  203 => 90,  195 => 85,  189 => 84,  185 => 83,  181 => 82,  170 => 73,  168 => 72,  163 => 69,  158 => 67,  154 => 66,  150 => 65,  146 => 64,  141 => 63,  139 => 62,  129 => 54,  123 => 53,  118 => 51,  112 => 47,  106 => 44,  103 => 43,  100 => 42,  98 => 41,  92 => 38,  89 => 37,  87 => 36,  80 => 34,  77 => 33,  71 => 31,  69 => 30,  64 => 27,  62 => 26,  59 => 25,  56 => 24,  51 => 23,  48 => 21,  46 => 20,  43 => 19,  41 => 18,  39 => 17,  22 => 2,  19 => 1,);
    }
}
